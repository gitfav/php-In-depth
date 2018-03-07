<?php

header("Content-Type: text/html; charset=utf-8");

class test
{
    public static function &a()
    {
        static $b = 1;
        return $b;
    }

    public function &b()
    {
        static $b = 2;
        return $b;
    }
}

$c = &test::a(); //首先返回$b，但有&符号，所以得到了$b的地址，所以这是返回该函数中静态变量 $b 的地址，必须加上 & 否则不是引用传递
echo $c;
$c = 5; //引用传递变量，同时修改了上面 $b 的值

echo '<br/>' . test::a();

$dd = new test();
$a = &$dd->b(); //与上同理
$a = 6;
echo '<br/>' . $dd->b();