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
        Websettings
      </h1>
      <br>
    <div> 
      <!-- <a href="<?php echo base_url(); ?>Settings_ctrl/web_settings"><button class="btn add-new" type="button"><b><i class="fa fa-fw fa-plus"></i> Add New</b></button></a> -->
    </div>

      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li class="active">Websettings</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <?php
               if($this->session->flashdata('message')) {
                        $message = $this->session->flashdata('message');
               
                     ?>
            <div class="alert alert-<?php echo $message['class']; ?>">
               <button class="close" data-dismiss="alert" type="button">×</button>
               <?php echo $message['message']; ?>
            </div>
            <?php
               }
               ?>
         </div>
         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Websettings</h3>
               </div>
               <!-- /.box-header -->
               <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
               <div class="box-body">
                  <div class="col-md-6">

                     <div class="form-group">
                        <label class="intrate">Title</label>
                        <input class="form-control required regcom" type="text" name="title" data-parsley-trigger="keyup" required="" id="smtp_username" value="<?php echo $result->title; ?>">
                     </div>

                     <div class="form-group">
                        <label class="intrate">Smtp Username</label>
                        <input class="form-control required regcom" type="text" name="smtp_username" data-parsley-trigger="keyup" required="" id="smtp_username" value="<?php echo $result->smtp_username; ?>">
                     </div>   

                     <div class="form-group">
                        <label  class="intrate">Smtp Host</label>
                        <input   class="form-control regcom required" type="text" name="smtp_host" data-parsley-trigger="keyup" required="" id="smtp_host" value="<?php echo $result->smtp_host; ?>" >
                     </div>

                     <div class="form-group">
                        <label  class="intrate">Smtp Password</label>
                        <input   class="form-control regcom required" type="text" name="smtp_password" data-parsley-trigger="keyup" required="" id="smtp_password" value="<?php echo $result->smtp_password; ?>" >
                     </div>

                     <div class="form-group">
                        <label  class="intrate">Admin Email</label>
                        <input  class="form-control regcom required" type="text" name="admin_email" data-parsley-trigger="keyup" required="" id="admin_email" value="<?php echo $result->admin_email; ?>" >
                     </div>

                     <div class="form-group">
                        <label  class="intrate">User Id prefix</label>
                        <input  class="form-control regcom required" type="text" name="id_prefix" data-parsley-trigger="keyup" required="" id="admin_email" value="<?php echo $result->id_prefix; ?>" >
                     </div>

                  </div>

                  <div class="col-md-6">

                     <div class="form-group">
                        <label  class="intrate">Sender Id</label>
                        <input  class="form-control regcom required" type="text" name="sender_id" data-parsley-trigger="keyup" required="" id="sender_id" value="<?php echo $result->sender_id; ?>" >
                     </div>

                     <div class="form-group">
                        <label  class="intrate">Sms username</label>
                        <input  class="form-control regcom required" type="text" name="sms_username" data-parsley-trigger="keyup" required="" id="sms_username" value="<?php echo $result->sms_username; ?>" >
                     </div>

                     <div class="form-group">
                        <label  class="intrate">Sms Password</label>
                        <input   class="form-control regcom required" type="text" name="sms_password" data-parsley-trigger="keyup" required="" id="sms_password" value="<?php echo $result->sms_password; ?>" >
                     </div>

                     <div class="form-group">
                        <label  class="intrate">Fav Icon</label>
                        <input name="icon" class="" accept="image/*" type="file">
                        <img src="<?php echo $result->icon; ?>" width="25px" height="25px" alt="Picture Not Found"/>
                     </div>   

                     <div class="form-group has-feedback">
                        <label for="exampleInputEmail1">Logo</label>
                        <input name="logo" class="" accept="image/*" type="file">
                        <img src="<?php echo $result->logo; ?>" width="100px" height="100px" alt="Picture Not Found"/>
                     </div>                        

                  </div>

                  <div class="col-md-12">
                     <div class="form-group">
                     <input type="submit" class="btn btn-primary" value="Save">                      
                     </div>
                  </div>

               </div><!-- /.box-body -->
            </form>
               
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<div class="modal fade modal-wide" id="popup-subcatgetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View Subcategory Details</h4>
         </div>
         <div class="modal-subcatbody">
         </div>
         <div class="business_info">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
