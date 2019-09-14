<script src = "<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script type="text/javascript">
	jQuery(function($){
		$.validator.addMethod("valueNotEquals", function(value, element, arg){
			 return arg != value;
			}, "Value must not equal arg.");
		$( "#edit_form" ).validate({
			debug: false,
		    //focusInvalid: false,
		    //onfocusout: false,
		    onkeyup: false,
		    onclick: false,
			rules: {
				maritial_status:{
					required : true,
					valueNotEquals : '-1'
				},
				height_id:{
					required : true,
					valueNotEquals : '-1'
				}
			},
			messages: {
				maritial_status:{
					required : "Must Choose Maritial Status!",
					valueNotEquals : "Must Choose Maritial Status!"
				},
				height_id:{
					required : "Must Choose Height!",
					valueNotEquals : "Must Choose Height!"
				}
			},
		  	submitHandler: function(form) {
		  		var value =$("#edit_form").serialize();
		  		console.log(value);
		  		$.ajax({
		  		    type: "POST",
		  		    url: base_url+'Home/update_profile',
		  		    data: value,
		  		    error: function (err) {
		  		        //alert(err);
		  		        console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
		  		    },
		  		    success: function(data) {
		  		        //alert(data);
		  		      console.log(data);
		  		    }
		  		});
		  		return true;
		  	}
		});

		$( "#prof_form" ).validate({
			debug: false,
		    //focusInvalid: false,
		    //onfocusout: false,
		    onkeyup: false,
		    onclick: false,
			rules: {
				education_id:{
					required : true,
					valueNotEquals : '-1'
				}
			},
			messages: {
				education_id:{
					required : "Must Choose Education!",
					valueNotEquals : "Must Choose Education!"
				}
			},
		  	submitHandler: function(form) {
		  		var value =$("#prof_form").serialize();
		  		console.log(value);
		  		$.ajax({
		  		    type: "POST",
		  		    url: base_url+'Home/update_profile',
		  		    data: value,
		  		    error: function (err) {
		  		        console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
		  		    },
		  		    success: function(data) {
		  		      console.log(data);
		  		    }
		  		});
		  		return true;
		  	}
		});

		$( "#mob_form" ).validate({
			debug: false,
		    //focusInvalid: false,
		    //onfocusout: false,
		    onkeyup: false,
		    onclick: false,
			rules: {
				phone:{
					required : true,
					number: true
				},
				alt_mobile_no:{
					required : false,
					number: true
				}
			},
			messages: {
				phone:{
					required : 'Must Provie Phone!',
					number : "Must Enter Numbers!"
				},
				alt_mobile_no:{
					number : "Must Enter Numbers!"
				}
			},
		  	submitHandler: function(form) {
		  		var value =$("#mob_form").serialize();
		  		$.ajax({
		  		    type: "POST",
		  		    url: base_url+'home/update_mobile',
		  		    data: value,
		  		    error: function (err) {
		  		        console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
		  		    },
		  		    success: function(data) {
		  		    }
		  		});
		  		return true;
		  	}
		});
		// $(document).on("click","#prof_mob_btn",function() {
		   
		//         var value =$("#mob_form").serialize();
		//         $.ajax({
		//             type: "POST",
		//             url: base_url+'home/update_mobile',
		//             data: value,
		//             error: function (err) {
		//                 console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
		//             },
		//             success: function(data) {
		//             }
		//         });
		// });

		$("#alt-mobile-number").intlTelInput();
		

		$(document).on("click","#prof_mob_edit",function() {
		    $('.edit-phone-form').show();
		    $('#prof_mob_btn').show();
		    $('#prof_mob_edit > img').hide();
		    $('.prof_mob_text').hide();
		});



	});
</script>
<style type="text/css">
	.error {color: #bd4f4f;}
</style>