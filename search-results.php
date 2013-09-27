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
            <h1 class="color-green pull-left">Search Results</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.php">Home</a> <span class="divider">/</span></li>
				<li class="active">Search Results</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

<!--=== Content Part ===-->
<div class="container">  
  <div class="row-fluid">
        <!-- Left Sidebar(Content Part) -->      
		<!--search results content-->
        <div class="span9">
        <script>
  (function() {
    var cx = '001486800665004453171:mkdhi5qf43s';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchresults-only></gcse:searchresults-only> 
        </div><!--/span9-->
        <!-- Right Sidebar -->        
        <div class="span3">
             <!-- Posts -->
            
            
             <!-- SewaUsa  -->
            <div class="posts margin-bottom-30">
                <div class="headline"><h3>SewaUSA</h3></div>
                <dl class="dl-horizontal">
                    <dt><a href="http://www.sewausa.org" target="_blank"><img alt="" src="assets/img/logo_sewa.png"></a></dt>
                    <dd>
                        <p><a href="http://www.sewausa.org" target="_blank">
                            Hindu faith-based humanitarian non-profit service organization <br>

                        </a>
                        </p>
                    </dd>
                </dl>
                
            </div>
            <!-- Like us on Facebook -->
            <div class="who margin-bottom-30">
                <div class="headline"><h4>Like us on Facebook </h4></div>
                <div class="fb-like" data-href="http://sewafs.org/" data-send="true" data-width="100" data-show-faces="true" data-font="arial"></div>
            </div>

        </div><!--/span3-->
  </div><!--/row-fluid-->
</div><!--/container-->    
<!-- End Content Part -->

<?php
include("page_footer.php");
include("copyright.php");
include("js.php");
?>

              
</body>
</html>  