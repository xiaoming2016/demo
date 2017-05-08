<?php
//mysql_connect('localhost','sq_usermanage','666666') or dir('数据库连接错误'.mysql_error());
mysql_connect('localhost','sq_usermanage','666666') or dir('数据库连接错误'.mysql_error());
mysql_query('set names utf8')or dir('字符编码设置错误'.mysql_error());         //mysql_set_charset('names utf8');
//mysql_query('use sq_usermanage') or dir('选择数据库错误'.mysql_error());
mysql_query('use sq_usermanage') or dir('选择数据库错误'.mysql_error());

//mysql_free_result();
//mysql_close();不能在这关闭数据库
?>