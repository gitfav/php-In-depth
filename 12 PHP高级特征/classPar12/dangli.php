<?php


class fileDB
{
    private $_fp;
    private $_filePath;
    protected static $_instance;

    /**
     * 使用private，可以让外部无法new一个对象。 这样只能内部使用。
     * 通过getInstance静态函数，赋值且只赋一次到静态变量上，由此实现单列模式
     */
    private function __construct()
    {
        $this->_filePath = DB_FILE;
        $this->_fp = fopen($this->_filePath, 'a+');
    }

    public function __destruct()
    {
        fclose($this->_fp);
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new static();
        }

        return self::$_instance;
    }

    public function insert($array)
    {
        fputcsv($this->_fp,$array);
    }
}

//$fileDb = new fileDB(); // 此处会报错

define('DB_FILE', './test.db');
$fileDb = fileDB::getInstance();
$fileDb->insert(['langlilangligelang','sddddd']);