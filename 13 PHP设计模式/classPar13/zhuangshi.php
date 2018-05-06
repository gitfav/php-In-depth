<?php

abstract class Drink
{
    /// 在抽象类中只定义了一个抽象接口
    abstract public function ShowDrink();
}


class Coffee extends Drink
{
    private $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    /// 这里就是指定了咖啡的名称
    public function ShowDrink()
    {
        echo("咖啡名称为：" . $this->name);
    }

}


abstract class DecoratorDrink extends Drink
{
    protected $drink;  //装饰对象 需要 指定装饰的 对象

    // 在装饰类中必须要保存一个对于对象的引用
    function __construct($drink)
    {
        $this->drink = $drink;
    }

    public function ShowDrink()  //实现 被装饰者 的功能
    {
        if (null != $this->drink) {
            //执行被装饰类的 ShowDrink
            $this->drink->ShowDrink();
        }
    }
}


//装饰者类，加糖
class Sugar extends DecoratorDrink
{

    /// 比如扩展咖啡的话，必须要存在咖啡这个对象 ，这里直接调用了父类的构造函数
    function __construct($drink)
    {
        parent::__construct($drink);
    }

    public function ShowDrink()
    {
        //首先必须要调用父类的 ShowDrink
        parent::ShowDrink();
        //然后下面就可以添加新功能了
        echo(" 加糖   ");
    }

}


//装饰者类，加牛奶
class Milk extends DecoratorDrink
{

    /// 比如扩展咖啡的话，必须要存在咖啡这个对象 ，这里直接调用了父类的构造函数
    function __construct($drink)
    {
        parent::__construct($drink);
    }

    public function ShowDrink()
    {
        //首先必须要调用父类的 ShowDrink
        parent::ShowDrink();
        //然后下面就可以添加新功能了
        echo("  加奶   ");
    }

}


//装饰者类，加冰块
class Ice extends DecoratorDrink
{

    /// 比如扩展咖啡的话，必须要存在咖啡这个对象 ，这里直接调用了父类的构造函数
    function __construct($drink)
    {
        parent::__construct($drink);
    }

    public function ShowDrink()
    {
        //首先必须要调用父类的 ShowDrink
        parent::ShowDrink();
        //然后下面就可以添加新功能了
        echo("  加冰   ");
    }

}

class salt extends DecoratorDrink
{
    function __construct($drink)
    {
        parent::__construct($drink);
    }

    public function ShowDrink()
    {
        parent::ShowDrink();
        echo("加盐");
    }
}


//装饰者类，加热
class  Hot extends DecoratorDrink
{

    /// 比如扩展咖啡的话，必须要存在咖啡这个对象 ，这里直接调用了父类的构造函数
    function __construct($drink)
    {
        parent::__construct($drink);
    }

    public function ShowDrink()
    {
        //首先必须要调用父类的 ShowDrink
        parent::ShowDrink();
        //然后下面就可以添加新功能了
        echo("  加热   ");
    }

}


//以下是演示效果代码

$coffee = new Coffee("咖啡一号");
$coffee = new Sugar($coffee); //给咖啡加糖，也就是使用糖来装饰咖啡
$coffee = new Hot($coffee); //给加了糖的咖啡加热，也就是使用加热来装饰咖啡
$coffee->ShowDrink(); //显示出当前咖啡的状态


echo "\n\n";

$coffee = new Coffee("咖啡二号");
$sugar = new Sugar($coffee);  //加糖
$milk = new Milk($sugar);       //加奶
$ice = new Ice($milk);           //加冰块
$ice->ShowDrink();

