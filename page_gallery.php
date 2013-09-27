<?php 
   $page_title = "Our Team Activities" ;
   include('page_header.php');
?>


<!--=== Content Part ===-->
<div class="body">
    <div class="breadcrumbs margin-bottom-50">
        <div class="container">
            <h1 class="color-green pull-left">Photo Gallery</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                <li class="active"> Our Team Activities</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->


<!--=== Content Part ===-->

<script type="text/javascript">
var width = 700;
var height = 400;
var imgAr1 = new Array();
var rImg1 = new Array();

imgAr1[0] = "assets/img/carousel/1.jpg";
imgAr1[1] = "assets/img/carousel/2.jpg";
imgAr1[2] = "assets/img/carousel/3.jpg";
imgAr1[3] = "assets/img/carousel/4.jpg";
imgAr1[4] = "assets/img/carousel/5.jpg";
imgAr1[5] = "assets/img/carousel/6.jpg";
imgAr1[6] = "assets/img/carousel/7.jpg";
imgAr1[7] = "assets/img/carousel/8.jpg";
imgAr1[8] = "assets/img/carousel/9.jpg";
imgAr1[9] = "assets/img/carousel/10.jpg";
imgAr1[10] = "assets/img/carousel/11.jpg";
imgAr1[11] = "assets/img/carousel/12.jpg";
imgAr1[12] = "assets/img/carousel/13.jpg";
imgAr1[13] = "assets/img/carousel/14.jpg";
imgAr1[14] = "assets/img/carousel/15.jpg";
imgAr1[15] = "assets/img/carousel/16.jpg";
imgAr1[16] = "assets/img/carousel/17.jpg";
imgAr1[17] = "assets/img/carousel/18.jpg";
imgAr1[18] = "assets/img/carousel/19.jpg";
imgAr1[19] = "assets/img/carousel/20.jpg";
imgAr1[20] = "assets/img/carousel/21.jpg";
imgAr1[21] = "assets/img/carousel/22.jpg";
imgAr1[22] = "assets/img/carousel/23.jpg";
imgAr1[23] = "assets/img/carousel/24.jpg";
imgAr1[24] = "assets/img/carousel/25.jpg";
imgAr1[25] = "assets/img/carousel/26.jpg";
imgAr1[26] = "assets/img/carousel/27.jpg";
imgAr1[27] = "assets/img/carousel/28.jpg";  
</script>

<table align=center><tr><td style="border: 2px ;">
<img id=pic border=0>
</td></tr>
<tr><td>
<table width=100% style="border: 2px ; font-size: 13px; font- ;font-family: verdana, arial;">
  <td align=center><a style="color: blue; cursor:pointer;" onclick="prev()"><b>Prev</b></a></td> 
  <td align=center><a style="color: blue; cursor:pointer;" onclick="slideshow()"><b>Next</b></a></td> 
  
  <td align=center><a style="color: blue; cursor:pointer;" onclick="end()"><b>End</b></a></td>

</tr></table>
</td></tr></table>

<script type="text/javascript">

for(var j = 0; j < imgAr1.length; j++)
{
    rImg1[j] = new Image();
            rImg1[j].src = imgAr1[j];
}

document.onload = setting();

var slide;
function setting()
{
  slide = document.getElementById('pic');
  slide.src = imgAr1[0];
  slide.setAttribute("width",width);
  slide.setAttribute("height",height);
  autoplay();
}

//Image or picture slide show using java script
//slideshow function
var picture = 0;
function slideshow(){
  if(picture < imgAr1.length-1){
    picture=picture+1;
    slide.src = imgAr1[picture];
  }
}


function autoplay(){
  if(picture < imgAr1.length-1){
    picture=picture+1;
    slide.src = imgAr1[picture];
  }
  else {
  picture = 0;
  slide.src = imgAr1[picture];
}
setTimeout("autoplay()",3000);
}


function prev(){
  if(picture > 0 ){
    picture=picture-1;
    slide.src = imgAr1[picture];
  }
}

function start(){
    slide.src = imgAr1[0];
    picture = 0;
}

function end(){
    slide.src = imgAr1[imgAr1.length-1];
    picture = imgAr1.length-1
}
</script>

    </div>
<!--/row-fluid-->
<!--/container-->     
<!--=== End Content Part ===-->


<?php
include("page_footer.php");
include("copyright.php");
include("js.php");
?>

</body>
</html>