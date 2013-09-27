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
    <link rel="shortcut icon" href="favicon.ico">        
    <!-- CSS Implementing Plugins -->    
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css" type="text/css" media="screen">      
    <link rel="stylesheet" href="assets/plugins/parallax-slider/css/parallax-slider.css" type="text/css">
    <!-- CSS Theme -->    
    <link rel="stylesheet" href="assets/css/themes/default.css" id="style_color">
    <link rel="stylesheet" href="assets/css/themes/headers/default.css" id="style_color-header-1">    
</head> 

<body>
<!--=== Style Switcher ===-->    
<i class="style-switcher-btn style-switcher-btn-option icon-cogs"></i>
<div class="style-switcher style-switcher-inner">
    <div class="theme-close"><i class="icon-remove"></i></div>
    <div class="theme-heading">Theme Colors</div>
    <ul class="unstyled">
        <li class="theme-default theme-active" data-style="default" data-header="dark"></li>
        <li class="theme-blue" data-style="blue" data-header="dark"></li>
        <li class="theme-orange" data-style="orange" data-header="dark"></li>
        <li class="theme-red" data-style="red" data-header="dark"></li>
        <li class="theme-light" data-style="light" data-header="dark"></li>
    </ul>
</div><!--/style-switcher-->
<!--=== End Style Switcher ===-->     

<!--=== Top ===-->    
<div class="top">
    <div class="container"> 
    <!-- Logo -->       
        <div class="logo" >                                             
            <a href="index.php"><img id="logo-header" src="assets/img/fusion_tranquil_logo.png" alt="Logo" ></a>
        </div><!-- /logo -->        
        <ul class="loginbar pull-right">
             <li><a href="page_registration.php" class="login-btn">Register</a></li> 
            <li class="devider">&nbsp;</li>
             <li><a href="page_login.php" class="login-btn">Login</a></li> 
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
                                <li><a href="accident_assistance.php">Accidend Assistance</a></li>
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
                                <li><a href="#">Local Events</a></li>
                            </ul>
                            <b class="caret-out"></b>                        
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us
                                <b class="caret"></b>                            
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Over View</a></li>
                                <li><a href="#">Our Team</a></li>
                                <li><a href="#">News Letter</a></li>
                                <li><a href="#">Annual report</a></li>
                            </ul>
                            <b class="caret-out"></b>                        
                        </li>
                        <li>
                            <a href="page_contact.php" >Contact Us</a>                        
                        </li>
                        <li>
                            <a href="page_volunteer.php" >Volunteer</a>                        
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