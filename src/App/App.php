<?php

namespace ChessApp;

use ChessApp\Container\Container;

class App
{
    /**
     * @var Container;
     */
    private $container;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->container = Container::getInstance();
    }

    public function init(array $containerConfig)
    {
        foreach ($containerConfig as $serviceId => $serviceDefinition) {
            $this->container->addService($serviceId, $serviceDefinition);
        }
    }

    public function getContainer()
    {
        return $this->container;
    }
}
