<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>��Ա��Ϣ�б�</title>
</head>
<body>
<?php

	require_once 'EmpService.class.php';
	require_once 'FenyePage.class.php';
	
	//����һ��FenyePage����ʵ��
	$fenyePage=new FenyePage();
	
	//��$fenyePageָ�����������
	$fenyePage->pageSize=6;
	$fenyePage->pageNow=1;//pageNow��һ����Զ���ǵ�һҳ���ʳ���ȥ����
	
	
	//����������Ҫ�����û��ĵ�����޸�$pageNow��ֵ��//pageNow��һ����Զ���ǵ�һҳ���ʳ���ȥ���գ�
	//����������Ҫ�ж��Ƿ���$pageNowֵ���ͣ��о�ʹ�ã�û����Ĭ����ʾ��һҳ
	if(!empty($_GET['pageNow'])){
		//$_GET[pageNow],���淢�͹�����
		$fenyePage->pageNow=$_GET['pageNow'];
	}
	
	
	//����һ������$empService������ҳ��$pageCount,$res��,����EmpService.class.php
	$empService=new EmpService();
	
	//����getfenyePage�������÷������԰�$fenyePage���
	$empService->getfenyePage($fenyePage);
	
	//ȡ����¼,����ʾ����---�ñ��
	echo "<h1>��Ա��Ϣ�б�</h1>";
	echo '<table border="1" bordercolor="green" cellspacing="0px">';
	echo '<tr><th>'.'id'.'</th>'.'<th>'.'name'.'</th>'.'<th>'.'grade'.'</th>'.'<th>'.'email'.'</th>'.'<th>'.'salary'.'</td>'.'<td>'.'<a href="#">ɾ���û�</a>'.'</td>'.'<td>'.'<a href="#">�޸��û�</a>'.'</td>'.'</th></tr>';
	
	for ($i=0;$i<count($fenyePage->res_array);$i++){
		
		$row=$fenyePage->res_array[$i];
		echo '<tr><td>'.$row['id'].'</td>'.'<td>'.$row['name'].'</td>'.'<td>'.$row['grade'].'</td>'.'<td>'.$row['email'].'</td>'.'<td>'.$row['salary'].'</td>'.'<td>'.'<a href="#">ɾ���û�</a>'.'</td>'.'<td>'.'<a href="#">�޸��û�</a>'.'</td></tr>'; 		
	}
	echo '</table>';
	
	
	
	//��ʾ��һҳ����һҳ
	if($fenyePage->pageNow>1){
		$prepage=$fenyePage->pageNow-1;
		echo "<a href='empList.php?pageNow=$prepage'>��һҳ</a>&nbsp;";
	}
	if($fenyePage->pageNow<$fenyePage->pageCount){
		$nextpage=$fenyePage->pageNow+1;
		echo "<a href='empList.php?pageNow=$nextpage'>��һҳ</a>&nbsp;&nbsp;&nbsp;";
	}
	
/*	
	
	//��ʾ��ҳ��βҳ
	echo "<a href='empList.php?pageNow=1'>��ҳ</a>&nbsp;";
	echo "<a href='empList.php?pageNow=$pageCount'>βҳ</a>&nbsp;&nbsp;&nbsp;";
	
	
	
	//$page_whole��ʾ����Ҫ��ʾ��ҳ��
	$page_whole=5;
	
	//������ʼλ��
	$start=floor(($pageNow-1)/$page_whole)*$page_whole+1;
	//����̶�λ��
	$index=$start;
	
	//������ʾ$page_whole��ô��ҳ,��ǰ��ҳ
	if($pageNow>$page_whole){
		echo "<a href='empList.php?pageNow=".($start-1)."'><<&nbsp;</a>";
	}
	//������forѭ����ӡ������
	//ѭ��ȡ��
	for(;$start<$index+$page_whole;$start++){
		echo "<a href='empList.php?pageNow=$start'>&nbsp;[$start]</a>";
	}
	
	//������ʾ$page_whole��ô��ҳ,���ҳ

	echo "<a href='empList.php?pageNow=$start'>&nbsp;>></a>";
	
	
	
	
	//��ʾ��ǰҳ�͹��ж���ҳ
	echo "��ǰ��{$pageNow}ҳ/��{$pageCount}ҳ";
	
	//ָ����ת���ö�ҳ
	echo '<br/><br/>';
*/
	?>
	
	
	<form action="empList.php">
	
	��ת��:<input type="text" name="pageNow"/><input type="submit" value="Go" />
	</form>
</body>
</html>

