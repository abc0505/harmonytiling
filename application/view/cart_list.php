<?php include(VIEW_PATH . 'top.php'); ?>

<?php
	$total = 0;
	$deliveryCharges = 0;
	$itemCnt = count($rows);
	if($itemCnt > 0) {
		$deliveryCharges = 20;
	}

?>

<div class="container">
	<div class="check">	 

		 <div class="col-md-9 cart-items">
			 <h1>My Shopping Bag</h1>
			 
<?php
      if(count($rows) > 0) {
        foreach($rows as $row) {
          $product_id = $row["product_id"];
          $product_name = $row["product_name"];
          $image = $row["image1"];
          $onSale = $row["sale_yn"] == 'Y' ? true : false;
          $price = $row["price"];
          if($onSale) {
          	$price = $row["sale_price"];
          }
          $quantity = $row['quantity'];
          $subTotal = $price * $quantity;
          $total += $subTotal;
?>

			 <div class="cart-header">
				 <div class="close1" data-value="<?php echo $product_id; ?>"> </div>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="../public_html/images/products/<?php echo $image; ?>" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						<h3><a href="#"><?php echo $product_name; ?></a></h3>
						<ul class="qty">
							<li><p>Price : &#36; <?php echo $price; ?></p></li>
							<li><p>Qty : <?php echo $quantity; ?></p></li>
						</ul>
						
							 <div class="delivery">
							 <p>Service Charges : &#36; <?php echo $subTotal; ?></p>
							 <span>Delivered in 2-3 bussiness days</span>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
<?php
        }
			}
?>

		 </div>



			 <div class="col-md-3 cart-total">
			 
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span id="totalPrice" class="total1">&#36; <?php echo $total; ?></span>
				 <span>Delivery Charges</span>
				 <span id="deliveryCharges" class="total1">&#36; <?php echo $deliveryCharges; ?></span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span id="grandTotalPrice">&#36; <?php echo ($total + $deliveryCharges); ?></span></li>
			   <div class="clearfix"> </div>
			 </ul>
			
			 
			 <div class="clearfix"></div>
			 <a id="btn_checkout" class="order" href="#">CHECKOUT</a>
			</div>
			
			
		 
		
			<div class="clearfix"> </div>
	 </div>
	 </div>


	<script type="text/javascript">
	  /* global $ */
		$(document).ready(function(c) {

			// remove item
			$( ".close1" ).each(function(index) {
				$(this).on("click", function(){
					var product_id = $(this).data("value");
					var elem = $(this);
					$.post("index.php", {
						 pid: "cart_removeProduct"
						,product_id: product_id
					}
					,function(data, status) {
						data = JSON.parse(data.trim());
						if(data.status === "success") {
							
							// remove element
							elem.parent().fadeOut('fast', function(c) {
								elem.parent().remove();
							});
							
							// change total price
							$("#totalPrice").html(" &#36; " + data.total + " ");
							
							var deliveryCharges = data.cnt > 0 ? 20 : 0;
							$("#deliveryCharges").html("&#36; " + deliveryCharges);
							
							$("#grandTotalPrice").html(" &#36; " + (parseFloat(data.total) + deliveryCharges));
						}
					});
					
				});
			});
			
			
			// checkout
			$("#btn_checkout").on("click", function() {
				event.preventDefault();
				var itemCnt = <?php echo $itemCnt; ?>;
				if(itemCnt < 1) {
					alert("Please add products.");
					return false;
				}
				$.post("index.php", {
					 pid: "cart_checkout"
				}
				,function(data, status) {
					data = JSON.parse(data.trim());
					if(data.status === "success") {
						// alert("success");
						window.location.replace("index.php?pid=cart_checkoutComplete&order_id="+data.orderId);
					} else {
						alert("status("+ data.status +") msg("+ data.msg +")");
					}
				});
			});
			
			

		});

	</script>


<?php include(VIEW_PATH . 'bottom.php'); ?>



