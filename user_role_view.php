<?php 
  require_once("include/session.php");
  require_once("include/queries.php");
  require_once("include/user_profile_functions.php");
  $userRole = "";
  if(isset($_SESSION['sewafs_user_role']))
    $userRole = $_SESSION['sewafs_user_role'];
  $page_title = ucfirst($userRole) ;
  include("page_header.php");

  
?>



<!--=== Content Part ===-->
<div class="body">
    <div class="breadcrumbs margin-bottom-50">
        <div class="container">
            <h1 class="color-green pull-left"><?php echo ucfirst($userRole);  ?> </h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                <li id="activeUser" class="active"> <?php echo ucfirst($userRole);  ?> </li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->


<!--=== Content Part ===-->
<div class="container">
    <div class="row-fluid">
            <!--=== User Role View ===-->
            <div class="span3">
                <!-- Posts -->
                <div class="posts margin-bottom-20">
                    
                    <!--<div class="headline"><h4>Left side Navigation bar</h4></div>-->
                        <ul class="nav top-2">
                            <li><a id="profile_li" class="li-background-color" href="#"><h5>Profile</h5></a></li>
                            <li><a id="change_password_li" class="li-background-color" href="#"><h5>Change Password</h5></a></li>
                            <li><a id="request_history_li" class="li-background-color" href="#"><h5>Request History</h5></a></li>
                            <li><a id="volunteer_li" class="li-background-color" href="#"><h5>Volunteer Task</h5></a></li>
                            <li><a id="assign_role_li" class="li-background-color" href="#"><h5>Assign roles</h5></a></li>   
                        </ul>
                    
                </div><!--/posts-->
            </div>
            <!--=== Role Assignment section ===-->
            <div class="span9 center-page">
                <div id="assign_role">
                    <form class="role-page " method="POST" action="page_admin_process.php">
                        <h3>Assign role for User</h3>
                            
                            <div class="controls">
                                <?php
                                    if ($_GET["status"] == "success")
                                    { 
                                      echo '<span class="alert-success"> Successfully assigned ' .$_GET["roleName"].' role to '.$_GET["userName"] .'.</span>';
                                    } 
                                    if ($_GET["status"] == "selected")
                                    { 
                                      echo '<span class="alert-error"> Please select a valid username and role.</span>';
                                    } 
                                    if($_GET["page"] == "success")
                                      {
                                        echo '<hidden type="text" name="page" id="page" value="Test">';
                                      }
                                ?>
                          </div>

                            <div class="controls">    
                                <label>User Name</label>
                                <?php
                                   //This file contains logic to establish DB connection 
                                   //and define the connection string
                                   include('include/db_connection.php');
                                   //Get all the User names from User Table
                                   $query = getUserNameID();
                                   $result = mysqli_query($dbConnect,$query);
                                   //Display user dropdown box with all the usernames
                                   echo '<select class="input-xlarge" name="userID" id="userID" class="span12" >';
                                   echo '<option value = "userName" selected = "selected">Select a user</option>';
                                   while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value = '" . $row['userID'] ."'>" . $row['userName']."</option>";
                                        
                                    }
                                   echo '</select>';
                                    
                                    //Get all the Roles from the Role Table
                                    echo '<label>Role</label>';
                                    echo '<select class="input-xlarge" name="roleID" id="roleID" class="span12" >';
                                    echo '<option value = "role" selected = "selected">Select Role </option>';
                                    $query = getRoleNameID();
                                    $result = mysqli_query($dbConnect, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value = '" .$row['roleID'] ."'>" . $row['roleName']."</option>";
                                        
                                    }

                                    
                                    echo '</select>';
                                  closeConnection($dbconnect); 
                                ?>
                            </div>
                        
                            <div class="controls form-inline">
                                <button class="btn-u pull-right " type="submit">Assign</button> 
                            </div>

                            
                     </form>
                </div><!--Assign Role-->
                
                <!--change_password -->
                <div id="change_password">
                    <form  method = "POST" action="page_passwordChange_process.php" class="change-pass">
                        <h3>Change your password</h3>    
                        <!--<div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input class="input-xlarge" type="text" id = "emailID" name= "emailID" placeholder="Email ID">
                        </div>-->
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span>
                            <input class="input-xlarge" type="password" id="password" name="password" placeholder="new password">
                        </div>
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span>
                            <input class="input-xlarge" type="password" id="password2" name="password2" placeholder="Confirm password">
                        </div>
                        
                        <div class="controls form-inline">
                            <button class="btn-u pull-right" type="submit">Change</button>
                        </div>
                        
                        <div class="controls">
                         <?php 
                            
                            
                            if ($_GET["status"] == "passwordmismatch")
                            { 
                                echo "<span class='alert-error'> Both the passwords are not matching </span>";
                            }
                            if ($_GET["status"] == "success")
                            { 
                                echo "<span class='alert-success'> Successfully chaned your password. </span>";
                            }
                            if($_GET['status'] == "empty")
                            {
                                echo "<span class='alert-error'> Both the fields are required. </span>";
                            }
                        ?>
                    </div>
                    </form>
                </div> <!-- change_password-->

                <!-- request_history -->
                <div id="request_history">
                    <table class="table table-bordered">
                        <tr class="thead">
                            <th class="span2">#</th>
                            <th class="span2">Request</th>
                            <th class="span2">Request Date</th>
                            <th class="span2">Resposible person</th>
                            <th class="span2">Your Comment</th>
                        </tr>
                            <td>1</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                        <tr class="tbody">
                            <td>2</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                            <td>Test Date</td>
                        </tr>

                    </table>
                </div> <!-- request_history -->

                <!-- User Profile -->
                <div id="profile">
                    <form  method = "POST" action="page_user_profile_process.php" class="form-horizontal">
                        <p id="errorMessage" class='alert-error'>  </p>

                        <?php
                            $userProfile = array();
                            $userProfile = getUserProfile($_SESSION['sewafs_user_userID']);

                            //var_dump($userProfile);
                        
                        //<!--<h3>Change your password</h3> -->   
                        echo '<div class="control-group">';
                            echo '<label class="control-label">First Name</label>';
                            echo '<input class="controls input-xlarge" type="text" id = "firstName" name= "firstName" value="'.$userProfile['firstName'].'">';
                        echo '</div>';

                        echo '<div class="control-group">';
                            echo '<label class="control-label">Last Name</label>';
                            echo '<input class="controls input-xlarge" type="text" id = "lastName" name= "lastName" value="'.$userProfile['lastName'].'">';
                        echo '</div>';

                        echo '<div class="control-group">';
                            echo '<label class="control-label">User Name</label>';
                            echo '<input class="controls input-xlarge" type="text" id = "userName" name= "userName" placeholder="How you want to show your name on site" value="'.$_SESSION['sewafs_user_userName'].'">';
                        echo '</div>';

                        echo '<div class="control-group">';
                            echo '<label class="control-label">Address1</label>';
                            echo '<input class="controls input-xlarge" type="text" id = "address1" name= "address1" value="'.$userProfile['address1'].'">';
                        echo '</div>';
                        echo '<div class="control-group">';
                            echo '<label class="control-label">Address2</label>';
                            echo '<input class="controls input-xlarge" type="text" id = "address2" name= "address2" value="'.$userProfile['address2'].'">';
                        echo '</div>';
                        echo '<div class="control-group">';
                            echo '<label class="control-label">City</label>';
                            echo '<input class="controls input-xlarge" type="text" id = "city" name= "city" value="'.$userProfile['city'].'">';
                        echo '</div>';

                        echo '<div class="control-group">';
                            echo '<label class="control-label">State</label>';
                            echo '<input class="controls input-xlarge" type="text" id = "state" name= "state" value="'.$userProfile['state'].'">';
                        echo '</div>';

                        echo '<div class="control-group">';
                            echo '<label  class="control-label">Zipcode</label>';
                            echo '<input id="zipcode" class="controls input-xlarge" type="text" id = "zipcode" name= "zipcode" placeholder="95134" value="'.$userProfile['zipcode'].'">';
                            
                        echo '</div>';

                        echo '<div class="control-group">';
                           echo ' <label class="control-label">Phone Number</label>';
                            echo '<input id="phoneNumber" class="controls input-xlarge" type="text" id = "phoneNumber" name= "phoneNumber" placeholder="203-123-1234" value="'.$userProfile['phoneNumber'].'">';
                            
                        echo '</div>';
                        ?>
                        <div class="control-group">
                            
                            <button id="submitButton" class="controls btn-u pull-right" type="submit">Save</button>
                        </div>
                        <?php

                            if($_GET['status'] == 'success')
                            {
                                echo '<span class="alert-success"> Your profile information is successfully saved.</span>';
                            }
                        ?>
                    </form>
                </div> <!-- User Profile -->

                <div id="volunteer">
                    <span><h4>Volunteer profile change - will design it after the volunteer form is done</h4></span>
                    <span><h4>Volunteer assigned task list</h4></span>
                    

                </div>

            </div> <!-- Span9-->
            
    </div> <!-- row fluid -->

