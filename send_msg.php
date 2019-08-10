<?php
	include('DB.php');

	
	if($_POST) {
		$user_id_reciever = $_POST['user_id_reciever'];
		$current_user_id = $_POST['current_user_id'];
		$current_user_name = $_POST['current_user_name'];
		$msg = $_POST['msg'];
		
		
		$res = mysql_query("INSERT messages (user_id,user_id_second, name, msg) VALUES ($current_user_id,$user_id_reciever,'$current_user_name' ,'$msg')");	
		
		header("location: write_msg.php?user_id_reciever=$user_id_reciever");
	};
	
?>