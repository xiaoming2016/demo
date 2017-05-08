<?php
require 'mysql.php';
require 'check.php';
if(@$_GET['action']=='login'){
if(empty($_POST['username']) || empty($_POST['password']) ){
echo "<script type='text/javascript' >alert('用户名或密码不能为空');history.back()</script>";
exit();

}
if(strlen($_POST['username'])<2 || strlen($_POST['username'])>30){
echo '<script type="text/javascript">alert("用户名不能大于30小于2");history.back();</script>';
exit();
}
if(strlen($_POST['password'])<2 || strlen($_POST['password'])>16){
echo '<script type="text/javascript">alert("密码不能大于16小于2");history.back();</script>';
exit();
}
/*
if(!is_numeric($_POST['password']) || strlen($_POST['grade'])>6){
echo '<script type="text/javascript">alert("等级必须是数字且不能大于6");history.back();</script>';
exit();
}
*/
$sql="select admin.name,user.name from admin,user where user.name='{$_POST['username']}'or admin.name='{$_POST['username']}'";
$result=mysql_query($sql) or die('error查询语句有误'.mysql_error());
$row=mysql_fetch_array($result,MYSQL_ASSOC);
if(empty($row)){
echo '<script type="text/javascript">alert("此用户不存在请先注册");history.back();</script>';
exit();
}else{
if($_POST['username']=='admin' ){
$name=$_POST['username'];
$password=md5($_POST['password']);

$sql="select password from admin where name='$name'limit 1";
$result=mysql_query($sql) or die('error查询语句有误'.mysql_error());
$row=mysql_fetch_array($result,MYSQL_ASSOC);
//echo $name.$password;exit();
// print_r($row);exit();
//echo $row['password'].'<br/>';
//echo $password;exit();
	if($password==$row['password']){
header("Location:list.php?id=manage");
}else{
echo '<script type="text/javascript">alert("密码不正确,请重新输入");history.back();</script>';
exit();
	
	} 
}else{
$sql="select password from user where name='{$_POST['username']}'limit 1";
$result=mysql_query($sql) or die('error查询语句有误'.mysql_error());
$row=mysql_fetch_array($result,MYSQL_ASSOC);
if(md5($_POST['password'])==$row['password']){
header('Location:list2.php');
}else{
echo '<script type="text/javascript">alert("密码不正确，请重试");history.back();</script>';
exit();
}
}


}

}

?>