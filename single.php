<?php
error_reporting(0);
$xx="yy";
 include("connection.php"); 
 include('stockfun.php');
if(isset($_REQUEST['id']))
				{
				$query1="SELECT * FROM tbl_item WHERE id='$_REQUEST[id]'";
				$result1= mysqli_query($con,$query1) or die(mysqli_error());
					$row1 = mysqli_fetch_array($result1);
					
					
					$result122= mysqli_query($con,"SELECT * FROM tbl_brand WHERE id='$row1[Brand_id]'") or die(mysqli_error());
					$row122 = mysqli_fetch_array($result122);
				}

				//echo stock($_REQUEST['id']);
if(isset($_POST['submit']))
{

//error_reporting(0);
session_start();
//$date=date("Y-m-d");

if ($_SESSION['id']=='')
{
echo "<script >alert(\"Please Signin first\");
window.location.replace(\"login.php\");</script>";
	

}

else



{
$query6="SELECT * FROM tbl_cartmaster WHERE cust_id='$_SESSION[id]' and status='cart' ";


$result6=mysqli_query($con,$query6);


$row6 = mysqli_fetch_array( $result6);
$count=mysqli_num_rows($result6);
	
	echo $query6;
	echo"count".$count;
//echo $row6['0'];
$ddate=date('Y-m-d');
if($count==1)

{
	
	$rr=mysqli_query($con,"SELECT * FROM tbl_cartchild WHERE CartM_id='$row6[id]' and item_id='$_REQUEST[id]' ");
$cc=mysqli_num_rows($rr);
if($cc==0)
{
	$query7="INSERT INTO tbl_cartchild(item_id,CartM_id,order_qty,price,Date) 
VALUES('$_REQUEST[id]','$row6[id]','$_POST[quantity]','$_POST[Selling_price]','$ddate')";
}
else
{
	$query7="UPDATE tbl_cartchild SET order_qty=order_qty+'$_POST[quantity]'  WHERE CartM_id='$row6[id]' and item_id='$_REQUEST[id]' ";
}
	
	mysqli_query($con,$query7);
	header("location:index.php");
}
	
	
	
else
{


	
$query8="INSERT INTO tbl_cartmaster(Cust_id) VALUES('$_SESSION[id]')";
//echo $query8;

if($result8=mysqli_query($con,$query8))
{
	$oid=mysqli_insert_id($con);
	$query9="INSERT INTO tbl_cartchild(item_id,CartM_id,order_qty,price,Date) 
VALUES('$_REQUEST[id]','$oid','$_POST[quantity]','$_POST[Selling_price]','$ddate')";
 $result9=mysqli_query($con,$query9);
	header("location:product.php");	
}
else
{
	echo "Error : ".mysqli_error($con);
}

}


}


}





?>
<!DOCTYPE html>
<html>
<head>
<title>Lighting A Ecommerce Category Flat Bootstarp Resposive Website Template | single :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<!--theme style-->
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
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

</head>
<body> 
<!--header-->
<?php 
include("header.php");


list($price,$stock)=stock($_REQUEST['id']);
?>

<!--header//-->

                <div class="product">
	 <div class="container">
    			
 
    
		 <div class="product-price1">
          
			 <div class="top-sing">
				  <div class="col-md-7 single-top">	
					 <div class="flexslider">
							  <ul class="slides">
								<li data-thumb="images/si.jpg">
									<div class="thumb-image"> <img src="admin\tbl_item\uploads\<?php echo $row1['Image']; ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								
							  
							  <form method="post" style='background-color:#fff;'>
<?php

if($stock>0)
{


?>
  &nbsp;&nbsp; Qty: <input min="1" type="number"  input="validity.valid||(value='');"  max="<?php echo $stock;?>" id="quantity" name="quantity" value="1" >
 	
 <input type="hidden"  name="Selling_price"  value="<?php echo $price;?>"  >
 	
 <input type="submit" class="add-cart item_add" name="submit" value="ADD TO CART"  />		</form>	
	
<?php
}
else{
	echo" No Stock Avilable";
}

?>	
</li>
								
							  </ul>
						</div>					 					 
					 <script src="js/imagezoom.js"></script>
						<script defer src="js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>

				 </div>	
                
			     <div class="col-md-5 single-top-in simpleCart_shelfItem">
					  <div class="single-para ">
						 <h4><?php echo  $row1['Name'] ;?> </h4>
                   			<h5 class="item_price"><?php 
							
							
							echo "PRICE:$price";
							
							
							
							?></h5>							
							<p class="para"><?php echo  $row1['Description'] ;?></p>
                         
								 <ul>
									 <li> Brand :<?php echo  $row122['Name'] ;?></li>
								
									 <li>Type : <?php $query2 ="SELECT * FROM tbl_subcategory WHERE id='$row1[Sub_id]'"; 
									 $result2= mysqli_query($con,$query2) or die(mysqli_error());
										$row2 = mysqli_fetch_array($result2); ?>
									 
									 <?php echo  $row2['Name'] ;?></li>
								 	
                                    
								 </ul>
                                
							</div>


					 </div>
				 </div>
            
				 <div class="clearfix"> </div>
			 </div>
              <?php //}?>
	     </div>
                  
		
<!---->
<?php include("footer.php");?>

<!---->
</body>
</html>