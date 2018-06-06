<?php
namespace app\Listeners;

use SplSubject;

class MyListener extends Listener
{
    public function handler(SplSubject $event)
    {
        echo $event->name;
    }
}