<?php

namespace Rtransat\Hearthstone;

use Rtransat\Hearthstone\HttpClient\HttpClientInterface;
use Rtransat\Hearthstone\HttpClient\HttpClient;

/**
 * Class Client
 * @package Rtransat\Hearthstone
 */
class Client
{
    /**
     * @var
     */
    protected $options;

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * @param HttpClientInterface|null $httpClient
     */
    public function __construct(HttpClientInterface $httpClient = null)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param $name
     *
     * @return Api\Cards
     */
    public function api($name)
    {
        switch ($name) {
            case 'cards':
                $api = new Api\Cards($this);
                break;
            default;
                throw new \InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name));
        }

        return $api;
    }

    /**
     * @param HttpClientInterface $httpClient
     */
    public function setHttpClient(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return null|HttpClient|HttpClientInterface
     */
    public function getHttpClient()
    {
        if (null === $this->httpClient) {
            $this->httpClient = new HttpClient();
        }

        return $this->httpClient;
    }

    /**
     * @param $name
     * @param $args
     *
     * @return Api\Cards
     */
    public function __call($name, $args)
    {
        try {
            return $this->api($name);
        } catch (\InvalidArgumentException $e) {
            throw new \BadMethodCallException(sprintf('Undefined method called: "%s"', $name));
        }
    }
}
