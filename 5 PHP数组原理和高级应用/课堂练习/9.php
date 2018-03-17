<?php
function getCombine($arr, $n) {
    $len   = count($arr);
    $total = pow(2, $len);
    $ret   = array();
    for ($i = 1; $i < $total; $i++) {
        $str    = substr(str_repeat("0", $len) . decbin($i), -$len);
        $tmparr = array_diff_key($arr, array_diff(str_split($str), array(
            '1'
        )));
        if (array_sum($tmparr) == $n) {
            $ret[] = implode($tmparr, ',');
        }
    }
    return array_unique($ret);
}
$data = array(11, 18, 12, 1, -2, 20, 8, 10, 7, 6 );
$n    = 18;
print_r(getCombine($data, $n));