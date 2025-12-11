
<head>
<title> Registration Form</title>
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
<?php
include('header.php');
error_reporting(0);
if($_REQUEST['a']==1)
{
    echo"<script>alert('Registration Successful')</script>";
}
if($_REQUEST['a']==2)
{
    echo"<script>alert('Registration Faild')</script>";
}

?>

    <br><br><br>
    
    <!--Body Content-->
    <div id="page-content">
    	
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 main-col offset-md-2" style='background-color:#fff;'>
				<br>
                	<div class="mb-4">
					
					 
					 <?php
					 $table="tbl_customer";
					 
					 include("connection.php");

$g=0;

$result = mysqli_query($con,"SHOW FIELDS FROM $table");

$i = 0;

echo "<div class='col-md-12'>";
?>
 <div class=" text-center">
							<h1 class="page-width">Registration</h1>
      	
						  </div>
						  
						  <?php
echo "<form action='insert.php' method='post' enctype='multipart/form-data' name='register_form' id='register_form' >";
while ($row = mysqli_fetch_array($result))
 {

  $name=$row['Field'];
  $type=$row['Type'];
  $type = explode("(", $type);
  $type_only=$type[0];
$i++;

$g++;


//echo " <div ><div >";



if($i==1 )
{
	
	//echo "<td>Male <input type='radio' name='$name'> </td>";
	
}
elseif($name=="status")
{
echo "<input type='hidden' value='Active' name='status'>";

}
elseif($name=="Password")
{
	  echo "
	  
	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label><input type='password' name='$name'class='form-control' required > </div>
                                        </div>";
	
}
elseif($name=="Date" )
  {
	  $date=date("Y-m-d");
	  echo "
	  
	  
	  

     
	  
	  <input type='hidden' name='$name'  class='form-control' value='$date' max='$date'>";
	  
	 
  }
elseif($name=="Email")
{
	  echo "
	  
	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label><input type='email' name='$name'class='form-control' required > </div>
                                        </div>";
	
}

else
{

  if($type_only=="varchar" || $type_only=="int" || $type_only=="int" || $type_only=="tinyint" )
  {
	  echo "
	  
	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label><input type='text' name='$name'class='form-control' > </div>
                                        </div>";
	
      
    
  }
  
  
   if($type_only=="date2" )
  {
	  $date=date("Y-m-d");
	  echo "
	  
	  
	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label>
	  
	  <input type='date' name='$name'  class='form-control' value='$date' max='$date'></div></div>";
	  
	 
  }
  
  
  
  if($type_only=="tinytext" )
  {
	  echo "
	  
	  	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label>
	  
	  <input type='file' name='$name' class='form-control'></div></div>";
  }
  if($type_only=="text" )
  {
	  echo "<div class='col-md-10'>
                                            <div class='form-group'><label>
											
											 ".str_replace('_', ' ', $name)."</label>
											
											<textarea name='$name'  class='form-control' rows='8'></textarea>
											</div>
											</div>";
  }
  
  
  

}
  


//echo "</div></div><br>";

  
 
 
 
 
 
  
}



echo "
<div class='col-md-12'>
                              <div class='col-md-3'>              <div class='form-group'>
											<input type='submit' value='Submit' name='submit' class='form-control btn-primary'>";



echo "</form>

</div></div></div>";

					 
					 
					 ?>
					 
					 
					 
					 
					 
                    </div>
               	</div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
    
 <?php
include('footer.php');

?>