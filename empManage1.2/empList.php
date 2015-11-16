<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>雇员信息列表</title>
</head>
<body>
<?php

	require_once 'EmpService.class.php';
	require_once 'FenyePage.class.php';
	
	//创建一个FenyePage对象实例
	$fenyePage=new FenyePage();
	
	//给$fenyePage指定必须的数据
	$fenyePage->pageSize=6;
	$fenyePage->pageNow=1;//pageNow不一定永远都是第一页，故尝试去接收
	
	
	//这里我们需要根据用户的点击来修改$pageNow的值（//pageNow不一定永远都是第一页，故尝试去接收）
	//这里我们需要判断是否有$pageNow值发送，有就使用，没有则默认显示第一页
	if(!empty($_GET['pageNow'])){
		//$_GET[pageNow],下面发送过来的
		$fenyePage->pageNow=$_GET['pageNow'];
	}
	
	
	//创建一个对象$empService（计算页数$pageCount,$res）,引入EmpService.class.php
	$empService=new EmpService();
	
	//调用getfenyePage方法，该方法可以把$fenyePage完成
	$empService->getfenyePage($fenyePage);
	
	//取出记录,并显示出来---用表格
	echo "<h1>雇员信息列表</h1>";
	echo '<table border="1" bordercolor="green" cellspacing="0px">';
	echo '<tr><th>'.'id'.'</th>'.'<th>'.'name'.'</th>'.'<th>'.'grade'.'</th>'.'<th>'.'email'.'</th>'.'<th>'.'salary'.'</td>'.'<td>'.'<a href="#">删除用户</a>'.'</td>'.'<td>'.'<a href="#">修改用户</a>'.'</td>'.'</th></tr>';
	
	for ($i=0;$i<count($fenyePage->res_array);$i++){
		
		$row=$fenyePage->res_array[$i];
		echo '<tr><td>'.$row['id'].'</td>'.'<td>'.$row['name'].'</td>'.'<td>'.$row['grade'].'</td>'.'<td>'.$row['email'].'</td>'.'<td>'.$row['salary'].'</td>'.'<td>'.'<a href="#">删除用户</a>'.'</td>'.'<td>'.'<a href="#">修改用户</a>'.'</td></tr>'; 		
	}
	echo '</table>';
	
	
	
	//显示上一页和下一页
	if($fenyePage->pageNow>1){
		$prepage=$fenyePage->pageNow-1;
		echo "<a href='empList.php?pageNow=$prepage'>上一页</a>&nbsp;";
	}
	if($fenyePage->pageNow<$fenyePage->pageCount){
		$nextpage=$fenyePage->pageNow+1;
		echo "<a href='empList.php?pageNow=$nextpage'>下一页</a>&nbsp;&nbsp;&nbsp;";
	}
	
/*	
	
	//显示首页和尾页
	echo "<a href='empList.php?pageNow=1'>首页</a>&nbsp;";
	echo "<a href='empList.php?pageNow=$pageCount'>尾页</a>&nbsp;&nbsp;&nbsp;";
	
	
	
	//$page_whole表示整体要显示的页数
	$page_whole=5;
	
	//定义起始位置
	$start=floor(($pageNow-1)/$page_whole)*$page_whole+1;
	//定义固定位置
	$index=$start;
	
	//整体显示$page_whole这么多页,向前翻页
	if($pageNow>$page_whole){
		echo "<a href='empList.php?pageNow=".($start-1)."'><<&nbsp;</a>";
	}
	//可以用for循环打印超链接
	//循环取出
	for(;$start<$index+$page_whole;$start++){
		echo "<a href='empList.php?pageNow=$start'>&nbsp;[$start]</a>";
	}
	
	//整体显示$page_whole这么多页,向后翻页

	echo "<a href='empList.php?pageNow=$start'>&nbsp;>></a>";
	
	
	
	
	//显示当前页和共有多少页
	echo "当前第{$pageNow}页/共{$pageCount}页";
	
	//指定跳转到好多页
	echo '<br/><br/>';
*/
	?>
	
	
	<form action="empList.php">
	
	跳转到:<input type="text" name="pageNow"/><input type="submit" value="Go" />
	</form>
</body>
</html>

