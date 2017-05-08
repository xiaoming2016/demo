<?php
if(@$_GET['id']!='show'){
echo '<script type="text/javascript">alert("非法登录");history.back();</script>';
exit();
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/css.css">
</head>
<body>
<div class="main">
<div class="title">用户管理系统</div>
<div class="form">
<form action="adduser.php?action=adduser" method="post" name="form">

用户名：<input type="text" name="username" value="" /><br/>
密&nbsp;码： <input type="password" name="password" value="" /><br/>
邮&nbsp;箱：<input type="text" name="email" value=""/><br/>
性&nbsp;别：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="sex" value="男" checked="cheked" />男
<input type="radio" name="sex" value="女"  />女<br/>
等&nbsp;级： <input type="text" name="grade" value=""/><br/>
薪&nbsp;水： <input type="text" name="salary" value=""/><br/>
	
<input type="submit" /> &nbsp;<input type="reset" />
<span><a href="list.php?id=manage">返回管理页</a></span>
</form>

</div>
</div>
</body>
</html>
