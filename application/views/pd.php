<!-- PROFILE-BANNER -->
<?php $sess = $this->session->userdata('logged_in');
//print_r($sess);die;
//print_r($profile[0]->gender);die;
/*print_r($prefernce['min_income']);die();*/
$settings = get_setting();
//$membership=json_decode(json_encode($membership),true);
if(($sess->matrimony_id==$profile[0]->matrimony_id) || ($sess->gender!=$profile[0]->gender)){
?>
       <style> 
 
            @media print { 
               .no-print { 
                  visibility: hidden; 
               } 
            } 
        </style> 
    <div class="wed-profile-detail-banner">
      <div class="container container-custom">
        <h3><?php echo $profile[0]->profile_name;?></h3>
        <p><?php echo $settings->id_prefix;?><?php echo $profile[0]->matrimony_id;?><span>Profile Created by <?php echo $profile[0]->profile_for;?></span></p>

      <?php if($profile[0]->profile_photo=="") {?>
       <div class="wed-profile-detail-left"><!--wed-profile-detail-left- -->
          <div class="wed-profile-pic-div">  <!--wed-profile-pic-div-->
            <div class="class= wed-profile-pic" > <!-- class= wed-profile-pic-->
              <li><img src="<?php echo base_url(); ?>assets/img/user.jpg" style="width:200px; height:200px; !important;" ></li>
            </div>
          </div>
            <div class="clearfix"></div>
        </div>
      <?php } else if($profile[0]->profile_photo!="" && $profile[0]->profile_preference==0) { ?>
        <div class="wed-profile-detail-left">
            <div class="wed-profile-pic-div no-print"><div class="wed-profile-pic">

             
               <?php $i=0 ;foreach($gallery as $gal) { $i++;?>
                <li><img src="<?php echo base_url().$gal->image_path; ?>"></li>
                 <?php } ?>
                  <li><img src="<?php echo base_url().$profile[0]->profile_photo; ?>"></li>
              </div>
              <div id="wed-profile-pic-slider">
                  <div class="left"><img src="<?php echo base_url(); ?>assets/img/left.png"></div>

                    <a data-slide-index="0" href=""><img src="<?php echo base_url().$profile[0]->profile_photo; ?>"></a>
                     <?php $i=0 ;foreach($gallery as $gal) { $i++;
/*echo $gal->profile_preference;*/
                      ?>
                     <a data-slide-index="<?php echo $i;?>" href=""><img src="<?php echo base_url().$gal->image_path; ?>"></a>
                     <?php } ?>
                    <div class="right"><img src="<?php echo base_url(); ?>assets/img/right.png"></div>
                  <div class="clearfix"></div>

              </div>
            </div>

            <div class="clearfix"></div>

        </div>
  
 <?php } else if($profile[0]->profile_photo!="" && $profile[0]->profile_preference==1) { ?>
        <div class="wed-profile-detail-left">
        <?php
            $reuest_res = $this->Search_model->get_permission($profile[0]->matrimony_id);
                        if($reuest_res=="requested"||$reuest_res=="canceled"){
                          
                     ?>

            <div class="wed-profile-pic-div no-print"><div class="wed-profile-pic">

               <?php $i=0 ;foreach($gallery as $gal) { $i++;?>
                <li><img src="<?php echo base_url().$gal->image_path_blur; ?>" style="-webkit-filter: blur(4px); 
				filter: blur(4px);" ></li>
                 <?php } ?>
                  <li><img src="<?php echo base_url().$profile[0]->profile_photo_blured; ?>" style="-webkit-filter: blur(4px); 
				filter: blur(4px);"></li>   <!--  <?php echo base_url().$profile[0]->profile_photo_blured; ?>      --->
              </div>
              <div id="wed-profile-pic-slider">
                  <div class="left"><img src="<?php echo base_url(); ?>assets/img/left.png"></div>

                    <a data-slide-index="0" href=""><img src="<?php echo base_url().$profile[0]->profile_photo_blured; ?>" style="-webkit-filter: blur(4px); 
				filter: blur(4px);"></a>
                     <?php $i=0 ;foreach($gallery as $gal) { $i++;
/*echo $gal->profile_preference;*/
                      ?>
                     <a data-slide-index="<?php echo $i;?>" href=""><img src="<?php echo base_url().$gal->image_path_blur; ?>" style="-webkit-filter: blur(4px); 
				filter: blur(4px);"></a>
                     <?php } ?>
                    <div class="right"><img src="<?php echo base_url(); ?>assets/img/right.png"></div>
                  <div class="clearfix"></div>

              </div>
            </div>

            <!----->
       <?php   }else if($reuest_res=="success"){
                     ?>   
                      
                <!--      <div class="wed-profile-detail-left"> -->
            <div class="wed-profile-pic-div no-print"><div class="wed-profile-pic">

             
               <?php $i=0 ;foreach($gallery as $gal) { $i++;?>
                <li><img src="<?php echo base_url().$gal->image_path; ?>"></li>
                 <?php } ?>
                  <li><img src="<?php echo base_url().$profile[0]->profile_photo; ?>"></li>
              </div>
              <div id="wed-profile-pic-slider">
                  <div class="left"><img src="<?php echo base_url(); ?>assets/img/left.png"></div>

                    <a data-slide-index="0" href=""><img src="<?php echo base_url().$profile[0]->profile_photo; ?>"></a>
                     <?php $i=0 ;foreach($gallery as $gal) { $i++;
/*echo $gal->profile_preference;*/
                      ?>
                     <a data-slide-index="<?php echo $i;?>" href=""><img src="<?php echo base_url().$gal->image_path; ?>"></a>
                     <?php } ?>
                    <div class="right"><img src="<?php echo base_url(); ?>assets/img/right.png"></div>
                  <div class="clearfix"></div>

              </div>
            </div>

            <div class="clearfix"></div>

     <!--   </div>-->

            <?php } 
                        ?>
            <!------->
            <input type="button" class="wed-ques-yes" value="Request Photo" data-toggle='modal' data-target='#photo_request'/>
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
            <?php echo $profile[0]->city_name." ".$profile[0]->state_name.", ".$profile[0]->country_name;?>
            </li>
            <li><span><img src="<?php echo base_url(); ?>assets/img/religion.png"></span>
            <?php
            $qry_1 = $this->db->get_where('stars', array('star_id'=>$profile[0]->star_id)); 
            echo $qry_1->result()[0]->star_name.",".$profile[0]->padam;?>
            </li>

            <li><span><img src="<?php echo base_url(); ?>assets/img/edu.png"></span>
            <?php echo $profile[0]->education;?>
            </li>
            <li><span><img src="<?php echo base_url(); ?>assets/img/profession.png"></span>
            <?php echo $profile[0]->occupation;?>
            </li>
            <li><span><img src="<?php echo base_url(); ?>assets/img/salary.png"></span>
            <?php echo ceil($profile[0]->income);?> INR
            </li>
          </div>

          <div class="wed-profile-pic-log-detail">
          <?php if(!empty($membership) && $membership->total_mobileview>0) {// echo $membership->total_mobileview.':mv';
                         //   echo '  from'.$this->session->userdata('logged_in')->matrimony_id;
                        //    echo '  to'.$profile[0]->matrimony_id;
                            $query = $this->db->where('mobileview_from',$this->session->userdata('logged_in')->matrimony_id);
                          //  $query = $this->db->where('mobileview_to',$profile[0]->matrimony_id); 
                            $query = $this->db->get('mobile_view'); 
                             $used=$query->num_rows();

                             $query1 = $this->db->where('mobileview_from',$this->session->userdata('logged_in')->matrimony_id);
                              $query1 = $this->db->where('mobileview_to',$profile[0]->matrimony_id); 
                               $query1 = $this->db->get('mobile_view'); 
                                $alreadyviewed=$query1->num_rows();
                                $total_mobileview=$membership->total_mobileview;
                             /*   echo 'isviewed'.$alreadyviewed;
                                echo '-usedno:'.$used;
echo  '--totalmv'.$membership->total_mobileview; */
                           //  if
                            }
                            else{
                              $used=1;
                              //  if
                              $total_mobileview=0;
                            }
                             ?>
                       <!--  -->   <?php
                            if($alreadyviewed){
                            ?>
                            <span data-toggle='modal' data-target='#view_mob'><img src="<?php echo base_url(); ?>assets/img/mob.png"> Contact</span>
                            <?php } else if($total_mobileview>$used){ ?>    
                              <span data-toggle='modal' data-target='#view_mob'><img src="<?php echo base_url(); ?>assets/img/mob.png"> Contact</span>
                            <?php } else {?>
                              <span data-toggle='modal' data-target='#no_send'>
              <a class="tool_tip" data-toggle="tooltip" data-placement="top"  title="Mobile Number">  
                  <img src="<?php echo base_url(); ?>assets/img/mob.png"> Contact
               </a> 
            </span>
                            <?php } ?>  

                               <!--   <?php 
//}
          //if(!empty($membership)) { 
          if($membership->total_mobileview > $used) { ?>
           <span data-toggle='modal' data-target='#no_send'>
              <a class="tool_tip" data-toggle="tooltip" data-placement="top"  title="Mobile Number">  
                  <img src="<?php echo base_url(); ?>assets/img/mob.png"> Contact
               </a> 
            </span>
             <?php } else { ?>
            <img src="<?php echo base_url(); ?>assets/img/mob.png"> <strong>Locked</strong> 
           <!--  <span data-toggle='modal' data-target='#view_mob'><img src="<?php echo base_url(); ?>assets/img/mob.png"> Contact</span>
            <?php } 
         // }
           ?>  -->
            <span id="print_profile">
              <a class="tool_tip" data-toggle="tooltip" data-placement="top"  title="Print">
                <img src="<?php echo base_url(); ?>assets/img/dot.png"> Print
              </a>
            </span>
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
     
             <!--<h5>Last Login: <strong><?php //echo get_days_count($profile[0]->matrimony_id); ?></strong></h5>-->
			 <?php if($logintime) { ?>
			  <h5>Last Login: <strong><?php echo $logintime->date_time;?></strong></h5>
			  <?php } ?>
			  
			  <?php if($this->session->userdata('logged_in_admin') || $this->session->userdata('logged_in')->matrimony_id==$profile[0]->matrimony_id ){ ?>
          <?php if(!empty($membership) && $membership->total_mobileview>0) {// echo $membership->total_mobileview.':mv';
                         //   echo '  from'.$this->session->userdata('logged_in')->matrimony_id;
                        //    echo '  to'.$profile[0]->matrimony_id;
                            $query = $this->db->where('mail_from',$this->session->userdata('logged_in')->matrimony_id);
                          //  $query = $this->db->where('mobileview_to',$profile[0]->matrimony_id); 
                            $query = $this->db->get('profile_mails'); 
                             $used=$query->num_rows();

                             $querym = $this->db->where('matrimony_id',$this->session->userdata('logged_in')->matrimony_id);
                             //  $query = $this->db->where('mobileview_to',$profile[0]->matrimony_id); 
                               $querym = $this->db->get('membership_details'); 
                                $membershipd=$query->row()();



                        /*     $query1 = $this->db->where('mobileview_from',$this->session->userdata('logged_in')->matrimony_id);
                              $query1 = $this->db->where('mobileview_to',$profile[0]->matrimony_id); 
                               $query1 = $this->db->get('mobile_view'); 
                                $alreadyviewed=$query1->num_rows();   */
                                $total_mailsent=$membershipd->total_sendmail;
                             /*   echo 'isviewed'.$alreadyviewed;
                                echo '-usedno:'.$used;
echo  '--totalmv'.$membership->total_mobileview; */
                           //  if
                            }
                            else{
                              $used=1;
                              //  if
                              $total_mailsent=0;
                            }
                       //     total_sendmail

                            echo '<br>used mails--'.$used;
                            echo '<br>total mails--'.$membershipd->total_sendmail;
                             ?>
  
  
  
  
  
  
  	<!--		<?php if(!empty($membership)) { if($membership->total_sendmail == 0) { ?>
					  <input type="button" disabled class="wed-ques-yes" value="Send Mail" data-toggle='modal' data-target='#no_send'/>
					  <?php } else { ?>
					  <input type="button" disabled class="wed-ques-yes" value="Send Mail" proc_name="<?php echo $profile[0]->profile_name; ?>" matr_id="<?php echo $profile[0]->matrimony_id; ?>" data-toggle='modal' data-target='#send_mail'/>
					  <?php } } ?>  -->
					  <?php if(!empty($membership)) { ?>
					<input type="button" disabled  class="wed-ques-yes" value="Forward" proc_name="<?php echo $profile[0]->profile_name; ?>" matr_id="<?php echo $profile[0]->matrimony_id; ?>" data-toggle='modal' data-target='#forward'/>
				   <?php } ?>
			  <?php } else {?>
			  
          <!--    <?php if(!empty($membership)) { if($membership->total_sendmail == 0) { ?>
              <input type="button" class="wed-ques-yes" value="Send Mail" data-toggle='modal' data-target='#no_send'/>
              <?php } else { ?>
              <input type="button" class="wed-ques-yes" value="Send Mail" proc_name="<?php echo $profile[0]->profile_name; ?>" matr_id="<?php echo $profile[0]->matrimony_id; ?>" data-toggle='modal' data-target='#send_mail'/>
              <?php } } ?>  -->
              <?php if(!empty($membership)) { ?>
            <input type="button" class="wed-ques-yes" value="Forward" proc_name="<?php echo $profile[0]->profile_name; ?>" matr_id="<?php echo $profile[0]->matrimony_id; ?>" data-toggle='modal' data-target='#forward'/>
           <?php } ?>
		    <?php } ?>
		   
            </div>
          </div>
          </div>
          <div class="clearfix"></div>
          <div class="wed-profile-ques">
           <?php if(!$this->session->userdata('logged_in_admin')) { ?>
            <div class="wed-questions">
               
              <h5>Like this member?</h5>
              <p>Take the next step by expressing interest.</p>
             
            </div>
			
		   <?php if($this->session->userdata('logged_in_admin') || $this->session->userdata('logged_in')->matrimony_id==$profile[0]->matrimony_id ){ ?>
            <div class="wed-questions-decison">
              <?php if((isset($profile[0]->interested)) && ($profile[0]->interested == 1)) { ?>
              <button  disabled  class="wed-interest">Already Interested</button>
               <button  disabled class="wed-interest"  data-toggle='modal' data-target='#no_interest' type="submit"></button>
              <?php } else { ?>
              <?php if(!empty($membership)) {  if($membership->total_interest == 0) { ?>
              <button  disabled class="wed-interest"  data-toggle='modal' data-target='#no_interest' type="submit">Yes</button>
              <?php } else { ?>
              <button disabled class="wed-interest send_interest" proc_name="<?php echo $profile[0]->profile_name; ?>" matr_id="<?php echo $profile[0]->matrimony_id; ?>" type="submit">Yes</button>
              <?php } } } ?>
              
              <div class="wed-ques-arw">
                 
              </div>
            </div>
			 <?php } else { ?>
			
			
			
			 <div class="wed-questions-decison">
              <?php if((isset($profile[0]->interested)) && ($profile[0]->interested == 1)) { ?>
              <button class="wed-interest">Already Interested</button>
              <?php } else { ?>
              <?php if(!empty($membership)) {  if($membership->total_interest == 0) { ?>
              <button class="wed-interest" data-toggle='modal' data-target='#no_interest' type="submit">Yes</button>
              <?php } else { ?>
              <button class="wed-interest send_interest" proc_name="<?php echo $profile[0]->profile_name; ?>" matr_id="<?php echo $profile[0]->matrimony_id; ?>" type="submit">Yes intrested</button>
              <?php } } } ?>
              <div class="wed-ques-arw">
              </div>
            </div>
			
			
			
			 <?php } ?>
			 
			  <?php } ?>
			 
			 
			 
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>


<div class="wed-personel-info">
      <div class="container container-custom">
        <div class="row">
          <div class="col-md-9">
<div class="wed-personel">
	 <h1>Personal Information   <?php                             echo '<br>used mails--'.$used;
                            echo '<br>total mails--'.$total_mailsent;
                            
                            echo 'new<br> total pkg<br>';
                            echo '<pre>';
                          
                            print_r($membership);
                            echo '</pre>';
                            
                            
                            ?></h1>
              <hr>
              <ul>
              	<li class="about">
                  <h3>About <?php echo $profile[0]->profile_name;?></h3>
                  <p><?php echo $profile[0]->about_you;?>
                  </p>
                  <hr>
                </li>
               <li class="contact">
                  <h3>Basic Details</h3>
                  <ul class="wed-personel-main-ul">
                    <li class="wed-personel-main-li">
                      <ul class="wed-personel-sec-ul">
                        <li class="wed-personel-sec-li">
                          <div class="child1">Name</div>
                          <div class="child2">:</div>
                          <div class="child3">
                               <?php if($profile[0]->profile_name){ echo $profile[0]->profile_name;} else { ?> - <?php } ?> </div>
                          <div class="clearfix"></div>
                        </li>
             <!--           <li class="wed-personel-sec-li">
                          <div class="child1">Age</div>
                          <div class="child2">:</div>
                          <div class="child3"><?php $now = new DateTime();
                                                    $age = $now->diff(new DateTime(D));
                                                    echo $age->format('%Y');?> Yrs</div>
                          <div class="clearfix"></div>
                        </li> -->



                        <!--new fields--->
                        <li class="wed-personel-sec-li">
                          <div class="child1">Date of birth</div>
                          <div class="child2">:</div>
                          <div class="child3"><?php echo $profile[0]->dob; ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Time of Birth</div>
                          <div class="child2">:</div>
                          <div class="child3"><?php $date = new DateTime($profile[0]->timeofbirth); echo $date->format('h:ia'); ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Place of Birth</div>
                          <div class="child2">:</div>
                          <div class="child3"><?php echo $profile[0]->placeofbirth; ?></div>
                          <div class="clearfix"></div>
                        </li>









                        <li class="wed-personel-sec-li">
                          <div class="child1">Height</div>
                          <div class="child2">:</div>
                          <div class="child3">
                                <?php if($profile[0]->height){ echo $profile[0]->height;} else { ?> - <?php } ?> </div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Surname</div>
                          <div class="child2">:</div>
                          <div class="child3">
                             <?php if($profile[0]->profile_surname){ echo $profile[0]->profile_surname;} else { ?> - <?php } ?> </div>
                          <div class="clearfix"></div>
                        </li>

                        <li class="wed-personel-sec-li">
                          <div class="child1">Marital Status</div>
                          <div class="child2">:</div>
                          <div class="child3">
                          <?php
                          if($profile[0]->maritial_status == 1) {
                              $m_stat = "Never Married";
                          } else if($profile[0]->maritial_status == 2) {
                              $m_stat = "Divorced";
                          } else if($profile[0]->maritial_status == 3) {
                              $m_stat = "Widowed";
                          } else {
                              $m_stat = "Awaiting for Divorce";
                          }
                          echo $m_stat;
                          ?></div>
                          <div class="clearfix"></div>
                        </li>
                      </ul>
                    </li>
                    <li class="wed-personel-main-li">
                      <ul class="wed-personel-sec-ul">
                      <li class="wed-personel-sec-li">
                          <div class="child1">Mother Toungue</div>
                          <div class="child2">:</div>
                          <div class="child3">
                               <?php if($profile[0]->mother_tongue_name){ echo $profile[0]->mother_tongue_name;} else { ?> - <?php } ?> </div>
                          <div class="clearfix"></div>
                        </li>

                        <li class="wed-personel-sec-li">
                          <div class="child1">Body Type</div>
                          <div class="child2">:</div>
                          <div class="child3">
                          <?php
                          if($profile[0]->body_type == 1) {
                              $b_typ = "Slim";
                          } else if($profile[0]->body_type == 2) {
                              $b_typ = "Average";
                          } else if($profile[0]->body_type == 3) {
                              $b_typ = "Athletic";
                          } else {
                              $b_typ = "Heavy";
                          }
                          echo $b_typ;
                          ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Complexion</div>
                          <div class="child2">:</div>
                          <div class="child3">
                          <?php
                          if($profile[0]->complexion == 1) {
                              $compl = "Very Fair";
                          } else if($profile[0]->complexion == 2) {
                              $compl = "Fair";
                          } else if($profile[0]->complexion == 3) {
                              $compl = "Wheatish";
                          } else if($profile[0]->complexion == 3) {
                              $compl = "Wheatish Brown";
                          } else {
                              $compl = "Dark";
                          }
                          echo $compl;
                          ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Physical Status</div>
                          <div class="child2">:</div>
                          <div class="child3">
                          <?php
                          if($profile[0]->physical_status == 1) {
                              $physical_status = "Normal";
                          } else {
                              $physical_status = "Physically Challenged";
                          }
                          echo $physical_status;
                          ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Eating Habits</div>
                          <div class="child2">:</div>
                          <div class="child3">
                          <?php
                          if($profile[0]->eating == 1) {
                              $eat = "Vegetarian";
                          } else if($profile[0]->eating == 2) {
                              $eat = "Non Vegitarian";
                          } else {
                              $eat = "Eggetarian";
                          }
                          echo $eat;
                          ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Drinking Habits</div>
                          <div class="child2">:</div>
                          <div class="child3">
                          <?php
                          if($profile[0]->drinking == 1) {
                              $drink = "No";
                          } else if($profile[0]->drinking == 2) {
                              $drink = "Drinks Socialy";
                          } else {
                              $drink = "Yes";
                          }
                          echo $drink;
                          ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Smoking Habits</div>
                          <div class="child2">:</div>
                          <div class="child3">
                          <?php
                          if($profile[0]->smoking == 1) {
                              $smoke = "No";
                          } else if($profile[0]->smoking == 2) {
                              $smoke = "Occasionaly";
                          } else {
                              $smoke = "Yes";
                          }
                          echo $smoke;
                          ?>
                          <!-- <span>Request</span></div> -->
                          <div class="clearfix"></div>
                        </li>
                      </ul>
                    </li>
                    <div class="clearfix"></div>
                  </ul>
                 <div class="clearfix"></div>
                    <hr>
               
			<div class="clearfix"></div>
			
			<li class="contact">
                  <h3>Contact Details</h3>
                 
                    <ul class="wed-personel-main-ul">
                      <li class="wed-personel-main-li">
                        <ul class="wed-personel-sec-ul">
                          <li class="wed-personel-sec-li">
                            <div class="child1">Contact Number</div>
                            <div class="child2">:</div>
                            <div class="child3">
                           <!-- --> <?php if(!empty($membership) && $membership->total_mobileview>0) {// echo $membership->total_mobileview.':mv';
                         //   echo '  from'.$this->session->userdata('logged_in')->matrimony_id;
                        //    echo '  to'.$profile[0]->matrimony_id;
                            $query = $this->db->where('mobileview_from',$this->session->userdata('logged_in')->matrimony_id);
                          //  $query = $this->db->where('mobileview_to',$profile[0]->matrimony_id); 
                            $query = $this->db->get('mobile_view'); 
                             $used=$query->num_rows();
                           //  if
                           $total_mobileview=$membership->total_mobileview;
                            }
                            else{
                              $used=1;
                              //  if
                              $total_mobileview=0;
                            }
                            ?>
                            
                                <?php if(!$this->session->userdata('logged_in_admin')) {
                                 if($total_mobileview>$used) { ?><strong><span data-toggle="modal" data-target="#view_mob" style="cursor: pointer;">View Number</span></strong><?php } else {?><strong>Locked</strong><?php } ?>
                              <?php } else {  ?> <strong>Locked</strong> <?php } ?><!--<strong>Locked</strong> </div> -->
                            <div class="clearfix"></div>
                          </li>
                          <li class="wed-personel-sec-li">
                            <div class="child1">Parent Contact</div>
                            <div class="child2">:</div>
                            <div class="child3">Not available</div>
                            <div class="clearfix"></div>
                          </li>
                          <li class="wed-personel-sec-li">
                            <div class="child1">Status</div>
                            <div class="child2">:</div>
                            <div class="child3">Offline</div>
                            <div class="clearfix"></div>
                          </li>
                          <li class="wed-personel-sec-li">
                            <div class="child1">Send Mail</div>
                            <div class="child2">:</div>
                            <div class="child3"><?php if(!empty($membership) && $membership->total_sendmail>0){?>
<strong><span proc_name="<?php echo $profile[0]->profile_name; ?>" matr_id="<?php echo $profile[0]->matrimony_id; ?>" data-toggle='modal' style="cursor: pointer;" data-target='#send_mail'>Click Send</span></strong>
                            <?php } else {?><strong>Locked</strong><?php } ?></div>
                            <div class="clearfix"></div>
                          </li>
                        </ul>
                        <!--<button class="wed-btn-view">View More Details</button> -->
                      </li>
                       <?php if(!$this->session->userdata('logged_in_admin')) {
                     if($membership->membership_package==1){?>
                      <li class="wed-personel-main-li">
                        <p>Upgrade Membership to Unlock</p>
                      <a href="<?php echo base_url();?>package/"> <button class="wed-btn-upgrade">Upgrade Now</button></a>
                      </li>
                      <?php } } else { ?> - <?php } ?>
                    </ul>
                    <div class="clearfix"></div>
                    <hr>
                </li>
<!-- RELIGION-INFORMATION -->

                <li class="religion">
                  <h3>Religion Information</h3>
                  <ul class="wed-personel-main-ul">
                    <li class="wed-personel-main-li">
                      <ul class="wed-personel-sec-ul">
                        <li class="wed-personel-sec-li">
                          <div class="child1">Religion</div>
                          <div class="child2">:</div>
                          <div class="child3">
                             <?php if($profile[0]->religion_name){ echo $profile[0]->religion_name;} else { ?> - <?php } ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Caste</div>
                          <div class="child2">:</div>
                          <div class="child3">
                               <?php if($profile[0]->caste_name){ echo $profile[0]->caste_name;} else { ?> - <?php } ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Sub Caste</div>
                          <div class="child2">:</div>
                          <div class="child3">
                               <?php if($profile[0]->sub_caste){ echo $profile[0]->sub_caste;} else { ?> - <?php } ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Gothram</div>
                          <div class="child2">:</div>
                          <div class="child3">
                               <?php if(isset($profile[0]->gothram)){ echo $profile[0]->gothram;} else { ?> - <?php } ?></div>
                          <div class="clearfix"></div>
                        </li>
                      </ul>
                    </li>
                    <div class="clearfix"></div>
                  </ul>
                  <hr>
                </li>
<!-- BRIDES-LOCATION -->

                <li class="location">
                  <h3> Location</h3>
                  <ul class="wed-personel-main-ul">
                    <li class="wed-personel-main-li">
                      <ul class="wed-personel-sec-ul">
                        <li class="wed-personel-sec-li">
                          <div class="child1">Country</div>
                          <div class="child2">:</div>
                          <div class="child3">
                                <?php if($profile[0]->country_name){ echo $profile[0]->country_name;} else { ?> - <?php } ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">State</div>
                          <div class="child2">:</div>
                          <div class="child3">
                                <?php if($profile[0]->state_name){ echo $profile[0]->state_name;} else { ?> - <?php } ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">City</div>
                          <div class="child2">:</div>
                          <div class="child3">
                                <?php if($profile[0]->city_name){ echo $profile[0]->city_name;} else { ?> - <?php } ?></div>
                          <div class="clearfix"></div>
                        </li>
                      </ul>
                    </li>
                    <div class="clearfix"></div>
                  </ul>
                  <hr>
                </li>

 <!-- PROFESSIONAL-INFORMATION-->

                <li class="profession">
                  <h3>Professional Information</h3>
                  <ul class="wed-personel-main-ul">
                    <li class="wed-personel-main-li">
                      <ul class="wed-personel-sec-ul">
                        <li class="wed-personel-sec-li">
                          <div class="child1">Education</div>
                          <div class="child2">:</div>  
                          <div class="child3">
                              <?php if($profile[0]->education){ echo $profile[0]->education;} else { ?> - <?php } ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Occupation</div>
                          <div class="child2">:</div>
                          <div class="child3">
                              <?php if($profile[0]->occupation){ echo $profile[0]->occupation;} else { ?> - <?php } ?></div>
                          <div class="clearfix"></div>
                        </li>
                      </ul>
                    </li>
                    <div class="clearfix"></div>
                  </ul>
                  <hr>
                </li>
            
			<li class="family">
                  <h3>Family Details</h3>
                  <ul class="wed-personel-main-ul">
                    <li class="wed-personel-main-li">
                      <ul class="wed-personel-sec-ul">
						<li class="wed-personel-sec-li">
                          <div class="child1">Family Values</div>
                          <div class="child2">:</div>
                          <div class="child3">
                          <?php
                          if($profile[0]->family_value == 1) {
                              $family_value = "Orthodox";
                          } else if($profile[0]->family_value == 2) {
                              $family_value = "Traditional";
                          } else if($profile[0]->family_value == 3) {
                              $family_value = "Moderate";
                          } else {
                              $family_value = "Liberal";
                          }
                          echo $family_value;
                          ?>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                      	<li class="wed-personel-sec-li">
                          <div class="child1">Family Type</div>
                          <div class="child2">:</div>
                          <div class="child3">
                            <?php
                          if($profile[0]->family_type == 1) {
                              $family_type = "Joint";
                          } else {
                              $family_type = "Nuclear";
                          }
                          echo $family_type;
                          ?>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Family Status</div>
                          <div class="child2">:</div>
                          <div class="child3">
                            <?php
                          if($profile[0]->family_status == 1) {
                              $family_status = "Middle Class";
                          } else if($profile[0]->family_status == 2) {
                              $family_status = "Upper Middile Class";
                          } else if($profile[0]->family_status == 3) {
                              $family_status = "Rich";
                          } else {
                              $family_status = "Affluent";
                          }
                          echo $family_status;
                          ?>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Father's Name</div>
                          <div class="child2">:</div>
                          <div class="child3">
                               <?php if($profile[0]->father_status){ echo $profile[0]->father_status;} else { ?> - <?php } ?></div>
                          <div class="clearfix"></div>
                        </li>
                        
                       
                      </ul>
                  </li>
                  <li class="wed-personel-main-li">
                      <ul class="wed-personel-sec-ul">
                        <li class="wed-personel-sec-li">
                          <div class="child1">Ancestral Origin<small class="text-danger"> [Native place]</small></div>
                          <div class="child2">:</div>
                          <div class="child3"> <?php if($profile[0]->family_location){ echo $profile[0]->family_location;} else { ?>- <?php } ?></div>
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Mother's Name</div>
                          <div class="child2">:</div>
                          <div class="child3">
                               <?php if($profile[0]->mother_status){ echo $profile[0]->mother_status;} else { ?> - <?php } ?></div>
                          <div class="clearfix"></div>
                        </li>
                         <li class="wed-personel-sec-li">
                          <div class="child1">Family Location</div>
                          <div class="child2">:</div>
                          <div class="child3">
                              <?php if($profile[0]->family_location){ echo $profile[0]->family_location;} else { ?> - <?php } ?></div>
                             
                          <div class="clearfix"></div>
                        </li>
                        <li class="wed-personel-sec-li">
                          <div class="child1">Siblings</div>
                          <div class="child2">:</div>
                          <div class="child3">
                        <b>brothers</b> : <?php if($profile[0]->brothers){ echo $profile[0]->brothers;} else { ?> - <?php } ?> <b>sisters:</b>  <?php if($profile[0]->sisters){ echo $profile[0]->sisters;} else { ?> - <?php } ?></div>
                             
                          <div class="clearfix"></div>
                        </li>
                      </ul>
                    </li>
                    <div class="clearfix"></div><hr>
              </ul>
          </li>
          
         <br>
        
 <h1>Life Style</h1>
              <hr>
              <div class="wed-lifestyle-div" style="padding-left: 50px;">
                <ul>
                  <li>
                    <ul class="wed-lifestyle-inner">
                      <li>
                        <h5>Hobbies</h5>
                        <p>Dancing,Puzzles</p>
                      </li>
                      <li>
                        <h5>Interests</h5>
                        <p>Music, Movies</p>
                      </li>
                      <div class="clearfix"></div>
                    </ul>
                  </li>
                  <li>
                    <ul class="wed-lifestyle-inner">
                      <li>
                        <h5>Favourite Music</h5>
                        <p>Film songs, Western classical</p>
                      </li>
                      <li>
                        <h5>Sports/Fitness Activities</h5>
                        <p>basketball</p>
                      </li>
                      <div class="clearfix"></div>
                    </ul>
                  </li>
                  <div class="clearfix"></div>
                </ul>
              </div>
              <br>
               <?php if(!$this->session->userdata('logged_in_admin')) { ?>
			   <?php if($sess->matrimony_id==$profile[0]->matrimony_id) { ?>
              <h1> Partner Preference</h1>
			   <?php } else { ?>
              <h1>Her Partner Preference</h1>
			   <?php } ?>
              <div class="wed-forward">
                <span><img src="<?php echo base_url(); ?>assets/img/forward.png"></span>
                &nbsp;
                <span>Forward</span>
                  &nbsp;&nbsp;&nbsp;
                <span><img src="<?php echo base_url(); ?>assets/img/print.png"></span>
                &nbsp;
                <span id="printpro">Print</span>
              </div>
              <hr>
              <div class="wed-partner-preference no-print">
                <?php if($sess->profile_photo == "") { ?>
                      <div class="wed-partner-you"><img src="<?php echo base_url(); ?>assets/img/user.jpg"></div>
                      <?php } else { ?>
                <div class="wed-partner-you"><img src="<?php echo base_url().$sess->profile_photo; ?>"></div>
                <?php } ?>
			 <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) {
					if(!$this->session->userdata('logged_in_admin')){
			 ?>
                <div class="wed-partner-section">
                  <span class="wed-you">You</span>
                  <div class="wed-match-section">
                  Your profile matches with <span id="pref-count">12</span> / 15 of<br>
                  <?php echo $profile[0]->profile_name;?>'s preferences!<br>
                  </div>
				  <?php if($profile[0]->gender=="female"){?>
                  <span class="wed-her">Her</span>
				  <?php } else {?>
				   <span class="wed-her">His</span>
				  <?php } ?>
                  <div class="clearfix"></div>
                </div>
				
                 <?php if($profile[0]->profile_photo==""){   ?>
                      <div class="wed-partner-her"><img src="<?php echo base_url(); ?>assets/img/user.jpg"></div>
                      <?php } else if($profile[0]->profile_photo!="" && $profile[0]->profile_preference==0){  ?>
                <div class="wed-partner-her"><img src="<?php echo base_url().$profile[0]->profile_photo; ?>"></div>
                <?php } else if($profile[0]->profile_photo!="" && $profile[0]->profile_preference==1){?>
                 <div class="wed-partner-her"><img src="<?php echo base_url().$profile[0]->profile_photo_blured; ?>"></div>
                 <?php } ?>
			 <?php } }?>
                <div class="clearfix"></div>
              </div>
              
              <div class="wed-basic-matches">
                <h3>Basic Preference</h3>
                <br>
                <ul>
                  <li>
                    <div class="wed-match-child1">Bride's Age</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php $pref_c = 0; if(!empty($prefernce)){echo "<b>".$prefernce['min_age']."</b> - <b>".$prefernce['max_age']."</b> Years"; ?>
					 <?php if($sess->matrimony_id!=$profile[0]->matrimony_id ) { ?>
                   <?php if(($sess->age >= $prefernce['min_age']) && ($sess->age <= $prefernce['max_age'])){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                      <?php } else{?>
                       <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
					    <?php  }?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="wed-match-child1">Height</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){echo "<b>".$prefernce['min_height']."</b> - <b>".$prefernce['max_height']."</b>"; ?>
                <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                    <?php if(($heights >= $prefernce['min_height']) && ($heights <= $prefernce['max_height'])){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                      <?php } else{?>
                       <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
			  <?php }  ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>

                    <div class="wed-match-child1">Marital status</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){
                      echo implode(', ', $prefernce['maritial']);
                      ?>
					  <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                     <?php if(in_array($sess->maritial_status, $prefernce['maritial_id'])){  $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
					<?php } ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="wed-match-child1">Mother Tongue</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3"><?php if(!empty($prefernce)){

                  echo $prefernce['mother'];

                       ?>
					   <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                    <?php if($prefernce['mother_language']==$sess->mother_language){ $pref_c = $pref_c+1;?> 
                      <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                      <?php }else{ ?>
                       <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php }} ?>
					<?php } ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="wed-match-child1">Physical Status</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){
                        echo implode(', ', $prefernce['physical']);

                     ?>
					  <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                    <?php if(in_array($sess->physical_status, $prefernce['physical_id'])){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
					<?php } ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="wed-match-child1">Eating Habits</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){
                      echo implode(', ', $prefernce['eating']);
                     ?>
					 <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                    <?php if(in_array($sess->eating, $prefernce['eating_id'])){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
					<?php } ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="wed-match-child1">Smoking Habits</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){
                      echo implode(', ', $prefernce['smoking']);
                     ?>
					   <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                   <?php if(in_array($sess->smoking, $prefernce['smoking_id'])){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
					<?php } ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="wed-match-child1">Drinking Habits</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){echo implode(', ', $prefernce['drinking']);  ?>
					  <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                   <?php if(in_array($sess->drinking, $prefernce['drinking_id'])){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
					<?php } ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
              </div>
<div class="wed-basic-matches">
                <h3>Religious Preference</h3>
                <br>
                <ul>
                  <li>
                    <div class="wed-match-child1">Religion</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){echo $prefernce['religion']; ?>
              <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                    <?php if($prefernce['religion_id']==$sess->religion){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
                    <?php } ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="wed-match-child1">Caste</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){
                      echo $prefernce['caste'];
                     ?>
				 <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                     <?php if(in_array($sess->caste, $prefernce['caste_id'])){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
					<?php } ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                 <!--  <li>
                    <div class="wed-match-child1">Star</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                     <?php if(!empty($prefernce)){foreach($prefernce['star'] as $val) { echo $val.", "; } }?>
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li> -->
                  <!-- <li>
                    <div class="wed-match-child1">Chowva Dosham</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){foreach($prefernce['dosham'] as $val) { echo $val.", "; }} ?>
                    <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li> -->
                </ul>
              </div>
              
              <div class="wed-basic-matches">
                <h3>Profesional Preference</h3>
                <br>
                <ul>
                  <li>
                    <div class="wed-match-child1">Education</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                      <?php if(!empty($prefernce['education_ids'])){
                        echo $prefernce['education'];
                      
					  } ?>
					  <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                    <?php if(in_array($sess->education_id, $prefernce['education_ids'])){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } ?>
					  <?php } ?>
					   
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="wed-match-child1">Occupation</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)) {
                        echo $prefernce['occupation'];

                       ?>
					    <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                     <?php if(in_array($sess->occupation_id, $prefernce['occupation_ids'])){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
					<?php } ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="wed-match-child1">Annual Income</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){echo $prefernce['min_income']." - ".$prefernce['max_income']; ?>
					 <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                   <?php if(($sess->income >= $prefernce['min_income']) && ($sess->income <= $prefernce['max_income'])){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                      <?php } else{?>
                       <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
					<?php } ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
              </div>
              <div class="wed-basic-matches">
                <h3>Location Preference</h3>
                <br>
                <ul>
                  <li>
                    <div class="wed-match-child1">Country</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){
                        echo $prefernce['country'];
                      ?>
					 <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                   <?php if(in_array($sess->country, $prefernce['country_ids'])){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
					<?php } ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="wed-match-child1">State</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){
                      echo $prefernce['state'];
                     ?>
					 <?php if($sess->matrimony_id!=$profile[0]->matrimony_id) { ?>
                    <?php if(in_array($sess->state, $prefernce['state_ids'])){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
					<?php } ?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <!--<li>
                    <div class="wed-match-child1">City</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce)){
                      echo $prefernce['city'];
                     ?>
                   <?php if($prefernce['city'][0]->city_id==$sess->city){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
                      <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                  </li> -->
                  <!--<li >
                    <div class="wed-match-child1">Citizenship</div>
                    <div class="wed-match-child2">:</div>
                    <div class="wed-match-child3">
                    <?php if(!empty($prefernce))foreach($prefernce['citizen'] as $val) { 
                     if(isset($val->country_name)) { 
                          echo $val->country_name.", ";
                        } else { 
                          echo "Any";
                        } 
                     ?>
                     <?php if($prefernce['country'][0]->country_id==$sess->country){ $pref_c = $pref_c+1;?> 
                    <span class="check-div"><img src="<?php echo base_url(); ?>assets/img/checked.png"></span>
                     <?php }else{?>
                     <span class="uncheck-div"><img src="<?php echo base_url(); ?>assets/img/unchecked.png"></span>
                       <?php } }?>
                      <div class="clearfix"></div>
                    </div>
                    
                    <div class="clearfix"></div>
                  </li> -->
                  <input type="hidden" id="pref-input" value="<?php echo $pref_c; ?>">
                </ul>
              </div>
             
               <?php } ?>
               
               <div class="wed-matching-slider">
                <h5>You might also be interested in these </h5>
                <p>new matching profiles</p>
                <hr>
                <ul>
                <?php 
                if(!empty($similar)) { 
                	foreach($similar as $sim) { ?>
                  <li>
                    <div class="wed-match-slider-img no-print">
                     <?php if($sim->profile_photo==null) {?>
                    <img src="<?php echo base_url(); ?>assets/img/user.jpg">
                      <?php }else if($sim->profile_photo != "" && $sim->profile_preference==0){ ?>
                   <img src="<?php echo base_url(); ?><?php echo $sim->profile_photo; ?>">
                    <?php }  else if($sim->profile_photo != "" && $sim->profile_preference==1){ ?>
                        <img src="<?php echo base_url().$sim->profile_photo_blured; ?>">
                        <?php } ?>
                    </div>
                    <h6><small class="text-danger"><b><?php echo "PT".$sim->matrimony_id;?></b></small></h6>
                    <p><?php $now = new DateTime();
                             $age = $now->diff(new DateTime($sim->dob));
                             echo $age->format('%Y');?> Yrs, <?php echo $sim->height;?></p>
                    <a href="<?php echo base_url();?>Profile/profile_details/<?php echo $sim->matrimony_id;?>"><button class="wed-view">View</button></a>
                  </li>
                 
                  <?php } } ?>
				   <div class="clearfix"></div>
                </ul>


              </div>
              <div class="clearfix"></div>
              <div class="clearfix"></div>
              
</div>
          </div>
          <div class="col-md-3">
          	<div class="wed-similar-profile no-print">
              <h1>Similar Profile</h1>
              <hr>
              <ul>
                <?php if(!empty($similar)) { foreach($similar as $sim) {?>
                <li>
                  <div class="wed-similar-pic">
                  <?php if($sim->profile_photo==null) {?>
                    <img src="<?php echo base_url(); ?>assets/img/user.jpg">
                      <?php }else if($sim->profile_photo != "" && $sim->profile_preference==0){ ?>
                   <img src="<?php echo base_url(); ?><?php echo $sim->profile_photo; ?>">
                    <?php }  else if($sim->profile_photo != "" && $sim->profile_preference==1){ ?>
                        <img src="<?php echo base_url().$sim->profile_photo_blured; ?>">
                        <?php } ?>
                  </div>
                  <div class="wed-similar-detail">
                    <h6><small class="text-danger"><b><?php echo "PT".$sim->matrimony_id;?></b></small></h6>
                    <p><?php $now = new DateTime();
                             $age = $now->diff(new DateTime($sim->dob));
                             echo $age->format('%Y');?> Yrs, <?php echo $sim->height;?></p>
                    <a href="<?php echo base_url();?>Profile/profile_details/<?php echo $sim->matrimony_id;?>"><button class="wed-view">View</button></a>
                  </div>
                  <div class="clearfix">
                  </div>
                  <hr>
                </li>
                <?php } } ?>
              </ul>
            </div>
          </div>
      </div>
  </div>
</div>



      <div class="modal fade wed-add-modal" id="photo_request" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
          <form method="post" id="request_form">
            <div class="modal-body  wed-add-modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Send request to view this member's photo.</h4>
              <input type="hidden" name="request_to" value="<?php echo $profile[0]->matrimony_id; ?>">
              <button type='button' id='send_request_btns' class='wed-view send_request_btn'>Send Request</button>
            </div>
            </form>
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
                <textarea class="wed-reg-modal-textarea" rows="4" name="mail_content">Hi <?php echo $profile[0]->profile_name;?></textarea><br/>
                <input type="hidden" name="mail_to" value="<?php echo $profile[0]->matrimony_id; ?>">
                <?php 
     $qry01 = $this->db->get_where('membership_details',array('matrimony_id' => $profile[0]->matrimony_id));
$base_counts = $qry01->row()->total_sendmail;
echo $base_counts.':';
if($base_counts>0 )
{ 
   //total_sendmail
?>
                <button type='button' matr_id="<?php echo $profile[0]->matrimony_id; ?>" proc_name="<?php echo $profile[0]->profile_name;?>" id='send_form_btns' class='wed-view send_form_btn'>Send Mail</button>
                <?php } else {?>
<button class="btn btn-danger btn-lg" disabled>please update your package.</button>

              <?php      }
                    ?>
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
                 <input class="wed-reg-modal-select" type="text" name="recipient_name"  placeholder="Recipient Name" required>
                 <input class="wed-reg-modal-select" type="text" name="mob_num" placeholder="Recipient Mobile No" required><br/><br/>
                <textarea class="wed-reg-modal-textarea" cols="50" name="mail_content" readonly>Hi,Please check the profile (PT<?php echo $profile[0]->matrimony_id; ?>) from Pellithoranam.com [ https://pellithoranam.com/profile/profile_details/<?php echo $profile[0]->matrimony_id; ?>]</textarea><br/>
            <!--    <input type="hidden" name="forward_name" value="<?php echo $profile[0]->profile_name; ?>">
                 <input type="hidden" name="profile_photo" value="<?php echo $profile[0]->profile_photo; ?>">
                <input type="hidden" name="forward_id" value="<?php echo $profile[0]->matrimony_id; ?>">
                <input type="hidden" name="mail_from" value="<?php echo $sess->profile_name; ?>"> -->
<?php 
     $qry1 = $this->db->select("total_sms as counts")
     ->get_where('membership_details',array('matrimony_id' => $profile[0]->matrimony_id));
$base_count = $qry1->row()->counts;
if($base_count>0 )
{  //total_sendmail
?>

                <button type='submit' id='send_forward_others' class='wed-view send_form_btn'>Send Message.</button>
                    <?php } else {?>
<button class="btn btn-danger btn-lg" disabled>please update your package.</button>

              <?php      }
                    ?>
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
              <p>Would You like to View <?php echo $profile[0]->profile_name; ?> (T<?php echo $profile[0]->matrimony_id; ?>) mobile number or send an sms?</p>
         <div class="wed-add-modal-footer">


                <input type="hidden" name="from_id" value="<?php echo $sess->matrimony_id; ?>" id="from_id">
                <input type="hidden" name="to_id" value="<?php echo $profile[0]->matrimony_id; ?>" id="to_id">

                    <button type='button' id='view_mobile' class='wed-view send_form_btn'>View Mobile Number</button>
                <button type='button' id='send_sms' class='wed-view send_form_btn'>Send SMS</button>
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
            <form method="post" id="contact_form1" action="">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4> Contact Details Of <?php echo $profile[0]->profile_name; ?> (T<?php echo $profile[0]->matrimony_id; ?>)</h4>
              <!--<p>Pellithoranam is the most Trusted,the most successfull and the only matrimony site in the world to have 100% mobile verified profiles.Call up and connect with your prospects instantly</p> -->
                      <p>Pellithoranam is the most Trusted matrimony, Call up and connect with your prospects instantly</p>
         <div class="wed-add-modal-footer">

                <div style="border:1px solid; color:#fff;">Primary Mobile Number : <h4><?php echo $profile[0]->phone; ?></h4></div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <div class="modal fade wed-add-modal" id="send_sms_modal" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
            <form method="post" id="send_sms_form" action="<?php echo base_url()?>Verify/sms_send_success">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4> Send sms To <?php echo $profile[0]->profile_name; ?> (T<?php echo $profile[0]->matrimony_id; ?>)</h4>
           <!--    <p>Enter your message</p> -->
            <div class="wed-add-modal-footer">

           <!--     <textarea rows="4" cols="50" name="mail_content" readonly>I am <?php echo $sess->profile_name; ?> ( <?php echo $sess->matrimony_id; ?>) from Pellithoranam.com ph:<?php echo $sess->phone; ?> i would like to reach out to you.please share your contact details</textarea><br/>-->
           <textarea rows="4" cols="50" name="mail_content" readonly>I am <?php echo $sess->profile_name; ?> ( <?php echo $sess->matrimony_id; ?>) from Pellithoranam.com ph: <?php echo $sess->phone; ?> i would like to reach out to you.please share your contact details</textarea><br/>
                <input type="hidden" name="to_id" value="<?php echo $profile[0]->matrimony_id; ?>">
                <input type="hidden" name="from_id" value="<?php echo $sess->matrimony_id; ?>">
                <input type="hidden" name="mob_num" value="<?php echo $profile[0]->phone; ?>">
                <input type="hidden" name="mail_from" value="<?php echo $sess->profile_name; ?>">
                <button type='submit' id='send_forward' class='wed-view send_form_btn'>Send SMS</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade wed-add-modal" id="upgrade" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4>Sorry, Upgrade your membership</h4>
             <!--  <p>Upgrade your profile to send Unlimited Mails</p> -->
            </div>
          </div>
        </div>
      </div>
			<?php } else { ?>
        <div class="wed-search-listing">
            <ul>
              <li class="no_records">You can't Access..!</li>
            </ul>   
        </div>
        <?php } ?>
<script>
$(document).ready(function(){

$('#pref-count').html($('#pref-input').val());

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
              var sub_msg ="Upgrade your profile to send Unlimited Messages and Mails";
            }
            var modal = showSendMailModal(main_msg,sub_msg,matri_id);
            $('body').append(modal);
            $('#common-modal2-'+matri_id).modal('show');
        }
    });
});

