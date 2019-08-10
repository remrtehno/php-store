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
        Edit category
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    
    <? 
    	//get all product
    	$res = mysql_query("SELECT * FROM commetns");
    	$row = mysql_fetch_assoc($res);
    	?><table  class="table">
    	 <thead>
		    <tr>
		    <th scope="col">Id</th>
		      <th scope="col">author</th>
		      <th scope="col">for product id</th>
 				<th scope="col">Text</th>
		      <th scope="col">Action</th>


		    </tr>
		  </thead>
    	<?
    	do { ?>
    	<tr>
    		<th><?=$row['id']; ?> </th>
    		<th><?=$row['author']; ?> </th>
			<th><?=$row['prod_id']; ?> </th>
			<th><?=$row['text']; ?> </th>
			
    		<th> <a href="edit-all.php?query=commetns&id=<?=$row['id']; ?>">Edit</a>/<a href="delete.php?query=commetns&id=<?=$row['id']; ?>">delete</a> </th>
  
    	</tr>
			
	<?	} while($row = mysql_fetch_assoc($res));
		  
		  
    	?>
    	
    		
    	</table>
    
    </section>
   
   
   
   
  </div>
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
  <? include('footer.php'); ?>