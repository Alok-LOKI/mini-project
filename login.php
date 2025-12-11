<?php
include('header.php');


error_reporting(0);

if($_REQUEST['status']=="error")
{
    echo"<script>alert('Incorrect  Username or Password')</script>";
}
?>
    <br><br><br>
    <!--Body Content-->

    <div id="page-content">
    	<!--Page Title-->
    	
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                       <form method="post"  style='background-color:#fff;padding:20px;'action="login_action.php" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                          <div class="row">
						  <div class=" text-center">
							<h1 class="page-width">Login</h1>
      	
						  </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerEmail"> Username</label>
                                    <input type="text" name="email" placeholder=""  class="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Password</label>
                                    <input type="password" value="" name="password" placeholder="" id="CustomerPassword" class="">                        	
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="Sign In">
                                <p class="mb-4">
							
								    <a href="register.php" id="customer_register_link">Create account</a>
                                </p>
                            </div>
                         </div>
                     </form>
                    </div>
               	</div>
            </div>
        </div>
        
    </div>
    
    <!--End Body Content-->
   <?php
include('footer.php');

?>
    