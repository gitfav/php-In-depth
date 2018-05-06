<?php

/**
 * Interface DB
 * 适配器模式
 */

interface DB
{

    public function conn();

    public function query();

    public function close();

}


##标准的类
class Msql implements DB
{
    public function conn()
    {
        // TODO: Implement conn() method.
    }

    public function query()
    {
        // TODO: Implement query() method.
    }

    public function close()
    {
        // TODO: Implement close() method.
    }
}

##第三方类 非标准
class Sql
{
    public function sql_conn()
    {
        ##todo
    }

    public function query()
    {
        ##todo
    }

    public function close()
    {
        ##todo
    }
}


##适配器
class Adapter implements DB
{
    private $adapter;

    ##注入第三方类
    public function __construct($adapter)
    {
        $this->adapter = $adapter;
    }

    public function conn()
    {
        $this->adapter->sql_conn();
        // TODO: Implement conn() method.
    }

    public function query()
    {
        $this->adapter->sql_query();
        // TODO: Implement query() method.
    }

    public function close()
    {
        $this->adapter->sql_close();
        // TODO: Implement close() method.
    }
}


##代码实现

##标准调用
$mysql = new Msql();
$mysql->conn();
$mysql->query();
$mysql->close();


##适配器调用
$sql = new Sql();
$adapter = new Adapter($sql);
$adapter->conn();
$adapter->query();
$adapter->close();