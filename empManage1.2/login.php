<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>�û���¼ҳ��</title>
</head>
<body>
<h1>�û���¼</h1>
<form action="loginProcess.php" method="post">
<table>
<tr><td>�û�ID</td><td><input type="text" name="id" /></td></tr>
<tr><td>�ܡ���</td><td><input type="password" name="password" /></td></tr>
<tr><td><input type="submit" value="�û���¼" /></td>
	<td><input type="reset" value="������д" /></td>
</tr>
</table>
</form>
<?php 
	//����loginProcess.php���ع�������Ϣ
	//���ж��Ƿ����,��������Ϊ�棬header:��$_GET����
	if(!empty($_GET['error'])){
		$res=$_GET['error'];
		if($res==1){
			echo "<font color='red' size='2' >�û�ID���������������д��</font>";
		}elseif($res==2){
			echo "<font color='red' size='2' >�û�ID���������������������д��</font>";
		}
	}
?>
</body>
</html>