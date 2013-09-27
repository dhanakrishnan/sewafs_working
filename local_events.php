<?php 
   $page_title = "Sewa Family Services";
   include('page_header.php');

?>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  
<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-50">
        <div class="container">
            <h1 class="color-green pull-left">Local Events</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.php">Home</a> <span class="divider">/</span></li>
				<li class="active">Local Events</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
  


<!--=== Start Events Google Calendar ===-->
<div id="calendar">
	<p align="center">
<iframe src="http://www.google.com/calendar/embed?src=sewausa.org_h25imjkeoiranucngsghv1jod0%40group.calendar.google.com&ctz=America/Los_Angeles" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
	</p>
	<p>
</div>
<!--=== End Events Google Calendar ===-->



<?php
include("page_footer.php");
include("copyright.php");
include("js.php");
?>

              
</body>
</html>  