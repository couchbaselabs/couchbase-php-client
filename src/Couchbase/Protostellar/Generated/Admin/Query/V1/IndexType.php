<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: couchbase/admin/query/v1/query.proto

namespace Couchbase\Protostellar\Generated\Admin\Query\V1;

use UnexpectedValueException;

/**
 * Protobuf type <code>couchbase.admin.query.v1.IndexType</code>
 */
class IndexType
{
    /**
     * Generated from protobuf enum <code>INDEX_TYPE_VIEW = 0;</code>
     */
    const INDEX_TYPE_VIEW = 0;
    /**
     * Generated from protobuf enum <code>INDEX_TYPE_GSI = 1;</code>
     */
    const INDEX_TYPE_GSI = 1;

    private static $valueToName = [
        self::INDEX_TYPE_VIEW => 'INDEX_TYPE_VIEW',
        self::INDEX_TYPE_GSI => 'INDEX_TYPE_GSI',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}
