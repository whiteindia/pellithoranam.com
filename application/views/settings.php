<?php $matrimony_id=$this->session->userdata('logged_in');
$mat_id=$matrimony_id->matrimony_id;
$settings= get_setting();
$title = $settings->title;
?>
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/css/datepicker.css" rel="stylesheet"/>

    <div class="wed-settings-bay">
      <div class="container container-custom">
        <h3>Profile Settings</h3>
        <div class="wed-setting-tab-bay">
          <ul>
       <!--     <li class="active">
              <a data-toggle="tab" href="#edit">
              <div class="wed-img-bg">
                <img src="<?php echo base_url(); ?>assets/img/edit-mail.png">
              </div>
              <p>
              Edit Email Address
              </p></a>
              <div class="arrow-up"></div>
            </li>  -->
            <li>
              <a data-toggle="tab" href="#pass">
              <div class="wed-img-bg">
                <img src="<?php echo base_url(); ?>assets/img/change-pass.png">
              </div>
              <p>
                Change Password
              </p></a>
                <div class="arrow-up"></div>
              </li>
            <li>
              <a data-toggle="tab" href="#alert" id="alert1">
              <div class="wed-img-bg">
                <img src="<?php echo base_url(); ?>assets/img/mail-alert.png">
              </div>
              <p>
                Manage Mail Alerts
              </p></a>
              <div class="arrow-up"></div>
            </li>
            <li>
              <a data-toggle="tab" href="#contact" id="inbox_click">
              <div class="wed-img-bg">
                <img src="<?php echo base_url(); ?>assets/img/contact-filter.png">
              </div>
              <p>
                Contact Filters
              </p></a>
                <div class="arrow-up"></div>
            </li>
            <li>
                <a data-toggle="tab" href="#settings" id="settings1">
               
              <div class="wed-img-bg">
                <img src="<?php echo base_url(); ?>assets/img/profile-settings.png">
              </div>
           
              <p>
            Profile Settings
          </p>
          </a>
            <div class="arrow-up"></div>
            </li>
       <!--     <li>
              <a data-toggle="tab" href="#deactivate" id="deactvated">
              <div class="wed-img-bg">
                <img src="<?php echo base_url(); ?>assets/img/deactivate-profile.png">
              </div>
              <p>
              Deactivate Profile
            </p>
            </a>
              <div class="arrow-up"></div>
            </li>  -->
       <!--     <li>
              <a data-toggle="tab" href="#delete">
              <div class="wed-img-bg">
                <img src="<?php //echo base_url(); ?>assets/img/delete-profile.png">
              </div>
              <p>
              Delete Profile
            </p>
            </a>
              <div class="arrow-up"></div>
            </li>  -->
            <div class="clearfix"></div>
          </ul>
        </div>
      </div>
    </div>
    <div class="wed-setting-tab-content-bay">
        <div class="container container-custom">
          <div class="tab-content">

      <!--      <div id="edit" class="tab-pane fade in active">
              <div class="wed-space"></div>
              <h4>Edit Email Address</h4>
              <p>A valid e-mail id will be used to send you partner search mailers, member to member<br>
                  communication mailers and special offers.</p>
              <form method="post" id="email_form" >
              <div class="wed-setting-inner">
                <input class="wed-setting-input" type="email" name="email" placeholder="" value="<?php echo $get_profiles->email;?>">
                <div class="wed-space"></div>
                <div class="change_email_msg"></div>
                <div class="wed-settings-save change_email">Save</div>
                <a href="" style="text-decoration: none;">
                  <div class="wed-settings-reset">Reset</div>
                </a>
                <div class="wed-space"></div>
              </div>
              </form>
            </div>  -->

            <div id="pass" class="tab-pane fade">
              <div class="wed-space"></div>
              <h4>Change Password</h4>
              <p>Your password must have a minimum of 6 characters. We recommend you <br>
  choose an alphanumeric password</p>
              <form method="post" id="password_form">
              <div class="wed-setting-inner">
                <input class="wed-setting-input" type="password" placeholder="Current Password" name="crnt_password">
                <input class="wed-setting-input" type="password" placeholder="New Password" name="new_password">
                <input class="wed-setting-input" type="password" placeholder="Confirm New Password" name="conf_password">
                <div class="wed-space"></div>
                <div class="change_pass_msg"></div>
                <div class="wed-settings-save change_password">Change</div>
                <div class="wed-settings-reset">Reset</div>
                  <div class="wed-space"></div>
              </div>
              </form>
            </div>

            <div id="alert" class="tab-pane fade">
              <div class="wed-space"></div>
              <h4>Manage Mail Alerts</h4>
              <p>Listed below are the alerts you will receive from us through e-mail. If you wish to unsubscribe <br>
