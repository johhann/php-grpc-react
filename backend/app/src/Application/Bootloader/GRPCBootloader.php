<?php

declare(strict_types=1);

namespace App\Application\Bootloader;

use GRPC\Service\MessageService;
use GRPC\Service\PingService;
use MessageServiceInterface;
use PingServiceInterface;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\RoadRunnerBridge\Bootloader\GRPCBootloader as RoadRunnerGRPCBootloader;

final class GRPCBootloader extends Bootloader
{
    protected const BINDINGS = [];

    protected const DEPENDENCIES = [
        RoadRunnerGRPCBootloader::class,
    ];

    protected const SINGLETONS = [
        PingServiceInterface::class => PingService::class,
        MessageServiceInterface::class => MessageService::class,
    ];
}
