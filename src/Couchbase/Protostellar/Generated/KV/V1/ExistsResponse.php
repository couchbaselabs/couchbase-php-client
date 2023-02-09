<?php

# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: couchbase/kv.v1.proto

namespace Couchbase\Protostellar\Generated\KV\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>couchbase.kv.v1.ExistsResponse</code>
 */
class ExistsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>bool result = 1;</code>
     */
    protected $result = false;
    /**
     * Generated from protobuf field <code>uint64 cas = 2;</code>
     */
    protected $cas = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type bool $result
     *     @type int|string $cas
     * }
     */
    public function __construct($data = null)
    {
        \GPBMetadata\Couchbase\KvV1::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>bool result = 1;</code>
     * @return bool
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Generated from protobuf field <code>bool result = 1;</code>
     * @param bool $var
     * @return $this
     */
    public function setResult($var)
    {
        GPBUtil::checkBool($var);
        $this->result = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 cas = 2;</code>
     * @return int|string
     */
    public function getCas()
    {
        return $this->cas;
    }

    /**
     * Generated from protobuf field <code>uint64 cas = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCas($var)
    {
        GPBUtil::checkUint64($var);
        $this->cas = $var;

        return $this;
    }
}