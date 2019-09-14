
    <!-- PROFILE-BANNER -->
    <?php $sess = $this->session->userdata('logged_in'); 
  
    ?>

    <div class="wed-profile-detail-banner">
      <div class="container container-custom">
        <h3><?php echo $profile[0]->profile_name;?></h3>
        <p><?php echo "T".$profile[0]->matrimony_id;?><span>Profile Created by <?php echo $profile[0]->profile_for;?></span></p>

      <?php if($profile[0]->profile_photo=="") {?>
       <div class="wed-profile-detail-left">
          <div class="wed-profile-pic-div">
            <div class="wed-profile-pic">
              <li><img src="<?php echo base_url(); ?>assets/img/user.jpg"></li>              
            </div>
          </div>
            <div class="clearfix"></div>
        </div>
      <?php } else { ?>
        <div class="wed-profile-detail-left">
            <div class="wed-profile-pic-div"><div class="wed-profile-pic">
         
              <li><img src="<?php echo base_url().$profile[0]->profile_photo; ?>"></li>
               <?php $i=0 ;foreach($gallery as $gal) { $i++;?>
                <li><img src="<?php echo base_url().$gal->image_path; ?>"></li>
                 <?php } ?>
              </div>
              <div id="wed-profile-pic-slider">
                  <div class="left"><img src="<?php echo base_url(); ?>assets/img/left.png"></div>
    
                    <a data-slide-index="0" href=""><img src="<?php echo base_url().$profile[0]->profile_photo; ?>"></a>
                     <?php $i=0 ;foreach($gallery as $gal) { $i++;?>
                     <a data-slide-index="<?php echo $i;?>" href=""><img src="<?php echo base_url().$gal->image_path; ?>"></a>
                     <?php } ?>
                    <div class="right"><img src="<?php echo base_url(); ?>assets/img/right.png"></div>
                  <div class="clearfix"></div>

              </div> 
            </div>

            <div class="clearfix"></div>
           
        </div>
        <?php } ?>

        <!--<ul class="bxslider">
    <li><img src="img/pic2.png" /></li>
    <li><img src="img/pic2.png"/></li>
    <li><img src="img/pic2.png" /></li>
  </ul>

  <div id="bx-pager">
    <a data-slide-index="0" href=""><img src="img/pic2.png" /></a>
    <a data-slide-index="1" href=""><img src="img/pic2.png" /></a>
    <a data-slide-index="2" href=""><img src="img/pic2.png" /></a>
  </div>-->
        <div class="wed-profile-detail-right">
          <div class="wed-profile-pic-detail">
            <li><span><img src="<?php echo base_url(); ?>assets/img/acnt.png"></span>
              <?php 
              $now = new DateTime(); 
              $age = $now->diff(new DateTime($profile[0]->dob)); 
              echo $age->format('%Y');?> Yrs, <?php echo $profile[0]->height;?>
            </li>
            <li><span><img src="<?php echo base_url(); ?>assets/img/religion.png"></span>
            <?php echo $profile[0]->religion_name;?>
            </li>
            <li><span><img src="<?php echo base_url(); ?>assets/img/caste.png"></span>
            <?php echo $profile[0]->caste_name.",<br/>".$profile[0]->sub_caste_name;?>
            </li>
            <li><span><img src="<?php echo base_url(); ?>assets/img/loc.png"></span>
            <?php echo $profile[0]->city_name.", ".$profile[0]->state_name.", ".$profile[0]->country_name;?>
            </li>
            <li><span><img src="<?php echo base_url(); ?>assets/img/edu.png"></span>
            <?php echo $profile[0]->education;?>
            </li>
            <li><span><img src="<?php echo base_url(); ?>assets/img/profession.png"></span>
            <?php echo $profile[0]->occupation;?>
            </li>
            <li><span><img src="<?php echo base_url(); ?>assets/img/salary.png"></span>
            <?php echo $profile[0]->income;?> INR
            </li>
          </div>

          <div class="wed-profile-pic-log-detail">
             <?php if(!empty($membership)) { if($membership->total_mobileview == 0) { ?>
            <span data-toggle='modal' data-target='#no_send'><img src="<?php echo base_url(); ?>assets/img/mob.png"></span>
             <?php } else { ?>
             <span data-toggle='modal' data-target='#view_mob'><img src="<?php echo base_url(); ?>assets/img/mob.png"></span>
            <?php } } ?>
            <span><img src="<?php echo base_url(); ?>assets/img/dot.png"></span>
            <div class="wed-profile-log-down">
                        <div class="col-md-12">
            <?php
               if($this->session->flashdata('message')) {
               $message = $this->session->flashdata('message');
               ?>
            <div class="alert alert-<?php echo $message['class']; ?>">
               <button class="close" data-dismiss="alert" type="button">×</button>
               <?php echo $message['message']; ?>
            </div>
            <?php
               }
               ?>
         </div>
              <h5>Last Login : <strong>0 days ago</strong></h5>
           <!--    <?php if(!empty($membership)) { if($membership->total_sendmail == 0) { ?>
              <input type="button" class="wed-ques-yes" value="Send Mail" data-toggle='modal' data-target='#no_send'/>
              <?php } else { ?>
              <input type="button" class="wed-ques-yes" value="Send Mail" proc_name="<?php echo $profile[0]->profile_name; ?>" matr_id="<?php echo $profile[0]->matrimony_id; ?>" data-toggle='modal' data-target='#send_mail'/>
              <?php } } ?> -->
             <a href="<?php echo base_url()?>Profile/profile_details/<?php echo $profile[0]->matrimony_id; ?>"> <input type="button" class="wed-ques-yes" value="View Full Profile" proc_name="<?php echo $profile[0]->profile_name; ?>" matr_id="<?php echo $profile[0]->matrimony_id; ?>"/></a>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="wed-profile-ques">
            <div class="wed-questions">
              <h5>Like this member?</h5>
              <p>Take the next step by expressing interest.</p>
            </div>
            <div class="wed-questions-decison">
              <?php if((isset($profile[0]->interested)) && ($profile[0]->interested == 1)) { ?>
            <!--   <button class="wed-interest">Already Interested</button> -->
              <?php } else { ?>
              <?php if(!empty($membership)) {  if($membership->total_interest == 0) { ?>
              <button class="wed-interest" data-toggle='modal' data-target='#no_interest' type="submit">Yes</button>
              <?php } else { ?>
              <button class="wed-interest send_interest" proc_name="<?php echo $profile[0]->profile_name; ?>" matr_id="<?php echo $profile[0]->matrimony_id; ?>" type="submit">Yes</button>
              <?php } } } ?>
           
        <!--       <div class="wed-ques-no">
                No
              </div> -->
              <div class="wed-ques-arw">
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>





