<?php
require_once 'SqlHelper.class.php';
class EmpService{

//һ���������Ի�ȡ����ҳ
function getPageCount($pageSize){
	//��Ҫ��ѯ$rowcount�����ж�������¼��
	//sql��䣬��ѯ�ж�������¼
	$sql="select count(id) from emp";
	
	//ʵ����һ������,Ҫ����SqlHelpr.class.php��
	$sqlHelper=new SqlHelpr();
	//���÷���,���ؽ����(boolֵ)
	$res=$sqlHelper->execute_dql($sql);
	
	//�����Ϳ��Լ����$pagecount
	if($row=mysql_fetch_row($res)){
		$pageCount=ceil($row[0]/$pageSize);
	}
	//�ͷ���Դ
	//mysql_free_result($res);
	//�ر�����
	$sqlHelper->close_connect();
	
	//����$pageCount
	return $pageCount;
	
}

//һ���������Ի�ȡӦ����ʾ�Ĺ�Ա��Ϣ
function getEmpListByPage($pageNow,$pageSize){
	
	//����SQL��䣬��֤
	$sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
	//ʵ����һ������,Ҫ����SqlHelpr.class.php��
	$sqlHelper=new SqlHelpr();
	//���÷���,���ؽ����
		//$res=$sqlHelper->execute_dql($sql);
	//�����$res��һ����ά����
		$res=$sqlHelper->execute_dql2($sql);
	//�ͷ���Դ
	//mysql_free_result($res);
	//�ر�����
	$sqlHelper->close_connect();
	
	return $res;

	
	
}


//�ڶ���ʹ�÷�װ�ķ�ʽ��ɵķ�ҳ��ҵ���߼������
function getfenyePage($fenyePage){
	
	//��������
	$sqlHelper=new SqlHelpr();
	//SQL���
	//��ʾ�Ĺ�Ա��Ϣ
	$sql1="select * from emp limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize.",$fenyePage->pageSize";
	//��ʾ���ܼ�¼��
	$sql2="select count(id) from emp";
	$sqlHelper->execute_dql_fenye($sql1, $sql2, $fenyePage);
	
	//�ر�����
	$sqlHelper->close_connect();
}

}
?>
