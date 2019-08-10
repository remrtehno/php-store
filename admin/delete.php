<?php
include('../DB.php');

if($_GET['query'] == 'users') {
	$user_id = $_GET['id'];
	
	$res = mysql_query("DELETE FROM users WHERE id=$user_id");
	
	header("location: all_user.php");
}

if($_GET['query'] == 'categories') {
	$id = $_GET['id'];
	
	$res = mysql_query("DELETE FROM categories WHERE id=$id");
	
	header("location: edit-category-products.php");
}

if($_GET['query'] == 'commetns') {
	$id = $_GET['id'];
	
	$res = mysql_query("DELETE FROM commetns WHERE id=$id");
	
	header("location: all_cmnt.php");
}

if($_GET['query'] == 'product_items') {
	$id = $_GET['id'];
	
	$res = mysql_query("DELETE FROM product_items WHERE id=$id");
	
	header("location: edit-products.php");
}


?>