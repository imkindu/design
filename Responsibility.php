<?

/*
*	面向过程完成举报功能
*/

header('Content-Type: text/html; charset=utf-8');


// class board
// {
// 	public function process()
// 	{
// 		echo '版主删帖';
// 	}
// }

// class admin
// {
// 	public function process()
// 	{
// 		echo '管理员封账号';
// 	}
// }

// class police
// {
// 	public function process()
// 	{
// 		echo '抓起来';
// 	}
// }

// if($_POST['jubao']+0 == 1){
// 	$judge = new board;
// 	$judge->process();
// }else if($_POST['jubao']+0 == 2){
// 	$judge = new admin;
// 	$judge->process();
// }else if($_POST['jubao']+0 == 3){
// 	$judge = new police;
// 	$judge->process();	
// }

/*
*	能够完成操作，但是不够优雅
*	如果后期有比管理员大比版主小，需要加if else
*	代码不够优雅
*	利用责任链模式来处理举报问题
* 	每个人用自己的管理范围和上级
*	从低级开始处理，往上仍，一级一级处理
*/

class board
{
	protected $power = 1;
	protected $top = 'admin';
	public function process($lev)
	{
		if($lev <= $this->power){
			echo '版主删帖';
		}else{
			$top = new  $this->top;
			$top->process($lev);
		}
	}
}

class admin
{
	protected $power = 2;
	protected $top = 'police';
	public function process($lev)
	{
		if($lev <= $this->power){
			echo '管理员封账号';
		}else{
			$top = new  $this->top;
			$top->process($lev);
		}
	}
}

class police
{
	protected $power = 3;
	protected $top = null;
	public function process($lev)
	{
		if($lev <= $this->power){
			echo '抓起来';
		}else{
			// $top = new  $this->top;
			// $top->process($lev);
			echo '让子弹再分一会...';
		}
	}
}

$lev = $_POST['jubao']+0;
$judge = new board();
$judge->process($lev);
