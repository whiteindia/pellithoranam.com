<?php 
$settings = get_setting();
$title    = $settings->title;
?>
<!DOCTYPE html>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <div class="wed-contact-page">
      <div class="container container-custom">
        <h1>Contact Us</h1>
        <div class="wed-contact-inner">
          <div class="wed-contact-inner-left">
            <div class="wed-contact-address">
              <?php echo $title; ?><br>
           <small>Plot No -79
              <br>PRAGATHINAGAR
             <br>KUKATPALLY
             <br> HYDERABAD- 500090 </small>
            </div>
          </div>
          <div class="wed-contact-inner-right">
            <div class="wed-contact-mail">
              info@pellithoranam.com 
            </div>
            <div class="wed-contact-call">
              +91 8187893236 <!-- 78934 19537-->
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="button-bay">
        <button class="wed-enquiry" data-toggle="modal" data-target="#enquiry">Enquiry</button>

        <!-- ENQUIRY-POP-UP -->

        <div id="enquiry" class="modal fade wed-enquiry-modal" role="dialog">
            <div class="modal-dialog wed-enquiry-modal-dialog">
              <button class="wed-enquiry-modal-body-close" data-dismiss="modal"></button>
              <div class="clear"></div>
              <div class="modal-content wed-enquiry-modal-content">
                <div class="modal-body wed-enquiry-modal-body">
                  <h4>Enquiry</h4>
                  <form method="POST" id="enquiry_form" data-parsley-validate>
                    <div class="wed-enquiry-modal-inner">
                      <ul>
                        <li>
                          <div class="wed-enquiry-child1">Name</div>
                          <div class="wed-enquiry-child2">
                              <input type="text" class="wed-enquiry-input" name="name" id="name" 
                                 data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" tabindex="1"
                                 data-parsley-required-message="Please insert name." 
                                 data-parsley-errors-container="#enq_name">
                              <div class="reg_error" id="enq_name"></div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-enquiry-child1">Mobile Number</div>
                          <div class="wed-enquiry-child2">
                            <input type="text" class="wed-enquiry-input" name="mobile_no" id="mobile" 
                               data-parsley-trigger="keyup" data-parsley-type="digits" 
                               data-parsley-minlength="8" data-parsley-maxlength="15"  
                               data-parsley-pattern="^[0-9]+$" required=""
                               tabindex="3" data-parsley-required-message="Please insert mobile number." 
                               data-parsley-errors-container="#reg_phone">
                            <div class="reg_error" id="reg_phone"></div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-enquiry-child1">Email ID</div>
                          <div class="wed-enquiry-child2">
                            <input type="email" class="wed-enquiry-input" id="email" name="email_id" 
                                required=""  tabindex="4"
                                data-parsley-required-message="Please insert email id." 
                                data-parsley-errors-container="#enq_email">
                            <div class="reg_error" id="enq_email"></div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <div class="wed-enquiry-child1">Description</div>
                          <div class="wed-enquiry-child2">
                            <textarea name="enquiry" class="wed-enquiry-input1" 
                             rows="7" cols="50" required=""
                              data-parsley-required-message="Please insert enquiry."
                              data-parsley-errors-container="#enq_text"></textarea>
                              <div class="reg_error" id="enq_text"></div>
                          </div>
                          <div class="clearfix"></div>
                        </li>
                        <li>
                          <button class="wed-enquiry-sbmt" type="button" id="enq_submit">Submit</button>
                          <div id="enquiryMsg"></div>
                        </li>
                      </ul>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


      </div>
      </div>
      <div id="map" style="height:400px;margin-bottom:10px;"></div>
    </div>

<script src="https://maps.googleapis.com/maps/api/js"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAPkwBOzGBH1V1sRBzmCWQS-7XoTgPghT0&libraries=places"></script>


<script>

//send mail from Enquiry//

$('#enq_submit').on('click', function (e) {
   if ($('#enquiry_form').parsley().validate()) {
     $('#enq_submit').hide();
    $("#enquiryMsg").html("<div class='custom_loader'></div>");
      data = $("#enquiry_form").serialize();
      //alert(data);

    $.ajax({
        type: "POST",
        url: base_url+'home/send_enqmail',
        data: data,
        error: function (err) {
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success: function(data) {
          data = JSON.parse(data);
            if(data == "success") { 
			 
              $("#enquiryMsg").html("Thank you for contacting us. We will contact you soon");
            } else { 
              $("#enquiryMsg").html("Mail sending Failed, Try Again Later");
            }
            $('#enq_submit').hide();
            $(".custom_loader").hide();
        }
    });
  }
});
/*GOOGLE-MAP*/

function initialize() {
      var mapCanvas = document.getElementById('map');
      var mapOptions = {
        center: new google.maps.LatLng(17.4121531,78.1278513),
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(mapCanvas, mapOptions)
    }
    google.maps.event.addDomListener(window, 'load', initialize);

</script>

</body></html>
