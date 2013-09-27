<?php 
   $page_title = "Welcome to Sewa family services!!!";
   include('page_header.php');
?>

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
  <div class="container">
        <h1 class="color-green pull-left">Login</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Login</li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container">    
  <div class="row-fluid">
        <form  method = "POST" action="page_login_process.php" class="log-page">
            <h3>Login to your account</h3>    
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input class="input-xlarge" type="text" id = "emailID" name= "emailID" placeholder="Email ID">
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span>
                <input class="input-xlarge" type="password" id="password" name="password" placeholder="password">
            </div>
            
            <div class="controls form-inline">
                <label class="checkbox"><input type="checkbox" /> Stay Signed in</label>
                <button class="btn-u pull-right" type="submit">Login</button>
            </div>
            <hr />
          <h4><a class="color-green" href="page_reset_password.php">Forget your Password ?</a></h4>
            <p>no worries, <a class="color-green" href="page_reset_password.php">click here</a> to reset your password.</p>

             <?php 
                if ($_GET["status"] == "notamember")
                { 
                  echo "<span class='alert-error'> You are not a member. Please register to login.</span>";
                } 
                if ($_GET["status"] == "passwordInCorrect")
                { 
                  echo "<span class='alert-error'> The username or password you entered is incorrect.</span>";
                } 
                
                if ($_GET["status"] == "blank")
                { 
                    echo "<span class='alert-error'> All the fields are required. </span>";
                }
            ?>
        </form>
    </div><!--/row-fluid-->
</div><!--/container-->    
<!--=== End Content Part ===-->

<?php 
include("page_footer.php");
include("copyright.php");
include("js.php");
?>

</body>
</html> 