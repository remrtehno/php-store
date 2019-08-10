<?php
	include('../DB.php');
	
	
	
	$query = $_GET['query'];
	$id = $_GET['id'];



?>

<style>
	form {

		padding-top: 50px;

		text-align:center;
	}
</style>

<? if($query == 'users') { ?>
<form action="add-new-item.php" method="post">
	<input type="hidden" value="<?= $query; ?>"  name="query"/>
	<h4>Add new user </h4>
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
<form action="add-new-item.php" method="post">
<input type="hidden" value="<?= $query; ?>"  name="query"/>
	<h4>Add new category</h4>
	name of category <br />
	<input type="text" name="name" value=""/>
	<p></p>
	<input type="submit" name="" value="add cat" />
	
</form>
<? }; ?>



<? if($query == 'product_items') { ?>
<form action="add-new-item.php" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?= $query; ?>"  name="query"/>
	
	<h4>Add new product</h4>
	
	name of product <br />
	<input type="text" name="name" value="<?=$row['name']; ?>"/>
	<p></p>
	
	image <br />
	<input name="img_slug" type="file">
	<p></p>
	
	name of category <br />
	<select name="cat_id" id="">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
	</select>
	<p></p>
	
	price $ <br />
	<input type="text" name="price" value=""/>
	<p></p>
	
	aviable <br />
	<select name="in_stock" id="">
		<option value="in_stock">In stock</option>
		<option vale="not available">not available</option>
	</select>
	<p></p>
	
	Model <br />
	<input type="text" name="model" value=""/>
	<p></p>
	
	Brand <br />
	<input type="text" name="brand" value=""/>
	<p></p>
	
	Description <br />
	<textarea name="description" id="" cols="30" rows="10"></textarea>
	<p></p>
	
	<input type="submit" name="" />
	
</form>
<? }; ?>