<?php

namespace App\Traits;

use Psr\Http\Message\ResponseInterface;

trait ResponseHandler
{
    /**
     * Handler response HTTP.
     *
     * @var ResponseInterface
     */
    private $response;

    /**
     * Handler response HTTP.
     *
     * @var ResponseInterface
     */
    private $contents = [];

    /**
     * Check that status code is 200.
     *
     * @return bool
     */
    private function isStatusCodeAccepted()
    {
        return $this->response->getStatusCode() == 200;
    }

    /**
     * @return array
     */
    public function getContents()
    {
        return json_decode(
            $this->response->getBody()->getContents(),
            true
        );
    }
}