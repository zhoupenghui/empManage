<?php
require_once 'AdminService.class.php';

//接收用户登录的信息
//1.id
$id=$_POST['id'];
//2.密码
$password=$_POST['password'];

//实例化一个对象,引入AdminService.class.php
$adminService=new AdminService();
//调用方法
$name=$adminService->chckcAdmin($id, $password);

if($name!=""){
	//说明合法
	header("Location:empManage.php?name=$name");
	exit();
	}

else{
	//密码错误
    header("Location:login.php?error=2");
	exit();
}

?>