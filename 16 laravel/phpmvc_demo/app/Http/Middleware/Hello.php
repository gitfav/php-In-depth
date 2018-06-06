<?php

namespace app\Http\Middleware;

class Hello
{
    public function __construct()
    {
        
    }

    public function handle(\Closure $next)
    {
        //throw new \Exception('hello');
        echo '<br>hello Middleware!<br>';
        $next();
        
    }
}