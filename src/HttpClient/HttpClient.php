<?php

namespace Rtransat\Hearthstone\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * Class HttpClient
 * @package Rtransat\Hearthstone\HttpClient
 */
class HttpClient implements HttpClientInterface
{
    /**
     * @var array
     */
    protected $options = [
        'base_uri' => 'https://omgvamp-hearthstone-v1.p.mashape.com',
    ];

    /**
     * @param ClientInterface|null $client
     */
    public function __construct(ClientInterface $client = null)
    {
        $this->options['headers'] = ['X-Mashape-Key' => config('hearthstone-api.api_key')];
        $client = $client ?: new Client($this->options);
        $this->client = $client;
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($path, array $parameters = [])
    {
        return $this->request($path, $parameters);
    }

    /**
     * @param $path
     * @param array $parameters
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function request($path, array $parameters = [])
    {
        $response = $this->client->get(
            $path,
            [
                'query' => $parameters,
            ]
        );

        return $response;
    }
}
