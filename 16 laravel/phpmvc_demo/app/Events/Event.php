<?php
namespace app\Events;

use SplSubject;
use SplObserver;

/**
 * 事件对象
 */
class Event implements SplSubject
{
    private $listeners = [];

    /**
     * 添加事件监听器
     *
     * @param SplObserver $listener
     */
    public function attach(SplObserver $listener)
    {
        if (!in_array($listener, $this->listeners)) {
            $this->listeners[] = $listener;
        }
    }

    /**
     * 移除事件监听器
     *
     * @param SplObserver $listener
     */
    public function detach(SplObserver $listener)
    {
        if (false !== ($index = array_search($listener, $this->listeners))) {
            unset($this->listeners[$index]);
        }
    }

    /**
     * 实现提示信息方法
     */
    public function notify()
    {
        foreach ($this->listeners as $listener) {
            $listener->update($this);
        }
    }
}
