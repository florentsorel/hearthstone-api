<?php

namespace Rtransat\Hearthstone\HttpClient;

use GuzzleHttp\Psr7\Response;

/**
 * Interface HttpClientInterface
 * @package Rtransat\Hearthstone\HttpClient
 */
interface HttpClientInterface
{
    /**
     * Send a GET request.
     *
     * @param string $path       Request path
     * @param array  $parameters GET Parameters
     *
     * @return Response
     */
    public function get($path, array $parameters = array());

    /**
     * @param $path
     * @param array $parameters
     *
     * @return mixed
     */
    public function request($path, array $parameters);
}
