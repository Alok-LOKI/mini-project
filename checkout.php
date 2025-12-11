
<?php include 'connectionI.php';

include('stockfun.php');
	  session_start();
	  $t=0;
	  $f=0;
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

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<script src="js/jquery.min.js"></script>

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
			<h1>My Shopping Bag (<?php echo " ". $row5['COUNT(item_id)']." "; ?>)</h1>
            
            
             <?php
		

$query = "SELECT * FROM tbl_cartmaster WHERE Cust_id='$_SESSION[id]' and status='cart'"; 
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
	              while($row3 = mysqli_fetch_array($result3)) {
	                  

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
                             <!--<li><p>Size : 5</p></li>-->
							 <li><p>Qty :<?php echo $row2['order_qty']; ?> </p></li>
							 
							 
							 <li>
							 <p>
							   
						  <?php

						 
					list($price,$stock)=stock($row2['item_id']);




if($stock>=$row2['order_qty'])
{



	?>
			               <p>Amount : <?php $amount=$row2['price']*$row2['order_qty'];
						   
						 
 echo $row2['price']." X ".$row2['order_qty']." = ₹ ".$amount;?></p>


								<!-- <span>Delivered in 2-3 bussiness days</span>-->
<?php
 $t=$t+$amount;
}
else{

	$f=1;
	echo "Out Of Stock";
}
?>

							 
							 </p>
							 
							 </li>

							 <li><p><a href="?did=<?php echo $row2['id']; ?>" class='btn btn-danger'>Delete</a> </p></li>
							</ul>
						  <div class="delivery">
                          


								 <div class="clearfix"></div>
							</div>	
						
					   </div>
					   <div class="clearfix"></div>
               
              </div> 
         
              </div>
               <?php
			
			  }}}
			  ?>

				 <h2> Total Amount: <?php  echo $t; ?></h2>

<?php
			 
			 
			 if($t>0 && $f==0)
			 {
				?>


<a class="order" href="payment_check.php?amount=<?php echo $t; ?>">Place Order</a>
				<?php
			 }
			 ?>

<a class="continue" href="product.php">Back to Shop</a>
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
