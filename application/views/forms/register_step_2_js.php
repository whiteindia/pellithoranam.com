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
		    
		    if($('#country-selector').val() == -1) { 
		      $("#error-msg").show();
		      $("#error-msg").html('<p class="alert alert-danger" id="top">Country cannot be empty</p>');
		      setTimeout(function() { $("#error-msg").hide();}, 3000)
		      return false; 

		    } else if($('#state-selector').val() == -1) {
		      // $('#error-msg').html('State cannot be empty'); 
		      // $('.error-alert').show();
		      // return false;
		      $("#error-msg").show();
		      $("#error-msg").html('<p class="alert alert-danger" id="top">State cannot be empty</p>');
		      setTimeout(function() { $("#error-msg").hide();}, 3000)
		      return false; 
		    } else if($('#city-selector').val() == 0) { 
		      $("#error-msg").show();
		      $("#error-msg").html('<p class="alert alert-danger" id="top">City cannot be empty</p>');
		      setTimeout(function() { $("#error-msg").hide();}, 3000)
		      return false;
		    }
		    else if($('#height').val() == 0) { alert('Height can not be empty'); return false; }
		    else if($('#weight').val() == 0) { alert('Weight can not be empty'); return false; }
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
		/*	else if($('#currency-selector').val() == 0) { alert('currency selectoion can not be empty'); return false; }
			else if($('#income').val() == 0) { alert('income can not be empty'); return false; }  */
			else if($('#gothram').val() == 0) { alert('gothram can not be empty'); return false; }
		/*	else if(($('#mid').val() != 'checked') &&($('#up').val() != 'checked')&&($('#rch').val() != 'checked')&&($('#affl').val() != 'checked'))
			{ alert('Family Status can not be empty'); return false; }*/
			else if(($('#jo').val() != 'checked') ||($('#nuc').val() != 'checked'))
			{ alert('Family type can not be empty'); return false; }
		/*	else if(($('#ort').val() != 'checked') &&($('#trad').val() != 'checked')&&($('#mod').val() != 'checked')&&($('#lib').val() != 'checked'))
			{ alert('Family value can not be empty'); return false; }  */
			else if($('#about').val().trim() == '') { alert('Something About You can not be empty'); return false; }
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