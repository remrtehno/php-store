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
    	//get all 
    	$res = mysql_query("SELECT * FROM users");
    	$row = mysql_fetch_assoc($res);
    	?><table  class="table">
    	 <thead>
		    <tr>
		    <th scope="col">Id</th>
		      <th scope="col">Name</th>
		       <th scope="col">Login</th>
		      <th scope="col">Password</th>
		      <th scope="col">Action</th>


		    </tr>
		  </thead>
    	<?
    	do { ?>
    	<tr>
    		<th><?=$row['id']; ?> </th>
    		<th><?=$row['name']; ?> </th>
    		<th><?=$row['login']; ?></th>
    		<th>  <?=$row['pass']; ?></th>
    		<th> <a href="edit-all.php?query=users&id=<?=$row['id']; ?>">Edit</a>/<a href="delete.php?query=users&id=<?=$row['id']; ?>">delete</a> </th>
  
    	</tr>
			
	<?	} while($row = mysql_fetch_assoc($res));
		  
		  
    	?>
    	
    		
    	</table>
    
    </section>
   
       	<div class="text-center w-50 m-auto">
    		<p>
			</p>
				<p></p>

    		<a class="btn btn-primary mr-5" href="add-all.php?query=users">
    			Add  user
    		</a>
    	</div>
   
   
  </div>
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
  <? include('footer.php'); ?>