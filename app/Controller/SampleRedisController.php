<?php

namespace App\Controller;

use Hyperf\Redis\Redis;
use Psr\Http\Message\ResponseInterface;

/**
 * Class used to exemplify queries in Redis.
 */
class SampleRedisController extends AbstractController
{
    public const REDIX_EXAMPLE_KEY = 'redix_example';

    /**
     * Method used to exemplify a query in Redis.
     * @param Redis $redis
     * @return ResponseInterface
     * @throws \RedisException
     */
    public function __invoke(Redis $redis): ResponseInterface
    {
        $data = $redis->get(self::REDIX_EXAMPLE_KEY);
        if (!$data) {
            $data = hash('ripemd160', 'The quick brown fox jumped over the lazy dog.');
            $redis->setex('redix_example', 10, $data);
        }

        $this->response->getBody()->write(
            json_encode([
                'message' => 'Sample message from Redis',
                'data' => $data
            ])
        );

        return $this->response->withStatus(self::HTTP_CODE_SUCCESS)
            ->withHeader('Content-Type', 'application/json');
    }
}