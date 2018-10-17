<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 18-10-17
 * Time: 下午3:03
 */
$list = [
    ['aaa', 'bbb', 'ccc'],
    ['123', '456', '789'],
    ['aaa', 'bbb'],
];

$fp = fopen('file.csv', 'w');
foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);