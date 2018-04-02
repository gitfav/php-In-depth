<?php
//飞鸽 传输协议
define("IPMSG_SENDMSG", 0x00000020);
#define("IPMSG_SECRETOPT", 0x00000200);
define("IPMSG_DEFAULTPORT", 2425);

$sender = iconv("UTF-8", "GB2312", '小河');
$from = '127.0.0.1';
$msg_content = iconv("UTF-8", "GB2312", '我是不是疯了？我是不是疯了？');
$send_to = '127.0.0.1';


$fs = fsockopen("udp://" . $send_to, IPMSG_DEFAULTPORT);
fwrite($fs, "1:" . time() . ":" . $sender . ":" . $from . ":" . (IPMSG_SENDMSG) . ":" . $msg_content);

fclose($fs);