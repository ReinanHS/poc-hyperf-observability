<?php

namespace App\Controller;

use Hyperf\DbConnection\Db;
use Psr\Http\Message\ResponseInterface;

/**
 * This class is responsible for exemplifying a query made in the database.
 */
class SampleDatabaseController extends AbstractController
{
    /**
     * Method to exemplify a database query.
     * @return ResponseInterface
     */
    public function __invoke(): ResponseInterface
    {
        $data = Db::select('SELECT CURRENT_TIMESTAMP()');

        $this->response->getBody()->write(
            json_encode([
                'message' => 'SQl querying data',
                'data' => $data
            ])
        );

        $this->logger->info('consulta realizada com sucesso no banco de dados');

        return $this->response->withStatus(self::HTTP_CODE_SUCCESS)
            ->withHeader('Content-Type', 'application/json');
    }
}