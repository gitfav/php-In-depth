<?php

function event(SplSubject $event)
{
    $listener = new \app\Listeners\MyListener;

    $event->attach($listener);

    $event->notify();
}

