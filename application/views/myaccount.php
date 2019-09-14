<?php  $session=$this->session->userdata('user_values'); ?>

    <!-- PROFILE-BANNER -->

    <div class="wed-profile-banner">
      <div class="container-fluid">
        <div class="banner-left-red"></div>
        <div class="banner-left-white"></div>
        <div class="container container-custom">
          <div class="wed-profile-banner-left">
            <div class="wed-profile-50" style="border-right:1px solid #df7085;">
              <div class="wed-profile-head">
                  <?php if($profile_pic==null){?>
                  <img src="<?php echo base_url(); ?>assets/img/user.jpg">
                  <?php }else{?>
                <img src="<?php echo base_url(); ?><?php echo $profile_pic->image; ?>">
                <?php } ?>
              </div>
              <h3><?php echo $session['name'];?></h3>
              <p>Profile created for <?php echo $session['profile_for'];?></p>
            </div>
            <div class="wed-profile-501">
              <p>23 Yrs &nbsp;&nbsp;6 Ft / 183 Cms<br>
                Christian, Latin<br>
                Roden Avenue,Sicily Italy<br>
                Structural Engineering<br>
                <br>
                +69&nbsp;458745896<span><img src="<?php echo base_url(); ?>assets/img/edit.png"></span></p>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="wed-profile-banner-right">
            <div class="wed-profile-banner-right-50">
              <p>How your profile looks<br> to others</p>
              <a href="#"><button class="wed-preview-btn">Preview Profile</button></a>
              <p><span><img src="<?php echo base_url(); ?>assets/img/add1.png"></span>Add Partner Preferences</p>
            </div>
            <div class="wed-profile-banner-right-50">
              <div class="c100 p25 center">
                      <span>25%<br>
                        Completed
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
                <div class="wed-detail-head">
                  <?php  if($session['profile_for']=='myself'){?>
                  <h5>A few words about <?php echo $session['profile_for'];?></h5>
                  <?php }else{ ?>
                   <h5>A few words about my <?php echo $session['profile_for'];?></h5>
                  <?php }?>
                  <div class="wed-detail-edit btn2">
                    edit
                  </div>


            <!--   <form class="reply-form" style="display:none;">
                      <input />
                      <input type="submit" value="submit"/>
                  </form> -->
                  <div class="clearfix"></div>
                </div>
                <p class="about_u"> <?php echo $profile->about_you;?>
                </p>
            </li>
            <li class="wed-detail-left">
              <div class="wed-patner-preference">
                <div class="wed-add-patner-preference">
                  Add Partner Preferences
                </div>
                <div class="wed-add-patner-horrorscope">
                  Add Horoscope
                </div>
              </div>
            </li>
            <div class="clearfix"></div>
          </ul>

          </div>

          <!-- BASIC-DETAILS -->

          <div class="wed-row">
            <ul>
                <li class="wed-detail-left border-right1">
                  <div class="wed-detail-head">
                    <h5>Basic Details</h5>
                    <div class="wed-detail-edit">
                      edit
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
                       <?php echo ucwords($profile->profile_for);?>
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
                        <?php echo ucwords($profile->body_type);?> / <?php echo ucwords($profile->complexion);?>
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
                        <?php echo ucwords($profile->physical_status);?>
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
                       <?php echo $profile->weight;?>
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
                         <?php echo ucwords(str_replace("_"," ",$profile->maritial_status));?>
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
                         <?php if($profile->drinking=='no'){?>
                         Never Drinks
                         <?php } else {
                         echo $profile->drinking;
                         }?>
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
                      <?php echo $profile->name;?>
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
                      <?php echo date("Y")-$profile->year; ?>Yrs
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
                     <?php echo $profile->cms;?> Cms
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
                     <?php echo ucwords($profile->mother_tongue);?>
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
                      <?php echo ucwords(str_replace("_"," ",$profile->food));?>
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
                      <?php if($profile->smoking=='no'){?>
                         Never Smokes
                         <?php } else {
                         echo $profile->smoking;
                         }?>
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
            <ul>
                <li class="wed-detail-left border-right1">
                  <div class="wed-detail-head">
                    <h5>Religion Information</h5>
                    <div class="wed-detail-edit">
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
                       <?php echo ucwords($profile->religion);?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Caste / Sub Caste
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        Jacobite
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Gothram
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        Not Specified
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Star / Raasi
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        Krithiga
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                      Suddha Jadhagam
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        Don't know
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Dosham
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        Not Specified
                      </div>
                      <div class="clearfix"></div>
                    </li>
                  </ul>
              </li>
              <li class="wed-detail-left">
                <div class="wed-detail-head">
                  <h5>Groom's Location</h5>
                  <div class="wed-detail-edit">
                    edit
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
                      <?php echo ucwords($profile->country);?>
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
                      <?php echo ucwords($profile->state);?>
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
                    <?php echo ucwords($profile->city);?>
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
                      Norwian
                    </div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>

          <!-- PROFESSIONAL-INFORMATION -->

          <div class="wed-row">
            <ul>
                <li class="wed-detail-left border-right1">
                  <div class="wed-detail-head">
                    <h5>Professional Information</h5>
                    <div class="wed-detail-edit">
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
                        <?php echo ucwords($profile->education);?>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        College / Institution
                      </div>
                      <div class="child2">:
                      </div>
                      <div class="child3">
                        Not Specified
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
                        Not Specified
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
                        <?php echo ucwords(str_replace("_"," ",$profile->occupation));?>
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
                      Not Specified
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
                      Not Specified
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
                      Not Specified
                    </div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>

          <!-- FAMILY-DETAILS -->

          <div class="wed-row bordernone">
            <ul>
                <li class="wed-detail-left border-right1">
                  <div class="wed-detail-head">
                    <h5>Family Details</h5>
                    <div class="wed-detail-edit">
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
                        <?php echo ucwords($profile->family_value);?>
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
                       <?php echo ucwords($profile->family_type);?>
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
                        echo ucwords(str_replace("_"," ",$profile->family_status));?>
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
                        Not Specified
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
                        Not Specified
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
                      Father's Status
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      Not Specified
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Mother's Status
                    </div>
                    <div class="child2">:
                    </div>
                    <div class="child3">
                      Not Specified
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
                      Not Specified
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
                      Not Specified
                    </div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
              </li>
              <div class="clearfix"></div>
            </ul>
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




<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".btn1").click(function(){
        $("p").hide();
    });
    $(".btn2").click(function(){
        $(".reply-form").show();
        $(".about_u").hide();
    });
});
</script>-->


</body></html>
