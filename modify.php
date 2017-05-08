<html>
<head>
<link rel="stylesheet" type="text/css" href="style/css.css">
</head>
<body>
<div class="main">
<div class="title">用户管理系统</div>
<div class="form">
<form action="update.php?action=update" method="post" name="form">
<?php
require 'process.php';
require 'mysql.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])){
	$id=$_GET['id'];
	$result=mysql_query("select * from user where id='$id'limit 1") or dir('sql错误'.mysql_error());
	$row=mysql_fetch_array($result,MYSQL_ASSOC);
}else{
echo "<script type='text/javascript' >alert('非法登录');history.back()</script>";
exit();
}

?>
用户名：<input type="text" name="username" value="<?php echo $row['name'];?>" />
<input type="hidden" name="id" value="<?php echo $row['id'];?>" /><br/>
<input type="hidden" name="password" value="<?php echo $row['password'];?>" /><br/>
邮&nbsp;箱：<input type="text" name="email" value="<?php echo $row['email'];?>"/><br/>
<!---------性&nbsp;别： <input type="text" name="sex" value="<?php echo $row['sex'];?>"/><br/>
-------->
性&nbsp;别：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="sex" value="男" 
checked="<?php if($row['sex']=="男"){ 
	echo "checked";  }?>" />男
<input type="radio" name="sex" value="女" 
checked="<?php if($row['sex']=="女"){ echo "checked"; }else{ echo "false";} ?>"
/>女<br/>
等&nbsp;级： <input type="text" name="grade" value="<?php echo $row['grade'];?>"/><br/>
薪&nbsp;水： <input type="text" name="salary" value="<?php echo $row['salary'];?>"/><br/>
	
<input type="submit" /> &nbsp;<input type="reset" />

</form>
</div>
</div>
</body>
</html>
