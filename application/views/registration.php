<?php
$settings = get_setting();
$pid = $this->session->userdata('ins_id');
$sess = get_profile($pid);
$_SESSION['user_id']=$sess->user_id;
 ?>
 <!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/starter-template/ -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo $settings->icon; ?>">

    <title><?php echo $settings->title; ?></title>

    <!-- GENERAL-CSS -->
    <link href="<?php echo base_url(); ?>assets/css/sliding-carousel.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" >
    <!-- for slick slider -->
    <link href="<?php echo base_url(); ?>assets/css/slick/slick.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/slick/slick-theme.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/cascade.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animations.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery.bxslider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animations.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/circle.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/parsley/parsley.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js?>"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery-slidingCarousel.js" type="text/javascript"></script>
    <link href="<?php echo base_url(); ?>assets/css/intlTelInput.css" rel="stylesheet">

    <!-- For slick slider -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/slick/slick.min.js"></script>

    <style type="text/css">
      .wed-navbar-logo img {width: 90px;}
    </style>
    
  </head>
   <body>
   <?php
    function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
    } ?>
    <?php //if ($sess)  { ?>
    <nav class="navbar navbar-inverse navbar-fixed-top wed-navbar nav_bg">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand wed-navbar-logo" href="<?php echo base_url();?>">
                <img src="<?php echo $settings->logo; ?>">
              </a>
            </div>
          </div>
          <div class="col-md-9">
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">

			
			
			 <div class="row">
                <div class="col-md-12 col-xs-12">

                  <ul class="wed-navbar-list">
           
                      <li class="pull-right"><h4 style="font-family: 'Roboto', sans-serif;font-weight: 500;">Welcome <?php echo $sess->profile_name;?></h4></li>
                    <div class="clearfix"></div>
                  </ul>
                </div>
              </div>
             <!-- <ul class="wed-inside-menu">
                <div class="floatl">

                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown" <?php if ($this->uri->segment(1) == "profile") { ?> class="active_menu" <?php } ?> >My Home</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>profile/my_profile"> My Profile</a></li>
                          <li><a href="<?php echo base_url();?>profile/recent_profiles/me" >Who Viewed my Profile</a></li>
                          <li><a href="<?php echo base_url();?>profile/shortlisted_profiles/me" >Who Shortlisted Me</a></li>
                          <li><a href="<?php echo base_url();?>profile/interested_profiles/me" >Who Interested in Me</a></li>
                      </ul>
                  </div>
                </li>

                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown" <?php if ($this->uri->segment(1) == "search") { ?> class="active_menu" <?php } ?> >Search</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                       
                          <li><a href="<?php echo base_url();?>search/advanced?regular" >Regular Search</a></li>
                          <li><a href="<?php echo base_url();?>search/advanced?advanced" >Advanced Search</a></li>
                          <li><a href="<?php echo base_url();?>search/advanced?keyword">Keyword Search</a></li>
                       
						              <li><a data-toggle="modal" data-target="#saved">Saved Search</a></li>
                      </ul>
                  </div>
                </li>

                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown">Matches</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>search" >My Matches</a></li>
                          <li><a href="<?php echo base_url();?>profile/shortlisted_profiles/my" >Shortlisted Profiles</a></li>
                          <li><a href="<?php echo base_url();?>profile/interested_profiles/my">Interested Profiles</a></li>
                      </ul>
                  </div>
                </li>

                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown">Messages</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>profile/inbox?inbox">Inbox</a></li>
						              <li><a href="<?php echo base_url();?>profile/inbox?send">Sent</a></li>
                          <li><a href="<?php echo base_url();?>profile/inbox?trash">Trash</a></li>
                      </ul>
                  </div>
                </li>


                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown">Upgrade</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>package" >Payment Options</a></li>
                          <li><a href="<?php echo base_url();?>Profile/membershipinfo" >Membership Info</a></li>
                      </ul>
                  </div>
                </li>

                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown">Help</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>home/contact" >Contact Us</a></li>
                      </ul>
                  </div>
                </li>
                </div>

                <!-- MY-ACCOUNT-DROP-DOWN -->
              <?php 
              $this->db->where('matrimony_id',$sess->matrimony_id);
              $query = $this->db->get('profiles');
              $is_premium = $query->row();

              $uid = $is_premium->user_id;
              $this->db->where('user_id',$uid);
              $this->db->where('pic_status',1);
              $this->db->order_by('pic_verification_id', 'desc'); 
              $query1 = $this->db->get('profile_pic_verification');
              $pic_approve = $query1->row();
              
              ?>

               <!-- <div class="floatr wed-admin-menu">
                    <li><span class="search_noti">
					<img src="<?php echo base_url(); ?>assets/img/notification.png" data-toggle="modal" data-target="#notification" class="notification_count">
                     
                    </span>
					<?php $s = get_notificationcount($sess->matrimony_id); 
					
					if($s > 0){
					?>
                    <div class="bell_noti"><?php echo $s;?></div>
					<?php } ?>
                  </li>
                    <li>
                    <div class="wed-profile" >
                     <?php if($pic_approve=="") {?>
                        <img src="<?php echo base_url(); ?>assets/img/user.jpg" data-toggle="modal" data-target="#drop">    
                      <?php } 
                      else { ?>
                        <img src="<?php echo base_url().$pic_approve->pic_location; ?>" data-toggle="modal" data-target="#drop">
                    <?php } ?>
                    </div>
                    </li>
                    <li><span class="arrow" data-toggle="modal" data-target="#drop"><img src="<?php echo base_url(); ?>assets/img/arrow.png"></span></li>
                </div>

              
              

              <div id="drop" class="modal wed-drop-modal fade" role="dialog">
                <div class="modal-dialog wed-drop-modal-dialog animated fadeInDown">
                    <div class="modal-content wed-modal-content">
                      <div class="modal-body wed-modal-body">
                        <div class="wed-modal-head">
                          <div class="wed-arrow-up"></div>
                          <h5><?php echo $sess->profile_name; ?></h5>
                          <p><?php echo $settings->id_prefix;?><?php echo $sess->matrimony_id; ?></p>
                          <hr>
                          <div class="wed-acnt">
                            <?php if($is_premium->is_premium==0){?>
                            <li style="width:60%;padding-top: 4px;">Account Type : Free</li>
                            <?php }else{ ?>
                             <li style="width:60%;padding-top: 4px;">Account Type : Premium</li>
                             <?php } ?>
                            <li style="width:40%;"><a href="<?php echo base_url();?>package"><button class="wed-upgrade">Upgrade</button></a></li>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="wed-modal-list">
                          <li><a href="<?php echo base_url();?>profile/my_profile">Edit Profile</a></li>
                          <li data-toggle="collapse" data-target="#photo">Upload Photo</li>
                            <div id="photo" class="collapse">
                              <li><a href="<?php echo base_url();?>profile/upload_profile_pic" style="color:#d12d4c;font-weight:500;">- Add a Profile Photo</a></li>
                              <li><a href="<?php echo base_url();?>profile/upload_multi_image" style="color:#d12d4c;font-weight:500;">- Add a Gallery Photo</a></li>
                            </div>
                          <li><a href="<?php echo base_url();?>profile/partner_preference">Edit Partner Preference</a></li>
                          <li><a href="<?php echo base_url();?>profile/upload_badge">Add Trust Badge</a></li>
                          <li><a href="<?php echo base_url();?>settings">Settings</a></li>
                          <li><a href="#">Feedback</a></li>
                          <li><a href="<?php echo base_url();?>home/logout">Logout</a></li>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <!-- NOTIFICATION-DROP-DOWN -->

              <?php
              $ci =&get_instance();
              $ci->load->model('Profile_model','pm',TRUE);
              $history = $ci->pm->getMyHistory1();
             ?>

             <!-- <div id="notification" class="modal wed-drop-modal fade" role="dialog">
                <div class="modal-dialog wed-drop-modal-dialog animated fadeInDown">
                    <div class="modal-content wed-modal-content">
                      <div class="modal-body wed-notification-modal-body">
                          <div class="wed-arrow-up"></div>

                        <div class="wed-modal-list">
                          <div class="wed-noticationlist">
                            <h4>Notifications</h4>
                            <?php if(!empty($history)) { foreach($history as $hist) {  
                              if($hist->history_type == "INTEREST_SENT") { $hist_type= "interest"; }
                              else if($hist->history_type == "MESSAGE_SENT") { $hist_type="message"; }
                              else { $hist_type="photo request"; }
                              $msg = "<b>".$hist->profile_name."</b> has sent you a ".$hist_type;  ?>
                            <div style="border-bottom: 1px solid #ededed;">
                              <a href="<?php echo base_url(); ?>Profile/inbox"><p><?php echo  $msg ?></p></a>
                              <span><?php echo time_elapsed_string($hist->history_datetime);?></span>
                            </div>
                            <?php } } ?>
                          </div>

                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="clearfix"></div>
              </ul>-->
            </div>
          </div>
        </div>
      </div>
    </nav>
 
 <!--header-->
 
    <div class="wed-reg-top-banner">
      <div class="container container-custom">
        <div class="row">
          <div class="col-md-3">
            <div class="wed-reg-tick">
              <img src="<?php echo base_url(); ?>assets/img/tick-reg.png">
            </div>
          </div>
          <div class="col-md-9">
            <div class="wed-reg-banner-detail">
          <!--    <p>You have <strong>1800</strong> </p>
              <p>Matching Profiles based on your details</p>
              <p>Completing this page will take you closer to your perfect match</p> -->
              <p>Pellithoranam is the most Trusted matrimony, Call up and connect with your prospects instantly</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- REGESTRATION-REGISTRATION-DETAILS -->

    <div class="wed-reg-details">
      <div class="container container-custom">

	  

        <div class="row">
           <?php $this->load->view('forms/register-step-2.php');?>
          <div class="col-md-3">
            <div class="wed-reg-right-ads">
              <ul>
                <li>
                  <img src="<?php echo base_url(); ?>assets/img/mobile.png">
                  <p>Mobile Verified</p>
                </li>
                <li>
                  <img src="<?php echo base_url(); ?>assets/img/happy.png">
                  <p>Millions of<br>
                    Happy Marriages</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>






    <!-- GENERAL-JAVASCRIPT -->


    <script src="js/ie-emulation-modes-warning.js.download"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script>
$( document ).ready(function() {

    // $(".cst-select-1").on('change', function () {
    //     var valueSelected = $(this).val();
    //     var select_type   = $(this).attr('cst-attr');
    //     var select_destn  = $(this).attr('cst-for');
    //     var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;

    //     $.ajax({
    //     type: "POST",
    //     url : '<?php echo base_url(); ?>home/get_drop_data',
    //     data:  passdata_2,
    //     success: function(data){
    //            $("#"+select_destn+"-selector").html(data);
    //         }
    //     });
    // });


    // $(".cst-select-2").on('change', function () {
    //       var valueSelected = $(this).val();
    //       var select_type   = 'country';
    //       var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;

    //       $.ajax({
    //         type: "POST",
    //         url : '<?php echo base_url(); ?>home/get_drop_data1',
    //         data:  passdata_2,
    //         success: function(data){
    //          $("#currency-selector").html(data);
    //        }
    //      });
    //     }); 

   

});
</script>
<script> /*
 $(document).ready(function(){
    alert('Please fill all the data in the form, so that you will have high chance for getting preferred profiles');
 });  */
</script>
<?php $this->load->view('forms/register_step_2_js.php');?>