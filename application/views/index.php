<link href = "<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel = "stylesheet">

    <!-- BANNER -->

    <div class="wed-banner" style="background:url('<?php echo base_url(); ?>admin/<?php echo $banner->banner_image;?>'); background-size: cover; background-position: center;">
        
        <div class="wed-about-overlay">
      <!-- <div class="wed-banner" style="background:url('<?php echo base_url(); ?>admin/assets/img/home_main_bg.png');"> -->
      
   
      <!-- <div class="container container-custom"> -->
        <?php $this->load->view('forms/register.php');?>
  
      <!-- </div> -->
    </div> </div>
	
	
	<!-- PRIVACY-POLICY -->

      <div class="modal fade wed-add-modal" id="privacy" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Privacy Policy</h4>
              <p class="tc-scroll">
              </p>
            </div>
          </div>
        </div>
      </div>
	  
	  	<!-- TERMS AND CONDITION -->

      <div class="modal fade wed-add-modal" id="tc" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Terms & Conditions</h4>
              <p class="tc-scroll">Terms and Conditions governing usage of Matrimony sites [Applicable for All Services]
              DEAR USER:
              Welcome to Ooi matrimony (herein referred as "BM").
              BM and its affiliates provide their services to you subject to the following terms and conditions. On your visit or signing up at BM, you consciously accept the terms and conditions as set out hereinbelow. In addition, when you use or visit any current or future BM service or any business affiliated with BM, whether or not included in the BM Web site, you will also be subject to the guidelines and conditions applicable to such service or business. Please read the various services provided by BM before making any payment in respect of any service.
              The Users availing services from BM shall be deemed to have read, understood and expressly accepted and agreed to the terms and conditions hereof and this agreement shall govern the relationship between you and BM and all transactions or services by, with or in connection with BM for all purposes, and shall be unconditionally binding between the parties without any reservation. All rights, privileges, obligations and liabilities of you and/or BM with respect to any transactions or services by, with or in connection with BM for all purposes shall be governed by this agreement. The terms and conditions may be changed and/or altered by BM from time to time at its sole discretion.
              </p>
            </div>
          </div>
        </div>
      </div>

    <!-- FIND -->

    <div class="wed-find-bay">
  <!--    <div class="container">
        <form method="post" id="simple_search_form" action="<?php echo base_url(); ?>search">
          <div class="wed-filter-bay">

            <div class="wed-filter-left">
              <div class="wed-custom2">
                <input type="hidden" name="search_type" value="1">
                <input id="male1" type="radio" name="gender" value="female" checked="checked">
                <label for="male1"><p>Bride</p></label>
                <input id="female1" type="radio" name="gender" value="male">
                <label for="female1"><p>Groom</p></label>
              </div>
              <div class="wed-age-div">
                <span>Age</span>
                <span><input class="wed-age-input" id="age_from_id" type="text" name="age_from" required></span>
                <span>to</span>
                <span><input class="wed-age-input" id="age_to_id" type="text" name="age_to" required></span>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="wed-filter-right">
            <span class="wed_filter_span1">Religion</span>
            <span class="wed_filter_span2">
              <select class="wed-age-select religion-selector" name="religion">
                    <option value="0">Select Relegion</option>
                    <?php// foreach($religions as $rlgn) { ?>
                          <option value="<?php //echo $rlgn->religion_id; ?>"><?php //echo $rlgn->religion_name; ?></option>
                    <?php// } ?>
              </select>
            </span>
            <span class="wed_filter_span1">Caste</span>
            <span>
              <select class="wed-age-select caste-selector" name="caste">
                <option value="0"> Select Caste </option>
              </select>
            </span>
          </div>
          <div class="clearfix"></div>
        </div>

       <!-- <div class="wed-search-option">
          <span id="search-by-id-head">
              <span id="search-by-id">Search by ID</span>
              <input type='text' id='matr_id' class='wed-navbar-input' style="display: none;" placeholder='T1234567' name='matri_id'>
          </span>
          <span>|</span>
          <span><a href="<?php// echo base_url(); ?>search/advanced?advanced">More Search Options</a></span>
        </div>-->

    <!--    <div class="wed-find-btn-bay">
          <button class="wed-find-btn" type="submit" id="search_user">Find</button>
        </div>

      </form>
      </div>  -->
    </div>


