<?php

class node
{
    public $data;
    public $next;

    public function __construct($v)
    {
        $this->data = $v;
    }
}

class structData
{
    public $head;

    public static function add($obj, $node)
    {
        if (empty($obj->head)) {
            $obj->head = $node;
            return;
        }
        $nowNode = $obj->head; //nowNode 记录现在查到的节点

        while (!empty($nowNode->next)) { //判断现节点是否是尾节点，不是指向下一个节点，直到找到
            $nowNode = $nowNode->next;
        }
        $nowNode->next = $node; //尾节点的next插入值
    }

    public function del()
    {

    }
}

$struct = new structData();

$node = new node('1');
$node2 = new node('2');
$node3 = new node('3');
$node4 = new node(['4', 1]);
$node5 = new node(['5', 1]);
structData::add($struct, $node);
structData::add($struct, $node2);
structData::add($struct, $node3);
structData::add($struct, $node4);
structData::add($struct, $node5);

//$struct->add($node);
//$struct->add($node2);
//$struct->add($node3);
//$struct->add($node4);

var_dump($struct);