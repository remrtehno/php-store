<?php
	include('DB.php');
	 session_start();
	
	$login = $_SESSION['auth']['login'];
	
	$res = mysql_query("SELECT * FROM users WHERE login='$login'");
	$row = mysql_fetch_assoc($res);
	
	$user_id = $row['id'];
	
	
	//orders
	$res_orders = mysql_query("SELECT * FROM orders WHERE user_id=$user_id");
	$row_orders = mysql_fetch_assoc($res_orders);
	
	// write to orders submitt
		 if($row_orders) { 
					
			  	 do { 
			  		$item_id = $row_orders['item_id'];
			  		$order_id = $row_orders['id'];
			  		
			  		if($item_id) {
			  			
			  			//get product
				  		//$res_product_order = mysql_query("SELECT * FROM product_items WHERE id=$item_id");
				  		//$row_orders_order = mysql_fetch_assoc($res_product_order);
				  		
				  		$quantity = $row_orders['quantity'];
				  		$result += ($row_orders_order['price']*$row_orders['quantity']);
				  		$status = 'submitted/waiting';
				  		

						//insert
						$insert_submitted_order = mysql_query("INSERT orders_submitted (user_id,item_id, quantity, status) VALUES ($user_id,$item_id,$quantity, '$status')");
						
						//delete
						$del_from_orders = mysql_query("DELETE FROM orders WHERE user_id=$user_id");
						
					
					
				    
					}; //$item_id if else
					
			      } while ($row_orders = mysql_fetch_assoc($res_orders)); 
				
			}; //$row_orders if 
				
		header("Location: cabinet.php");
	
			
			
			
			
			
			
			
			
			
			