to any of the alerts, please de-select the alert.</p>
              <div class="wed-setting-inner">
                <li>
                  <div class="wed-write">News Letter</div>
                  <div class="wed-settings-custom-check">
                    <form method="post" action="<?php echo base_url();?>Settings/mail_alerts">
                    <div class="wed-settings-custom-check">
                        <input id="check1" type="checkbox" name="newsletter_alert" value="1" <?php if(!empty($mail_alerts)){echo ($mail_alerts->newsletter_alert== '1') ?  "checked" : "" ;  }?>>
                        <label for="check1"></label>
                        <div class="clearfix"></div>
                    </div>
                     </div>
                   <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-write">Membership Expiry Reminder Notices</div>
                  <div class="wed-settings-custom-check">

                    <div class="wed-settings-custom-check">
                        <input id="check2" type="checkbox" name="membership_expiry" value="1" <?php if(!empty($mail_alerts)){echo ($mail_alerts->membership_expiry== '1') ?  "checked" : "" ;  }?>>
                        <label for="check2"></label>
                        <div class="clearfix"></div>
                    </div>
                     </div>
                   <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-write">Photo Reminders</div>
                  <div class="wed-settings-custom-check">
                    <div class="wed-settings-custom-check">
                        <input id="check3" type="checkbox" name="photo_reminder" value="1" <?php if(!empty($mail_alerts)){echo ($mail_alerts->photo_reminder== '1') ?  "checked" : "" ;  }?>>
                        <label for="check3"></label>
                        <div class="clearfix"></div>
                    </div>
                     </div>
                   <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-write">Individual Matches</div>
                  <div class="wed-settings-custom-check">
                    <div class="wed-settings-custom-check">
                        <input id="check4" type="checkbox" name="individual_match_alert" value="1" <?php if(!empty($mail_alerts)){echo ($mail_alerts->individual_match_alert== '1') ?  "checked" : "" ;  }?>>
                        <label for="check4"></label>
                        <div class="clearfix"></div>
                    </div>
                     </div>
                  
                   <div class="clearfix"></div>
                </li>


                <div class="wed-space"></div> 
                <button class="wed-add-now-btn wed-settings-save" type="submit">update</button>
                  <div class="wed-space"></div>
              </div>
           </form>
            </div>
            <div id="contact" class="tab-pane fade">
              <div class="wed-space"></div>
              <h4>Contact Filters</h4>
              <p>With the help of filters you can choose who can contact you.</p>
              <div class="wed-setting-inner1">
                <br>
                <div class="wed-space"></div>
                <div class="wed-contact-filter-bay">
                  <div class="wed-contact-filter-left">
                    <h5>Who can contact me:</h5>
                    <div class="wed-custom5">
                       <form method="post" action="<?php echo base_url();?>Settings/contact_filters">   
                        <input id="nm" type="radio" name="contact_preference" value="1" checked="checked" <?php if(!empty($settings_preferences)){echo ($settings_preferences->contact_preference== '1') ?  "checked" : "" ;  }?>>
                        <label for="nm">Anyone</label>

                      </div>
                      <div class="wed-custom5">
                          <input id="nm1" type="radio" name="contact_preference" value="0" <?php if(!empty($settings_preferences)){echo ($settings_preferences->contact_preference== '0') ?  "checked" : "" ;  }?>>
                          <label for="nm1">Only members who meet my criteria.</label>
                        </div>

                  </div>
                  <div class="wed-contact-filter-right">
                    <button class="wed-add-now-btn" type="submit">update</button>
                  </div>
                   </form>
                  <div class="clearfix"></div>
                </div>

                  <br><br>
              </div>
            </div>
            <div id="settings" class="tab-pane fade">
              <div class="wed-space"></div>
              <h4>Profile Settings</h4>
              <p>Your Profile Privacy has been set as "Show my Profile to all including visitors"</p>
              <div class="wed-setting-inner1">
                <br>
                <div class="wed-space"></div>
                <div class="wed-contact-filter-bay">
                  <div class="wed-contact-filter-left">
                    <div class="wed-custom5">
                       <form method="post" action="<?php echo base_url();?>Settings/contact_filters1"> 
                        <input id="nm2" type="radio" name="profilevisibility_preference" value="1" checked="checked" <?php if(!empty($settings_preferences)){echo ($settings_preferences->profilevisibility_preference== '1') ?  "checked" : "" ;  }?>>
                        <label for="nm2">Show my Profile to all including visitors</label>
                      </div>
                      <div class="wed-custom5">
                          <input id="nm3" type="radio" name="profilevisibility_preference" value="0" <?php if(!empty($settings_preferences)){echo ($settings_preferences->profilevisibility_preference== '0') ?  "checked" : "" ;  }?>>
                          <label for="nm3">Show my Profile to registered members only</label>
                        </div>
                        <div class="custom_check" style="">
                            <input id="nm4" type="checkbox" name="shortlist_preference" value="1" <?php if(!empty($settings_preferences)){echo ($settings_preferences->shortlist_preference== '1') ?  "checked" : "" ;  }?>>
                            <label for="nm4">Let others know that I shortlisted their profile.</label>
                          </div>


                  </div>
                  <div class="wed-contact-filter-right">
                    <button class="wed-add-now-btn" type="submit">update</button>
                  </div>
                </form>
                  <div class="clearfix"></div>
                </div>
				<br><br>
				
              </div>

            </div>
     <!--       <div id="deactivate" class="tab-pane fade">
              <div class="wed-space"></div>
              <h4>Deactivate Profile</h4>
              <p>You can temporarily deactivate your profile if you do not want to delete it. On deactivation your profile <br>
