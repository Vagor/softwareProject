<?php
header('Content-type: text/html;charset=utf-8'); 

  $username = $_POST['username'];
  $password = $_POST['password'];
  $major = $_POST['major'];
  $class = $_POST['class'];
  $name = $_POST['name'];


//连接数据库
require_once 'fun.php';
$conn = connectDB();
mysql_query("SET NAMES UTF8"); 


//添加数据
mysql_query("INSERT INTO students(username,password,class,major,name) VALUES ('$username','$password','$class','$major','$name')");
 
//跳转页面
header('location:../login.html');
?>