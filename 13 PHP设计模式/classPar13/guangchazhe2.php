<?php


class Post implements SplSubject
{
    protected $_userid = null;
    protected $_ip = null;
    protected $_content = null;

    public $ticker = null;

    protected $_observerlist = array();

    function __construct()
    {

    }

    public function attach(SplObserver $observer)
    {
        $this->_observerlist[] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        foreach ($this->_observerlist as $key => $value) {
            if ($observer === $value) {
                unset($this->_observerlist[$key]);
            }
        }
    }

    public function notify()
    {
        foreach ($this->_observerlist as $value) {
            $value->update($this);
        }
    }

    public function addPost()
    {
        $this->_userid = '123';
        $this->notify();
        //do something else...

        //
    }
}

class SendMail implements SplObServer
{

    public function update(SplSubject $subject)
    {
        echo(date('Y-m-d H:i:s') . " success!\n");
    }

}

class SendMsm implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo(date('Y-m-d H:i:s') . " success!\n");
    }
}

$post = new Post();
$post->attach(new SendMail());
$post->attach(new SendMsm());
$post->addPost();
