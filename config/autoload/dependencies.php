<?php

declare(strict_types=1);

use Hyperf\Logger\LoggerFactory;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use function Hyperf\Support\env as env;

return [
    LoggerInterface::class => function (ContainerInterface $container) {
        $app = env('APP_NAME', 'skeleton');

        $factory = $container->get(LoggerFactory::class);
        return $factory->get($app, 'default');
    }
];
