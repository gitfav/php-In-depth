<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 18-10-17
 * Time: 下午8:26
 */
$handle = fopen('./testData', 'r');
//如果上面文件不可读取或者不存在，fopen 函数返回 FALSE并且发出一条警告。
//如果不中止，feof会一直返回false。使下面程序陷入死循环

if ($handle == false) {
    exit('文件不存在！');
}

$s = fgets($handle);
print_r($s);
$s = fgets($handle);
print_r($s);

while (!feof($handle)) {
    print_r(fgets($handle));
}

fclose($handle);

//获取网页数据
//$handle_b = fopen('https://www.baidu.com', 'r');
//
//while (!feof($handle_b)) {
//    print_r(fgets($handle_b));
//}
//
//fclose($handle_b);


$handle = fopen('./testData', 'r');
while (!feof($handle)) {
    $contents = fread($handle, 800);
    print_r($contents);
}
fclose($handle);

//Note:

//如果只是想将一个文件的内容读入到一个字符串中，用 file_get_contents()，它的性能比上面的代码好得多。