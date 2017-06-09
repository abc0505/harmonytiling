<?php include(VIEW_PATH . 'top.php'); ?>

<div class="container">
  <div class="main">
    <div class="contact">				
      <h1 class="bg-success" style="padding:20px;">Your order has been received.</h1>  
      <p style="margin-top:20px;">
        Thank you for your purchase.<br><br>
        
        Your order number is <span class="text-primary"><big><?php echo $order_id; ?></big></span><br><br>
        
        You will receive an order confirmation email with details of your order and a link to track its progress.<br>
        Click here to print a copy of your order confirmation.<br><br><br>
        
        <div class="text-center">
          <button id="btn_home" type="button" class="btn btn-default">Back to Home</button>  
        </div>
      </p>
    </div>
  </div>
</div>

<script type="text/javascript">
  /* global $ */
	$(document).ready(function(c) {

		$("#btn_home").on("click", function() {
		  window.location.href = "index.php?pid=index_view";
		});

	});

</script>



<?php include(VIEW_PATH . 'bottom.php'); ?>
