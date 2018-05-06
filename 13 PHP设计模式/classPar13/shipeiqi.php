<?php

/**
 * 适配器模式
 * @Author: ZhangXiufeng
 * @Date:   2018-05-06 15:16:41
 * @Last Modified by:   ZhangXiufeng
 * @Last Modified time: 2018-05-06 15:25:02
 */
/*
 * 适合系统和第三方对接或者一个系统要调研旧代码，旧代码需要新新功能。
 */

interface NewNeed {
    public function method1();
    public function method2();
}

/**
 * 旧的类
 */
class Old
{
    public function method1()
    {
        echo 'this is old method1';
    }

}


/**
 * 适配器
 */
class Adapter implements NewNeed
{
    private $adapter;   //记录要对接的第三方 对象

    function __construct($adapter)
    {
        $this->adapter = $adapter;
    }

    public function method1()
    {
        $this->adapter->method1();
    }

    public function method2()
    {
        echo 'this is adapter method2';
    }
}


$adapter = new Adapter(new Old());
$adapter->method1();
echo "\n\n";
$adapter->method2();
