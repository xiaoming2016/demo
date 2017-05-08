<?php
if(@$_GET['action']!='add'){
echo '<script type="text/javascript">alert("非法登录");history.back();</script>';
exit();
}
?>
<?php
require 'check.php';
require 'mysql.php';
if(@$_GET['action']=='add'){

$name=$_POST['username'];
$password=md5($_POST['password']);
$sex=$_POST['sex'];
$email=$_POST['email'];
$grade=$_POST['grade'];
$salary=$_POST['salary'];
//echo $name;





$sql="insert into user (name,email,password,sex,grade,salary) values('$name','$email','$password','$sex','$grade','$salary') ";
$result=mysql_query($sql) or die('sql语句有误'.mysql_error());
//print_r($result);exit();
if(!empty($result)){
	header('Location:manage.php?id=show');
}else{
echo "新增出错";
}
}

?>

