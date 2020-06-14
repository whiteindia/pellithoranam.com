
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js"></script>
<head>
   <style>
   input.parsley-error, select.parsley-error, textarea.parsley-error {
      width:100% !important;
   }
   </style>
</head>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Change Password
      </h1>
      <br>
    <div> 
      <!-- <a href="<?php echo base_url(); ?>Settings_ctrl/web_settings"><button class="btn add-new" type="button"><b><i class="fa fa-fw fa-plus"></i> Add New</b></button></a> -->
    </div>

      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li class="active">Change Password</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">

         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Change Password</h3>
               </div>
               <!-- /.box-header -->
               <div  class="bg-info">
              <div class="wed-space"></div>
              <h4>Change Password</h4>
              <p>Your password must have a minimum of 6 characters. We recommend you <br>
  choose an alphanumeric password:::<?php  echo $_SESSION['data'];  ?></p>
              <form method="post" id="password_form">
              <div class="wed-setting-inner">
              <input type="hidden" name="uid" value="<?php echo $_SESSION['data']; ?>">
                <input class="form-control" type="password" placeholder="Current Password" name="crnt_password"><br>
                <input class="form-control" type="password" placeholder="New Password" name="new_password"><br>
                <input class="form-control" type="password" placeholder="Confirm New Password" name="conf_password"><br>
                <div class="wed-space"></div>
                <div class="change_pass_msg"></div>
                <div class="wed-settings-save change_password btn btn-primary">Change Password</div>
                <div class="wed-settings-reset btn btn-danger">Reset</div>
                  <div class="wed-space"></div>
              </div>
              </form>
            </div>
               
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<script>
 $(".change_password").click(function() {
        if($('#password_form').parsley().validate()) {
          var value =$("#password_form").serialize();
          var link = "update_password"; 
          var msg_class = "change_pass_msg";
          runSettingsRequest(link,value,msg_class);
        }
    });



  function runSettingsRequest(link,value,msg_class) {
    $.ajax({
      type: "POST",
    //  url: base_url+'settings/'+link,
    url:'<?php echo "pellithoranam.com/admin/login/update_password"; ?>',
      data: value,
      cache: false,
      error: function (err) {
          console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
      },
      success: function(datas){
          data1 = JSON.parse(datas);
          $("."+msg_class).html("");
          $("."+msg_class).fadeIn();
          $("."+msg_class).html(data1.msg);
          $("."+msg_class).fadeOut(4000);   
      }
    });
  }




</script>