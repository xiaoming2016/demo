<?php
function _check_username($name,$min,$max){
$name=trim($name);
if(empty($name)){
echo '<script type="text/javascript">alert("用户名不能为空");history.back();</script>';
exit();
}
if(strlen($name)<$min || strlen($name)>$max){
echo '<script type="text/javascript">alert("用户名不能大于'.$max.'小于'.$min.'");history.back();</script>';
exit();
}
return $name;
}

function _check_password($password,$min,$max){
if(empty($password)){
echo '<script type="text/javascript">alert("密码不能为空");history.back();</script>';
exit();
}
if(strlen($password)<$min || strlen($password)>$max){
echo '<script type="text/javascript">alert("密码不能大于'.$max.'小于'.$min.'");history.back();</script>';
exit();
}
return md5($password);
}
function _check_email($email){
if(empty($email)){
echo '<script type="text/javascript">alert("邮箱不能为空");history.back();</script>';
exit();
}
if(strlen($email)<2 || strlen($email)>20){
echo '<script type="text/javascript">alert("邮箱不能大于20小于2");history.back();</script>';
exit();
}
if(!preg_match('/^[\w\-\_\.]+@[\w\-\.]+(\.\w+)$/i',$email)){
echo '<script type="text/javascript">alert("邮箱格式非法");history.back();</script>';
exit();
}
return $email;
}

function _check_salary($salary){
if(empty($salary)){
echo '<script type="text/javascript">alert("薪水不能为空");history.back();</script>';
exit();
}
if(!preg_match('/^[1-9]{1}[0-9]+$/i',$salary)){
echo '<script type="text/javascript">alert("薪水格式非法");history.back();</script>';
exit();
}
if(strlen($salary)<2 || strlen($salary)>20){
echo '<script type="text/javascript">alert("薪水不能大于20小于2");history.back();</script>';
exit();
}
return $salary;
}

function _check_grade($grade){

if(!preg_match('/^[1-9]+/i',$grade) and $grade!=""){
echo '<script type="text/javascript">alert("等级格式非法");history.back();</script>';
exit();
}
if(strlen($grade)>6){
echo '<script type="text/javascript">alert("等级不能大于6");history.back();</script>';
exit();
}
return $grade;
}


?>