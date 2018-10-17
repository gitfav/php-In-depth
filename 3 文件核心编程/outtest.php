<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 18-10-17
 * Time: 下午3:21
 */

$fp = fopen('php://output', 'w');
fputs($fp, "hello\n");
fclose($fp);
//以下简写
//fputs(STDOUT, 'hello');


$fp1 = fopen('php://stdin', 'r');
echo strtoupper(fgets($fp1));
//以下简写
//echo strtoupper(fgets(STDIN));

fputs(STDOUT, strtoupper(fgets(STDIN)));