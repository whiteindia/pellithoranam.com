<?php 
$settings = get_setting();
$sess = $this->session->userdata('logged_in'); ?>
    <!-- TOP-BANNER -->
<div class="wed-wrapper">
    <div class="wed-profile-banner">
      <div class="wed-profile-banner-left1">
        <div class="container container-custom">
          <div class="wed-profile-center">
            <div class="wed-profile-head1">
                   

              <?php if($sess->profile_photo == "") { ?>
              <img src="<?php echo base_url();?>assets/img/user.jpg">
               <?php } else { ?>
               <img src="<?php echo base_url().$profile->profile_photo; ?>">
               <!-- <img src="<?php echo base_url().$sess->profile_photo; ?>"> -->
                <?php } ?>
            </div>
            <div class="wed-profile-name-bay">
              <h6><?php echo $sess->profile_name; ?></h6>
              <p><?php echo $settings->id_prefix.$sess->matrimony_id; ?></p>
            </div>
            <div class="wed-profile-name-bay1">
			<form method="post" enctype="multipart/form-data" role="form" action="<?php echo base_url();?>profile/upload_multi_photo">
              <li class="wed-add-up-btn">Upload Photo<input class="wed-select-photo1" type="file" multiple name="shopimage[]"></li>
              <li class="wed-add-up-btn"> 

               
               <input class="wed-submit-photo1" type="submit" value="Submit">
              
             </li><br>
			   <?php
               if($this->session->flashdata('message')) {
               $message = $this->session->flashdata('message');
               ?>
            <div id="error_msges">
              <!--  <button class="close" data-dismiss="alert" type="button">×</button> -->
               <?php echo $message['message']; ?>
            </div>
            <?php
               }
               ?>
			 <br>
			  <li class="wed-add-pic-msg">Allowed Type: jpg, png
              Max.Size: 5mb</li>
			 </form>
            </div>
          </div>
        </div>
      </div>
     <!--  <div class="wed-manage">
        <li>Manage Photos</li>
        <li>Photo Privacy</li>
      </div> -->
    </div>

    <div class="container container-custom">
      <div class="wed-photos-bay">
          <?php $i=0 ;foreach($gallery as $gal) { $i++;?>
           <li class="animated flipInX"><div class="edit3"></div><img src="<?php echo base_url().$gal->image_path; ?>"></li>
          <?php } ?>
       <!--  <li class="animated flipInX"><div class="edit3"></div><img src="<?php echo base_url();?>assets/img/pic3.png"></li>
        <li class="animated flipInX"><div class="edit3"></div><img src="<?php echo base_url();?>assets/img/pic4.png"></li> -->
        <li class="animated flipInX">
            <img src="<?php echo base_url();?>assets/img/add.png">
        </li>
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


</body></html>
