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

    protected function init()
    {
    }

    final private function __wakeup()
    {
    } //禁止序列化，防止出现新对象

    final private function __clone()
    {
    } //禁止克隆，防止出现新对象
}

class fileDB extends Component
{
    use dangliTrait;
    protected $_fp;
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

        if ($this->hasEventHandles('echoNo')) {
            $this->trigger('echoNo', '');
        }
        if ($this->hasEventHandles('lalala')) {
            $this->trigger('lalala', '');
        }
    }

}

abstract class Component
{
    protected $_events = [];

    public final function on($eventName, $handler)  //获取一个匿名函数。这样可实现 绑定事件 功能。
    {
        if (!isset($this->_events[$eventName])) {
            $this->_events[$eventName] = [];
        }

        if (is_callable($handler)) {
            $this->_events[$eventName][] = $handler;
        }
    }

    public function trigger($eventName, $data) //执行一个匿名函数。 （触发事件）
    {
        if (isset($eventName)) {
            foreach ($this->_events[$eventName] as $handler) {
                call_user_func($handler, $data);
            }
        }
    }

    public function hasEventHandles($eventName)
    {
        return !empty($this->_events[$eventName]);
    }

    public function __get($property) //直接使用
    {
//        $pro = 'get'.$name;
//        if(method_exists($this ,$pro)) {
//            return $this->$pro();
//        }
        $method = "get{$property}";
        if(method_exists($this, $method)) {
            return $this->$method();
        }

    }
    public function getFilePointer() {
        return $this->_fp;
    }
}

define('DB_FILE', './test.db');
$fileDb = fileDB::getInstance();

$fileDb->on('echoNo', function () {
    echo "Inserted (From ".__FUNCTION__.")<br/>";
});
$fileDb->on('echoNo', function () {
    echo "Inserted (From ".__FUNCTION__.")<br/>";
});
$fileDb->on('lalala', function () {
    echo "echo (From ".__FUNCTION__.")<br/>";
});


$fileDb->insert(['langlilangligelang', 'sddddd']);

var_dump($fileDb->FilePointer);