<?php

if(@$_GET['id']!='show'&& empty($_GET['page'])){
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
<table>
<tr><td>序号</td><td>用户名</td><td>邮箱</td><td>性别</td><td>薪水</td><td>操作</td></tr>
<?php
require "mysql.php";
$sql="select * from user ";
$result=mysql_query($sql) or die('查询语句有误'.mysql_error());


//分页查询
$len=mysql_num_rows($result);
if(isset($_GET['page'])){            //注意$_GET['$page'] 没有$ 符号
	    $page=$_GET['page'];
		if(empty($_GET['page']) || $page<0 || !is_numeric($page)){
			$page=1;	
		}else{
				$page=intval($page);		
		}
	}else{
	$page=1;
	}
	////////////echo $page;
         $pagesize=5;
		$pagenum=$pagesize*($page-1);
		 $pagetotal=ceil($len/$pagesize);
		$sql="select * from user order by salary desc limit $pagenum,$pagesize"; 
		$res=mysql_query($sql) or die('错误：'.mysql_error());



while(!!$row=mysql_fetch_array($res)){
echo'<tr><td>'.$row['id'].'</td><td>'.$row['name'].'</td>
<td>'.$row['email'].'</td><td>'.$row['sex'].'</td><td>'.$row['salary'].'</td><td><a href="modify.php?id='.$row['id'].'">修改</a></td>	
<!------<td><a href="add.php?id='.$row['id'].'">增加</a>---------->
	<td><a href="delete.php?id='.$row['id'].'">删除</a></td>
	</tr>';
}



?>

<tr><td><a href="list.php?id=manage">返回管理页</a></td></tr>
</table>

<div id="page">
                    <span><a href="manage.php">首页</a></span>
                    <ul>
          <?php 
	           if($page-1<=0){
	           echo '<li>上一页</li>'; 
			 
	             }else{
                 echo '<li><a href="manage.php?page='.($page-1).'">上一页</a></li>';   
	             
				  }		
	          for($i=0;$i<$pagetotal;$i++){     
            echo '<li><a href="manage.php?page= '.($i+1).'">'.($i+1).'</a></li>';    
			  }	
                
              if($page<$pagetotal)  {
			  echo '<li><a href="manage.php?page='.($page+1).'">下一页</a></li>';
			   echo '<li><a href="manage.php?page='.$pagetotal.'">尾页</a></li>';
				}else{
				 echo '<li>下一页</li>';
                    echo '<li>尾页</li>';
				}
					?>
                       <li>总共有:<?php echo $pagetotal; ?>页</li>
                        <li>当前是第:<?php echo $page; ?>页</li>
                    </ul>
                </div>
</div>
</div>
</body>
</html>