</div>

      <div class="modal fade wed-add-modal" id="send_mail" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
            <form method="post" id="send_form"> 
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Send Message to <?php echo $profile[0]->profile_name;?></h4>
              <p>Enter your message</p>
            <div class="wed-add-modal-footer">
                <textarea rows="4" cols="50" name="mail_content">Hy <?php echo $profile[0]->profile_name;?></textarea><br/>
                <input type="hidden" name="mail_to" value="<?php echo $profile[0]->matrimony_id; ?>">
                <button type='button' id='send_form_btns' class='wed-view send_form_btn'>Send Message</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade wed-add-modal" id="forward" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
            <form method="post" id="forward_form" action="<?php echo base_url()?>Profile/mail_sending"> 
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4> Message From <?php echo $sess->profile_name; ?></h4>
              <p>Enter your message</p>
            <div class="wed-add-modal-footer">
                 <input type="text" name="recipient_name"  placeholder="Recipient Name" required>
                   <input type="text" name="recipient_mailid" placeholder="Recipient Email Id"><br/><br/>
                <textarea rows="4" cols="50" name="mail_content"></textarea><br/>
                <input type="hidden" name="forward_name" value="<?php echo $profile[0]->profile_name; ?>">
                 <input type="hidden" name="profile_photo" value="<?php echo $profile[0]->profile_photo; ?>">
                <input type="hidden" name="forward_id" value="<?php echo $profile[0]->matrimony_id; ?>">
                <input type="hidden" name="mail_from" value="<?php echo $sess->profile_name; ?>">
                <button type='submit' id='send_forward' class='wed-view send_form_btn'>Send Message</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
   <div class="modal fade wed-add-modal" id="view_mob" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
            <form method="post" id="contact_form" action=""> 
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4> Contact Details Of <?php echo $profile[0]->profile_name; ?> (T<?php echo $profile[0]->matrimony_id; ?>)</h4>
              <p>Would You like to View <?php echo $profile[0]->profile_name; ?> (T<?php echo $profile[0]->matrimony_id; ?>) mobile number or send an <br/>sms?</p>
         <div class="wed-add-modal-footer">
          
          
                <input type="hidden" name="forward_name" value="<?php echo $profile[0]->profile_name; ?>">
                <input type="hidden" name="forward_id" value="<?php echo $profile[0]->matrimony_id; ?>">
                <input type="hidden" name="mail_from" value="<?php echo $sess->profile_name; ?>">
                    <button type='button' id='view_mobile' class='wed-view send_form_btn' data-toggle='modal' data-target='#view_mobile_modal'>View Mobile Number</button>
                <button type='button' id='send_sms' class='wed-view send_form_btn' data-toggle='modal' data-target='#no_send'>Send SMS</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
   <div class="modal fade wed-add-modal" id="view_mobile_modal" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
            <form method="post" id="contact_form" action=""> 
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4> Contact Details Of <?php echo $profile[0]->profile_name; ?> (T<?php echo $profile[0]->matrimony_id; ?>)</h4>
              <p>Pellithoranam is the most Trusted,the most successfull and the only matrimony site in the world to have 100% mobile verified profiles.Call up and connect with your prospects instantly</p>
         <div class="wed-add-modal-footer">
          
                <div style="border:1px solid; color:#fff;">Primary Mobile Number : <h4>46757576676</h4></div>   
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>