<!-- ////////////////////////////////// START SECTIONS -->


<!-- /////////////////////////////////////////////////////////////////// ABOUT START -->

   <div class="wed-about">
        
          <div class="container">
              <div class="row"> 
            <!-- <h2><?php echo $content->content_header?></h2>
            <p><?php echo $content->content_para?></p>-->
            
            
            <div class="col-md-8">
			<h2><?php echo $content->content_header?></h2>
            <p><?php echo $content->content_para?></p>
			
                <div class="wed-find-btn-bay1">
                  <!-- <a href="<?php echo $content->content_link?>"><button class="wed-find-btn1"><?php echo $content->content_button?></button></a> -->
                  <a href="#">
                    <button class="wed-find-btn1"><?php echo $content->content_button?>
                      <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                    </button>
                  </a>
                </div>
            </div>
            <div class="col-md-4">
              <img src="<?php echo base_url(); ?>assets/images/side-imgs.png">
            </div>
            
            </div>
          </div>
        
      </div>
<!-- /////////////////////////////////////////////////////////////////// ABOUT END -->


<!-- /////////////////////////////////////////////////////////////////// HIGHLIGHTED-PROFILES  START-->


<?php if($profile_highlight) { ?>
     <!--<div class="wed-highlight-profile">
        <div class="container">
          <h2>Highlighted Profiles</h2>
          <div class="profile">            
            <div class="carousel">
            <?php  
			//print_r($profile_highlight);die;
			foreach($profile_highlight as $highlight) { 
			if(!$session=$this->session->userdata('logged_in')){
				
			?>
			
              <div class="profile_image">
                 <a class="highlit" data-id="<?php echo $highlight->matrimony_id; ?>"><img src="<?php echo base_url().'/'.$highlight->profile_photo; ?>"></a>
                 <h5><?php echo $highlight->profile_name;?></h5>
                 <p><?php echo $highlight->education;?>, ( <?php echo $highlight->age;?> )</p>
              </div>
              <?php } else { ?>
              <div class="profile_image">
                 <a href="<?php echo base_url()?>profile/profile_details/<?php echo $highlight->matrimony_id;?>"><img src="<?php echo base_url().'/'.$highlight->profile_photo; ?>"></a>
                 <h5><?php echo $highlight->profile_name;?></h5>
                 <p><?php echo $highlight->education;?>, ( <?php echo $highlight->age;?> )</p>
              </div>
              <?php } }?>
            </div>
            <div class="carousel-nav">
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
            </div>
            <div class="carousel-arrows"></div>
          </div>
        </div>
      </div>-->
      <?php } ?>
        <!-- <div class="wed-space"></div> -->

