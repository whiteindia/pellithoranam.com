<script src = "<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script type="text/javascript">
	jQuery(function($){
		$.validator.addMethod("valueNotEquals", function(value, element, arg){
			 return arg != value;
			}, "Value must not equal arg.");
		$( "#reg_detail_form" ).validate({
			debug: false,
		    //focusInvalid: false,
		    //onfocusout: false,
		    onkeyup: false,
		    onclick: false,
			rules: {
				income:{
					required : true,
				},
				country:{
					required : true,
					valueNotEquals : '-1'
				}
			},
			messages: {
				income:{
					required : "Please Type Your income.",
				},
				country:{
					required : "Must Choose City",
					valueNotEquals : "Must Choose City"
				}
			},
		  	submitHandler: function(form) {
		  		var value =$( "#reg_detail_form" ).serialize();
		  		return true;
		  	}
		});

		$("#country_selector").on('change', function () {
	        var country = $(this).val();

	        $.ajax({
	        type: "POST",
	        url : '<?php echo base_url(); ?>home/get_city_by_country',
	        data:  {
	        	country : country
	        },
	        success: function(data){
	               $("#city_selector").html(data);
	            }
	        });
	    });
	    $("#city_selector").on("change",function(){

	    	var state = $(this).find(':selected').data('stateId')
	    	var city = $(this).find(':selected').data('cityId')
	    	if(city){
	    		$("#city").val(city);
	    	}else{
	    		$("#city").val("");
	    	}
	    	if(state){
	    		$("#state").val(state);
	    	}else{
	    		$("#state").val("");
	    	}
	    	

	    });





		$(".reg_detail").click(function(){
		    if($('#maritial_status').val() == 0) { alert('maritial status can not be empty'); return false; }
		    else if($('#country_selector').val() == -1) { 
		      $("#error-msg").show();
		      $("#error-msg").html('<p class="alert alert-danger" id="top">Country cannot be empty</p>');
		      setTimeout(function() { $("#error-msg").hide();}, 3000)
		      return false; 

		    } else if($('#state_selector').val() == -1) {
		      // $('#error-msg').html('State cannot be empty'); 
		      // $('.error-alert').show();
		      // return false;
		      $("#error-msg").show();
		      $("#error-msg").html('<p class="alert alert-danger" id="top">State cannot be empty</p>');
		      setTimeout(function() { $("#error-msg").hide();}, 3000)
		      return false; 
		    } else if($('#city_selector').val() == -1) { 
		      $("#error-msg").show();
		      $("#error-msg").html('<p class="alert alert-danger" id="top">City cannot be empty</p>');
		      setTimeout(function() { $("#error-msg").hide();}, 3000)
		      return false;
		    }
		    else if($('#height').val() == 0) { alert('Height can not be empty'); return false; }
		 //   else if($('#weight').val() == 0) { alert('Weight can not be empty'); return false; } -->
		//	if($('#body_type').val() == 0) { alert('body type can not be empty'); return false; }
		//	if($('#complexion').val() == 0) { alert('complexion can not be empty'); return false; }
			if($('#physical_status').val() == 0) { alert('physical status can not be empty'); return false; }
			else if($('#image').val() == '') { alert('profile pic can not be empty.please upload your profile photo'); return false; }
		    else if($('#education').val() == 0) { 
		      $("#error-msg").show();
		      $("#error-msg").html('<p class="alert alert-danger" id="top">Education cannot be empty</p>');
		      setTimeout(function() { $("#error-msg").hide();}, 3000)
		      return false;
		    } else if($('#occupation').val() == 0) { 
		      $("#error-msg").show();
		      $("#error-msg").html('<p class="alert alert-danger" id="top">Occupation Living can not be empty</p>');
		      setTimeout(function() { $("#error-msg").hide();}, 3000)
		      return false; 
		    }
		//	else if($('#employed_in').val() == 0) { alert('employed in can not be empty'); return false; }
		/*	else if($('#currency-selector').val() == 0) { alert('currency selectoion can not be empty'); return false; }
			else if($('#income').val() == 0) { alert('income can not be empty'); return false; } 
				 */
			else if($('#gothram').val() == 0) { alert('gothram can not be empty'); return false; }
			else if($('#star').val() == 0) { alert('star can not be empty'); return false; }
		//	else if($('#padam').val() == 0) { alert('padam can not be empty'); return false; }
		 else if($('#family_status').val() == 0) { 
		      $("#error-msg").show();
		      $("#error-msg").html('<p class="alert alert-danger" id="top">family status  can not be empty</p>');
		      setTimeout(function() { $("#error-msg").hide();}, 3000)
		      return false; 
		    }

		/*	else if($('#family_type').val() == 0) { 
		      $("#error-msg").show();
		      $("#error-msg").html('<p class="alert alert-danger" id="top">family type  can not be empty</p>');
		      setTimeout(function() { $("#error-msg").hide();}, 3000)
		      return false; 
		    }

			else if($('#family_value').val() == 0) { 
		      $("#error-msg").show();
		      $("#error-msg").html('<p class="alert alert-danger" id="top">family value  can not be empty</p>');
		      setTimeout(function() { $("#error-msg").hide();}, 3000)
		      return false; 
		    }

			else if($('#family_origin').val() == 0) { alert('family origin can not be empty'); return false; }*/
			else if($('#family_location').val() == 0) { alert('family location can not be empty'); return false; }
			else if($('#father_status').val() == 0) { alert('father name can not be empty'); return false; }
			else if($('#mother_status').val() == 0) { alert('mother name can not be empty'); return false; }
			else if($('#placeofbirth').val() == 0) { alert('place of birth can not be empty'); return false; }
			else if($('#timeofbirth').val() == 0) { alert('time of birth can not be empty'); return false; }
		/*	else if($('#brothers').val().trim() == '') { alert('please fill brothers field'); return false; }
			else if($('#sisters').val().trim() == '') { alert('please fill sisters field'); return false; }  */


		/*
				
			        'family_origin'=> $data['family_origin'],
        'family_location'=> $data['family_location'],
        'father_status'=> $data['father_status'],
        'mother_status'=> $data['mother_status'],
        'brothers'=> $data['brothers'],
        'sisters'=> $data['sisters'],
		
			else if(($('#mid').val() != 'checked') &&($('#up').val() != 'checked')&&($('#rch').val() != 'checked')&&($('#affl').val() != 'checked'))
			{ alert('Family Status can not be empty'); return false; }
			else if(($('#jo').val() != 'checked') &&($('#nuc').val() != 'checked'))
			{ alert('Family type can not be empty'); return false; }
			else if(($('#ort').val() != 'checked') &&($('#trad').val() != 'checked')&&($('#mod').val() != 'checked')&&($('#lib').val() != 'checked'))
			{ alert('Family value can not be empty'); return false; }  */
			else if($('#about').val().length<150) { alert('Something About You can not be empty or cannot be lessthan 150 chars '); return false; }
		    else { }

		    // var value =$("#reg_detail_form").serialize();
		    // var info = <?php echo json_encode($this->session->userdata('email')); ?>;
		    // var email_id = info;
		    // $.ajax({
		    //     type: "POST",
		    //     url: base_url+'home/submit_registration_details',
		    //     data: value,
		    //     error: function (err) {
		    //         console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
		    //     },
		    //     success: function(data){
		    //       data = JSON.parse(data);
		    //         if(data==1){
		    //             $.post(base_url+"Verify/send_otp", { email_id: email_id }, function(data) { });
		    //             window.location.href= base_url+"Verify/";       
		    //         }
		    //     }
		    // });

		  });

	});
/*	function trimfield(str) 
{ 
    return str.replace(/^\s+|\s+$/g,''); 
} */
</script>