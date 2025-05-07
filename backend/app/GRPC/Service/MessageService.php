<?php

namespace GRPC\Service;

use MessageRequest;
use MessageResponse;
use MessageServiceInterface;
use Spiral\RoadRunner\GRPC\ContextInterface;

class MessageService implements MessageServiceInterface
{
    public function Message(ContextInterface $ctx, MessageRequest $request): MessageResponse
    {
        $message = $request->getMessage();
        $response = new MessageResponse;
        $response->setMessage('Pong: '.$message);

        return $response;
    }
}
