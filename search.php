<?php
	include('DB.php');
	include('header.php');
	
	$query = $_POST['query']; 
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
        	<?php $product_res = mysql_query("SELECT * FROM product_items WHERE name LIKE '%$query%'"); 
        		  $product_items_row = mysql_fetch_assoc($product_res); 			
        	?>
         	<?php do { if($product_items_row) { ?>
				         	
	            <div class="col col_14 product_gallery no_margin_right">
	            	<a href="product.php?id=<?=$product_items_row['id']; ?>"><img src="<?=$product_items_row['img_slug']; ?>" alt="Product 03" /></a>
	                <h3><?=$product_items_row['name']; ?></h3>
	                <p class="product_price">$ <?=$product_items_row['price']; ?></p>
	                <a href="" class="add_to_cart">Add to Cart</a>
	            </div> 	
			<?	} else {
				 echo 'No products';	
				};
  		 } while( $product_items_row = mysql_fetch_assoc($product_res)); ?>
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    





<?php include('footer.php'); ?>