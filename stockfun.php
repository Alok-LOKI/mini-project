<?php

function stock($id)
{
	
	$tot=0;
	$price=0;
	$qty=0;
	
	
    include("connection.php");
	//var_dump($id);
	//die();

	$query = "SELECT sum(order_qty) as sale FROM tbl_cartchild WHERE item_id='$id' and status='1'"; 

//echo $query;
	$result=mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	$sale=intval($row['sale']);



$query = "SELECT * FROM  tbl_purchasechild WHERE item_id='$id'"; 

$result=mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)) {	
	if($tot<=$sale || $tot==0 ) {
		$price=intval($row['selling_price']);
		$qty=intval($row['Quantity']);
		$tot=$tot+intval($row['Quantity']);
	}
}
//var_dump($tot);
//var_dump($sale);


$bal=$tot-$sale;
if($bal == 0){
		$price = 0;
}
//echo "Price $price <br> Qty $qty <br>Bal $bal <br> sale $sale";
return array($price,$bal);
}





//echo stock('1');





?>