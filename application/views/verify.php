<?php 
      // ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$my_matr_id = $this->session->userdata('logged_in');

/*var_dump($my_matr_id);
die();*/
       $email=$my_matr_id->email;?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- TOP-BANNER -->
    <div class="wed-wrapper">
    <div class="wed-verify-banner">
      <div class="container container-custom">
        <div class="wed-congrats">
          <h1>Congratulations !</h1>
          <p>You have Successfully registered<br>
              with Pelli Thoranam Matrimony</p>
              <h5>ID : <?php echo $my_matr_id->matrimony_id;?></h5>
        </div>
      </div>
    </div>
    <div class="wed-verify-detail">
        <div class="container container-custom">
          <div class="wed-verify-inner">
            <p>A  6 - Digit Confirmation code has been sent to your email address<strong><?php echo $email;?></strong><span><img src="<?php echo base_url();?>assets/img/verify-edit.png"></span></p>
            <div class="wed-verify-code">
              <form id="loginform" method="post"> <!--- name="myForm" action="<?php echo base_url();?>verify/check_otp" onsubmit="return validateForm()"--->
              <input class="wed-verify-input" type="text" placeholder="Enter the code" required name="otp">
              <button class="wed-verify-btn"  type="submit">Verify</button>
              <span style="color:red;"><?php if(isset($error)) { echo $error; } ?></span>
              <span style="color:red;"><?php if(isset($success)) { echo 'congratulations your account is verified';?><a href="<?php echo base_url(); ?>Verify/send_email_to_other_user"><strong>click here to send alert to other users now</strong></a><?php } ?></span>
            </form>
              <p>Didn’t receive code yet?<br>
              <div id="wait" class="bg-light" style="display:none;width:350px;height:150px;position:absolute;top:30%;left:30%;padding:2px;">
            <div class="container-fluid">
              <div class="spinner-grow text-muted"></div>
  <div class="spinner-grow text-primary"></div>
  <div class="spinner-grow text-success"></div>
  <div class="spinner-grow text-info"></div>
  <div class="spinner-grow text-warning"></div>
  <div class="spinner-grow text-danger"></div>
  <div class="spinner-grow text-secondary"></div>
  <div class="spinner-grow text-dark"></div>
  <div class="spinner-grow text-light"></div>

              <br>Please Wait we are veryfying your otp</div>
              </div>
                <a href="<?php echo base_url(); ?>Verify/resend_otp"><strong>Resend Pin to Mobile number</strong></a>
              </p>
                <hr>
               <!--  <div class="wed-custom-check">
                    <input id="check1" type="checkbox" name="check" value="check1">
                    <label for="check1">Keep me Logged In ( Recommended )</label>
                    <div class="clearfix"></div>
                </div>
                <button class="wed-skip-btn">Skip</button> -->
            </div>
          </div>
        </div>
    </div>


</div>
​<script type = "text/javascript" >
 history.pushState(null, null, location.href); 
 history.back();
  history.forward(); 
  window.onpopstate = function () { history.go(1); }; 

</script>
  <script>
function validateForm() {
  var x = document.forms["myForm"]["otp"].value;
  if (x == "" || x == null) {
    alert("otp must be filled out");
    return false;
  }else{
   alert("Thank you.We are validating your otp.Please continue to find your matches");
     return true;
  }
}



  </script> 

<script type="text/javascript">
$(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>Verify/check_otp',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
 
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
               /*   $.ajax({
                   type: "post",
                     url: "https://pellithoranam.com/Verify/send_email_to_other_user"
                       }); 
                  */
                    location.href = '<?php echo base_url();?>search';
                }
                else
                {
                    alert('Invalid OTP . Please Try Again!');
                }
           }
       });
     });
});


$(document).ajaxStart(function(){
  $("#wait").css("display", "block");
});

$(document).ajaxComplete(function(){
  $("#wait").css("display", "none");
});
</script>




</body></html>
