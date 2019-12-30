<div class="row">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jmagnific-popup.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css'); ?>">


<div id="newslater-popup" class="mfp-hide white-popup-block open align-center">
  <div class="nl-popup-main">
    <img src="<?php echo base_url('assets/img/ad1.jpg'); ?>">
   
  </div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.12.3.min.js'); ?>"></script> 


<script src="<?php echo base_url('assets/js/jquery.magnific-popup.js'); ?>"></script> 
 


<script>
  /* ------------ Newslater-popup JS Start ------------- */
  $(window).load(function() {
    $.magnificPopup.open({
      items: {src: '#newslater-popup'},type: 'inline'}, 0);
  });
    /* ------------ Newslater-popup JS End ------------- */
</script>
    
            <form method="post" id="register_form">
              <div class="wed-reg-div animated zoomIn">  
                
                <div class="wed-reg-body">
                  <h3 class="register_head">REGISTER FREE</h3>
                  <ul>
                    <li>
                      <div class="child1">
                        Profile for
                      </div>
                      <div class="child2">
                        <select class="wed-reg-input-select" name="profile_for" id="profile_for">
                          <option value="-1">Select</option>
                          <option value="myself">Myself</option>
                          <option value="son">Son</option>
                          <option value="daughter">Daughter</option>
                          <option value="brother">Brother</option>
                          <option value="sister">Sister</option>
                          <option value="relative">Relative</option>
                        </select>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Name
                      </div>
                      <div class="child2">
                        <input class="wed-reg-input" type="text" name="name" id="name">
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Surname
                      </div>
                      <div class="child2">
                        <input class="wed-reg-input" type="text" name="surname" id="surname">
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Gender
                      </div>
                      <div class="child2">
                        <div class="wed-custom">
                            <input id="male" type="radio" name="gender" value="male" checked="checked">
                            <label for="male">Male</label>
                            <input id="female" type="radio" name="gender" value="female">
                            <label for="female">Female</label>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Birth Date
                      </div>
                      <div class="child2">
                  
                      <input class="wed-reg-input datepicker" name="dob" id="dob" data-date-format="dd-mm-yyyy" placeholder="">
                      </div>

                      <div class="clearfix"></div>
                    </li>
                   <li>
                      <div class="child1">
                        Mother tongue
                      </div>
                      <div class="child2">
                        <select class="wed-reg-input-select" placeholder="Select" name="mother_tongue" id="mother_tongue">
                          <option value="-1">- Select -</option>
                          <?php foreach($mother_tongue as $mthr_tng) { ?>
                              <option value="<?php echo $mthr_tng->mother_tongue_id; ?>">
                                  <?php echo $mthr_tng->mother_tongue_name ?>
                              </option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    
                  </ul>
                  <ul>
                    <li>
                      <div class="child1">
                        Religion
                      </div>
                      <div class="child2">
                        <select class="wed-reg-input-select religion-selector" placeholder="Select" name="religion" id="religion">
                        <option value="-1">- Select -</option>
                        <?php foreach($religions as $rlgn) { ?>
                            <option value="<?php echo $rlgn->religion_id; ?>"><?php echo $rlgn->religion_name; ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Caste
                      </div>
                      <div class="child2">
                        <select class="wed-reg-input-select caste-selector" placeholder="Select" name="cast" id="cast">
                          <option value="-1">- Select -</option>
                        </select>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    
                    <li>
                      <div class="child1">
                        Phone
                      </div>
                      <div class="child2">
                        <span class="country_codes">
                          <input class="wed-reg-input" type="text" name="phone_countrycode" id="mobile-number" data-parsley-trigger="change" required>
                        </span>
                        <span class="phone_input">
                          <input class="wed-reg-input" type="text" placeholder="Mobile Number" name="phone" id="phone"  data-parsley-maxlength="10" data-parsley-minlength="10" data-parsley-trigger="change">
                        </span>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        E mail
                      </div>
                      <div class="child2">
                        <input class="wed-reg-input" type="email" placeholder="Email" name="email" id="email" autocomplete="off">
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Password
                      </div>
                      <div class="child2">
                        <input class="wed-reg-input" type="password" placeholder="Password" name="password"  data-parsley-minlength="6" data-parsley-trigger="change" required autocomplete="new-password">
                      </div>
                      <div class="clearfix"></div>
                    </li>
                  </ul>
                  <div class="col-md-12 reg_agree">
                       <div class="wed-custom1">
                          <input id="i_read" name="i_read" type="checkbox" value="check1">
                          <label for="i_read">I have read and agree to the <a data-toggle="modal" data-target="#tc">T&C</a> and<a data-toggle="modal" data-target="#privacy"> Privacy Policy</a></label>
                      </div>
                     <div class="error w3-animate-top"></div>
                      <div class="wed-submit-btn-bay">
                        <button class="wed-submit-btn" type="submit" id="register">Submit</button>
                      </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </form>
        </div>
        <style type="text/css">
          .wed-custom1 input[type=checkbox]{
            display: inherit;
            visibility: hidden;
            width: 0px;
          }
        </style>