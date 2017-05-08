<?php
require('mysql.php');

if($_GET['id']){
$id=$_GET['id'];

echo $id;

$sql="delete from user where id='$id' limit 1";
$result=mysql_query($sql) or die('sql有误'.mysql_error());
if(!empty($result)){
//echo $name.$password;exit();
// print_r($row);exit();
//echo $row['password'].'<br/>';
//echo $password;exit();
	//if($password==$row['password']){
//		echo $row['password'].'<br/>';
//echo $password;exit();
	header('Location:manage.php?id=show');
	//echo "<script type='text/javascript' >alert('删除成功');</script>";
}
	
}else{
	echo "<script type='text/javascript' >alert('非法登录');history.back()</script>";
	exit();
}

?>