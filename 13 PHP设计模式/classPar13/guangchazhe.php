<?php

/**
 * 观察者模式应用场景实例
 *
 *
 * 场景描述：
 * 以购票为核心业务(此模式不限于该业务)，但围绕购票会产生不同的其他逻辑，如：
 * 1、购票后记录文本日志
 * 2、购票后记录数据库日志
 * 3、购票后发送短信
 * 4、购票送抵扣卷、兑换卷、积分
 * 5、其他各类活动等
 *
 * 传统解决方案:
 * 在购票逻辑等类内部增加相关代码，完成各种逻辑。
 *
 * 存在问题：
 * 1、一旦某个业务逻辑发生改变，如购票业务中增加其他业务逻辑，需要修改购票核心文件、甚至购票流程。
 * 2、日积月累后，文件冗长，导致后续维护困难。
 *
 * 存在问题原因主要是程序的"紧密耦合"，使用观察模式将目前的业务逻辑优化成"松耦合"，达到易维护、易修改的目的，
 * 同时也符合面向接口编程的思想。
 *
 * 观察者模式典型实现方式：
 * 1、定义2个接口：观察者（通知）接口、被观察者（主题）接口
 * 2、定义2个类，观察者对象实现观察者接口、主题类实现被观者接口
 * 3、主题类注册自己需要通知的观察者
 * 4、主题类某个业务逻辑发生时通知观察者对象，每个观察者执行自己的业务逻辑。
 *
 * 示例：如以下代码
 *
 */
#===================定义观察者、被观察者接口============

/**
 *
 * 观察者接口(通知接口)
 *
 */
interface ITicketObserver //观察者接口
{
    function onBuyTicketOver($sender, $args); //得到通知后调用的方法
}

/**
 *
 * 主题接口
 *
 */
interface ITicketObservable //被观察对象接口
{
    function addObserver($observer); //提供注册观察者方法
}

#====================主题类实现========================

/**
 *
 * 主题类（购票）
 *
 */
class HipiaoBuy implements ITicketObservable
{ //实现主题接口（被观察者）
    private $_observers = array(); //通知数组（观察者）


    public function buyTicket($ticket) //购票核心类，处理购票流程
    {
        // TODO 购票逻辑

        //循环通知，调用其onBuyTicketOver实现不同业务逻辑
        foreach ($this->_observers as $obs)
            $obs->onBuyTicketOver($this, $ticket); //$this 可用来获取主题类句柄，在通知中使用
    }

    //添加通知
    public function addObserver($observer) //添加N个通知
    {
        $this->_observers [] = $observer;
    }

}

#=========================定义多个通知====================
//短信日志通知
class HipiaoMSM implements ITicketObserver
{
    public function onBuyTicketOver($sender, $ticket)
    {
        echo(date('Y-m-d H:i:s') . " 短信日志记录：购票成功:$ticket\n");
    }
}

//文本日志通知
class HipiaoTxt implements ITicketObserver
{
    public function onBuyTicketOver($sender, $ticket)
    {
        echo(date('Y-m-d H:i:s') . " 文本日志记录：购票成功:$ticket\n");
    }
}

//抵扣卷赠送通知
class HipiaoDiKou implements ITicketObserver
{
    public function onBuyTicketOver($sender, $ticket)
    {
        echo(date('Y-m-d H:i:s') . " 赠送抵扣卷：购票成功:$ticket 赠送10元抵扣卷1张。\n");
    }
}

//发邮件通知
class SendEmail implements ITicketObserver
{    //继承观察者接口
    public function onBuyTicketOver($sender, $ticket)
    {
        echo(date('Y-m-d H:i:s') . "：购票成功:$ticket \n");
    }
}

#============================用户购票====================
$buy = new HipiaoBuy ();
$buy->addObserver(new HipiaoMSM ()); //根据不同业务逻辑加入各种通知，把各个通知解耦
$buy->addObserver(new HipiaoTxt ());
$buy->addObserver(new HipiaoDiKou ());
$buy->addObserver(new SendEmail ());
//购票
$buy->buyTicket("一排一号");
