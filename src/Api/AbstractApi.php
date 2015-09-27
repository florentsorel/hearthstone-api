<?php

namespace Rtransat\Hearthstone\Api;

use Rtransat\Hearthstone\Client;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AbstractApi
 * @package Rtransat\Hearthstone\Api
 */
abstract class AbstractApi
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $path
     * @param array $parameters
     *
     * @return mixed
     */
    public function getRequest($path, array $parameters = [])
    {
        $parameters = $this->configureOptions($parameters);
        $response = $this->client->getHttpClient()->get($path, $parameters);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $options
     * @return array
     */
    protected function configureOptions(array $options = [])
    {
        $resolver = new OptionsResolver();

        $resolver->setDefaults([
            'attack' => null,
            'collectible' => null,
            'cost' => null,
            'durability' => null,
            'health' => null,
            'locale' => config('hearthstone-api.locale'),
        ]);

        $this->options = $resolver->resolve($options);

        return $this->options;
    }
}
