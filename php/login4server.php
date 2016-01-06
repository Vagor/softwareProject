<?php
header('Content-type: text/html;charset=utf-8'); 

	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	//连接数据库
	require_once 'fun.php';
	$conn = connectDB(); 
	mysql_query("SET NAMES UTF8"); 


	$check_query_student = mysql_query("SELECT id FROM students WHERE username='$username' AND password='$password' LIMIT 1");
	$check_query_teacher = mysql_query("SELECT id FROM teachers WHERE teacherId='$username' AND password='$password' LIMIT 1");
	if($result = mysql_fetch_array($check_query_student)){
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['id'];

		header('location:../student.php');

    exit;
	} else if($result = mysql_fetch_array($check_query_teacher)){
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid_t'] = $result['id'];

		header('location:../teacher.php');

    exit;
	}
	else {
	    header('location:../404.html');
	}
?>


