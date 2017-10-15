<?php

namespace Framework;

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

class Http
{
    /**
     * @var Dispatcher;
     */
    private $dispatcher;

    /**
     * @param Dispatcher $dispatcher
     */
    private function setDispatcher(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * ...
     */
    public function router()
    {
        $collector = new RouteCollector();

        require __DIR__ . '/../app/web.php';

        $this->setDispatcher(new Dispatcher($collector->getData()));
    }

    /**
     * ...
     */
    public function dispatcher()
    {
        $respose = $this->dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['PHP_SELF']);

        $respose instanceof View && $respose->render();

        echo $respose;
    }
}