<?php

/**
 * 用 unpack 的方式解析 table.txt ，追加一行总计
 */


$fh = fopen("./table.txt", "r");
while($row = fgets($fh)) {
    $row_arr = unpack("A10Date/x/A27Desc/x/A7Income/A*Expenditure", $row);
//    print_r($row_arr);
    echo $row;
    $income_sum += floatval($row_arr['Income']);
    $expend_sum += floatval($row_arr['Expenditure']);
}
echo "\n";
//echo pack("A10xA27xA7xA*", "-", "Totals",  $income_sum, $expend_sum)."\n";
echo pack("A11A28A8A*", "-", "Totals",  $income_sum, $expend_sum)."\n"; // 补充分隔符长度，各加1字符。“A” 会把所有无法转换为字符的数据转换为空格
echo pack("A11A28A8A*", "-", "Totals",  sprintf("%7.2f", $income_sum), sprintf("%11.2f", $expend_sum))."\n"; //解决最后一列的宽度