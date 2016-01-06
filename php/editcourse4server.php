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
mysql_query("UPDATE courses SET coursename='$coursename',coursemajor='$coursemajor',courseweek='$courseweek',coursetime='$coursetime',courseclassroom='$courseclassroom',courseclass='$courseclass',courseteacherId='$courseteacherId' WHERE id=1");

 
//跳转页面
header('location:../teacher.php');
?>