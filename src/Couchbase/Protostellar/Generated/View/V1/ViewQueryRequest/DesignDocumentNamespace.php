<?php

# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: couchbase/view.v1.proto

namespace Couchbase\Protostellar\Generated\View\V1\ViewQueryRequest;

use UnexpectedValueException;

/**
 * Protobuf type <code>couchbase.view.v1.ViewQueryRequest.DesignDocumentNamespace</code>
 */
class DesignDocumentNamespace
{
    /**
     * Generated from protobuf enum <code>PRODUCTION = 0;</code>
     */
    const PRODUCTION = 0;
    /**
     * Generated from protobuf enum <code>DEVELOPMENT = 1;</code>
     */
    const DEVELOPMENT = 1;

    private static $valueToName = [
        self::PRODUCTION => 'PRODUCTION',
        self::DEVELOPMENT => 'DEVELOPMENT',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(
                sprintf(
                    'Enum %s has no name defined for value %s',
                    __CLASS__,
                    $value
                )
            );
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(
                sprintf(
                    'Enum %s has no value defined for name %s',
                    __CLASS__,
                    $name
                )
            );
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DesignDocumentNamespace::class, \Couchbase\Protostellar\Generated\View\V1\ViewQueryRequest_DesignDocumentNamespace::class);