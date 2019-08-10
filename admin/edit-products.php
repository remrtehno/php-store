<?php
	include('../DB.php');

?>

<? include('header.php'); ?>





<? include('left-sidebar.php'); ?>






  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
   		<!-- Content Header (Page header) -->
      <h1>
        Edit products
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    
    <? 
    	//get all product
    	$res = mysql_query("SELECT * FROM product_items");
    	$row = mysql_fetch_assoc($res);
    	?><table  class="table">
    	 <thead>
		    <tr>
		    <th scope="col">Id</th>
		      <th scope="col">Name</th>
		       <th scope="col">Image</th>
		      <th scope="col">price</th>
		      <th scope="col">action</th>

		    </tr>
		  </thead>
    	<?
    	do { ?>
    	<tr>
    		<th><?=$row['id']; ?> </th>
    		<th><?=$row['name']; ?> </th>
    		<th><img src="/<?=$row['img_slug']; ?>"> </th>
    		<th>  <?=$row['price']; ?>$</th>
    		<th> <a href="edit-all.php?query=product_items&id=<?=$row['id']; ?>">Edit</a>/<a href="delete.php?query=product_items&id=<?=$row['id']; ?>">delete</a> </th>
    	</tr>
			
	<?	} while($row = mysql_fetch_assoc($res));
		  
		  
    	?>
    	
    		
    	</table>
    	<div class="text-center w-50 m-auto">
    		<p>
			</p>
				<p></p>

    		<a class="btn btn-primary mr-5" href="add-all.php?query=product_items">
    			Добавить продукт
    		</a>
    	</div>
    </section>
   
   
   
   
  </div>
  <!-- /.content-wrapper -->







  <!-- Main Footer -->
  <? include('footer.php'); ?>