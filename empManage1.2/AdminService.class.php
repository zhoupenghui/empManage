<?php
	
	require_once 'SqlHelper.class.php';
	//该类是个业务逻辑处理类，它主要完成对admin表的业务逻辑操作
	
	class AdminService{
		
		//提供一个 验证用户是否合法的方法(用户输入ID号和密码就能判断)
		function chckcAdmin($id,$password){
			
			//发送SQL语句，验证
			//防止SQL注入攻击
			//变化验证逻辑，（mysqli 预处理技术）,通过ID号来查询密码
			$sql="select password,name from admin where id=$id";
			
			//创建一个对象，引入SqlHelper.class.php类
			$sqlHelper=new SqlHelpr(); //它已经完成了对数据库的连接，验证，后面就只需调用SqlHelpr类的函数（方法），就可以了
			
			//调用对象中的dql方法，返回结构集
			$res=$sqlHelper->execute_dql($sql);
			
			//判断是否返回结构集
			//如果返回（mysql_fetch_assoc($res)数组）---存在
			if($row=mysql_fetch_assoc($res)){
				
				//查询到
				//取出数据库中的密码，与输入的密码比对,输入的密码要MD5加密处理
				if($row['password']==md5($password)){
										return $row['name'];
								}
				
				}
				
			//释放资源
			mysql_free_result($res);
			//关闭连接
			//调用close_connect()函数
			$sqlHelper->close_connect();
			
				//没有查询到（ID号错误或用户密码不正确）
				return "";
			
			
		}
	}

?>