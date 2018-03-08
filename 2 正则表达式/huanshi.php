<?php

/*
$string = '12331223123';
$pattern = '/(?<=\d)(?=(\d{3})+$)/';
$replacement = ',';
echo preg_replace($pattern, $replacement, $string);
*/

$str = 'BAC';
$pattern = '/(?=A+)[A-Z]/';
$replacement = ',';
echo preg_replace($pattern, $replacement, $str);