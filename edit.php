<?php

	include('DB.php');
	
	session_start();
	
	$login = $_SESSION['auth']['login'];
	
	
	$res = mysql_query("SELECT * FROM users WHERE login='$login'");
	$row = mysql_fetch_assoc($res);
	



?>

<form action="inc/edit-profile.php" style="text-align: center;" method="post">

	<input type="hidden" name="user_id" value="<?= $row['id']; ?>"/>
	
	Name <br />
	<input type="text" name="name" value="<?= $row['name']; ?>"/>
	<p></p>
	Login <br />
	<input type="text" name="login" value="<?= $row['login']; ?>"/>
	<p></p>
	Password <br />
	<input type="text" name="pass" value="<?= $row['pass']; ?>"/>
	<p></p>
	<input type="submit" value="EDIT" />
	
</form>