<?php
/**
 * Created by PhpStorm.
 * User: procab
 * Date: 2/18/18
 * Time: 9:24 PM
 */

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

/*
 * $event = new CustomEvent;
 * $event->registerCallback(function(){});
 * $event->dispatch('dd');
 *
 * $reactor->registerEvent('click');
 *
 * $reactor->addEventListener('click', function(){})
 * $reactpr->dispatchEvent('click');
 */