<?php

		include('DB.php');
		
		$user_id = $_POST['user_id'];
		$item_id = $_POST['item_id'];
		$quantity = $_POST['count'];
		
	


		$res = mysql_query("INSERT orders (user_id,item_id, quantity) VALUES ($user_id,$item_id,$quantity)");




		header("location:product.php?id=$item_id");

?>