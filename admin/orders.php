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
<section class="content-header">
      <h1>
        Orders
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

		<!-- /.content -->
		<!--------------------------
		        | Your Page Content Here |
		        -------------------------->
		        
				
				
		<!-- history of orders -->
		<? $res_submitted_orders = mysql_query("SELECT * FROM orders_submitted"); 
		   $row_submitted_orders = mysql_fetch_assoc($res_submitted_orders); 
		?>
		<div class="order_status">
			<? if($row_submitted_orders) { ?>
			<ul>
				<? do { ?>
				<?  //get product
					 $prod_id = $row_submitted_orders['item_id'];
				
					$res_product = mysql_query("SELECT * FROM product_items WHERE id=$prod_id");
					$row_orders_order = mysql_fetch_assoc($res_product);
				?>
				<? if($row_orders_order['name']) { ?>
					 
				
					<li>
						<!--description-->
						ID orders: <?= $row_submitted_orders['id'];?> Status: <?= $status = $row_submitted_orders['status'];  ?> User ID: <?= $user_id = $row_submitted_orders['user_id']; ?> Product ID: <?= $prod_id = $row_submitted_orders['item_id']; ?> <br />
						<!--product self-->
						<?
							//get product
							//$res_product = mysql_query("SELECT * FROM product_items WHERE id=$prod_id");
							//$row_orders_order = mysql_fetch_assoc($res_product);
							
							//get name of user
							$res_user = mysql_query("SELECT * FROM users WHERE id=$user_id");
							$row_user = mysql_fetch_assoc($res_user);
						?>
							<ul class="itm">

						      <li><a href="../product.php?id=<?=$prod_id; ?>"><?= $row_orders_order['name']; ?></a></li>
						      <li> <b><img src="/<?= $row_orders_order['img_slug']; ?>" style="max-height: 50px;"></b></li>
						      <li>quantity:  <b><?=$row_submitted_orders['quantity']; ?></b></li>
						    	<li>price: <b><?= $row_orders_order['price']; ?></b></li>
						      <li>price:  <b><?= $row_orders_order['price']*$row_submitted_orders['quantity']; ?></b></li>
						      <li>Name:  <b><?= $row_user['name']; ?></b></li>
						      <li>Status:  <b><?= $status; ?></b></li>
						      <li><a href="">Submit</a></li>
						    </ul>
						
						
						
						
						
						<hr style="border-top: 1px solid #131313;margin: 10px;margin-left: 0;"/>
					</li>
					<? } else {
							
							echo("<p><br></p>"."product deleted ID:" . $prod_id . "<p><br></p>");
						
						}; //if have a product ?>
				<? } while($row_submitted_orders = mysql_fetch_assoc($res_submitted_orders));?>
			</ul>
			<? }; ?>
		
		</div> <!--order_status-->
		        

    </section>
    
   
   
   
   
  </div>
  <!-- /.content-wrapper -->

  
  <style>
	.itm li {
		
		width: 270px;

	}
	.itm {
				   display: flex;
    justify-content: space-between;
    max-width: 45%;
    list-style: none;
    margin-top: 10px;
	}
</style>

  <!-- Main Footer -->
  <? include('footer.php'); ?>
