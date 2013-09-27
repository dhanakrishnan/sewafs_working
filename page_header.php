<?php
require_once("include/session.php");
?>

<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->  
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title><?php echo $page_title;?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/headers/header1.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="assets/css/style_responsive.css">
    <link rel="shortcut icon" href="favicon.ico?v=2">        
    <!-- CSS Implementing Plugins -->    
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css" type="text/css" media="screen">      
    <link rel="stylesheet" href="assets/plugins/parallax-slider/css/parallax-slider.css" type="text/css">
    <!-- CSS Theme -->    
    <link rel="stylesheet" href="assets/css/themes/default.css" id="style_color">
    <link rel="stylesheet" href="assets/css/themes/headers/default.css" id="style_color-header-1"> 

    <link rel="stylesheet" href="assets/css/popup.css"> 
  
    <!-- Photo gallery ---->
    <link rel="stylesheet" href="assets/plugins/fancybox/source/jquery.fancybox.css">           
    <link rel="stylesheet" href="assets/css/effects.css">  
  
    <!-----Video pop up ---->
    <link rel="stylesheet" href="assets/css/prettyphoto/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />

</head> 

<body>
<!-- Removed Style Switcher -->   

<div class="container">

    <div "span3">
         <div class="logo" >                                             
              <a href="index.php"><img id="logo-header" src="assets/img/logo_sewafs.png" width="10%" height="10%"  alt="Logo" ></a>
         </div><!-- /logo -->   
    </div>

    <div "span9">
        <!--=== Top ===-->    
        <div class="top">
            <div class="container"> 
            <!-- Logo -->       
                <div class="logo" >                                             
                    <a href="index.php"><img id="logo-header" src="assets/img/logo_sewafs.png" width="85%" alt="Logo" ></a>
                </div><!-- /logo -->        
                <ul class="loginbar pull-right">
                     <?php  
                        $href = "page_".$_SESSION['role'].".php"; 
                        if($_SESSION['userName'] != "" || !is_null($_SESSION['userName']))
                        {
                            echo '<li><a href="user_role_view.php" class="login-btn">' . $_SESSION['userName'] . '</a></li>';
                            echo '<li class="devider">&nbsp;</li>';
                            echo '<li><a href="page_logout.php" class="login-btn">Logout</a></li>';
                            echo '';
                        }
                        else
                        {
                            echo '<li><a href="page_registration.php" class="login-btn">Register</a></li>';
                            echo '<li class="devider">&nbsp;</li>';
                            echo '<li><a href="page_login.php" class="login-btn">Login</a></li>';
                        }

                    ?>
                    <li class="devider">&nbsp;</li>
                    <li><a href="#" class="login-btn">Help</a></li> 
                      
                </ul>
            </div>      
        </div><!--/top-->
        <!--=== End Top ===-->    

        <!--=== Header ===-->
        <div class="header">               
            <div class="container"> 
                        
                                            
                <!-- Menu -->       
                <div class="navbar">                                
                    <div class="navbar-inner">                                  
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a><!-- /nav-collapse -->                                  
                        <div class="nav-collapse collapse">                                     
                            <ul class="nav top-2">
                                <li >
                                    <a href="index.php" >Home</a>                       
                                </li>
                                <li>
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Services
                                        <b class="caret"></b>                            
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="will_writing.php">Will Writing</a></li>
                                        <li><a href="medical_billing.php">Medical Billing</a></li>
                                        <li><a href="health_proxy.php">Healthcare Proxy</a></li>
                                        <li><a href="accident_assistance.php">Accident Assistance</a></li>
                                        <li><a href="funeral_service.php">Funeral Services</a></li>
                                    </ul>
                                    <b class="caret-out"></b>                        
                                </li>
                                <li>
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Get Involved
                                        <b class="caret"></b>                            
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Volunteer</a></li>
                                        <li><a href="#">Service Provider</a></li>
                                        <li><a href="#">Donate</a></li>

                                    </ul>
                                    <b class="caret-out"></b>                        
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events
                                        <b class="caret"></b>                            
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Sewa Family Service Events</a></li>
                                        <li><a href="#">Free Service Events</a></li>
                                        <li><a href="local_events.php">Local Events</a></li>
                                    </ul>
                                    <b class="caret-out"></b>                        
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us
                                        <b class="caret"></b>                            
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Overview</a></li>
                                        <li><a href="page_gallery.php">Our Team Activities</a></li>
                                        <li><a href="#">News Letter</a></li>
                                        <li><a href="#">Annual report</a></li>
                    <li><a href="#">Gallery</a></li>
                                    </ul>
                                    <b class="caret-out"></b>                        
                                </li>
                                <li>
                                    <a href="page_contact.php" >Contact Us</a>                        
                                </li>
                                <li>
                                    <a href="page_volunteer_registration.php" >Volunteer</a>                        
                                </li>
                               
                                <li><a class="search"><i class="icon-search search-btn"></i></a></li>                               
                            </ul>
                            <div class="search-open">
                                <div class="input-append">
                                    <form>
                                        <input type="text" class="span3" placeholder="Search" />
                                        <button type="submit" class="btn-u">Go</button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- /nav-collapse -->                                
                    </div><!-- /navbar-inner -->
                </div><!-- /navbar -->                          
            </div><!-- /container -->               
        </div><!--/header -->      
        <!--=== End Header ===-->
    </div>
</div>