<?php

class test implements ArrayAccess
{
    private $testData;

    public function offsetExists($key)
    {
        return isset($this->testData[$key]);
    }

    public function offsetSet($key, $value)
    {
        $this->testData[$key] = $value;
    }

    public function offsetGet($key)
    {
        return $this->testData[$key];
    }

    public function offsetUnset($key)
    {
        unset($this->testData[$key]);
    }
}

$arr_obj = new test();

$arr_obj['123'] = 'sf';

if(!isset($arr_obj[4])) {
    var_dump(1);
    $arr_obj[4] = 'set';
}

unset($arr_obj[4]);
var_dump($arr_obj[4]);
var_dump($arr_obj['123']);