<script>
$(document).ready(function(){

$(document).on("click","#send_form_btns",function() {
    var matri_id = $(this).attr('matr_id');
    var proc_name = $(this).attr('proc_name');
    var value =$("#send_form").serialize();

    $.ajax({
        type: "POST",
        url: base_url+'profile/send_mail',
        data: value,
        error: function (err) {
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success: function(data) {
          $('#send_mail').modal('hide');
          data = JSON.parse(data);
            if(data == "success") {
              //$.post(base_url+"Verify/intrest_success", { matri_id: matri_id }, function(data) { });
              var main_msg ="Your Mail has been sent to "+proc_name+"'s [T"+matri_id+"].";
              var sub_msg ="Wait for "+proc_name+" responce.";
            } else {
              var main_msg ="Sorry, Your Send Mail Limit Exceeded";
              var sub_msg ="Upgrade your profile to send Unlimited Mails";
            }
            var modal = showSendMailModal(main_msg,sub_msg,matri_id);
            $('body').appendTo(modal);
            $('#common-modal2-'+matri_id).modal('show');
        }
    });
});

$(document).on("click","#send_forward1",function() { forward_form
  
    var value =$("#forward_form").serialize();
    alert(value);

});
$(document).on("click","#view_mobile",function() { 

       $("#view_mob").hide();
    

});
$(document).on("click","#send_sms",function() { 

       $("#view_mob").hide();
    

});
});

function showSendMailModal(main_msg,sub_msg,matri_id) {
    var modal='<div class="modal fade wed-add-modal" id="common-modal2-'+matri_id+'" role="dialog"> <div class="modal-dialog wed-add-modal-dialogue"> <div class="modal-content wed-add-modal-content"> <div class="modal-body wed-add-modal-body"> <button type="button" class="close" data-dismiss="modal">&times;</button> <h4>'+main_msg+'</h4> <p>'+sub_msg+'</p><div class="wed-add-modal-footer"><a href="" data-dismiss="modal">Close</a></div></div></div></div></div>';
    return modal;
}

</script>