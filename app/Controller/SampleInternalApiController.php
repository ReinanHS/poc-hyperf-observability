<?php

namespace App\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use function Hyperf\Support\env as env;

/**
 * Class responsible for simulating internal API requests.
 */
class SampleInternalApiController extends AbstractController
{
    /**
     * Method responsible for simulating a call to an internal API.
     * @param Client $client
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function __invoke(Client $client): ResponseInterface
    {
        $apiUrl = env('SERVICE_URL');
        $apiPort = env('SERVICE_PORT');
        $apiEndpoint = env('SERVICE_ENDPOINT');

        $uri = sprintf('%s:%s/%s', $apiUrl, $apiPort, $apiEndpoint);
        $response = $client->get($uri);

        if ($response->getStatusCode() == self::HTTP_CODE_SUCCESS) {
            return $response->withStatus(self::HTTP_CODE_SUCCESS)
                ->withHeader('Content-Type', 'application/json');
        }

        $this->response->getBody()->write(
            json_encode([
                'message' => 'Unable to query information',
            ])
        );

        return $this->response->withStatus(500)
            ->withHeader('Content-Type', 'application/json');
    }
}