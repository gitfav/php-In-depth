<?php

$string = 'ooiwqenisfmkeef12';

$string2 = [];

$string_arr = str_split($string);

foreach ($string_arr as $k=>$v){
    $str = array_pop($string_arr);
    array_push($string2,$str);
}

$str = implode($string2,'');
var_dump($str);