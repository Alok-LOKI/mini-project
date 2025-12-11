<?php
ob_start();
include ("connectionI.php");



$query = "SELECT * FROM tbl_login WHERE Username='$_POST[email]' and Password='$_POST[password]' and (Status='active' or Status='Active')";
//echo $query; 	 

$data=mysqli_query($con,$query);

$count=mysqli_num_rows($data);
$row2=mysqli_fetch_array($data);
if($count==1)
{
	if($row2['User_type']=="Admin")
	{
		session_start();
	$_SESSION['user']="admin";
	$_SESSION['type']="admin";
	$_SESSION['userid']=$row2['User_id'];
		
	header("location:admin\dashboard\dashboard.php");
	
	}
	elseif($row2['User_type']=="Staff")
	{
		session_start();
	$_SESSION['user']="staff";
	$_SESSION['type']="staff";
	$_SESSION['userid']=$row2['User_id'];
		
	header("location:admin\dashboard\dashboard.php");
	
	
	}
	elseif($row2['User_type']=="Courier")
	{
		session_start();
	$_SESSION['user']="Courier";
	$_SESSION['type']="Courier";
	$_SESSION['userid']=$row2['User_id'];
		
	header("location:admin\dashboard\dashboard.php");
	
	
	}
	else
	{
	
	$query1 = "SELECT * FROM tbl_customer WHERE email='$_POST[email]' or username='$_POST[email]' and password='$_POST[password]'"; 	 
$data1=mysqli_query($con,$query1);
$row=mysqli_fetch_array($data1);
	session_start();
	$_SESSION['user']="Customer";
	$_SESSION['id']=$row['id'];
	$_SESSION['username']=$row['first_name'];
	$_SESSION['email']=$row['email'];
	$_SESSION['phone_number']=$row['phone_number'];
	header("location:index.php");
	}
}
else
{
	echo "Error : ".mysqli_error($con);
	header("location:login.php?status=error");
}

?>
