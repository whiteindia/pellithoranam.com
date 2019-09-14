<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Packages Details
      </h1>
<!--       <div> <br>
<a href="<?php echo base_url(); ?>Packages/add_packages"><button class="btn btn-sm btn-primary" type="button"><b><i class="fa fa-fw fa-edit"></i> Edit</b></button></a>
   
&emsp;<a href="<?php echo base_url(); ?>Packages/delete_manage_package" onClick="return doconfirm()"><button class="btn btn-sm btn-danger" type="button"><b><i class="fa fa-fw fa-trash"></i> Delete</b></button></a>
    </div> -->
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
   <!--       <li><a href="<?php echo base_url(); ?>Home_ctrl/view_subcategory">Package Details</a></li> -->
         <li class="active">Package Details</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->

         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Package Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			   

                  <div class="box-body">
                     <div class="col-md-8">
                       <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">
                             <div class="form-group col-md-12">
                          <label>Select Package</label>
              <select class="form-control select2 required"  style="width: 100%;" id="package_name" name="id">
                   <?php
                   if($result) {
                    foreach($result as $package){
                     
                    
                   ?>
            <option value="<?php echo $package->id;?>"><?php echo $package->package_name; ?></option>
                   <?php
                   }
                   }
                   ?>
                            </select>
                        </div>
                        <div class="col-md-12"  style="padding:0 !important">
                          <div class="form-group has-feedback col-md-6">
                             <label for="exampleInputEmail1">Alternative Mobile</label><br>
                            <input type="radio" name="alt_mobile" value="1"  class="alt_mobile"> Yes
                            <input type="radio" name="alt_mobile" value="0" checked class="alt_mobile"> No
                          </div>
                        </div>
                        <div class="col-md-12" style="padding:0 !important"> 
                        <div class="form-group has-feedback col-md-6">
                           <label for="exampleInputEmail1">Send Intrest</label><br>
                          <input type="radio" name="intrest" value="1" checked class="intrest"> Yes
                          <input type="radio" name="intrest" value="0" class="intrest"> No
                        </div> 
                        <div class="col-md-6">
                           <label for="exampleInputEmail1">Per Month</label>
                            <input type="text" class="form-control"  
                            data-parsley-minlength="2"  data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="intrest_permonth" id="intrest_permonth">
                        </div>
                        </div>

                        <div class="col-md-12" style="padding:0 !important">
                        <div class="form-group has-feedback col-md-6">
                           <label for="exampleInputEmail1">personalized Message</label><br>
                          <input type="radio" name="personalized_msg" value="1" checked class="personalized_msg">  Yes
                          <input type="radio" name="personalized_msg" value="0" class="personalized_msg"> No
                        </div> 
                        <div class="col-md-6">
                           <label for="exampleInputEmail1">Per Month</label>
                            <input type="text" class="form-control required"  
                            data-parsley-minlength="2"  data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="personalized_msg_permonth" id="personalized_msg_permonth">
                        </div>
                        </div>
                         <div class="col-md-12" style="padding:0 !important">
                        <div class="form-group has-feedback col-md-6">
                           <label for="exampleInputEmail1">Access verified mobile numbers</label><br>
                          <input type="radio" name="verified_mob" value="1" checked class="verified_mob"> Yes
                          <input type="radio" name="verified_mob" value="0" class="verified_mob"> No
                        </div> 
                        <div class="col-md-6">
                           <label for="exampleInputEmail1">Per Month</label>
                            <input type="text" class="form-control required" 
                            data-parsley-minlength="2"  data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="verified_mob_permonth" id="verified_mob_permonth">
                        </div>
                        </div>
                           <div class="col-md-12" style="padding:0 !important">
                        <div class="form-group has-feedback col-md-6">
                           <label for="exampleInputEmail1">Send SMS</label><br>
                          <input type="radio" name="send_sms" value="1" checked class="send_sms"> Yes
                          <input type="radio" name="send_sms" value="0" class="send_sms"> No
                        </div> 
                        <div class="col-md-6">
                           <label for="exampleInputEmail1">Per Month</label>
                            <input type="text" class="form-control required"   
                            data-parsley-minlength="2"  data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="send_sms_permonth" id="send_sms_permonth">
                        </div>
                        </div>
                       <div class="col-md-12" style="padding:0 !important">
                        <div class="form-group has-feedback col-md-6">
                           <label for="exampleInputEmail1">Chat instantly with prospects</label><br>
                          <input type="radio" name="chat_instantly" value="1" checked class="chat_instantly"> Yes
                          <input type="radio" name="chat_instantly" value="0" class="chat_instantly"> No
                        </div> 
                        <div class="col-md-6" style="padding:0 !important">
                           <label for="exampleInputEmail1">Per Month</label>
                            <input type="text" class="form-control required"   
                            data-parsley-minlength="2"  data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="chat_instantly_permonth" id="chat_instantly_permonth">
                        </div>
                        </div>
					<div class="col-lg-12  col-md-12">						
                       <div class="form-group">
                           <label for="exampleInputEmail1">Profile Highlighter:</label><br>
                          <input type="radio" name="profile_highligher" value="1" checked> Yes
                          <input type="radio" name="profile_highligher" value="0"> No
                        </div>
                           <div class="form-group">
                           <label for="exampleInputEmail1">Personal Relationship Manager:</label><br>
                          <input type="radio" name=" personal_relationship_manager" value="1" checked> Yes
                          <input type="radio" name="personal_relationship_manager" value="0"> No
                        </div> 
                             <div class="form-group">
                           <label for="exampleInputEmail1">Priority in search results</label><br>
                          <input type="radio" name="priority_search" value="1" checked> Yes
                          <input type="radio" name="priority_search" value="0"> No
                        </div>
                             <div class="form-group">
                           <label for="exampleInputEmail1">Profile tagged as paid member </label><br>
                          <input type="radio" name="profile_tagged" value="1" checked> Yes
                          <input type="radio" name="profile_tagged" value="0"> No
                        </div>    
		                      <div class="form-group">
                           <label for="exampleInputEmail1">Prominent display in search results </label><br>
                          <input type="radio" name="prominent_display" value="1" checked> Yes
                          <input type="radio" name="prominent_display" value="0"> No
                        </div>  
                            <div class="form-group">
                           <label for="exampleInputEmail1">SMS Alerts: </label><br>
                          <input type="radio" name="sms_alert" value="1" checked> Yes
                          <input type="radio" name="sms_alert" value="0"> No
                        </div>  
                        <div class="form-group">
                           <label for="exampleInputEmail1">Enhanced Privacy: </label><br>
                          <input type="radio" name="enhanced_privacy" value="1" checked> Yes
                          <input type="radio" name="enhanced_privacy" value="0"> No
                        </div>  
                        <div class="form-group">
                           <label for="exampleInputEmail1">View Social and Professional profile  </label><br>
                          <input type="radio" name="view_social_profiles" value="1" checked> Yes
                          <input type="radio" name="view_social_profiles" value="0"> No
                        </div> 
						</div>
					    <div class="box-footer pull-right">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>  
                     </form>           
                        </div>                    
            <div class="col-md-4" style="background-color:#ededed;">
              <center></center><label><u>Note:</u></label></center><br>
              <label><u>Per Month</u></label>
              <p>0 - Unlimited</p>
              <p>3 - 3 Months</p>
              <p>24 - 2 Years</p>
            </div>
            
            </div>
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

