<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 2018/4/17
 * Time: 14:29
 */

class searchTree
{
    public $head = NULL;

    /**
     * AppLication: 向树里添加自己，小的排左边，大的排右边
     * Author: WRJ
     * @param $obj searchTree
     * @param $node searchTreeNode
     */
    public static function add($obj, $node)
    {
        if (empty($obj->head)) {
            $obj->head = $node;
            return true;
        }

        $nowNode = $obj->head;

        while (true) {
            /*
            if ($nowNode->data >= $node->data) {
                if (!empty($nowNode->left_son)) {
                    $nowNode = $nowNode->left_son;
                } else {
                    $node->parent = $nowNode;
                    $nowNode->left_son = $node;
                    break;
                }
            } else {
                if (!empty($nowNode->right_son)) {
                    $nowNode = $nowNode->right_son;
                } else {
                    $node->parent = $nowNode;
                    $nowNode->right_son = $node;
                    break;
                }
            }
            //下面是简化写法
            */
            if ($nowNode->data >= $node->data) {
                $select = &$nowNode->left_son;
            } else {
                $select = &$nowNode->right_son;
            }
            if (!empty($select)) {  //不空找下一个节点
                $nowNode = $select;
            } else {
                $node->parent = $nowNode;
                $select = $node;
                break;
            }
        }
    }

    public static function findPre($obj, $findVal)
    {
        if (empty($obj->head)) {
            return false;
        }
        $nowNode = $obj->head;
        return self::find($nowNode, $findVal);
    }

    public static function find($node, $findVal)
    {
        $arr = [];
        while (!empty($node)) {     //只有不为空，要一直找值
            if ($node->data == $findVal) {
                $arr['this'] = $node;
                $arr['next'] = self::findAfterVal($node);
                return $arr;
            } else if ($node->data > $findVal) {
                $node = $node->left_son;
            } else {
                $node = $node->right_son;
            }
        }
        return NULL;
    }

    /**
     * AppLication: 找到某个节点的后继节点
     * Author: WRJ
     */
    public static function findAfterVal($node)
    {
        if (!empty($node->right_son)) { //如果有右子树，找到右子树最小的树
            return self::findMainVal($node->right_son);
        } else {//如果没有右子树
            //1、如果本身是左子树，父节点就是后继节点。
            //2、。。。。。右子树，向上一直找，找到父级是一个左子树，如果没有，那此节点是最大，没有后继节点
            return self::findMaxPar($node);
        }
    }

    /**
     * AppLication: 找到某节点下的最小值（就是树最左边的一个值）
     * Author: WRJ
     * @param $node
     * @return mixed
     */
    public static function findMainVal($node)
    {
        if (!empty($node->left_son)) { //左子树不空继续向左边找
            return self::findMainVal($node->left_son);
        } else { //如果左子树为空， 说明自己已经是最小
            return $node;
        }
    }

    /**
     * AppLication: 向上找比本节点大的父级（可以理解为： 从某个节点的左子树下的最大值开始 向上 找这个节点）
     * Author: WRJ
     * @param $node
     * @return null
     */
    public static function findMaxPar($node)
    {
        if (empty($node->parent)) {
            return NULL;
        }
        if ($node->parent->left_son == $node) { //1、如果本身是左子树，父节点就是后继节点。
            return $node->parent;
        }
        if ($node->parent->right_son == $node) { //2、如果本身是右子树，向上一直找，找到父级是一个左子树，如果没有，那此节点是最大，没有后继节点
            return self::findMaxPar($node->parent);
        }
    }
}

class searchTreeNode
{
    public $data;

    public $parent;
    public $left_son;
    public $right_son;

    public function __construct($val)
    {
        $this->data = $val;
    }
}

//$node1 = new searchTreeNode('16');
//$node2 = new searchTreeNode('11');
//$node3 = new searchTreeNode('12');
//$node4 = new searchTreeNode('51');
//
//$struct = new searchTree();
//searchTree::add($struct, $node1);
//searchTree::add($struct, $node2);
//searchTree::add($struct, $node3);
//searchTree::add($struct, $node4);
//
//$a = searchTree::findPre($struct, '11');
//var_dump($a);

$arr = [32, 22, 11, 1231, 12, 564, 774, 54, 9786, 5, 676, 43, 23, 2];

$struct = new searchTree();
foreach ($arr as $k => $v) {
    $node = new searchTreeNode($v);
    searchTree::add($struct, $node);
}
$a = searchTree::findPre($struct, 22);
var_dump($a);