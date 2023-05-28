<?php

declare(strict_types=1);

use App\Controller\IndexController;
use App\Controller\SampleExternalApiController;
use App\Controller\SampleDatabaseController;
use App\Controller\SampleExceptionController;
use App\Controller\SampleInternalApiController;
use App\Controller\SampleRedisController;
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', IndexController::class);

Router::addGroup('/trace', function (){
    Router::addRoute('GET', '/external-api', SampleExternalApiController::class);
    Router::addRoute('GET', '/internal-api', SampleInternalApiController::class);
    Router::addRoute('GET', '/redis', SampleRedisController::class);
    Router::addRoute('GET', '/database', SampleDatabaseController::class);
    Router::addRoute('GET', '/exception', SampleExceptionController::class);
});

Router::get('/favicon.ico', function () {
    return '';
});
