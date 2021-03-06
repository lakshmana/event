<?php
namespace Lakshman\Events;

class CustomEvent{
    protected $name;
    protected $callbacks;

    public function __construct($name)
    {
        $this->name = $name;
        $this->callbacks = [];
    }

    public function registerCallback(callable $callback)
    {
        $this->callbacks[] = $callback;
    }

    public function dispatch($args)
    {
        foreach ($this->callbacks as $callback){
            $callback($args);
        }
    }
}