<!-- /////////////////////////////////////////////////////////////////// HIGHLIGHTED-PROFILES  END-->
     
     <div class="package-sec">
     <div class="container">
         <h3 style="text-align: center;color: #fff;margin: 10px auto 30px;">Upgrade your Membership to contact people you like</h3>
         <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="packg-block">
                    <img src="<?php echo base_url(); ?>assets/images/phone.png" />
                    <h4>View Contacts</h4>
                    <p>Access contact number and connect directly on call or via sms</p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="packg-block">
                    <img src="<?php echo base_url(); ?>assets/images/paper-plane.png" />
                    <h4>Send Messages</h4>
                    <p>Send Personalized Messages while expressing Interest.</p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="packg-block">
                    <img src="<?php echo base_url(); ?>assets/images/conversation.png" />
                    <h4>Chat</h4>
                    <p>Chat instantly with all other online users</p>
                </div>
            </div>
         </div>
          <div class="pck-detl">
         <a href="/package" class="btn-pckg" style="">View Packages</a>
         <p> To know more, call us @ +91 78934 19537 </p>
          </div> 
     </div> 
     </div>
        

       <!--     <div class="wed-succes-stories">
          <h2>Success Stories</h2>
          <ul>
            <li class="animated flipInY">
              <div class="wed-succes-story">
                <img src="<?php echo base_url(); ?>assets/img/pic7.png">
              </div>
              <h6>Peter & Lora</h6>
              <p>"Your wide profile base helped<br>
                us to find each other."</p>
            </li>
            <li class="animated flipInY">
              <div class="wed-succes-story">
                <img src="<?php echo base_url(); ?>assets/img/pic8.png">
              </div>
              <h6>Lewis & Helen</h6>
              <p>"Thank You for helping us<br>
                  find each other."</p>
            </li>
            <li class="animated flipInY">
              <div class="wed-succes-story">
                <img src="<?php echo base_url(); ?>assets/img/pic9.png">
              </div>
              <h6>Joe & Mariya</h6>
              <p>"Your wide profile base helped<br>
                us to find each other."</p>
            </li>
          </ul>
          <div class="wed-find-btn-bay">
            <button class="wed-find-btn1">See more Success Stories</button>
          </div>
        </div>-->

<!-- /////////////////////////////////////////////////////////////////// SUCCESS-STORIES START-->
<?php if($success) { ?>
       <div class="wed-succes-stories">
          <div class="wed-succes-stories-overlay">
            <div class="container">
              <h2>Success Stories</h2>

              <div classs="success_stories">
                <div class="slider">
				  <?php 
				  //print_r($success);die;
				  
				  foreach($success as $success_story) { ?>
                    <div class="slide">
                      <div class="slide">
                        <img src="<?php echo base_url().'/'.$success_story->photo; ?>">
                        <h6><?php echo $success_story->name;?></h6>
							 <p><?php echo $success_story->story;?></p>
                      </div>                
                    </div>
					  
					<?php } ?>
				
                </div>
                
              </div>
			  
          </div>
        </div>
      </div>
 <?php } ?>
<!-- /////////////////////////////////////////////////////////////////// SUCCESS-STORIES END-->



<section class="module parallax parallax-1">
  <div class="wed-index-parallax-overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="wed-parallax-detail">
           <!--<h5><strong><?php echo $footer->footer_header?></strong> </h5>-->
            <!--<h5>Mobile App</h5>-->                 
     <!--<p><?php echo $footer->footer_para?>.</p>-->
            <div class="wed-download-bay">
              <!--<li><img src="<?php echo base_url(); ?>assets/img/googleplay.png"></li>-->
              <!--<li><img src="<?php echo base_url(); ?>assets/img/appstore.png"></li>-->
</div>
          </div>
       </div> 


        <div class="col-md-7 animatedParent" data-sequence='500'>
          <div class="wed-index-phone animated bounceInLeft" >
             <img src="<?php echo base_url(); ?>admin/<?php echo $footer->footer_image;?>">
            <!--<img src="<?php echo base_url(); ?>assets/images/home_phone.png">-->
          </div>
        </div>

        </div>
      </div>
    </div>
  </div>
