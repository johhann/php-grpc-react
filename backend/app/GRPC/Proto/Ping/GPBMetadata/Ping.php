<?php

// Generated by the protocol buffer compiler.  DO NOT EDIT!
// NO CHECKED-IN PROTOBUF GENCODE
// source: ping.proto

namespace GPBMetadata;

class Ping
{
    public static $is_initialized = false;

    public static function initOnce()
    {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
            return;
        }
        $pool->internalAddGeneratedFile(
            "\x0A\xA2\x01\x0A\x0Aping.proto\"\x17\x0A\x04Ping\x12\x0F\x0A\x07message\x18\x01 \x01(\x09\"\x1E\x0A\x0BPingRequest\x12\x0F\x0A\x07message\x18\x01 \x01(\x09\"\x1F\x0A\x0CPingResponse\x12\x0F\x0A\x07message\x18\x01 \x01(\x0922\x0A\x0BPingService\x12#\x0A\x04Ping\x12\x0C.PingRequest\x1A\x0D.PingResponseb\x06proto3", true);

        static::$is_initialized = true;
    }
}
