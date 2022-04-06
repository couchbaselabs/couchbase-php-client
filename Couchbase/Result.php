<?php

/**
 * Copyright 2014-Present Couchbase, Inc.
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

namespace Couchbase;

use Couchbase\Exception\Exception;

/**
 * Base interface for all results generated by KV operations.
 */
class Result
{
    private string $id;
    private ?string $cas = null;
    private ?Exception $error = null;

    /**
     * @private
     * @param array $response
     * @since 4.0.0
     */
    public function __construct(array $response)
    {
        $this->id = $response["id"];
        if (array_key_exists("cas", $response)) {
            $this->cas = $response["cas"];
        }
        if (array_key_exists("error", $response)) {
            $this->error = $response["error"];
        }
    }

    /**
     * Returns the ID of the document
     *
     * @return string
     * @since 4.0.0
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * Returns the CAS value for the document
     *
     * @return string|null
     * @since 4.0.0
     */
    public function cas(): ?string
    {
        return $this->cas;
    }

    /**
     * Returns the error (populated for multi-operations)
     *
     * @return Exception|null
     * @since 4.0.0
     */
    public function error(): ?Exception
    {
        return $this->error;
    }
}
