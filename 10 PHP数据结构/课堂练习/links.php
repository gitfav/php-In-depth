<?php

 /*
|------------------------------
|  单链表算法
|------------------------------
*/
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

    /**
     * AppLication: 头部插入节点
     * Author: WRJ
     * @param $obj
     * @param $node
     */
    public static function headAdd($obj, $node)
    {
        if (empty($obj->head)) {
            $obj->head = $node;
            return;
        }

        $node->next = $obj->head;
        $obj->head = $node;
    }

    public static function del($obj, $delData)
    {
        if (empty($obj->head)) {
            return NULL;
        }
        $nowNode = $obj->head;
        $farNode = NULL;          //用于记录父节点，为了删除后直接把下个元素接到上一个节点

        while (!empty($nowNode)) {
            if ($nowNode->data == $delData) {
                if ($farNode == NULL) {
                    $obj->head = $nowNode->next;
                }else{
                    $farNode->next = $nowNode->next;
                }
                unset($nowNode);
            } else {
                $farNode = $nowNode;
                $nowNode = $nowNode->next;
            }
        }
    }
}

$struct = new structData();

$node = new node('1');
$node2 = new node('2');
$node3 = new node('3');
$node4 = new node('4ss');
$node5 = new node('5t');
/* 尾插方法
structData::add($struct, $node);
structData::add($struct, $node2);
structData::add($struct, $node3);
structData::add($struct, $node4);
structData::add($struct, $node5);
*/
structData::headAdd($struct, $node);
structData::headAdd($struct, $node2);
structData::headAdd($struct, $node3);
structData::headAdd($struct, $node4);
structData::headAdd($struct, $node5);
structData::del($struct, '3');

var_dump($struct);