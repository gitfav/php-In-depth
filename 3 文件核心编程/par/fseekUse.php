<?php

// $fp = fopen("xiaocheng.avi", "r");
// fseek($fp, 0x20);
// $microSecPerFrameHex = fread($fp, 4);
// fseek($fp, 0x30);
// $totalFramesHex = fread($fp, 4);

// var_dump(unpack("I", $totalFramesHex));exit;
// //var_export( bin2hex($microSecPerFrameHex));
// $microSecPerFrame = implode('', unpack("L", $microSecPerFrameHex));
// //echo $microSecPerFrame;
// $totalFrames = implode('', unpack("L", $totalFramesHex));

// echo date("i:s",  ceil($microSecPerFrame * $totalFrames / 1000000));




 #php -r "echo hex2bin('B2A9CEC4CAB5B4EFE4A8BAFEB5EAB6FEB5EA'); "


#php -r "echo hex2bin('C7ECC9D0B1B1B5C0C7ECD6DDCAD0'); "

$fd=fopen('qqwry.dat', 'rb');

$DataBegin = fread($fd, 4);  //第一条索引的绝对偏移
$DataEnd = fread($fd, 4) ;   //最后一条索引的绝对偏移

$ipbegin = implode('', unpack('L', $DataBegin));
$ipend = implode('', unpack('L', $DataEnd));


fseek($fd, $ipend ); //定位到最后一条索引的偏移地址()

$ipData1 = fread($fd, 4);  //起始IP地址的4个字节 , 内容为 ” 00 FF FF FF “ (255.255.255.0 ?)
$ipnum = implode('', unpack('L', $ipData1));
//if($ipnum < 0) $ipnum += pow(2, 32);  //4294967040，变为正数
//echo $ipnum."\n" ;

$ipData2 = fread($fd, 3);  //3个字节的偏移地址 ，代表记录区的位置
$ipPos = implode('', unpack('L', $ipData2.chr(0) ) );  // “  05  71 5E 00 ” 补充上4个字节，才能用 L

fseek($fd, $ipPos ); //定位到实际的数据记录
//$IP = fread($fd, 4); //读取第4个字节的IP地址(255.255.255.255)

//$ipFlag = fread($fd, 1); //读取定向模式，因为是最后一条记录是纯真数据库的版本信息，不是重定向模式，所以不用判断 ipFlag

//fseek($fd, -1, SEEK_CUR);   //文件指针从当前位置往前移动一个字节

$国家=''; 
//以下代码循环读取文件数据，碰到 0 就停止，得到 国家的字符串
while(($char = fread($fd, 1)) != chr(0)){
	$国家 .= $char;
}
echo $国家."\n";
//echo $ipAddr;
/*
记录读取1个字节，判断看是什么模式？ 
不过此处不用判断,因为最后一条记录比较特殊，就是存放的纯真数据库的版本信息

*/
$地区='';
while(($char = fread($fd, 1)) != chr(0)){
	$地区 .= $char;
}
echo $地区;


//结果是 ：纯真网络  2014年5月10日IP数据
