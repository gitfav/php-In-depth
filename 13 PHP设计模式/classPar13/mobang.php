<?php
/** 说明：
 * 一个抽象类公开定义了执行它的方法的方式/模板，
 *  它的子类可以按需要重写方法实现，但调用将以抽象类中定义的方式进行。
 */

/**
 *优点： 1、封装不变部分，扩展可变部分。 2、提取公共代码，便于维护。 3、行为由父类控制，子类实现。
 *缺点：每一个不同的实现都需要一个子类来实现，导致类的个数增加，使得系统更加庞大。
 *使用场景： 1、有多个子类共有的方法，且逻辑相同。 2、重要的、复杂的方法，可以考虑作为模板方法。
 *注意事项：为防止恶意操作，一般模板方法都加上 final 关键词。
 */

abstract class game
{
    abstract public function initialize();

    abstract public function startPlay();

    abstract public function endPlay();

    public final function play()//使用通用的方法，可以把公用的抽象出来。在抽象类中实现。具体步骤在子类执行。
    {
        $this->initialize();
        $this->startPlay();
        $this->endPlay();
    }
}

class Crick extends game
{
    public function initialize()
    {
        echo 'init Crick';
    }
    public function startPlay()
    {
        echo 'starPlay Crick';
    }
    public function endPlay()
    {
        echo 'endPlay Crick';
    }
}


class Football  extends game
{
    public function initialize()
    {
        echo 'init Football ';
    }
    public function startPlay()
    {
        echo 'starPlay Football ';
    }
    public function endPlay()
    {
        echo 'endPlay Football ';
    }
}

$a = new Crick();
$a->play();


$a = new Football();
$a->play();