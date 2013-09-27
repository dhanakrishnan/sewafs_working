<?php
    require_once("include/get_values_to_display.php");
    require_once("include/user_profile_functions.php");
    require_once("include/session.php");
?>
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


<!--=== breadcrumbs ===-->
    <div class="breadcrumbs margin-bottom-50">
        <div class="container">
            <h1 class="color-green pull-left">Volunteer Registration</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                <li class="active">Volunteer Registrtion</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

<!--=== Content Part ===-->
<div class="container">  
  <div class="row-fluid">
        <!-- Left Sidebar(Content Part) -->        
        <div class="span9">
        <!-- Our Services -->
            <div class="row-fluid">
                <p></p>
                <p>Please Register here to become a volunteer in Sewa Family Services
                <br /><br/>
            </div><!--/row-fluid-->

            <div>
            <form class="span9" method="POST" action="page_volunteer_registration_process.php">
                    
                    <?php 
                        //Get all the chapters from Database and put it here.
                        $chapters = getChapters();
                        $userID = "";
                        if(isset ($_SESSION['sewafs_user_userID']))
                            $userID = $_SESSION['sewafs_user_userID'];
                        $volunteerProfile = getVolunteerProfile($userID);
                        //var_dump($volunteerProfile);

                        $location = "";
                        $interests = "";
                        $availableDays = "";
                        $availableTimes = "";
                        $otherAvailability = "";
                        $ageGroup = "";
                        $gender = "";
                        $languageSpoken = "";
                        $skills = "";
                        $previousExperience = "";
                        $otherComments = "";
                        $hearAboutUsThrough="";

                        if(!is_null($volunteerProfile))
                        {
                            if(!is_null($volunteerProfile['location']))
                                $location = $volunteerProfile['location'];
                            if(!is_null($volunteerProfile['volunteerInterest']))
                                $interests = $volunteerProfile['volunteerInterest'];
                            if(!is_null($volunteerProfile['availableDays']))
                                $availableDays = $volunteerProfile['availableDays'];
                            if(!is_null($volunteerProfile['availableTime']))
                                $availableTimes = $volunteerProfile['availableTime'];
                            if(!is_null($volunteerProfile['otherAvailability']))
                                $otherAvailability = $volunteerProfile['otherAvailability'];
                            if(!is_null($volunteerProfile['ageGroup']))
                                $ageGroup = $volunteerProfile['ageGroup'];
                            if(!is_null($volunteerProfile['gender']))
                                $gender = $volunteerProfile['gender'];
                            if(!is_null($volunteerProfile['languageSpoken']))
                                $languageSpoken = $volunteerProfile['languageSpoken'];
                            if(!is_null($volunteerProfile['skills']))
                                $skills = $volunteerProfile['skills'];
                            if(!is_null($volunteerProfile['previousExperience']))
                                $previousExperience = $volunteerProfile['previousExperience'];
                            if(!is_null($volunteerProfile['otherComments']))
                                $otherComments = $volunteerProfile['otherComments'];
                            if(!is_null($volunteerProfile['hearAboutUsThrough']))
                                $hearAboutUsThrough = $volunteerProfile['hearAboutUsThrough'];
                        }
                        //echo $skills;
                        //echo $previousExperience;
                        //echo $otherComments;

                        //echo $ageGroup;
                        //echo $location;
                        //echo $otherAvailability;
                        //var_dump($chapters);
                        //echo "Nothing here";
                            

                        if($_SERVER['REQUEST_METHOD'] == "GET")
                        {
                            if($_GET["status"] == "empty")
                            {
                                echo '<div><span class="alert-error" > Please fill in all the required values </span></div>';
                            }
                            if($_GET["status"] == "invalidEmail")
                            {
                                echo '<div><span class="alert-error" > Please fill in a valid EmailID Ex : emaple@gmail.com </span></div>';
                            }
                            if($_GET["status"] == "invalidPhoneNo")
                            {
                                echo '<div><span class="alert-error" > Please fill in a valid Phone Number Ex : 123-123-1234 </span></div>';
                            }
                            if($_GET["status"] == "success")
                            {
                                echo '<div><span class="alert-success" > Welcome to sewafs.org. <br >Your temporary password has been sent to your EmailID.<br> You can change your password once after logging into sewafs.org. <br> Thank you!! </span></div>';
                            }
                            if($_GET["status"] == "error")
                            {
                                echo '<div><span class="alert-success" > Welcome to sewafs.org. <br >Please see the temporary password to login to sewafs.org as volunteer.<br> Thank you!! </span></div>';
                            }
                            if($_GET["status"] == "becomeVolunteer")
                            {
                                echo '<div><span class="alert-success" > Thank You '.  $_SESSION['sewafs_user_userName'].'. <br> You have successfully become a volunteer to sewafs.org!! </span></div>';
                            }
                            if($_GET["status"] == "updated")
                            {
                                echo '<div><span class="alert-success" > Your Profile is successfully updated. Thank you!!! </span></div>';
                            }
                        }

                        $userProfile = array();
                        $emailID = $_SESSION['sewafs_user_emailID'];
                        $userName = $_SESSION['sewafs_user_userName'];
                        //echo $_SESSION['userID'] ;
                        //if($_SESSION['sewafs_user_userID'] != "" && $_SESSION['sewafs_user_userID'] != "NULL"  && !is_null($_SESSION['sewafs_user_userID'] != ""))
                        if($userID != "" && $userID != "NULL"  && !is_null($userID))
                        {
                            $userProfile = getUserProfile($userID);
                            //$userInfo = getUserInfo($_SESSION['sewafs_user_userID']);
   
                        }

                                                //var_dump($userProfile);

                      echo '<div><span class="alert-error" id="errorMessage"> </span></div>';
                      echo '<div><span class="alert-error" id="invalidEmailID"> </span></div>';
                      echo '<div><span class="alert-error" id="invalidPhoneNumber"> </span></div>';
                      echo '<div class="headline"><h4>Contact Information</h4> <span class="color-red">*</span></div>';

                      echo '<div class="vol-page">';
                      echo '<table >';
                          echo '<tr>';
                            echo '<td >';
                                echo '<div class="input-prepend">';
                                echo '<span class="add-on"><i class="icon-user"></i></span>';
                                /*if($_SESSION['sewafs_user_userID'] != "" && $_SESSION['sewafs_user_userID'] != "NULL"  && !is_null($_SESSION['sewafs_user_userID'] != ""))
                                {
                                    echo $_SESSION['sewafs_user_userID'];
                                    echo '<input class="input-medium required" type="text" id = "firstName" name= "firstName" placeholder="First Name" value="'.$userProfile['firstName'].'">';
                                }
                                else
                                {*/
                                    echo '<input class="input-medium required" type="text" id = "firstName" name= "firstName" placeholder="First Name" value="'.$userProfile['firstName'].'">';
                                //}
                                echo '</div>';
                            echo '</td>';
                            echo '<td>';
                                echo '<div class="input-prepend">';
                                echo '<span class="add-on"><i class="icon-user"></i></span>';
                                echo '<input class="input-medium required" type="text" id = "lastName" name= "lastName" placeholder="Last Name" value="'.$userProfile['lastName'].'">';
                                echo '</div>';
                            echo '</td>';
                          echo '</tr>';
                          echo '<tr>';
                            echo '<td >';
                                echo '<div class="input-prepend">';
                                echo '<span class="add-on"><i class="icon-envelope"></i></span>';
                                echo '<input class="input-medium required" type="text" id = "emailID" name= "emailID" placeholder="Email ID" value="'.$emailID.'">';
                                echo '</div>';
                           echo ' </td>';
                            echo '<td>';
                                echo '<div class="input-prepend">';
                                echo '<span class="add-on"><i class="icon-phone"></i></span>';
                                echo '<input class="input-medium required phoneno" type="text" id = "phoneNo" name= "phoneNo" placeholder="Phone Number" value="'.$userProfile['phoneNumber'].'">';
                                echo '</div>';
                            echo '</td>';
                            echo '<td>';
                                echo '<small>Eg: 111-111-1111</small>';
                            echo '</td>';
                          echo '</tr>';
                          echo '<tr>';
                            echo '<td>';
                                echo '<div class="input-prepend">';
                                echo '<span class="add-on"><i class="icon-home"></i></span>';
                                echo '<select class="input-large required" name="location" id="id_location" placeholder="Location">';
                                echo '<option value="" selected="selected">Select your location</option>';
                                
                                    $found = 0;
                                    foreach($chapters as $key => $value)
                                    {
                                        //$pos = stripos($mystring, $findme);
                                        $pos = stripos($location, $value);
                                        if($pos !== false)
                                        {
                                            $found = 1;
                                            echo '<option selected="selected" value="'. $value. '">'.$value.'</option>';
                                        }
                                        //echo '<option value="'. $key. '+' .$value. '">'.$value.'</option>';
                                        echo '<option value="'. $value. '">'.$value.'</option>';
                                    }
                                    if($found == 0 && $location!= "")
                                    {
                                        echo '<option value="999" selected="selected">Other</option>';
                                    }
                                    else 
                                        echo '<option value="999">Other</option>';
                                echo '</select><br />';
                                echo '</div>';
                            echo '</td>';
                            
                            echo '<td>';
                                echo '<div class="input-prepend">';
                                echo '<span class="add-on"><i class="icon-home"></i></span>';
                                if($found == 0)
                                    {
                                        echo '<input class="input-medium" type="text" id = "otherLocation" name= "otherLocation" placeholder="Other" value="'.$location.'">';
                                    }
                                else
                                    echo '<input class="input-medium" type="text" id = "otherLocation" name= "otherLocation" placeholder="Other">';
                                echo '</div>';
                            echo '</td>';
                            ?>
                          </tr>
                      </table>  
                    </div>
                    <div class="headline"><h4>Interests : </h4> </div>
                    <div class="vol-page">
                        <?php

                        echo '<table >';
                            echo '<tr>';
                                
                                echo '<td class="tdspace">';
                                    if (stripos($interests, "IT") !== false)
                                        echo '<label class="checkbox"><input type="checkbox" checked name="field[]" value="IT"/> IT </label>';
                                    else
                                        echo '<label class="checkbox"><input type="checkbox" name="field[]" value="IT"/> IT </label>';
                                echo '</td>';

                                echo '<td class="tdspace">';
                                    if (stripos($interests, "Program Analyst") !== false)
                                        echo '<label class="checkbox"><input type="checkbox" name="field[]" value="Program Analyst" checked/> Program Analyst </label>';
                                    else
                                        echo '<label class="checkbox"><input type="checkbox" name="field[]" value="Program Analyst"/> Program Analyst </label>';
                                echo '</td>';

                                echo '<td class="tdspace">';
                                    if (stripos($interests, "Public Relationship") !== false)
                                        echo '<label class="checkbox"><input type="checkbox" name="field[]" value="Public Relationship" checked/> Public Relationship </label>';
                                    else
                                        echo '<label class="checkbox"><input type="checkbox" name="field[]" value="Public Relationship"/> Public Relationship </label>';
                                echo '</td>';
                            echo '</tr>';
                            echo '<tr>';
                                echo '<td class="tdspace">';
                                    if (stripos($interests, "Volunteer Relationship") !== false)
                                        echo '<label class="checkbox"><input type="checkbox" name="field[]" value="Volunteer Relationship" checked/> Volunteer Relationship </label>';
                                    else
                                        echo '<label class="checkbox"><input type="checkbox" name="field[]" value="Volunteer Relationship"/> Volunteer Relationship </label>';
                                echo '</td>';

                                echo '<td class="tdspace">';
                                    if (stripos($interests, "Marketting") !== false)
                                        echo '<label class="checkbox"><input type="checkbox" name="field[]" value="Marketting" checked/> Marketting</label>';
                                    else
                                        echo '<label class="checkbox"><input type="checkbox" name="field[]" value="Marketting"/> Marketting</label>';
                                echo '</td>';
                            echo '</tr>';
                        echo '</table>';
                        

                    echo '</div>';

                    echo '<div class="headline"><h4>Volunteer Availability : </h4><span class="color-red">*</span> </div>';
                     echo '<div class="vol-page">';
                        echo '<table >';
                            echo '<tr>';
                            
                            echo '<td class="tdspace tdtop">';
                                echo '<label for="timeavailability"> Days : </label>';
                            echo '</td>';
                            echo '<td class="tdrightspace">';
                                if (stripos($availableDays, "Sundays") !== false)
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Sundays" checked/> Sundays</label>';
                                else 
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Sundays"/> Sundays</label>';
                                if (stripos($availableDays, "Mondays") !== false)
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Mondays" checked/> Mondays</label>';
                                else
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Mondays" /> Mondays</label>';
                                if (stripos($availableDays, "Tuesdays") !== false)
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Tuesdays" checked/> Tuesdays</label>';
                                else
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Tuesdays"/> Tuesdays</label>';
                                if(stripos($availableDays, "Wednesdays") !== false)
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Wednesdays" checked/> Wednesdays</label>';
                                else
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Wednesdays"/> Wednesdays</label>';
                                if(stripos($availableDays, "Thursdays") !== false)
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Thursdays" checked/> Thursdays</label>';
                                else
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Thursdays"/> Thursdays</label>';
                                if(stripos($availableDays, "Fridays") !== false)
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Fridays" checked/> Fridays</label>';
                                else
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Fridays"/> Fridays</label>';
                                if(stripos($availableDays, "Saturdays") !== false)
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Saturdays" checked/> Saturdays</label>';
                                else
                                    echo '<label class="checkbox"><input type="checkbox" name="days[]" value="Saturdays" /> Saturdays</label>';
                            echo '</td>';
                            echo '<td class="tdspace tdtop tdverline">';
                                echo '<label for="timeavailability"> Time : </label>';
                            echo '</td>';
                            echo '<td>';
                                if(stripos($availableTimes, "Any Time") !== false)
                                    echo '<label class="checkbox"><input type="checkbox" name="time[]" value="Any Time" checked/>  Any Time </label>';
                                else
                                    echo '<label class="checkbox"><input type="checkbox" name="time[]" value="Any Time" />  Any Time </label>';
                                if(stripos($availableTimes, "Mornings (9am to 12pm)") !== false)
                                    echo '<label class="checkbox"><input type="checkbox" name="time[]" value="Mornings (9am to 12pm)" checked/>  Mornings (9am to 12pm)</label>';
                                else
                                    echo '<label class="checkbox"><input type="checkbox" name="time[]" value="Mornings (9am to 12pm)"/>  Mornings (9am to 12pm)</label>';
                                if(stripos($availableTimes, "Afternoons (12pm to 4pm)") !== false)
                                    echo '<label class="checkbox"><input type="checkbox" name="time[]" value="Afternoons (12pm to 4pm)" checked/>  Afternoons (12pm to 4pm)</label>';
                                else
                                    echo '<label class="checkbox"><input type="checkbox" name="time[]" value="Afternoons (12pm to 4pm)"/>  Afternoons (12pm to 4pm)</label>';
                                if(stripos($availableTimes, "Evenings (4pm to 8pm)") !== false)
                                    echo '<label class="checkbox"><input type="checkbox" name="time[]" value="Evenings (4pm to 8pm)" checked/>  Evenings (4pm to 8pm)</label>';
                                else
                                    echo '<label class="checkbox"><input type="checkbox" name="time[]" value="Evenings (4pm to 8pm)" />  Evenings (4pm to 8pm)</label>';
                               echo ' <table>';
                                echo '<tr>';
                                if ($otherAvailability != "")
                                    echo '<td><label class="checkbox "><input type="checkbox" checked/> Other :</label><td/>';
                                else
                                    echo '<td><label class="checkbox "><input type="checkbox" /> Other :</label><td/>';

                               echo ' <td>  <input class="input-medium" type="text" id = "otherTime" name= "otherTime" value="'.$otherAvailability.'"><td/>';
                                echo '<tr/>';
                            echo '</table>';

                            echo '</td>';
                          echo '</tr>';
                        echo '</table>';
                        

                    echo '</div>';
                    echo '<div class="headline"><h4>Other Information : </h4> </div>';
                    echo '<div class="vol-page">';
                      echo '<table>';
                                echo '<tr>';
                               echo ' <td class="tdspace tdright"><label>User Name</label></td>';
                                echo '<td><input type="text" name="userName" class="input-xlarge" placeholder ="Name you want to show on the website"/ value="'.$userName.'"></td>'; 
                        
                            echo '</tr>';
                            echo '</table>';
                            
                      echo '<table>';

                          echo '<tr>';
                            echo '<td class="tdspace tdright">';
                                echo '<label>Age Group <span class="color-red">*</span></label> ';
                            echo '</td>';
                            echo '<td>';
                                echo '<select class="input-small required" name="age" id="age" >';
                                echo '<option value="" selected="selected">---</option>';
                                if(stripos($ageGroup, "Under 18")!== false)
                                    echo '<option value="Under 18" selected>Under 18</option>';
                                else
                                    echo '<option value="Under 18" >Under 18</option>';
                                if(stripos($ageGroup, "18 - 25")!== false)
                                    echo '<option value="18 - 25" selected>18 - 25</option>';
                                else
                                    echo '<option value="18 - 25">18 - 25</option>';
                                if(stripos($ageGroup, "25 - 40")!== false)
                                    echo '<option value="25 - 40" selected>25 - 40</option>';
                                else
                                    echo '<option value="25 - 40">25 - 40</option>';
                                if(stripos($ageGroup, "Above 40")!== false)
                                    echo '<option value="Above 40" selected>Above 40</option>';
                                else
                                    echo '<option value="Above 40">Above 40</option>';
                                echo '</select><br />';
                            echo '</td>';
                         echo ' </tr>';
                          echo '<tr>';
                            echo '<td class="tdspace tdright">';
                               echo ' <label>Gender <span class="color-red">*</span></label> ';
                            echo '</td>';
                            echo '<td>';
                                echo '<br>';
                                if(stripos($gender, "Male") !== false)
                                    echo '<input type="radio" name="gender" value="Male" checked> Male';
                                else
                                    echo '<input type="radio" name="gender" value="Male"> Male';
                                if(stripos($gender, "Female") !== false)
                                    echo '<input type="radio" name="gender" value="Female" checked> Female<br><br>';
                                else
                                    echo '<input type="radio" name="gender" value="Female" > Female<br><br>';
                            echo '</td>';
                          echo '</tr>';
                          echo '<tr>';
                            echo '<td class="tdspace tdright">';
                                echo '<label>Language Spoken <span class="color-red">*</span></label>';
                            echo '</td>';
                            echo '<td class="tdspace">';
                                echo '<select multiple  class="input-small required" name="language[]" id="language" >';
                                if($languageSpoken != "")
                                    echo '<option value=""  >---</option>';
                                else
                                    echo '<option value="" selected="selected" >---</option>';
                                $languageStr=$languageSpoken;
                                if(stripos($languageSpoken, "English") !== false)
                                {
                                    echo '<option value="English" selected>English</option>';
                                    $languageStr = str_replace("English", "", $languageStr);

                                }
                                else
                                    echo '<option value="English" >English</option>';
                                if(stripos($languageSpoken, "Spanish") !== false)
                                {
                                    echo '<option value="Spanish" selected>Spanish</option>';
                                    $languageStr = str_replace("Spanish", "", $languageStr);
                                }
                                else
                                    echo '<option value="Spanish">Spanish</option>';
                                if(stripos($languageSpoken, "Chinese") !== false)
                                {
                                    echo '<option value="Chinese" selected>Chinese</option>';
                                    $languageStr = str_replace("Chinese", "", $languageStr);
                                }
                                else
                                    echo '<option value="Chinese">Chinese</option>';

                                if(stripos($languageSpoken, "Hindi") !== false)
                                {
                                    echo '<option value="Hindi" selected>Hindi</option>';
                                    $languageStr = str_replace("Hindi", "", $languageStr);
                                }
                                else
                                    echo '<option value="Hindi">Hindi</option>';
                                $languageStr = str_replace(",", "", $languageStr);

                                //echo '<option value="Other">Other</option>';
                                echo '</select><br />';
                            echo '</td>';
                            echo '<td>';
                                echo '<div class="input-prepend">';
                                echo '<span class="add-on"><i class="icon-globe"></i></span>';
                                if($languageStr != "")
                                    echo '<input class="input-medium" type="text" id = "otherLanguage" name= "otherLanguage" placeholder="Other" value="'.$languageStr.'">';
                                else
                                    echo '<input class="input-medium" type="text" id = "otherLanguage" name= "otherLanguage" placeholder="Other" >'; 
                                echo '</div>';
                            echo '</td>';
                          echo '</tr>';
                      echo '</table>';
                      
                      echo '<table>';
                            echo '<tr>';
                            echo ' <td class="tdspace ">';

                               echo '  <label >Special Skills : </label>';
                             echo '</td>';
                             echo '<td>';

                                 echo '<textarea  rows="3" cols="40" colspan="2" name="skills" >'.$skills.'</textarea>';
                             echo '</td>';
                           echo '</tr>';
                           echo '<tr>';
                             echo '<td class="tdspace ">';
                                 echo '<label >Previous Experience : </label>';
                             echo '</td>';
                             echo '<td>';
                                 echo '<textarea id="previousExp" rows="3" cols="40" colspan="2" name="previousExp" >'.$previousExperience.'</textarea>';
                            echo ' </td>';
                           echo '</tr>';
                           echo '<tr>';
                            
                             echo '<td class="tdspace tdtop">';
                                 echo '<label for="timeavailability"> How did you Hear about us : </label>';
                             echo '</td>';
                             echo '<td class="tdrightspace">';

                                $hearAboutUsThroughStr = $hearAboutUsThrough;
                                if(stripos($hearAboutUsThrough, "sewafs.org") !== false)
                                {
                                    echo '<label class="checkbox"><input name="hearAbout[]" type="checkbox" value="sewafs.org" checked/> sewafs.org</label>';
                                    $hearAboutUsThroughStr = str_replace("sewafs.org", "", $hearAboutUsThroughStr);
                                }
                                else
                                    echo '<label class="checkbox"><input name="hearAbout[]" type="checkbox" value="sewafs.org" /> sewafs.org</label>';
                                 
                                if(stripos($hearAboutUsThrough, "Friends") !== false)
                                {
                                    echo '<label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Friends" checked/> Friends</label>';
                                    $hearAboutUsThroughStr = str_replace("Friends", "", $hearAboutUsThroughStr);
                                }
                                else
                                    echo '<label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Friends"/> Friends</label>';
                                 
                                if(stripos($hearAboutUsThrough, "Radio/Newspaper/Flyer") !== false)
                                {
                                    echo '<label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Radio/Newspaper/Flyer" checked/>  Radio/Newspaper/Flyer</label>';
                                    $hearAboutUsThroughStr = str_replace("Radio/Newspaper/Flyer", "", $hearAboutUsThroughStr);
                                }
                                else
                                    echo '<label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Radio/Newspaper/Flyer"/>  Radio/Newspaper/Flyer</label>';
                                 
                                if(stripos($hearAboutUsThrough, "Sewa Volunteer") !== false)
                                {
                                    echo '<label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Sewa Volunteer" checked/> Sewa Volunteer</label>';
                                    $hearAboutUsThroughStr = str_replace("Sewa Volunteer", "", $hearAboutUsThroughStr);
                                }
                                else
                                    echo '<label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Sewa Volunteer"/> Sewa Volunteer</label>';
                                 
                                 if(stripos($hearAboutUsThrough, "Internet Site") !== false)
                                {
                                    echo '<label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Internet Site" checked/>  Internet Site</label>';
                                    $hearAboutUsThroughStr = str_replace("Internet Site", "", $hearAboutUsThroughStr);
                                }
                                else
                                    echo '<label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Internet Site"/>  Internet Site</label>';

                                if(stripos($hearAboutUsThrough, "Another Organization") !== false)
                                {
                                    echo '<label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Another Organization" checked/> Another Organization</label>';
                                    $hearAboutUsThroughStr = str_replace("Another Organization", "", $hearAboutUsThroughStr);
                                }
                                else
                                    echo '<label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Another Organization"/> Another Organization</label>';
                                
                                 $hearAboutUsThroughStr = str_replace(",", "", $hearAboutUsThroughStr);
                                 
                                  echo '<table>';
                                 echo '<tr>';
                                if($hearAboutUsThroughStr != "")
                                {
                                    echo '<td><label class="checkbox "><input type="checkbox" checked/> Other :</label><td/>';
                                    echo '<td>  <input class="input-medium" type="text" id = "otherResource" name= "otherResource" value="'.$hearAboutUsThroughStr.'"><td/>';
                                }
                                else
                                {
                                    echo '<td><label class="checkbox "><input type="checkbox" /> Other :</label><td/>';
                                    echo '<td>  <input class="input-medium" type="text" id = "otherResource" name= "otherResource" ><td/>';
                                }

                                 
                                echo ' <tr/>';
                             echo '</table>';

                            echo ' </td>';
                         echo '</tr>';
                         echo '<tr>';
                             echo '<td class="tdspace ">';
                                 echo '<label >Other Comments : </label>';
                            echo ' </td>';
                            echo ' <td>';
                                echo ' <textarea id="comments" rows="3" cols="40" colspan="2" name="comments" >'.$otherComments.'</textarea>';
                             echo '</td>';
                           echo '</tr>';  
                       echo '</table>';  
                      
                    echo '</div>';
                    echo '<div class="headline"><h4>Emergency Contact : </h4> </div>';

                    $emgencyContact2 = getEmergencyContact2($userID, $volunteerProfile['emergencyContactID']);

                    echo '<div class="emergence-contact">';
                        echo '<table>';
                            echo '<tr>';
                                echo '<th colspan="2">Contact1 <span class="color-red">*</span></th>';
                                echo '<th colspan="2">Contact2</th>';
                            echo '</tr>';
                            echo '<tr>';
                                echo '<td class="tdspace ">';
                                    echo '<label> Name : <span class="color-red">*</span></label> ';
                                echo '</td>';
                                echo '<td class="tdrightspace">';
                                   echo ' <br>';
                                    echo '<input class="required" type="text" name="emergencyContactName1" id="emergencyContactName1" value="'.$volunteerProfile['contactName'].'"> ';
                                echo '</td>';
                                echo '<td class="tdspace tdright tdverline ">';
                                    echo '<label> Name : </label> ';
                                echo '</td>';
                                echo '<td>';
                                   echo ' <br>';
                                    echo '<input type="text" name="emergencyContactName2" id="emergencyContactName2" value="'.$emgencyContact2['contactName'].'"> ';
                                echo '</td>';
                              echo '</tr>';
                               echo '<tr>';
                                echo '<td class="tdspace ">';
                                    echo '<label> Phone Number : <span class="color-red">*</span></label> ';
                                echo '</td>';
                                echo '<td class="tdrightspace">';
                                    echo '<br>';
                                    echo '<input type="text" class="required phoneno" name="emergencyContactNo1" id="emergencyContactNo1" value="'.$volunteerProfile['contactNumber'].'"> ';
                                echo '</td>';
                                echo '<td class="tdspace tdright tdverline ">';
                                    echo '<label> Phone Number : </label> ';
                                echo '</td>';
                                echo '<td>';
                                    echo '<br>';
                                    echo '<input type="text" class="phoneno" name="emergencyContactNo2" id="emergencyContactNo2" value="'.$emgencyContact2['contactNumber'].'" > ';
                                echo '</td>';
                              echo '</tr>';
                               echo '<tr>';
                                echo '<td class="tdspace ">';
                                   echo ' <label> Relationship : <span class="color-red">*</span></label>'; 
                                echo  '</td>';
                                echo '<td class="tdrightspace">';
                                   echo ' <br>';
                                   echo  '<input type="text" class="required" name="emergencyContactRelation1" id="emergencyContactRelation1" value="'.$volunteerProfile['contactRel'].'" >'; 
                                echo '</td>';
                                echo '<td class="tdspace tdright tdverline ">';
                                    echo '<label> Relationship : </label> ';
                                echo '</td>';
                                echo '<td>';
                                   echo ' <br>';
                                    echo '<input type="text" name="emergencyContactRelation2" id="emergencyContactRelation2" value="'.$emgencyContact2['relationship'].'"> ';
                                echo '</td>';
                              echo '</tr>';
                        echo '</table>';
                    echo '</div>';
                    if(!is_null($volunteerProfile))
                            echo '<input type="hidden" name="volunteer" value="true">';
                        else
                            echo '<input type="hidden" name="volunteer" value="false">';
                    
                    echo '<div class=" pull-right">';
                       echo '<label for="id_submit"></label>';
                        if(!is_null($volunteerProfile))
                            echo '<button class="btn-u btn-u-blue submit" type="submit">Update</button>';
                        else
                            echo '<button class="btn-u btn-u-blue submit" type="submit">Register</button>';
                       
                    echo '</div>';
                    ?>
            </form>

            </div> 
        </div><!--/span9-->
        
        <!-- Right Sidebar -->        
        <div class="span3">
             <!-- Posts -->
            <div class="posts margin-bottom-30">
                <div class="headline"><h3>Events</h3></div>
                <dl class="dl-horizontal">
                    <dt><a href="http://www.indiacc.org/Sevathon"><img alt="" src="assets/img/sliders/elastislide/sevathon-logo.jpg"></a></dt>
                    <dd>
                        <p><a href="http://www.indiacc.org/Sevathon">Sevathon 2013.</a><br/>
                           Walk/Run. <br />
                           5K/10K/Half Marathon.
                        </p> 
                    </dd>
                </dl>
                
            </div>
            
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

