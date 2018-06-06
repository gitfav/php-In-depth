<?php

namespace sjm;

define('APP_ROOT', __DIR__);

function autoload($className) {
	if(strpos($className, 'sjm\\') === 0) {
		$className = str_replace('sjm\\', '', $className);
	}
	$classFile = APP_ROOT.DIRECTORY_SEPARATOR.str_replace('\\', DIRECTORY_SEPARATOR, $className).'.php';
	include($classFile);
}

spl_autoload_register('sjm\autoload');


define('DB_FILE', '/tmp/test2.db');


$fileDb = FileDb::getInstance();

$fileDb->on('afterInsert', function($row) {
    echo "Inserted (From ".__FUNCTION__.")\n";
});



$fileDb->attachBehavior('DbBehavior', new DbBehavior());
$fileDb->insert(array('sijiaomao', 'cat@animals.org'));


echo "The First Line is: ".$fileDb->getFirstRecord();




