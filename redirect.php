<?php
session_start();
include('connection.php');
//$db_name="music"; // Database name 
$tbl_name="tbl_login"; // Table name 

// Connect to server and select databse.


// username and password sent from form 
$myusername=$_POST['UserName']; 
$mypassword=$_POST['Password']; 

// To protect MySQL injection (more detail about MySQL injection)

if(isset($_POST['login']))
{
//



$sql="SELECT * FROM $tbl_name WHERE Username='$myusername' and Password='$mypassword' and Status='active'";
$result=mysqli_query($con,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
 echo $myusername;
if($count==1)
{
	 echo $myusername;
// Register $myusername, $mypassword and redirect to file "login_success.php"
 $result = mysqli_query($con,"SELECT * FROM $tbl_name WHERE Username='$myusername' and Password='$mypassword'") or die('Could not connect: ' . mysql_error());

while($row = mysqli_fetch_array($result))
  {
	  //echo $myusername;
	//$_SESSION['type']="staff";


$_SESSION['user'] =$myusername;
$_SESSION['permission'] =$permission;
date_default_timezone_set("Asia/Calcutta");

$d=date('Y:m:d H:i:s');

$ip=$_SERVER['REMOTE_ADDR'];
$_SESSION['login_user']=$myusername;
//mysql_query("insert into log_in (user_name,date1,ip) values ('$myusername','$d','$ip')") or die ("Error ".mysql_error());
	$_SESSION['type'] =$row['User_type'];
	$_SESSION['userid']=$row['staff_id'];
	header("location:index.php?st=1");
  }
}

}
else
{
header("location:login.php?a=1");
}

?>
 
 



