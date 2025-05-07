<?php

// GENERATED CODE -- DO NOT EDIT!

class PingServiceClient extends \Grpc\BaseStub
{
    /**
     * @param  string  $hostname  hostname
     * @param  array  $opts  channel options
     * @param  \Grpc\Channel  $channel  (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null)
    {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param  \PingRequest  $argument  input argument
     * @param  array  $metadata  metadata
     * @param  array  $options  call options
     * @return \Grpc\UnaryCall
     */
    public function Ping(\PingRequest $argument,
        $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/PingService/Ping',
            $argument,
            ['\PingResponse', 'decode'],
            $metadata, $options);
    }
}
