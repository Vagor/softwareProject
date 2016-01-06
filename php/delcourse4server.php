<?php
header('Content-type: text/html;charset=utf-8'); 

require_once 'fun.php';
$conn = connectDB();
mysql_query("SET NAMES UTF8"); 


$id = intval($_GET['id']);
mysql_query("DELETE FROM courses WHERE id='$id');

header('location:../teacher.php');
?>