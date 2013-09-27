<?php 
   $page_title = "Volunteer Registration";
   include('page_header.php');
?>

<!--=== Content Part ===-->

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
            <form>
                <fieldset>
                  <legend> Contact Information </legend>
                  <table>
                      <tr>
                        <td >
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input class="input-medium" type="text" id = "firstname" name= "firstname" placeholder="First Name">
                            </div>
                        </td>
                        <td>
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input class="input-medium" type="text" id = "firstname" name= "firstname" placeholder="First Name">
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td >
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span>
                            <input class="input-medium" type="text" id = "email" name= "email" placeholder="Email ID">
                            </div>
                        </td>
                        <td>
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-phone"></i></span>
                            <input class="input-medium" type="text" id = "phoneno" name= "phoneno" placeholder="Phone Number">
                            </div>
                        </td>
                        <td>
                            <small>Eg: 111-111-1111</small>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-home"></i></span>
                            <select class="input-large" name="location" id="id_location" placeholder="Location">
                            <option value="" selected="selected">Select your location</option>
                            <option value="0">Bay Area, CA</option>
                            <option value="100">Boston, MA</option>
                            <option value="200">Houston, TX</option>
                            <option value="999">Other</option>
                            </select><br />
                            </div>
                        </td>
                        <td>
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-home"></i></span>
                            <input class="input-medium" type="text" id = "otherlocation" name= "otherlocation" placeholder="Other">
                            </div>
                        </td>
                      </tr>
                  </table>  
                </fieldset>
                <fieldset>
                    <legend> Interests </legend>
                    <table >
                        <tr>
                            
                            <td class="tdspace">
                                <label class="checkbox"><input type="checkbox" /> IT </label>
                            </td>

                            <td class="tdspace">
                                <label class="checkbox"><input type="checkbox" /> Program Analyst </label>
                            </td>

                            <td class="tdspace">
                                <label class="checkbox"><input type="checkbox" /> Program Analyst </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdspace">
                                <label class="checkbox"><input type="checkbox" /> Marketting </label>
                            </td>

                            <td class="tdspace">
                                <label class="checkbox"><input type="checkbox" /> Volunteer Relationship</label>
                            </td>
                        </tr>
                    </table>

                </fieldset>
                <fieldset>
                  <legend> Other Information </legend>
                  <table>
                      <tr>
                        <td class="tdspace tdright">
                            <label>Age Group </label> 
                        </td>
                        <td>
                            <select class="input-small" name="location" id="id_location" placeholder="Location">
                            <option value="" selected="selected">---</option>
                            <option value="0">Under 18</option>
                            <option value="100">18 - 25</option>
                            <option value="200">25 - 40</option>
                            <option value="999">Above 40</option>
                            </select><br />
                        </td>
                      </tr>
                      <tr>
                        <td class="tdspace tdright">
                            <label>Language Spoken</label>
                        </td>
                        <td class="tdspace">
                            <select class="input-small" name="language" id="language" >
                            <option value="" selected="selected">---</option>
                            <option value="0">Spanish</option>
                            <option value="100">Chinese</option>
                            <option value="200">Hindi</option>
                            <option value="999">Other</option>
                            </select><br />
                        </td>
                        <td>
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-globe"></i></span>
                            <input class="input-medium" type="text" id = "otherlanguage" name= "otherlanguage" placeholder="Other">
                            </div>
                        </td>
                      </tr>
                  </table>
                  <table>
                      <tr>
                        <td class="tdspace tdright">
                            <label for="id_comments">Other Comments</label>
                        </td>
                        <td>
                            <textarea id="comments" rows="3" cols="40" colspan="2" name="comments"></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td class="tdspace tdright">
                            <label for="timeavailability">Time availability</label>
                        </td>
                        <td>
                            <label class="checkbox"><input type="checkbox" /> Week ends</label>
                            <label class="checkbox"><input type="checkbox" /> Week Days</label>
                            <label class="checkbox"><input type="checkbox" /> Specific Events</label>
                            <label class="checkbox"><input type="checkbox" /> On call</label>

                        </td>
                      </tr>
                  </table>  
                </fieldset>

                <p>
                   <label for="id_submit"></label>
                   <button class="btn-u btn-u-blue " type="submit">Submit</button>
                   <button class="btn-u btn-u-blue" type="reset" >Reset </button>
                </p>
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
            
            <!-- Why Choose Us -->
            <div class="who margin-bottom-30">
                <div class="headline"><h3>FaceBook Widget</h3></div>
                <p>Pellentesque fermentum, Vivamus imperdiet condimentum diam, eget placerat felis consectetur id.</p>
                <ul class="unstyled">
                    <li><a href="#"><i class="icon-desktop"></i>Vivamus imperdiet condimentum</a></li>
                    <li><a href="#"><i class="icon-bullhorn"></i>Anim pariatur cliche squid</a></li>
                    <li><a href="#"><i class="icon-globe"></i>Eget placerat felis consectetur</a></li>
                    <li><a href="#"><i class="icon-group"></i>Condimentum diam eget placerat</a></li>
                </ul>
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