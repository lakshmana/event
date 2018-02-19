<?php
/**
 * Created by PhpStorm.
 * User: procab
 * Date: 2/18/18
 * Time: 9:24 PM
 */

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