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

    /**
     * AppLication: 添加值到二叉搜索树
     * Author: WRJ
     * @param $obj
     * @param $node
     */
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

    /**
     * AppLication: 找到后继节点
     * Author: WRJ
     * @param $obj
     * @param $num
     * @return array|bool
     */
    public static function findBack($obj, $num)
    {
        if (empty($obj->head)) {
            return false;
        }
        $nowNode = $obj->head;

        $arr = [];
        self::findBackSon($nowNode, $num, $arr);
        return $arr;
    }

    public static function findBackSon($node, $num, &$arr)
    {
        if (!empty($node->left)) {
            self::findBackSon($node->left, $num, $arr);
        }
        if (isset($arr['this']) && !isset($arr['next'])) {
            $arr['next'] = $node;
        }
        if ($node->data == $num) {
            $arr['this'] = $node;
        }
        if (!empty($node->right)) {
            self::findBackSon($node->right, $num, $arr);
        }
    }

    public static function del()
    {
        //方法1
        //1、删除一个节点时，找到此节点右边最小节点。
        //2、如果此节点没有左右节点。直接代替要删除的节点
        //3、如果此节点有右节点。此节点和要删除的节点互换，然后删除要删除的节点
    }

    /**
     * AppLication: 找到二叉搜索树的某个值
     * Author: WRJ
     * @param $obj
     * @param $val
     * @return bool|null
     */
    public static function findVal($obj, $val)
    {
        if (empty($obj->head)) {
            return false;
        }
        $nowNode = $obj->head;
        return self::find($nowNode, $val);
    }

    /**
     * AppLication: 找自己及其子树下和$val相同的值
     * Author: WRJ
     * @param $node
     * @param $val
     * @return null
     */
    public static function find($node, $val)
    {
        if ($node->data == $val) {
            return $node;                           //这里只查到一个值。
        } else if ($node->data > $val) {            //如果大于值，到它的左子树找，左子树也是同样的原理找值
            if (empty($node->left)) {
                return NULL;
            }
            return self::find($node->left, $val);   //如果有左子树，去左子树下找
        } else {                                    //如果大于值，到它的右子数找
            if (empty($node->right)) {
                return NULL;
            }
            return self::find($node->right, $val);
        }
    }
}

$arr = [32, 22, 11, 1231, 12, 564, 774, 54, 9786, 5, 676, 43, 23, 2];

$struct = new structData();
foreach ($arr as $k => $v) {
    $node = new node($v);
    structData::add($struct, $node);
}
//var_dump($struct);die;
//$a = structData::findBack($struct, 43);
//var_dump($a);
var_dump(structData::findVal($struct, 9786));