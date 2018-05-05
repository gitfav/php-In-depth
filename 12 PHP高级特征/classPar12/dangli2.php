<?php

trait dangliTrait
{
    private function __construct()
    {
        $this->init();
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new static();
        }

        return self::$_instance;
    }

    protected function init(){}

    final private function __wakeup(){} //禁止序列化，防止出现新对象

    final private function __clone(){} //禁止克隆，防止出现新对象
}

class fileDB
{
    use dangliTrait;
    private $_fp;
    private $_filePath;
    protected static $_instance;

    protected function init()
    {
        $this->_filePath = DB_FILE;
        $this->_fp = fopen($this->_filePath, 'a+');
    }

    public function __destruct()
    {
        fclose($this->_fp);
    }


    public function insert($array)
    {
        fputcsv($this->_fp, $array);
    }
}

define('DB_FILE', './test.db');
$fileDb = fileDB::getInstance();
$fileDb->insert(['langlilangligelang', 'sddddd']);
/*
class par{
    protected function __construct()
    {
        echo 1;
    }
}

class son extends par{
    public function __construct()
    {
        parent::__construct();
    }
}
$a = new son();
*/