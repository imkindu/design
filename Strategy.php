<?php

/*
*	策略模式（strategy）
*	@author 	imkindu
*	@version 	1.0
*	
*/

/*
*	定义抽象角色类
*/
interface Compute
{
	public function reckon($num1, $num2);
}


/*
*	定义具体策略类
*/
class Add implements Compute
{
	public function reckon($num1, $num2)
	{
		return $num1+$num2;
	}
}

class Minus implements Compute
{
	public function reckon($num1, $num2)
	{
		return $num1-$num2;
	}
}

/*
*	具体实现
*/
class Sum
{
	protected $obj1 = null;
	public function __construct($type)
	{
		$this->obj1 = new $type();
	}

	public function jisuan($num1, $num2)
	{
		//var_dump($this->obj1);
		return $this->obj1->reckon($num1, $num2);
	}
}

$a = new Sum('Add');
print_r($a->jisuan(12,13));