<?php

//这是一个工具类，作用是完成对数据库的操作
class SqlHelpr{
	//属性
	public $conn;
	public $dbname="empmanage";
	public $host="localhost";
	public $password="123456";
	public $username="root";
	//方法
	function __construct(){
		//连接数据库 
		$this->conn=mysql_connect($this->host,$this->username,$this->password);
		//判断数据库是否连接
		if(!$this->conn){
			die('数据库连接失败'.mysql_connect_error());
			
		}
		//连接数据库
		mysql_select_db($this->dbname,$this->conn) or die('该数据库连接失败'.mysql_error());
		mysql_query("set names gbk");
	}
	
	
	//执行dql语句
	function execute_dql($sql){
		//接收一个$sql语句，用mysql_query到数据库($conn---用的是哪个链接)，并返回一个结果集
		$res=mysql_query($sql,$this->conn) or die('该dql操作执行失败'.mysql_error());
		return $res;
	}
	
	//执行dql语句,但返回的是一个数组
	function execute_dql2($sql){
		//通过一个数组，把$res->$arr
		//定义一个数组
		$arr=array();
		//接收一个$sql语句，用mysql_query到数据库($conn---用的是哪个链接)，并返回一个结果集
		$res=mysql_query($sql,$this->conn) or die('该dql操作执行失败'.mysql_error());
		
		//$i=0;
		//把$res->$arr，把结果集转移到一个数组中
		while ($row=mysql_fetch_assoc($res)){
			//$arr[$i++]=$row;
			$arr[]=$row;
		}
		//这里就可以立即关闭$res资源
		mysql_free_result($res);
		//返回一个数组
		return $arr;
	}
	
	//考虑分页情况的查询，这是一个比较通用的并体现oop编程思想的代码
	//$sql1="select * from emp limit 0,6";
	//$sql2="select count(id) from emp";
	//&$fenyePage:代表引用传递
	
	function execute_dql_fenye($sql1,$sql2,$fenyePage){
		//获取SQL语句，传递给数据库并返回结果集
		$res1=mysql_query($sql1,$this->conn) or die('该dql_fenye操作执行失败'.mysql_error());
		//创建数组，把$res1的结果集传递给数组
		$arr=array();
		//把$es1的结果集传递给数组
		//获取应当显示的雇员信息
		while ($row=mysql_fetch_assoc($res1)){
			$arr[]=$row;
		}
		//关闭资源
		mysql_free_result($res1);
		
		$res2=mysql_query($sql2,$this->conn) or die('该dql_fenye操作执行失败'.mysql_error());
		if($row=mysql_fetch_row($res2)){
			//获取总页数，总记录数
			$fenyePage->pageCount=ceil($row[0]/$fenyePage->pageSize);
			$fenyePage->rowCount=$row[0];
		}
		
		//关闭资源
		mysql_free_result($res2);
		
		//把$arr赋给$fenyePage
		$fenyePage->res_array=$arr;
		
	}
	
	
	//执行dml语句
	function execute_dml($sql){
		//接收一个$sql语句，用mysql_query到数据库，并返回一个结果集(行数受到影响)
		$b=mysql_query($sql,$this->conn); //or die('该dml操作执行失败'.mysql_error());
		//判断是否成功
		if(!$b){
			return 0;//表示返回失败
		}
		//返回成功
		else{
			//判断(该链接)是否有行受到影响mysql_fetch_row（连接）
			if($row=mysql_affected_rows($this->conn)>0){
				return $row;//表示成功
			}
			else {
				return 2;//表示没有行数受到影响；
			}
		}	
		
	}
	
	
	//关闭连接的方法
	function close_connect(){
		//判断还有没有链接，用empty函数判断，没有连接，则empty为FLASE；
		if(!empty($this->conn)){
			//关闭连接
			mysql_close($this->conn);
		}
	}
}


?>