</section>

 <div class="modal fade wed-add-modal web-add-modal-custom" id="login1" role="dialog">
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
            <form  id="loginhigh_form1">
              <input class="wed-navbar-input" type="text" placeholder="Email/Matrimonyid/Mobileno" name="email" data-parsley-trigger="change" required>
              <input class="wed-navbar-input" type="password" placeholder="password" name="password" data-parsley-trigger="change" required>
              <div class="login_modal_remember">
                  <input id="remember_me" type="checkbox" name="remember" value="1">
                  <!-- <input id="remember_me" type="checkbox" value="check1" data-parsley-mincheck="1" data-parsley-trigger="change" required> -->
                  <label for="remember_me">Remember me</label>
              </div>
              <div class="modal_login_button">
                <button class="wed-login" id="login_userhighlight" type="button">Login</button>
                 <p data-toggle="modal" data-target="#forgot" class="forgot">Forgot Password</p>
				  <div class="forgot" id="errmsg"></div>
              </div> 
			 
            </form>
          </div>
        </div>
      </div>
    </div>
    
        <!-- MODAL FOR LOGIN ERROR START -->
    <div class="modal fade wed-add-modal web-add-modal-custom" id="loginError" role="dialog">
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
              Login Error
            </div>             
            <div class="login_modal_head">
            Invalid Email/Matrimonyid or password
              </div>
              <div class="modal_login_button">
                <button class="wed-login" data-dismiss="modal">Close</button>
              </div> 
            </div>
          </div>
        </div>
      </div>
 
    <!-- MODAL FOR LOGIN ERROR END -->

    <!-- FOOTER -->
<script src = "<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
<script>
$( document ).ready(function() {

// -------------------------FOR HIGHLIGHT PROFILE SLIDER
$(window).load(function() {
  var width = $(window).width();
    if(width >= 768) {
      $('.carousel').slick({
          infinite: true,
          slidesToShow: 5,
          slidesToScroll: 1,
          arrows: false,
          centerMode: true,
          centerPadding: '10px',
          variableWidth: false

      });

      $('.carousel-nav').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          arrows: true,
          appendArrows: '.carousel-arrows',
          prevArrow: '<div class="nav_left"><img src="<?php echo base_url(); ?>assets/images/left_ar.png"></div>',
          nextArrow: '<div class="nav_right"><img src="<?php echo base_url(); ?>assets/images/right_ar.png"></div>',
          asNavFor: '.carousel',

      });
    }
});

$(window).load(function() {
  var width = $(window).width();
    if(width < 768) {
      $('.carousel').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          centerMode: true,
          centerPadding: '10px',
          variableWidth: false

      });

      $('.carousel-nav').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          arrows: true,
          appendArrows: '.carousel-arrows',
          prevArrow: '<div class="nav_left"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
          nextArrow: '<div class="nav_right"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
          asNavFor: '.carousel',

      });
    }
});


//-------------------------- FOR SUCCESS STORY SLIDER



$(window).load(function() {
  var width = $(window).width();
    if(width > 700) {
      $('.slider').slick({
        slidesToShow: 3,
        centerMode: true,
        centerPadding: "0px",
        speed: 500
      });
    }
});


$(window).load(function() {
  var width = $(window).width();
  if(width < 480) {
    $('.slider').slick({
      slidesToShow: 1,
      centerMode: true,
      centerPadding: "0px",
      speed: 500
    });
  }
});



// -------------------------FOR DATEPICKER
      



    $(document).on("click","#search-by-id",function() {
        $('#matr_id').show();
        $('#search-by-id').hide();
        document.getElementById("age_from_id").required = false;
        document.getElementById("age_to_id").required = false;
    });

    /*$(document).on("click","#search_user",function() {
        if($('#simple_search_form').parsley().validate()) {

            var value =$("#simple_search_form").serialize();
            console.log(value);
            window.location.href= base_url+"search/?"+value;
      }
    });*/

    
});


	$(".highlit").on('click',function(){
        var mid = $(this).data('id');
		$('#login1').modal('show');
		highlight(mid);
	});
		
	function highlight(mid){ 
		$("#login_userhighlight").on('click',function(){   
		  var data = $('#loginhigh_form1').serialize();
			  $.ajax({
                type: "POST",
                url: base_url+'home/loginhighlight',
                data: data,
                success: function(data) {  
                    val = JSON.parse(data);  
    				if(val['status']="success"){ 
    					window.location.href = base_url+"Profile/profile_details/"+mid;
    				}
    				else{ 
    				
                    $('#login1').modal('hide');
    				$('#loginError').modal('show');
    			
    				}
                }
            
             });
		
		 });
		}
		   

		   
	 
</script>
<?php $this->load->view('forms/register_js.php');?>


</body></html>
