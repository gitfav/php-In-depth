<?php

function sum($n)
{
    if ($n > 1) {
        return $n + sum($n-1);  //返回 n + 后面数的总和
    } else {
        return 1;
    }
}

echo sum(100);