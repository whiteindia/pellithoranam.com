<?php set_time_limit(0); ?>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<?php  $session=$this->session->userdata('logged_in');

 ?>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function () {
            $("#test").CreateMultiCheckBox({ width: '230px', defaultText : 'Select Below', height:'250px' });
        });
        $(document).ready(function () {
            $("#test1").CreateMultiCheckBox({ width: '230px', defaultText : 'Select Below', height:'250px' });
        });
        $(document).ready(function () {
            $("#test2").CreateMultiCheckBox({ width: '230px', defaultText : 'Select Below', height:'250px' });
        });
    </script>
    <style>
    .MultiCheckBox {
            border:1px solid #e2e2e2;
            padding: 5px;
            border-radius:4px;
            cursor:pointer;
        }

        .MultiCheckBox .k-icon{ 
            font-size: 15px;
            float: right;
            font-weight: bolder;
            margin-top: -7px;
            height: 10px;
            width: 14px;
            color:#787878;
        } 

        .MultiCheckBoxDetail {
            display:none;
            position:absolute;
            border:1px solid #e2e2e2;
            overflow-y:hidden;
        }

        .MultiCheckBoxDetailBody {
            overflow-y:scroll;
        }

            .MultiCheckBoxDetail .cont  {
                clear:both;
                overflow: hidden;
                padding: 2px;
            }

            .MultiCheckBoxDetail .cont:hover  {
                background-color:#cfcfcf;
            }

            .MultiCheckBoxDetailBody > div > div {
                float:left;
            }

        .MultiCheckBoxDetail>div>div:nth-child(1) {
        
        }

        .MultiCheckBoxDetailHeader {
            overflow:hidden;
            position:relative;
            height: 28px;
            background-color:#3d3d3d;
        }

            .MultiCheckBoxDetailHeader>input {
                position: absolute;
                top: 4px;
                left: 3px;
            }

            .MultiCheckBoxDetailHeader>div {
                position: absolute;
                top: 5px;
                left: 24px;
                color:#fff;
            }
    
    
    </style>
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
                    <li>
                      <div class="child1">
                       Place of Birth
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php if($profile->placeofbirth) {
              						echo $profile->placeofbirth; 
              					} else {?> - <?php } ?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                       Time of Birth
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php if($profile->timeofbirth) {
              						echo $profile->timeofbirth; 
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
            <!--      <li>
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
                  </li> -->
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

            <!---family details start--->
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


          <!---family details end--->

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

 <!---horoscope start--->
 <div class="wed-row">
            <ul id="prof_horoscope_ul">
                <li class="wed-detail-left border-right1">
                  <div class="wed-detail-head">
                    <h5> Horoscope Details</h5>
                    <div class="wed-detail-edit" id="prof_horoscope_edit_btn">
                      edit
                    </div>
                    <?php 
                       $preferences = $this->db->where('profile_id',$profile->matrimony_id)->get('preferences')->row();
                       $horroscope_info = $this->db->where('matrimony_id',$profile->matrimony_id)->get('profiles')->row();   
                        ?>
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
                    <?php if($horroscope_info->star_id){
                     // $horroscope_info->star_id=explode (",",$preferences->star_id);
                      ?>
<?php foreach($stars as $star) { ?>
<?php if(is_array($horroscope_info->star_id)){
if(in_array($star->star_id,$horroscope_info->star_id)) echo $star->star_name; 
}
else {

  if($star->star_id==$horroscope_info->star_id) echo $star->star_name;
} ?>
  <?php ?>
<?php }
}else{
  echo '-';
}
 ?>
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
                  </ul>
              </li>
              <li class="wed-detail-left">
                <div class="wed-space1">
                </div>
                <ul class="wed-inside-detail">




           <!--   -->  
         <!--        <li>
                    <div class="child1">
                    Padam
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                <?php    if(isset($horroscope_info->padam)) {
                        //    echo $preferences->smoking_habit;
                            if($horroscope_info->padam==0){echo '-';}
                            if($horroscope_info->padam==1){echo 'padam 1';}
if($horroscope_info->padam==2){echo 'padam 2';}
if($horroscope_info->padam==3){echo 'padam 3';}
if($horroscope_info->padam==4){echo 'padam 4';}

                          } else { echo '-';} ?>



              <!--      <?php if($preferences->star_id) {  
        					  print_r($preferences->star_id);
        					   } else {?> - <?php } ?>->
                    </div>
                    <div class="clearfix"></div>
                  </li>   -->

                </ul>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>


          <!---horoscope end--->


 <!---family details start--->
 <div class="wed-row">
            <ul id="prof_preference_ul">
                <li class="wed-detail-left border-right1">
                  <div class="wed-detail-head">
                    <h5>Partner Preference Details</h5>
                    <div class="wed-detail-edit" id="prof_preference_edit_btn">
                      edit
                    </div>
                    <?php 
                       $preferences = $this->db->where('profile_id',$profile->matrimony_id)->get('preferences')->row();
                       $horroscope_info = $this->db->where('matrimony_id',$profile->matrimony_id)->get('profiles')->row();   
                        ?>
                    <div class="clearfix"></div>
                  </div>
                  <ul class="wed-inside-detail">
                    <li>
                      <div class="child1">
                        Age From
      
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php
                          if(isset($preferences->age_from)) {
                            echo $preferences->age_from;
                          } else { echo '-';} ?>
           
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Age to
      
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php
                          if(isset($preferences->age_to)) {
                            echo $preferences->age_to;
                          } else { echo '-';} ?>
           
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        height from
      <?php
      $heights=json_decode(json_encode($heights),true);
     // print_r($heights); 
     ?>
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php
                          if(isset($preferences->height_from_id)&&($preferences->height_to_id>0)) {
                           // echo $preferences->height_from_id;
                            
                           // echo($heights[(int)$preferences->height_from_id-1]['height']); 
                          } else { echo '-';} ?>
           
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        height from <?php
                        $heights=json_decode(json_encode($heights),true);
                       // echo($heights[(int)$preferences->height_to_id-1]['height']);
                         ?>
      
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php
                          if(isset($preferences->height_to_id)&&($preferences->height_to_id>0)) {
                           // echo $preferences->height_to_id;
                            
                           echo($heights[(int)$preferences->height_to_id-1]['height']); 
                          } else { echo '-';} ?>
           
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                      Maritial Status
      
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php
                          if(isset($preferences->maritial_status)) {
if($preferences->maritial_status==1){echo 'Never Married';}
if($preferences->maritial_status==2){echo 'Divorced';}
if($preferences->maritial_status==3){echo 'Widowed';}
if($preferences->maritial_status==4){echo 'Awaiting for Divorce';}
   

                        //    echo $preferences->maritial_status;
                          } else { echo '-';} ?>
           
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
                          if(isset($preferences->physical_status)) {
                        //    echo $preferences->physical_status;

                            if($preferences->physical_status==0){echo 'Doesnot Matter';}
if($preferences->physical_status==2){echo 'Normal';}
if($preferences->physical_status==3){echo 'physically Challenged';}

                          } else { echo '-';} ?>
           
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                      Eating Habbits
      
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        <?php
                          if(isset($preferences->eating_habit)) {
                           // echo $preferences->eating_habit;
                            if($preferences->eating_habit==0){echo 'Doesnot Matter';}
                            if($preferences->eating_habit==1){echo 'Vegetarian';}
if($preferences->eating_habit==2){echo 'Non Vegitarian';}
if($preferences->eating_habit==3){echo 'Eggetarian';}



                          } else { echo '-';} ?>
           
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
                          if(isset($preferences->eating_habit)) {
                           // echo $preferences->eating_habit;
                            if($preferences->eating_habit==0){echo 'Doesnot Matter';}
                            if($preferences->eating_habit==1){echo 'Never Drinks';}
if($preferences->eating_habit==2){echo 'Drinks Socialy';}
if($preferences->eating_habit==3){echo 'Drinks Regularly';}
                          } else { echo '-';} ?>
           
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
                          if(isset($preferences->smoking_habit)) {
                        //    echo $preferences->smoking_habit;
                            if($preferences->smoking_habit==0){echo 'Doesnot Matter';}
                            if($preferences->smoking_habit==1){echo 'Never Smokes';}
if($preferences->smoking_habit==2){echo 'Smokes Occasionaly';}
if($preferences->smoking_habit==3){echo 'Smokes Regularly';}

                          } else { echo '-';} ?>
           
                      </div>
                      <div class="clearfix"></div>
                    </li>

                    <li>
                    <div class="child1">
                    Partner Description
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if(isset($preferences->about_partner)) {  
        					  print_r($preferences->about_partner);
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
                    Religion
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
              
                                                  <?php 
                                                 if(isset($religions)){ 
                                                  foreach($religions as $rlgn) { ?>
                             <?php if($preferences->religion==$rlgn->religion_id) echo $rlgn->religion_name; ?>
                          <?php }
                                                 }else{
                                                   echo '-';
                                                 }
                          
                          ?>
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
                    <?php 
                                                 if(isset($mother_tongue)){ 
                                                  foreach($mother_tongue as $mthr_tng) { ?>
                             <?php if($preferences->mother_language==$mthr_tng->mother_tongue_id) echo $mthr_tng->mother_tongue_name; ?>
                          <?php }
                                                 }else{
                                                   echo '-';
                                                 }
                          
                          ?>



                <!--      <?php if($profile->mother_language) {   
          					  echo ucwords($profile->mother_language);
          					   } else {?> - <?php } ?>  -->
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
                    <?php 
                                                 if(isset($preferences->caste)){ 
                                                  $preferences->caste=explode (",",$preferences->caste); 
                                                  foreach($castes as $rs) { ?>
                             <?php 
                             if(in_array($rs->caste_id, $preferences->caste))echo $rs->caste_name;
                             ?>
                          <?php }
                                                 }else{
                                                   echo '-';
                                                 }
                          
                          ?>

                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Country
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    
<?php if($preferences->country){
  $preferences->country=explode (",",$preferences->country); 
  ?>

<?php foreach($country as $ctry) { 
  
  ?>
<?php if(is_array($preferences->country)){
if(in_array($ctry->country_id,$preferences->country)) echo $ctry->country_name; 
}
else {

  if($ctry->country_id==$preferences->country) echo $ctry->country_name;
} ?>
  <?php ?>
<?php }
}else{
  echo '-';
}
 ?>
<!--<?php if($profile->country) {  ?>
        					  print_r($profile->country);
        					   } else {?> - <?php } ?>  -->
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    State 
                     <?php //if(is_array($preferences->state)){
                   $preferences->state=explode (",", $preferences->state); 
                    // print_r($preferences->state); // }
                      ?>
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                              
<?php if($preferences->state){?>
<?php foreach($states as $state) { ?>
<?php if(is_array($preferences->state)){
if(in_array($state->state_id,$preferences->state)) 
echo $state->state_name; 
}
else {

  if($state->state_id==$preferences->state) 
  echo $state->state_name;
} ?>
  <?php ?>
<?php }
}else{
  echo '-';
}
 ?>


         
                    </div>
                    <div class="clearfix"></div>
                  </li>
           <!--       <li>
                    <div class="child1">
                    Gothram
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if($preferences->gothram) {  
        					  print_r($preferences->gothram);
        					   } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>  -->
                  <li>
                    <div class="child1">
                    Star
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if($preferences->star_id){
                      $preferences->star_id=explode (",",$preferences->star_id);
                      ?>
<?php foreach($stars as $star) { ?>
<?php if(is_array($preferences->star_id)){
if(in_array($star->star_id,$preferences->star_id)) echo $star->star_name; 
}
else {

  if($star->star_id==$preferences->star_id) echo $star->star_name;
} ?>
  <?php ?>
<?php }
}else{
  echo '-';
}
 ?>



                 <!--   <?php if($horroscope_info->star_id) {  
        					  print_r($horroscope_info->star_id);
        					   } else {?> - <?php } ?>  -->
                    </div>
                    <div class="clearfix"></div>
                  </li>
         <!--         <li>
                    <div class="child1">
                    Padam
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                <?php    if(isset($preferences->padam)) {
                        //    echo $preferences->smoking_habit;
                            if($preferences->padam==0){echo '-';}
                            if($preferences->padam==1){echo 'padam 1';}
if($preferences->padam==2){echo 'padam 2';}
if($preferences->padam==3){echo 'padam 3';}
if($preferences->padam==4){echo 'padam 4';}

                          } else { echo '-';} ?>



              <!--      <?php if($preferences->star_id) {  
        					  print_r($preferences->star_id);
        					   } else {?> - <?php } ?>->
                    </div>
                    <div class="clearfix"></div>
                  </li>   -->
                  <li>
                    <div class="child1">
                    Education
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                <!--    <?php if(isset($preferences->education)) {  
        					  print_r($preferences->education);
        					   } else {?> - <?php } ?>-->
          <?php if($preferences->education){
            $preferences->education=explode (",",$preferences->education);
            
            ?>
<?php foreach($educations as $education) { ?>
<?php if(is_array($preferences->education)){
if(in_array($education->education_id,$preferences->education)) echo $education->education; 
}
else {

  if($education->education_id==$preferences->education) echo $education->education;
} ?>
  <?php ?>
<?php }
}else{
  echo '-';
}
 ?>

<!--
<?php foreach($educations as $education) { ?>
                              <option <?php if(in_array($education->education_id, $preferences->education)) echo 'selected="SELECTED"'; ?> value="<?php echo $education->education_id; ?>"><?php echo $education->education; ?></option>
                          <?php } ?> -->


                    </div>
                    <div class="clearfix"></div>
                  </li>
               <!--   <li>
                    <div class="child1">
                    Occupation
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if(isset($preferences->occupation)) {  
        					  print_r($preferences->occupation);
        					   } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>  -->
                  <li>
                    <div class="child1">
                    Occupation
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                  <!--  <?php if(isset($preferences->occupation)) {  
        					  print_r($preferences->occupation);
        					   } else {?> - <?php } ?>  -->
         <?php if($preferences->occupation){
           $preferences->occupation=explode (",",$preferences->occupation);
           ?>
<?php foreach($occupations as $occup) { ?>
<?php if(is_array($preferences->occupation)){
if(in_array($occup->occupation_id,$preferences->occupation)) echo $occup->occupation; 
}
else {

  if($occup->occupation_id==$preferences->occupation) echo $occup->occupation;
} ?>
  <?php ?>
<?php }
}else{
  echo '-';
}
 ?>


<!--
<?php foreach($occupations as $occup) { ?>
                              <option <?php if(in_array($occup->occupation_id, $preferences->occupation)) echo 'selected="SELECTED"'; ?> value="<?php echo $occup->occupation_id; ?>"><?php echo $occup->occupation; ?></option>
                          <?php } ?>-->
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Income From
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if(isset($preferences->min_income)) {  
        					  print_r($preferences->min_income);
        					   } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                    Income To
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                    <?php if(isset($preferences->max_income)) {  
        					  print_r($preferences->max_income);
        					   } else {?> - <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </li>
















                </ul>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>


          <!---family details end--->









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
      <li>
        <div class="child1">
         Place of Birth 
        </div>
        <div class="child2">:
       
        </div>
        <div class="child3">
         
         <input type="text" class="wed-reg-input" name="placeofbirth" value="<?php echo $profile->placeofbirth;?>">
        </div>
        <div class="clearfix"></div>
      </li>
      <li>
        <div class="child1">
        Time of Birth  
        </div>
        <div class="child2">:
       
        </div>
        <div class="child3">
         
         <input type="time" class="wed-reg-input" name="timeofbirth" value="<?php echo $profile->timeofbirth;?>">
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
  <!--    <li>
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
      </li>  --->
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


<!---HOme edit start---->
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

<!---HOme horoscope start---->
<ul id="prof_horoscope_edit" style="display: none;">
  <form method="post" id="horoscope_form">
    <li class="wed-detail-left border-right1">
      <div class="wed-detail-head">
        <h5>horoscope  Details : </h5>
        <div class="wed-detail-edit no_backurl">
          <button type='submit' class="wed-go edit_horoscope_btn">Save</button>
        </div>
        <div class="clearfix"></div>
      </div>
      <ul class="wed-inside-detail">

      <li>
                 <div class="wed-reg-right-child1 paddingtop10">Gothram</div>
                 <div class="wed-reg-right-child2">
                      <div class="row1">
                        <span><input class="wed-reg-input12 reg_input" type="text" name="gothram" id="gothram" value="<?php echo $horroscope_info->gothram;?>" required></span>
                    </div>
                   </div>
                 <div class="clearfix"></div>
               </li>
               <li>
                 <div class="wed-reg-right-child1 paddingtop10">Star</div>
                 <div class="wed-reg-right-child2">
                     <div class="row1">
                       <select class="wed-reg-select" name="star_id">
                          <option value="0">Option</option>
                          <?php foreach($stars as $star) { ?>
                              <option value="<?php echo $star->star_id; ?>" <?php if($horroscope_info->star_id==$star->star_id) echo 'selected="SELECTED"'; ?>><?php echo $star->star_name; ?></option>
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
                       <select class="wed-reg-select" name="padam">
                          <option value="0">Option</option>
                          <option value="1 Padam" <?php if($horroscope_info->padam=="1 Padam") echo 'selected="SELECTED"'; ?>>1 Padam</option>
                          <option value="2 Padam" <?php if($horroscope_info->padam=="2 Padam") echo 'selected="SELECTED"'; ?>>2 Padam</option>
                          <option value="3 Padam" <?php if($horroscope_info->padam=="3 Padam") echo 'selected="SELECTED"'; ?>>3 Padam</option>
                          <option value="4 Padam" <?php if($horroscope_info->padam=="4 Padam") echo 'selected="SELECTED"'; ?>>4 Padam</option>                  
                       </select>
                     </div>
                   </div>
                 <div class="clearfix"></div>
               </li>
               <li>
                 <div class="wed-reg-right-child1">Have Dosham?</div>
                 <div class="wed-reg-right-child2">
                   <div class="wed-custom5">
                       <input id="nm12" type="radio" name="dosham" value="1" <?php if($horroscope_info->dosham=="1") echo 'checked="checked"'; ?>>
                       <label for="nm12">No</label>
                       <input id="dvsd12" type="radio" name="dosham" value="2" <?php if($horroscope_info->dosham=="2") echo 'checked="checked"'; ?>>
                       <label for="dvsd12">Yes</label>
                       <input id="wd45" type="radio" name="dosham" value="3" <?php if($horroscope_info->dosham=="3") echo 'checked="checked"'; ?>>
                       <label for="wd45">Don't Know</label>
                   </div>
                 </div>
                 <div class="clearfix"></div>
               </li>
               
               
          <!--     <li>
                 <div class="wed-reg-right-child1 paddingtop10">Upload horoscope</div>
                 <div class="wed-reg-right-child2">
                     <div class="row1">
                       <span><input class="wed-reg-input12 reg_input" type="file" name="horo_img" id="horo_img"></span>
                    
                       <?php if($horroscope_info->horo_img!=""):?>
                           <br>
                       <a href="<?php echo base_url();?>assets/uploads/horoscope/<?php echo $horroscope_info->horo_img;?>" download class="btn btn-success">Download Horoscope</a>
                      <?php endif?>
                     </div>
                   </div>
                 <div class="clearfix"></div>
               </li>  -->
          
 






<!----->
      </ul>
    </li>
    <li class="wed-detail-left">
      <div class="wed-space1">
      </div>
      <ul class="wed-inside-detail">






    <!---->  











      </ul>
    </li>
    <div class="clearfix"></div>
    </form>
  </ul>

<!---HOme horoscope start---->
<!---HOme edit end---->
<!---HOme edit start---->
<ul id="prof_preference_edit" style="display: none;">
  <form method="post" id="prefernce_form">
    <li class="wed-detail-left border-right1">
      <div class="wed-detail-head">
        <h5>Partner Preferences Details : </h5>
        <div class="wed-detail-edit no_backurl">
          <button type='submit' class="wed-go edit_prefernce_btn">Save</button>
        </div>
        <div class="clearfix"></div>
      </div>
      <ul class="wed-inside-detail">
      <li>
                      <div class="child1">
                        Age 
      
                      </div><br>
                      <div class="row1">
                      <span class="wed-or">from</span>
                      <span>
                        <select class="wed-reg-select2" name="age_from" required>
                          <!--<option disabled value="0">MIN</option>--><option value="">MIN</option>
                          <?php for($i=18;$i<=70;$i++) { ?>
                          <option value="<?php echo $i; ?>" <?php // if($preferences->age_from==$i) echo 'selected="SELECTED"'; ?>><?php echo $i; ?></option>
                          <?php } ?>
                        </select>
                      </span>
                      <span class="wed-or">To</span>
                      <span>
                        <select class="wed-reg-select2" name="age_to" required>
                          <!--<option disabled value="0">MAX</option>--><option value="">MAX</option>
                          <?php for($i=18;$i<=70;$i++) { ?>
                          <option value="<?php echo $i; ?>" <?php //if($preferences->age_to==$i) echo 'selected="SELECTED"'; ?>><?php echo $i; ?></option>
                          <?php } ?>
                        </select>
                      </span>
                    </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                      Height 
      <?php //print_r($heights);
       ?>
                      </div><br>
                      <div class="row1">
          <span class="wed-or">From</span>
                      <span></span>
                        <select class="wed-reg-select2" name="height_from_id" required>
                        <!--<option disabled value="0">MIN</option>> --><option value="">MIN</option>
                        <?php 
                     //   $heights=json_decode(json_encode($heights),true);
                     
                        ?>
                        <?php foreach($heights as $heightd) { ?>
                          <option value="<?php echo $heightd['height_id']; ?>" <?php ?>><?php echo $heightd['height']; ?></option>
                      <?php } ?>
                        </select>
                      
                      <span class="wed-or">To</span>
                      <span></span>
                        <select class="wed-reg-select2" name="height_to_id" required>
                   <!--     <option disabled value="0">MAX</option>--><option value="">MAX</option>
                        <?php foreach($heights as $heightd) { ?>
                          <option value="<?php echo $heightd['height_id']; ?>" <?php ?>><?php echo $heightd['height']; ?></option>
                      <?php } ?>
                        </select>
                      
                    </div>
                      <div class="clearfix"></div>
                    </li>
 

        <li>
        <div class="wed-reg-right-child1">Maritial Status</div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check">

                        <!--  <select class="wed-reg-select" name="maritial_status[]" id="maritial_status" multiple required>
                      <option value="">select</option>
                                <option value="1">Never Married</option>
                                <option value="2">Divorced</option>
                                <option value="3">Widowed</option>
                                <option value="4">Awaiting for Divorce</option>
                                
                                                
                             </select>

                             <div class="profile_check"> </div>-->

                        <input id="mnmt" class="drinking_sel" type="checkbox" name="maritial_status[]" value="1" <?php if(is_array($preferences->maritial_status)) { if(in_array('1', $preferences->maritial_status)) echo 'checked="checked"'; } ?>>
                        <label for="mnmt">Never Married</label>
                        <input id="mdd" class="drinking_sel" type="checkbox" name="maritial_status[]" value="2" <?php if(is_array($preferences->maritial_status)) { if(in_array('2', $preferences->maritial_status)) echo 'checked="checked"'; } ?>>
                        <label for="mdd">Divorced</label>
                        <input id="mwd" class="drinking_sel" type="checkbox" name="maritial_status[]" value="3" <?php if(is_array($preferences->maritial_status)) { if(in_array('3', $preferences->maritial_status)) echo 'checked="checked"'; } ?>>
                        <label for="mwd">Widowed</label>
                        <input id="mawd" class="drinking_sel" type="checkbox" name="maritial_status[]" value="4" <?php if(is_array($preferences->maritial_status)) { if(in_array('4', $preferences->maritial_status)) echo 'checked="checked"'; } ?>>
                        <label for="mawd">Awaiting for Divorce</label>
                   




                    </div>
                  </div>
                  <div class="clearfix"></div>
        </li>
<!----new more fields-->

<li>
                  <div class="wed-reg-right-child1">Physical Status</div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check">
    
                      <!--  <select class="wed-reg-select" name="physical_status[]" id="physical_status" multiple required>
                       <!-- <option value="">select</option>->
                                <option value="0">Doesn't Matter</option>
                                <option value="1">Normal</option>
                                <option value="2">Physically Challenged</option>
                                <option value="4">Awaiting for Divorce</option>
                                
                                                
                             </select> -->

                             <input id="pdt" class="physical_sel" type="checkbox" name="physical_status[]" value="0" <?php if(is_array($preferences->physical_status)) { if(in_array('0', $preferences->physical_status)) echo 'checked="checked"'; } ?>>
                        <label for="pdt">Doesn't Matter</label>

                             <input id="pn" class="physical_sel" type="checkbox" name="physical_status[]" value="1" <?php if(is_array($preferences->physical_status)) { if(in_array('1', $preferences->physical_status)) echo 'checked="checked"'; } ?>>
                        <label for="pn">Normal</label>
                        <input id="ppc" class="physical_sel" type="checkbox" name="physical_status[]" value="2" <?php if(is_array($preferences->physical_status)) { if(in_array('2', $preferences->physical_status)) echo 'checked="checked"'; } ?>>
                        <label for="ppc">Physically Challenged</label>
            




                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Eating Habits</div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check">

                   <!---     <select class="wed-reg-select" name="eating_habit[]" id="eating_habit" multiple required>
                       -> <option value="0">Doesn't Matter</option>
                                <option value="1">Vegetarian</option>
                                <option value="2">Non Vegitarian</option>
                                <option value="3">Eggetarian</option>
                            <!--  <option value="4">Awaiting for Divorce</option>   
                                
                                                
                             </select>-->
                             
                             <input id="edt" class="drinking_sel" type="checkbox" name="eating_habit[]" value="0" <?php if(is_array($preferences->eating_habit)) { if(in_array('0', $preferences->eating_habit)) echo 'checked="checked"'; } ?>>
                        <label for="edt">Doesn't Matter</label>
                             <input id="ev" class="drinking_sel" type="checkbox" name="eating_habit[]" value="1" <?php if(is_array($preferences->eating_habit)) { if(in_array('1', $preferences->eating_habit)) echo 'checked="checked"'; } ?>>
                        <label for="ev">Vegitarian</label>
                        <input id="env" class="drinking_sel" type="checkbox" name="eating_habit[]" value="2" <?php if(is_array($preferences->eating_habit)) { if(in_array('2', $preferences->eating_habit)) echo 'checked="checked"'; } ?>>
                        <label for="env">Non Vegitarian</label>
                        <input id="ee" class="drinking_sel" type="checkbox" name="eating_habit[]" value="3" <?php if(is_array($preferences->eating_habit)) { if(in_array('3', $preferences->eating_habit)) echo 'checked="checked"'; } ?>>
                        <label for="ee">Eggetarian</label>
  
                   

                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Drinking Habits</div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check">
                        <input id="drinking_all" type="checkbox" name="drinking_habit[]" value="0" <?php if(is_array($preferences->drinking_habit)) { if(empty($preferences->drinking_habit)) echo 'checked="checked"'; ?> <?php if(in_array('0', $preferences->drinking_habit)) echo 'checked="checked"'; } ?>>
                        <label for="drinking_all">Doesn't Matter</label>
                        <input id="nmt" class="drinking_sel" type="checkbox" name="drinking_habit[]" value="1" <?php if(is_array($preferences->drinking_habit)) { if(in_array('1', $preferences->drinking_habit)) echo 'checked="checked"'; } ?>>
                        <label for="nmt">Never Drinks</label>
                        <input id="dvsdt" class="drinking_sel" type="checkbox" name="drinking_habit[]" value="2" <?php if(is_array($preferences->drinking_habit)) { if(in_array('2', $preferences->drinking_habit)) echo 'checked="checked"'; } ?>>
                        <label for="dvsdt">Drinks Socialy</label>
                        <input id="wdt" class="drinking_sel" type="checkbox" name="drinking_habit[]" value="3" <?php if(is_array($preferences->drinking_habit)) { if(in_array('3', $preferences->drinking_habit)) echo 'checked="checked"'; } ?>>
                        <label for="wdt">Drinks Regularly</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Smoking Habits </div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check">
                        <input id="smoking_all" type="checkbox" name="smoking_habit[]" value="0" <?php if(empty($preferences->smoking_habit)) echo 'checked="checked"'; ?> <?php if(is_array($preferences->smoking_habit)){if(in_array('0', $preferences->smoking_habit)) echo 'checked="checked"';} ?>>
                        <label for="smoking_all">Doesn't Matter</label>
                        <input id="nmr" class="smoking_sel" type="checkbox" name="smoking_habit[]" value="1" <?php if(is_array($preferences->smoking_habit)){if(in_array('1', $preferences->smoking_habit)) echo 'checked="checked"';} ?>>
                        <label for="nmr">Never Smokes</label>
                        <input id="dvsdr" class="smoking_sel" type="checkbox" name="smoking_habit[]" value="2" <?php if(is_array($preferences->smoking_habit)){if(in_array('2', $preferences->smoking_habit)) echo 'checked="checked"';} ?>>
                        <label for="dvsdr">Smokes Occasionaly</label>
                        <input id="wgdr" class="smoking_sel" type="checkbox" name="smoking_habit[]" value="3" <?php if(is_array($preferences->smoking_habit)){if(in_array('3', $preferences->smoking_habit)) echo 'checked="checked"';} ?>>
                        <label for="wgdr">Smokes Regularly</label> 
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                <div class="child1">
                Partner Description
          </div>
       
          <div class="child2">
                  <textarea class="wed-reg-textarea" name="about_partner" rows="4" cols="25" minlength="50" placeholder="Describe your expectations.minimum 50 characters" required><?php echo $preferences->about_partner; ?></textarea>
          </div>
                </li>
<!--- more fields end-->





      </ul>
    </li>
    <li class="wed-detail-left">
      <div class="wed-space1">
      </div>
      <ul class="wed-inside-detail">
      <li>
                  <div class="wed-reg-right-child1 paddingtop10">Religion</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select religion-selector" name="religion" required>
                          <option  value="">- Select Religion -</option>
                          <?php foreach($religions as $rlgn) { ?>
                              <option value="<?php echo $rlgn->religion_id; ?>" <?php if($preferences->religion==$rlgn->religion_id) echo 'selected="SELECTED"'; ?>><?php echo $rlgn->religion_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Mother Tongue</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select" name="mother_language" required>
                          <option   value="">- Select Mother Tongue -</option>
                          <?php foreach($mother_tongue as $mthr_tng) { ?>
                              <option value="<?php echo $mthr_tng->mother_tongue_id; ?>"  <?php if($preferences->mother_language==$mthr_tng->mother_tongue_id) echo 'selected="SELECTED"'; ?>><?php echo $mthr_tng->mother_tongue_name ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Caste / Division</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select caste-selector" name="caste[]" multiple required>
                        <?php
                        foreach ($castes as $rs) {?>
                          <option value="<?php echo $rs->caste_id;?>" <?php if(in_array($rs->caste_id, $preferences->caste)) echo 'selected="SELECTED"'; ?> ><?php echo $rs->caste_name; ?></option>
                        <?php } ?>
                        
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>

      <li>
                  <div class="wed-reg-right-child1 paddingtop10">Country</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select ctry_drop" name="country[]" multiple="multiple" required>
                          <?php foreach($country as $ctry) { ?>
                              <option value="<?php echo $ctry->country_id; ?>" <?php if(is_array( $preferences->country)){if(in_array($ctry->country_id,$preferences->country)) echo 'selected="SELECTED"'; }else if($ctry->country_id==$preferences->country){ echo 'selected="SELECTED"';}?>><?php echo $ctry->country_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">State</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select state_drop" name="state[]" multiple="multiple">
                          <?php foreach($states as $state) { ?>
                              <option value="<?php echo $state->state_id; ?>" <?php if(is_array( $preferences->state)){if(in_array($state->state_id, $preferences->state)) echo 'selected="SELECTED"';}else if($state->state_id==$preferences->state){ echo 'selected="SELECTED"';} ?>><?php echo $state->state_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>

    <!--  <li>
                 <div class="wed-reg-right-child1 paddingtop10">Gothram</div>
                 <div class="wed-reg-right-child2">
                      <div class="row1">
                        <span><input class="wed-reg-input12 reg_input" type="text" name="gothram" id="gothram" value="<?php echo $horroscope_info->gothram;?>" required></span>
                    </div>
                   </div>
                 <div class="clearfix"></div>
               </li> -->

        <!--       <li>
                 <div class="wed-reg-right-child1 paddingtop10">Padam</div>
                 <div class="wed-reg-right-child2">
                     <div class="row1">
                       <select class="wed-reg-select" name="padam">
                          <option value="0">Option</option>
                          <option value="1 Padam" <?php if($horroscope_info->padam=="1 Padam") echo 'selected="SELECTED"'; ?>>1 Padam</option>
                          <option value="2 Padam" <?php if($horroscope_info->padam=="2 Padam") echo 'selected="SELECTED"'; ?>>2 Padam</option>
                          <option value="3 Padam" <?php if($horroscope_info->padam=="3 Padam") echo 'selected="SELECTED"'; ?>>3 Padam</option>
                          <option value="4 Padam" <?php if($horroscope_info->padam=="4 Padam") echo 'selected="SELECTED"'; ?>>4 Padam</option>                  
                       </select>
                     </div>
                   </div>
                 <div class="clearfix"></div>
               </li> -->


      <li>
                  <div class="wed-reg-right-child1 paddingtop10">Education</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select educ_drop" name="education[]" multiple required>
                        <option value="">Option</option>
                          <?php foreach($educations as $education) { ?>
                              <option <?php if(is_array($preferences->education)){if(in_array($education->education_id, $preferences->education)) echo 'selected="SELECTED"';} elseif($preferences->occupation==$occup->occupation_id){echo 'selected="SELECTED"';} ?> value="<?php echo $education->education_id; ?>"><?php echo $education->education; ?></option>
                          <?php } ?>
                        </select>
                      </div>
   
                    <div class="clearfix"></div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Occupation</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select occup_drop" name="occupation[]" multiple="multiple">
                          <?php foreach($occupations as $occup) { ?>
                              <option <?php if(is_array($preferences->occupation)){if(in_array($occup->occupation_id,$preferences->occupation)) echo 'selected="SELECTED"';}elseif($preferences->occupation==$occup->occupation_id){echo 'selected="SELECTED"';} ?> value="<?php echo $occup->occupation_id; ?>"><?php echo $occup->occupation; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Annual Income</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select" name="min_income">
                          <option disabled value="0">MIN</option>
                          <option value="0">Any</option>
                          <option>0</option>
                          <option value="50000" <?php if($preferences->min_income=="50000") echo 'selected="SELECTED"'; ?>>50,000</option>
                          <option value="100000" <?php if($preferences->min_income=="100000") echo 'selected="SELECTED"'; ?>>1,00,000</option>
                          <option value="250000" <?php if($preferences->min_income=="250000") echo 'selected="SELECTED"'; ?>>2,50,000</option>
                          <option value="500000" <?php if($preferences->min_income=="500000") echo 'selected="SELECTED"'; ?>>5,00,000</option>
                          <option value="1000000" <?php if($preferences->min_income=="1000000") echo 'selected="SELECTED"'; ?>>10,00,000</option>
                        </select>
                        <select class="wed-reg-select" name="max_income">
                          <option disabled value="0">MAX</option>
                          <option value="0">Any</option>
                          <option value="50000" <?php if($preferences->max_income=="50000") echo 'selected="SELECTED"'; ?>>50,000</option>
                          <option value="100000" <?php if($preferences->max_income=="100000") echo 'selected="SELECTED"'; ?>>1,00,000</option>
                          <option value="250000" <?php if($preferences->max_income=="250000") echo 'selected="SELECTED"'; ?>>2,50,000</option>
                          <option value="500000" <?php if($preferences->max_income=="500000") echo 'selected="SELECTED"'; ?>>5,00,000</option>
                          <option value="1000000" <?php if($preferences->max_income=="1000000") echo 'selected="SELECTED"'; ?>>10,00,000</option>
                          <option value="1000001" <?php if($preferences->max_income=="1000001") echo 'selected="SELECTED"'; ?>>10,00,000 &amp; Above</option>
                        </select>
                  <!--      <span><select class="wed-reg-select1 cst-select-1" cst-attr="currency" cst-for="city" id="currency-selector" name="income_currency">

                          <?php foreach($currencies as $currency) { ?>
                              <option value="<?php echo $currency->symbol.' - '.$currency->code; ?>" <?php if($preferences->income_currency==$currency->symbol.' - '.$currency->code) echo 'selected="SELECTED"'; ?>><?php echo $currency->symbol.' - '.$currency->code; ?></option>
                          <?php } ?>  
                          
                        </select></span> -->
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>


                <li>
                 <div class="wed-reg-right-child1 paddingtop10">Star</div>
                 <div class="wed-reg-right-child2">
                     <div class="row1">
                       <select id="test" prof_preference_edit_btnmultiple="multiple" name="star[]">  <!----->
                          <option  value="0">none</option>
                          <?php foreach($stars as $star) { ?>
                              <option value="<?php echo $star->star_id; ?>" <?php if($preferences->star==$star->star_id) echo 'selected="SELECTED"'; ?>><?php echo $star->star_name; ?></option>
                          <?php } ?>                  
                       </select>
                     </div>
                   </div>
                 <div class="clearfix"></div>
               </li>



      </ul>
    </li>
    <div class="clearfix"></div>
    </form>
  </ul>

<!---HOme edit end---->


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
    $(document).on("click","#prof_preference_edit_btn",function() {
        $('#prof_preference_edit').show();
        $('#prof_preference_ul').replaceWith($('#prof_preference_edit'));
    });
    $(document).on("click","#prof_horoscope_edit_btn",function() {
        $('#prof_horoscope_edit').show();
        $('#prof_horoscope_ul').replaceWith($('#prof_horoscope_edit'));
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
//edit_prefernce_btn
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


    $(document).on("click",".edit_horoscope_btn",function() {
      event.preventDefault();
      //if($('#edit_form').parsley().validate()) {
      var value =$("#horoscope_form").serialize();
      console.log(value);
      $.ajax({
        type: "POST",
        url: base_url+'Home/update_profile1',
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


    $(document).on("click",".edit_prefernce_btn",function() {
      event.preventDefault();
      //if($('#edit_form').parsley().validate()) {
      var value =$("#prefernce_form").serialize();
      console.log(value);
      $.ajax({
        type: "POST",
        url: base_url+'Home/update_preference',
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

  /*  $(document).on("click",".edit_preference_btn",function() {
      event.preventDefault();
      //if($('#edit_form').parsley().validate()) {
      var value =$("#family_form").serialize();
      console.log(value);
      $.ajax({
        type: "POST",
        url: base_url+'Home/update_preference',
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
    });  */

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
<script>
    $(document).ready(function () {
            $(document).on("click", ".MultiCheckBox", function () {
                var detail = $(this).next();
                detail.show();
            });

            $(document).on("click", ".MultiCheckBoxDetailHeader input", function (e) {
                e.stopPropagation();
                var hc = $(this).prop("checked");
                $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", hc);
                $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
            });

            $(document).on("click", ".MultiCheckBoxDetailHeader", function (e) {
                var inp = $(this).find("input");
                var chk = inp.prop("checked");
                inp.prop("checked", !chk);
                $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", !chk);
                $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
            });

            $(document).on("click", ".MultiCheckBoxDetail .cont input", function (e) {
                e.stopPropagation();
                $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();

                var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
                $(".MultiCheckBoxDetailHeader input").prop("checked", val);
            });

            $(document).on("click", ".MultiCheckBoxDetail .cont", function (e) {
                var inp = $(this).find("input");
                var chk = inp.prop("checked");
                inp.prop("checked", !chk);

                var multiCheckBoxDetail = $(this).closest(".MultiCheckBoxDetail");
                var multiCheckBoxDetailBody = $(this).closest(".MultiCheckBoxDetailBody");
                multiCheckBoxDetail.next().UpdateSelect();

                var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
                $(".MultiCheckBoxDetailHeader input").prop("checked", val);
            });

            $(document).mouseup(function (e) {
                var container = $(".MultiCheckBoxDetail");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.hide();
                }
            });
        });

        var defaultMultiCheckBoxOption = { width: '220px', defaultText: 'Select Below', height: '200px' };

        jQuery.fn.extend({
            CreateMultiCheckBox: function (options) {

                var localOption = {};
                localOption.width = (options != null && options.width != null && options.width != undefined) ? options.width : defaultMultiCheckBoxOption.width;
                localOption.defaultText = (options != null && options.defaultText != null && options.defaultText != undefined) ? options.defaultText : defaultMultiCheckBoxOption.defaultText;
                localOption.height = (options != null && options.height != null && options.height != undefined) ? options.height : defaultMultiCheckBoxOption.height;

                this.hide();
                this.attr("multiple", "multiple");
                var divSel = $("<div class='MultiCheckBox'>" + localOption.defaultText + "<span class='k-icon k-i-arrow-60-down'><svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='sort-down' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' class='svg-inline--fa fa-sort-down fa-w-10 fa-2x'><path fill='currentColor' d='M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z' class=''></path></svg></span></div>").insertBefore(this);
                divSel.css({ "width": localOption.width });

                var detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailHeader'><input type='checkbox' class='mulinput' value='-1982' /><div>Select All</div></div><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
                detail.css({ "width": parseInt(options.width) + 10, "max-height": localOption.height });
                var multiCheckBoxDetailBody = detail.find(".MultiCheckBoxDetailBody");

                this.find("option").each(function () {
                    var val = $(this).attr("value");

                    if (val == undefined)
                        val = '';

                    multiCheckBoxDetailBody.append("<div class='cont'><div><input type='checkbox' class='mulinput' value='" + val + "' /></div><div>" + $(this).text() + "</div></div>");
                });

                multiCheckBoxDetailBody.css("max-height", (parseInt($(".MultiCheckBoxDetail").css("max-height")) - 28) + "px");
            },
            UpdateSelect: function () {
                var arr = [];

                this.prev().find(".mulinput:checked").each(function () {
                    arr.push($(this).val());
                });

                this.val(arr);
            },
        });
    </script>


</body></html>