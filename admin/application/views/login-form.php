<!DOCTYPE html>
<?php $settings = get_settings();?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo $settings->icon; ?>">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url(); ?>">Matrimonial</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php if(validation_errors()) { ?>
            <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
            <?php } ?>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-xs-12 right">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              <p data-toggle="modal" data-target="#forgot" class="forgot">Forgot Password</p>
            </div><!-- /.col -->
          </div>
        </form>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<!-- MODAL FOR FORGOT PASSWORD START -->
<div class="modal fade wed-add-modal" id="forgot" role="dialog">
      <div class="modal-dialog wed-add-modal-dialogue">
        <div class="modal-content login_modal_content">             
          <form method="post" action="" id="frgt_psw_form" data-parsley-validate="true" class="validate">
            <div class="modal-body  wed-add-modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Forgot Password</h4>
              <p>Please enter your E-mail ID. We will send you a link to reset your password. </p>  
               <div id="frgt_psw_msg" class="renew_pass" style="color:#fff;"></div>         
              <input type="email" id="email" name="email" class="wed-forgot-input" placeholder="E-mail" required=""
               data-parsley-required-message="Please insert email."
               data-parsley-errors-container="#frgt_psw_msg">

              <input class="wed-forgot-submit" type="button" value="Send"  id="frgt_psw"> 
              <div class="view_loader"></div>          
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
			<script>
          
  $(document).ready(function(){

$('#frgt_psw').on('click', function(e) {
// $('.view_loader').append('<div class="loader"></div>');
// $('#frgt_psw').hide();
var value =$("#frgt_psw_form").serialize() ;
      
  var val = $("#email").val();
  if(val==''){
    $(".renew_pass").show('');
    $(".renew_pass").html('');
    $(".renew_pass").html('<p class="error">Please enter your Email Id</p>');
    setTimeout(function() {
      $(".renew_pass").hide();
    }, 3000);
  } 
  else {
       $(".renew_pass").html('');
  }
  var url = base_url + 'Login/Forget_Password';
  var data = 'email='+val;
  var result = post_ajax(url, data);
  obj = JSON.parse(result);
   
  console.log(obj.status);
  if (obj.status == "No") {
    $(".renew_pass").show('');
    $(".renew_pass").html('');
    $(".renew_pass").html('<p class="error">' + obj.message + '</p>');
    setTimeout(function() {
      $(".renew_pass").hide();
    }, 3000);
  }
   
  else{
    $(".renew_pass").show('');
    $(".renew_pass").html('');
    $(".renew_pass").html('<p class="error">' + obj.message + '</p>');
    setTimeout(function() {
        $(".renew_pass").hide();
    }, 3000);
  } 

});
});

function post_ajax(url, data) {
var result = '';
$.ajax({
  type: "POST",
  url: url,
  data: data,
  success: function(response) {
      result = response;

  },
  error: function(response) {
      result = 'error';
  },
  async: false
});
return result;
}  

      
      
      </script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
