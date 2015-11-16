<?php
	//����һ������ʵ���ͱ�ʾadmin���һ����¼
	//��admin����ֶη�װ�����࣬��Ϊ����ĳ�Ա����
	
	class Admin{
		private  $id;
		private  $name;
		private $password;
		
		//get����
		public function getId(){
			return $this->id;
		}
		public function getName(){
			return $this->name;
		}
		public function getPassowrd(){
			return $this->password;
		}
		//set����
		public function setId($id){
			$this->id=$id;
		}
		public function setName($name){
			$this->name=$name;
		}
		public function setPassowrd($password){
			$this->password=$password;
		}
		
	}


?>