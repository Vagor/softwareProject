<?php
header('Content-type: text/html;charset=utf-8'); 


//接收数据
$coursename = $_POST['coursename'];
$coursemajor = $_POST['coursemajor'];
$courseweek = $_POST['courseweek'];
$coursetime = $_POST['coursetime'];
$courseclassroom = $_POST['courseclassroom'];
$courseclass = $_POST['courseclass'];
$courseteacherId = $_POST['courseteacherId'];



//连接数据库
require_once 'fun.php';
$conn = connectDB();
mysql_query("SET NAMES UTF8"); 


//添加数据
mysql_query("INSERT INTO courses(coursename,coursemajor,courseweek,coursetime,courseclassroom,courseclass,courseteacherId) VALUES ('$coursename','$coursemajor','$courseweek','$coursetime','$courseclassroom','$courseclass','$courseteacherId')");
 
//跳转页面
header('location:../teacher.php');
?>