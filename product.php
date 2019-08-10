<?php
	include('DB.php');
	include('header.php');
	
	$product_id = $_GET['id'];
	
?>


<div id="product_slider">
    		<div id="SlideItMoo_outer">	
                <div id="SlideItMoo_inner">			
                    <div id="SlideItMoo_items">
                        <div class="SlideItMoo_element">
                                <a href="http://www.templatemo.com/page/1" target="_parent">
                                <img src="images/gallery/01.jpg" alt="product 1" /></a>
                        </div>	
                        <div class="SlideItMoo_element">
                                <a href="http://www.templatemo.com/page/2" target="_parent">
                                <img src="images/gallery/02.jpg" alt="product 2" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                                <a href="http://www.templatemo.com/page/3" target="_parent">
                                 <img src="images/gallery/03.jpg" alt="product 3" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                                <a href="http://www.templatemo.com/page/4" target="_parent">
                                <img src="images/gallery/04.jpg" alt="product 4" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                                <a href="http://www.templatemo.com/page/5" target="_parent">
                               <img src="images/gallery/05.jpg" alt="product 5" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                                <a href="http://www.templatemo.com/page/6" target="_parent">
                                <img src="images/gallery/06.jpg" alt="product 6" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                                <a href="http://www.templatemo.com/page/6" target="_parent">
                                <img src="images/gallery/07.jpg" alt="product 7" /></a>
                        </div>
                    </div>			
                </div>
            </div>
            <div class="cleaner"></div>
        </div>
        
        
        <?php include('sidebar.php'); ?>
                
        <div id="content">
        	<?php $product_res = mysql_query("SELECT * FROM product_items WHERE id=$product_id "); 
        		  $product_items_row = mysql_fetch_assoc($product_res); 		
        		  	
        	?>
         	<?php do { ?>
	               	<h2><?=$product_items_row['name']; ?></h2>
            <div class="col col_13">
        	<a  rel="lightbox[portfolio]" href="images/product/10_l.jpg" title="Lady Shoes"><img src="<?=$product_items_row['img_slug']; ?>" alt="Image 10" /></a>
            </div>
            <div class="col col_13 no_margin_right">
	            <form action="add_to_cart.php" method="post">
	            	<input name="item_id"  type="hidden"  value="<?=$product_id; ?>"/>
	            	<input name="user_id" type="hidden" value="<?=$_SESSION['auth']['id'];?>"/>
	                <table>
	                    <tr>
	                        <td height="30" width="160">Price:</td>
	                        <td>$<?=$product_items_row['price']; ?></td>
	                    </tr>
	                    <tr>
	                        <td height="30">Availability:</td>
	                        <td><?=$product_items_row['in_stock']; ?></td>
	                    </tr>
	                    <tr>
	                        <td height="30">Model:</td>
	                        <td><?=$product_items_row['model']; ?></td>
	                    </tr>
	                    <tr>
	                        <td height="30">Manufacturer:</td>
	                        <td><?=$product_items_row['brand']; ?></td>
	                    </tr>
	                    <tr>
	                    	<td height="30">Quantity</td><td>
	                    		<input type="text" name="count" value="1" style="width: 20px; text-align: right" />
	                    	</td>
	                    </tr>
	                </table>
	                <div class="cleaner h20"></div>
	                <button type="submit" class="add_to_cart">Add to Cart</button>
                </form>
			</div>
            <div class="cleaner h30"></div>
            
            <h5><strong>Product Description</strong></h5>
            <p><?=$product_items_row['description']; ?></p>	
            
            <div class="cleaner h50"></div>
        

  		<? } while( $product_items_row = mysql_fetch_assoc($product_res)); ?>
  		<h4> Comments </h4> 
  		<?php $product_ciomment_res = mysql_query("SELECT * FROM commetns WHERE prod_id=$product_id "); 
  
				 $product_ciomment_row = mysql_fetch_assoc($product_ciomment_res); 	

         do { 
          if($product_ciomment_row) { ?>
         	
             	<div><?= $product_ciomment_row['author']; ?> </div>
             	<div><?= $product_ciomment_row['text']; ?> </div>
             	<hr />
				
    			<? } else {
    				echo "No commetns";	
    			};
         	
         	} while($product_ciomment_row = mysql_fetch_assoc($product_ciomment_res)); 


            ?>

  		  <div class="comments" style="margin-top: 40px;">
        	<form action="addComment.php" method="post">
        	<input type="hidden" name="prod_id" value="<?= $product_id; ?>"/>
        		<p>name <br> <input name="author"/> </p>
        		<p>author <br> <textarea name="comment"></textarea></p>
        		<p><input type="submit"/></p>
        	</form>
        </div>
        </div> <!-- END of content -->
        <div class="cleaner"></div>
        
      
        
    </div> <!-- END of main -->
    





<?php include('footer.php'); ?>