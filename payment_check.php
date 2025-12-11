<?php
include("connection.php");
session_start();
error_reporting(0);
$amount=$_REQUEST['amount'];
	if(isset($_POST['proceed']))
	{
	$account_no=$_POST['account_no'];
	
		echo 'yes';
		header("location:payment_confirm.php?amount=$amount&account_no=$account_no");
		
	}
?>

<?php  
	echo"<style>#nav,#news,#footer{ display:none;
			}
		</style>";?>
<!DOCTYPE html>
<html>
<head>
<title>Lighting A Ecommerce Category Flat Bootstarp Resposive Website Template | Account :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<script src="js/jquery.min.js"></script>

<!--//theme style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!-- /start menu -->

</head>
<body> 
<!--header-->	
<script src="js/responsiveslides.min.js"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: false,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: false,
      });
    });
  </script>
  
<?php 
	include("header.php");
?>

 <br> <br> <br>
<style>

label{
	font-size:20px !important;
}

</style>
<!---->	
<div class="container">
	  <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Payment Login</li>
		 </ol>
	 <div>
		 <div>
			
			 <!-- [if IE] 
				< link rel='stylesheet' type='text/css' href='ie.css'/>  
			 [endif] -->  
			  
			 <!-- [if lt IE 7]>  
				< link rel='stylesheet' type='text/css' href='ie6.css'/>  
			 <! [endif] -->  
			 <script>
				(function() {
			
				// Create input element for testing
				var inputs = document.createElement('input');
				
				// Create the supports object
				var supports = {};
				
				supports.autofocus   = 'autofocus' in inputs;
				supports.required    = 'required' in inputs;
				supports.placeholder = 'placeholder' in inputs;
			
				// Fallback for autofocus attribute
				if(!supports.autofocus) {
					
				}
				
				// Fallback for required attribute
				if(!supports.required) {
					
				}
			
				// Fallback for placeholder attribute
				if(!supports.placeholder) {
					
				}
				
				// Change text inside send button on submit
				var send = document.getElementById('register-submit');
				if(send) {
					send.onclick = function () {
						this.innerHTML = '...Sending';
					}
				}
			
			 })();
			 </script>
			 <div class="container">
			 <!-- Form -->
            
				<form  method="post">
					<div class='col-md-6'>
						<label>
						 Total Price<br>
							</label>
							<input class='form-control' placeholder="amount"  type="text"   name="amount"  value="<?php echo $_REQUEST['amount']; ?>"   readonly="readonly">
						
					</div>
					<div class='col-md-6'>
						<label>
					     Card Number<br>
								</label>
								<input class='form-control' placeholder="Card Number" type="text"   name="account_no" id="account_no" pattern="[0-9]{16}" required>
					
					</div>
					<div class='col-md-6'>
						<label>
						Card Name<br>
								</label>
								<input class='form-control' placeholder="Card Name" type="text"  name="name" id="account_no" required>
					
					</div>
                    <div class='col-md-6'>
						<label>
						 Expiry Month<br>
							</label>
							<input  class='form-control' placeholder="Expiry month"  type="number"   name="month"  min='01' max='12' required>
						
					</div>
					 <div class='col-md-6'>
						<label>
						Expiry Year<br>
							</label>
							<input class='form-control'  placeholder="Expiry Year" type="number"   name="year"  min='22' max='30' required>
						
					</div>
					<div class='col-md-6'>
						<label>
						CVV<br>
							
						</label>
						<input class='form-control' placeholder="CVV" type="password"  name="cvv" pattern="[0-9]{3}" required>
					</div>
                   		<div class='col-md-6'>
						<br> <br> <br>
						<input type="submit" value="Proceed" class="btn btn-primary" name="proceed">
					</div>		
                                		
					
				</form>
			 </div>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!---->
<?php include("footer.php");?>

<!---->
</body>
</html>