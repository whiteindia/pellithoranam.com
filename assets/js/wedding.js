
/*  Commmon js functions that are used in multiple pages*/


/* Send Interest*/
$(".send_interest").click(function(){
    var matri_id = $(this).attr('matr_id');
    var proc_name = $(this).attr('proc_name');
    var passdata_1 = 'matr_id='+ matri_id;
    $(this).html('Interested');

    $.ajax({
    type: "POST",
    url : base_url+'profile/send_interest',
    data:  passdata_1,
    success: function(data){
            data = JSON.parse(data);
            if(data == "success") {
              $.post(base_url+"Verify/intrest_success", { matri_id: matri_id }, function(data) { });
              var main_msg ="Your interest has been sent to "+proc_name+"'s [T"+matri_id+"].";
              var sub_msg ="Wait for "+proc_name+" responce.";
            } else {
              var main_msg ="Sorry, Your Interest Limit Exceeded";
              var sub_msg ="Upgrade your profile to send Unlimited Interests";
            }
            var modal = showModal(main_msg,sub_msg,matri_id);
            $('body').append(modal);
            $('#common-modal-'+matri_id).modal('show');
        }
    });
});

$("body").on("click",".shortlist",function(){
    var matri_id = $(this).attr('matr_id');
    var proc_name = $(this).attr('proc_name');
    var passdata_2 = 'matr_id='+ matri_id;
    var $this = $(this);
    

    $.ajax({
    type: "POST",
    url : base_url+'profile/shortlist',
    data:  passdata_2,
    success: function(data){
          var main_msg = proc_name+" [SM"+matri_id+"] has been shortlisted.";
          var sub_msg ="Add more matches to your shortlist.";
          var modal = showModal1(main_msg,sub_msg,matri_id);
          $('#common-modal1-'+matri_id).remove();
          $('body').append(modal);
          $('#common-modal1-'+matri_id).modal('show');
          var $elm = $('button[class="wed-shortlist shortlist"][matr_id="'+matri_id+'"]');
          $elm.html('Shortlisted');
          $elm.removeClass('shortlist').addClass('remove-shortlist');
        }
    });

});

$("body").on("click",".remove-shortlist",function(){
    var matri_id = $(this).attr('matr_id');
    var proc_name = $(this).attr('proc_name');
    var passdata_2 = 'matr_id='+ matri_id;
    var $this = $(this);

    $.ajax({
    type: "POST",
    url : base_url+'profile/remove_shortlist',
    data:  passdata_2,
    success: function(data){
          var main_msg = proc_name+" [SM"+matri_id+"] has been remove from shortlist.";
          var sub_msg ="Add new matches to your shortlist.";
          var modal = showModal1(main_msg,sub_msg,matri_id);
          $('#common-modal1-'+matri_id).remove();
          $('body').append(modal);
          $('#common-modal1-'+matri_id).modal('show');

          var $elm = $('button[class="wed-shortlist remove-shortlist"][matr_id="'+matri_id+'"]');
          $elm.html('Short List');
          $elm.removeClass('remove-shortlist').addClass('shortlist');
        }
    });

});

$('.send_all').on('click',function(){
  $.ajax({
    type: "POST",
    url : base_url+'profile/interest_all',
    success: function(data){
      data = $.trim(JSON.parse(data));
      
      //return;
          if(data=="success"){
            $('#profile_msg').fadeIn();
            $('#profile_msg').html('<p class="alert-success alert">Interest sent successfully</p>');

            setTimeout(function(){
              $('#profile_msg').fadeOut();
              window.location.reload();
            },3000);
          } else if(data=="failed"){
              $('#profile_msg').html('Interest sent failed. Please Upgrade Account');
              setTimeout(function(){
              $('#profile_msg').fadeOut();
            },3000);
          } else {
            alert('asdasdas');
            //window.location.href= base_url;
          }
        }
    });
})



/********************************Change Password**********************************/

/*$(".change_password").click(function(){

    //if($('#password_form').parsley().validate()){

      var value =$("#password_form").serialize() ;
        $.ajax({
          type: "POST",
          url: base_url+'Settings/change_password',
          data: value,
          success: function(data){
          $(".change_msg").html("");
          $('.change_msg').fadeIn();
              if(data==1){
                $('.change_msg').html('Password Successfully Updated');
                setTimeout(function(){
                }, 1000);

              }else if(data==2){
              $('.change_msg').html('Password did not match').delay(1000).fadeOut();
                setTimeout(function(){
                }, 1000);
              }else{
              $('.change_msg').html('Invalid Password').delay(1000).fadeOut();
                setTimeout(function(){
                }, 1000);
              }
          }
      });

  //  }
});*/

function showModal(main_msg,sub_msg,matri_id) {
    var modal='<div class="modal fade wed-add-modal" id="common-modal-'+matri_id+'" role="dialog"> <div class="modal-dialog wed-add-modal-dialogue"> <div class="modal-content wed-add-modal-content"> <div class="modal-body wed-add-modal-body"> <button type="button" class="close" data-dismiss="modal">&times;</button> <h4>'+main_msg+'</h4> <p>'+sub_msg+'</p><div class="wed-add-modal-footer"></div></div></div></div></div>';
    return modal;
}
function showModal1(main_msg,sub_msg,matri_id) {
    var modal='<div class="modal fade wed-add-modal" id="common-modal1-'+matri_id+'" role="dialog"> <div class="modal-dialog wed-add-modal-dialogue"> <div class="modal-content wed-add-modal-content"> <div class="modal-body wed-add-modal-body"> <button type="button" class="close" data-dismiss="modal">&times;</button> <h4>'+main_msg+'</h4> <p>'+sub_msg+'</p><div class="wed-add-modal-footer"></div></div></div></div></div>';
    return modal;
}

function showSendMailModal(main_msg,sub_msg,matri_id) {
    var modal='<div class="modal fade wed-add-modal" id="common-modal2-'+matri_id+'" role="dialog"> <div class="modal-dialog wed-add-modal-dialogue"> <div class="modal-content wed-add-modal-content"> <div class="modal-body wed-add-modal-body"> <button type="button" class="close" data-dismiss="modal">&times;</button> <h4>'+main_msg+'</h4> <p>'+sub_msg+'</p><div class="wed-add-modal-footer"></div></div></div></div></div>';
    return modal;
}






$(".payment").on('click', function () {    
	var id = $(this).data('id');
	$("#packageid").val(id);
	
			
			
				$('#container div').each(function() {
				   $(this).append('<a id="' + $(this).attr('class') + '" />');
				});

				$('a').click(function(e) {
					e.preventDefault();
					
					var scrollto = $(this).attr('href');
					$('html, body').animate({
							scrollTop: $(scrollto).offset().top
						}, 500);
				});
			
			
			
			
			
    });
	
	
	

	
