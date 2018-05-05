<?php
// 可通过 set_error_handler + ErrorException 拦截php默认报错，转为异常

function trytest() {
    try {
        file_get_contents(); // parameter missing. w
    } catch ( Exception $e ) {
        echo $e->getMessage()."\n";
    } finally {
        return true;
    }
}


function myErrorHandler($errno, $errstr, $errfile, $errline){
    throw new ErrorException("Exception: ".$errstr, 0, $errno, $errfile, $errline);
}


set_error_handler("myErrorHandler");

trytest();

/*
.
.
.







register_shutdown_function(function() {
    if ($error = error_get_last()) {
        var_dump($error);
    }
});

undefined_function();

*/