will be hidden from our members and you will not be able to contact any member until you activate.<br><br>
Your profile status is currently active. If you would like to change your status, please select Deactivate Now.<br><br>
Select the number of days / months you would like to keep your profile deactivated.</p>
              <div class="wed-setting-inner">
                       
                <br><br>
                  <form method="post" id="deactiv" action="">
                <select class="wed-settings-select" name="duration">
                  <option>Select Days</option>
                  <option value="15">15 days</option>
                  <option value="30">1 month</option>
                  <option value="60">2 month</option>
                  <option value="90">3 month</option>
                </select><br>
                <div class="wed-space"></div>
				 <div class="deact_msg">Your Profile Has been Deactivated You are logging out now...</div>
               <!--  <div class="wed-settings-save">Deactivate Now</div> 
                 <button class="wed-add-now-btn wed-settings-save" id="deact" type="submit">Deactivate Now</button>-
                  <br><br>
              </div>
           </form>
            </div> -->
            <div id="delete" class="tab-pane fade">
              <div class="wed-space"></div>
              <h4>Delete Profile</h4>
              <p>Please choose a reason for profile deletion.</p>
              <div class="wed-setting-inner">
      
                  <br><br>
			</div>
			
				<ul class="wed-delete-reason">
					<li class="active" data-toggle="tab" href="#menu0">Marriage is <br> Almost Fixed</li>
					<li data-toggle="tab" href="#menu1">Too many <br>promotional calls</li>
					<li data-toggle="tab" href="#menu2">Not getting<br> enough matches</li>
					<li data-toggle="tab" href="#menu3">Prefer to<br> Search later</li>
					<li data-toggle="tab" href="#menu4">Other<br>Reasons</li>
				</ul>
				<div class="tab-content wed-reason-tab-content">
					<div id="menu0" class="tab-pane fade in active">
					<div class="wed-reason-row">
					<p>
					<strong>Congratulations</strong><br><br>
					We are happy to know that you find you soulmate.<br>
					Please Select your Source
					</p>
					<br>
					<div class="wed-custom5">
                          <input id="matri" type="radio" name="reason" checked="checked" data-target="#scheduleDaily" data-toggle="tab">
                          <label for="matri">Through <?php echo $title;?></label>
                          <input id="sites" type="radio" name="reason"  data-target="#scheduleWeekly" data-toggle="tab" >
                          <label for="sites">Through Other Sites</label>
						  <input id="sources" type="radio" name="reason"  type="radio" data-target="#scheduleMonthly" data-toggle="tab">
                          <label for="sources">Through Other Sources</label>
                      </div>
					  </div>
					  <div class="tab-content" style="width:100% !important;">
  
					  <hr>
					  
					  <!--RADIO-TAB-CONTENT -->
					  <div id="scheduleDaily" class="wed-radio-tab-content tab-pane active">
              <form method="post" action="<?php echo base_url();?>Settings/success_story" enctype="multipart/form-data">
             <input class="wed-reason-input-cal" type="hidden" placeholder="" name="matrimony_id" value="<?php echo $mat_id; ?>">
             <input class="wed-reason-input-cal" type="hidden" placeholder="" name="success_status" value="1">
             <input class="wed-reason-input-cal" type="hidden" placeholder="" name="source" value="<?php echo 'Pellithoranam'; ?>">
               <div class="wed-reason-row">
                 <p>Your Wedding Date</p>
                 <input class="wed-reason-input-cal datepicker1" data-date-format="yyyy/mm/dd" name="date" required="required">
                  
               </div>
               <hr>
               <div class="wed-reason-row">
                <p>Yours And Your Partner's Name</p>
                <input class="wed-reason-input-cal" type="text" placeholder="" name="name" required="required"> 
              </div><hr>
              <div class="wed-reason-row">
               <p>Your Story</p>
               <textarea class="wed-reason-textarea" placeholder="Write your success story.." rows="6" name="story" required="required"></textarea>
             </div>
             <div class="wed-reason-row">
              <p>Yours And Your Partner's Photo</p>
              <!-- 		  <button class="wed-add-now-btn">Upload Photo</button> -->
              <input type="file" name="photo" required="required">
            </div>
            <hr>
            <div class="wed-reason-row">
             <button class="wed-add-now-btn" type="submit">Submit</button>
           </div>
           </form>
         </div>

					<div id="scheduleWeekly" class="tab-pane">
          <form method="post" action="<?php echo base_url();?>Settings/other_source">
					<div class="wed-reason-row">
					  <p>Your Wedding Date</p>
						<input class="wed-reason-input-cal datepicker1" data-date-format="yyyy/mm/dd" name="date" required="required">
					</div>
					<hr>
					<div class="wed-reason-row">
					  <p>Enter your the Website Name</p>
             <input class="wed-reason-input-cal" type="hidden" placeholder="" name="matrimony_id" value="<?php echo $mat_id; ?>">
						 <input class="wed-reason-input-cal" type="hidden" placeholder="" name="success_status" value="2">
             <input class="wed-reason-input-cal1 " type="text" placeholder="www.example.com" name="source" required="required">
					</div>
					<hr>
					<div class="wed-reason-row">
					  <button class="wed-add-now-btn" type="submit">Submit</button>
					</div>
        </form>
					</div>
					<div id="scheduleMonthly" class="tab-pane">
              <form method="post" action="<?php echo base_url();?>Settings/other_source">
					<div class="wed-reason-row">
					  <p>Your Wedding Date</p>
					<input class="wed-reason-input-cal datepicker1" data-date-format="yyyy/mm/dd" name="date" required="required">
					</div><hr>
       
					<div class="wed-reason-row">
					  <p>Enter your source </p>
             <input class="wed-reason-input-cal" type="hidden" placeholder="" name="matrimony_id" value="<?php echo $mat_id; ?>">
						 <input class="wed-reason-input-cal" type="hidden" placeholder="" name="success_status" value="3">
             <input class="wed-reason-input-cal1" type="text" placeholder="Other Sources" name="source" required="required">
					</div>
					<hr>
					<div class="wed-reason-row">
					  <button class="wed-add-now-btn" type="submit">Submit</button>
					</div>
					</form>
					</div>
					  </div>
					  
					  <!-------------------------->
					  
					  </div>
					<div id="menu1" class="tab-pane fade">
					<div class="wed-reason-row">
					<p>
					<strong>Activate Donot Disturb</strong><br><br>
					You can add your number to our Do Not Disturb (DND) registry to stop receiving tele sales call.
					</p>
					</div>
					<hr>
       <!-- <form method="post">-->
					<div class="wed-reason-row">
					 <button class="wed-add-now-btn" id="add_dnd" type="button">Add to DND</button>
					 <div id="dndmsg"></div>
					</div>
					
         <!-- </form>-->
					<hr>
					<div class="wed-reason-row">
					<p>If you still wish to delete your profile, <a href="#">click here.</a></p>
					</div>
					
					</div>
					<div id="menu2" class="tab-pane fade">
					<div class="wed-reason-row">
					<p>
					<strong>Preference Changes</strong><br><br>
				<!-- 	Try our recommended partner preference to receive 122054 matches right away. -->
					</p>
					</div>
					<hr>
					<div class="wed-reason-row">
				     <a href="<?php echo base_url();?>profile/partner_preference">
					     <button class="wed-add-now-btn">Update Preference</button>
					 </a>
					</div>
					<hr>
					<div class="wed-reason-row">
					<p>If you still wish to delete your profile, <a href="#">click here.</a></p>
					</div>
					</div>
					<div id="menu3" class="tab-pane fade">
					<div class="wed-reason-row">
					<p>
					<strong>To be Invisible</strong><br><br>
					You can deactivate your profile and it will not be visible to matches.
					</p>
					</div>
					<div class="wed-reason-row">
					<p>How long would you like to keep your profile deactivated?</p>
					<br>
          <form method="post" action="<?php echo base_url()?>Settings/deactivate_profile">
					<div class="wed-custom5">
                          <input id="a" type="radio" name="duration" checked="checked" value="15">
                          <label for="a">15 Days</label>
                          <input id="b" type="radio" name="duration" value="30">
                          <label for="b">1 Month</label>
            						  <input id="c" type="radio"  name="duration" value="60">
                          <label for="c">2 Months</label>
            						  <input id="d" type="radio" name="duration" value="90">
                          <label for="d">3 Months</label>
                      </div>
					</div>
					<hr>
					<div class="wed-reason-row">
					 <button class="wed-add-now-btn" type="submit">Deactivate Profile</button>
					</div>
          </form>
					<hr>
					<div class="wed-reason-row">
					<p>If you still wish to delete your profile, <a href="#">click here.</a></p>
					</div>
					</div>
					<div id="menu4" class="tab-pane fade">
					<div class="wed-reason-row">
					  <p>
					<strong>Please state your reason</strong><br><br>
          <form action="<?php echo base_url();?>Settings/delete_profile" method="post">
					Enter the reason</p>
						<input class="wed-reason-input-cal1" type="text" placeholder="" name="delete_reason">
					 </div>
					 <br>
					<div class="wed-reason-row">
					 <button class="wed-add-now-btn delete_profile" type="submit">Delete Account</button>
          </form>
					</div>
					</div>
				</div>
            </div>
          </div>
        </div>
    </div>
	
	
	

	
	
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/js/bootstrap-datepicker.js"></script>

