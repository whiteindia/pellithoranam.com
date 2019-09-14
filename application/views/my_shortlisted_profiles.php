
    <!-- TOP-BANNER -->
    <div class="wed-wrapper">
      <section class="module parallax parallax-2">
        <div class="wed-wrapper-recent-view">
      <div class="container container-custom">
          <img src="<?php echo base_url(); ?>assets/img/recent-acnt.png">
          <h3>Shortlisted Profiles</h3>
      </div>
    </div>
    </section>
    <div class="container container-custom">
    <div id="profile_msg"></div>
      <div class="row">
        <div class="col-md-12">
          <div class="wed-recent-listing">
            <button class="wed-sent-interest">Send Interest</button>
            <?php if(!empty($profiles)) {?><button class="wed-sent-interest-all send_all">Send Interest to all</button><?php }?>
            <div class="wed-search-listing">
              <ul>
              <?php if(!empty($profiles)) { foreach($profiles as $profile) { ?>
                <div class="wed-recent-check">
                  <div class="wed-recent-custom">
                    <!-- <input id="check_<?php echo $profile->profile_id; ?>" type="checkbox" name="selected" value="<?php echo $profile->matrimony_id; ?>">
                    <label for="check_<?php echo $profile->profile_id; ?>"> -->  <li>

                      <div class="eye"></div>
                      <div class="close"></div>
                      <div class="web-search-photo">
                         <div class="web-search-pic">
                        <?php if($profile->profile_photo == "") { ?>
                            <img src="<?php echo base_url(); ?>assets/img/pic4.png">
                          <?php }else if($profile->profile_photo != "" && $profile->profile_preference==0){ ?>
                            <img src="<?php echo base_url().$profile->profile_photo;?>">
                         <?php }  else if($profile->profile_photo != "" && $profile->profile_preference==1){ ?>
                        <img src="<?php echo base_url().$profile->profile_photo_blured; ?>">
                        <?php } ?>
                        </div>
                        <h5><?php echo $profile->profile_name; ?></h5>
                        <p><?php echo "T".$profile->matrimony_id; ?></p>
                        <div class="wed-space3">
                        </div>
                        <!-- <span><img src="<?php echo base_url(); ?>assets/img/online.png">Online</span> -->
                      </div>
                      <div class="web-search-detail">
                      <a href="<?php echo base_url('profile/profile_details/'.$profile->matrimony_id); ?>">
                        <!-- <div class="wed-premium">Premium member</div> -->
                        <div class="list">
                          <ul>
                            <li>
                              <div class="childs1">Age</div>
                              <div class="childs2"><?php echo $profile->age; ?></div>
                              <div class="clearfix"></div>
                            </li>
                            <li>
                              <div class="childs1">Height</div>
                              <div class="childs2"><?php echo $profile->height; ?></div>
                              <div class="clearfix"></div>
                            </li>
                            <li>
                              <div class="childs1">Religion</div>
                              <div class="childs2"><?php echo $profile->religion_name; ?></div>
                              <div class="clearfix"></div>
                            </li>
                            <li>
                              <div class="childs1">Caste, Sub Caste</div>
                              <div class="childs2"><?php echo $profile->caste_name.", ".$profile->sub_caste; ?></div>
                              <div class="clearfix"></div>
                            </li>
                          </ul>
                        </div>
                        <div class="list">
                          <ul>
                            <li>
                              <div class="childs1">Star</div>
                              <div class="childs2"><?php echo $profile->star_name; ?></div>
                              <div class="clearfix"></div>
                            </li>
                            <li>
                              <div class="childs1">Location</div>
                              <div class="childs2"><?php echo $profile->city_name; ?></div>
                              <div class="clearfix"></div>
                            </li>
                            <li>
                              <div class="childs1">Education</div>
                              <div class="childs2"><?php echo $profile->education; ?></div>
                              <div class="clearfix"></div>
                            </li>
                            <li>
                              <div class="childs1">Profession</div>
                              <div class="childs2"><?php echo $profile->occupation; ?></div>
                              <div class="clearfix"></div>
                            </li>
                          </ul>
                        </div>
                        </a>
                        <div class="clearfix"></div>
                        <div class="wed-search-btm">
                          <p><?php echo $profile->about_you; ?></p>
                        </div>
                        <span><img src="<?php echo base_url(); ?>assets/img/mob.png"></span><span><img src="<?php echo base_url(); ?>assets/images/save.png"></span>
                        <div class="wed-search-btn-bay">
                          <button class="wed-mail">Send mail</button>
                          <?php if($profile->shortlisted == 1) { ?>
                          <button class="wed-shortlist remove-shortlist" proc_name="<?php echo $profile->profile_name; ?>" matr_id="<?php echo $profile->matrimony_id; ?>">Shortlisted</button>
                          <?php } else { ?>
                          <button class="wed-shortlist shortlist" proc_name="<?php echo $profile->profile_name; ?>" matr_id="<?php echo $profile->matrimony_id; ?>">Short List</button>
                          <?php } ?>
                          <?php if($profile->shortlisted == 1) { ?>
                          <button class="wed-interest">Already Interested</button>
                          <?php } else { ?>
                          <button class="wed-interest send_interest" proc_name="<?php echo $profile->profile_name; ?>" matr_id="<?php echo $profile->matrimony_id; ?>">Send Interest</button>
                          <span id="messager"></span>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </li><!-- </label> -->
                  </div>
                </div>
                <div class="wed-record-msg">

                <?php } } else { ?>
                  <div class="wed-search-listing">
                      <ul>
                        <li class="no_records">No Records Found..!</li>
                      </ul>   
                  </div>
                <?php  } ?>
                </div>
              </ul>
            </div>
          </div>
      </div>
      <!--
        <div class="col-md-3">
          <div class="wed-recent-interest">
            <button class="wed-sent-interest">Send Interest</button><br>
            <button class="wed-sent-interest-all">Send Interest to all</button>
          </div>
        </div>-->
      </div>
    </div>

  </div>
