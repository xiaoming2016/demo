<?php
require 'check.php';
require('mysql.php');
if(@$_GET['action']=='update'){
$id=$_POST['id'];
$name=_check_username($_POST['username'],2,50);
$password=$_POST['password'];
$sex=$_POST['sex'];
$email=_check_email($_POST['email']);
$grade=_check_grade($_POST['grade']);
$salary=_check_salary($_POST['salary']);


$sql="update user set name='$name',password='$password',sex='$sex',email='$email',grade='$grade',salary='$salary' where id='$id' limit 1";
$result=mysql_query($sql) or die('error查询语句有误'.mysql_error());
if(!empty($result)){
//echo $name.$password;exit();
// print_r($row);exit();
//echo $row['password'].'<br/>';
//echo $password;exit();
	//if($password==$row['password']){
//		echo $row['password'].'<br/>';
//echo $password;exit();
	header('Location:manage.php?id=show');
}	
}else{
	echo "<script type='text/javascript' >alert('非法登录');history.back()</script>";
	exit();
}
?>