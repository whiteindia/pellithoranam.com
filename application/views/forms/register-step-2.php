    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>


<div class="col-md-9">
            <div class="wed-reg-right">
              <h1>PERSONAL INFORMATION</h1>
              <div class="wed-reg-div1">
                <h6>Personal Details</h6>
                <hr>
                <form method="post" action="<?php echo base_url();?>home/submit_registration_details" id="reg_detail_form" enctype="multipart/form-data">
                  <ul>
                    <li>
                      <div class="wed-reg-right-child1">Maritial Status</div>
              <!--        <div class="wed-reg-right-child2">
                        <div class="wed-custom5">
                            <input id="nm" type="radio" name="maritial_status" checked="checked" value="1">
                            <label for="nm">Never Married</label>
                            <input id="dvsd" type="radio" name="maritial_status" value="2">
                            <label for="dvsd">Divorced</label>
                            <input id="wd" type="radio" name="maritial_status" value="3">
                            <label for="wd">Widowed</label>
                            <input id="advsd" type="radio" name="maritial_status" value="4">
                            <label for="advsd">Awaiting for Divorce</label>
                        </div>
                      </div>-->
                      <div class="wed-reg-right-child2">
                           <div class="row1">
                             <select class="wed-reg-select" name="maritial_status" id="maritial_status">
                                <option value="0">Option</option>
                                <option value="1">Never Married</option>
                                <option value="2">Divorced</option>
                                <option value="3">Widowed</option>
                                <option value="4">Awaiting for Divorce</option>
                                                
                             </select>
                           </div>
                         </div>
                      <div class="clearfix"></div>
                    </li>
                   
                    <li>
                      <div class="wed-reg-right-child1 paddingtop10">Mother's Maden Name </div>
                      <div class="wed-reg-right-child2">
                          <div class="row1">
                            <span><input class="wed-reg-input12 reg_input" type="text" name="mothers_maiden_name" id="mothers_maiden_name"><small style="color:red; font-family: verdana;">[optional]</small></span>
                          </div>
                        </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="wed-reg-right-child1 paddingtop10">Sub Caste</div>
                      <div class="wed-reg-right-child2">
                          <div class="row1">
                            <span><input class="wed-reg-input12 reg_input" type="text" name="sub_caste" id="sub_caste"><small style="color:red; font-family: verdana;">[optional]</small></span>
                          </div>
                        </div>
                      <div class="clearfix"></div>
                    </li>
                  </ul>
              </div>
              
              
              <!-----step search functionality for city drop down-------->
              
              
              <!--step search functionality for city drop down end-->
              
              <div class="wed-reg-div1">
                <h6>Location Details</h6>
                <hr>
                <ul>
                  <li>
                    <div class="wed-reg-right-child1 paddingtop10">Country Living In</div>
                    <div class="wed-reg-right-child2">
                        <div class="row1">
                          <select class="wed-reg-select cst-select-1 cst-select-2" name="country" id="country_selector">
                            <option value="-1">Select</option>
                            <?php foreach($countries as $country) { ?>
                                <option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                   <input type="hidden" name="state" id="state" value="-1">
                   <input type="hidden" name="city" id="city" value="-1">
                  </li>
                  <li>
                    <div class="wed-reg-right-child1 paddingtop10">City Living In</div>
                    <div class="wed-reg-right-child2">
                        <div class="row1">
                          <select class="wed-reg-select cst-select-1 selectpicker" data-live-search="true"  name="city_choose"  id="city_selector">
                          </select>
                        </div>
                      </div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
              </div>
              <div class="wed-reg-div1">
                    <h6>Physical Attributes</h6>
                    <hr>
                    <ul>
                      <li>
                        <div class="wed-reg-right-child1 paddingtop10">Height</div>
                        <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span><select class="wed-reg-select1 reg_input" name="feet" id="height">
                                <option value="0"> Cms - Feet/inches </option>
                                <?php foreach($heights as $hgt) { ?>
                                    <option value="<?php echo $hgt->height_id; ?>"><?php echo $hgt->height; ?></option>
                                <?php } ?>
                              </select></span>
                            </div>
                          </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="wed-reg-right-child1 paddingtop10">Weight </div>
                        <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span><select class="wed-reg-select1 reg_input" name="weight" id="weight">
                                <option value="0"> - Kgs -</option>
                                <?php foreach($weights as $wgt) { ?>
                                    <option value="<?php echo $wgt->weight_id; ?>"><?php echo $wgt->weight; ?></option>
                                <?php } ?>
                              </select><small style="color:red; font-family: verdana;">[optional]</small></span>
                            </div>
                          </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="wed-reg-right-child1">Body Type </div>
                    <!--    <div class="wed-reg-right-child2">
                          <div class="wed-custom5">
                              <input id="slim" type="radio" name="body_type" checked="checked" value="1" required>
                              <label for="slim">Slim</label>
                              <input id="avg" type="radio" name="body_type" value="2">
                              <label for="avg">Average</label>
                              <input id="ath" type="radio" name="body_type" value="3">
                              <label for="ath">Athletic</label>
                              <input id="hvy" type="radio" name="body_type" value="4">
                              <label for="hvy">Heavy</label>
                          </div>
                        </div>-->
                        <div class="wed-reg-right-child2">
                           <div class="row1">
                             <select class="wed-reg-select" name="body_type" id="body_type">
                                <option value="0">Option</option>
                                <option value="1">Slim</option>
                                <option value="2">Average</option>
                                <option value="3">Athletic</option>
                                <option value="4">Heavy</option>
                                                
                             </select><small style="color:red; font-family: verdana;">[optional]</small>
                           </div>
                         </div>
                        <div class="clearfix"></div>
                      </li>

                      <li>
                        <div class="wed-reg-right-child1">Complexion </div>
                       <!--   <div class="wed-reg-right-child2">
                        <div class="wed-custom5">
                              <input id="vf" type="radio" name="complexion" checked="checked" value="1" required>
                              <label for="vf">Very Fair</label>
                              <input id="fair" type="radio" name="complexion" value="2">
                              <label for="fair">Fair</label>
                              <input id="wht" type="radio" name="complexion" value="3">
                              <label for="wht">Wheatish</label>
                              <input id="whtb" type="radio" name="complexion" value="4">
                              <label for="whtb">Wheatish Brown</label>
                              <input id="dsrk" type="radio" name="complexion" value="5">
                              <label for="dark">Dark</label>
                          </div>  
                        </div>-->
                        <div class="wed-reg-right-child2">
                           <div class="row1">
                             <select class="wed-reg-select" name="complexion" id="complexion">
                                <option value="0">Option</option>
                                <option value="1">Very Fair</option>
                                <option value="2">Fair</option>
                                <option value="3">Wheatish</option>
                                <option value="4">Wheatish Brown</option>
                                <option value="5">Dark</option>
                                                
                             </select><small style="color:red; font-family: verdana;">[optional]</small>
                           </div>
                         </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="wed-reg-right-child1">Physical Status</div>
                       <!-- <div class="wed-reg-right-child2">
                          <div class="wed-custom5">
                              <input id="nor" type="radio" name="physical_status" checked="checked" value="1" required>
                              <label for="nor">Normal</label>
                              <input id="phy" type="radio" name="physical_status" value="2">
                              <label for="phy">Physically Challenged</label>
                          </div>
                        </div>-->
                        <div class="wed-reg-right-child2">
                           <div class="row1">
                             <select class="wed-reg-select" name="physical_status" id="physical_status">
                                <option value="0">Option</option>
                                <option value="1">Normal</option>
                                <option value="2">Physically Challenged</option>
                                                          
                             </select>
                           </div>
                         </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                       <div class="wed-reg-right-child1 paddingtop10">Upload Profile Photo</div>
                       <div class="wed-reg-right-child2">

                           <div class="row1">
                           <div class="wed-reg-right-child1">Set Photo Privacy</div>
                           <p>Your Photo Privacy has been set to <br>"Visible only to members whom I had Contacted / Responded" </p>
                        <div class="wed-reg-right-child2">
                          <div class="wed-custom5">
                              <input id="nop" type="radio" name="profile_preference" checked="checked" value="0" required>
                              <label for="nop">Visible to all</label>
                              <input id="ds" type="radio" name="profile_preference" value="1">
                              <label for="ds">Visible only to members whom I had contacted / responded</label>

                          </div>
                        </div>
                                                  <!--image code-->
                       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<div>
    <img id="user_img"
        height="130"
        width="130"
        style="border:solid" />
</div>
   <!--image code-->
                             <span><input class="wed-reg-input12 reg_input" type="file" name="image" id="image" onchange="show(this)"></span>

                      
                             <script>
function show(input) {
        debugger;
        var validExtensions = ['jpg','png','jpeg']; //array of valid extensions
        var fileName = input.files[0].name;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        var FileSize = input.files[0].size / 1024 / 1024;
        if (FileSize > 5) {
          input.type = ''
            input.type = 'file'
            $('#user_img').attr('src',"");
            alert('File size exceeds 5 MB,Please choose another image size below 5 MB');
           // $(file).val(''); //for clearing with Jquery
        } else {

        }
        if ($.inArray(fileNameExt, validExtensions) == -1) {
            input.type = ''
            input.type = 'file'
            $('#user_img').attr('src',"");
            alert("Only these file types are accepted : "+validExtensions.join(', '));
        }
        else
        {
        if (input.files && input.files[0]) {
            var filerdr = new FileReader();
            filerdr.onload = function (e) {
                $('#user_img').attr('src', e.target.result);
            }
            filerdr.readAsDataURL(input.files[0]);
        }
        }
    }
    </script>
                           </div>
                      <!--     <h4>Set Privacy</h4>
              <p>Your Photo Privacy has been set to <br>"Visible only to members whom I had Contacted / Responded" </p>
              <div class="wed-photoprivacy" style="text-align: left;">
                        <input id="nm" name="profile_preference" type="radio" value="0">
                        <label for="nm">Visible to all</label><br/>
                        <input id="dvsd" name="profile_preference" type="radio" value="1">
                        <label for="dvsd">Visible only to members whom I had contacted / responded</label>
                       
                    </div>  -->
                           <small class="text-danger">** upload jpg,jpeg,png image only.profile picture will be displayed in your profile page once admin approve it </small>
                           <small class="text-danger">** use standard aspect ratio[ex 4:3 and 5:4.] of your profile picture for better display </small>
                           <small class="text-danger">** image size should not exceed 5MB size </small>
                           <small class="text-danger">** Please upload halfsize Photos only </small>
                         </div>
                       <div class="clearfix"></div>
                     </li>
                    </ul>
              </div>
              <div class="wed-reg-div1">
                    <h6>Education and Occupation</h6>
                    <hr>
                    <ul>
                      <li>
                        <div class="wed-reg-right-child1 paddingtop10">Highest Education</div>
                        <div class="wed-reg-right-child2">
                            <div class="row1">
                              <select class="wed-reg-select" name="education" id="education" required>
                                <option value="0">Select</option>
                                <?php foreach($educations as $education) { ?>
                                    <option value='<?php echo $education->education_id; ?>'><?php echo $education->education; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="wed-reg-right-child1 paddingtop10">Occupation</div>
                        <div class="wed-reg-right-child2">
                            <div class="row1">
                              <select class="wed-reg-select" name="occupation" id="occupation" required>
                                <option value="">Select Occupation</option>
                                <?php foreach($occupations as $occupat) { ?>
                                    <option value="<?php echo $occupat->occupation_id; ?>"><?php echo $occupat->occupation; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="wed-reg-right-child1">Employed In </div>
                    <!--    <div class="wed-reg-right-child2">
                          <div class="wed-custom5">
                              <input id="gov" type="radio" name="employed_in" checked="checked" value="1" required>
                              <label for="gov">Government</label>
                              <input id="prvt" type="radio" name="employed_in" value="2">
                              <label for="prvt">Private</label>
                              <input id="bus" type="radio" name="employed_in" value="3">
                              <label for="bus">Business</label>
                              <input id="self" type="radio" name="employed_in" value="4">
                              <label for="self">Self Employed</label>
                          </div>
                        </div>-->
                        <div class="wed-reg-right-child2">
                           <div class="row1">
                             <select class="wed-reg-select" name="employed_in" id="employed_in">
                                <option value="0">Option</option>
                                <option value="1">Government</option>
                                <option value="2">Private</option>
                                <option value="3">Business</option>
                                <option value="4">Self Employed</option>
                                                
                             </select><small style="color:red; font-family: verdana;">[optional]</small>
                           </div>
                         </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="wed-reg-right-child1">Income</div>
                        <div class="wed-reg-right-child2">
                          <div class="row1">
                            <span><select class="wed-reg-select1 cst-select-1" cst-attr="currency" cst-for="city" id="currency-selector" required name="country_currency">
                            <option value="">Select</option>
                              <?php foreach($currencies as $currency) { ?>
                                  <option value="<?php echo $currency->code; ?>"><?php echo $currency->code; ?></option>
                              <?php } ?>  
                              
                            </select></span>
                            <span><input id="income" type="number" name="income" placeholder="enter income" required></span>  <!-- class="wed-reg-input12"   -->
                            <div class="row1">
                              <div class="wed-custom5">
                            <!--   <input id="mon" type="radio" name="income_per"  value="1" required>
                               <label for="mon">Per Month</label> -->
                               <input id="yr" type="radio" name="income_per" value="2" checked="checked">
                               <label for="yr">Per Year</label>                        
                             </div>
                            </div>

                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
              </div>
              <div class="wed-reg-div1">
                    <h6>Habits</h6>
                    <hr>
                    <ul>
                      <li>
                        <div class="wed-reg-right-child1">Food</div>
                        <div class="wed-reg-right-child2">
                          <div class="wed-custom5">
                              <input id="veg" type="radio" name="food" checked="checked" value="1" required>
                              <label for="veg">Vegetarian</label>
                              <input id="nveg" type="radio" name="food" value="2">
                              <label for="nveg">Non Vegitarian</label>
                              <input id="egg" type="radio" name="food" value="3">
                              <label for="egg">Eggetarian</label>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="wed-reg-right-child1">Smoking</div>
                        <div class="wed-reg-right-child2">
                          <div class="wed-custom5">
                              <input id="no" type="radio" name="smoking" checked="checked" value="1" required>
                              <label for="no">No</label>
                              <input id="occ" type="radio" name="smoking" value="2">
                              <label for="occ">Occasionaly</label>
                              <input id="ys" type="radio" name="smoking" value="3">
                              <label for="ys">Yes</label>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="wed-reg-right-child1">Drinking</div>
                        <div class="wed-reg-right-child2">
                          <div class="wed-custom5">
                              <input id="nop" type="radio" name="drinking" checked="checked" value="1" required>
                              <label for="nop">No</label>
                              <input id="ds" type="radio" name="drinking" value="2">
                              <label for="ds">Drinks Socialy</label>
                              <input id="yp" type="radio" name="drinking" value="3"> 
                              <label for="yp">Yes</label>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
              </div>
              <!-- <h6>Astrological Info</h6>
              <hr> -->
              <div class="wed-reg-div1">
                <h6>Horoscope Details</h6>
                    <hr>
                <ul>
                  <li><p>You may not believe in Horoscope matching, yet we recomment that you fill in your astro Details
                     as a lot of Members would be interested in there details</p></li>
                     <li>
                       <div class="wed-reg-right-child1 paddingtop10">Gothram</div>
                       <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span><input class="wed-reg-input12 reg_input" type="text" name="gothram" id="gothram" required></span>
                          </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>
                     <li>
                       <div class="wed-reg-right-child1 paddingtop10">Star</div>
                       <div class="wed-reg-right-child2">
                           <div class="row1">
                             <select class="wed-reg-select" name="star" id="star">
                                <option value="0">Option</option>
                                <?php foreach($stars as $star) { ?>
                                    <option value="<?php echo $star->star_id; ?>"><?php echo $star->star_name; ?></option>
                                <?php } ?>                  
                             </select>
                           </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>
                     <li>
                       <div class="wed-reg-right-child1 paddingtop10">Padam</div>
                       <div class="wed-reg-right-child2">
                           <div class="row1">
                             <select class="wed-reg-select" name="padam" id="padam">
                                <option value="0">Option</option>
                                <option value="1 Padam">1 Padam</option>
                                <option value="2 Padam">2 Padam</option>
                                <option value="3 Padam">3 Padam</option>
                                <option value="4 Padam">4 Padam</option>
                                                
                             </select>
                           </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>
                     <li>
                       <div class="wed-reg-right-child1">Have Dosham?</div>
                       <div class="wed-reg-right-child2">
                         <div class="wed-custom5">
                             <input id="nm12" type="radio" name="dosham" value="1">
                             <label for="nm12">No</label>
                             <input id="dvsd12" type="radio" name="dosham" value="2">
                             <label for="dvsd12">Yes</label>
                             <input id="wd45" type="radio" name="dosham" value="3">
                             <label for="wd45">Don't Know</label>
                         </div>
                       </div>
                       <div class="clearfix"></div>
                     </li>
                     
                     
                     <li>
                       <div class="wed-reg-right-child1 paddingtop10">Upload horoscope</div>
                       <div class="wed-reg-right-child2">
                           <div class="row1">
                             <span><input class="wed-reg-input12 reg_input" type="file" name="horo_img" id="horo_img"><small style="color:red; font-family: verdana;">[optional]</small></span>
                           </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>
                </ul>
              </div>
              <div class="wed-reg-div1">
                    <h6>Family Profile</h6>
                    <hr>
                    <ul>
                <!--      <li>
                        <div class="wed-reg-right-child1">Family Status</div>
                        <div class="wed-reg-right-child2">
                          <div class="wed-custom5">
                              <input id="mid" type="radio" name="family_status"  value="1" required> <!--checked="checked"-->
                     <!--         <label for="mid">Middle Class</label>
                              <input id="up" type="radio" name="family_status" value="2">
                              <label for="up">Upper Middile Class</label>
                              <input id="rch" type="radio" name="family_status" value="3">
                              <label for="rch">Rich</label>
                              <input id="affl" type="radio" name="family_status" value="4">
                              <label for="affl">Affluent</label>
                              
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>   -->
                      <li>
                       <div class="wed-reg-right-child1 paddingtop10">Family Status</div>
                       <div class="wed-reg-right-child2">
                           <div class="row1">
                             <select class="wed-reg-select" name="family_status" id="family_status">
                                <option value="0">Option</option>
                                <option value="1">Middle Class</option>
                                <option value="2">Upper Middile Class</option>
                                <option value="3">Rich</option>
                                <option value="4">Affluent</option>
                                                
                             </select>
                           </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>


         <!--             <li>
                        <div class="wed-reg-right-child1">Family Type</div>
                        <div class="wed-reg-right-child2">
                          <div class="wed-custom5">
                              <input id="jo" type="radio" name="family_type" checked="checked" value="1" required>
                              <label for="jo">Joint</label>
                              <input id="nuc" type="radio" name="family_type" value="2">
                              <label for="nuc"> Nuclear</label>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>  -->

                      <li>
                       <div class="wed-reg-right-child1 paddingtop10">Family Type</div>
                       <div class="wed-reg-right-child2">
                           <div class="row1">
                             <select class="wed-reg-select" name="family_type" id="family_type">
                                <option value="0">Option</option>
                                <option value="1">Joint</option>
                                <option value="2">Nuclear</option>
                                                          
                             </select><small style="color:red; font-family: verdana;">[optional]</small>
                           </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>
              <!--       <li>
                        <div class="wed-reg-right-child1">Family Value</div>
                        <div class="wed-reg-right-child2">
                          <div class="wed-custom5">
                              <input id="ort" type="radio" name="family_value" checked="checked" value="1" required>
                              <label for="ort">Orthodox</label>

                              <input id="trad" type="radio" name="family_value" value="2">
                              <label for="trad">Traditional</label>

                              <input id="mod" type="radio" name="family_value" value="3">
                              <label for="mod">Moderate</label>

                              <input id="lib" type="radio" name="family_value" value="4">
                              <label for="lib">Liberal</label>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>  --->
                      
                      <li>
                       <div class="wed-reg-right-child1 paddingtop10">Family Value</div>
                       <div class="wed-reg-right-child2">
                           <div class="row1">
                             <select class="wed-reg-select" name="family_value" id="family_value">
                                <option value="0">Option</option>
                                <option value="1">Orthodox</option>
                                <option value="2">Traditional</option>
                                <option value="3">Moderate</option>
                                <option value="4">Liberal</option>
                                                
                             </select><small style="color:red; font-family: verdana;">[optional]</small>
                           </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>

                 <!--    <li>
                       <div class="wed-reg-right-child1 paddingtop10">Ancestral /Family Origin</div>
                       <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span>
                              <input type="text" class="wed-reg-input" name="family_origin" value="" required>
                              </span>
                          </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>-->
                     
                     <li>
                       <div class="wed-reg-right-child1 paddingtop10">Ancestral /Family Origin <small class="text-danger"> [Native place]</small></div>
                       <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span>
                              <input type="text" class="wed-reg-input" name="family_origin" id="family_origin" value="" required>
                              </span>
                          </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>

                     <li>
                       <div class="wed-reg-right-child1 paddingtop10"> Family Location</div>
                       <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span>
                              <input type="text" class="wed-reg-input" name="family_location" id="family_location" value="" required>
                              </span>
                          </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>
                     <li>
                       <div class="wed-reg-right-child1 paddingtop10">Father Name</div>
                       <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span><input class="wed-reg-input12 reg_input" type="text" name="father_status" id="father_status" required></span>
                          </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>



                     <li>
                       <div class="wed-reg-right-child1 paddingtop10">Mother Name</div>
                       <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span><input class="wed-reg-input12 reg_input" type="text" name="mother_status" id="mother_status" required></span>
                          </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>
                     <li>
                       <div class="wed-reg-right-child1 paddingtop10">place of birth</div>
                       <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span><input class="wed-reg-input12 reg_input" type="text" name="placeofbirth" id="placeofbirth" required></span>
                          </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>
                     <li>
                     
                       <div class="wed-reg-right-child1 paddingtop10">time of birth</div>
                       <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span><input class="wed-reg-input12 reg_input" type="time" name="timeofbirth" id="timeofbirth" required></span>
                          </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>





                     <li>
                       <div class="wed-reg-right-child1 paddingtop10">No: of brothers</div>
                       <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span> <input type="number" class="wed-reg-input" min="0" max="50" placeholder="No: of brothers" name="brothers" id="brothers" value="" required><small style="color:red; font-family: verdana;">[optional]</small></span>
                          </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>
                     <li>
                       <div class="wed-reg-right-child1 paddingtop10">No: of sisters</div>
                       <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span><input type="number" class="wed-reg-input" min="0" max="50" placeholder="No: of sisters" name="sisters"  id="sisters" value="" required><small style="color:red; font-family: verdana;">[optional]</small></span>
                          </div>
                         </div>
                       <div class="clearfix"></div>
                     </li>


                     <li>




                    </ul>
              </div>
              <div class="wed-reg-div1">
                    <h6>Something About You</h6>
                    <hr>
                    <ul>
                      <li>
                        <p>Write about your Personality, Family Background, Education, Proffession and Hobbies</p>
                        <textarea class="wed-reg-textarea" id="about" rows="10" cols="100" name="about_you" required></textarea>
                        <p>( Min. 75 Characters )</p>
                      </li>
                      <li>

                        <!-- ============Showing Error Message================== -->
                        <div id="error-msg"></div>
                        <!-- ============Showing Error Message================== -->
                        <!-- <a href="#" class="wed-scrollup"> -->
                           <button class="wed-submit-btn1 reg_detail" type="submit">Submit</button>
                       <!--  </a> -->
<small><?php if(isset($_SESSION['user_id'])) {//echo $_SESSION['user_id']; 
} ?></small>
                      </li>

                    
                    </ul>
              </div>
              </form>
            </div>
            <div>
            <span class="text-danger">if you are facing any problem in registration to start the regisatration process from first, click here </span>
            <a class="btn btn-sm btn-danger custom-btn" href="<?php echo site_url('home/remove_member/'.$_SESSION['user_id']); ?>" onClick="return doconfirm()" title="Delete profile completely">
                              <i class="fa fa-fw fa fa-power-off"></i></a>
            </div>
          </div>

          <style type="text/css">
            .error{
              color: red;
              margin: 0px 5px;
            }
          </style>