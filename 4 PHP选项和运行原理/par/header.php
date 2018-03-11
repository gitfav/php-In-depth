<?php

#!E:\wamp\bin\php\php5.5.12\php

//参数 起始行数 行数  文件名

if($argv[1] != '-n'){
	echo '参数错误'.PHP_EOL;	
}

$star = $argv[2];
$Line = $argv[3];
$fileName = $argv[4];
$end = $star + $Line;
$text = file($fileName);
/*
$nowLine = $star;
while($nowLine < $end ) {
	print_r($text[$nowLine]);
	$nowLine++;
}

*/

// 或者

$arr = array_slice($text, $star,$Line);
$str = implode('',$arr);
echo $str.PHP_EOL;


#!/usr/local/Cellar/php71/7.1.13_24/bin/php

// $str = '';
// $cli  = $argv[1];
// $fileName = $argv[3];
// $fileNum =  $argv[2];

// if('-n' != $cli){
//     echo '命令错误',PHP_EOL;
// }
// if(!file_exists($fileName)){
//     echo '文件不存在',PHP_EOL;
// }
// $content = file($fileName);
// $arr = array_slice($content,0,$fileNum);
// print_r(implode('',$arr));