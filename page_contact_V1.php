<?php
include("page_header.php")
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
      <iframe width="680" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Fremont,+CA&amp;aq=&amp;sll=37.54531,-121.987472&amp;sspn=0.007043,0.013797&amp;ie=UTF8&amp;hq=&amp;hnear=Fremont,+Alameda,+California&amp;t=m&amp;ll=37.548388,-121.988754&amp;spn=0.16332,0.411301&amp;z=11&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Fremont,+CA&amp;aq=&amp;sll=37.54531,-121.987472&amp;sspn=0.007043,0.013797&amp;ie=UTF8&amp;hq=&amp;hnear=Fremont,+Alameda,+California&amp;t=m&amp;ll=37.548388,-121.988754&amp;spn=0.16332,0.411301&amp;z=11&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>
            <div class=margin-bottom-40>
            </div><!---/map-->

            <p>If you have any questions/comments please feel free to get in touch with us. </p><br />
      <form>
                <label>Name</label>
                <input type="text" class="span7" />
                <label>Email <span class="color-red">*</span></label>
                <input type="text" class="span7" />
                <label>Message</label>
                <textarea rows="8" class="span10"></textarea>
                <p><button type="submit" class="btn-u">Send Message</button></p>
            </form>
        </div><!--/span9-->

        <div class="span3">
            <!-- Contacts -->
            <div class="headline"><h3>Contacts</h3></div>
            <ul class="unstyled who margin-bottom-20">
                <li><a href="#"><i class="icon-home"></i>Sewa International USA, P.O. Box 14622 Fremont, CA, 94539-7970 </a></li>
                <li><a href="#"><i class="icon-envelope-alt"></i>gi-bayarea@sewausa.org</a></li>
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
?>

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="assets/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>        
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="assets/plugins/gmap/gmap.js"></script>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/pages/contact.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initSliders();                
        Contact.initMap();        
    });
</script>
<!--[if lt IE 9]>
    <script src="assets/js/respond.js"></script>
<![endif]-->

</body>
</html> 