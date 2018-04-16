<?php

/**
 * Class node 二叉查找树
 */
class node
{
    public $data;
    public $left;
    public $right;

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

        while (true) {
            if ($nowNode->data <= $node->data) {
                if (empty($nowNode->right)) {
                    $nowNode->right = $node;
                    break;
                } else {
                    $nowNode = $nowNode->right;
                }
            } else {
                if (empty($nowNode->left)) {
                    $nowNode->left = $node;
                    break;
                } else {
                    $nowNode = $nowNode->left;
                }
            }
        }
    }

    /**
     * AppLication: 遍历输出所有值
     * Author: WRJ
     * @param $obj
     * @return bool
     */
    public static function findAll($obj)
    {
        if (empty($obj->head)) {
            return false;
        }
        $nowNode = $obj->head;
        return self::findSons($nowNode);
    }

    public static function findSons($node)
    {
        $left_arr = $right_arr = [];
        if (!empty($node->left)) {
            $left_arr = self::findSons($node->left);
        }
        array_push($left_arr, $node->data);
        if (!empty($node->right)) {
            $right_arr = self::findSons($node->right);
        }
        return array_merge($left_arr, $right_arr);
    }

    public static function del()
    {
        //方法1
        //1、删除一个节点时，找到此节点右边最小节点。
        //2、如果此节点没有左右节点。直接代替要删除的节点
        //3、如果此节点有右节点。此节点和要删除的节点互换，然后删除要删除的节点
    }
}

$struct = new structData();

$node = new node(10);
$node2 = new node(12);
$node3 = new node(4);
$node6 = new node(3);
$node4 = new node(2);
$node5 = new node(19);
structData::add($struct, $node);
structData::add($struct, $node2);
structData::add($struct, $node3);
structData::add($struct, $node4);
structData::add($struct, $node5);
structData::add($struct, $node6);

var_dump(structData::findAll($struct));


//var_dump($struct);