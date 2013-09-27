
<!-- JS Global Compulsory -->      
<script type="text/javascript" src="assets/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>    
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/plugins/parallax-slider/js/modernizr.js"></script>
<script type="text/javascript" src="assets/plugins/parallax-slider/js/jquery.cslider.js"></script> 
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/pages/index.js"></script>
<!-- fancy box gallery -->
<script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="assets/js/app.js"></script>

<!--<script type="text/javascript" src="assets/js/fancybox/fancyboxjquery.js"></script>
<script type="text/javascript" src="assets/js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="assets/js/fancybox/fancybox_buttons.js"></script>
<script type="text/javascript" src="assets/js/fancybox/fancybox_media.js"></script>
<script type="text/javascript" src="assets/js/fancybox/fancyboxthumb.js"></script> -->
<script src="assets/js/prettyphoto/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initSliders();
        Index.initParallaxSlider();
      //App.initFancybox();
        $("a[rel^='prettyPhoto'],a[rel^='lightbox']").prettyPhoto({
        overlay_gallery: true, social_tools: '', 'theme': 'light_square'});
    });

</script>

<!--[if lt IE 9]>
    <script src="assets/js/respond.js"></script>
<![endif]-->