$(document).on("click","#send_request_btns",function() {
    //var matri_id = $(this).attr('matr_id');
    var value =$("#request_form").serialize();

    $.ajax({
        type: "POST",
        url: base_url+'profile/request_photo',
        data: value,
        error: function (err) {
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success: function(data) {
          $('#send_mail').modal('hide');
          data = JSON.parse(data);
            if(data == "success") {
              alert("Your request was sent");
              $('#photo_request').modal('hide');
            } else {
              alert("Something went wrong");
              $('#photo_request').modal('hide');
            }
        }
    });
});

$(document).on("click","#send_forward",function(e) {
    e.preventDefault();
    var mc = $(this).closest("form").find("[name='mail_content']").val();
    if(mc.length>126){
      alert("Maximum Length of sms is 130");
      return false;
    }
    var value =$("#send_sms_form").serialize();
    //console.log(value);
    $.ajax({
      url: base_url+'profile/send_sms',
      type: 'POST',
      dataType: 'json',
      data: value,
    })
    .done(function(data) {
      console.log(data);
      alert(data.msg);
      $("#send_sms_modal").modal('hide');
    })
    .fail(function() {
      console.log("error");
    });
    
    return false;
    
});
$(document).on("click","#send_forward_others",function(e) {
    e.preventDefault();
    var mc = $(this).closest("form").find("[name='mail_content']").val();
    if(mc.length>126){
      alert("Maximum Length of sms is 130");
      return false;
    }
    var value =$("#forward_form").serialize();
    //console.log(value);
    $.ajax({
      url: base_url+'profile/send_sms',
      type: 'POST',
      dataType: 'json',
      data: value,
    })
    .done(function(data) {
      console.log(data);
      alert(data.msg);
      $("#send_sms_modal").modal('hide');
    })
    .fail(function() {
      console.log("error");
    });
    
    return false;
    
});
$(document).on("click","#view_mobile",function() {
  $("#view_mob").modal('hide');
});

// $(document).on("click","#send_sms",function() {
  
// });


$(document).on("click","#view_mobile",function() {

    //var value =$("#contact_form").serialize(); to_id
var mobileview_from=$("#from_id").val();
var mobileview_to=$("#to_id").val();
dataString = 'mobileview_from='+ mobileview_from +'&mobileview_to=' + mobileview_to;

       $.ajax({
        type: "POST",
        url: base_url+'profile/add_mobileview',
        data: dataString,
        error: function (err) {
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success: function(data) {

          data = JSON.parse(data);
           if(data == "success") {
              $('#view_mobile_modal').modal('show');
           } else {
              $('#upgrade').modal('show');
           }
        }
    });

});

$(document).on("click","#send_sms",function() {

    //var value =$("#contact_form").serialize(); to_id
var mobileview_from=$("#from_id").val();
var mobileview_to=$("#to_id").val();
dataString = 'mobileview_from='+ mobileview_from +'&mobileview_to=' + mobileview_to;

       $.ajax({
        type: "POST",
        url: base_url+'profile/check_sms_count',
        data: dataString,
        error: function (err) {
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success: function(data) {

          data = JSON.parse(data);
           if(data == "success") {
             $('#send_sms_modal').modal('show');

           } else {
              $('#upgrade').modal('show');
           }
           $("#view_mob").modal('hide');
        }
    });

});

$(document).on("click","#print_profile",function() {
  window.print();
});
});

function showSendMailModal(main_msg,sub_msg,matri_id) {
    var modal='<div class="modal fade wed-add-modal" id="common-modal2-'+matri_id+'" role="dialog"> <div class="modal-dialog wed-add-modal-dialogue"> <div class="modal-content wed-add-modal-content"> <div class="modal-body wed-add-modal-body"> <button type="button" class="close" data-dismiss="modal">&times;</button> <h4>'+main_msg+'</h4> <p>'+sub_msg+'</p><div class="wed-add-modal-footer"></div></div></div></div></div>';
    return modal;
}
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

$(document).on("click","#printpro",function() {
  window.print();
});
</script>
