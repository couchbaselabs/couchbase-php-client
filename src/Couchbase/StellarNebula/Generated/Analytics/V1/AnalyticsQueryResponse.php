<?php

# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: couchbase/analytics.v1.proto

namespace Couchbase\StellarNebula\Generated\Analytics\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>couchbase.analytics.v1.AnalyticsQueryResponse</code>
 */
class AnalyticsQueryResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated bytes rows = 1;</code>
     */
    private $rows;
    /**
     * Generated from protobuf field <code>optional .couchbase.analytics.v1.AnalyticsQueryResponse.MetaData meta_data = 2;</code>
     */
    protected $meta_data = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $rows
     *     @type \Couchbase\StellarNebula\Generated\Analytics\V1\AnalyticsQueryResponse\MetaData $meta_data
     * }
     */
    public function __construct($data = null)
    {
        \GPBMetadata\Couchbase\AnalyticsV1::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated bytes rows = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * Generated from protobuf field <code>repeated bytes rows = 1;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRows($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::BYTES);
        $this->rows = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>optional .couchbase.analytics.v1.AnalyticsQueryResponse.MetaData meta_data = 2;</code>
     * @return \Couchbase\StellarNebula\Generated\Analytics\V1\AnalyticsQueryResponse\MetaData|null
     */
    public function getMetaData()
    {
        return $this->meta_data;
    }

    public function hasMetaData()
    {
        return isset($this->meta_data);
    }

    public function clearMetaData()
    {
        unset($this->meta_data);
    }

    /**
     * Generated from protobuf field <code>optional .couchbase.analytics.v1.AnalyticsQueryResponse.MetaData meta_data = 2;</code>
     * @param \Couchbase\StellarNebula\Generated\Analytics\V1\AnalyticsQueryResponse\MetaData $var
     * @return $this
     */
    public function setMetaData($var)
    {
        GPBUtil::checkMessage($var, \Couchbase\StellarNebula\Generated\Analytics\V1\AnalyticsQueryResponse\MetaData::class);
        $this->meta_data = $var;

        return $this;
    }
}