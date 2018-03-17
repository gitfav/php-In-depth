<?php

//$str = 'http://www.abc.com/ab/ss';
//$pre = '/http:\/\/www.abc.com\/.{1,}\//';
//$matches = '';
//preg_match_all($pre, $str, $matches);
//var_dump($matches);

//exit;
$items = array(
    array('http://www.abc.com/a/', 100, 120),
    array('http://www.abc.com/b/index.php', 50, 80),
    array('http://www.abc.com/a/index.html', 90, 100),
    array('http://www.abc.com/a/?id=12345', 200, 33),
    array('http://www.abc.com/c/index.html', 10, 20),
    array('http://www.abc.com/abc/', 10, 30)
);

$pre = '/http:\/\/www.abc.com\/.{1,}\//';
$map = [];

foreach ($items as $k => $v) {
    $matches = '';
    preg_match_all($pre, $v[0], $matches);
    $matches = $matches[0][0];
    if (isset($map[$matches])) {
        $map[$matches][1] += $v[1];
        $map[$matches][2] += $v[2];
    } else {
        $map[$matches] = $v;
    }
}
array_values($map);
var_dump($map);