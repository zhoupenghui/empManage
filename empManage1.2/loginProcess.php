<?php
require_once 'AdminService.class.php';

//�����û���¼����Ϣ
//1.id
$id=$_POST['id'];
//2.����
$password=$_POST['password'];

//ʵ����һ������,����AdminService.class.php
$adminService=new AdminService();
//���÷���
$name=$adminService->chckcAdmin($id, $password);

if($name!=""){
	//˵���Ϸ�
	header("Location:empManage.php?name=$name");
	exit();
	}

else{
	//�������
    header("Location:login.php?error=2");
	exit();
}

?>