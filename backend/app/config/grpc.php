<?php

declare(strict_types=1);

return [
    /**
     * Path to protoc-gen-php-grpc library.
     * Default: null
     */
    'binaryPath' => null,
    // 'binaryPath' => __DIR__.'/../../protoc-gen-php-grpc',

    'services' => [
        __DIR__.'/../../proto/echo.proto',
        // APP\GRPC\Service\PingService::class,
    ],

    'generatedPath' => directory('root').'/backend/app/GRPC',

    /**
     * The root dir for all proto files, where imports will be searched.
     */
    'servicesBasePath' => directory('root').'/proto',

];
