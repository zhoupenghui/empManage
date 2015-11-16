
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>用户管理页面</title>
</head>
<body>
<h1>主界面</h1>
<?php
//$_GET[]接收：因为是header
echo '欢迎'.$_GET['name'].'登录成功<br/>';
echo "<a href='login.php'>返回登录页面</a><br/>";
?>
<a href="empList.php">管理用户</a><br/>
<a href="#">添加用户</a><br/>
<a href="#">查找用户</a><br/>
<a href="#">安全退出</a><br/>

</body>
</html>


