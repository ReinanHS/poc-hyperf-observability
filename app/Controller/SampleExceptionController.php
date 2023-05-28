<?php

namespace App\Controller;

use Hyperf\HttpMessage\Exception\HttpException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class responsible for exemplifying an error in the application.
 */
class SampleExceptionController extends AbstractController
{
    /**
     * Method responsible for exemplifying an error in the application.
     * @return ResponseInterface
     */
    public function __invoke(): ResponseInterface
    {
        throw new HttpException(500, 'Application example error');
    }
}