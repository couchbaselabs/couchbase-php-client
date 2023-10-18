<?php

/*
 * Copyright 2022-Present Couchbase, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


declare(strict_types=1);

namespace Couchbase\Protostellar;

use Couchbase\AnalyticsOptions;
use Couchbase\AnalyticsResult;
use Couchbase\ClusterInterface;
use Couchbase\ClusterOptions;
use Couchbase\Exception\InvalidArgumentException;
use Couchbase\Protostellar\Generated\Analytics\V1\AnalyticsQueryRequest;
use Couchbase\Protostellar\Generated\Search\V1\SearchQueryRequest;
use Couchbase\Protostellar\Internal\AnalyticsRequestConverter;
use Couchbase\Protostellar\Internal\AnalyticsResponseConverter;
use Couchbase\Protostellar\Internal\QueryRequestConverter;
use Couchbase\Protostellar\Internal\QueryResponseConverter;
use Couchbase\Protostellar\Internal\SearchRequestConverter;
use Couchbase\Protostellar\Internal\SearchResponseConverter;
use Couchbase\Protostellar\Internal\SharedUtils;
use Couchbase\Protostellar\Internal\TimeoutHandler;
use Couchbase\Protostellar\Management\BucketManager;
use Couchbase\Protostellar\Management\QueryIndexManager;
use Couchbase\QueryOptions;
use Couchbase\QueryResult;
use Couchbase\SearchOptions;
use Couchbase\SearchQuery;
use Couchbase\SearchResult;
use Couchbase\Protostellar\Generated\Query\V1\QueryRequest;
use Couchbase\Protostellar\Internal\Client;

class Cluster implements ClusterInterface
{
    private Client $client;


    public function __construct(string $connectionString, ClusterOptions $options = new ClusterOptions())
    {
        $this->client = new Client($connectionString, $options);
    }

    public function close()
    {
        $this->client->close();
    }

    public function bucket(string $name): Bucket
    {
        return new Bucket($this->client, $name);
    }

    /**
     * @throws InvalidArgumentException
     */
    public function query(string $statement, QueryOptions $options = null): QueryResult
    {
        $exportedOptions = QueryOptions::export($options);
        $request = QueryRequestConverter::getQueryRequest($statement, $exportedOptions);
        $timeout = $this->client->timeoutHandler()->getTimeout(TimeoutHandler::QUERY, $exportedOptions);
        $response = ProtostellarOperationRunner::runStreaming(
            SharedUtils::createProtostellarRequest(new QueryRequest($request), $exportedOptions['readonly'] ?? false, $timeout),
            [$this->client->query(), 'Query']
        );
        $finalArray = QueryResponseConverter::convertQueryResult($response);
        return new QueryResult($finalArray, QueryOptions::getTranscoder($options));
    }

    public function analyticsQuery(string $statement, AnalyticsOptions $options = null): AnalyticsResult
    {
        $exportedOptions = AnalyticsOptions::export($options);
        $request = AnalyticsRequestConverter::getAnalyticsRequest($statement, $exportedOptions);
        $timeout = $this->client->timeoutHandler()->getTimeout(TimeoutHandler::ANALYTICS, $exportedOptions);
        $response = ProtostellarOperationRunner::runStreaming(
            SharedUtils::createProtostellarRequest(new AnalyticsQueryRequest($request), false, $timeout),
            [$this->client->analytics(), 'AnalyticsQuery']
        );
        $finalArray = AnalyticsResponseConverter::convertAnalyticsResult($response);
        return new AnalyticsResult($finalArray, AnalyticsOptions::getTranscoder($options));
    }

    /**
     * @throws InvalidArgumentException
     */
    public function searchQuery(string $indexName, SearchQuery $query, SearchOptions $options = null): SearchResult
    {
        $exportedOptions = SearchOptions::export($options);
        $request = SearchRequestConverter::getSearchRequest($indexName, $query, $exportedOptions);
        $timeout = $this->client->timeoutHandler()->getTimeout(TimeoutHandler::SEARCH, $exportedOptions);
        $response = ProtostellarOperationRunner::runStreaming(
            SharedUtils::createProtostellarRequest(new SearchQueryRequest($request), true, $timeout),
            [$this->client->search(), 'SearchQuery']
        );
        $finalArray = SearchResponseConverter::convertSearchResult($response);
        return new SearchResult($finalArray);
    }

    public function buckets(): BucketManager
    {
        return new BucketManager($this->client);
    }

    public function queryIndexes(): QueryIndexManager
    {
        return new QueryIndexManager($this->client);
    }

    public function searchIndexes(): SearchIndexManager
    {
        return new SearchIndexManager($this->client);
    }
}