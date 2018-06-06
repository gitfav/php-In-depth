<?php

namespace sjm\base;

abstract class Behavior {
    public $owner;

    public function attach($to) {
        $this->owner = $to;

        $methods = get_class_methods($this); 
        foreach($methods as $methodName) {
            if(strpos($methodName, 'on') === 0 && strlen($methodName) > 2) {
                $this->owner->on(lcfirst(substr($methodName, 2)), [$this, $methodName]);
            }
        }


    }
}

