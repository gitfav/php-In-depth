<?php
    $getInput = file_get_contents('php://input', 'r');

    $inputArr = explode('&',$getInput);

    $arr = [];
    foreach ($inputArr as $k => $v) {
        $thisArr = explode('=',$v);
        var_dump($thisArr);
        $arr[$thisArr[0]] = $thisArr[1];
    }

//echo var_export($arr,true);
file_put_contents('ex.php', '<?php return '.var_export($arr,true));
