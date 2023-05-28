<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;

class IndexController extends AbstractController
{
    /**
     * Method responsible for exemplifying the creation of a span manually
     * @return ResponseInterface
     */
    public function __invoke(): ResponseInterface
    {
        $span = $this->startSpan('sample span');

        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        $span->finish();
        $this->response->getBody()->write(
            json_encode([
                'message' => 'Sample message',
                'data' => [
                    'method' => $method,
                    'message' => "Hello {$user}.",
                ]
            ])
        );

        return $this->response->withStatus(self::HTTP_CODE_SUCCESS)
            ->withHeader('Content-Type', 'application/json');
    }
}
