<?php
require 'check.php';
require 'mysql.php';
if(@$_GET['action']=='adduser'){
$register=array();
$register['username']=_check_username($_POST['username'],2,50);
$register['password']=_check_password($_POST['password'],2,12);
$register['email']=_check_email($_POST['email']);
$register['sex']=$_POST['sex'];
$register['salary']=_check_salary($_POST['salary']);

$sql="select name from user where name='{$register['username']}'";
$result=mysql_query($sql);
if(mysql_fetch_array($result,MYSQL_ASSOC)){
echo '<script type="text/javascript">alert("此用户已经存在");history.back();</script>';
exit();
}else{
echo '<script type="text/javascript">alert("新增成功");</script>';
header('Location:index.php','新增成功');
}
$sql="insert into user(name,password,email,sex,salary)values
('{$register['username']}','{$register['password']}','{$register['email']}','{$register['sex']}','{$register['salary']}')";
mysql_query($sql) or die('sql错误'.mysql_error());

mysql_close();
}
?>

<html>
<head>

<link rel="stylesheet" type="text/css" href="style/css.css">
</head>
<body>
<div class="main">
<div class="title">新增用户</div>
<div class="form">
<form action="register.php?action=register" method="post" name="form">
用户名：<input type="text" name="username" /><br/>
密&nbsp;码： <input type="password" name="password"/><br/>
邮&nbsp;箱：<input type="text" name="email" /><br/>
性&nbsp;别：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="sex" value="男" checked="checked" />男
<input type="radio" name="sex" value="女" />女<br/>
薪&nbsp;水：<input type="text" name="salary" /><br/>
<input type="submit" /> &nbsp;<input type="reset" /><span><a href="index.php">返回登录</a></span>
</form>
</div>
</div>
</body>
</html>
