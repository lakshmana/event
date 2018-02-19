<?php

use Lakshman\Events\Reactor;

require 'src/Lakshman/Events/CustomEvent.php';
require 'src/Lakshman/Events/Reactor.php';


class Test
{
    use Reactor;


    public function __construct()
    {
        $this->registerEvent('update');
        $this->registerEvent('stop');
    }

    public function doSomeTask()
    {
        //
        $this->dispatchEvent('update', $this->updateData());
    }

    public function stop()
    {
        $this->dispatchEvent('stop');
    }

    public function updateData()
    {
        return rand();
    }

}


$test = new Test();

/**
 * assign callback for the event update
 */
$test->addEventListener('update', function($args){
    var_dump($args);
});

/**
 * assign callback for the stop event
 */
$test->addEventListener('stop', function(){
    echo 'stopped!';
});


/**
 * do some task and in the process the event update will be fired
 * this event will be catched by the listener
 */
$test->doSomeTask();
$test->doSomeTask();
$test->doSomeTask();
$test->stop();