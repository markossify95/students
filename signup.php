<?php
	require('db_con.php');
	$uname=$_POST['username'];
	$passwd=$_POST['password'];
	$r = $_POST['role'];
	
	$connect = new DBConn();

	$connect->sign_up($uname, $passwd, $r);

?>