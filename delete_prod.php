<?php

		include('DB.php');
		
		$order_id = $_GET['id'];
		$user_id = $_GET['user_id'];
		$item_id = $_GET['item_id'];



 		$res = mysql_query("DELETE FROM orders WHERE id=$order_id AND user_id=$user_id AND item_id=$item_id");
		


		header("location:cabinet.php");

?>