<?php

namespace sjm\base;

use sjm\base\Behavior;
use \ReflectionMethod;

abstract class Component {
    protected $_events = [];
    protected $_behaviors = [];

    public final function on($eventName, $handler) {
        if(!isset($this->_events[$eventName])) {
            $this->_events[$eventName] = [];
        }

        if(is_callable($handler)) {
            $this->_events[$eventName][] = $handler;
        }
    }

    public final function trigger($eventName, $data) {
        if(isset($this->_events[$eventName])) {
            foreach($this->_events[$eventName] as $handler) {
                call_user_func($handler, $data);
            }
        }
    }

    public function hasEventHandlers($eventName) {
        return !empty($this->_events[$eventName]);
    }


    public function attachBehavior($name, $behavior) {
        if($behavior instanceof Behavior) {
            $this->_behaviors[$name] = $behavior;
            $behavior->attach($this);
        }
    }

    public function __call($name, $params) {
        foreach($this->_behaviors as $behavior) {
            if(method_exists($behavior, $name)) {
                $method = new ReflectionMethod($behavior, $name);
                if($method->isPublic()) {
                    return call_user_func_array([$behavior, $name], $params);
                }
            }
        }

        throw new Exception('Unknown method: '.get_class($this)."::$name()");
    }

}