<script>
$( document ).ready(function() {

$('.datepicker1').datepicker({
    autoclose: true, 
    format: 'yyyy-mm-dd'
});

    $(".change_email").click(function() {
        if($('#email_form').parsley().validate()) {
          var value =$("#email_form").serialize();
          var link = "change_email"; var msg_class = "change_email_msg";
          runSettingsRequest(link,value,msg_class);
        }
    });

    $(".change_password").click(function() {
        if($('#password_form').parsley().validate()) {
          var value =$("#password_form").serialize();
          var link = "change_user_password"; 
          var msg_class = "change_pass_msg";
          runSettingsRequest(link,value,msg_class);
        }
    });

    $(".delete_profile").click(function() {

        if($('#delete_form').parsley().validate()) {
          alert('jghjhhj');
          var value =$("#delete_form").serialize();
          var link = "delete_profile"; 
          var msg_class = "delete_profile_msg"; 
          runSettingsRequest(link,value,msg_class);
          window.location.href= base_url+"home/logout";
        }
    });

});

  function runSettingsRequest(link,value,msg_class) {
    $.ajax({
      type: "POST",
      url: base_url+'settings/'+link,
      data: value,
      error: function (err) {
          console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
      },
      success: function(datas){
          data1 = JSON.parse(datas);
          $("."+msg_class).html("");
          $("."+msg_class).fadeIn();
          $("."+msg_class).html(data1.msg);
          $("."+msg_class).fadeOut(4000);   
      }
    });
  }


  $( document ).ready(function() {
   /*var type = window.location.search.substring(1);
  
      alert(type);alert("dhfdfrtjnytghfj");
    if(type!=''){
      if(type=="contact"){

        $('#inbox_click').click();
      } else if(type=="sent"){ 
        $('#sent_click').click();
      } else {
        $('#trash_click').click();
      }
    }*/
	 var hash = window.location.hash.substr(1);
    if (hash== "alert"){ 
       $('#alert1').click();
    }else if(hash== "contact"){
		 $('#inbox_click').click();
	}
	else if(hash== "settings"){
			 $('#settings1').click();
	}
	else if(hash== "deactivate"){
			 $('#deactvated').click();
	}
	
	
  });

  $(function() {
    var hash = window.location.hash;

    // do some validation on the hash here

    hash && $('ul.nav a[href="' + hash + '"]').tab('show');
});

$(".deact_msg").hide();
$('#deact').on('click', function (e) {
   if ($('#deactiv').parsley().validate()) {
      data = $("#deactiv").serialize();
      //alert(data);

    $.ajax({
        type: "POST",
        url: base_url+'Settings/deactivate_profile1',
        data: data,
        error: function (err) {
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success: function(data) {
        
              $(".deact_msg").show();
			  setTimeout(function(){ 
			  
				
			  },5000);
          
       window.location.href= base_url+"home/logout";
        }
    });
  }
});

$('#add_dnd').on('click', function (e) {
    $.ajax({
        url: base_url+'Settings/activate_dnd',
        error: function (err) {
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success: function(data) {
			 var val = JSON.parse(data);
             var status=val['status'];
             if(status == "success"){
			  $('#dndmsg').html('Activate Successfilly').fadeOut(10000);
			}
        }
	});
});

</script>