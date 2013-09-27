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
            <form class="span9">
                    
                  <div class="headline"><h4>Contact Information</h4> </div>
                  <div class="vol-page">
                  <table >
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
                            <input class="input-medium" type="text" id = "lastname" name= "lastname" placeholder="Last Name">
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
                </div>
                <div class="headline"><h4>Interests : </h4> </div>
                <div class="vol-page">
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


                </div>

                <div class="headline"><h4>Volunteer Availability : </h4> </div>
                 <div class="vol-page">
                    <table >
                        <tr>
                        
                        <td class="tdspace tdtop">
                            <label for="timeavailability"> Days : </label>
                        </td>
                        <td class="tdrightspace">
                            
                            <label class="checkbox"><input type="checkbox" /> Sundays</label>
                            <label class="checkbox"><input type="checkbox" /> Mondays</label>
                            <label class="checkbox"><input type="checkbox" /> Tuesdays</label>
                            <label class="checkbox"><input type="checkbox" /> Wednesdays</label>
                            <label class="checkbox"><input type="checkbox" /> Thursdays</label>
                            <label class="checkbox"><input type="checkbox" /> Fridays</label>
                            <label class="checkbox"><input type="checkbox" /> Saturdays</label>

                        </td>
                        <td class="tdspace tdtop tdverline">
                            <label for="timeavailability"> Time : </label>
                        </td>
                        <td>
                            <label class="checkbox"><input type="checkbox" />  Any Time </label>
                            <label class="checkbox"><input type="checkbox" />  Mornings (9am to 12pm)</label>
                            <label class="checkbox"><input type="checkbox" />  Afternoons (12pm to 4pm)</label>
                            <label class="checkbox"><input type="checkbox" />  Evenings (4pm to 8pm)</label>
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
                            <label>Gender </label> 
                        </td>
                        <td>
                            <br>
                            <input type="radio" name="male" value="Male"> Male
                            <input type="radio" name="female" value="Female" > Female<br><br>
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
                        <td class="tdspace ">
                            <label for="id_comments">Special Skills : </label>
                        </td>
                        <td>
                            <textarea id="comments" rows="3" cols="40" colspan="2" name="comments"></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td class="tdspace ">
                            <label for="id_comments">Previous Experience : </label>
                        </td>
                        <td>
                            <textarea id="comments" rows="3" cols="40" colspan="2" name="comments"></textarea>
                        </td>
                      </tr>
                      <tr>
                        
                        <td class="tdspace tdtop">
                            <label for="timeavailability"> How did you Hear about us : </label>
                        </td>
                        <td class="tdrightspace">
                            
                            <label class="checkbox"><input type="checkbox" /> sewafs.org</label>
                            <label class="checkbox"><input type="checkbox" /> Friends</label>
                            <label class="checkbox"><input type="checkbox" />  Radio/Newspaper/Flyer</label>
                            <label class="checkbox"><input type="checkbox" /> Sewa Volunteer</label>
                            <label class="checkbox"><input type="checkbox" />  Internet Site</label>
                            <label class="checkbox"><input type="checkbox" /> Another Organization</label>
                             <table>
                            <tr>
                             <td><label class="checkbox "><input type="checkbox" /> Other :</label><td/>
                            <td>  <input class="input-medium" type="text" id = "otherTime" name= "otherTime" ><td/>
                            <tr/>
                        </table>

                        </td>
                    </tr>
                    <tr>
                        <td class="tdspace ">
                            <label for="id_comments">Other Comments : </label>
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
                            <th colspan="2">Contact1</th>
                            <th colspan="2">Contact2</th>
                        </tr>
                        <tr>
                            <td class="tdspace ">
                                <label> Name : </label> 
                            </td>
                            <td class="tdrightspace">
                                <br>
                                <input type="text" name="emergencyContactName1" id="emergencyContactName1" > 
                            </td>
                            <td class="tdspace tdright tdverline ">
                                <label> Name : </label> 
                            </td>
                            <td>
                                <br>
                                <input type="text" name="emergencyContactName1" id="emergencyContactName1" > 
                            </td>
                          </tr>
                           <tr>
                            <td class="tdspace ">
                                <label> Phone Number : </label> 
                            </td>
                            <td class="tdrightspace">
                                <br>
                                <input type="text" name="emergencyContactName1" id="emergencyContactName1" > 
                            </td>
                            <td class="tdspace tdright tdverline ">
                                <label> Phone Number : </label> 
                            </td>
                            <td>
                                <br>
                                <input type="text" name="emergencyContactName1" id="emergencyContactName1" > 
                            </td>
                          </tr>
                           <tr>
                            <td class="tdspace ">
                                <label> Relationship : </label> 
                            </td>
                            <td class="tdrightspace">
                                <br>
                                <input type="text" name="emergencyContactName1" id="emergencyContactName1" > 
                            </td>
                            <td class="tdspace tdright tdverline ">
                                <label> Relationship : </label> 
                            </td>
                            <td>
                                <br>
                                <input type="text" name="emergencyContactName1" id="emergencyContactName1" > 
                            </td>
                          </tr>
                    </table>
                </div>
                <div class=" pull-right">
                   <label for="id_submit"></label>
                   <button class="btn-u btn-u-blue " type="submit">Register</button>
                   
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

</body>
</html>  