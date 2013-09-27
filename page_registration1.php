<?php 
   $page_title = "Get services from Sewa family Service|Together we serve better";
   include('page_header.php');
?>

<!--=== Content Part ===-->
<div class="body">
  <div class="breadcrumbs margin-bottom-50">
      <div class="container">
            <h1 class="color-green pull-left">Register</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                <li><a href="">Pages</a> <span class="divider">/</span></li>
                <li class="active">Registration</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

  <div class="container">    
    <div class="row-fluid margin-bottom-10">
          <form method="POST" action="page_registration_process.php" class="reg-page" >
              <h3>Register a new account</h3>
                <div class="controls">    
                    <label>First Name</label>
                    <input type="text" name="firstName" class="span12" />
                    <label>Last Name</label>
                    <input type="text" id="lastName" name="lastName" class="span12" />
                    <label>Email Address <span class="color-red">*</span></label>
                    <input type="text" id="emailID" name="emailID" class="span12" />
                </div>
                <div class="controls">
                    <div class="span6">
                        <label>Password <span class="color-red">*</span></label>
                        <input type="password" id="password1" name="password1" class="span12" />
                    </div>
                    <div class="span6">
                        <label>Confirm Password <span class="color-red">*</span></label>
                        <input type="password" id="password2" name="password2" class="span12" />
                    </div>
                </div>
                <div class="controls form-inline">
                    <label class="checkbox"><input type="checkbox" />&nbsp; I read <a href="">Terms and Conditions</a></label>
                    <button class="btn-u pull-right" type="submit">Register</button>
                </div>
                <hr />
        <p>Already Signed Up? Click <a href="page_login.php" class="color-green">Sign In</a> to login your account.</p>
            </form>
        </div><!--/row-fluid-->
  </div><!--/container-->    
</div><!--/body-->
<!--=== End Content Part ===-->

<?php 
include("page_footer.php");
include("copyright.php");
include("js.php");
?>