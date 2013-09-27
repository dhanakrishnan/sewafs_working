<?php 
   $page_title = "Sewa Family Services | Become a member";
   include('page_header.php');
?>

<!--=== Content Part ===-->
<div class="body">
	<div class="breadcrumbs margin-bottom-50">
    	<div class="container">
            <h1 class="color-green pull-left">Register</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                <li class="active">Registration</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

	<div class="container">		
		<div class="row-fluid margin-bottom-10">
        	<form action="page_registration_process.php" class="reg-page" method="POST" >
            	<h3>Register a new account</h3>
                <div class="controls">    
                    <!--<label>First Name</label>
                    <input type="text" name="firstName" class="span12" />
                    <span class="error"> Please provide first name </span>
                    <label>Last Name</label>
                    <input type="text" id="lastName" name="lastName" class="span12" />
                    <span class="error"> Please provide last name </span>-->
                    <label>User Name</label>
                    <input type="text" name="userName" class="span12 required" placeholder ="Name you want to show on the website"/>
                    <span class="error"> Please provide User name </span>

                    <label>Email Address <span class="color-red">*</span></label>
                    <input type="text" id="emailID" name="emailID" class="span12 required" />
                    <span class="error"> Please provide valid email ID. Ex:helper@gmail.com</span>
                
                    <label>Password <span class="color-red">*</span></label>
                    <input type="password" id="password1" name="password1" class="span12 required" />
                    <span class="error"> Please provide password </span>
                
                    <label>Confirm Password <span class="color-red">*</span></label>
                    <input type="password" id="password2" name="password2" class="span12 required" />
                    <span class="error"> Please confirm password </span>
                   
                </div>
                <div class="controls form-inline">
                    <label class="checkbox"><input type="checkbox" name="policy" id="policy"/>&nbsp; I read <a href="">Terms and Conditions</a></label>
                    <button class="btn-u pull-right" id = "submit" type="submit">Register</button>
                </div>
                <hr />

                <?php 
                if ($_GET["status"] == "member"){ 
                    echo "<span class='alert-error'> User name already exists!! </span>";
                }
                if ($_GET["status"] == "blank"){ 
                    echo "<span class='alert-error'> All the fields are required. </span>";
                }
                if ($_GET["status"] == "invalidEmail"){ 
                    echo "<span class='alert-error'> Please enter a valid email address. </span>";
                }
                if ($_GET["status"] == "passwordmismatch"){ 
                    echo "<span class='alert-error'> Both the passwords should be the same. </span>";
                }
                if ($_GET["status"] == "nopolicy"){ 
                    echo "<span class='alert-error'> Please read and agree our policy. </span>";
                } 

                 ?>

				<p>Already Signed Up? Click <a href="page_login.php" class="color-green">Sign In</a> to login your account.</p>

                <div >
                     <span class='alert-error' id='empty' style="display: none;"> Please fill in the required information to register. </span>
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
<script type="text/javascript" src="/assets/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.js"></script>
<script type="text/javascript" src="/assets/js/validEmail.js"></script>
<script type="text/javascript" >
    //Hide all the error message of each input field
    $(".controls span").hide();

    //Disable submit button if a required field is blank
    var $submit = $("#submit");
    var $required = $(".required");
    $("#empty").hide();

    function isValidEmailID(emailAddress)
    {
        /*var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return pattern.test(emailAddress) ;*/
        //alert(emailAddress);
        
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        return pattern.test(emailAddress);
        //return emailAddress.indexOf("@") != -1;
    }

    function containsBlank()
    {
        var blanks = new Array();
        $required.each(function(){
            blanks.push($(this).val() == "");
        });
        return blanks.sort().pop();
    }
    
    function requiredFilledIn()
    {
        if(containsBlank() || !isValidEmailID($("#emailID").val()))
        {
           $("#empty").show();
          $submit.attr("disabled", "disabled");
          
        }
        else
        {
          $("#empty").hide();
          $submit.removeAttr("disabled");
        }
    }


    $("input, textarea").focus(function(){
        $(this).next().fadeIn("slow");
    }).blur(function(){
        $(this).next().fadeOut("slow");
    }).keyup(function(){
        //Check all the required field
        requiredFilledIn();
    });



    $("#emailID").keyup(function(){
        /*if(isValidEmailID($(this))) alert("true");
        else alert("false");*/
       if(isValidEmailID($(this).val())) $(this).next().removeClass("alert-error").addClass("alert-success");
       else $(this).next().removeClass("alert-success").addClass("alert-error");
       //alert("got focus");

    });

    
        /*jQuery(document).ready(function() {
            App.init();
            App.initSliders();                
            Contact.initMap();        
        });*/
    requiredFilledIn();

</script>
</body>
</html>

 