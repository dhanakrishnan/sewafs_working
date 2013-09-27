<?php 
  require_once("include/session.php");
  require_once("include/queries.php");
  $page_title = "Admin page";
  include("page_header.php");
?>
<!--=== Content Part ===-->
<div class="body">
	<div class="breadcrumbs margin-bottom-50">
    	<div class="container">
            <h1 class="color-green pull-left">Admin</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                <li class="active">Admin</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

	<div class="container">		
		<div class="row-fluid margin-bottom-10">
        	<form class="reg-page" method="POST" action="page_admin_process.php">
            	<h3>Assign role for User</h3>
                <div class="controls">    
                    <label>User Name</label>
                    <?php
                       //This file contains logic to establish DB connection 
                       //and define the connection string
                       include('dbconnection.php');
                       //Get all the User names from User Table
                       $query = getUserNameID();
                       $result = mysqli_query($con,$query);
                       //Display user dropdown box with all the usernames
                       echo '<select name="userID" id="userID" class="span12" >';
                       echo '<option value = "userName" selected = "selected">Select a user</option>';
                       while ($row = mysqli_fetch_array($result)) {
                            echo "<option value = '" . $row['userID'] ."'>" . $row['firstName'] . " " . $row['lastName']."</option>";
                        }
                       echo '</select>';
                        
                        //Get all the Roles from the Role Table
                        echo '<label>Role</label>';
                        echo '<select name="roleID" id="roleID" class="span12" >';
                        echo '<option value = "role" selected = "selected">Select Role </option>';
                        $query = getRoleNameID();
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value = '" .$row['roleID'] ."'>" . $row['roleName']."</option>";
                        }
                        
                        echo '</select>';
                      mysqli_close($con);  
                    ?>
                </div>
                
        			<div class="controls form-inline">
                  <button class="btn-u pull-right " type="submit">Register</button> 
              </div>

              <?php
                if ($_GET["status"] == "success")
                { 
                  echo '<h5 class="error"> Successfully assigned the role.</h5>';
                } 
                if ($_GET["status"] == "selected")
                { 
                  echo '<p class="error"> Please select a valid username and role.</p>';
                } 
              ?>
        	 </form>
        </div><!--/row-fluid-->
	</div><!--/container-->		
</div><!--/body-->
<!--=== End Content Part ===-->

<?php 
include("page_footer.php");
?>