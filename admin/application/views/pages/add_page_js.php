<script src = "<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<!-- include summernote css/js -->
<link href="<?php echo base_url();?>assets/summernote/summernote.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/summernote/summernote.js"></script>

<script type="text/javascript">
	
		jQuery(function($){

			var editor = $('.content-editor').summernote({
				toolbar: [
				    // [groupName, [list of button]]
				    ['style', ['bold', 'italic', 'underline', 'clear']],
				    ['font', ['strikethrough', 'superscript', 'subscript']],
				    ['fontsize', ['fontsize']],
				    ['color', ['color']],
				    ['para', ['ul', 'ol', 'paragraph']],
				    ['height', ['height']],
				    ['insert', ['link','hr','table']],
				    ['misc', ['fullscreen','codeview','undo','redo']]
				  ],
				placeholder: 'Content here...',
				height: 400,
				callbacks: {
				    onInit: function() {
				        $("div.note-editor button.btn-codeview").click();
				    }
				}
			});


			


			
			$( "#ad_page" ).validate({
			  	rules: {
				    title: "required",
				    slug:{
				    	required : true
				    }
				},
			  	messages: {
			  		restaurant_name:"This value is required.",
			  		slug:{
			  			required: "This value is required."
			  		}
			  	},
				submitHandler: function(form) {
					var pslug=$(".url-slug");
			    	$.ajax({
	     				url: '<?php echo base_url('pages/check_slug')?>',
	     				type: 'post',
	     				dataType: 'html',
	     				data: {pslug: pslug.val()},
	     				success :function(data) {
		     				if(data=='true'){
		     					error_msg="Please Use Dffrent Slug!";
		     					$(".pslug-error").html(error_msg).fadeIn(2000).fadeOut(3000);
		     				}else{
		     					if ($(".content-editor").summernote('codeview.isActivated')) {
		     					    $(".content-editor").summernote('codeview.deactivate'); 
		     					}
		     					form.submit();
		     				}
		     			}
		     		});
				}
			});
			$( "#edit_page" ).validate({
			  	rules: {
				    title: "required",
				    slug:{
				    	required : true
				    }
				},
			  	messages: {
			  		restaurant_name:"This value is required.",
			  		slug:{
			  			required: "This value is required."
			  		}
			  	},
				submitHandler: function(form) {
					var pslug=$(".url-slug");
					var pid=$("#pid");
			    	$.ajax({
	     				url: '<?php echo base_url('pages/check_slug_edit')?>',
	     				type: 'post',
	     				dataType: 'html',
	     				data: {pslug: pslug.val(),pid:pid.val()},
	     				success :function(data) {
		     				if(data=='true'){
		     					error_msg="Please Use Dffrent Slug!";
		     					$(".pslug-error").html(error_msg).fadeIn(2000).fadeOut(3000);
		     				}else{
		     					if ($(".content-editor").summernote('codeview.isActivated')) {
		     					    $(".content-editor").summernote('codeview.deactivate'); 
		     					}
		     					form.submit();

		     					
		     				}
		     			}
		     		});
				}
			});
			$("#title").on("keyup blur",function(event) {
				/* Act on the event */
				var str=$(this).val()
				str = str.replace(/[\s\t\n\r\)\*\$\%\&\#\@\!\^\+\=\?\>\<\"\'\]\}\{\[\|\\]/g, '-').toLowerCase();
				$(".url-slug").val(str)
			});
			$(".url-slug").on("blur",function(event) {
				/* Act on the event */
				var str=$(this).val()
				str = str.replace(/[\s\t\n\r\)\*\$\%\&\#\@\!\^\+\=\?\>\<\"\'\]\}\{\[\|\\]/g, '-').toLowerCase();
				$(".url-slug").val(str)
			});
			
		});
// url-slug
</script>
<style type="text/css">
	.pslug-error{color: red;font-weight: 600;display: none;}
	.error{color: red;font-weight: 600;}
</style>