<script type="text/javascript" src="assets/js/validation/validate.js"></script>
<script type="text/javascript">
    var submit = $(".submit");
    var required = $(".required");

    var emailID = $("#emailID");
    var phoneNo = $(".phoneno");

    /*if(containsBlank() || !isValidEmailID($("#emailID").val())) $submit.attr("disabled", "disabled");
        else $submit.removeAttr("disabled");*/

    function requiredFieldFilledIn()
    {
        //alert("inside requiredFieldFilledIn");
        //if(containsBlank())
        //alert(emailID.val());
        if(containsBlank() || !isValidEmailID(emailID.val()) || !validPhoneNumber(phoneNo.val()))
        {
            //alert("if block");
            $("#errorMessage").html("Please fill in the required fields");
            submit.attr("disabled", "disabled");

        }
        else
        {
           //alert("else block");
           $("#errorMessage").html("");
           submit.removeAttr("disabled"); 
        }
    }
    $(".required").keyup(function(){
        //alert("insideFocus");
        requiredFieldFilledIn();

    });

    $("#emailID").keyup(function(){
        
       if(isValidEmailID($(this).val())) 
       {
            $("#invalidEmailID").html("");
            if(requiredFieldFilledIn() && validPhoneNumber(phoneNo.val()))
            {
             submit.removeAttr("disabled"); 
            }
       }
       //alert("got focus");
       else
       {
            $("#invalidEmailID").html("Please enter the valid EmailID Ex: example@gmail.com");
            submit.attr("disabled", "disabled");
       }

    });

    $(".phoneno").keyup(function(){
        
       if(validPhoneNumber($(this).val())) 
       {
            $("#invalidPhoneNumber").html("");
            if(requiredFieldFilledIn() && isValidEmailID(emailID.val()))
            {
                submit.removeAttr("disabled"); 
            }

       }
       //alert("got focus");
       else
       {
            $("#invalidPhoneNumber").html("Please enter the valid Phone Number Ex: 123-123-1234");
            submit.attr("disabled", "disabled");
       }

    });

requiredFieldFilledIn();
</script>
</body>
</html>  