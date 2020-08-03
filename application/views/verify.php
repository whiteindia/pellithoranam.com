<?php 
      // ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$my_matr_id = $this->session->userdata('logged_in');

/*var_dump($my_matr_id);
die();*/
       $email=$my_matr_id->email;?>

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
              <form action="<?php echo base_url();?>verify/check_otp" method="post">
              <input class="wed-verify-input" type="text" placeholder="Enter the code" name="otp">
              <button class="wed-verify-btn" type="submit">Verify</button>
              <span style="color:red;"><?php if(isset($error)) { echo $error; } ?></span>
            </form>
              <p>Didn’t receive code yet?<br>
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
</body></html>