</div> <!-- container -->  
<!-- End Content Part -->


<?php
include("page_footer.php");
include("copyright.php");
include("js.php");
?>
<script type="text/javascript" src="assets/js/validation/validate.js"></script>
<script type="text/javascript">
    
      //Zipcode validation
      $("#zipcode").keyup(function(){
        var postalCodeRegex = /^([0-9]{5})(?:[-\s]*([0-9]{4}))?$/;
        var value = $("#zipcode").val().trim();
        //alert("zipcode keyup");
        if($("#phoneNumber").val().trim() == "")
        {
            if(value != "" && !postalCodeRegex.test(value))
            {
                //alert("inside if");
                $("#errorMessage").html("Please provide a valid zipcode (Ex: 95035) or city name");
                $("#submitButton").attr("disabled", "disabled");
            }
            else
            {
                //alert("inside else");
                $("#errorMessage").html("");
                $("#submitButton").removeAttr("disabled");
            }
        }
        else
        {
            testZipcodePhoneNumber();
        }
    });
 
  //Phone number validation
    $("#phoneNumber").keyup(function(){
        var value = $("#phoneNumber").val().trim();
        var zipcode = $("#zipcode").val().trim();
        //alert(value);
        var phoneNumberRegex = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;
        if(zipcode == "")
        {
            if(value != "" && !phoneNumberRegex.test(value))
            {
                $("#errorMessage").html("Please provide a valid phoneNumber (Ex: 203-123-1234) ");
                $("#submitButton").attr("disabled", "disabled");
            }
            else
            {
                $("#errorMessage").html("");
                $("#submitButton").removeAttr("disabled");
            }
       }
       else
       {
         testZipcodePhoneNumber();
       }
    });

    /*function validZipcode(value)
    {
        //alert("inside validate");

        var postalCodeRegex = /^([0-9]{5})(?:[-\s]*([0-9]{4}))?$/;

        if(postalCodeRegex.test(value))
        {
            return true;
        }
        return false;
        
    }

    function validPhoneNumber(phoneNumber)
    {
        var phoneNumberRegex = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;

        if(phoneNumberRegex.test(phoneNumber))
        {
            return true;
        }
        return false;
    }*/
     
    // Validate both when user types something in both the fields
    function testZipcodePhoneNumber()
    {

        var zipcode = $("#zipcode").val().trim();
        var phoneNumber = $("#phoneNumber").val().trim();
        //alert(zipcode);
        if(zipcode != "" && phoneNumber != "")
        {
            if(validZipcode(zipcode) && validPhoneNumber(phoneNumber))
            {
                $("#errorMessage").html("");
                $("#submitButton").removeAttr("disabled");
            }
            else
            {
                $("#errorMessage").html("Please provide a valid phoneNumber (Ex: 203-123-1234) and zipcode (Ex:95134)");
                $("#submitButton").attr("disabled", "disabled");
            }
        }

    }

    //testZipcodePhoneNumber();
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var role = $("#activeUser").text().trim();
        var page = $("#page").val();
        alert(page);
        //var roleStr = testRole.toString();
        //alert(roleStr);
        //var role='Guest';
        /*if(testRole == 'Guest')
        {
                //alert("Inside if");
                $("#request_history_li").hide();
                $("#assign_role_li").hide();
                $("#volunteer_li").hide();
                $("#profile_li").show();
                $("#change_password_li").show();

        }*/
        //role='Guest';
        //m.http://www.amazon.com/Disney-Pixar-Cars-Insulated-Lunch/dp/B00DTXDNZE/ref=sr_1_5?ie=UTF8&qid=1377104033&sr=8-5&keywords=disney+cars+lunch+/*http://www.amazon.com/Disney-Pixar-Cars-Insulated-Lunch/dp/B00DTXDNZE/ref=sr_1_5?ie=UTF8&qid=1377104033&sr=8-5&keywords=disney+cars+lunch+baghttp://www.amazon.com/Disney-Pixar-Cars-Insulated-Lunch/dp/B00DTXDNZE/ref=sr_1_5?ie=UTF8&qid=1377104033&sr=8-5&keywords=disney+cars+lunch+b*/
        
      //User Role Visibility
        switch(role)
        {
            case 'Guest':
                $("#request_history_li").hide();
                $("#assign_role_li").hide();
                $("#volunteer_li").hide();
                $("#profile_li").show();
                $("#change_password_li").show();
                break;
            case 'Family':
                $("#request_history_li").show();
                $("#assign_role_li").hide();
                $("#volunteer_li").hide();
                $("#profile_li").show();
                $("#change_password_li").show();
                break;
            case 'Volunteer':
                $("#request_history_li").hide();
                $("#assign_role_li").hide();
                $("#volunteer_li").show();
                $("#profile_li").show();
                $("#change_password_li").show();
                break;
            case 'Admin':
                $("#request_history_li").show();
                $("#assign_role_li").show();
                $("#volunteer_li").show();
                $("#profile_li").show();
                $("#change_password_li").show();
                break;

        }
        


    });
</script>

<script type="text/javascript">
    $("#assign_role").hide();
    $("#change_password").hide();
    $("#request_history").hide();
    $("#volunteer").hide();
    //$("#profile").hide();

    $("#assign_role_li").click(function(){
        $("#change_password").hide();
        $("#request_history").hide();
        $("#profile").hide();
        $("#volunteer").hide();
        $("#assign_role").show();

    });

    $("#change_password_li").click(function(){
        $("#assign_role").hide();
        $("#volunteer").hide();
        $("#request_history").hide();
        $("#profile").hide();
        $("#change_password").show();
    });

    $("#profile_li").click(function(){
        $("#assign_role").hide();
        $("#volunteer").hide();
        $("#request_history").hide();
        $("#change_password").hide();
        $("#profile").show();
    });

    $("#request_history_li").click(function(){
        $("#assign_role").hide();
        $("#volunteer").hide();
        $("#change_password").hide();
        $("#profile").hide();
        $("#request_history").show();
    });

    $("#volunteer_li").click(function(){
        $("#assign_role").hide();
        $("#change_password").hide();
        $("#profile").hide();
        $("#request_history").hide();
        $("#volunteer").show();
    });
</script>


</body>
</html>