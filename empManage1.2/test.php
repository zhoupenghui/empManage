<?php

require_once 'SqlHelper.class.php';
$ss=new SqlHelpr();
$arr =$ss->execute_dql2("select * from emp limit 0,10");
print_r($arr);









?>