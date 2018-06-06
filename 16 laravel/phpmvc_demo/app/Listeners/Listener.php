<?php
namespace app\Listeners;

use \SplObserver;
use \SplSubject;

class Listener implements SplObserver
{
    public function update(SplSubject $event)
    {
        $this->handle($event);
    }

    public function handle(SplSubject $event)
    {
        var_dump($event);
    }
}