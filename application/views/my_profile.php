<?php set_time_limit(0); ?>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<?php  $session=$this->session->userdata('logged_in');

 ?>

    <!-- PROFILE-BANNER -->

    <div class="wed-profile-banner">
      <div class="container-fluid">
        <div class="banner-left-red"></div>
        <div class="banner-left-white"></div>
        <div class="container container-custom">
          <div class="wed-profile-banner-left">
            <div class="wed-profile-50" style="border-right:1px solid #df7085;">
              <div class="wed-profile-head">
                  <?php if($profile->profile_photo==null){?>
                  <img src="<?php echo base_url(); ?>assets/img/user.jpg">
                  <?php }else{?>
                <img src="<?php echo base_url().$profile->profile_photo; ?>">
                <?php } ?>
              </div>
              <h3><?php echo $profile->profile_name;?></h3>
              <p>Profile created for <?php echo $profile->profile_for;?></p>
            </div>
            <form method="post" id="mob_form">
            <div class="wed-profile-501">
              <p><?php echo $profile->age; ?> Yrs &nbsp;&nbsp;<?php echo $profile->height; ?><br>
                <?php echo $profile->religion_name.", ".$profile->caste_name.",".$profile->sub_caste; ?><br>
                <?php echo $profile->city_name.", ".$profile->state_name.",".$profile->country_name; ?><br>
                <?php echo $profile->occupation; ?><br>
                <br>
                <div class="edit-phone-form" style="display: none;">
                  <div>
                    <span class="country_codes">
                      <input class="wed-reg-input" type="text" name="phone_countrycode" id="mobile-number" value="<?php echo $profile->phone_countrycode; ?>">
                    </span>
                    <span class="phone_input">
                    <input type='text' id='prof_mob_input' class='wed-navbar-input' value='<?php echo $profile->phone; ?>' name="phone" readonly>
                    </span>
                    <div class="clearfix"></div>
                  </div>
                  <?php if($membershipinfo->alt_mobile==1): ?>
                  <div>
                    <span class="country_codes">
                      <input class="wed-reg-input" type="text" name="alt_mobile_country_code" id="alt-mobile-number"  value="<?php echo $profile->alt_mobile_country_code; ?>" readonly>
                    </span>
                    <span class="phone_input">
                    <input type='text' id='prof_mob_input' class='wed-navbar-input' value='<?php echo $profile->alt_mobile_no; ?>' name="alt_mobile_no">
                    </span>
                  <div class="clearfix"></div>
                  </div>
                  <?php endif;?>
                  
                  
                </div>
                

                <span class="prof_mob_text"><?php echo $profile->phone_countrycode."- ".$profile->phone; ?></span>
                
                <span id="prof_mob_edit">
                    <img src="<?php echo base_url(); ?>assets/img/edit.png">
                    <button type='submit' id='prof_mob_btn' class='wed-go' style="display: none;">Save</button>
                </span>
                <?php if($membershipinfo->alt_mobile==1): ?>
                <br>
                <span class="prof_mob_text">Alternative No : <?php 
                if($profile->alt_mobile_no!=""){echo $profile->alt_mobile_country_code."- ".$profile->alt_mobile_no;}else{ echo "-";}?></span>
                <?php endif;?>

              </p>
            </div>
            </form>
            <div class="clearfix"></div>
          </div>
          <div class="wed-profile-banner-right">
            <div class="wed-profile-banner-right-50">
              <p>How your profile looks<br> to others</p>
              <a href="<?php echo base_url()?>profile/profile_details/<?php echo $profile->matrimony_id;?>"><button class="wed-preview-btn">Preview Profile</button></a>
              <p><a href="<?php echo base_url();?>profile/partner_preference" class="custom_a"><span><img src="<?php echo base_url(); ?>assets/img/add1.png"></span>Add Partner Preferences</a></p>
            </div>
            <div class="wed-profile-banner-right-50">
              <div class="c100 p<?php echo round($profile_complete);?> center">
                      <span>
					  <div class="wed_progress_circle">
					  <?php echo round($profile_complete);?>%<br>
                        Completed
						</div>
                      </span>
                      <div class="slice">
                          <div class="bar"></div>
                          <div class="fill"></div>
                      </div>
                  </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

    </div>

    <!-- PROFILE-DETAILS -->

    <div class="wed-profile-details">
      <div class="container container-custom">
        <div class="wed-row">
          <h5>Personal Information</h5>
          <ul>
              <li class="wed-detail-left border-right1">
                <form method="post" id="about_form">
                <div class="wed-detail-head">
                  <?php  if($profile->profile_for =='myself'){?>
                  <h5>A few words about <?php echo $profile->profile_name;?></h5>
                  <?php }else{ ?>
                   <h5>A few words about my <?php echo $profile->profile_for;?></h5>
                  <?php }?>
                  <div class="wed-detail-edit btn2" id="prof_pers_edit">
                    edit
                  </div>

                  <!--   <form class="reply-form" style="display:none;">
                      <input />
                      <input type="submit" value="submit"/>
                  </form> -->
                  <br/><textarea class="wed-reg-textarea" rows="4" cols="50" style="display: none;" id="prof_pers_text" name="about_you"><?php echo $profile->about_you;?></textarea>
                  <div class="wed-detail-edit no_backurl">
                   <button type='submit' id='prof_pers_btn' class='wed-go' style="display: none;">Save</button>
                  </div>
                  
                  <div class="clearfix"></div>
                </div>
                </form>
                <p class="about_u" id="about_u"> <?php echo $profile->about_you;?>
                </p>
            </li>
            <li class="wed-detail-left">
              <div class="wed-patner-preference">
                <a href="<?php echo base_url();?>profile/partner_preference" class="custom_a">
                <div class="wed-add-patner-preference">
                  Add Partner Preferences
                </a>
                </div>
                <!-- <div class="wed-add-patner-horrorscope">
                  Add Horoscope
                </div> -->
              </div>
            </li>
            <div class="clearfix"></div>
          </ul>

          </div>

          <!-- BASIC-DETAILS -->

          <div class="wed-row">
            <ul id="basic_details_ul">
                <li class="wed-detail-left border-right1">
                  <div class="wed-detail-head">
                    <h5>Basic Details</h5>
                    <div class="wed-detail-edit" id="prof_basic_edit_btn">
                      edit
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <ul class="wed-inside-detail" id="prof_basic_ul">
                    <li>
                      <div class="child1">
                        Profile created for
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                       <?php if($profile->profile_for) { 
          					   echo ucwords($profile->profile_for);
          					    } else {?> - <?php } ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Body Type / Complexion
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php if($profile->body_type == 1) { $bt = "Slim"; }
                         else if($profile->body_type == 2) { $bt = "Average"; }
                         else if($profile->body_type == 3) { $bt = "Athletic"; }
                         else { $bt = "Heavy"; } echo $bt." / ";
                              if($profile->complexion == 1) { $cm = "Very Fair"; }
                         else if($profile->complexion == 2) { $cm = "Fair"; }
                         else if($profile->complexion == 3) { $cm = "Wheatish"; }
                         else if($profile->complexion == 4) { $cm = "Wheatish Brown"; }
                         else { $cm = "Dark"; } echo $cm; ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Physical Status
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php
                          if($profile->physical_status == 1) {
                              $physical_status = "Normal";
                          } else {
                              $physical_status = "Physically Challenged";
                          }
                          echo $physical_status;
                          ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Weight
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                      <?php if($profile->weight) {
          					   echo $profile->weight;
          					    } else {?> - <?php } ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                      Marital Status
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                         <?php
                          if($profile->maritial_status == 1) {
                              $m_stat = "Never Married";
                          } else if($profile->maritial_status == 2) {
                              $m_stat = "Divorced";
                          } else if($profile->maritial_status == 3) {
                              $m_stat = "Widowed";
                          } else {
                              $m_stat = "Awaiting for Divorce";
                          }
                          echo $m_stat;
                          ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Drinking Habits
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                         <?php
                          if($profile->drinking == 1) {
                              $drink = "No";
                          } else if($profile->drinking == 2) {
                              $drink = "Drinks Socialy";
                          } else {
                              $drink = "Yes";
                          }
                          echo $drink;
                          ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                  </ul>
              </li>
              <li class="wed-detail-left">
                <div class="wed-space1">
                </div>
                <ul class="wed-inside-detail">
                  <li>
                    <div class="child1">
                      Name
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                     <?php if($profile->profile_name) {
          					  echo $profile->profile_name;
          					   } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Mothe's Maiden Name
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                     <?php if($profile->mothers_maiden_name) {
                    echo $profile->mothers_maiden_name;
                     } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Age
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                     <?php if($profile->age) {
          						$now = new DateTime();
                			$age = $now->diff(new DateTime($profile->dob));
                			$my_age = $age->format('%Y');
          					  echo $my_age;  } else {?> - <?php } ?> Yrs
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Height
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                     <?php if($profile->height) {
          					 echo $profile->height;
          					  } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Mother Tongue
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      <?php if($profile->mother_tongue_name) {
            					 echo ucwords($profile->mother_tongue_name);
            					 } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Eating Habits
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                          <?php
                          if($profile->eating == 1) {
                              $eat = "Vegetarian";
                          } else if($profile->eating == 2) {
                              $eat = "Non Vegitarian";
                          } else if($profile->eating == 3) {
                              $eat = "Eggetarian";
                          }
            						  else if($profile->eating == 0){
            							  $eat = "-";
            						  }
                          echo $eat;
                          ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Smoking Habits
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      <?php
                          if($profile->smoking == 1) {
                              $smoke = "No";
                          } else if($profile->smoking == 2) {
                              $smoke = "Occasionaly";
                          } else {
                              $smoke = "Yes";
                          }
                          echo $smoke;
                          ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>

          <!-- RELIGIOUS-INFORMATION -->

          <div class="wed-row">
            <ul id="prof_religion_ul">
                <li class="wed-detail-left border-right1">
                  <div class="wed-detail-head">
                    <h5>Religion Information</h5>
                    <div class="wed-detail-edit" id="prof_religion_edit_btn">
                      edit
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <ul class="wed-inside-detail">
                    <li>
                      <div class="child1">
                        Religion
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                       <?php if($profile->religion_name) {
          					   echo $profile->religion_name; 
          					    } else {?> - <?php } ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Caste / Division
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php if($profile->caste_name) {
            						echo $profile->caste_name; 
            						 } else {?> - <?php } ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Sub Caste
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php if($profile->sub_caste) {
              						echo $profile->sub_caste; 
              					} else {?> - <?php } ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                   <!--  <li>
                      <div class="child1">
                        Star / Raasi
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php echo $profile->star_name." / ".$profile->raasi_name; ?>
                      </div>
                      <div class="clearfix"></div>
                    </li> -->
                  </ul>
              </li>
              <li class="wed-detail-left">
                <div class="wed-detail-head">
                  <h5>Location</h5>
                  <div class="wed-detail-edit">
                  </div>
                  <div class="clearfix"></div>
                </div>
                <ul class="wed-inside-detail">
                  <li>
                    <div class="child1">
                      Country
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if($profile->country_name) {
        					  echo ucwords($profile->country_name);
        					   } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      State
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if($profile->state_name) {
        					  echo ucwords($profile->state_name);
        					   } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    City
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if($profile->city_name) {
            					echo ucwords($profile->city_name);
            				} else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Resident Status
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
          					<?php if($profile->resident_status) {
                      echo ucwords(str_replace("_"," ",$profile->resident_status));
          					} else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                   <?php if($profile->is_premium==1){?>
                  <li>
                    <div class="child1">
                      Parish
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
            					<?php if($profile->parish) {
                          echo ucwords(str_replace("_"," ",$profile->parish));
            					 } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Village
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
            					<?php if($profile->parish_village) {
            					  echo ucwords(str_replace("_"," ",$profile->parish_village));
            					} else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <?php } ?>
                </ul>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>

          <!-- PROFESSIONAL-INFORMATION -->

          <div class="wed-row">
            <ul id="prof_profnl_ul">
                <li class="wed-detail-left border-right1">
                  <div class="wed-detail-head">
                    <h5>Professional Information</h5>
                    <div class="wed-detail-edit" id="prof_profnl_edit_btn">
                      edit
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <ul class="wed-inside-detail">
                    <li>
                      <div class="child1">
                        Education
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php if($profile->education) {
            						echo ucwords($profile->education);
            						} else {?> - <?php } ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                   <?php /* <!--  <li>
                      <div class="child1">
                        College / Institution
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                         <?php if($profile->college) { 
              						echo ucwords($profile->college);
              						} else {?> - <?php } ?>
                      </div>
                      <div class="clearfix"></div>
                    </li> -->
                   <!--  <li>
                      <div class="child1">
                        Education in Detail
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                         <?php if($profile->education_detail) {  
            						echo ucwords($profile->education_detail);
            						} else {?> - <?php } ?>
                      </div>
                      <div class="clearfix"></div>
                    </li> --> */ ?>
                    <li>
                      <div class="child1">
                        Occupation
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                       <?php if($profile->occupation) {  
            						echo ucwords($profile->occupation);
            						} else {?> - <?php } ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                  </ul>
              </li>
              <li class="wed-detail-left">
                <div class="wed-space1">
                </div>
                <ul class="wed-inside-detail">
                  <li>
                    <div class="child1">
                      Occupation in Detail
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                       <?php if($profile->occupation_detail) {  
            					  echo ucwords($profile->occupation_detail);
            					  } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Employed in
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                     <?php if($profile->employed_in) {  
          					  echo ucwords($profile->employed_in);
          					  } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Annual Income
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      <?php 
                      if($profile->income) {  
					                 echo $profile->income." INR/ Annum";
					             }
                       else {?> - 
                      <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>

          <!-- FAMILY-DETAILS -->
          <!-- bordernone -->
          <div class="wed-row">
            <ul id="prof_family_ul">
                <li class="wed-detail-left border-right1">
                  <div class="wed-detail-head">
                    <h5>Family Details</h5>
                    <div class="wed-detail-edit" id="prof_family_edit_btn">
                      edit
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <ul class="wed-inside-detail">
                    <li>
                      <div class="child1">
                        Family Values
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php
                          if($profile->family_value == 1) {
                              $family_value = "Orthodox";
                          } else if($profile->family_value == 2) {
                              $family_value = "Traditional";
                          } else if($profile->family_value == 3) {
                              $family_value = "Moderate";
                          } else {
                              $family_value = "Liberal";
                          }
                          echo $family_value;
                          ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                      Family Type
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                      <?php
                          if($profile->family_type == 1) {
                              $family_type = "Joint";
                          } else {
                              $family_type = "Nuclear";
                          }
                          echo $family_type;
                      ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Family Status
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php
                          if($profile->family_status == 1) {
                              $family_status = "Middle Class";
                          } else if($profile->family_status == 2) {
                              $family_status = "Upper Middile Class";
                          } else if($profile->family_status == 3) {
                              $family_status = "Rich";
                          } else {
                              $family_status = "Affluent";
                          }
                          echo $family_status;
                          ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Ancestral /Family Origin
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                       <?php if($profile->family_origin) {  
            						echo ucwords($profile->family_origin);
            						} else {?> - <?php } ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Family Location
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                         <?php if($profile->family_location) {  
              						echo ucwords($profile->family_location);
              						} else {?> - <?php } ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                  </ul>
              </li>
              <li class="wed-detail-left">
                <div class="wed-space1">
                </div>
                <ul class="wed-inside-detail">
                  <li>
                    <div class="child1">
                      Father's Name
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                       <?php if($profile->father_status) {  
            					  echo ucwords($profile->father_status);
            					  } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Mother's Name
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      <?php if($profile->mother_status) {   
          					  echo ucwords($profile->mother_status);
          					   } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    No of Brother(s)
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                     <?php if($profile->brothers) {  
        					  echo ucwords($profile->brothers);
        					   } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    No of Sister(s)
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if($profile->sisters) {  
        					  echo ucwords($profile->sisters);
        					   } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>
        </div>
        <!-- <div class="wed-space"> -->
        </div>
      </div>

      <!--  Edit modal of Basic Details -->

      <ul id="prof_basic_edit" style="display: none;">
      <form method="post" id="edit_form">
       <li class="wed-detail-left border-right1">
        <div class="wed-detail-head">
         <h5>Basic Details</h5>
         <div class="wed-detail-edit no_backurl">
          <button type='submit' class="edit_form_btn wed-go">Save</button>
        </div>
        <div class="clearfix"></div>
      </div>
      <ul class="wed-inside-detail">
       <li>
        <div class="child1">
         Profile created for
       </div>
       <div class="child2">:
       </div>
       <div class="child3">
         <select class="wed-reg-input-select" data-parsley-trigger="change" name="profile_for" required>
          <option disabled>Select</option>
          <option value="myself" <?php if($profile->profile_for=="myself") echo "selected"; ?>>Myself</option>
          <option value="son" <?php if($profile->profile_for=="son") echo "selected"; ?>>Son</option>
          <option value="daughter" <?php if($profile->profile_for=="daughter") echo "selected"; ?>>Daughter</option>
          <option value="brother" <?php if($profile->profile_for=="brother") echo "selected"; ?>>Brother</option>
          <option value="sister" <?php if($profile->profile_for=="sister") echo "selected"; ?>>Sister</option>
          <option value="relative" <?php if($profile->profile_for=="relative") echo "selected"; ?>>Relative</option>
        </select>
      </div>
      <div class="clearfix"></div>
    </li>
    <li>
      <div class="child1">
       Body Type / Complexion
     </div>
     <div class="child2">:
     </div>
     <div class="child3">
       <select class="wed-reg-input-select" data-parsley-trigger="change" name="body_type">
        <option>Body Type</option>
        <option value="1" <?php if($profile->body_type=="1") echo "selected"; ?>>Slim</option>
        <option value="2" <?php if($profile->body_type=="2") echo "selected"; ?>>Average</option>
        <option value="3" <?php if($profile->body_type=="3") echo "selected"; ?>>Athletic</option>
        <option value="4" <?php if($profile->body_type=="4") echo "selected"; ?>>Heavy</option>
      </select>
      <select class="wed-reg-input-select" data-parsley-trigger="change" name="complexion">
        <option>Complexion</option>
        <option value="1" <?php if($profile->complexion=="1") echo "selected"; ?>>Very Fair</option>
        <option value="2" <?php if($profile->complexion=="2") echo "selected"; ?>>Fair</option>
        <option value="3" <?php if($profile->complexion=="3") echo "selected"; ?>>Wheatish</option>
        <option value="4" <?php if($profile->complexion=="4") echo "selected"; ?>>Wheatish Brow</option>
        <option value="5" <?php if($profile->complexion=="5") echo "selected"; ?>>Dark</option>
      </select>
    </div>
    <div class="clearfix"></div>
  </li>
  <li>
    <div class="child1">
     Physical Status
   </div>
   <div class="child2">:
   </div>
   <div class="child3">
     <select class="wed-reg-input-select" data-parsley-trigger="change" name="physical_status" required>
      <option>Select</option>
      <option value="1" <?php if($profile->physical_status=="1") echo "selected"; ?>>Normal</option>
      <option value="2" <?php if($profile->physical_status=="2") echo "selected"; ?>>Physically Challenged</option>
    </select>
  </div>
  <div class="clearfix"></div>
</li>
<li>
  <div class="child1">
   Weight
 </div>
 <div class="child2">:
 </div>
 <div class="child3">
   <select class="wed-reg-input-select" name="weight_id" data-parsley-trigger="change" name="weight_id" required>
    <option>- Select Weight -</option>
    <?php foreach($weights as $weightd) {
    if($profile->weight_id == $weightd->weight_id) { $attr1="selected"; } else { $attr1=""; }?>
    <option value="<?php echo $weightd->weight_id; ?>" <?php echo $attr1; ?>><?php echo $weightd->weight; ?></option>
    <?php } ?>
  </select>
</div>
<div class="clearfix"></div>
</li>
<li>
  <div class="child1">
   Marital Status
 </div>
 <div class="child2">:
 </div>
 <div class="child3">
   <select class="wed-reg-input-select" data-parsley-trigger="change" name="maritial_status" required>
    <option value="-1">Select</option>
    <option value="1" <?php if($profile->maritial_status=="1") echo "selected"; ?>>Never Married</option>
    <option value="2" <?php if($profile->maritial_status=="2") echo "selected"; ?>>Divorced</option>
    <option value="3" <?php if($profile->maritial_status=="3") echo "selected"; ?>>Widowed</option>
    <option value="4" <?php if($profile->maritial_status=="4") echo "selected"; ?>>Awaiting for Divorce</option>
  </select>
</div>
<div class="clearfix"></div>
</li>
<li>
  <div class="child1">
   Drinking Habits
 </div>
 <div class="child2">:
 </div>
 <div class="child3">
   <select class="wed-reg-input-select" data-parsley-trigger="change" name="drinking" required>
    <option>Select</option>
    <option value="1" <?php if($profile->drinking=="1") echo "selected"; ?>>No</option>
    <option value="2" <?php if($profile->drinking=="2") echo "selected"; ?>>Drinks Socialy</option>
    <option value="3" <?php if($profile->drinking=="3") echo "selected"; ?>>Yes</option>
  </select>
</div>
<div class="clearfix"></div>
</li>
</ul>
</li>
<li class="wed-detail-left">
  <div class="wed-space1">
  </div>
  <ul class="wed-inside-detail">
   <li>
    <div class="child1">
     Name
   </div>
   <div class="child2">:
   </div>
   <div class="child3">
     <input type="text" class="wed-reg-input" name="profile_name" value="<?php echo ucwords($profile->profile_name);?>">
   </div>
   <div class="clearfix"></div>
 </li>
   <li>
    <div class="child1">
     Mothe's Maiden Name 
   </div>
   <div class="child2">:
   </div>
   <div class="child3">
     <input type="text" class="wed-reg-input" name="mothers_maiden_name" value="<?php echo ucwords($profile->mothers_maiden_name);?>">
   </div>
   <div class="clearfix"></div>
 </li>
 <li>
  <div class="child1">
   DOB
 </div>
 <div class="child2">:
 </div>
 <div class="child3">
   <input class="wed-reg-input datepicker" name="dob" data-date-format="yyyy/mm/dd" value="<?php echo ucwords($profile->dob);?>">
 </div>
 <div class="clearfix"></div>
</li>
<li>
  <div class="child1">
   Height
 </div>
 <div class="child2">:
 </div>
 <div class="child3">
   <select class="wed-reg-input-select" data-parsley-trigger="change" name="height_id" required>
    <option value="-1">- Select Height -</option>
    <?php foreach($heights as $heightd) {
        if($profile->height_id == $heightd->height_id) { $attr="selected"; } else { $attr=""; }
      ?>
    <option value="<?php echo $heightd->height_id; ?>" <?php echo $attr; ?>><?php echo $heightd->height; ?></option>
    <?php } ?>
  </select>
</div>
<div class="clearfix"></div>
</li>
<li>
  <div class="child1">
   Mother Tongue
 </div>
 <div class="child2">:
 </div>
 <div class="child3">
   <select class="wed-reg-input-select" name="mother_language" data-parsley-trigger="change" required>
    <option disabled value="">- Select Mother Tongue -</option>
    <?php foreach($mother_tongue as $mthr_tng) {
      if($profile->mother_language == $mthr_tng->mother_tongue_id) { $attr2="selected"; } else { $attr2=""; }?>
    <option value="<?php echo $mthr_tng->mother_tongue_id; ?>" <?php echo $attr2; ?>><?php echo $mthr_tng->mother_tongue_name ?></option>
    <?php } ?>
  </select>
</div>
<div class="clearfix"></div>
</li>
<li>
  <div class="child1">
   Eating Habits
 </div>
 <div class="child2">:
 </div>
 <div class="child3">
   <select class="wed-reg-input-select" name="eating" data-parsley-trigger="change" required>
    <option disabled>Select</option>
    <option value="1" <?php if($profile->eating=="1") echo "selected"; ?>>Vegetarian</option>
    <option value="2" <?php if($profile->eating=="2") echo "selected"; ?>>Non Vegitarian</option>
    <option value="3" <?php if($profile->eating=="3") echo "selected"; ?>>Eggetarian</option>
  </select>
</div>
<div class="clearfix"></div>
</li>
<li>
  <div class="child1">
   Smoking Habits
 </div>
 <div class="child2">:
 </div>
 <div class="child3">
   <select class="wed-reg-input-select" name="smoking" data-parsley-trigger="change" required>
    <option>Select</option>
    <option value="1" <?php if($profile->drinking=="1") echo "selected"; ?>>No</option>
    <option value="2" <?php if($profile->drinking=="2") echo "selected"; ?>>Occasionaly</option>
    <option value="3" <?php if($profile->drinking=="3") echo "selected"; ?>>Yes</option>
  </select>
</div>
<div class="clearfix"></div>
</li>
</ul>
</li>
<div class="clearfix"></div>
</form>
</ul>

<!-- Religion modal of -->
  <ul id="prof_religion_edit" style="display: none;">
  <form method="post" id="relg_form">
    <li class="wed-detail-left border-right1">
      <div class="wed-detail-head">
        <h5>Religion Information</h5>
        <div class="wed-detail-edit no_backurl">
          <button type='submit' class="edit_relg_btn wed-go">Save</button>
        </div>
        <div class="clearfix"></div>
      </div>
      <ul class="wed-inside-detail">
        <li>
          <div class="child1">
            Religion
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
           <select class="wed-reg-input-select religion-selector cst-select-2" name="religion" data-parsley-trigger="change" required cst-attr="religion" cst-for="caste" id="religion-selector">
            <option value="">- Select Religion -</option>
            <?php foreach($religions as $rlgn) {
              if($profile->religion == $rlgn->religion_id) { $attr3="selected"; } else { $attr3=""; } ?>
            <option value="<?php echo $rlgn->religion_id; ?>" <?php echo $attr3; ?>><?php echo $rlgn->religion_name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="clearfix"></div>
      </li>
      <li>
        <div class="child1">
          Caste / Division
        </div>
        <div class="child2">:

        </div>
        <div class="child3">
          <select class="wed-reg-input-select caste-selector cst-select-2" name="caste" data-parsley-trigger="change" required cst-attr="caste" cst-for="" id="caste-selector">
            <option>Select Castes</option>
          </select><br/>

        </div>
        <div class="clearfix"></div>
      </li>
         <li>
        <div class="child1">
         Sub Caste 
        </div>
        <div class="child2">:
       
        </div>
        <div class="child3">
         
         <input type="text" class="wed-reg-input" name="sub_caste" value="<?php echo $profile->sub_caste;?>">
        </div>
        <div class="clearfix"></div>
      </li>
   <!--    <li>
        <div class="child1">
          Star / Raasi
        </div>
        <div class="child2">:
        </div>
        <div class="child3">
          <select class="wed-reg-input-select" data-parsley-trigger="change" name="star_id" required>
            <option value="0">Star</option>
            <?php foreach($stars as $star) {
              if($profile->star_id == $star->star_id) { $attr4="selected"; } else { $attr4=""; } ?>
            <option value="<?php echo $star->star_id; ?>" <?php echo $attr4; ?>><?php echo $star->star_name; ?></option>
            <?php } ?>
          </select><br/>
          <select class="wed-reg-input-select" data-parsley-trigger="change" name="raasi_id" required>
            <option value="0">Raasi</option>
            <?php foreach($raasi as $raas) {
              if($profile->raasi_id == $raas->raasi_id) { $attr5="selected"; } else { $attr5=""; } ?>
            <option value="<?php echo $raas->raasi_id; ?>" <?php echo  $attr5; ?>><?php echo $raas->raasi_name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="clearfix"></div>
      </li> -->
    </ul>
  </li>
  <li class="wed-detail-left">
    <div class="wed-detail-head">
      <h5>Groom's Location</h5>
      <div class="wed-detail-edit">
      </div>
      <div class="clearfix"></div>
    </div>
    <ul class="wed-inside-detail">
      <li>
        <div class="child1">
          Country
        </div>
        <div class="child2">:
        </div>
        <div class="child3">
          <select class="wed-reg-input-select cst-select-1" cst-attr="country" cst-for="state" id="country-selector" name="country">
            <option value="0">Select</option>
            <?php foreach ($country as $country1) { 
                           $s = ($country1->country_id == $profile->country) ? "selected" : "";
                          ?>                     
                           <option <?php echo $s; ?> value="<?php echo $country1->country_id; ?>"><?php echo $country1->country_name; ?></option>
                        <?php } ?>
          </select>
        </div>
        <div class="clearfix"></div>
      </li>
      <li>
        <div class="child1">
          State
        </div>
        <div class="child2">:
        </div>
        <div class="child3">
          <select class="wed-reg-input-select cst-select-1" name="state" cst-attr="state" cst-for="city" id="state-selector">
            <option>Select State</option>
          </select>
        </div>
        <div class="clearfix"></div>
      </li>
      <li>
        <div class="child1">
          City
        </div>
        <div class="child2">:
        </div>
        <div class="child3">
          <select class="wed-reg-input-select cst-select-1" name="city" cst-attr="city" cst-for="" id="city-selector">
           <option>Select City</option>
          </select>
        </div>
        <div class="clearfix"></div>
      </li>
       <li>
        <div class="child1">
          Resident Status
        </div>
        <div class="child2">:
        </div>
        <div class="child3">
          <select class="wed-reg-input-select" cst-attr="country" cst-for="state" id="country-resident-status" name="resident_status">
            <option value="0">Select Resident Status</option>
            <option value="permanant_resident" <?php echo ($profile->resident_status== 'permanant_resident') ?  "selected" : "" ;  ?>>Permanant Resident</option>
            <option value="work_permit" <?php echo ($profile->resident_status== 'work_permit') ?  "selected" : "" ;  ?>>Work Permit</option>
            <option value="student_visa" <?php echo ($profile->resident_status== 'student_visa') ?  "selected" : "" ;  ?>>Student Visa</option>
            <option value="temporary_visa" <?php echo ($profile->resident_status== 'temporary_visa') ?  "selected" : "" ;  ?>>Temporary Visa</option>
          </select>
        </div>
        <div class="clearfix"></div>
      </li>
      <?php if($profile->is_premium==1){?>
      <li>
        <div class="child1">
         Parish
        </div>
        <div class="child2">:
       
        </div>
        <div class="child3">
         
         <input type="text" class="wed-reg-input" name="parish" value="<?php echo $profile->parish;?>" id="autocomplete-5">
        </div>
        <div class="clearfix"></div>
      </li>
         <li>
        <div class="child1">
         Village
        </div>
        <div class="child2">:
       
        </div>
        <div class="child3">
         
         <input type="text" class="wed-reg-input" name="parish_village" value="<?php echo $profile->parish_village;?>">
        </div>
        <div class="clearfix"></div>
      </li>
      <?php } ?>
    </ul>
  </li>
  <div class="clearfix"></div>
    </form>
  </ul>

  <ul id="prof_profnl_edit" style="display: none;">
  <form method="post" id="prof_form">
    <li class="wed-detail-left border-right1">
      <div class="wed-detail-head">
        <h5>Professional Information</h5>
        <div class="wed-detail-edit no_backurl">
          <button type='submit' class="edit_prof_btn wed-go">Save</button>
        </div>
        <div class="clearfix"></div>
      </div>
      <ul class="wed-inside-detail">
        <li>
          <div class="child1">
            Education
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
          <select class="wed-reg-input-select" name="education_id" data-parsley-trigger="change" required>
            <option value="-1">Education</option>
            <?php foreach($educations as $education) {
              if($profile->education_id == $education->education_id) { $attr6="selected"; } else { $attr6=""; } ?>
              <option value='<?php echo $education->education_id; ?>' <?php echo $attr6; ?>><?php echo $education->education; ?></option>
            <?php } ?>
          </select>
          </select>
          </div>
          <div class="clearfix"></div>
        </li>
        <!-- <li>
          <div class="child1">
            College / Institution
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <input type="text" class="wed-reg-input" name="college" value="<?php echo ucwords($profile->college);?>">
          </div>
          <div class="clearfix"></div>
        </li>
        <li>
          <div class="child1">
            Education in Detail
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <input type="text" class="wed-reg-input" name="education_detail" value="<?php echo ucwords($profile->education_detail);?>">
          </div>
          <div class="clearfix"></div>
        </li> -->
        <li>
          <div class="child1">
            Occupation
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <select class="wed-reg-input-select" name="occupation_id" data-parsley-trigger="change" required>
            <option value="0">Select Occupation</option>
            <?php foreach($occupations as $occupat) {
              if($profile->occupation_id == $occupat->occupation_id) { $attr7="selected"; } else { $attr7=""; }?>
                <option value="<?php echo $occupat->occupation_id; ?>" <?php echo $attr7; ?>><?php echo $occupat->occupation; ?></option>
            <?php } ?>
          </select>
          </div>
          <div class="clearfix"></div>
        </li>
      </ul>
    </li>
    <li class="wed-detail-left">
      <div class="wed-space1">
      </div>
      <ul class="wed-inside-detail">
        <li>
          <div class="child1">
            Occupation in Detail
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <input type="text" class="wed-reg-input" name="occupation_detail" value="<?php echo ucwords($profile->occupation_detail);?>">
          </div>
          <div class="clearfix"></div>
        </li>
        <li>
          <div class="child1">
            Employed in
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            
            <select class="wed-reg-select" name="employed_in">
              <option value="">Select</option>
              <option value="Govt" <?php if($profile->employed_in=="Govt"){echo "selected";}?>>Govt</option>
              <option value="Private" <?php if($profile->employed_in=="Private"){echo "selected";}?>>Private</option>
              <option value="Business" <?php if($profile->employed_in=="Business"){echo "selected";}?>>Business</option>
              <option value="Self Employed" <?php if($profile->employed_in=="Self Employed"){echo "selected";}?>>Self Employed</option>
              <option value="Not Working" <?php if($profile->employed_in=="Not Working"){echo "selected";}?>>Not Working</option>
            </select>
          </div>
          <div class="clearfix"></div>
        </li>
        <li>
          <div class="child1">
            Annual Income
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <input type="text" class="wed-reg-input" name="income" value="<?php echo $profile->income;?>">
          </div>
          <div class="clearfix"></div>
        </li>
      </ul>
    </li>
    <div class="clearfix"></div>
    </form>
  </ul>

  <!-- Family details modal -->

  <ul id="about_family_edit" style="display: none;">
  <form method="post" id="family_about_form">
    <li class="wed-detail-left" style=" width:100% !important">
      <div class="wed-detail-head">
        <h5>About my Family</h5>
        <div class="clearfix"></div>

        <textarea class="wed-reg-textarea" rows="4" style="width:90% !important" id="family_about_text" name="family_about"><?php echo $profile->family_about;?></textarea>
        <div class="wed-detail-edit no_backurl">
          <button type='submit' class="wed-go edit_about_btn">Save</button>
        </div>
      </div>
      <div class="clearfix"></div> 
    </li>
    <div class="clearfix"></div>
    </form>
  </ul>



<ul id="prof_family_edit" style="display: none;">
  <form method="post" id="family_form">
    <li class="wed-detail-left border-right1">
      <div class="wed-detail-head">
        <h5>Family Details</h5>
        <div class="wed-detail-edit no_backurl">
          <button type='submit' class="wed-go edit_family_btn">Save</button>
        </div>
        <div class="clearfix"></div>
      </div>
      <ul class="wed-inside-detail">
        <li>
          <div class="child1">
          Family Values
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <select class="wed-reg-input-select" name="family_value" data-parsley-trigger="change" required>
              <option>Select</option>
              <option value="1" <?php if($profile->family_value=="1") echo "selected"; ?>>Orthodox</option>
              <option value="2" <?php if($profile->family_value=="2") echo "selected"; ?>>Traditional</option>
              <option value="3" <?php if($profile->family_value=="3") echo "selected"; ?>>Moderate</option>
              <option value="4" <?php if($profile->family_value=="4") echo "selected"; ?>>Liberal</option>
            </select>
          </div>
          <div class="clearfix"></div>
        </li>
        <li>
          <div class="child1">
            Family Type
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <select class="wed-reg-input-select" name="family_type" data-parsley-trigger="change" required>
              <option>Select</option>
              <option value="1" <?php if($profile->family_type=="1") echo "selected"; ?>>Joint</option>
              <option value="2" <?php if($profile->family_type=="2") echo "selected"; ?>>Nuclear</option>
            </select>
          </div>
          <div class="clearfix"></div>
        </li>
        <li>
          <div class="child1">
            Family Status
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <select class="wed-reg-input-select" name="family_status" data-parsley-trigger="change" required>
              <option>Select</option>
              <option value="1" <?php if($profile->family_status=="1") echo "selected"; ?>>Middle Class</option>
              <option value="2" <?php if($profile->family_status=="2") echo "selected"; ?>>Upper Middile Class</option>
              <option value="3" <?php if($profile->family_status=="3") echo "selected"; ?>>Rich</option>
              <option value="4" <?php if($profile->family_status=="4") echo "selected"; ?>>Affluent</option>
            </select>
          </div>
          <div class="clearfix"></div>
        </li>
        <li>
          <div class="child1">
            Ancestral /Family Origin <small class="text-danger"> [Native place]</small>
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <input type="text" class="wed-reg-input" name="family_origin" value="<?php echo ucwords($profile->family_origin);?>">
          </div>
          <div class="clearfix"></div>
        </li>
        <li>
          <div class="child1">
            Family Location
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <input type="text" class="wed-reg-input" name="family_location" value="<?php echo ucwords($profile->family_location);?>">
          </div>
          <div class="clearfix"></div>
        </li>
      </ul>
    </li>
    <li class="wed-detail-left">
      <div class="wed-space1">
      </div>
      <ul class="wed-inside-detail">
        <li>
          <div class="child1">
            Father's Name
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <input type="text" class="wed-reg-input" name="father_status" value="<?php echo ucwords($profile->father_status);?>">
          </div>
          <div class="clearfix"></div>
        </li>
        <li>
          <div class="child1">
            Mother's Name
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <input type="text" class="wed-reg-input" name="mother_status" value="<?php echo ucwords($profile->mother_status);?>">
          </div>
          <div class="clearfix"></div>
        </li>
        <li>
          <div class="child1">
            No of Brother(s)
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <input type="number" class="wed-reg-input" min="0" max="50" placeholder="No: of brothers" name="brothers" value="<?php echo ucwords($profile->brothers);?>">
          </div>
          <div class="clearfix"></div>
        </li>
        <li>
          <div class="child1">
            No of Sister(s)
          </div>
          <div class="child2">:
          </div>
          <div class="child3">
            <input type="number" class="wed-reg-input" min="0" max="50" placeholder="No: of brothers" name="sisters" value="<?php echo ucwords($profile->sisters);?>">
          </div>
          <div class="clearfix"></div>
        </li>
      </ul>
    </li>
    <div class="clearfix"></div>
    </form>
  </ul>





  </div>
<div class="container container-custom">
  <div class="wed-row">
            <ul class="wed-row-inside" id="about_family_ul">
              <div class="wed-detail-head">
                <h5>About my Family</h5>
                <div class="wed-detail-edit" id="about_family_edit_btn">
                  edit
                </div>
                <div class="clearfix"></div>
              </div>
              <p><?php echo ucwords($profile->family_about);?></p>
            </ul>
          </div>

          <!--LIFESTYLE -->

          <div class="wed-row bordernone">
            <ul class="wed-row-inside">
              <div class="wed-detail-head">
                <h5>Life Style</h5>
                <a href="<?php echo base_url();?>Profile/add_hobbies">
                  <div class="wed-detail-edit">
                    edit
                  </div>
                </a>
                <div class="clearfix"></div>
              </div>
              <li>
                <div class="child1">
                  Hobbies & Interests
                </div>
                <div class="child2">:
                </div>
                <div class="child3">
                  <?php if($data!=null){?>
                <?php echo $hobbies=$data->other_hobbies!=''?$data->hobbies.', '.$data->other_hobbies:$data->hobbies; ?> 
                <?php } ?>
                </div>
                <div class="clearfix"></div>
              </li>
           <!--    <li>
                <div class="child1">
                  Interests
                </div>
                <div class="child2">:
                </div>
                <div class="child3">
                  Adventure sports, Computer games
                </div>
                <div class="clearfix"></div>
              </li -->
              <li>
                <div class="child1">
                  Favourite Music
                </div>
                <div class="child2">:
                </div>
                <div class="child3">
                   <?php if($data!=null){?>
                  <?php echo $music=$data->other_music!=''?$data->music.", ".$data->other_music:$data->music; ?>
                  <?php } ?>
                </div>
                <div class="clearfix"></div>
              </li>
         <!--      <li>
                <div class="child1">
                  Favourite Reads
                </div>
                <div class="child2">:
                </div>
                <div class="child3">
                  Comics, Fantasy, History
                </div>
                <div class="clearfix"></div>
              </li> -->
        <!--       <li>
                <div class="child1">
                  Preferred Movies
                </div>
                <div class="child2">:
                </div>
                <div class="child3">
                  Documentaries, Horror, Sci-Fi & fantasy
                </div>
                <div class="clearfix"></div>
              </li> -->
              <li>
                <div class="child1">
                  Sports/ Fitness Activities
                </div>
                <div class="child2">:
                </div>
                <div class="child3">
                   <?php if($data!=null){?>
                  <?php echo $sports=$data->other_sports!=''?$data->sports.', '.$data->other_sports:$data->sports; ?>
                  <?php } ?>
                </div>
                <div class="clearfix"></div>
              </li>
       <!--        <li>
                <div class="child1">
                  Favourite Cuisine
                </div>
                <div class="child2">:
                </div>
                <div class="child3">
                  Chinese, South Indian
                </div>
                <div class="clearfix"></div>
              </li>
              <li>
                <div class="child1">
                  Preferred Dress Style
                </div>
                <div class="child2">:
                </div>
                <div class="child3">
                  Casual wear, Designer wear
                </div>
                <div class="clearfix"></div>
              </li> -->
              <li>
                <div class="child1">
                Spoken Languages
                </div>
                <div class="child2">:
                </div>
                <div class="child3">
                   <?php if($data!=null){?>
                  <?php echo $languages=$data->other_languages!=''?$data->languages.', '.$data->other_languages:$data->languages; ?>
                  <?php } ?>
                </div>
                <div class="clearfix"></div>
              </li>
            </ul>
          </div>
          </div>
        </div>
      </div>

      <div class="wed-profile-details">
        <div class="wed-patner-preference1">
          <div class="container container-custom">
          <div class="wed-row">
            <h5>Partner Preference</h5>
            <ul>
              <li class="wed-detail-left border-right1">
                <div class="wed-detail-head">
                  <h5>Basic & Religious Preference</h5>
                  <a href="<?php echo base_url();?>profile/partner_preference">
                    <div class="wed-detail-edit">
                      edit
                    </div>
                  </a>
                  <div class="clearfix"></div>
                </div>
                <ul class="wed-inside-detail">
                  <li>
                    <div class="child1">
                      Bride's Age
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      <?php if(!empty($prefernce)){echo "<b>".$prefernce['min_age']."</b> - <b>".$prefernce['max_age']."</b> Years";} ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Height
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      <?php if(!empty($prefernce)){echo "<b>".$prefernce['min_height']."</b> - <b>".$prefernce['max_height']."</b>";} ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Marital status
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if(!empty($prefernce)){ echo implode(', ', $prefernce['maritial']); } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Physical Status
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if(!empty($prefernce)){ echo implode(', ', $prefernce['physical']); } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Eating Habits
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if(!empty($prefernce)){ echo implode(', ', $prefernce['eating']); } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Smoking Habits
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if(!empty($prefernce)){ echo implode(', ', $prefernce['smoking']); } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Drinking Habits
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if(!empty($prefernce)){ echo implode(', ', $prefernce['drinking']); } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
            </li>
            <li class="wed-detail-left">
              <div class="wed-space1">
              </div>
              <ul class="wed-inside-detail">
                <li>
                  <div class="child1">
                    Religion
                  </div>
                  <div class="child2">:
                  </div>
                  <div class="child3">
                    <?php if(!empty($prefernce)){echo $prefernce['religion'].""; }?>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="child1">
                Mother Tongue
                  </div>
                  <div class="child2">:
                  </div>
                  <div class="child3">
                    <?php if(!empty($prefernce)){ echo $prefernce['mother']; }?>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="child1">
                    Caste
                  </div>
                  <div class="child2">:
                  </div>
                  <div class="child3">
                  <?php if(!empty($prefernce)){ echo $prefernce['caste']; } ?>
                  </div>
                  <div class="clearfix"></div>
                </li>
            <!--     <li>
                  <div class="child1">
                    Star
                  </div>
                  <div class="child2">:
                  </div>
                  <div class="child3">
                    <?php if(!empty($prefernce)){foreach($prefernce['star'] as $val) { echo $val.", "; } }?>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="child1">
                    Chovva Dosham
                  </div>
                  <div class="child2">:
                  </div>
                  <div class="child3">
                    <?php if(!empty($prefernce)){foreach($prefernce['dosham'] as $val) { echo $val.", "; }} ?>
                  </div>
                  <div class="clearfix"></div>
                </li> -->

              </ul>
          </li>


              <div class="clearfix"></div>
            </ul>
          </div>
          <div class="wed-row">
            <ul>
              <li class="wed-detail-left border-right1">
                <div class="wed-detail-head">
                  <h5>Professional Preferences</h5>
                  <a href="<?php echo base_url();?>profile/partner_preference">
                    <div class="wed-detail-edit">
                      edit
                    </div>
                  </a>
                  <div class="clearfix"></div>
                </div>
                <ul class="wed-inside-detail">
                  <li>
                    <div class="child1">
                    Education
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                     <?php if(isset($prefernce) && ($prefernce != "")) {
                        echo $prefernce['education'];
                      } else { 
                        echo "Any";
                      } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Occupation
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      <?php if(isset($prefernce) && ($prefernce != "")) {
                        echo $prefernce['occupation'];
                      } else { 
                        echo "Any";
                      } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Annual Income
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      <?php if(!empty($prefernce)){echo $prefernce['min_income']." - ".$prefernce['max_income']." (".$prefernce['income_currency'].")";} ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
              </li>
              <li class="wed-detail-left">
                <div class="wed-space1">
                </div>
                <ul class="wed-inside-detail">
                  <li>
                    <div class="child1">
                      Country
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      <?php if(isset($prefernce) && ($prefernce != "")) {
                          echo $prefernce['country'];
                        } else { 
                          echo "Any";
                        } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Residing State
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      <?php if(isset($prefernce) && ($prefernce != "")) {
                          echo $prefernce['state'];
                        } else { 
                          echo "Any";
                        } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Citizenship
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if(isset($prefernce) && ($prefernce != "")) {
                          echo $prefernce['country'];
                        } else { 
                          echo "Any";
                        } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <!-- <li>
                    <div class="child1">
                    Residing City
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                     <?php if(!empty($prefernce))foreach($prefernce['city'] as $val) { 
                          if(isset($val->city_name)) { 
                            echo $val->city_name.", ";
                          } else { 
                            echo "Any";
                          } 
                      } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li> -->
                </ul>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>
          <div class="wed-row">
            <ul>
              <li class="wed-detail-left border-right1">
                <div class="wed-detail-head">
                  <h5>Horoscope Details</h5>
                  <a href="<?php echo base_url();?>profile/partner_preference">
                    <div class="wed-detail-edit">
                      edit
                    </div>
                  </a>
                  <div class="clearfix"></div>
                </div>
                <ul class="wed-inside-detail">
                  <li>
                    <div class="child1">
                    Gothram
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                     <?php echo $horroscope_info->gothram;?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Star
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                     <?php echo $horroscope_info->star_name;?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Padam
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                     <?php echo $horroscope_info->padam;?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Have Dosham?
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      <?php 
                      switch ($horroscope_info->dosham) {
                        case '1':
                          echo "No";
                          break;
                        case '2':
                          echo "Yes";
                          break;
                          default:
                          echo "Don't Know.";
                          break;
                      }
                      ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Horoscope File
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                       <?php if($horroscope_info->horo_img!=""):?>
                       <a href="<?php echo base_url();?>assets/uploads/horoscope/<?php echo $horroscope_info->horo_img;?>" download class="btn btn-success">Download Horoscope</a>
                      <?php endif?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
              </li>
              <li class="wed-detail-left">
                
                
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>
          <div class="wed-row bordernone">
            <h5>What we are looking for</h5>
            <ul>
              <li class="wed-detail-left" style="width:100% !important">
                <div class="wed-detail-head">
                  <h5 style="line-height:30px; text-align:justify;"><?php if(!empty($prefernce)){if($prefernce['abt_part']!=NULL) { echo $prefernce['abt_part']; } }else { echo "Not Specified"; } ?></h5>
                </div>
              </li>
              <div class="clearfix"></div>
          </div>
        </div>
        </div>
        <div class="wed-space">
        </div>
        <div class="wed-help-div">
          <div class="wed-help-assistance">
            <p>Need help? Here's one click assistance!   </p>
            <p><a href="#">Click here</a>and we will get in touch with you right away.</p>
          </div>
        </div>
        <div class="wed-space">
        </div>
      </div>
</div>

<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<?php $this->load->view('forms/my_profile_js.php');?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script>
$(document).ready(function(){

  $('.datepicker').datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd",
      //yearRange: "1970:2000"
	   yearRange: "1970:2000"
  });


    $(document).on("click","#prof_pers_edit",function() {
        $('#prof_pers_text').show();
        $('#prof_pers_btn').show();
        $('#prof_pers_edit').hide();
        $('#about_u').hide();
    });

    $(document).on("click","#prof_basic_edit_btn",function() {
        $('#prof_basic_edit').show();
        $('#basic_details_ul').replaceWith($('#prof_basic_edit'));
    });

    $(document).on("click","#prof_religion_edit_btn",function() {
        $('#prof_religion_edit').show();
        $('#prof_religion_ul').replaceWith($('#prof_religion_edit'));
    });

    $(document).on("click","#prof_profnl_edit_btn",function() {
        $('#prof_profnl_edit').show();
        $('#prof_profnl_ul').replaceWith($('#prof_profnl_edit'));
    });

    $(document).on("click","#prof_family_edit_btn",function() {
        $('#prof_family_edit').show();
        $('#prof_family_ul').replaceWith($('#prof_family_edit'));
    });

     $(document).on("click","#about_family_edit_btn",function() {
        $('#about_family_edit').show();
        $('#about_family_ul').replaceWith($('#about_family_edit'));
    });


    // $(".btn2").click(function(){
    //     $(".reply-form").show();
    //     $(".about_u").hide();
    // });

    $(".cst-select-1").on('change', function () {
      event.preventDefault();
      //alert($(this).attr('id'))
        var valueSelected = $(this).val();
        var select_type   = $(this).attr('cst-attr');
        var select_destn  = $(this).attr('cst-for');
        var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;
        //alert("called"+passdata_2);

        $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>home/get_drop_data',
        data:  passdata_2,
        success: function(data){
               $("#"+select_destn+"-selector").html(data);
            }
        });
    });

    $(".religion-selector").on('change', function () {
      event.preventDefault();
      var valueSelected = $(this).val();
      var passdata_1 = 'rlgn_sel='+ valueSelected;
      $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>home/getCaste',
        data:  passdata_1,
        success: function(data){
          $(".caste-selector").html(data);
        }
      });
    });

    $(".caste-selector").on('change', function () {
      event.preventDefault();
      var valueSelected = $(this).val();
      var passdata_1 = 'cast_sel='+ valueSelected;
      $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>home/getSubCaste',
        data:  passdata_1,
        success: function(data){
          $(".sub-caste-selector").html(data);
        }
      });
    });

    /*$('#country-selector').on('change', function () {
        var valueSelected = $(this).val();
        var passdata_1 = 'cast_sel='+ valueSelected;

        $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>home/getSubCaste',
        data:  passdata_1,
        success: function(data){
                $(".sub-caste-selector").html(data);
            }
        });
    });*/

    $(document).on("click","#prof_pers_btn",function() {
      event.preventDefault();
      if($('#about_form').parsley().validate()) {
        var value =$("#about_form").serialize();
        $.ajax({
          type: "POST",
          url: base_url+'Home/update_about',
          data: value,
          error: function (err) {
              console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
          },
          success: function(data) {
            alert("Updated Successfully!");
            //location.reload();
            window.location = "<?php echo base_url()?>/profile/my_profile"; return false;
          }
        });
        return false;
      }
    });

    $(document).on("click",".edit_relg_btn",function() {
      event.preventDefault();
      //if($('#edit_form').parsley().validate()) {
      console.log('relg_form - submit');
      var value =$("#relg_form").serialize();
      console.log(value);
      $.ajax({
        type: "POST",
        url: base_url+'Home/update_profile',
        data: value,
        error: function (err) {
          console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success: function(data) {
          console.log(data);
          alert("Updated Successfully!");
          //location.reload();
          window.location = "<?php echo base_url()?>/profile/my_profile"; return false;
        }
      });
      return false;
      //}
    });

    $(document).on("click",".edit_family_btn",function() {
      event.preventDefault();
      //if($('#edit_form').parsley().validate()) {
      var value =$("#family_form").serialize();
      console.log(value);
      $.ajax({
        type: "POST",
        url: base_url+'Home/update_profile',
        data: value,
        error: function (err) {
          console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success: function(data) {
          console.log(data);
          alert("Updated Successfully!");
          //location.reload();
          window.location = "<?php echo base_url()?>/profile/my_profile"; return false;
        }
      });
      return false;
      //}
    });

    $(document).on("click",".edit_about_btn",function() {
      event.preventDefault();
        //if($('#edit_form').parsley().validate()) {

            var value =$("#family_about_form").serialize();
            console.log(value);
            $.ajax({
                type: "POST",
                url: base_url+'Home/update_profile',
                data: value,
                error: function (err) {
                    console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
                },
                success: function(data) {
                  console.log(data);
                  alert("Updated Successfully!");
                  //location.reload();
                  window.location = "<?php echo base_url()?>/profile/my_profile"; return false;
                }
            });
            return false;
        //}
    });
});

  var base_url = <?php echo json_encode(base_url()); ?>;
  $(function() {
    $( "#autocomplete-5" ).autocomplete({
    source: base_url+"/Home/load_parish",
    minLength: 1,
    focus: function( event, ui ) {
    $( "#autocomplete-5" ).val( ui.item.val );
    return false;  
    }
    });
  });


