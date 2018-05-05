<?php

function exText() {
    try{
    return 'sdfsdfs';
//        exit;
    }catch (Exception $e){
        echo 'catch';
    }finally{
        return 'finally';
    }

}

echo exText();