<?php
header('Content-type: text/html;charset=utf-8'); 

	function connectDB(){
    $conn = mysql_connect('localhost','root','');
    if (!$conn) {
		echo "connection failed";
	}
    mysql_selectdb('softwareProject',$conn);
    return $conn;
  }
?>
