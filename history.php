<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php include 'connectionI.php';
	  session_start();
?>

<?php
if(isset($_REQUEST['did']))
{
$query6="DELETE FROM tbl_cartchild WHERE id='$_REQUEST[did]'";
if(mysqli_query($con,$query6))
{
header("location:checkout.php");	
}
else
{
	echo "Error : ".mysqli_error($con);
}
}?>
<!DOCTYPE html>
<html>
<head>
<title>Lighting A Ecommerce Category Flat Bootstarp Resposive Website Template | Checkout :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Custom Theme files -->
<!--theme style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<script src="js/jquery.min.js"></script>


<!--//theme-style-->
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
<!-- header -->
<?php include("header.php");?>
<br><br><br>
<!-- check out -->
<div class="container">
	<div class="check-sec">	 
		
		<div class="col-md-12 cart-items">
			<h1>My Shopping Bag </h1>
            
            
             <?php
		

$query = "SELECT * FROM tbl_cartmaster WHERE Cust_id='$_SESSION[id]' and status='Purchased'"; 

$result=mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
//echo $row['id'];

      $query2 = "SELECT * FROM tbl_cartchild WHERE CartM_id='$row[id]'";
	

      $result2=mysqli_query($con,$query2);
   
	       while($row2 = mysqli_fetch_array( $result2 )) {
			  // echo $row2['id'];
				   
			   $query3 = "SELECT * FROM tbl_item WHERE id='$row2[item_id]'";

			  
               $result3=mysqli_query($con,$query3);
	             $row3 = mysqli_fetch_array($result3)
	                  //  echo $row3['name'];

?>
				<!--<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>-->
               
               <div class="cart-header">
				 <div > <a href="checkout.php?did=<?php echo $row2['id']; ?>" class="close1"></a></div>          
				  <div class="cart-sec simpleCart_shelfItem">
				 	<div class="cart-item cyc">
                      <img src="admin\tbl_item\uploads\<?php echo $row3['Image']; ?>" class="img-responsive" alt=""/>
					</div>
					  <div class="cart-item-info">
							<ul class="qty">
                            <li><p><h4><?php echo $row3['Name']; ?></h4></p></li>
                            
							 <li><p>Qty :<?php echo $row2['order_qty']; ?> </p></li>
 <li> <p>Amount : <?php $amount=$row2['price']*$row2['order_qty'];echo $row2['price']." X ".$row2['order_quanty']." = ₹ ".$amount;?></p>
							</li>
							 <li><p><b><?php 
							 
							 if($row['Courier_Status']=="")
							 {
								echo "Delivery : On Process"; 
							 }
							 else{
								echo "Delivery : ".$row['Courier_Status']; 
							 }
							 
							 
							 
							 
							 ?> </b></p></li>
							</ul>
						  <div class="Delivery">
                            
			             	<!-- <span>Delivered in 2-3 bussiness days</span>-->
								 <div class="clearfix"></div>
							</div>	
						
					   </div>
					   <div class="clearfix"></div>
               
              </div> 
         
              </div>
               <?php
			
			  }}?>
              </div>
		
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //check out -->
<!---->

<!---->
<?php include("footer.php");?>
<!---->
</body>

</html>
