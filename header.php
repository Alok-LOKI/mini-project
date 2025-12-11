<?php
error_reporting(0);
session_start();
?>
<style>
.logof{
	color:#000;
	font-size:30px;
	border-style: solid;
}
</style>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/index.html   11 Nov 2019 12:16:10 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title> Tv Shopping</title>
<meta name="description" content="description">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" href="assets/images/favicon.png" />
<!-- Plugins CSS -->
<link rel="stylesheet" href="assets/css/plugins.css">
<!-- Bootstap CSS -->
<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
<!-- Main Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body class="template-index belle template-index-belle" style='background-color:#ccc;'>
<div id="pre-loader">
    <img src="assets/images/loader.gif" alt="Loading..." />
</div>
<div class="pageWrapper">
	<!--Search Form Drawer-->
	<div class="search">
        <div class="search__form">
            <form class="search-bar__form" action="#">
                <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
            </form>
            <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
        </div>
    </div>
    <!--End Search Form Drawer-->
    <!--Top Header-->
    <div class="top-header">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-10 col-sm-8 col-md-5 col-lg-4">
                    
                   <h3 class='logof' style='width:100%;text-align:center;'>ONLINE TV SHOP</h3>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                
                </div>
                <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                	<span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                    <ul class="customer-links list-inline">
					  <li><a href="index.php" class='btn btn-default'>Home</a></li> 
					  
					  
					   <li><a href="product.php" class='btn btn-default'>Buy Now</a></li>
					   
					   <?php
					   if($_SESSION['user']!="")
					   {
					   ?>
					   
					   
					    <li><a href="checkout.php" class='btn btn-default'>Cart</a></li>
                        <li><a href="history.php" class='btn btn-default'>History</a></li>
						   <li><a href="logout_action.php" class='btn btn-default'>Logout</a></li>
					   <?php
					   }
					   else
					   {
					   ?>
					   
                        <li><a href="login.php" class='btn btn-default'>Login</a></li>
                        <li><a href="register.php" class='btn btn-default'>Create Account</a></li>
					   <?php
					   }
					   ?>
						 
                      
                    </ul>
					<br>
                </div>
            </div>
        </div>
    </div>
    <!--End Top Header-->
    <!--Header-->
    <div class="header-wrap classicHeader animated d-flex">
    	<div class="container-fluid">        
            <div class="row align-items-center">
            	<!--Desktop Logo-->
                
                <!--End Desktop Logo-->
                <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                	<div class="d-block d-lg-none">
                        <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        	
                        </button>
                    </div>
                	<!--Desktop Menu-->
                	<!--<nav class="grid__item" id="AccessibleNav">
                        <ul id="siteNav" class="site-nav medium center hidearrow">
                            <li class="lvl1 parent megamenu"><a href="">Home <i class="anm anm-angle-down-l"></i></a>
                                
                            </li>
                           
                          
                        <li class="lvl1"><a href="product.php"><b>Buy Now!</b> <i class="anm anm-angle-down-l"></i></a></li>
 <li class="lvl1"><a href="checkout.php"><b>Cart</b> <i class="anm anm-angle-down-l"></i></a></li>
                       
                                              
                      </ul>
                    </nav> -->
                    <!--End Desktop Menu-->
                </div>
                <!--Mobile Logo-->
             
           
        	</div>
        </div>
    </div>
    <!--End Header-->
	<style>
	label{
		 text-transform: uppercase;
	}
	</style>
	
	<?php
	error_reporting(0);
	if($_REQUEST['a']==2)
	{
	?>
	 <script>
   alert("Successfully Registered");
</script>
	<?php
	}
	
	if($_REQUEST['st']==1)
	{
	?>
	 <script>
   alert("successfully logged");
</script>
	<?php
	}
	?>