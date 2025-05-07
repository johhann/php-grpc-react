<?php

declare(strict_types=1);

namespace App\Endpoint\Web;

use Psr\Http\Message\ServerRequestInterface;
use Spiral\Router\Annotation\Route;

class PingController
{
    #[Route(route: '/PingService/Ping', name: 'ping', methods: 'POST')]
    public function ping(ServerRequestInterface $request)
    {
        return $request->getBody();
    }
}
