<?php
	
	require_once 'SqlHelper.class.php';
	//�����Ǹ�ҵ���߼������࣬����Ҫ��ɶ�admin���ҵ���߼�����
	
	class AdminService{
		
		//�ṩһ�� ��֤�û��Ƿ�Ϸ��ķ���(�û�����ID�ź���������ж�)
		function chckcAdmin($id,$password){
			
			//����SQL��䣬��֤
			//��ֹSQLע�빥��
			//�仯��֤�߼�����mysqli Ԥ��������,ͨ��ID������ѯ����
			$sql="select password,name from admin where id=$id";
			
			//����һ����������SqlHelper.class.php��
			$sqlHelper=new SqlHelpr(); //���Ѿ�����˶����ݿ�����ӣ���֤�������ֻ�����SqlHelpr��ĺ��������������Ϳ�����
			
			//���ö����е�dql���������ؽṹ��
			$res=$sqlHelper->execute_dql($sql);
			
			//�ж��Ƿ񷵻ؽṹ��
			//������أ�mysql_fetch_assoc($res)���飩---����
			if($row=mysql_fetch_assoc($res)){
				
				//��ѯ��
				//ȡ�����ݿ��е����룬�����������ȶ�,���������ҪMD5���ܴ���
				if($row['password']==md5($password)){
										return $row['name'];
								}
				
				}
				
			//�ͷ���Դ
			mysql_free_result($res);
			//�ر�����
			//����close_connect()����
			$sqlHelper->close_connect();
			
				//û�в�ѯ����ID�Ŵ�����û����벻��ȷ��
				return "";
			
			
		}
	}

?>