<?php

header('content-type:text/html;charset=utf-8');
$file = fopen('my.db','w');
$name = pack('A20','中i个');
$age = pack('S',20);
$mail = pack('a20','87989@gmail.com');

var_dump($name.$age.$mail);
fwrite($file,$name.$age.$mail);

$content = file_get_contents('my.db');

$item = unpack('A20name/Sage/a20mail',$content);
var_dump($item);