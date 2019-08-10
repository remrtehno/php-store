<?php
	include('DB.php');
	include('header.php');
	
	$login = $_SESSION['auth']['login'];

	
	$res = mysql_query("SELECT * FROM users WHERE login='$login'");
	$row = mysql_fetch_assoc($res);
	
	$user_id = $row['id'];
	
	
	//orders
	$res_orders = mysql_query("SELECT * FROM orders WHERE user_id=$user_id");
	$row_orders = mysql_fetch_assoc($res_orders);

	
	
?>
<style>
	#templatemo_middle {
		display: none;
	}
	.cabinet {
		padding: 20px;
		display:flex;
	}
	.info-user {
		flex-basis: 35%;
	}
	.buy {
		flex-basis: 35%;
	}
	a {
		display:block;
	}
	tr{
		border-bottom: 1px solid;
	}
	th, td {
		border: 1px solid;
		padding: 4px;
	}
	ul {
		
		    list-style: none;
    padding: 0;
	}
</style>


<h2 style="margin-left: 20px;">CABINET</h2>
	<div class="cabinet" user-id="<?= $user_id; ?>">
	
		<div class="info-user">
			<h5>Your info</h5>
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Name</th>
			      <th scope="col">Login</th>
			      <th scope="col">Password</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row"><?= $row['name']; ?></th>
			      <td><?= $row['login']; ?></td>
			      <td><?= $row['pass']; ?></td>
			    </tr>
			  </tbody>
			</table>
			<p></p> <p></p> <p></p>
			<a href="edit.php"> <h4> Edit </h4> </a>
		</div>
		
		<div class="buy">
			<h5>Your cart/Orders</h5>
				<? if($row_orders) { ?>
					
				
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Name of product</th>
					      <th scope="col">Photo</th>
					      <th scope="col">count</th>
					      <th scope="col">Price 1 per</th>
					      <th scope="col">Price </th>
					      <th scope="col">Delete</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<? do { 
					  		$item_id = $row_orders['item_id'];
					  		$order_id = $row_orders['id'];
					  		
					  		if($item_id) {
						  		$res_product_order = mysql_query("SELECT * FROM product_items WHERE id=$item_id");
						  		$row_orders_order = mysql_fetch_assoc($res_product_order);

					  	?>
							<tr>
						      <th><a href="product.php?id=<?=$item_id; ?>"><?= $row_orders_order['name']; ?></a></th>
						      <td><img src="<?= $row_orders_order['img_slug']; ?>" style="max-height: 50px;"></td>
						      <td><?=$row_orders['quantity']; ?></td>
						       <td><?= $row_orders_order['price']; ?></td>
						      <td><?= $row_orders_order['price']*$row_orders['quantity']; ?></td>
						      <td><a href="delete_prod.php?id=<?= $order_id; ?>&item_id=<?= $item_id; ?>&user_id=<?=$user_id;?>">Delete</a></td>
						      <input type="hidden" value="<? $result += ($row_orders_order['price']*$row_orders['quantity']);?>  "> 
						    </tr>
						<? }; //if else
						} while ($row_orders = mysql_fetch_assoc($res_orders)); ?>
					  	</tbody>
					  </table>
					<h4>RESULT: <?= $result;?>$</h4>
					
					<a style="background: #cdcdcd; display: inline-block; color: #fff; padding: 20px 30px;" href="order.php">Заказать</a>
				<? } else { ?> <h4> Cart is empty </h4> <? }; ?>

		</div>
		
		
		<!-- history of orders -->
		<? $res_submitted_orders = mysql_query("SELECT * FROM orders_submitted WHERE user_id=$user_id "); 
		$row_submitted_orders = mysql_fetch_assoc($res_submitted_orders); 
		?>
		<div class="order_status">
			<h4>History of yours orders</h4>
			<? if($row_submitted_orders) { ?>
			<ul>
				<? do { ?>
					<li>
						ID orders: <?= $row_submitted_orders['id'];?> Status: <?= $row_submitted_orders['status']; ?>
					</li>
				<? } while($row_submitted_orders = mysql_fetch_assoc($res_submitted_orders));?>
			</ul>
			<? } else {
				echo 'No hiistory';
			}; ?>
		
		</div> <!--order_status-->
		
	</div> <!--cabinet-->
	
	
	
	<div class="write_msg" style="padding: 20px;">
		<h2>Write message to other Users</h2>
		<ul>
		<? //get all users name and slug 
			$res_users = mysql_query("SELECT * FROM users "); 
			$row_users = mysql_fetch_assoc($res_users); 
			do { 
				if($_SESSION['auth']['id'] == $row_users['id']) {
				//print_r($_SESSION['auth']['id'] == $row_users['id']);
				} else {
			?>
				<li>
					<a href="write_msg.php?user_id_reciever=<?=$row_users['id']; ?>" style="font-size: 18px;"><?= $row_users['login'];?> <p></p> </a>
				</li>
			<?	};
			} while($row_users = mysql_fetch_assoc($res_users));
		?>
		</ul>
	</div> <!--write_msg-->

<?php include('footer.php'); ?>