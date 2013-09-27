<?php
   $page_title = "Contact Us";
   include('page_header.php');
?>

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
  <div class="container">
        <h1 class="color-green pull-left">Our Contacts</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Contact</li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->

<div class="container">    
  <div class="row-fluid">
    <div class="span9">
      <iframe class="map margin-bottom-40" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Fremont,+CA&amp;aq=&amp;sll=37.562405,-121.948757&amp;sspn=0.072664,0.158443&amp;ie=UTF8&amp;hq=&amp;hnear=Fremont,+Alameda,+California&amp;t=m&amp;ll=37.579549,-121.949444&amp;spn=0.065301,0.109863&amp;z=11&amp;iwloc=A&amp;output=embed"></iframe><br />
			<small><h5><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Fremont,+CA&amp;aq=&amp;sll=37.562405,-121.948757&amp;sspn=0.072664,0.158443&amp;ie=UTF8&amp;hq=&amp;hnear=Fremont,+Alameda,+California&amp;t=m&amp;ll=37.579549,-121.949444&amp;spn=0.065301,0.109863&amp;z=11&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></h5></small>
            <div class="margin-bottom-40">
            </div><!---/map-->

            <p>If you have any questions/comments please feel free to get in touch with us. </p><br />
            <form method="POST" action="contactus_process.php" id="contactForm">
              <?php
  if ($_GET["status"] == "success"){
                    echo "<span class='alert-success'> Thank you!! Some one from SewaFS will contact you shortly. </span>";
                }
  ?>
                <label>Name <span class="color-red">*</span></label>
                <input id="name" name="name" type="text" class="span7 required" />
                <span id="errrorMsg" >Please type your name here.</span>
                <label>Email <span class="color-red">*</span></label>
                <input id="emailID" name="emailID" type="text" class="span7 required" />
                <span id="errrorMsg" >Please Provide your valid EmailId .</span>
                <label>Message <span class="color-red">*</span></label>
                <textarea id="message" name="message" rows="8" class="span7 required"></textarea>
                <span id="errrorMsg" > <br />Please Provide a message, We will contact you ASAP. Thanks!! .</span>
                <p class="submit"><button type="submit" class="btn-u">Send Message</button></p>
                <div style = "display: None">
                      <label for="address"> Address </label> 
                      <input type="text" name="address" id="address">
                      <p> "Not for human :"</p>
                </div>
                
                <?php 
                
                if ($_GET["status"] == "blank"){ 
                    echo "<span class='alert-error'> All the fields are required. </span>";
                }
                if ($_GET["status"] == "invalidEmail"){ 
                    echo "<span class='alert-error'> Please enter a valid email address. </span>";
                }
                 
                ?>
               <div> 
              <span class='alert-error' id='empty' style="display: none;"> Please fill in the required information to send a message. </span>
              </div>
              </form>
        </div><!--/span9-->

        <div class="span3">
            <!-- Contacts -->
            <div class="headline"><h3>Contacts</h3></div>
            <ul class="unstyled who margin-bottom-20">
                <li><a href="#"><i class="icon-home"></i>Sewa International USA, P.O. Box 14622 Fremont, CA, 94539-7970 </a></li>
                <li><a href="mailto:bayarea@sewafs.org?Subject=Hello%20Sewa%20Family%20Services" target="_top"><i class="icon-envelope-alt"></i>bayarea@sewafs.org</a></li>
                <li><a href="#"><i class="icon-phone-sign"></i>321-USA-SEWA</a></li>
                <li><a href="http://sewafs.org/"><i class="icon-globe"></i>http://www.sewafs.org</a></li>
            </ul>

            <!-- Business Hours -->
            <div class="headline"><h3>Business Hours</h3></div>
            <ul class="unstyled">
                <li><strong>Monday-Friday:</strong> 10am to 8pm</li>
                <li><strong>Saturday:</strong> 11am to 3pm</li>
            </ul>

            <!-- Why we are? -->
            <!--<div class="headline"><h3>Why we are?</h3></div>
            <p>Our text...</p>
            <ul class="unstyled">
                <li><i class="icon-ok color-green"></i> Our text....</li>
                <li><i class="icon-ok color-green"></i> Our text....</li>
                <li><i class="icon-ok color-green"></i> Our text....</li>
            </ul>-->
        </div><!--/span3-->        
    </div><!--/row-fluid-->        
</div><!--/container-->    
<!--=== End Content Part ===-->

<?php
include("page_footer.php");
include("copyright.php");
include("js.php");
?>

<script type="text/javascript">

    $("#contactForm #errrorMsg").hide();
    //Form validation
    $("#empty").hide();

    var $submit = $(".submit button");
    /*$submit.click(function(){
        alert("This is button");
    });*/

    var $required = $(".required");
    /*$required.focus(function () {
        alert("this is requierd");
    });*/

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


    $("input,textarea").focus(function(){
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

<!--[if lt IE 9]>
    <script src="assets/js/respond.js"></script>
<![endif]-->

</body>
</html> 