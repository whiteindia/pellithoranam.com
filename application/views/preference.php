<style>.wed-reg-select2{ width:170px; }</style>

<div class="wed-wrapper">
    <div class="wed-reg-top-banner1">
      <div class="container container-custom">
        <div class="row">
          <div class="col-md-3">
            <div class="wed-reg-tick1">
			  <img src="<?php echo base_url(); ?>assets/img/life-reg.png">
            </div>
          </div>
          <div class="col-md-9">
            <div class="wed-reg-banner-detail1">
              <h4>State your Preferences to find suitable matches</h4>
        <!--      <p>You have <strong>1800</strong> </p>
              <p>Matching Profiles based on your details</p>-->
              <p>Pellithoranam is the most Trusted matrimony, Call up and connect with your prospects instantly</p>
              <h6>You can edit your Partner Preferences any time</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- REGESTRATION-REGISTRATION-DETAILS -->
<form method="post" id="prefs_form" action="<?php echo base_url();?>profile/save_partner_preference" enctype="multipart/form-data">
    <div class="wed-reg-details">
      <div class="container container-custom">
        <div class="row">
          <div class="col-md-12">
            <div class="wed-reg-right">
			<div class="wed-reg-div1">
              <h6>Basic Details</h6>
              <hr>
              <ul>
                <li>
                  <div class="wed-reg-right-child1">Age</div>
                  <div class="wed-reg-right-child2">
                    <div class="row1">
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

                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Height</div>
                  <div class="wed-reg-right-child2">
                    <div class="row1">
                      <span>
                        <select class="wed-reg-select2" name="height_from_id" required>
                        <!--<option disabled value="0">MIN</option>> --><option value="">MIN</option>
                        <?php foreach($heights as $heightd) { ?>
                          <option value="<?php echo $heightd->height_id; ?>" <?php // //if($preferences->height_from_id==$heightd->height_id) echo 'selected="SELECTED"'; ?>><?php echo $heightd->height; ?></option>
                      <?php } ?>
                        </select>
                      </span>
                      <span class="wed-or">To</span>
                      <span>
                        <select class="wed-reg-select2" name="height_to_id" required>
                   <!--     <option disabled value="0">MAX</option>--><option value="">MAX</option>
                        <?php foreach($heights as $heightd) { ?>
                          <option value="<?php echo $heightd->height_id; ?>" <?php // if($preferences->height_to_id==$heightd->height_id) echo 'selected="SELECTED"'; ?>><?php echo $heightd->height; ?></option>
                      <?php } ?>
                        </select>
                      </span>
                    </div>

                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Maritial Status</div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check">
                  <!--      <input id="nm1" type="checkbox"  name="maritial_status[]" value="1" <?php //if(empty($preferences->maritial_status)) echo 'checked="checked"'; ?> <?php //if(in_array('1', $preferences->maritial_status)) echo 'checked="checked"'; ?> required> 
                        <label for="nm1">Never Married</label>
                        <input id="dvsd1" type="checkbox" <?php //if(in_array('2', $preferences->maritial_status)) echo 'checked="checked"'; ?> name="maritial_status[]" value="2">
                        <label for="dvsd1">Divorced</label>
                        <input id="wd1" type="checkbox" <?php //if(in_array('3', $preferences->maritial_status)) echo 'checked="checked"'; ?> name="maritial_status[]" value="3">
                        <label for="wd1">Widowed</label>
                        <input id="advsd1" type="checkbox" <?php //if(in_array('4', $preferences->maritial_status)) echo 'checked="checked"'; ?> name="maritial_status[]" value="4">
                        <label for="advsd1">Awaiting for Divorce</label> -->
                        <select class="wed-reg-select" name="maritial_status[]" id="maritial_status" multiple required>
                       <!-- <option value="">select</option>-->
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
                  <div class="wed-reg-right-child1">Physical Status</div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check">
                  <!--      <input id="physical_all" type="checkbox" <?php if(in_array('0', $preferences->physical_status)) echo 'checked="checked"'; ?> name="physical_status[]" value="0" <?php if(empty($preferences->physical_status)) echo 'checked="checked"'; ?> >
                        <label for="physical_all">Doesn't Matter</label>
                        <input id="nms" <?php if(in_array('1', $preferences->physical_status)) echo 'checked="checked"'; ?> class="physical_sel" type="checkbox" name="physical_status[]" value="1" >
                        <label for="nms">Normal</label>
                        <input id="dvsds" <?php if(in_array('2', $preferences->physical_status)) echo 'checked="checked"'; ?> class="physical_sel" type="checkbox" name="physical_status[]" value="2">
                        <label for="dvsds">Physically Challenged</label>
                        -->
                        <select class="wed-reg-select" name="physical_status[]" id="physical_status" required>
                       <!----> <option value="">select</option>
                                <option value="1">Doesn't Matter</option>
                                <option value="2">Normal</option>
                                <option value="3">Physically Challenged</option>
                             <!--   <option value="4">Awaiting for Divorce</option> -->
                                
                                                
                             </select>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Eating Habits</div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check">
                        <input id="eating_all" type="checkbox" name="eating_habit[]" value="0" <?php if(empty($preferences->eating_habit)) echo 'checked="checked"'; ?> <?php if(in_array('0', $preferences->eating_habit)) echo 'checked="checked"'; ?>>
                        <label for="eating_all">Doesn't Matter</label>
                        <input id="nmp" class="eating_sel" type="checkbox" name="eating_habit[]" value="1" <?php if(in_array('1', $preferences->eating_habit)) echo 'checked="checked"'; ?> >
                        <label for="nmp">Vegetarian</label>
                        <input id="dvsdp" class="eating_sel" type="checkbox" name="eating_habit[]" value="2" <?php if(in_array('2', $preferences->eating_habit)) echo 'checked="checked"'; ?>>
                        <label for="dvsdp">Non Vegitarian</label>
                        <input id="wdp" class="eating_sel" type="checkbox" name="eating_habit[]" value="3" <?php if(in_array('3', $preferences->eating_habit)) echo 'checked="checked"'; ?>>
                        <label for="wdp">Eggetarian</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Drinking Habits</div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check">
                        <input id="drinking_all" type="checkbox" name="drinking_habit[]" value="0" <?php if(empty($preferences->drinking_habit)) echo 'checked="checked"'; ?> <?php if(in_array('0', $preferences->drinking_habit)) echo 'checked="checked"'; ?>>
                        <label for="drinking_all">Doesn't Matter</label>
                        <input id="nmt" class="drinking_sel" type="checkbox" name="drinking_habit[]" value="1" <?php if(in_array('1', $preferences->drinking_habit)) echo 'checked="checked"'; ?>>
                        <label for="nmt">Never Drinks</label>
                        <input id="dvsdt" class="drinking_sel" type="checkbox" name="drinking_habit[]" value="2" <?php if(in_array('2', $preferences->drinking_habit)) echo 'checked="checked"'; ?>>
                        <label for="dvsdt">Drinks Socialy</label>
                        <input id="wdt" class="drinking_sel" type="checkbox" name="drinking_habit[]" value="3" <?php if(in_array('3', $preferences->drinking_habit)) echo 'checked="checked"'; ?>>
                        <label for="wdt">Drinks Regularly</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Smoking Habits</div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check">
                        <input id="smoking_all" type="checkbox" name="smoking_habit[]" value="0" <?php if(empty($preferences->smoking_habit)) echo 'checked="checked"'; ?> <?php if(in_array('0', $preferences->smoking_habit)) echo 'checked="checked"'; ?>>
                        <label for="smoking_all">Doesn't Matter</label>
                        <input id="nmr" class="smoking_sel" type="checkbox" name="smoking_habit[]" value="1" <?php if(in_array('1', $preferences->smoking_habit)) echo 'checked="checked"'; ?>>
                        <label for="nmr">Never Smokes</label>
                        <input id="dvsdr" class="smoking_sel" type="checkbox" name="smoking_habit[]" value="2" <?php if(in_array('2', $preferences->smoking_habit)) echo 'checked="checked"'; ?>>
                        <label for="dvsdr">Smokes Occasionaly</label>
                        <input id="wgdr" class="smoking_sel" type="checkbox" name="smoking_habit[]" value="3" <?php if(in_array('3', $preferences->smoking_habit)) echo 'checked="checked"'; ?>>
                        <label for="wgdr">Smokes Regularly</label> 
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>


              </ul>
			  </div>
			  <div class="wed-reg-div1">
              <h6>Religion Preferences</h6>
              <hr>
              <ul>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Religion</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select religion-selector" name="religion">
                          <option  value="0">- Select Religion -</option>
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
                        <select class="wed-reg-select" name="mother_language">
                          <option   value="0">- Select Mother Tongue -</option>
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
                        <select class="wed-reg-select caste-selector" name="caste[]" multiple="multiple">
                        <?php
                        foreach ($castes as $rs) {?>
                          <option value="<?php echo $rs->caste_id;?>" <?php if(in_array($rs->caste_id, $preferences->caste)) echo 'selected="SELECTED"'; ?> ><?php echo $rs->caste_name; ?></option>
                        <?php } ?>
                        
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
               <!--  <li>
                  <div class="wed-reg-right-child1 paddingtop10">Star</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select" name="star">
                          <option value="0">- Select Star -</option>
                          <?php foreach($stars as $strs) { ?>
                              <option value="<?php echo $strs->star_id; ?>"><?php echo $strs->star_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li> -->
                <!-- <li>
                  <div class="wed-reg-right-child1">Manglik</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                        <input id="nm" type="radio">
                        <label for="nm">Yes</label>
                        <input id="dvsd" type="radio">
                        <label for="dvsd">No</label>
                        <input id="wd" type="radio">
                        <label for="wd">Doesn't Matter</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li> -->
              </ul>
			  </div>
			  <div class="wed-reg-div1">
              <h6>Location</h6>
              <hr>
              <ul>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Country</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select ctry_drop" name="country[]" multiple="multiple">
                          <?php foreach($country as $ctry) { ?>
                              <option value="<?php echo $ctry->country_id; ?>" <?php if(in_array($ctry->country_id,$preferences->country)) echo 'selected="SELECTED"'; ?>><?php echo $ctry->country_name; ?></option>
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
                              <option value="<?php echo $state->state_id; ?>" <?php if(in_array($state->state_id, $preferences->state)) echo 'selected="SELECTED"'; ?>><?php echo $state->state_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
                <!-- <li>
                  <div class="wed-reg-right-child1 paddingtop10">District</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
						<select class="wed-reg-select city_drop" name="city[]" multiple="multiple">
                          <?php foreach($city as $city) { ?>
                              <option value="<?php echo $city->city_id; ?>" <?php if(in_array($city->city_id, $preferences->city)) echo 'selected="SELECTED"'; ?>><?php echo $city->city_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li> -->
              </ul>
			  </div>
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
                        <span><input class="wed-reg-input12 reg_input" type="text" name="gothram" id="gothram" value="<?php echo $horroscope_info->gothram;?>" required></span>
                    </div>
                   </div>
                 <div class="clearfix"></div>
               </li>
               <li>
                 <div class="wed-reg-right-child1 paddingtop10">Star</div>
                 <div class="wed-reg-right-child2">
                     <div class="row1">
                       <select class="wed-reg-select" name="star">
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
               
               
               <li>
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
               </li>
          </ul>
        </div>
			  <div class="wed-reg-div1">
              <h6>Professional Preferences</h6>
              <hr>
              <ul>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Education</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select educ_drop" name="education[]" multiple="multiple">
                          <?php foreach($educations as $education) { ?>
                              <option <?php if(in_array($education->education_id, $preferences->education)) echo 'selected="SELECTED"'; ?> value="<?php echo $education->education_id; ?>"><?php echo $education->education; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    <!-- <div class="category">
                      <p>Select Catagory</p>
                      <ul>
                        <?php foreach($educations as $education) { ?>
                                <li>
                                  <div class="wed-custom-check1">
                                      <input id="check_<?php echo $education->education_id; ?>" type="checkbox" name="education[]" value="<?php echo $education->education_id; ?>">
                                      <label for="check_<?php echo $education->education_id; ?>">
                                      <?php echo $education->education; ?></label>
                                      <div class="clearfix"></div>
                                  </div>
                                </li>
                        <?php } ?>
                      </ul>
                    </div> -->
                    <!-- <div class="category">
                      <p>Select Catagory</p>
                      <ul>
                        <li>
                          BA
                        </li>
                        <li>
                          MA
                        </li>
                        <li>
                          MCOM
                        </li>
                      </ul>
                    </div> -->
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
                              <option <?php if(in_array($occup->occupation_id, $preferences->occupation)) echo 'selected="SELECTED"'; ?> value="<?php echo $occup->occupation_id; ?>"><?php echo $occup->occupation; ?></option>
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
                        <span><select class="wed-reg-select1 cst-select-1" cst-attr="currency" cst-for="city" id="currency-selector" name="income_currency">

                          <?php foreach($currencies as $currency) { ?>
                              <option value="<?php echo $currency->symbol.' - '.$currency->code; ?>" <?php if($preferences->income_currency==$currency->symbol.' - '.$currency->code) echo 'selected="SELECTED"'; ?>><?php echo $currency->symbol.' - '.$currency->code; ?></option>
                          <?php } ?>  
                          
                        </select></span>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
              </ul>
			  </div>
			  <div class="wed-reg-div1">
              <h6>Partner Description</h6>
              <hr>
              <ul>
                <li>
                  <textarea class="wed-reg-textarea" name="about_partner" rows="4" cols="50" placeholder="Describe your expectations.minimum 100 characters"><?php echo $preferences->about_partner; ?></textarea>
                </li>
                <li>
                  <button class="wed-submit-btn1 prefs_save_btn" type="submit" >Submit</button>
                  <button class="wed-skip-btn1" type="button" id="skip_btn">Skip</button>
                </li>
                
              </ul>
			  </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    </form>

</div>

<script>
$( document ).ready(function() {

$(".religion-selector").on('change', function () {
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

$(".cst-select-1").on('change', function () {
    var valueSelected = $(this).val();
    var select_type   = $(this).attr('cst-attr');
    var select_destn  = $(this).attr('cst-for');
    var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;

    $.ajax({
    type: "POST",
    url : '<?php echo base_url(); ?>home/get_drop_data',
    data:  passdata_2,
    success: function(data){
           $("#"+select_destn+"-selector").html(data);
        }
    });
});

    // $(document).on("click",".prefs_save_btn",function() {
    //     //if($('#edit_form').parsley().validate()) {

    //         var value =$("#prefs_form").serialize();
    //         //console.log(value);
    //         $.ajax({
    //             type: "POST",
    //             url: base_url+'profile/save_partner_preference',
    //             data: value,
    //             error: function (err) {
    //                 console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
    //             },
    //             success: function(data) {
    //               console.log(data);
    //               window.location.href= base_url+"profile/my_profile";
    //             }
    //         });
    //     //}
    // });

});

$('#physical_all').on('click',function(){
  var checked = $(this).is(':checked');

  if(checked==true){
    $('.physical_sel').attr('checked', false);
  }
})

$('.physical_sel').on('click',function(){
  var checked = $(this).is(':checked');

  if(checked==true){
    $('#physical_all').attr('checked', false);
  }
})









$('#eating_all').on('click',function(){
  var checked = $(this).is(':checked');

  if(checked==true){
    $('.eating_sel').attr('checked', false);
  }
})

$('.eating_sel').on('click',function(){
  var checked = $(this).is(':checked');

  if(checked==true){
    $('#eating_all').attr('checked', false);
  }
})



$('#drinking_all').on('click',function(){
  var checked = $(this).is(':checked');

  if(checked==true){
    $('.drinking_sel').attr('checked', false);
  }
})

$('.drinking_sel').on('click',function(){
  var checked = $(this).is(':checked');

  if(checked==true){
    $('#drinking_all').attr('checked', false);
  }
})

$('#smoking_all').on('click',function(){
  var checked = $(this).is(':checked');

  if(checked==true){
    $('.smoking_sel').attr('checked', false);
  }
})

$('.smoking_sel').on('click',function(){
  var checked = $(this).is(':checked');

  if(checked==true){
    $('#smoking_all').attr('checked', false);
  }
})

$('.ctry_drop').on('change',function(){
  var value = 'country='+$(this).val();
  $.ajax({
      type: "POST",
      url: base_url+'profile/get_state',
      data: value,
      error: function (err) {
          console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
      },
      success: function(data) {
        var state = $('.state_drop').val();

        $(".state_drop").val(null).trigger("change"); 

         //$(".state_drop option[value]").remove();

        if(state!=null){
          var array = state.toString().split(",").map(Number);
        } else {
          var array = new Array();
        }

        $('.state_drop').html('');
        rs = JSON.parse(data);
       

        
        
        $.each(rs,function(index,value){
          

          var res = inArray(value.state_id, array);
          console.log(res);
          $(".state_drop").val(array).trigger("change"); 
          
          if(res){
            var select = 'selected="SELECTED"';
          }
          $('.state_drop').append('<option value="'+value.state_id+'">'+value.state_name+'</option>');
        })


        
        //window.location.href= base_url+"profile/my_profile";
      }
  });
})


function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}

$('#skip_btn').on('click',function(){
  window.location.href= base_url+"profile/my_profile";
})




</script>
