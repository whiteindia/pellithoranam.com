<?php $sess = $this->session->userdata('logged_in');
$settings = get_setting(); ?>
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
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title><?php echo $title; ?></title>

    <!-- GENERAL-CSS -->
    <link href="<?php echo base_url(); ?>assets/css/sliding-carousel.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" >
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
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js ?>"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery-slidingCarousel.js" type="text/javascript"></script>

    <!-- For slick slider -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
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
}
    ?>
    <?php if ($sess)  { ?>
   <nav class="navbar navbar-inverse navbar-fixed-top wed-navbar">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand wed-navbar-logo" href="<?php echo base_url();?>">
                 <img src="<?php echo base_url().$settings->logo; ?>">
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">

              <ul class="wed-inside-menu">
                <div class="floatl">
                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown">My Home</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>profile/my_profile" >My Profile</a></li>
                          <li><a href="<?php echo base_url();?>profile/recent_profiles/me" >Who Viewed my Profile</a></li>
                          <li><a href="<?php echo base_url();?>profile/shortlisted_profiles/me" >Who Shortlisted Me</a></li>
                          <li><a href="<?php echo base_url();?>profile/interested_profiles/me" >Who Interested in Me</a></li>
                      </ul>
                  </div>
                </li>
                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown">Search</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>search/advanced" >Search</a></li>
                          <li><a href="<?php echo base_url();?>search/advanced" >Regular Search</a></li>
                          <li><a href="<?php echo base_url();?>search/advanced" >Advanced Search</a></li>
                          <li><a href="<?php echo base_url();?>search/advanced">Keyword Search</a></li>
                          <li><a href="<?php echo base_url();?>profile/recent_profiles/my">Recently Viewed Profiles</a></li>
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
                          <li><a href="<?php echo base_url();?>profile/inbox" >Inbox</a></li>
						   <li><a href="<?php echo base_url();?>profile/inbox" >Sent</a></li>
                          <li><a href="<?php echo base_url();?>profile/inbox">Trash</a></li>
                      </ul>
                  </div>
                </li>
                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown">Services</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>classifieds/home/categories" >Matrimony Directory</a></li>
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
                <div class="floatr wed-admin-menu">
                    <li><span><img src="<?php echo base_url(); ?>assets/img/notification.png" data-toggle="modal" data-target="#notification"></span></li>
                    <li>
                    <div class="wed-profile" >
                      <?php if($sess->profile_photo == "") { ?>
                      <img src="<?php echo base_url(); ?>assets/img/user.jpg" data-toggle="modal" data-target="#drop">
                      <?php } else { ?>
                      <img src="<?php echo base_url().$sess->profile_photo; ?>" data-toggle="modal" data-target="#drop">
                      <?php } ?>
                    </div>
                    </li>
                    <li><span class="arrow" data-toggle="modal" data-target="#drop"><img src="<?php echo base_url(); ?>assets/img/arrow.png"></span></li>
                </div>

              <!-- MY-ACCOUNT-DROP-DOWN -->
<?php $this->db->where('matrimony_id',$sess->matrimony_id);
     $query = $this->db->get('profiles');
     $is_premium = $query->row();?>
              <div id="drop" class="modal wed-drop-modal fade" role="dialog">
                <div class="modal-dialog wed-drop-modal-dialog animated fadeInDown">
                    <div class="modal-content wed-modal-content">
                      <div class="modal-body wed-modal-body">
                        <div class="wed-modal-head">
                          <div class="wed-arrow-up"></div>
                          <h5><?php echo $sess->profile_name; ?></h5>
                          <p><?php echo "T".$sess->matrimony_id; ?></p>
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
              $history = $ci->pm->getMyHistory();
             ?>

              <div id="notification" class="modal wed-drop-modal fade" role="dialog">
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
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <?php }else{ ?>

       <nav class="navbar navbar-inverse navbar-fixed-top wed-navbar">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand wed-navbar-logo" href="<?php echo base_url();?>">
                <img src="<?php echo base_url(); ?>assets/images/soul_logo.png">
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="wed-navbar-list">
                <div class="nav_buttons">
                  <button class="wed-login" data-toggle="modal" data-target="#login" id="login_user" type="submit">Login</button>
                  <span class="head_or">or</span>
                  <button class="wed-fb-login">Signin</button>
                </div>
              </div>

            <!-- <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
              <div class="row">
                <div class="col-md-12 col-xs-12">

                  <ul class="wed-navbar-list">
                     <div class="alert_bar"><?php if(isset($logn_err)) echo $logn_err; ?></div>

                    <form method="post" action='<?php echo base_url(); ?>home/login' id="login_form">
                    <li>
                      <input class="wed-navbar-input" type="email" placeholder="email" name="email" data-parsley-trigger="change" required>
                    </li>
                    <li>
                      <input class="wed-navbar-input" type="password" placeholder="password" name="password" data-parsley-trigger="change" required>
                    </li>

					         
                    <li>
                      <button class="wed-login" id="login_user" type="submit">Login</button>
                      <span>Or</span>
                      <button class="wed-fb-login">Signin</button>
                    </li>
					         <li>

                    <!-- FORGOT-PASSWORD-POP-UP -->

                    <!--  <p data-toggle="modal" data-target="#forgot">Forgot Password</p></li>
                  </form> 

                    <div class="nav_buttons">
                      <button class="wed-login" data-toggle="modal" data-target="#login" id="login_user" type="submit">Login</button>
                      <span class="head_or">or</span>
                      <button class="wed-fb-login">Signin</button>
                    </div>

                    <div class="clearfix"></div>
                  </ul>
                </div>
              </div>
            </div> -->

          </div>
        </div>
      </div>
    </nav>


    <!-- MODAL FOR LOGIN START -->
    <div class="modal fade wed-add-modal web-add-modal-custom" id="login" role="dialog">
      <div class="modal-dialog wed-add-modal-dialogue">
        <div class="modal-content wed-add-modal-content  login_modal_content">
          
          <div class="modal_close">
            <button class="modal_close_btn" data-dismiss="modal">
              <i class="fa fa-times" aria-hidden="true"></i>
            </button>
          </div>

          <div class="login_modal">
            <div class="login_modal_head">
              <span class="login_modal_img"><img src="<?php echo base_url(); ?>assets/images/login.png"></span>
              Login
            </div>             
            <form method="post" action='<?php echo base_url(); ?>home/login' id="login_form">
              <input class="wed-navbar-input" type="email" placeholder="email" name="email" data-parsley-trigger="change" required>
              <input class="wed-navbar-input" type="password" placeholder="password" name="password" data-parsley-trigger="change" required>
              <div class="login_modal_remember">
                  <input id="remember_me" type="checkbox" name="remember" value="1">
                  <!-- <input id="remember_me" type="checkbox" value="check1" data-parsley-mincheck="1" data-parsley-trigger="change" required> -->
                  <label for="remember_me">Remember me</label>
              </div>
              <div class="modal_login_button">
                <button class="wed-login" id="login_user" type="submit">Login</button>
              </div> 
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL FOR LOGIN END -->

    <div class="modal fade wed-add-modal" id="forgot" role="dialog">
      <div class="modal-dialog wed-add-modal-dialogue">
      <div class="modal-content wed-add-modal-content">             
       <form method="post" action="" id="frgt_psw_form">
        <div class="modal-body  wed-add-modal-body">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Forgot Password</h4>
          <p>Please enter your E-mail ID. We will send you a link to reset your password. </p>  
           <div id="frgt_psw_msg" style="color:#fff;"></div>         
          <input type="email" name="email" class="wed-forgot-input" placeholder="E-mail">
          <input class="wed-forgot-submit" type="button" value="Send"  id="frgt_psw">           
          <div class="clearfix"></div>
        </div>
     </form>
        </div>
      </div>
      </div>

        <div class="modal fade wed-add-modal" id="confirm" role="dialog">
            <div class="modal-dialog wed-add-modal-dialogue">
              <div class="modal-content wed-add-modal-content">
              <div class="modal-body  wed-add-modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Create New Password</h4>
                <p>Please Enter your Password </p>
                <input class="wed-forgot-input1" placeholder="Enter New Password"><br>
                <input class="wed-forgot-input1" placeholder="Confirm New Password">
                <input class="wed-forgot-submit" type="button" value="Submit">
                <div class="clearfix"></div>
              </div>
              </div>
            </div>
            </div>

    <?php } ?>


  <?php if($sess){
    $this->db->where('matrimony_id',$sess->matrimony_id);
     $query = $this->db->get('save_search');
     $save_search = $query->result();
?>      
        <!-- SAVED-SEARCH-POP-UP -->
         <div class="modal fade wed-add-modal" id="saved" role="dialog">
          <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">             
       <form method="post" action="" id="frgt_psw_form">
        <div class="modal-body  wed-add-modal-body">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Saved Searches</h4>
          <p>Please select the saved search criteria </p>         
   <!--        <input type="email" name="email" class="wed-forgot-input1" placeholder="Type Saved Search Keyword">  -->
      <div class="saved-search">
      <ol>
        <?php foreach($save_search as $save_result){?>
      <li>
        <form method="post" action="<?php echo base_url();?>search">
          <input type="hidden" name="search_id" value="<?php echo $save_result->id; ?>">
          <button type="submit" class="btn btn-link" style="text-decoration:none;color:#fff;text-transform:capitalize;"><?php echo $save_result->save_search_name; ?></button>
        </form>
      </li>
      <?php } }?>
      <!-- <li>Saved Search2</li>
      <li>Saved Search3</li>
      <li>Saved Search4</li>
      <li>Saved Search5</li>
      <li>Saved Search6</li>
      <li>Saved Search7</li>
      <li>Saved Search8</li>
      <li>Saved Search9</li>
      <li>Saved Search10</li> -->
      </ol>
      </div>
          <div class="clearfix"></div>
        </div>
     </form>
        </div>
      </div>
      </div>

<script type="text/javascript">

    $(document).on("click","#frgt_psw",function() {

        var value =$("#frgt_psw_form").serialize() ;      
      $.ajax({
          type: "POST",
          url: base_url+'Home/Forget_Password',
          data: value,
          success: function(data){
           
           if(data==1){
            $('#frgt_psw_msg').html('Check your mail to get your temporary password');
           //alert('ffdgg');
           }else{
             $('#frgt_psw_msg').html('email not exist');
           }
          }
    });
   });     
</script>