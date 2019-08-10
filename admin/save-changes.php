<?php
include('../DB.php');





if($_POST['query'] == 'users') {
	$user_id = $_POST['user_id'];
	$name = $_POST['name'];
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	
	$res = mysql_query("UPDATE users SET name='$name',login='$login',pass=$pass WHERE id=$user_id");
	
	header("location: all_user.php");
}

if($_POST['query'] == 'categories') {
	$id = $_POST['id'];
	$name = $_POST['name'];

	
	$res = mysql_query("UPDATE categories SET name='$name' WHERE id=$id");
	
	header("location: edit-category-products.php");
}

if($_POST['query'] == 'commetns') {
	$id = $_POST['id'];
	$author = $_POST['name'];
	$text = $_POST['text'];

	
	$res = mysql_query("UPDATE commetns SET author='$author', text='$text' WHERE id=$id");
	
	header("location: all_cmnt.php");
}

if($_POST['query'] == 'product_items') {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$in_stock = $_POST['in_stock'];
	$model = $_POST['model'];
	$description = $_POST['description'];
	$brand = $_POST['brand'];

	
	$res = mysql_query("UPDATE product_items SET name='$name', price='$price', in_stock='$in_stock', model='$model', description='$description', brand='$brand' WHERE id=$id");
	
	header("location: edit-products.php");
}


?>