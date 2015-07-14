<?php

/*
*	单例模式
*	5、用final，防止继承时。被修改权限
* 	6、禁止克隆clone
*/

class Single
{
	private $_obj = null;		//私有属性，保存对象
	
    public static function getIns(){
    	if($this->_obj == null){
    		$this->_obj == new self();
    	}
    	return $this->_obj;
    }

    //方法前用final，则方法不能被覆盖，
    //类前加final,则类不能被继承
    protected function __construct(){

    }

    //6、禁止克隆
    final protected function __clone(){

    }
}

$s1 = new Single();
$s2 = Single::getIns();
$s2 = Single::getIns();

$s3 = clone $s1;
if($s1 === $s2){
	echo '是一个对象'；
}else{
	echo "不是一个对象";
}