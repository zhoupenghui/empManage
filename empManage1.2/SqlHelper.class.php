<?php

//����һ�������࣬��������ɶ����ݿ�Ĳ���
class SqlHelpr{
	//����
	public $conn;
	public $dbname="empmanage";
	public $host="localhost";
	public $password="123456";
	public $username="root";
	//����
	function __construct(){
		//�������ݿ� 
		$this->conn=mysql_connect($this->host,$this->username,$this->password);
		//�ж����ݿ��Ƿ�����
		if(!$this->conn){
			die('���ݿ�����ʧ��'.mysql_connect_error());
			
		}
		//�������ݿ�
		mysql_select_db($this->dbname,$this->conn) or die('�����ݿ�����ʧ��'.mysql_error());
		mysql_query("set names gbk");
	}
	
	
	//ִ��dql���
	function execute_dql($sql){
		//����һ��$sql��䣬��mysql_query�����ݿ�($conn---�õ����ĸ�����)��������һ�������
		$res=mysql_query($sql,$this->conn) or die('��dql����ִ��ʧ��'.mysql_error());
		return $res;
	}
	
	//ִ��dql���,�����ص���һ������
	function execute_dql2($sql){
		//ͨ��һ�����飬��$res->$arr
		//����һ������
		$arr=array();
		//����һ��$sql��䣬��mysql_query�����ݿ�($conn---�õ����ĸ�����)��������һ�������
		$res=mysql_query($sql,$this->conn) or die('��dql����ִ��ʧ��'.mysql_error());
		
		//$i=0;
		//��$res->$arr���ѽ����ת�Ƶ�һ��������
		while ($row=mysql_fetch_assoc($res)){
			//$arr[$i++]=$row;
			$arr[]=$row;
		}
		//����Ϳ��������ر�$res��Դ
		mysql_free_result($res);
		//����һ������
		return $arr;
	}
	
	//���Ƿ�ҳ����Ĳ�ѯ������һ���Ƚ�ͨ�õĲ�����oop���˼��Ĵ���
	//$sql1="select * from emp limit 0,6";
	//$sql2="select count(id) from emp";
	//&$fenyePage:�������ô���
	
	function execute_dql_fenye($sql1,$sql2,$fenyePage){
		//��ȡSQL��䣬���ݸ����ݿⲢ���ؽ����
		$res1=mysql_query($sql1,$this->conn) or die('��dql_fenye����ִ��ʧ��'.mysql_error());
		//�������飬��$res1�Ľ�������ݸ�����
		$arr=array();
		//��$es1�Ľ�������ݸ�����
		//��ȡӦ����ʾ�Ĺ�Ա��Ϣ
		while ($row=mysql_fetch_assoc($res1)){
			$arr[]=$row;
		}
		//�ر���Դ
		mysql_free_result($res1);
		
		$res2=mysql_query($sql2,$this->conn) or die('��dql_fenye����ִ��ʧ��'.mysql_error());
		if($row=mysql_fetch_row($res2)){
			//��ȡ��ҳ�����ܼ�¼��
			$fenyePage->pageCount=ceil($row[0]/$fenyePage->pageSize);
			$fenyePage->rowCount=$row[0];
		}
		
		//�ر���Դ
		mysql_free_result($res2);
		
		//��$arr����$fenyePage
		$fenyePage->res_array=$arr;
		
	}
	
	
	//ִ��dml���
	function execute_dml($sql){
		//����һ��$sql��䣬��mysql_query�����ݿ⣬������һ�������(�����ܵ�Ӱ��)
		$b=mysql_query($sql,$this->conn); //or die('��dml����ִ��ʧ��'.mysql_error());
		//�ж��Ƿ�ɹ�
		if(!$b){
			return 0;//��ʾ����ʧ��
		}
		//���سɹ�
		else{
			//�ж�(������)�Ƿ������ܵ�Ӱ��mysql_fetch_row�����ӣ�
			if($row=mysql_affected_rows($this->conn)>0){
				return $row;//��ʾ�ɹ�
			}
			else {
				return 2;//��ʾû�������ܵ�Ӱ�죻
			}
		}	
		
	}
	
	
	//�ر����ӵķ���
	function close_connect(){
		//�жϻ���û�����ӣ���empty�����жϣ�û�����ӣ���emptyΪFLASE��
		if(!empty($this->conn)){
			//�ر�����
			mysql_close($this->conn);
		}
	}
}


?>