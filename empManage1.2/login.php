<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>用户登录页面</title>
</head>
<body>
<h1>用户登录</h1>
<form action="loginProcess.php" method="post">
<table>
<tr><td>用户ID</td><td><input type="text" name="id" /></td></tr>
<tr><td>密　码</td><td><input type="password" name="password" /></td></tr>
<tr><td><input type="submit" value="用户登录" /></td>
	<td><input type="reset" value="重新填写" /></td>
</tr>
</table>
</form>
<?php 
	//接收loginProcess.php返回过来的信息
	//先判断是否存在,不存在则为真，header:用$_GET接收
	if(!empty($_GET['error'])){
		$res=$_GET['error'];
		if($res==1){
			echo "<font color='red' size='2' >用户ID输入错误，请重新填写！</font>";
		}elseif($res==2){
			echo "<font color='red' size='2' >用户ID或密码输入错误，请重新填写！</font>";
		}
	}
?>
</body>
</html>