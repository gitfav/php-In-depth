<?php
/**
 * 递归排序好父子级
 */
$arr = [
    ['id' => 1, 'par' => 0, 'name' => 'asd1'],
    ['id' => 2, 'par' => 0, 'name' => 'asd2'],
    ['id' => 3, 'par' => 2, 'name' => 'asd3'],
    ['id' => 4, 'par' => 0, 'name' => 'asd4'],
    ['id' => 5, 'par' => 0, 'name' => 'asd5'],
    ['id' => 6, 'par' => 1, 'name' => 'asd6'],
    ['id' => 7, 'par' => 2, 'name' => 'asd7'],
    ['id' => 8, 'par' => 7, 'name' => 'asd8'],
    ['id' => 9, 'par' => 3, 'name' => 'asd9'],
    ['id' => 10, 'par' => 0, 'name' => 'asd10'],
    ['id' => 11, 'par' => 6, 'name' => 'asd11'],
    ['id' => 12, 'par' => 1, 'name' => 'asd12'],
    ['id' => 13, 'par' => 10, 'name' => 'asd13'],
    ['id' => 14, 'par' => 4, 'name' => 'asd14'],
    ['id' => 15, 'par' => 14, 'name' => 'asd15'],
    ['id' => 16, 'par' => 15, 'name' => 'asd16'],
    ['id' => 17, 'par' => 0, 'name' => 'asd17'],
    ['id' => 18, 'par' => 14, 'name' => 'asd18'],
];

function findChilds($arr, $pInfo)
{
    if(empty($pInfo)) {
        $pid = 0;
    }else{
        $pid = $pInfo['id'];
    }
    foreach ($arr as $k => $v) {
        if ($v['par'] == $pid) {
            unset($arr[$k]);
            $pInfo['child'][] = findChilds($arr, $v); //继续找子集，找到的子集返回赋值
        }
    }
    return $pInfo;
}

var_dump(findChilds($arr, $arr[3]));