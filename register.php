<?php

	include('DB.php');

	if($_POST) {
		$name = $_POST['name'];
		$login = $_POST['login'];
		$password = $_POST['password'];

		mysql_query("INSERT users (name, login, pass) VALUES ('$name', '$login', $password)");
		
		header("Location: index.php");
	};
?>

<div class="register" style="margin: 0 auto; text-align: center;">
	<form action="register.php" method="post">
		<p>Name: <br> <input type="text" name="name"></p>
		<p>Login: <br> <input type="text" name="login"></p>
		<p>password: <br> <input type="text" name="password"></p>
		<p><input type="submit" value="Зарегистрироваться"></p>
	</form>
</div>