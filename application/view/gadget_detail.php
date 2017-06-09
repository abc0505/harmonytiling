<?php include(VIEW_PATH . 'top.php'); ?>

<?php
  $product_id = $row["product_id"];
  $product_name = $row["product_name"];
  $brand = $row["brand"];
  $color = $row["color"];
  $weight = $row["weight"];
  $price = $row["price"];
  $sale_price = $row["sale_price"];
  $stock = $row["stock"];
  $image1 = $row["image1"];
  $image2 = $row["image2"];
  $image3 = $row["image3"];
  $image4 = $row["image4"];
  $sale_yn = $row["sale_yn"];
  
  $description = $row["description"];

  
  
  $onSale = $sale_yn == 'Y' ? true : false;
  $priceTag = "";
  if($onSale) {
    $priceTag = "<span class='price-new'>$sale_price</span><span class='price-old'>$price</span> ";
  } else {
    $priceTag = "<span class='price-new'>$price</span>";
  }
  $sold_count = $row["sold_count"];
  $short_description = $row["short_description"];
  $description = $row["description"];
  
  $order_quantity = "1";
  $action = "";
  if(isset($_SESSION["prevPidObj"])) {
		$prevPidObj = $_SESSION["prevPidObj"];
		$order_quantity = $prevPidObj["order_quantity"];
		$action = $prevPidObj["action"];
  }

  // echo "product_id($product_id)  product_name($product_name) image1($image1) image2($image2) image3($image3) image4($image4) order_quantity($order_quantity)  action($action)";
?>

<!-- content -->
<!--img src="../public_html/images/d1.jpg" style="width:60px; height;100%;"-->
<div class="container">
<div class="women_main">
	<!-- start content -->
			<div class="row single">
				<div class="col-md-12 det">
				  <div class="single_left">
					<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="../public_html/images/products/<?php echo $image1; ?>" class="img-responsive" />
									<img class="etalage_source_image" src="../public_html/images/products/<?php echo $image1; ?>" class="img-responsive" title="" />
								</a>
							</li>
						
						</ul>
						 <div class="clearfix"></div>		
				  </div>
				  <div class="desc1 span_3_of_2">
					<h3><?php echo $product_name; ?></h3>
					<span class="brand">Brand: <a href="#"><?php echo $brand; ?></a></span><br>
					<span class="brand">Color: <a href="#"><?php echo $color; ?></a></span><br>
					<span class="brand">Weight: <a href="#"><?php echo $weight; ?></a></span>
					
					<br>
					<p><?php echo $short_description; ?></p><br>
					<div class="price">
						<span class="text">Price:</span>
						<?php echo $priceTag; ?>
						<!--span class="price-tax">Ex Tax: $90.00</span--><br>
						<!--span class="points"><small>Price in reward points: 400</small></span><br-->
						<span class="text">Quantity:</span>
						<input type="hidden" id="product_id" value="<?php echo $product_id ?>">
						<input type="number" id="order_quantity" name="order_quantity" min="1" max="99999999" value="<?php echo $order_quantity; ?>">
					</div>
					<!--div class="det_nav1">
						<h4>Select a size :</h4>
							<div class=" sky-form col col-4">
								<ul>
									<li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>L</label></li>
									<li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>S</label></li>
									<li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>M</label></li>
									<li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>XL</label></li>
								</ul>
							</div>
					</div-->
					
          	    <div class="clearfix"></div>
          	   </div>
          	    <div class="single-bottom1">
				
					<p class="prod-desc">Lorem ipsum dolor sit amet, consetempor cum soluta nobis eleifend option</p>
				</div>
				
				
				<!-- Related Products  -->
				<!--div class="single-bottom2">
					<h6>Related Products</h6>
						<div class="product">
						   <div class="product-desc">
								<div class="product-img">
		                           <img src="images/w8.jpg" class="img-responsive " alt=""/>
		                       </div>
		                       <div class="prod1-desc">
		                           <h5><a class="product_link" href="#">Excepteur sint</a></h5>
		                           <p class="product_descr"> Vivamus ante lorem, eleifend nec interdum non, ullamcorper et arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>									
							   </div>
							  <div class="clearfix"></div>
					      </div>
						  <div class="product_price">
								<span class="price-access">$597.51</span>								
								<button class="button1"><span>Add to cart</span></button>
		                  </div>
						 <div class="clearfix"></div>
				     </div>
				     <div class="product">
						   <div class="product-desc">
								<div class="product-img">
		                           <img src="images/w10.jpg" class="img-responsive " alt=""/>
		                       </div>
		                       <div class="prod1-desc">
		                           <h5><a class="product_link" href="#">Excepteur sint</a></h5>
		                           <p class="product_descr"> Vivamus ante lorem, eleifend nec interdum non, ullamcorper et arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>									
							   </div>
							   <div class="clearfix"></div>
					      </div>
						  <div class="product_price">
								<span class="price-access">$597.51</span>								
								<button class="button1"><span>Add to cart</span></button>
		                  </div>
						 <div class="clearfix"></div>
				     </div>
		   	  </div-->
				<!-- Related Products  -->
		   	  
		   	  
		   	  
		   	  
		   	  
	       </div>	

		   <div class="clearfix"></div>		
	  </div>
	<!-- end content -->
</div>
</div>

<script type="text/javascript">
  /* global $ */
	$(document).ready(function() {

		function ajaxAddCart() {
      $.post("index.php", {
				 pid: "gadget_addcart"
        ,product_id: $('#product_id').val()
        ,order_quantity: $('#order_quantity').val()
      }
      ,function(data, status) {
      	data = data.trim();
      	if(data === "success") {
          alert("This item has been added in the cart.");
      		
      	} else if(data === "duplicate") {
      		alert("This item already exists in a cart.");
      		
      	} else if(data === "need login") {
      		alert("You need to login.");
          window.location.href = "index.php?pid=signup_view";
      		
      	} else {
          alert("Data: " + data + "\nStatus: " + status);
      		
      	}
      });
		}
		
		
		$('#etalage').etalage({
			thumb_image_width: 300,
			thumb_image_height: 400,
			source_image_width: 900,
			source_image_height: 1200,
			show_hint: true,
			click_callback: function(image_anchor, instance_id){
				alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
			}
		});
		
		
    $("#btn_addtocart").click(function() {
      event.preventDefault();
      ajaxAddCart();
    });		

		var action = "<?php echo $action; ?>";
		if(action === "addCart") {
			ajaxAddCart();
		}
    

	});
</script>


<?php include(VIEW_PATH . 'bottom.php'); ?>
