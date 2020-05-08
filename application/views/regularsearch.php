
<div class="wed-wrapper">
    <div class="wed-reg-top-banner">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="wed-reg-search">
              <img src="<?php echo base_url(); ?>assets/img/regular-search.png">
            </div>
          </div>
          <div class="col-md-9">
            <div class="wed-reg-search-banner-detail">
              <p><strong>Find</strong> </p>
              <p>Matching Profiles based on your details</p>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- REGULAR-SEARCH -->
    <div class="wed-reg-search-div">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="wed-reg-search-id">
                <form method="post" id="search_form" action="<?php echo base_url();?>search/searchbyid">
                    <p>Search by ID</p>
                    <input type='text' id='matr_id' class="wed-search-id-input" placeholder='SM12345' name='matri_id'>
                    <button class="wed-go" type="submit">Go</button>
                </form>
              </div>
            </div>
            <div class="col-md-9">
              <div class="wed-reg-search-content">
                <ul class="wed-reg-tab-bay">
                    <li class="active"><a data-toggle="tab" href="#rs" id="regular_click">Regular Search</a></li>
                    <li><a data-toggle="tab" href="#as" id="advanced_click">Advanced Search</a></li>
                    <?php /*<li><a data-toggle="tab" href="#ks" id="keyword_click">Keyword Search</a></li> */?>
                    <div class="clearfix"></div>
                </ul>
                <div class="tab-content">

                  <div id="rs" class="tab-pane fade in active">
                  <form method="post" id="regular_forms" action="<?php echo base_url(); ?>search">
                  <input type="hidden" name="search_type" value="1">
                    <div class="wed-reg-right">
                      <ul>
                        <li>
                          <div class="wed-reg-right-child1">For</div>
                          <div class="wed-reg-right-child2" style="width:80%; height:45px">
                            <div class="wed-custom5">
                              <?php if($this->session->userdata('logged_in')) {
                                $gender = $this->session->userdata('logged_in')->gender;
                                if($gender == "male") { ?>
                                  <input id="male1" type="radio" name="gender" value="<?php echo $gender; ?>" checked="checked">
                                  <label for="male1">Bride</label>
                                <?php } else { ?>
                                  <input id="female1" type="radio" name="gender" value="male" checked="checked">
                                  <label for="female1">Groom</label>
							  <?php } } ?>
                              </div>
                            </div>
                          </li>
                          <div class="clearfix"></div>
                          <li>

                          <div class="wed-reg-right-child1">Age</div>
                          <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span>
                                <select class="wed-reg-select2" name="age_from" style="width: 160px; padding-left:5px">
                                <option disabled value="">MIN</option>
                                  <?php for($i=18;$i<=70;$i++) { ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                </select>
                              </span>
                              <span class="wed-or">To</span>
                              <span>
                                <select class="wed-reg-select2" name="age_to" style="width: 160px; padding-left:5px">
                                <option disabled value="">MAX</option>
                                  <?php for($i=18;$i<=70;$i++) { ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                </select>
                              </span>
                            </div>

                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <!--<li>
                          <div class="wed-reg-right-child1">Height</div>
                          <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span>
                                <select class="wed-reg-select2" name="height_from" style="width: 160px; padding-left:5px">
                                <option disabled value="">MIN</option>
                                  <?php foreach($heights as $heightd) { ?>
                                      <option value="<?php echo $heightd->height_id; ?>"><?php echo $heightd->height; ?></option>
                                  <?php } ?>
                                </select>
                              </span>
                              <span class="wed-or">To</span>
                              <span>
                                <select class="wed-reg-select2" name="height_to" style="width: 160px; padding-left:5px">
                                <option disabled value="">MAX</option>
                                  <?php foreach($heights as $heightd) { ?>
                                      <option value="<?php echo $heightd->height_id; ?>"><?php echo $heightd->height; ?></option>
                                  <?php } ?>
                                </select>
                              </span>
                            </div>

                          </div>
                          <div class="clearfix"></div>
                        </li>-->
                        <li>
                          <div class="wed-reg-right-child1">Maritial Status</div>
                          <div class="wed-reg-right-child2">
                            <div class="profile_check advance">
                                <input id="nm756" type="checkbox" name="mart[]" value="1" checked="checked">
                                <label for="nm756">Never Married</label>
                                <input id="dvsd234" type="checkbox" name="mart[]" value="2">
                                <label for="dvsd234">Divorced</label>
                                <input id="wd980" type="checkbox" name="mart[]" value="3">
                                <label for="wd980">Widowed</label>
                                <input id="advsd566" type="checkbox" name="mart[]" value="4">
                                <label for="advsd566">Awaiting for Divorce</label>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10">Religion</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                                <select class="wed-reg-select religion-selector" name="religion">
                                  <option value="">- Select Religion -</option>
                                  <?php foreach($religions as $rlgn) { ?>
                                      <option value="<?php echo $rlgn->religion_id; ?>"><?php echo $rlgn->religion_name; ?></option>
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
                                <select class="wed-reg-select" name="mother">
                                  <option value="">- Select Mother Tongue -</option>
                                    <?php foreach($mother_tongue as $mthr_tng) { ?>
                                        <option value="<?php echo $mthr_tng->mother_tongue_id; ?>"><?php echo $mthr_tng->mother_tongue_name ?></option>
                                    <?php } ?>
                                </select>
                              </div>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10">Caste</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                                <select class="wed-reg-select caste-selector" name="caste">
                                    <option value="">Select Caste</option>
                                </select>
                              </div>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10">Country</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                                <select class="wed-reg-select cst-select-1" name="country" cst-attr="country" cst-for="state" id="country-selector">
                                  <option value="">Select Countrys</option>
                                  <?php foreach($country as $ctry) { ?>
                                      <option value="<?php echo $ctry->country_id; ?>"><?php echo $ctry->country_name; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10" >State</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                                <select class="wed-reg-select cst-select-1" name="state" cst-attr="state" cst-for="city" id="state-selector">
                                  <option disabled value="">Select</option>
                                </select>
                              </div>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10 " >District/City</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                                <select class="wed-reg-select cst-select-1" name="city" cst-attr="city" cst-for="" id="city-selector">
                                  <option disabled value="">Select</option>
                                </select>
                              </div>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10">Education</div>
                          <div class="wed-reg-right-child2">
                            <div class="category">
                              <p>Select Catagory</p>
                              <ul>
                                <?php foreach($educations as $education) { ?>
                                <li>
                                  <div class="wed-custom-check1">
                                      <input id="check_<?php echo $education->education_id; ?>" type="checkbox" name="educs[]" value="<?php echo $education->education_id; ?>">
                                      <label for="check_<?php echo $education->education_id; ?>">
                                      <?php echo $education->education; ?></label>
                                      <div class="clearfix"></div>
                                  </div>
                                </li>
                                <?php } ?>
                              </ul>
                            </div>
                            <!--<div class="category">
                              <p>Select Catagory</p>
                              <ul>
                                <li>
                                  BAs
                                </li>
                                <li>
                                  MA
                                </li>
                                <li>
                                  MCOM
                                </li>
                              </ul>
                            </div>-->
                            <div class="clearfix"></div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1">Show Profile</div>
                          <div class="wed-reg-right-child2">
                            <div class="profile_check">
                                <input id="nmc1" type="checkbox" name="misc_type[]" value="with_photo">
                                <label for="nmc1">With Photo</label>
                                <input id="dvscd1" type="checkbox" name="misc_type[]" value="with_premium">
                                <label for="dvscd1">Premium members</label>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <?php if($this->session->userdata('logged_in')){?>
                         <li>
                          <div class="wed-reg-right-child1 paddingtop10" >Save Search</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                                <input class="wed-search-id-input" placeholder="Save Search as" name="save_search_name">
                              </div>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <?php } ?>
                        <div class="wed-space"></div>
                        <li>
                          <button class="wed-submit-btn1" type="submit" id="regular-btn">Search</button>
                      <!--   <button class="wed-skip-btn1" data-toggle="modal" data-target="#savesearch">Save Search</button> -->
                        </li>

                          <!-- SAVE-SEARCH-POP-UP -->

                          <div class="modal fade wed-add-modal" id="savesearch" role="dialog">
                            <div class="modal-dialog wed-add-modal-dialogue">
                              <div class="modal-content wed-add-modal-content">
                                <div class="modal-body  wed-add-modal-body">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4>SAVE SEARCH</h4>
                                  <div class="wed-search-modal">
                                    <div class="wed-search-modal-half">Save Search as<br>
                                      <input class="wed-search-modal-input" type="text">
                                    </div>
                                    <div class="wed-search-modal-half1">Or</div>
                                    <div class="wed-search-modal-half">Overwrite Existing<br>
                                      <select class="wed-search-modal-input2"></select>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                <div class="wed-add-modal-footer">
                                    <li style="width:150px;">Save</li>
                                  </div>

                                </div>

                              </div>
                            </div>
                          </div>
                        <div class="wed-space"></div>
                      </ul>
                    </div>
                    </form>
                  </div>
                  

                  <div id="as" class="tab-pane fade">
                  <form method="post" id="regular_forms" action="<?php echo base_url(); ?>search">
                  <input type="hidden" name="search_type" value="1">
                    <div class="wed-reg-right">
                      <ul>
                        <li>
                          <div class="wed-reg-right-child1">Age</div>
                          <div class="wed-reg-right-child2">
                            <div class="row1">
                              <span>
                                <select class="wed-reg-select2" name="age_from" style="width:160px; padding-left:5px">
                                <option disabled value="">MIN</option>
                                  <?php for($i=18;$i<=70;$i++) { ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                </select>
                              </span>
                              <span class="wed-or">To</span>
                              <span>
                                <select class="wed-reg-select2" name="age_to" style="width:160px; padding-left:5px">
                                <option disabled value="">MAX</option>
                                  <?php for($i=18;$i<=70;$i++) { ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
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
                                <select class="wed-reg-select2" name="height_from" style="width: 160px; padding-left:5px">
                                <option disabled value="">MIN</option>
                                  <?php foreach($heights as $heightd) { ?>
                                      <option value="<?php echo $heightd->height_id; ?>"><?php echo $heightd->height; ?></option>
                                  <?php } ?>
                                </select>
                              </span>
                              <span class="wed-or">To</span>
                              <span>
                                <select class="wed-reg-select2" name="height_to" style="width: 160px; padding-left:5px">
                                <option disabled value="">MAX</option>
                                  <?php foreach($heights as $heightd) { ?>
                                      <option value="<?php echo $heightd->height_id; ?>"><?php echo $heightd->height; ?></option>
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
                            <div class="profile_check advance">
                                <input id="nm" type="checkbox" name="mart[]" value="1" checked="checked">
                                <label for="nm">Never Married</label>
                                <input id="dvsd" type="checkbox" name="mart[]" value="2">
                                <label for="dvsd">Divorced</label>
                                <input id="wd" type="checkbox" name="mart[]" value="3">
                                <label for="wd">Widowed</label>
                                <input id="advsd" type="checkbox" name="mart[]" value="4">
                                <label for="advsd">Awaiting for Divorce</label>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10">Religion</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                                <select class="wed-reg-select religion-selector">
                                <option value="0">- Select Religion -</option>
                                  <?php foreach($religions as $rlgn) { ?>
                                      <option value="<?php echo $rlgn->religion_id; ?>"><?php echo $rlgn->religion_name; ?></option>
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
                                <select class="wed-reg-select" name="mother">
                                <option value="0">- Select Mother Tongue -</option>
                                    <?php foreach($mother_tongue as $mthr_tng) { ?>
                                        <option value="<?php echo $mthr_tng->mother_tongue_id; ?>"><?php echo $mthr_tng->mother_tongue_name; ?></option>
                                    <?php } ?>
                                </select>
                              </div>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10">Caste</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                                <select class="wed-reg-select caste-selector" name="caste">
                                    <option value="0">Select Caste</option>
                                </select>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10">Country</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                               <select class="wed-reg-select cst-select-2" name="country" cst-attr="country" cst-for="state" id="country-selector-2">
                                  <option value="0">Select Countries</option>
                                  <?php foreach($country as $ctry) { ?>
                                      <option value="<?php echo $ctry->country_id; ?>"><?php echo $ctry->country_name; ?></option>
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
                                <select class="wed-reg-select cst-select-2" name="state" cst-attr="state" cst-for="city" id="state-selector-2">
                                  <option disabled value="0">Select</option>
                                </select>
                              </div>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10">District/City</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                               <select class="wed-reg-select cst-select-2" name="city" cst-attr="city" cst-for="" id="city-selector-2">
                                  <option disabled value="0">Select</option>
                                </select>
                              </div>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10">Education</div>
                          <div class="wed-reg-right-child2">
                            <div class="category">
                              <p>Select Catagory</p>
                              <ul>
                                <?php foreach($educations as $education) { ?>
                                <li>
                                  <div class="wed-custom-check1">
                                      <input id="check2_<?php echo $education->education_id; ?>" type="checkbox" name="educs[]" value="<?php echo $education->education_id; ?>">
                                      <label for="check2_<?php echo $education->education_id; ?>">
                                      <?php echo $education->education; ?></label>
                                      <div class="clearfix"></div>
                                  </div>
                                </li>
                                <?php } ?>
                              </ul>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                       <!--  <li>
                          <div class="wed-reg-right-child1">Dont Show</div>
                          <div class="wed-reg-right-child2">
                            <div class="wed-custom5">
                                <input id="nm2" type="radio" name="dont_show">
                                <label for="nm2">Ignored Profile</label>
                                <input id="dvsd3" type="radio" name="dont_show">
                                <label for="dvsd3">Profile already contacted</label>
                                <input id="wd4" type="radio" name="dont_show">
                                <label for="wd4">Viewed Profiles</label>
                                <input id="advsd5" type="radio" name="dont_show">
                                <label for="advsd5">Shortlisted Profile</label>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </li> -->
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10">Occupation</div>
                          <div class="wed-reg-right-child2">

                            <div class="category">
                              <p>Select Catagory</p>
                              <ul>
                                <?php foreach($occupations as $occupa) { ?>
                                <li>
                                  <div class="wed-custom-check1">
                                  <input id="check3_<?php echo $occupa->occupation_id; ?>" type="checkbox" name="occupa[]" value="<?php echo $occupa->occupation_id; ?>">
                                  <label for="check3_<?php echo $occupa->occupation_id; ?>">
                                      <?php echo $occupa->occupation; ?></label>
                                      <div class="clearfix"></div>
                                  </div>
                                </li>
                                <?php } ?>
                              </ul>
                            </div>

                              <!-- <div class="row1">
                                <select class="wed-reg-select">
                                <option value="0">Select</option>
                                <?php foreach($occupations as $occupa) { ?>
                                  <option value="<?php echo $occupa->occupation_id; ?>"><?php echo $occupa->occupation; ?></option>
                                  <?php } ?>
                                </select>
                              </div> -->
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10">Annual Income</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                                <select class="wed-reg-select" name="min_income">
                                  <option disabled value="0">MIN</option>
                                  <option value="50000">50,000</option>
                                  <option value="100000">1,00,000</option>
                                  <option value="250000">2,50,000</option>
                                  <option value="500000">5,00,000</option>
                                  <option value="500000">10,00,000</option>
                                  <option value="1000000">15,00,000</option>
                                  <option value="1000000">20,00,000</option>
                                  <option value="1000000">Above 20,00,000</option>
                                  
                                </select>
                                <select class="wed-reg-select" name="max_income">
                                  <option disabled value="0">MAX</option>
                                  <option value="50000">50,000</option>
                                  <option value="100000">1,00,000</option>
                                  <option value="250000">2,50,000</option>
                                  <option value="500000">5,00,000</option>
                                  <option value="500000">10,00,000</option>
                                  <option value="1000000">15,00,000</option>
                                  <option value="1000000">20,00,000</option>
                                  <option value="1000000">Above 20,00,000</option>
                                </select>
                              </div>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <!-- <h4>HOROSCOPE DETAILS</h4><br>
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10">Star</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                                <select class="wed-reg-select">
                                  <option>Select Star</option>
                                </select>
                              </div>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1">Suddha Jathakam</div>
                          <div class="wed-reg-right-child2">
                            <div class="wed-custom5">
                                <input id="nm" type="radio">
                                <label for="nm">Yes</label>
                                <input id="dvsd" type="radio">
                                <label for="dvsd">No</label>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1">Chovva Dosham</div>
                          <div class="wed-reg-right-child2">
                            <div class="wed-custom5">
                                <input id="nm" type="radio">
                                <label for="nm">Doesn’t Matter</label>
                                <input id="dvsd" type="radio">
                                <label for="dvsd">No</label>
                                <input id="dvsd" type="radio">
                                <label for="dvsd">Yes</label>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </li> -->
                        <h4>HABBITS</h4><br>
                         <li>
                  <div class="wed-reg-right-child1">Eating Habits</div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check advance">
                        <input id="eating_all" type="checkbox" name="eating[]" value="0" checked="checked">
                        <label for="eating_all">Doesn't Matter</label>
                        <input id="nmp" class="eating_sel" type="checkbox" name="eating[]" value="1">
                        <label for="nmp">Vegetarian</label>
                        <input id="dvsdp" class="eating_sel" type="checkbox" name="eating[]" value="2">
                        <label for="dvsdp">Non Vegitarian</label>
                        <input id="wdp" class="eating_sel" type="checkbox" name="eating[]" value="3">
                        <label for="wdp">Eggetarian</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>


                <li>
                  <div class="wed-reg-right-child1">Drinking Habits</div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check advance">
                        <input id="drinking_all" type="checkbox" name="drinking[]" value="0" checked="checked">
                        <label for="drinking_all">Doesn't Matter</label>
                        <input id="nmt" class="drinking_sel" type="checkbox" name="drinking[]" value="1">
                        <label for="nmt">Never Drinks</label>
                        <input id="dvsdt" class="drinking_sel" type="checkbox" name="drinking[]" value="2">
                        <label for="dvsdt">Drinks Socialy</label>
                        <input id="wdt" class="drinking_sel" type="checkbox" name="drinking[]" value="3">
                        <label for="wdt">Drinks Regularly</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Smoking Habits</div>
                  <div class="wed-reg-right-child2">
                    <div class="profile_check advance">
                        <input id="smoking_all" type="checkbox" name="smoking[]" value="0" checked="checked">
                        <label for="smoking_all">Doesn't Matter</label>
                        <input id="nmr" class="smoking_sel" type="checkbox" name="smoking[]" value="1">
                        <label for="nmr">Never Smokes</label>
                        <input id="dvsdr" class="smoking_sel" type="checkbox" name="smoking[]" value="2">
                        <label for="dvsdr">Smokes Occasionaly</label>
                        <input id="wgdr" class="smoking_sel" type="checkbox" name="smoking[]" value="3">
                        <label for="wgdr">Smokes Regularly</label> 
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>


              
                       <!--  <li>
                          <div class="wed-reg-right-child1">Eating Habbits</div>
                          <div class="wed-reg-right-child2">
                            <div class="wed-custom5">
                                <input id="nm67" type="radio" name="eating" value="1">
                                <label for="nm67">Vegetarian</label>
                                <input id="dvsd34" type="radio" name="eating" value="2">
                                <label for="dvsd34">Non- Vegetarian</label>
                                <input id="dvsd23" type="radio" name="eating" value="3">
                                <label for="dvsd23">Eggetarian</label>
                                <input id="dvsd22" type="radio" name="eating" value="0" checked>
                                <label for="dvsd22">Doesn’t Matter</label>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1">Drinking Habbits</div>
                          <div class="wed-reg-right-child2">
                            <div class="wed-custom5">
                                <input id="nm56" type="radio" name="drinking" value="1">
                                <label for="nm56">Never Drinks</label>
                                <input id="dvsd39" type="radio" name="drinking" value="2">
                                <label for="dvsd39">Drinks Socially</label>
                                <input id="dvsd24" type="radio" name="drinking" value="3">
                                <label for="dvsd24">Drinks Regularly</label>
                                <input id="dvsd44" type="radio" name="drinking" value="0" checked>
                                <label for="dvsd44">Doesn’t Matter</label>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-reg-right-child1">Smoking Habbits</div>
                          <div class="wed-reg-right-child2">
                            <div class="wed-custom5">
                                <input id="nm88" type="radio" name="smoking" value="1">
                                <label for="nm88">Never Smokes</label>
                                <input id="dvsd77" type="radio" name="smoking" value="2">
                                <label for="dvsd77">Smokes Occationally</label>
                                <input id="dvsd81" type="radio" name="smoking" value="3">
                                <label for="dvsd81">Smokes Regularly</label>
                                <input id="dvsd25" type="radio" name="smoking" value="0" checked>
                                <label for="dvsd25">Doesn’t Matter</label>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </li -->
                        <!-- <h4>Background, Personality & Interests</h4><br>
                        <li>
                          <div class="wed-reg-checks">
                            <ul>
                              <li>
                          <div class="wed-custom-check22">
                            <input id="check12" type="checkbox" name="check" value="check1">
                            <label for="check12">Handsome</label>
                            <div class="clearfix"></div>
                          </div>
                        </li>
                        <li>
                          <div class="wed-custom-check22">
                            <input id="check13" type="checkbox" name="check" value="check1">
                            <label for="check13">Attractive</label>
                            <div class="clearfix"></div>
                          </div>
                        </li>
                        <li>
                          <div class="wed-custom-check22">
                            <input id="check13" type="checkbox" name="check" value="check1">
                            <label for="check13">Fitness</label>
                            <div class="clearfix"></div>
                          </div>
                        </li>
                        <li>
                          <div class="wed-custom-check22">
                            <input id="check13" type="checkbox" name="check" value="check1">
                            <label for="check13">Educated</label>
                            <div class="clearfix"></div>
                          </div>
                        </li>
                        <li>
                          <div class="wed-custom-check22">
                            <input id="check13" type="checkbox" name="check" value="check1">
                            <label for="check13">Cheerfull</label>
                            <div class="clearfix"></div>
                          </div>
                        </li>
                        <li>
                          <div class="wed-custom-check22">
                            <input id="check13" type="checkbox" name="check" value="check1">
                            <label for="check13">Music</label>
                            <div class="clearfix"></div>
                          </div>
                        </li>
                        <li>
                          <div class="wed-custom-check22">
                            <input id="check13" type="checkbox" name="check" value="check1">
                            <label for="check13">Dance</label>
                            <div class="clearfix"></div>
                          </div>
                        </li>
                        <li>
                          <div class="wed-custom-check22">
                            <input id="check13" type="checkbox" name="check" value="check1">
                            <label for="check13">Art</label>
                            <div class="clearfix"></div>
                          </div>
                        </li>
                        <li>
                          <div class="wed-custom-check22">
                            <input id="check13" type="checkbox" name="check" value="check1">
                            <label for="check13">Movie</label>
                            <div class="clearfix"></div>
                          </div>
                        </li>
                        <li>
                    <div class="wed-custom-check22">
                      <input id="check12" type="checkbox" name="check" value="check1">
                      <label for="check12">Handsome</label>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                  <li>
                    <div class="wed-custom-check22">
                      <input id="check13" type="checkbox" name="check" value="check1">
                      <label for="check13">Attractive</label>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                  <li>
                    <div class="wed-custom-check22">
                      <input id="check13" type="checkbox" name="check" value="check1">
                      <label for="check13">Fitness</label>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                  <li>
                    <div class="wed-custom-check22">
                      <input id="check13" type="checkbox" name="check" value="check1">
                      <label for="check13">Educated</label>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                  <li>
                    <div class="wed-custom-check22">
                      <input id="check13" type="checkbox" name="check" value="check1">
                      <label for="check13">Cheerfull</label>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                  <li>
                    <div class="wed-custom-check22">
                      <input id="check13" type="checkbox" name="check" value="check1">
                      <label for="check13">Music</label>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                  <li>
                    <div class="wed-custom-check22">
                      <input id="check13" type="checkbox" name="check" value="check1">
                      <label for="check13">Dance</label>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                  <li>
                    <div class="wed-custom-check22">
                      <input id="check13" type="checkbox" name="check" value="check1">
                      <label for="check13">Art</label>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                  <li>
                    <div class="wed-custom-check22">
                      <input id="check13" type="checkbox" name="check" value="check1">
                      <label for="check13">Movie</label>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                  <li>
              <div class="wed-custom-check22">
                <input id="check12" type="checkbox" name="check" value="check1">
                <label for="check12">Handsome</label>
                <div class="clearfix"></div>
              </div>
            </li>
            <li>
              <div class="wed-custom-check22">
                <input id="check13" type="checkbox" name="check" value="check1">
                <label for="check13">Attractive</label>
                <div class="clearfix"></div>
              </div>
            </li>
            <li>
              <div class="wed-custom-check22">
                <input id="check13" type="checkbox" name="check" value="check1">
                <label for="check13">Fitness</label>
                <div class="clearfix"></div>
              </div>
            </li>
            <li>
              <div class="wed-custom-check22">
                <input id="check13" type="checkbox" name="check" value="check1">
                <label for="check13">Educated</label>
                <div class="clearfix"></div>
              </div>
            </li>
            <li>
              <div class="wed-custom-check22">
                <input id="check13" type="checkbox" name="check" value="check1">
                <label for="check13">Cheerfull</label>
                <div class="clearfix"></div>
              </div>
            </li>
            <li>
              <div class="wed-custom-check22">
                <input id="check13" type="checkbox" name="check" value="check1">
                <label for="check13">Music</label>
                <div class="clearfix"></div>
              </div>
            </li>
            <li>
              <div class="wed-custom-check22">
                <input id="check13" type="checkbox" name="check" value="check1">
                <label for="check13">Dance</label>
                <div class="clearfix"></div>
              </div>
            </li>
            <li>
              <div class="wed-custom-check22">
                <input id="check13" type="checkbox" name="check" value="check1">
                <label for="check13">Art</label>
                <div class="clearfix"></div>
              </div>
            </li>
            <li>
              <div class="wed-custom-check22">
                <input id="check13" type="checkbox" name="check" value="check1">
                <label for="check13">Movie</label>
                <div class="clearfix"></div>
              </div>
            </li>
                        <div class="clearfix"></div>
                          </ul>
                        </div>
                        </li>
                        <h4>Search using Keywords</h4><br>
                        <li>
                          <div class="c1" style="border-right:1px solid #e7e7e7;">
                            <p>
                              Enter keywords within quotes and for more than one <br>keyword use a comma separator between words.
                            </p>
                          </div>
                          <div class="c1">
                            <input class="c1-input" type="text" placeholder="Example: Handsome, Educated, etc. ">
                          </div>
                          <div class="clearfix"></div>
                        </li> -->
                        <li>
                          <div class="wed-reg-right-child1">Show Profile</div>
                          <div class="wed-reg-right-child2">
                            <div class="profile_check advance">
                                <input id="nm23" type="checkbox" name="misc_type[]" value="with_photo">
                                <label for="nm23">With Photo</label>
                                <!-- <input id="dvsd45" type="radio" name="show_profile">
                                <label for="dvsd45">With Hororscope</label> -->
                                <input id="wd65" type="checkbox" name="misc_type[]" value="with_photo">
                                <label for="wd65">Online right now</label>
                                <input id="advsd87" type="checkbox" name="misc_type[]" value="premium">
                                <label for="advsd87">Premium members</label>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <?php
                        if($this->session->userdata('logged_in')){?>
                        <li>
                          <div class="wed-reg-right-child1">Dont Show</div>
                          <div class="wed-reg-right-child2">

                            <div class="profile_check advance" style="float:left">
                                <input id="4wd" type="checkbox" name="dont_show[]" value="3">
                                <label for="4wd">Viewed Profiles</label>
                                <input id="5advsd" type="checkbox" name="dont_show[]" value="4">
                                <label for="5advsd">Shortlisted Profile</label>
                            </div>
                            <div class="profile_check">
                                <!-- <input id="2nm" type="checkbox" name="dont_show[]" value="1">
                                <label for="2nm">Ignored Profile</label> -->
                                <input id="3dvsd" type="checkbox" name="dont_show[]" value="2">
                                <label for="3dvsd" style="margin-left:4px;">Profile already contacted</label>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        
                        <div class="wed-space"></div>
                        <!--<li>
                            <label for="5advsd">Save Search</label>
                                  <div>
                                    <div class="wed-search-modal-half">Save Search as<br>
                                      <input class="wed-search-modal-input" type="text">
                                    </div>
                              
                                  <div class="clearfix"></div>
                                  </div>
                          <button type="submit" class="wed-submit-btn1">Search</button>
                         <!--  <button class="wed-skip-btn1">Save Search</button> 
                        </li>-->
                        <li>
                          <div class="wed-reg-right-child1 paddingtop10" >Save Search</div>
                          <div class="wed-reg-right-child2">
                              <div class="row1">
                                <input class="wed-search-id-input" placeholder="Save Search as" name="save_search_name">
                              </div>
                            </div>
                          <div class="clearfix"></div>
                        </li>
                        <?php } ?>
                        <div class="wed-space"></div>
                        <li>
                        <button type="submit" class="wed-submit-btn1">Search</button>
                      </ul>
                    </div>
                    </form>
                </div>

                  <div id="ks" class="tab-pane fade">
                    <div class="wed-reg-right">
                    <ul>
                      <form method="post" id="regular_forms" action="<?php echo base_url(); ?>search">
                      <li>
                        <p>Find profiles based on keywords. If you're looking for very specific results,<br>
                        try Keyword option in Advanced Search.</p>
                        <input class="wed-reg-search-input1" type="text" name="keyword" placeholder="eg:  hindu, agarwal, f, 25 - 30 Yrs, delhi"><br/>
                        <p style="margin:6px 0 0 15px;"><b><i>eg:  hindu,24 Manai Telugu Chettiar,f,21-23,kerala</i></b></p>
                      </li>
                      <li>
                       <!--  <div class="wed-reg-search-custom-check">
                          <input id="check2" type="checkbox" name="check" value="check1">
                          <label for="check2">Show profiles with photo</label>
                          <div class="clearfix"></div>
                        </div> -->
                      </li>

                      <li>
                        <button class="wed-submit-btn1">Search</button>
                        <!-- <button class="wed-skip-btn1">Save Search</button> -->
                      </li>
                      </form>
                      <div class="wed-space"></div>
                    </ul>
                  </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>


</div>

<script>
$( document ).ready(function() {


  var type = window.location.search.substring(1);
  if(type!=''){
    if(type=="regular"){
      $('#regular_click').click();
    } else if(type=="advanced"){ 
      $('#advanced_click').click();
    } else {
      $('#keyword_click').click();
    }
  }

var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
} 

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
})

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

    $(".cst-select-2").on('change', function () {
        var valueSelected = $(this).val();
        var select_type   = $(this).attr('cst-attr');
        var select_destn  = $(this).attr('cst-for');
        var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;

        $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>home/get_drop_data',
        data:  passdata_2,
        success: function(data){
               $("#"+select_destn+"-selector-2").html(data);
            }
        });
    });

    /*$(document).on("click","#regular-btn",function() {
        if($('#regular_form').parsley().validate()) {

            var value =$("#regular_form").serialize();
            console.log(value);
            window.location.href= base_url+"search/?"+value;       
      }
    });*/

});

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
</script>


