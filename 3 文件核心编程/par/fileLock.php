<?php

$file = fopen('inset.db','w');
flock($file,LOCK_EX);
sleep(15);

$a = fwrite($file, 'Hello World');
var_dump($a);

fclose($file);