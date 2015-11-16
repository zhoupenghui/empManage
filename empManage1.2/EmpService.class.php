<?php
require_once 'SqlHelper.class.php';
class EmpService{

//一个函数可以获取多少页
function getPageCount($pageSize){
	//需要查询$rowcount（共有多少条记录）
	//sql语句，查询有多少条记录
	$sql="select count(id) from emp";
	
	//实例化一个对象,要引入SqlHelpr.class.php类
	$sqlHelper=new SqlHelpr();
	//调用方法,返回结果集(bool值)
	$res=$sqlHelper->execute_dql($sql);
	
	//这样就可以计算出$pagecount
	if($row=mysql_fetch_row($res)){
		$pageCount=ceil($row[0]/$pageSize);
	}
	//释放资源
	//mysql_free_result($res);
	//关闭连接
	$sqlHelper->close_connect();
	
	//返回$pageCount
	return $pageCount;
	
}

//一个函数可以获取应当显示的雇员信息
function getEmpListByPage($pageNow,$pageSize){
	
	//发送SQL语句，验证
	$sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
	//实例化一个对象,要引入SqlHelpr.class.php类
	$sqlHelper=new SqlHelpr();
	//调用方法,返回结果集
		//$res=$sqlHelper->execute_dql($sql);
	//这里的$res是一个二维数组
		$res=$sqlHelper->execute_dql2($sql);
	//释放资源
	//mysql_free_result($res);
	//关闭连接
	$sqlHelper->close_connect();
	
	return $res;

	
	
}


//第二种使用封装的方式完成的分页（业务逻辑到这里）
function getfenyePage($fenyePage){
	
	//创建对象
	$sqlHelper=new SqlHelpr();
	//SQL语句
	//显示的雇员信息
	$sql1="select * from emp limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize.",$fenyePage->pageSize";
	//显示的总记录数
	$sql2="select count(id) from emp";
	$sqlHelper->execute_dql_fenye($sql1, $sql2, $fenyePage);
	
	//关闭连接
	$sqlHelper->close_connect();
}

}
?>
