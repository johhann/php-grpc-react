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
        $response = new MessageResponse;
        $response->setMessage($request->getMessage());

        return $response;
    }
}
