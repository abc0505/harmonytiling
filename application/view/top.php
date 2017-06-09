<?php include_once('comLib.php'); ?>
<?php

  $homeActive = "";
  $gadgetActive = "";
  $salesActive = "";
  $newitemActive = "";
  $top50Active = "";
	$searchPid = "gadget_list";
	
  if($pid === "index_view") {
    $homeActive = "active";
  } else if($pid === "gadget_list") {
    $gadgetActive = "active";
  } else if($pid === "gadget_salelist") {
    $salesActive = "active";
    // $searchPid = $pid;
  } else if($pid === "gadget_newitemlist") {
    $newitemActive = "active";
    // $searchPid = $pid;
  } else if($pid === "gadget_top50list") {
    $top50Active = "active";
    // $searchPid = $pid;
  }

?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		
    <title></title>

		<!-- Bootstrap -->
		<link href="../components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- start menu -->
		<link href="../public_html/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />

		<link href="../public_html/css/etalage.css" rel="stylesheet" type="text/css">

		<!-- Custom Theme files -->
		<link href="../public_html/css/style.css" rel='stylesheet' type='text/css' />
		
		<!-- Parsley validator -->
		<link href="../components/Parsley.js-2.4.4/src/parsley.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery -->
    <script src="../components/jquery/dist/jquery.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="../components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Parsley validator -->
    <script src="../components/Parsley.js-2.4.4/dist/parsley.min.js"></script>

		<script src="../public_html/js/jquery.etalage.min.js"></script>

		<!-- start menu -->
		<script src="../public_html/js/megamenu.js"></script>

		<script src="../public_html/js/menu_jquery.js"></script>
		<!--script src="../public_html/js/simpleCart.min.js"> </script-->


		<script type="text/javascript">
			// function hideURLbar() { 
			// 	window.scrollTo(0,1); 
			// }
			
			// addEventListener("load", function() { 
			// 	setTimeout(hideURLbar, 0); 
			// }, false);
			
			/* global $ */
			$(document).ready(function() {
				
				function ajaxAddCart() {
		      $.post("index.php", {
						 pid: "cart_total"
		      }
		      ,function(data, status) {
		      	data = JSON.parse(data.trim());
		      	// alert("total("+ data.total +")");
		      	$(".simpleCart_total").html(" &#36; " + data.total + " ");
		      	$(".simpleCart_quantity").html(" " + data.cnt + " ");
		      });
				}

				$(".megamenu").megamenu();
				
				ajaxAddCart();
				setInterval(ajaxAddCart,2000);

			});
		</script>

	</head>
	
	<body>
		
		<!-- header_top -->
		<div class="top_bg">
			<div class="container">
				<div class="header_top">
					<div class="top_right">
						<ul>
							
						</ul>
					</div>
					<div class="top_left">
						<h2></h2>
					</div>
						<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	
	
		<!-- header -->
		<div class="header_bg">
			<div class="container">
				<div class="header">
					<div class="head-t">
						<div class="logo">
							<a href="index.php?pid=index_view"><img src="../public_html/images/logo1.png" class="img-responsive" alt=""/> </a>
						</div>
						<!-- start header_right -->
						<div class="header_right">
							<div class="rgt-bottom">
					
								<div class="log">
									<div class="login" >
										<div id="loginContainer">
<?php	if($isLogin) {  ?>
											<a href="#" id="loginButton"><span>My Page</span></a>
<?php } else { ?>
											<a href="index.php?pid=signup_view" id="loginButton"><span>Login</span></a>
<?php }  ?>
											<!--
											<div id="loginBox">                
												<form id="loginForm" data-parsley-validate="" method="post" action="index.php">
													<fieldset id="body">
														<fieldset>
															<label for="email">Email Address</label>
															<input type="email" name="email" required="required" data-parsley-trigger="change">
														</fieldset>
														<fieldset>
															<label for="password">Password</label>
															<input type="password" name="password" required="required">
														</fieldset>
														<input type="hidden" name="pid">
														<input type="submit" id="login" value="Sign in">
														<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
													</fieldset>
													<div id="errMsg"></div>
													<span><a href="#">Forgot your password?</a></span>
												</form>
											</div>
											-->
										</div>
									</div>
								</div>
<?php	if($isLogin) {  ?>
								<div class="reg">
									<a href="index.php?pid=signin_out">LOGOUT</a>
								</div>
								
								
<?php } else { ?>
								<div class="reg">
									<a href="index.php?pid=signup_view">REGISTER</a>
								</div>
<?php }  ?>
								<div class="clearfix"> </div>
							</div>
				
							<div class="search">
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
		
		
					<!-- start header menu -->
					<ul class="megamenu skyblue">
						<li class="<?php echo $homeActive; ?> grid"><a class="color1" href="index.php?pid=index_view">Home</a></li>
						<li class="<?php echo $gadgetActive; ?> grid"><a class="color2" href="#">Showroom & DIY</a>
							<div class="megapanel">
								<div class="row">
									<div class="col1">
										<div class="h_nav">
											<h4>Showroom</h4>
											<ul>
												<li><a href="index.php?pid=gadget_list&category=1">Bath</a></li>
												<li><a href="index.php?pid=gadget_list&category=2">Kitchen $ Interior</a></li>
											</ul>	
										</div>							
									</div>
									<div class="col1">
										<div class="h_nav">
											<h4>DIY</h4>
											<ul>
												<li><a href="index.php?pid=gadget_list&category=3">Tools</a></li>
												<li><a href="index.php?pid=gadget_list&category=4">Material</a></li>
											</ul>	
										</div>							
									</div>
									<div class="col1">
										<div class="h_nav">
											
										</div>												
									</div>
								</div>
							</div>
						</li>
						<li class="<?php echo $salesActive; ?>"><a class="color4" href="index.php?pid=gadget_salelist">Quotation</a></li>
						<li class="<?php echo $newitemActive; ?>"><a class="color5" href="index.php?pid=gadget_newitemlist">Company Information</a></li>
						<li class="<?php echo $top50Active; ?>"><a class="color6" href="index.php?pid=gadget_top50list">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--  end top  -->

<script type="text/javascript">
  /* global $ */
	$(document).ready(function(c) {

	  $("#btn_search").click(function(event) {
	    event.preventDefault();
	    $("#frm_search input[name=pid]").val('gadget_list');
	    $("#frm_search").attr("action", "index.php").submit();
	  });

	});

</script>

