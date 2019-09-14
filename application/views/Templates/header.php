<?php 
$this->session->set_userdata('logged_in',"hello"); 
$sess = $this->session->userdata('logged_in');
$setting = get_setting(); ?>
<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/starter-template/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title><?php echo $setting->title; ?></title>

    <!-- GENERAL-CSS -->

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/cascade.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery.bxslider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animations.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/circle.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/parsley/parsley.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    


  </head>
   <body>
    <?php  if (1==1)  { ?>
   <nav class="navbar navbar-inverse navbar-fixed-top wed-navbar nav_bg">
      <div class="container container-custom">
        <div class="row">
          <div class="col-md-2">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand wed-navbar-logo" href="<?php echo base_url();?>">
                <img src="<?php echo base_url(); ?>assets/logo/pellithoranam_logo.png">
              </a>
            </div>
          </div>
          <div class="col-md-10">
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
      
              <ul class="wed-inside-menu">
                <a href="<?php echo base_url();?>Search/"><li class="hvr-pulse">My Home</li></a>
                <li class="hvr-pulse">Search</li>
                <li class="hvr-pulse">Matches</li>
                <li class="hvr-pulse">Messages</li>
                <li class="hvr-pulse">Services</li>
                <li class="hvr-pulse">Update</li>
                <li class="hvr-pulse">Help</li>
                <li><span><img src="<?php echo base_url(); ?>assets/img/notification.png"></span></li>
                <li><div class="wed-profile" >
                   <?php if($result==null){?>
                  <img src="<?php echo base_url(); ?>assets/img/user.jpg">
                  <?php }else{?>
                  <img src="<?php echo base_url(); ?><?php echo $result->image; ?>" data-toggle="modal" data-target="#drop">
                 <?php }?>
                </div>
              </li>

              <!-- MY-ACCOUNT-DROP-DOWN -->

              <div id="drop" class="modal wed-drop-modal fade" role="dialog">
                <div class="modal-dialog wed-drop-modal-dialog">
                    <div class="modal-content wed-modal-content">
                      <div class="modal-body wed-modal-body">
                        <div class="wed-modal-head">
                          <div class="wed-arrow-up"></div>
                          <h5><?php echo "My_name"; ?></h5>
                          <p>E3642350</p>
                          <hr>
                          <div class="wed-acnt">
                            <li style="width:60%;padding-top: 4px;">Account Type : Free</li>
                            <li style="width:40%;"><button class="wed-upgrade">Upgrade</button></li>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="wed-modal-list">
                          <li><a href="<?php echo base_url();?>Myaccount/">Edit Profile</a></li>
                          <li><a href="#">Edit Partner Preference</a></li>
                          <li><a href="#">Generate Hororscope</a></li>
                          <li><a href="#">Add Trust Badge</a></li>
                          <li><a href="<?php echo base_url();?>Profile/photo_add">Settings</a></li>
                          <li><a href="#">Feedback</a></li>
                          <li><a href="<?php echo base_url();?>Logout/">Logout</a></li>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>

              <!--  -->
                <li><span class="arrow" data-toggle="modal" data-target="#drop"><img src="<?php echo base_url(); ?>assets/img/arrow.png"></span></li>



                <div class="clearfix"></div>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <?php }else{ ?>
 
       <nav class="navbar navbar-inverse navbar-fixed-top wed-navbar">
      <div class="container container-custom">
        <div class="row">
          <div class="col-md-2">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand wed-navbar-logo" href="<?php echo base_url();?>">
                <img src="<?php echo base_url(); ?>assets/logo/pellithoranam_logo.png">
              </a>
            </div>
          </div>
          <div class="col-md-10">
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">

                  <ul class="wed-navbar-list">
                     <div class="alert_bar"></div>
                    <form method="post" id="login_form">
                    <li>
                      <input class="wed-navbar-input" type="email" placeholder="email" name="email" data-parsley-trigger="change" required>
                    </li>
                    <li>
                      <input class="wed-navbar-input" type="password" placeholder="password" name="password" data-parsley-trigger="change" required>
                    </li>
                    <li>

                      <button class="wed-login" id="login_user" type="button">Login</button>
                      <span>Or</span>
                      <button class="wed-fb-login">Signin</button>
                    </li>
                  </form>
                    <div class="clearfix"></div>
                  </ul>
                </div>
              </div>
          

            </div>
          </div>
        </div>
      </div>
    </nav>
    <?php } ?>