<?php

namespace App\Application\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Spiral\Core\CoreInterface;

class CorsMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $core): ResponseInterface
    {
        // Handle OPTIONS preflight
        if ($request->getMethod() === 'OPTIONS') {
            return $this->createPreflightResponse();
        }

        $response = $core->handle($request);

        return $this->withCorsHeaders($response);
    }

    private function withCorsHeaders(ResponseInterface $response): ResponseInterface
    {
        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Methods', 'POST, GET, OPTIONS')
            ->withHeader('Access-Control-Allow-Headers', 'Content-Type');
    }

    private function createPreflightResponse(): ResponseInterface
    {
        return (new \Nyholm\Psr7\Response())
            ->withStatus(204)
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Methods', 'POST, GET, OPTIONS')
            ->withHeader('Access-Control-Allow-Headers', 'Content-Type');
    }
}
