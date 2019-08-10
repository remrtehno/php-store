<?php
include('DB.php');
session_start();
	$login = $_POST['login'];
	$pass = $_POST['password'];

if($login && $pass) {
	


	
	$res = mysql_query("SELECT * FROM users WHERE login='$login' AND pass=$pass");
	$row = mysql_fetch_assoc($res);
	
	
	if($row) {

		$_SESSION['auth']['login'] = $row['login'];
		$_SESSION['auth']['name'] = $row['name'];
		$_SESSION['auth']['id'] = $row['id'];
		
		
		
		header("Location: cabinet.php");
		
	} else {
		$_SESSION['error'] = '<p style="color:red">Ошибка ввода логина или парол</p>';
	};
	
	
} 
?>


<? if($_SESSION['error'] ){
	
	echo $_SESSION['error'] ;
}
unset($_SESSION['error'] );?>
<div class="login" style="margin: 0 auto; text-align: center;">
	<form action="login.php" method="post">
		<p>Login: <br> <input type="text" name="login"></p>
		<p>password: <br> <input type="text" name="password"></p>
		<p><input type="submit" value="Sign in"></p>
	</form>
</div>

