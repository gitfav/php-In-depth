<?php

$format = '["%s",%d,%b]';
echo $jsonstr = sprintf($format,"张三丰",16,false);
$json = json_decode($jsonstr);
print_r($json);
echo json_last_error_msg();