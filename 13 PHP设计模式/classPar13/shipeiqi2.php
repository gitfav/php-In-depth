<?php
/*

适配器模式：将一个类的接口转换成客户希望的另外一个接口。Adapter模式使得原本由于接口不兼容而不能一起工作的那些类可以一起工作。

举个例子：美国的家用电器适用的标准电压是110V，而我们中国的家用电器标准电压是220V。且，我们家庭供电是220V，仅设现在你家以前有朋友帮你从美国带了一些家电回来。可是咱们这电压不适合，但是放在那里不用，重新去买又浪费资源，那现在我们要想办法，将这些家电利用起来，我们就可以去市场买一个变压插座，将220V的电流接进去，而接出来的会自动降压到110V，那么这个变压插座所充当的角色就是：适配器。其实类似的例子有很多，比如从电信拉ADSL，你也需要一个分离器，然后一根接电话，一根接Model。下面列，我们以这个变压插座为例子，以代码的方式来说明：
*/

interface Target {
    function get110Power();
}


//220的插头
class Power {
    public function get220Power(){
        return 220;
    }
}

class Adapter implements Target {   //适配器
    public $Power220;

    public function __construct(Power $power)
    {
        $this->Power220 = $power;
    }
    //变压过程
    public function get110Power() {
        return $this->Power220->get220Power() - 110;
    }

}


//美国
$it = new Adapter(new Power());
$power = $it->get110Power();
echo $power;

//<?php
///*
//
//适配器模式：将一个类的接口转换成客户希望的另外一个接口。Adapter模式使得原本由于接口不兼容而不能一起工作的那些类可以一起工作。
//
//举个例子：美国的家用电器适用的标准电压是110V，而我们中国的家用电器标准电压是220V。且，我们家庭供电是220V，仅设现在你家以前有朋友帮你从美国带了一些家电回来。可是咱们这电压不适合，但是放在那里不用，重新去买又浪费资源，那现在我们要想办法，将这些家电利用起来，我们就可以去市场买一个变压插座，将220V的电流接进去，而接出来的会自动降压到110V，那么这个变压插座所充当的角色就是：适配器。其实类似的例子有很多，比如从电信拉ADSL，你也需要一个分离器，然后一根接电话，一根接Model。下面列，我们以这个变压插座为例子，以代码的方式来说明：
//*/
//
//interface Target {
//    function get110Power();
//}
//
//
////220的插头
//class Power {
//    public function get220Power(){
//        return 220;
//    }
//}
//
//class Adapter extends Power implements Target {
//
//    //变压过程
//    public function get110Power() {
//        return $this->get220Power() - 110;
//    }
//
//}
//
//
////美国
//$it = new Adapter();
//$power = $it->get110Power();
//echo $power;