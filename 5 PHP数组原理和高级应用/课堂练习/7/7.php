<?php

class A
{
    private $a = 1;
    private $b = [3, '33'];
    public $c;

    function __sleep()
    {
        return ['a', 'b'];
    }

    public function show_one()
    {
        echo $this->b[1];
    }

    public function getC()
    {
        $this->c = $this->a + $this->b[0];
        return $this->c;
    }

    function __wakeup()
    {
        $this->getc();
    }
}

$a = new A;
$s = serialize($a);
// 把变量$s保存起来以便文件page2.php能够读到
file_put_contents('store', $s);

$s = file_get_contents('store');
$a = unserialize($s);

// 现在可以使用对象$a里面的函数 show_one()
$a->show_one();
echo $a->c;