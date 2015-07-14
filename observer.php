<?php
/*
*	php观察者模式
*
*/

/*
*	定义主题
*/
interface Subject
{
	public function attach($observer);		//添加观察者
	public function detach($observer);		//提出观察者
	public function notify();				//满足条件是通知观察者
	public function subjectState($subject);	//观察条件
}

/**
*	事件发生的具体实现
*/
class Boss implements Subject
{
	public $_action;
	private $_observer;

	public function attach($observer)
	{
		$this->_observer[] = $observer;
	}

	public function detach($observer)
	{
		$observerKey = array_search($observer, $this->_observer);
		if ($observerKey !== false) {
			unset($this->_observer[$observerKey]);
		}
	}

	public function notify()
	{
		foreach ($this->_observer as $value) {
			$value->update();
		}
	}

	public function subjectState($subject)
	{
		$this->_action = $subject;
	}
}

/*
*	抽象观察者
*/
abstract class observer
{
	protected $_userName;
	protected $_sub;
	
	public function __construct($name, $sub)
	{
		$this->_username = $name;
		$this->_sub = $sub;
	}

	public abstract function update();		//接收通过方法
}


/*
*	观察者
*/
class StockObserver extends Observer
{
	public function __construct($name, $sub)
	{
		parent::__construct($name, $sub);
	}

	public function update()
	{
		echo $this->_sub->_action.$this->_username." 你赶快跑.......<br/>";
	}
}


$huhansan = new Boss(); //被观察者

$gongshil = new StockObserver("三毛",$huhansan); //初始化观察者
$gongshi2 = new StockObserver("李四",$huhansan);

$huhansan->attach($gongshil); //添加一个观察者
$huhansan->attach($gongshi2); //添加一个相同的观察者
//$huhansan->detach($gongshil); //踢出基中一个观察者

$huhansan->subjectState("警察来了"); //达到满足的条件

$huhansan->notify(); //通过所有有效的观察者