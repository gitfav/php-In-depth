<?php

$file = fopen('inset.db','w');
flock($file,LOCK_EX); //linux下不同进程想执行锁定状态。都需要使用此函数

$a = fwrite($file, 'asdasfasfadsfdsfsdjlhkjhgkjsdhfkjsgfkjdshfkjslfksajflkjdslkfskshfes');
var_dump($a);

fclose($file);