<script type="text/javascript">
 $(".intrest").click(function(){ 
var selector=$("input[name=intrest]:checked").val();
if(selector=='0'){
  $("#intrest_permonth").attr("disabled", "disabled"); 
} else {
            $("#intrest_permonth").removeAttr("disabled"); 
          
        }
});
$(".personalized_msg").click(function(){ 
var selector=$("input[name=personalized_msg]:checked").val();
if(selector=='0'){
  $("#personalized_msg_permonth").attr("disabled", "disabled"); 
} else {
            $("#personalized_msg_permonth").removeAttr("disabled"); 
          
        }
});
$(".verified_mob").click(function(){ 
var selector=$("input[name=verified_mob]:checked").val();
if(selector=='0'){
  $("#verified_mob_permonth").attr("disabled", "disabled"); 
} else {
            $("#verified_mob_permonth").removeAttr("disabled"); 
          
        }
});
$(".send_sms").click(function(){ 
var selector=$("input[name=send_sms]:checked").val();
if(selector=='0'){
  $("#send_sms_permonth").attr("disabled", "disabled"); 
} else {
            $("#send_sms_permonth").removeAttr("disabled"); 
          
        }
});
$(".chat_instantly").click(function(){ 
var selector=$("input[name=chat_instantly]:checked").val();
if(selector=='0'){
  $("#chat_instantly_permonth").attr("disabled", "disabled"); 
} else {
            $("#chat_instantly_permonth").removeAttr("disabled"); 
          
        }
});
</script>