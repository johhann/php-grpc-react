<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ;

/**
 */
class MessageServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \MessageRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Message(\MessageRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/MessageService/Message',
        $argument,
        ['\MessageResponse', 'decode'],
        $metadata, $options);
    }

}
