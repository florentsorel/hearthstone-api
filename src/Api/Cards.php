<?php

namespace Rtransat\Hearthstone\Api;

/**
 * Class Cards
 * @package Rtransat\Hearthstone\Api
 */
class Cards extends AbstractApi
{
    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function all(array $parameters = [])
    {
        return $this->getRequest('/cards', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function backs(array $parameters = [])
    {
        return $this->getRequest('/cardbacks', $parameters);
    }

    /**
     * @param $name
     * @param array $parameters
     *
     * @return mixed
     */
    public function search($name, array $parameters = [])
    {
        return $this->getRequest('/cards/search/'.$name, $parameters);
    }

    /**
     * @param $set
     * @param array $parameters
     *
     * @return mixed
     */
    public function set($set, array $parameters = [])
    {
        return $this->getRequest('/cards/sets/'.$set, $parameters);
    }

    /**
     * @param $class
     * @param array $parameters
     *
     * @return mixed
     */
    public function hero($class, array $parameters = [])
    {
        return $this->getRequest('/cards/classes/'.$class, $parameters);
    }

    /**
     * @param $faction
     * @param array $parameters
     *
     * @return mixed
     */
    public function faction($faction, array $parameters = [])
    {
        return $this->getRequest('/cards/factions/'.$faction, $parameters);
    }

    /**
     * @param $quality
     * @param array $parameters
     *
     * @return mixed
     */
    public function quality($quality, array $parameters = [])
    {
        return $this->getRequest('/cards/qualities/'.$quality, $parameters);
    }

    /**
     * @param $race
     * @param array $parameters
     *
     * @return mixed
     */
    public function race($race, array $parameters = [])
    {
        return $this->getRequest('/cards/races/'.$race, $parameters);
    }

    /**
     * @param $type
     * @param array $parameters
     *
     * @return mixed
     */
    public function type($type, array $parameters = [])
    {
        return $this->getRequest('/cards/types/'.$type, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function info(array $parameters = [])
    {
        return $this->getRequest('/info', $parameters);
    }

    /**
     * @param $name
     * @param array $parameters
     *
     * @return mixed
     */
    public function get($name, array $parameters = [])
    {
        return $this->getRequest('/cards/'.$name, $parameters);
    }
}
