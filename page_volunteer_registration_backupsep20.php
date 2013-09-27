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
                        }

                        $userProfile = array();
                        $emailID = $_SESSION['sewafs_user_emailID'];
                        $userName = $_SESSION['sewafs_user_userName'];
  //echo $_SESSION['userID'] ;
  //                    echo $_SESSION['sewafs_user_userID'];
                        if($_SESSION['sewafs_user_userID'] != "" && $_SESSION['sewafs_user_userID'] != "NULL"  && !is_null($_SESSION['sewafs_user_userID'] != ""))
                        {
                            $userProfile = getUserProfile($_SESSION['sewafs_user_userID']);
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
                                
                                    foreach($chapters as $key => $value)
                                    {

                                        //echo '<option value="'. $key. '+' .$value. '">'.$value.'</option>';
                                        echo '<option value="'. $value. '">'.$value.'</option>';
                                    }
                                
                                
                                echo '<option value="999">Other</option>';
                                echo '</select><br />';
                                echo '</div>';
                            echo '</td>';
                            ?>
                            <td>
                                <div class="input-prepend">
                                <span class="add-on"><i class="icon-home"></i></span>
                                <input class="input-medium" type="text" id = "otherLocation" name= "otherLocation" placeholder="Other">
                                </div>
                            </td>
                          </tr>
                      </table>  
                    </div>
                    <div class="headline"><h4>Interests : </h4> </div>
                    <div class="vol-page">
                        <table >
                            <tr>
                                
                                <td class="tdspace">
                                    <label class="checkbox"><input type="checkbox" name="field[]" value="IT"/> IT </label>
                                </td>

                                <td class="tdspace">
                                    <label class="checkbox"><input type="checkbox" name="field[]" value="Program Analyst"/> Program Analyst </label>
                                </td>

                                <td class="tdspace">
                                    <label class="checkbox"><input type="checkbox" name="field[]" value="Public Relationship"/> Public Relationship </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdspace">
                                    <label class="checkbox"><input type="checkbox" name="field[]" value="Volunteer Relationship"/> Volunteer Relationship </label>
                                </td>

                                <td class="tdspace">
                                    <label class="checkbox"><input type="checkbox" name="field[]" value="Marketting"/> Marketting</label>
                                </td>
                            </tr>
                        </table>


                    </div>

                    <div class="headline"><h4>Volunteer Availability : </h4><span class="color-red">*</span> </div>
                     <div class="vol-page">
                        <table >
                            <tr>
                            
                            <td class="tdspace tdtop">
                                <label for="timeavailability"> Days : </label>
                            </td>
                            <td class="tdrightspace">
                                
                                <label class="checkbox"><input type="checkbox" name="days[]" value="Sundays"/> Sundays</label>
                                <label class="checkbox"><input type="checkbox" name="days[]" value="Mondays"/> Mondays</label>
                                <label class="checkbox"><input type="checkbox" name="days[]" value="Tuesdays"/> Tuesdays</label>
                                <label class="checkbox"><input type="checkbox" name="days[]" value="Wednesdays"/> Wednesdays</label>
                                <label class="checkbox"><input type="checkbox" name="days[]" value="Thursdays"/> Thursdays</label>
                                <label class="checkbox"><input type="checkbox" name="days[]" value="Fridays"/> Fridays</label>
                                <label class="checkbox"><input type="checkbox" name="days[]" value="Saturdays"/> Saturdays</label>

                            </td>
                            <td class="tdspace tdtop tdverline">
                                <label for="timeavailability"> Time : </label>
                            </td>
                            <td>
                                <label class="checkbox"><input type="checkbox" name="time[]" value="Any Time"/>  Any Time </label>
                                <label class="checkbox"><input type="checkbox" name="time[]" value="Mornings (9am to 12pm)"/>  Mornings (9am to 12pm)</label>
                                <label class="checkbox"><input type="checkbox" name="time[]" value="Afternoons (12pm to 4pm)"/>  Afternoons (12pm to 4pm)</label>
                                <label class="checkbox"><input type="checkbox" name="time[]" value="Evenings (4pm to 8pm)"/>  Evenings (4pm to 8pm)</label>
                                <table>
                                <tr>
                                 <td><label class="checkbox "><input type="checkbox" /> Other :</label><td/>
                                <td>  <input class="input-medium" type="text" id = "otherTime" name= "otherTime" ><td/>
                                <tr/>
                            </table>

                            </td>
                          </tr>
                        </table>
                        

                    </div>
                    <div class="headline"><h4>Other Information : </h4> </div>
                    <div class="vol-page">
                      <table>
                                <tr>
                                <td class="tdspace tdright"><label>User Name</label></td>
                               <?php echo '<td><input type="text" name="userName" class="input-xlarge" placeholder ="Name you want to show on the website"/ value="'.$userName.'"></td>'; ?>
                        
                            </tr>
                            </table>
                      <table>

                          <tr>
                            <td class="tdspace tdright">
                                <label>Age Group <span class="color-red">*</span></label> 
                            </td>
                            <td>
                                <select class="input-small required" name="age" id="age" >
                                <option value="" selected="selected">---</option>
                                <option value="Under 18">Under 18</option>
                                <option value="18 - 25">18 - 25</option>
                                <option value="25 - 40">25 - 40</option>
                                <option value="Above 40">Above 40</option>
                                </select><br />
                            </td>
                          </tr>
                          <tr>
                            <td class="tdspace tdright">
                                <label>Gender <span class="color-red">*</span></label> 
                            </td>
                            <td>
                                <br>
                                <input type="radio" name="gender" value="Male"> Male
                                <input type="radio" name="gender" value="Female" > Female<br><br>
                            </td>
                          </tr>
                          <tr>
                            <td class="tdspace tdright">
                                <label>Language Spoken <span class="color-red">*</span></label>
                            </td>
                            <td class="tdspace">
                                <select multiple  class="input-small required" name="language[]" id="language" >
                                <option value="" selected="selected" >---</option>
                                <option value="English">English</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Hindi">Hindi</option>
                                <option value="Other">Other</option>
                                </select><br />
                            </td>
                            <td>
                                <div class="input-prepend">
                                <span class="add-on"><i class="icon-globe"></i></span>
                                <input class="input-medium" type="text" id = "otherLanguage" name= "otherLanguage" placeholder="Other">
                                </div>
                            </td>
                          </tr>
                      </table>
                      <table>
                           <tr>
                            <td class="tdspace ">
                                <label >Special Skills : </label>
                            </td>
                            <td>
                                <textarea  rows="3" cols="40" colspan="2" name="skills"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td class="tdspace ">
                                <label >Previous Experience : </label>
                            </td>
                            <td>
                                <textarea id="previousExp" rows="3" cols="40" colspan="2" name="previousExp"></textarea>
                            </td>
                          </tr>
                          <tr>
                            
                            <td class="tdspace tdtop">
                                <label for="timeavailability"> How did you Hear about us : </label>
                            </td>
                            <td class="tdrightspace">
                                
                                <label class="checkbox"><input name="hearAbout[]" type="checkbox" value="sewafs.org"/> sewafs.org</label>
                                <label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Friends"/> Friends</label>
                                <label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Radio/Newspaper/Flyer"/>  Radio/Newspaper/Flyer</label>
                                <label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Sewa Volunteer"/> Sewa Volunteer</label>
                                <label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Internet Site"/>  Internet Site</label>
                                <label class="checkbox"><input name="hearAbout[]" type="checkbox" value="Another Organization"/> Another Organization</label>
                                 <table>
                                <tr>
                                 <td><label class="checkbox "><input type="checkbox" /> Other :</label><td/>
                                <td>  <input class="input-medium" type="text" id = "otherResource" name= "otherResource" ><td/>
                                <tr/>
                            </table>

                            </td>
                        </tr>
                        <tr>
                            <td class="tdspace ">
                                <label >Other Comments : </label>
                            </td>
                            <td>
                                <textarea id="comments" rows="3" cols="40" colspan="2" name="comments"></textarea>
                            </td>
                          </tr>  
                      </table>  
                    </div>
                    <div class="headline"><h4>Emergency Contact : </h4> </div>
                    <div class="emergence-contact">
                        <table>
                            <tr>
                                <th colspan="2">Contact1 <span class="color-red">*</span></th>
                                <th colspan="2">Contact2</th>
                            </tr>
                            <tr>
                                <td class="tdspace ">
                                    <label> Name : <span class="color-red">*</span></label> 
                                </td>
                                <td class="tdrightspace">
                                    <br>
                                    <input class="required" type="text" name="emergencyContactName1" id="emergencyContactName1" > 
                                </td>
                                <td class="tdspace tdright tdverline ">
                                    <label> Name : </label> 
                                </td>
                                <td>
                                    <br>
                                    <input type="text" name="emergencyContactName2" id="emergencyContactName2" > 
                                </td>
                              </tr>
                               <tr>
                                <td class="tdspace ">
                                    <label> Phone Number : <span class="color-red">*</span></label> 
                                </td>
                                <td class="tdrightspace">
                                    <br>
                                    <input type="text" class="required phoneno" name="emergencyContactNo1" id="emergencyContactNo1" > 
                                </td>
                                <td class="tdspace tdright tdverline ">
                                    <label> Phone Number : </label> 
                                </td>
                                <td>
                                    <br>
                                    <input type="text" class="phoneno" name="emergencyContactNo2" id="emergencyContactNo2" > 
                                </td>
                              </tr>
                               <tr>
                                <td class="tdspace ">
                                    <label> Relationship : <span class="color-red">*</span></label> 
                                </td>
                                <td class="tdrightspace">
                                    <br>
                                    <input type="text" class="required" name="emergencyContactRelation1" id="emergencyContactRelation1" > 
                                </td>
                                <td class="tdspace tdright tdverline ">
                                    <label> Relationship : </label> 
                                </td>
                                <td>
                                    <br>
                                    <input type="text" name="emergencyContactRelation2" id="emergencyContactRelation2" > 
                                </td>
                              </tr>
                        </table>
                    </div>
                    <div class=" pull-right">
                       <label for="id_submit"></label>
                       <button class="btn-u btn-u-blue submit" type="submit">Register</button>
                       
                    </div>
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