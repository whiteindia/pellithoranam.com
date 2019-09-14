<?php
$sess = $this->session->userdata('logged_in');
$settings = get_setting();
$id_prefix = $settings->id_prefix;
?>
    <!-- TOP-BANNER -->
    <div class="wed-wrapper">
      <section class="module parallax parallax-2">
        <div class="wed-wrapper-recent-view">
      <div class="container container-custom">
          <img src="<?php echo base_url(); ?>assets/img/recent-acnt.png">
          <h3>Recently Viewed Profile</h3>
      </div>
    </div>
    </section>

    <div class="container container-custom">
    <div id="profile_msg"></div>
      <div class="row">
        <div class="col-md-12">
          <div class="wed-recent-listing">
            <button class="wed-sent-interest">Send Interest</button>
            <?php if(!empty($profiles)) {?><button class="wed-sent-interest-all send_all" data-id="<?php echo $sess->matrimony_id; ?>">Send Interest to all</button><?php }?>
            <div class="wed-search-listing">
              <ul>
              <?php if(!empty($profiles)) { foreach($profiles as $profile) { ?>
                <div class="wed-recent-check">
                  <div class="wed-recent-custom">
                    <!-- <input id="check_<?php echo $profile->profile_id; ?>" type="checkbox" name="selected" value="<?php echo $profile->matrimony_id; ?>" />
                    <label for="check_<?php echo $profile->profile_id; ?>"> </label>  --><li>

                      <div class="eye"></div>
                      <div class="close"></div>
                      <div class="web-search-photo">
                        <div class="web-search-pic">
                        <?php if($profile->profile_photo == "") { ?>
                            <img src="<?php echo base_url(); ?>assets/img/user.jpg">
                          <?php }else if($profile->profile_photo != "" && $profile->profile_preference==0){ ?>
                            <img src="<?php echo base_url().$profile->profile_photo;?>">
                         <?php }  else if($profile->profile_photo != "" && $profile->profile_preference==1){ ?>
                        <img src="<?php echo base_url().$profile->profile_photo_blured; ?>">
                        <?php } ?>
                        </div>
                        <h5><?php echo $profile->profile_name; ?></h5>
                        <p><?php echo $id_prefix.$profile->matrimony_id; ?></p>
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
                              <div class="childs1">Caste,Sub Caste</div>
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
                        <div class="clearfix"></div>
                        <div class="wed-search-btm">
                          <p><?php echo $profile->about_you; ?></p>
                        </div>
                        </a>
                        <span>
                          <a class="tool_tip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mobile Number">
                            <img src="<?php echo base_url(); ?>assets/img/mob.png">
                          </a>
                        </span>
                        <span>
                          <a class="tool_tip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print">
                            <img src="<?php echo base_url(); ?>assets/images/save.png">
                          </a>
                        </span>
                        
                        <div class="wed-search-btn-bay">
                          <button class="wed-mail">Send mail</button>
                          <?php if($profile->shortlisted == 1) { ?>
                          <button class="wed-shortlist">Shortlisted</button>
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
                    </li>
                  </div>
                </div>
                <?php } } else { ?>
                  <div class="wed-search-listing">
                      <ul>
                        <li class="no_records">No Records Found..!</li>
                      </ul>   
                  </div>
                  <?php } ?>
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
  <script>
/*-------Tooltip for mobile no & print--------*/
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
/*------------------------------------------- */

  </script>
