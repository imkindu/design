<?php

/*
*	装饰模式完成文章修饰功能
*	@author 	imkindu
*	@date 		2015.7.20
*/

class BaseArt
{
	protected $content;
	public function __construct($content)
	{
		$this->content = $content;
	}

	public function decorator()
	{
		return $this->content;
	}

}

/*
*	编辑文章摘要
*/
class BianArt extends BaseArt
{
	protected $bian;
	public function decorator()
	{
		return parent::decorator().'小编:'.$this->bian;
	}
}