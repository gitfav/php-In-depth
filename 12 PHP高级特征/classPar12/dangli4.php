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
    protected $_behaviors = [];

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
        $method = "get{$property}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }

    }

    public function getFilePointer()
    {
        return $this->_fp;
    }


    public function attachBehavior($name, $behavior) //此类连接行为的方法
    {
        if ($behavior instanceof Behavior) {
            $this->_behaviors[$name] = $behavior;
            $behavior->attach($this);  //行为对象 和 此对象 连接
        }
    }

    public function __call($name, $params)
    {
        foreach ($this->_behaviors as $behavior) {
            if(method_exists($behavior, $name)) {
                $method = new ReflectionMethod($behavior, $name);
                if($method->isPublic()) {
                    return call_user_func_array([$behavior, $name], $params);
                }
            }
        }
        throw new Exception('Unknown method: '.get_class($this)."::$name()");
    }
}

abstract class Behavior  //行为的抽象类
{
    public $owner;

    public function attach($to) //和某个类连接
    {
        $this->owner = $to;
    }
}

class DbBehavior extends Behavior //作为fileDb这个类的行为
{
    public function getFirstRecord()
    {
        $fp = $this->owner->getFilePointer();
        $pos = ftell($fp);
        rewind($fp);
        $firstLine = fgets($fp);
        fseek($fp, $pos);
        return $firstLine;
    }
}

define('DB_FILE', './test.db');
$fileDb = fileDB::getInstance();


$fileDb->insert(['langlilangligelang', 'sddddd']);
$fileDb->attachBehavior('DbBehavior', new DbBehavior());
echo $fileDb->getFirstRecord(); //这样在 fileDb 使用行为里的函数了。可以在DbBehavior都直接扩展方法了。
//var_dump($fileDb->FilePointer);