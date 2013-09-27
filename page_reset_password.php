<?php 
   $page_title = "Sewa Family Services | Become a member";
   include('page_header.php');
?>

<!--=== Content Part ===-->
<div class="body">
    <div class="breadcrumbs margin-bottom-50">
        <div class="container">
            <h1 class="color-green pull-left">Reset Your Password</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                <li class="active">Reset Password</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

    <div class="container">     
        <div class="row-fluid margin-bottom-10">
            <form action="page_reset_password_process.php" class="reg-page" method="POST" >
                <?php 
                    
                    if ($_GET["status"] == "blank"){ 
                        echo "<span class='alert-error'> All the fields are required. </span>";
                    }
                    if ($_GET["status"] == "invalidEmail"){ 
                        echo "<span class='alert-error'> Please enter a valid email address. </span>";
                    }
                    if ($_GET["status"] == "success"){ 
                        echo "<span class='alert-success'> Your Password is sucessfully reset. New password is sent to your Email. </span>";
                    }
                    if($_GET["status"] == "nonmember")
                    {
                      echo "<span class='alert-error'> You are not a member. <br> Please register <a href='page_registration.php'> here</a> to become a member. </span>";
                    }
                    
                ?>
                
                <h6>Please enter Your Email Address to reset your Password. <br>New password will be sent to your email. Thank You!!!</h6>
                <div class="controls">    
                    <!--<label>First Name</label>
                    <input type="text" name="firstName" class="span12" />
                    <span class="error"> Please provide first name </span>
                    <label>Last Name</label>
                    <input type="text" id="lastName" name="lastName" class="span12" />
                    <span class="error"> Please provide last name </span>-->
                    

                    <label>Email Address <span class="color-red">*</span></label>
                    <input type="text" id="emailID" name="emailID" class="span12 required" />

                    
                
                    
                   
                </div>
                <div class="controls form-inline">
                    
                    <button class="btn-u pull-right " id = "submit" type="submit">Reset Password</button>
                </div>
                

                

                

                <div >
                     <span class='alert-error' id='errorMessage' >  </span>
                </div>
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
<script type="text/javascript" src="assets/js/validation/validate.js"></script>
<script type="text/javascript">
    var submit = $("#submit");

    var required = $(".required");

    var emailID = $("#emailID");
    
    //alert("testing");
    /*if(containsBlank() || !isValidEmailID($("#emailID").val())) $submit.attr("disabled", "disabled");
        else $submit.removeAttr("disabled");*/

    function requiredFieldFilledIn()
    {
        //alert("inside requiredFieldFilledIn");
        //if(containsBlank())
        //alert(emailID.val());
        if(containsBlank() || !isValidEmailID(emailID.val()) )
        {
            //alert("if block");
            $("#errorMessage").html("Please fill in the required fields");
            submit.attr("disabled", "disabled");

        }
        else
        {
           //alert("else block");
          // $("#errorMessage").html("");
          $("#errorMessage").html("");
           submit.removeAttr("disabled"); 
        }
    }
    

    $("#emailID").keyup(function(){
        
       if(isValidEmailID($(this).val())) 
       {
            //alert("if block");
            $("#errorMessage").html("");
            if(requiredFieldFilledIn() && validPhoneNumber(phoneNo.val()))
            {
             submit.removeAttr("disabled"); 
            }
       }
       //alert("got focus");
       else
       {
            //alert("else block");
            $("#errorMessage").html("Please enter the valid EmailID <br>Ex: example@gmail.com");
            submit.attr("disabled", "disabled");
       }

    });

    

requiredFieldFilledIn();
</script>
</body>
</html>

 