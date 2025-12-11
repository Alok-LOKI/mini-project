<?php
error_reporting(0);
 include("connection.php"); 

 
$query = "SELECT * FROM tbl_category";
$result = mysqli_query($con,$query);

if(isset($_REQUEST['catid']))
{

$query2 = "SELECT * FROM tbl_subcategory where Cat_id='$_REQUEST[catid]'";
$result2 = mysqli_query($con,$query2) or die(mysqli_error());
}
else
{
$query2 = "SELECT * FROM tbl_subcategory";
$result2 = mysqli_query($con,$query2) or die(mysqli_error());
}


if(isset($_REQUEST['id']))
{

	
$query3 = "SELECT * FROM tbl_item where Sub_id='$_REQUEST[id]'";
$result3 = mysqli_query($con,$query3) or die(mysqli_error());	
	

}
else
{
	
$query3 = "SELECT * FROM tbl_item";
$result3 = mysqli_query($con,$query3) or die(mysqli_error());
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Buy Now</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>

<!-- Custom Theme files -->
<!--theme style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
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
<!-- the jScrollPane script -->
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- //the jScrollPane script -->

</head>
<body> 
<!--header-->
<?php include("header.php");?>

<!--header//-->
<div class="product-moInactive">	 
	 <div class="container">
			
			<h2>Our Shop</h2>	

			
		 <div class="col-md-9 product-moInactive-sec">
         
					 <?php
				if(isset($_REQUEST['cid']))
				{
					
				$query1 ="SELECT * FROM tbl_item WHERE Sub_id='$_REQUEST[cid]'";
					
				}
				elseif(isset($_REQUEST['id']))
				{
				$query1="SELECT * FROM tbl_item WHERE id='$_REQUEST[id]'";
				}
				elseif(isset($_REQUEST['search']))
				{
				$query1="SELECT * FROM tbl_item WHERE  Name   LIKE '%$_REQUEST[search]%'";
				}
				else
				{
					$query1 = "SELECT * FROM tbl_item";
				}
					$result1= mysqli_query($con,$query1) or die(mysqli_error());
					while($row1 = mysqli_fetch_array($result1)) {

				?>
 <a href="single.php?id=<?php echo $row1['id']; ?>">
 <div class="product-grid">
												
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="admin\tbl_item\uploads\<?php echo $row1['Image']; ?>" class="img-responsive" alt=""  style='height:250px;'>
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-Inactiveay03">							
							
							</h4>
							</div>
						</div></a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust ">
							<center>
							<h3>
								<span><?php echo $row1['Name']; ?><br>							
								<?php echo "₹ ".$row1['Selling_price']; ?></span><br>
							<a href="single.php?id=<?php echo $row1['id']; ?>" class='btn btn-primary'>
							Click to View
							</a>
								</center>
							</h3>
								
							</div>												
							
						</div>
					</div>	
                    <?php }?>
					
					
			</div>
			<div class=" rsidebar span_1_of_left" style='background-color:#fff;'>
				 <section  class="sky-form">
					 <div class="product_right">
						 <h4 class="m_2">Categories</h4>
                          <ul class="place">
                        
                    
                      <?php
// keeps getting the next row until there are no more to get
while($row2 = mysqli_fetch_array( $result )) {

	?>
               
          
                        <li ><a href="product.php?catid=<?php echo $row2['id'];?>"><?php echo $row2['Name']; ?></a></li>
                     
                        
                        <?php } ?> 
                    </ul>
						
				 </section>
                  <section  class="sky-form">
					 <div class="product_right">
						 <h4 class="m_2">Sub Categories</h4>
                       
                      <ul  class="place" style="list-style-type: square; padding:10px;color:#333">
                               
                      <?php
// keeps getting the next row until there are no more to get
while($row3 = mysqli_fetch_array($result2)) {

	?>
               
          
                       <a href="product.php?cid=<?php echo $row3['id'];?>" style="color:#666"><?php echo $row3['Name']; ?></a> <br>
                       
                        
                        <?php } ?> 
                    </ul>
				 </section>
				 
				 <section  class="sky-form">
					 <div class="product_right">
						<!-- <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Brand</h4>
                        <ul  class="place" style="list-style-type: square; padding:10px;color:#333">
                                -->
						  <?php
							// keeps getting the next row until there are no more to get
							while($row3 = mysqli_fetch_array($result2)) {

						  ?>
                            <li><a href="product.php?cid=<?php echo $row3['id'];?>" style="color:#666"><?php echo $row3['Name']; ?></a></li>
                        <?php } ?> 
						</ul>
				 </section>
				 
			
					 <script type="text/javascript" src="js/jquery-ui.min.js"></script>
					 <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
					<script type='text/javascript'>//<![CDATA[ 
					$(window).load(function(){
					 $( "#slider-range" ).slider({
								range: true,
								min: 0,
								max: 100000,
								values: [ 500, 100000 ],
								slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
								}
					 });
					$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

					});//]]> 
					</script>
					 <!---->
  
					   
			 </div>				 
	      </div>
		</div>
</div>
<!---->
<?php include("footer.php");?>

<!---->
</body>
</html>