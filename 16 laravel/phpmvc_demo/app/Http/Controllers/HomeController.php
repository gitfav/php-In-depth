<?php
namespace app\Http\Controllers;

use app\Events\MyEvent;
use app\Listeners\MyListener;

class HomeController extends Controller
{

    public function __construct(MyEvent $event)
    {
        
    }

    public function index($a=null, $b = null)
    {
        echo 'index<br>';
        //echo \Cache::get('key');
        //$this->index();
       //require 'a.php';
    }

    public function hello($a=0, $b=0)
    {
        echo 'hello';
    }

    public function event(MyEvent $event, $id=1)
    {
        //var_dump($event);
        echo $id;
        echo 'event';
        //throw new \Exception('event');
        //require 'a.php';
        //echo 1/0;
        event(new MyEvent());


    }
}