<?php

	include('../DB.php');
	
	session_start();
	

	
	if($_POST) {
		$name = $_POST['name'];
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		$user_id = $_POST['user_id'];
		
		$res = mysql_query("UPDATE users SET name='$name',login='$login',pass=$pass WHERE id=$user_id");
		
		$_SESSION['auth']['login'] = $login;
		
		header("Location:../cabinet.php");
	};


?>