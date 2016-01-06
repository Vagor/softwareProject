<?php
header('Content-type: text/html;charset=utf-8'); 

session_start();
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//连接数据库
require_once './fun.php';
$conn = connectDB();
mysql_query("SET NAMES UTF8"); 


$userid = $_SESSION['userid'];

$name = $_POST['name'];
$major = $_POST['major'];
$college = $_POST['college'];
$stuid = $_POST['stuid'];
$class = $_POST['class'];
$password = $_POST['password'];


mysql_query("UPDATE students SET name='$name',major='$major',college='$college',stuid='$stuid',class='$class',password='$password' WHERE id='$userid'");


header('location:../student.php');

?>