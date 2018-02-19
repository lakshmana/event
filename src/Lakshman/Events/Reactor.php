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

    public function removeEventListener($eventName)
    {
        if(!array_key_exists($eventName, $this->events)) throw new \InvalidArgumentException("{$eventName} not set");

        unset($this->events[$eventName]);
    }

    public function dispatchEvent($eventName, $args = null)
    {
        if(!array_key_exists($eventName, $this->events)) return;
        $this->events[$eventName]->dispatch($args);
    }
}