<?php 
//PHP脚本的执行之“词法分析”。
$code = <<<'PHP_CODE'
<?php
$str = 'Hello,sijiaomao!\n';
echo $str;
PHP_CODE;

print_r(token_get_all($code));