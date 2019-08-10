<?php
	include('../DB.php');
	
	
	
	$query = $_GET['query'];
	$id = $_GET['id'];

	$res = mysql_query("SELECT * FROM $query WHERE id=$id");
	$row = mysql_fetch_assoc($res);

?>

<style>
	form {

		padding-top: 50px;

		text-align:center;
	}
</style>

<? if($query == 'users') { ?>
<form action="save-changes.php" method="post">
	<input type="hidden" value="<?= $query; ?>"  name="query"/>
	<input type="hidden" value="<?= $id; ?>"  name="user_id"/>
	<h4>Edit: <?=$row['name'] ?></h4>
	name <br />
	<input type="text" name="name" value="<?=$row['name']; ?>"/>
	<p></p>
	login <br />
	<input type="text" name="login" value="<?=$row['login']; ?>"/>
	<p></p>
	password <br />
	<input type="text" name="pass" value="<?=$row['pass']; ?>"/>
	<p></p>
	<input type="submit" name="" />
	
</form>
<? }; ?>

<? if($query == 'commetns') { ?>
<form action="save-changes.php" method="post">
	<input type="hidden" value="<?= $query; ?>"  name="query"/>
	<input type="hidden" value="<?= $id; ?>"  name="id"/>
	<h4>Edit comment id: <?=$row['id']; ?></h4>
	author <br />
	<input type="text" name="name" value="<?=$row['author']; ?>"/>
	<p></p>
	text <br />
	<textarea type="text" name="text" > <?=$row['text']; ?> </textarea>
	<p></p>
	<input type="submit" name="" />
	
</form>
<? }; ?>


<? if($query == 'categories') { ?>
<form action="save-changes.php" method="post">
	<input type="hidden" value="<?= $query; ?>"  name="query"/>
	<input type="hidden" value="<?= $id; ?>"  name="id"/>
	<h4>Edit categories id: <?=$row['id']; ?></h4>
	name of category <br />
	<input type="text" name="name" value="<?=$row['name']; ?>"/>
	<p></p>
	<input type="submit" name="" />
	
</form>
<? }; ?>



<? if($query == 'product_items') { ?>
<form action="save-changes.php" method="post">
	<input type="hidden" value="<?= $query; ?>"  name="query"/>
	<input type="hidden" value="<?= $id; ?>"  name="id"/>
	<h4>Edit product id: <?=$row['id']; ?></h4>
	name of category <br />
	<input type="text" name="name" value="<?=$row['name']; ?>"/>
	<p></p>
	price $ <br />
	<input type="text" name="price" value="<?=$row['price']; ?>"/>
	<p></p>
	aviable <br />
	<input type="text" name="in_stock" value="<?=$row['in_stock']; ?>"/>
	<p></p>
	Model <br />
	<input type="text" name="model" value="<?=$row['model']; ?>"/>
	<p></p>
	Brand <br />
	<input type="text" name="brand" value="<?=$row['brand']; ?>"/>
	<p></p>
	Description <br />
	<textarea name="description" id="" cols="30" rows="10"><?=$row['description']; ?></textarea>
	<p></p>
	<input type="submit" name="" />
	
</form>
<? }; ?>