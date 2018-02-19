<?php

namespace Lakshman\Events;

trait Reactor{
    protected $events = [];


    public function registerEvent($eventName)
    {
        $this->events[$eventName] = new CustomEvent($eventName);
    }

    public function addEventListener($eventName, $callback)
    {
        if(!array_key_exists($eventName, $this->events)) throw new \InvalidArgumentException("{$eventName} not set");

        $this->events[$eventName]->registerCallback($callback);
    }

    public function dispatchEvent($eventName, $args = null)
    {
        $this->events[$eventName]->dispatch($args);
    }
}