$( document ).ready(function() {
  
  var cntry = <?php echo json_encode($profile->country) ?>;
  var state = <?php echo json_encode($profile->state) ?>;
 var city = <?php echo json_encode($profile->city) ?>;


/*$(".cst-select-1").on('change', function () {

        var valueSelected = $(this).val();
        var select_type   = $(this).attr('cst-attr');
        var select_destn  = $(this).attr('cst-for');
        var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;
        $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>Profile/get_drop_data2',
        data:  passdata_2,
        success: function(data){
         alert(data);
               $("#"+select_destn+"-selector").html(data);
            }
        });
    });*/

  $("select#country-selector").val(cntry).change();
  setTimeout(function() {
    $("select#state-selector").val(state).change();
  }, 500);
   setTimeout(function() {
     $("select#city-selector").val(city).change();
  }, 1000);

var religion = <?php echo json_encode($profile->religion) ?>;
var caste = <?php echo json_encode($profile->caste) ?>;
//alert(caste);

    $(".cst-select-2").on('change', function () {
      event.preventDefault();
        var valueSelected = $(this).val();
        var select_type   = $(this).attr('cst-attr');
        var select_destn  = $(this).attr('cst-for');
        var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;

        $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>Profile/get_drop_data3',
        data:  passdata_2,
        success: function(data){
        // alert(data);
               $("#"+select_destn+"-selector").html(data);
            }
        });
    });

    $("select#religion-selector").val(religion).change();
    setTimeout(function() {
      $("select#caste-selector").val(caste).change();
    }, 500);
  
 });    
      </script> 

</body></html>