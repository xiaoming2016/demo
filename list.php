<?php
if(@$_GET['id']!='manage'){
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
<ul>
<li><a href="manage.php?id=show">管理用户</a></li>
<li><a href="add.php?id=show">新增用户</a></li>

<li><a href="logout.php">退出</a></li>
</ul>
</div>
</div>
</body>
</html>
