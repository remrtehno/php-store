<?php
include('DB.php');

$prod_id = $_POST['prod_id'];
$author = $_POST['author'];
$text = $_POST['comment'];
if($author && $text) {
	$res = mysql_query("INSERT commetns (author,text, prod_id) VALUES ('$author','$text',$prod_id)");
	
}





header("location:product.php?id=$prod_id");

?>