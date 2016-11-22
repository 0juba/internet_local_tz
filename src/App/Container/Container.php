<?php

namespace ChessApp\Container;

class Container
{
    /**
     * @var array
     */
    private $services;
    /**
     * @var Container
     */
    private static $instance;

    public static function getInstance()
    {
        if (empty(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
        $this->services = array();
    }

    public function addService($serviceId, $serviceInstance)
    {
        $this->services[$serviceId] = $serviceInstance;
    }

    public function get($serviceId)
    {
        if (empty($this->services[$serviceId])) {
            throw new \InvalidArgumentException('Unknown service.');
        }

        if ($this->services[$serviceId] instanceof \Closure) {
            $this->services[$serviceId] = $this->services[$serviceId]();
        }

        return $this->services[$serviceId];
    }
}
