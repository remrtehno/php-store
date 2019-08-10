<?php
	include('DB.php');
	
	session_start();
	
	// get send message
	$current_user_id = $_SESSION['auth']['id'];
	$current_user_name = $_SESSION['auth']['login'];
	$user_id_reciever = $_GET['user_id_reciever'];
	
	$res = mysql_query("SELECT * FROM users WHERE id=$user_id_reciever");
	$row = mysql_fetch_assoc($res);
	
	//get dialog
	$res_dialog = mysql_query("SELECT * FROM messages WHERE user_id=$current_user_id AND user_id_second=$user_id_reciever OR user_id_second=$current_user_id AND user_id=$user_id_reciever");
	$row_dialog = mysql_fetch_assoc($res_dialog);
	
	
	
?>

<style>
	form {
		padding-top: 20px;
		text-align: center;
		max-width: 50%; 
		float: right;
	}
	.msg {
		max-width: 50%; 
		float: left;
		    width: 100%;
	}
	.container {
		background: #cdcdcd;
		max-width: 760px;
		margin: auto;
		padding:  20px;	
	}
	ul {
		width: 100%;
	background: #fff;
	}
</style>
<div class="container">
		<div class="msg">
			Dialog with <b> <?=$row['login']; ?> </b>
			<ul>
			<? if($row_dialog) {
				do {
					?> <li> <b> <? if( $row_dialog['name'] == $current_user_name) { echo 'You'; } else { echo  $row_dialog['name']; }; ?> </b> <br /> <?= $row_dialog['msg']; ?> <hr /> </li> <?
				} while($row_dialog = mysql_fetch_assoc($res_dialog));
			} else { echo 'No dialog'; } ?>
				
			</ul>
		</div>

		<form action="send_msg.php" method="post">
			
			Write Message to <b> <?=$row['login']; ?> </b> <p></p>
			You: <b> <?=$current_user_name; ?> </b>
			<input type="hidden" value="<?=$user_id_reciever; ?>" name="user_id_reciever"/>
			<input type="hidden" value="<?=$current_user_id; ?>" name="current_user_id"/>
			<input type="hidden" value="<?=$current_user_name; ?>" name="current_user_name"/>
			<p></p>
			<!--<input type="text"  name="theme">-->
			<p></p>	
			<textarea name="msg" id="" cols="30" rows="10"></textarea>
			<p></p>
			
			<input type="submit" value="Send" />
			
		</form>
		<hr style="clear: both;">
		<a href="cabinet.php">BACK</a>
</div>
