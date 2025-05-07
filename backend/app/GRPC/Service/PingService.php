<?php

namespace GRPC\Service;

use PingRequest;
use PingResponse;
use PingServiceInterface;
use Spiral\RoadRunner\GRPC\ContextInterface;

class PingService implements PingServiceInterface
{
    public function Ping(ContextInterface $ctx, PingRequest $request): PingResponse
    {
        $response = new PingResponse;
        $response->setMessage($request->getMessage());

        return $response;
    }
}
