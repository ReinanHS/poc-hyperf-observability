<?php

namespace App\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class responsible for simulating external API requests.
 */
class SampleExternalApiController extends AbstractController
{
    /**
     * Method responsible for simulating a call to an external API.
     * @param Client $client
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function __invoke(Client $client): ResponseInterface
    {
        $response = $client->get('https://httpbin.org/get');

        if ($response->getStatusCode() == self::HTTP_CODE_SUCCESS) {
            $this->logger->info('requisição realizada com sucesso');

            return $response->withStatus(self::HTTP_CODE_SUCCESS)
                ->withHeader('Content-Type', 'application/json');
        }

        $this->response->getBody()->write(
            json_encode([
                'message' => 'Unable to query information',
            ])
        );

        $this->logger->error('ocorreu um erro ao realizar a requisição');
        return $this->response->withStatus(500)
            ->withHeader('Content-Type', 'application/json');
    }
}