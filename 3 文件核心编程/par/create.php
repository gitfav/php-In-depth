<?php
    
    $str = 'a';

    while(fopen($str,'w')){
        $str .= 'a';   
    }

    fstat('a');//检查文件的信息
