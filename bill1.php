<!DOCTYPE html>
<html lang="zxx">
<?php
error_reporting(0);

include("connection.php");
session_start();
?>

	<!-- Custom-Files -->
	<!-- Bootstrap-Core-Css -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Style-Css -->
	
	<!-- breadcrumb -->
	<!-- //banner -->




	<!-- register -->
	  
<style>

label
{
text-transform:capitalize;	
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <!--<script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>-->
</head>

<style>
#table td
{
	width:150px;
}
.printtable
{
font-family:DIN Medium,Arial, Helvetica, sans-serif;
font-size:14px;	
}
</style>




<body ng-controller='mainController'>

<!--<style>
div
{
text-transform:capitalize;
margin-bottom:5px;	
}

</style>-->

<style>
.bo td
{
border:1px solid #ccc;	
}

.bo th
{
border:1px solid #fff;	
}
</style>
 <script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=300,height=300');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
     </script>

<br>
<br>
	<input type="submit" value="Print" onClick="PrintDiv();" class="btn btn-primary"/>  <a href="index.php" class="btn btn-danger float-right">&lt;&lt;BACK</a>




<style type="text/css">



</style>
<div id="divToPrint" class='printable'>
<?php


$g=0;



$i = 1;
$result = mysqli_query($con,"select * from tbl_cartmaster where id='$_REQUEST[bill_no]'");

$row=mysqli_fetch_array($result);
$customer_id=$row['Cust_id'];
$c_id=explode("-", $customer_id);




$result34 = mysqli_query($con,"select * from tbl_customer where id='$customer_id'");

$row34=mysqli_fetch_array($result34);

?>

<center>
<table class='printtable' border='1'><tr></td>
<table style='width:900px' border='1'><tr><td colspan=2>
<center><img src='assets/images/new.png'width='400px'></center>
</td></tr>






<tr><td colspan=2>














<table>
<tr>
<td width='350px'  >
<div style='font-size:16px;width:300px;padding:4px;margin-bottom:5px;'>
TO
</div>
</td>
<td>
<!--<span style='font-size:26px;'><b>REGISTRATION SLIP</b></span>-->



</td>

</tr>
</table>
</td></tr>












<tr style='font-size:16px;'><td>



<table style='text-transform: uppercase;'>
<tr><th width='150' align='left'  colspan=2><?php echo $row34['Firstname']." ". $row34['Lastname']; ?> </td></tr>

<tr><td align='left'>Phone :</td><td ><?php echo $row34['Phone_number']?></td></tr>
</table>










</td><td align='right'>

<table cellpadding='4' cellspacing='10'>
<tr><th  width='160px' align='left'>Invoice No : </th><td width='160px' ><?php echo $_REQUEST['bill_no'];?>  </td></tr>



</table>


</td></tr>










</table>

<br><br>

<table  border="1" class='printtable' style="border-collapse:collapse;font-size:14px;font-family:DIN Medium,Arial, Helvetica, sans-serif;" width="900px" height="700px" align="center" cellpadding="10"  style="padding:10px;">





 


<tr style='background:#ccc;' >
<th style='font-weight:bold;text-align:center;' height='40px'> NO </th>
<th style='font-weight:bold;text-align:center;'>ITEM NAME</th>
<th style='font-weight:bold;text-align:center;'>QTY </th>
<th style='font-weight:bold;text-align:center;'>PRICE </th>
<th style='font-weight:bold;text-align:center;'>TOTAL </th>
</tr>

<?php
$result = mysqli_query($con,"select * from tbl_cartchild where 	CartM_id='$_REQUEST[bill_no]'");

while($row=mysqli_fetch_array($result))
{
	
	$amt=$row['order_qty']*$row['price'];
	$result2 = mysqli_query($con,"select * from tbl_item where id='$row[item_id]' ");
	$row2=mysqli_fetch_array($result2);
	
	echo "<tr valign='top' height='40px'>
	<td style='text-align:center;'>$i</td>
	<td width='450' > ";?>
    <?php
	  
	echo $row2['Name'] ;
	
	?>
   
	
	<?php echo "</td>
	
		
	<td style='text-align:right;'>$row[order_qty]</td>
	
	<td style='text-align:right;'>$row[price]</td>
		<td style='text-align:right;'>$amt</td>
	</tr>";
		$i++;
	
	
	
}
$sql2="select SUM(order_qty*price) AS total from tbl_cartchild where CartM_id='$_REQUEST[bill_no]'";
	  $result2=mysqli_query($con,$sql2);
	  $row2=mysqli_fetch_array($result2);
?>


<tr valign='top'>
	<td style='text-align:center;' colspan='6'></td>
	</tr>

<tr  height='50px'>
<th style='background:#ccc;font-size:16px;' align='left' >
TOTAL AMOUNT</th><th colspan="4"  style='text-align:right;font-size:16px;'> INR <?php echo $row2['total'] ?></th>

















</tr>


</table>





</td></tr>
</table> 
<br>
<br>



</center>
  
		
     
    

<?php

mysqli_close($con);

?>

</div>
