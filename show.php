<html>
<head>
<link rel="stylesheet" type="text/css" href="style/css.css">
</head>
<body>
<div class="main">
<div class="title">用户管理系统</div>
<table >
<tr><td>序号</td><td>用户名</td><td>邮箱</td><td>操作</td></tr>
<?php
require "mysql.php";
$sql="select * from user ";
$result=mysql_query($sql) or die('查询语句有误'.mysql_error());

while(!!$row=mysql_fetch_array($result)){
echo'<tr><td>'.$row['id'].'</td><td>'.$row['name'].'</td>
<td>'.$row['email'].'</td><td>'.$row['sex'].'</td>
	
	</tr>';
}
?>
<span><a href="list2.php">返回管理页</a></span>
</table>
</div>
</div>
</body>
</html>
