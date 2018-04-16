<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 2018/4/16
 * Time: 15:32
 */

//斐波那契数列   1,1,2,3,5,8...

//假设是第 n 个数   f(n) = f(n-1) + f(n-2) (n>2)

function fib($n)
{
    //如果是解决兔子问题，兔子开始有两只 ,所以假设n=0的时候就有一只，这样保证n=1就有两只。
    if ($n <= 0) {
        return 1;
    }

    /**
     * 这是正常的斐波那契数列 判断

    if ($n <= 2) {
        return 1;
    }

     */

    return fib($n - 1) + fib($n - 2);
}

echo fib(1);