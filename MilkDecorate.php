<?php

/*
*	以餐厅饮料为例子，详细讲解装饰模式
*				beverage
*				/	   \
*		     coffee   condiment
*					   /     \
*					milk     mocha
*
*	对于饮料，原材料价格上涨，则对应的饮料价格也上涨
*
*/

/*
*	饮料抽象类
*/
abstract class Beverage
{
	public $_name;						//当前类，产品名称
	abstract public function cost();
}

/*
*	原料类coffee
*/
class Coffee extends Beverage
{
	public function __construct()
	{
		$this->_name = 'Coffee';
	}

	public function cost()
	{
		return 1.00;
	}
}

/*
*	以下三个是装饰着相关类，添加了调料，更好喝一点
*/
class CondimentDecorator extends Beverage
{
	public function __construct()
	{
		$this->_name = 'Condiment';
	}

	public function cost()
	{
		return 0.1;
	}
}

class Milk extends CondimentDecorator
{
	public $_beverage;
	public function __construct($beverage)
	{
		$this->_name = 'milk';
		if($beverage instanceof Beverage){
			$this->_beverage = $beverage;
		}else{
			exit('Failure');
		}
	}

	public function cost()
	{
		return $this->_beverage->cost() + 0.2;
	}
}

class Sugar extends CondimentDecorator
{
	public $_beverage;
	public function __construct($beverage)
	{
		$this->_name = 'sugar';
		if($beverage instanceof Beverage){
			$this->_beverage = $beverage;
		}else{
			exit('Failure');
		}
	}

	public function cost()
	{
		return $this->_beverage->cost() + 0.3;
	}

}

//test
$coffee = new Coffee();
print_r($coffee->cost());

$milk = new Milk($coffee);
print_r($milk->cost());

$sugar = new Sugar($milk);
print_r($sugar->cost());