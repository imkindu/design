<?php

/*
*	单例模式
*   1、普通类
*   2、封锁new操作
*   3、六个接口来new对象
*   4、先判断后实例对象
*	5、用final，防止继承时。被修改权限
* 	6、禁止克隆clone
*/

header('Content-Type: text/html; charset=utf-8');

class Single
{
	public static $obj = null;		//私有属性，保存对象
	
    public static function getIns(){
    	if(self::$obj == null){
    		self::$obj == new self();
    	}
    	return self::$obj;
    }

    //方法前用final，则方法不能被覆盖，
    //类前加final,则类不能被继承
    protected function __construct(){

    }

    //6、禁止克隆
    final protected function __clone(){

    }
}

//$s1 = new Single();
$s1 = Single::getIns();
$s2 = Single::getIns();

//$s3 = clone $s2;
if($s1 === $s2){
	echo '是一个对象';
}else{
	echo "不是一个对象";
}