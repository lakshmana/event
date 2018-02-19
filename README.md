# event
The CustomEvent interface represents events initialized by an application for any purpose.

The Reactor trait allows class instance to add and dispatch events as in javascript. The usage is simple with the following self explanatory example.

```
<?php

use Lakshman\Events\Reactor;

require 'src/Lakshman/Events/CustomEvent.php';
require 'src/Lakshman/Events/Reactor.php';


class Test
{
    use Reactor;


    public function __construct()
    {
        //add events for the object instance
        $this->registerEvent('update');
        $this->registerEvent('stop');
    }

    public function doSomeTask()
    {
        //do some task
        //
        
        //dispatch event after some task
        $this->dispatchEvent('update', $this->updateData());
    }

    public function stop()
    {
        //some task..
        //..
        
        //dispatch event stop after some task
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

//$test->removeEventListener('update');

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
$test->stop();
```
