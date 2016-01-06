<?php
header('Content-type: text/html;charset=utf-8'); 

session_start();
if(!isset($_SESSION['userid_t'])){
    header("Location:login.html");
    exit();
}


require_once 'fun.php';
$conn = connectDB();
mysql_query("SET NAMES UTF8"); 


$userid_t = $_SESSION['userid_t'];

$name = $_POST['name'];
$college = $_POST['college'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$teacherId = $_POST['teacherId'];
$password = $_POST['password'];


mysql_query("UPDATE teachers SET name='$name',college='$college',email='$email',telephone='$telephone',teacherId='$teacherId',password='$password' WHERE id='$userid_t'");


header('location:../teacher.php');

?>