<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
ob_start();

include 'connection.php';

error_reporting(0);
$amount=$_REQUEST['amount'];
$account_no=$_REQUEST['account_no'];

?>
<?php
session_start();
if(isset($_POST['confirm']))
{
	$query4="SELECT * FROM tbl_cartmaster WHERE Cust_id='$_SESSION[id]' and status='cart'"; 
$result4=mysqli_query($con,$query4);
$num_rows1 = mysqli_num_rows($result4);
$row4=mysqli_fetch_array($result4);

$result=mysqli_query($con,"SELECT SUM(price*order_qty) AS sum1 FROM tbl_cartchild WHERE CartM_id='$row4[id]'") or die("error");
$row=mysqli_fetch_array($result);
$credit_sum=$row['sum1'];


$result44=mysqli_query($con,"SELECT  tbl_courier.id ,COUNT(tbl_cartmaster.Courier) as cc,tbl_cartmaster.Courier_Status FROM `tbl_courier` LEFT JOIN tbl_cartmaster ON tbl_courier.id=tbl_cartmaster.Courier  GROUP BY tbl_cartmaster.Courier    ORDER BY cc ASC limit 0,1");
$row44=mysqli_fetch_array($result44);
mysqli_query($con,"UPDATE tbl_cartmaster SET Total_price='$credit_sum', status='Purchased' ,Courier='$row44[id]' WHERE id='$row4[id]'");

//echo "UPDATE tbl_cartmaster SET status='1' WHERE CartM_id='$row4[id]'";
mysqli_query($con,"UPDATE tbl_cartchild SET status='1' WHERE CartM_id='$row4[id]'");
	 	 
	 $status="purchased";
	 echo "<script>
	 alert('Order Successfully Placed!')
	 window.location='bill1.php?bill_no=$row4[id]';
	 </script>";
     //header("location:index.php?status=$status");
}

?>
<?php  
	echo"<style>#nav,#news,#footer{ display:none;
			}
			label{
	font-size:20px !important;
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
  
<?php include("header.php");?>




 



<!---->	
<div class="container">
	  <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Payment Login</li>
		 </ol>
	 <div class="registration">
		 <div class="registration_left">
			
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
			 <div class="registration_form">
			 <!-- Form -->
            
				<form  method="post">
					<div>
						<label>
							Amount <br>
							<input placeholder="amount" type="text" style="width:456; tabindex="1" name="amount"  value="<?php echo $amount; ?>"   readonly="readonly">
						</label>
					</div>
					<div>
						<label>
							Card Number <br>
							<input placeholder="Acoount Number" type="text" style="width:456; tabindex="2"  readonly="readonly" name="account_no" value="<?php echo $account_no; ?>" id="account_no">
						</label>
					</div>
                    
                   		<div>
						<input type="submit" value="Confirm Payment " name="confirm">
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