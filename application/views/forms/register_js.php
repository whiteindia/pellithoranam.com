<script src = "<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script type="text/javascript">
		jQuery(function($){
			// jQuery.validator.setDefaults({
			//   debug: true,
			//   success: "valid"
			// });
			$.validator.addMethod("valueNotEquals", function(value, element, arg){
			 return arg != value;
			}, "Value must not equal arg.");
			$( "#register_form" ).validate({
				debug: false,
		        //focusInvalid: false,
		        //onfocusout: false,
		        onkeyup: false,
		        onclick: false,
			  rules: {
				   profile_for:{
				    	required : true,
				    	valueNotEquals : '-1'
				    }, 
				    name: "required",
				    surname: "required",
				    dob: {
				      required: true,
				      date: true
				    },
				    phone: {
				      required: true,
				      maxlength: 10,
				      remote: "<?php echo site_url();?>/home/check_phone"
				    },
				    email: {
			          required: true,
			          email: true,
			          remote: "<?php echo site_url();?>/home/check_email"
			        },
			        mother_tongue:{
				    	required : true,
				    	valueNotEquals : '-1'
				    },
			        religion:{
				    	required : true,
				    	valueNotEquals : '-1'
				    },
			        cast:{
				    	required : true,
				    	valueNotEquals : '-1'
				    }
				    
				},
			  messages: {
			  	profile_for:{
	  			  		required: "whom you are creating the profile for!",
	  			  		valueNotEquals: "whom you are creating the profile for!"
			  	},
			  	name:"Fill Name!",
			  	surname:"Fill surname!",
			  	dob: {
			  	  required: "Required Date of birth!",
			  	  date: "Please insert proper date!"
			  	},
			  	phone: {
			  	  required: "Required Mobile No!",
			  	  maxlength: "Maxlength 10.",
			  	  remote: "User with this phone already exist."
			  	},
			  	email: {
			  	    required: "Required Email!",
			  	    remote: "User with this email already exist."
			  	},
			  	mother_tongue:{
	  			  		required: "Required Mother Tongue!",
	  			  		valueNotEquals: "Required Mother Tongue!"
			  	},
			  	religion:{
	  			  		required: "Required Religion!",
	  			  		valueNotEquals: "Required Religion!"
			  	},
			  	cast:{
	  			  		required: "Required Cast!",
	  			  		valueNotEquals: "Required Cast!"
			  	}
			  	
			  	},
		  		submitHandler: function(form) {
		  			var value =$( "#register_form" ).serialize();
		  			if($("#i_read").is(':checked')){
  							$.ajax({
	  				              type: "POST",
	  				              url: base_url+'home/customer_registration',
	  				              data: value,
	  				              error: function (err) {
	  				            		console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
	  				            	},
	  				              success: function(data) {
	  				              	data = JSON.parse(data);
	  				              	if(data==1){
	  				                		window.location.href= base_url+"home/registration_details";
	  				              	}
	  				              	else if(data==2){
	  				                		$('.error').html('Phone number already exist');
	  				              	}
	  				              	else {
	  				                		$('.error').html('Email already exist');
	  				              	}
	  				          	}
	  				      	});
  						}else{
  							alert("Please Agree Before submit.");
  							$("#i_read").focus();
  						}
		  			
		  	
		  		}
			});
			$('.datepicker').datepicker({
	          changeMonth: true,
	          changeYear: true,
	          dateFormat: "yy-mm-dd",
	          yearRange: "1970:2000"
	      	});
	      	$(".religion-selector").on('change', function () {
		        var valueSelected = $(this).val();
		        var passdata_1 = 'rlgn_sel='+ valueSelected;

		        $.ajax({
		        type: "POST",
		        url : '<?php echo base_url(); ?>home/getCaste',
		        data:  passdata_1,
		        success: function(data){
		                $(".caste-selector").html(data);
		            }
	        	});
    		});

		});

			
	   //  $(document).on("click","#register",function() {
	   //      if($('#register_form').parsley().validate()) {

	   //          var value =$("#register_form").serialize();
	   //          $.ajax({
	   //              type: "POST",
	   //              url: base_url+'home/customer_registration',
	   //              data: value,
	   //              error: function (err) {
	   //            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
	   //            },
	   //              success: function(data) {
	   //              data = JSON.parse(data);
	   //              if(data==1){
	   //                window.location.href= base_url+"home/registration_details";
	   //              }
	   //              else if(data==2){
	   //                $('.error').html('Phone number already exist');
	   //              }
	   //              else {
	   //                $('.error').html('Email already exist');
	   //              }
	   //          }
	   //      });

	   //    }
	      
	   //     else{
			 //  $('.error').html('Please Agree T&C and Privacy Policy');
		  // }
	      
	   //  });
	   jQuery(function($){
			// jQuery.validator.setDefaults({
			//   debug: true,
			//   success: "valid"
			// });
			$.validator.addMethod("valueNotEquals", function(value, element, arg){
			 return arg != value;
			}, "Value must not equal arg.");
			$( "#register_form_bulk" ).validate({
				debug: false,
		        //focusInvalid: false,
		        //onfocusout: false,
		        onkeyup: false,
		        onclick: false,
			  rules: {
				   profile_for:{
				    	required : true,
				    	valueNotEquals : '-1'
				    }, 
				    name: "required",
				    surname: "required",
				    dob: {
				      required: true,
				      date: true
				    },
				    phone: {
				      required: true,
				      maxlength: 10,
				      remote: "<?php echo site_url();?>/home/check_phone"
				    },
				    email: {
			          required: true,
			          email: true,
			          remote: "<?php echo site_url();?>/home/check_email"
			        },
			        mother_tongue:{
				    	required : true,
				    	valueNotEquals : '-1'
				    },
			        religion:{
				    	required : true,
				    	valueNotEquals : '-1'
				    },
			        cast:{
				    	required : true,
				    	valueNotEquals : '-1'
				    }
				    
				},
			  messages: {
			  	profile_for:{
	  			  		required: "whom you are creating the profile for!",
	  			  		valueNotEquals: "whom you are creating the profile for!"
			  	},
			  	name:"Fill Name!",
			  	surname:"Fill surname!",
			  	dob: {
			  	  required: "Required Date of birth!",
			  	  date: "Please insert proper date!"
			  	},
			  	phone: {
			  	  required: "Required Mobile No!",
			  	  maxlength: "Maxlength 10.",
			  	  remote: "User with this phone already exist."
			  	},
			  	email: {
			  	    required: "Required Email!",
			  	    remote: "User with this email already exist."
			  	},
			  	mother_tongue:{
	  			  		required: "Required Mother Tongue!",
	  			  		valueNotEquals: "Required Mother Tongue!"
			  	},
			  	religion:{
	  			  		required: "Required Religion!",
	  			  		valueNotEquals: "Required Religion!"
			  	},
			  	cast:{
	  			  		required: "Required Cast!",
	  			  		valueNotEquals: "Required Cast!"
			  	}
			  	
			  	},
		  		submitHandler: function(form) {
		  			var value =$( "#register_form_bulk" ).serialize();
		  			if($("#i_read").is(':checked')){
  							$.ajax({
	  				              type: "POST",
	  				              url: base_url+'home_bulk/customer_registration_bulk',
	  				              data: value,
	  				              error: function (err) {
	  				            		console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
	  				            	},
	  				              success: function(data) {
	  				              	data = JSON.parse(data);
	  				              	if(data==1){
	  				                		window.location.href= base_url+"home_bulk/registration_details_bulk";
	  				              	}
	  				              	else if(data==2){
	  				                		$('.error').html('Phone number already exist');
	  				              	}
	  				              	else {
	  				                		$('.error').html('Email already exist');
	  				              	}
	  				          	}
	  				      	});
  						}else{
  							alert("Please Agree Before submit.");
  							$("#i_read").focus();
  						}
		  			
		  	
		  		}
			});
			$('.datepicker').datepicker({
	          changeMonth: true,
	          changeYear: true,
	          dateFormat: "yy-mm-dd",
	          yearRange: "1960:2000"
	      	});
	      	$(".religion-selector").on('change', function () {
		        var valueSelected = $(this).val();
		        var passdata_1 = 'rlgn_sel='+ valueSelected;

		        $.ajax({
		        type: "POST",
		        url : '<?php echo base_url(); ?>home/getCaste',
		        data:  passdata_1,
		        success: function(data){
		                $(".caste-selector").html(data);
		            }
	        	});
    		});

		});
</script>