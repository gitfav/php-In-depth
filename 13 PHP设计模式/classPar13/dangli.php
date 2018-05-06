<?php


class singleton
{
    private $_interface = null;

    public static function getInstance()
    {
        if (self::$_instance instanceof singleton) {
            return self::$_instance;
        }
        self::$_instance = new static();
    }

    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

}
