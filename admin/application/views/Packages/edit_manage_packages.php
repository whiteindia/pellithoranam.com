<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Packages Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li class="active">Package Details</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Package Details</h3>
               </div>

              <!-- form start -->
                <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-12">
                          <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Package Name</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"  
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="package_name"  value="<?php echo $data->package_name; ?>" readonly="readonly">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
                      </div>

                       <div class="col-md-8">
                          <div class="col-md-12">
                            <div class="form-group has-feedback col-md-6">
                               <label for="exampleInputEmail1">Alternative Mobile</label><br>
                              <input type="radio" name="alt_mobile" value="1"  class="alt_mobile" <?php echo ($data->alt_mobile== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="alt_mobile" value="0"  <?php echo ($data->alt_mobile== '0') ?  "checked" : "" ;  ?> class="alt_mobile"> No
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group has-feedback col-md-4">
                              <label for="exampleInputEmail1">Send Intrest</label><br>
                              <input type="radio" name="intrest" value="1" <?php echo ($data->intrest== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="intrest" value="0" <?php echo ($data->intrest== '0') ?  "checked" : "" ;  ?>> No
                            </div> 
                            <div class="col-md-6">
                              <label for="exampleInputEmail1">Count</label>
                              <input type="text" class="form-control required" data-parsley-trigger="change"  
                                data-parsley-minlength="2"  data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name=" intrest_permonth" value="<?php echo $data->intrest_permonth;?>">
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group has-feedback col-md-4">
                              <label for="exampleInputEmail1">personalized Message</label><br>
                              <input type="radio" name="personalized_msg" value="1" <?php echo ($data->personalized_msg== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="personalized_msg" value="0" <?php echo ($data->personalized_msg== '0') ?  "checked" : "" ;  ?>> No
                            </div> 
                            <div class="col-md-6">
                              <label for="exampleInputEmail1">Count</label>
                              <input type="text" class="form-control required" data-parsley-trigger="change"  
                                data-parsley-minlength="2"  data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name=" personalized_msg_permonth" value="<?php echo $data->personalized_msg_permonth;?>">
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group has-feedback col-md-4">
                              <label for="exampleInputEmail1">Access verified mobile numbers</label><br>
                              <input type="radio" name="verified_mob" value="1" <?php echo ($data->verified_mob== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="verified_mob" value="0" <?php echo ($data->verified_mob== '0') ?  "checked" : "" ;  ?>> No
                            </div> 
                            <div class="col-md-6">
                              <label for="exampleInputEmail1">Count</label>
                              <input type="text" class="form-control required" data-parsley-trigger="change"  
                                data-parsley-minlength="2"  data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="  verified_mob_permonth" value="<?php echo $data->verified_mob_permonth;?>">
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group has-feedback col-md-4">
                              <label for="exampleInputEmail1">Send SMS</label><br>
                              <input type="radio" name="send_sms" value="1" <?php echo ($data->send_sms== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="send_sms" value="0" <?php echo ($data->send_sms== '0') ?  "checked" : "" ;  ?>> No
                            </div> 
                            <div class="col-md-6">
                              <label for="exampleInputEmail1">Count</label>
                              <input type="text" class="form-control required" data-parsley-trigger="change"  
                                data-parsley-minlength="2"  data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="  send_sms_permonth" value="<?php echo $data->send_sms_permonth;?>">
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group has-feedback col-md-4">
                              <label for="exampleInputEmail1">Chat instantly with prospects</label><br>
                              <input type="radio" name="chat_instantly" value="1" <?php echo ($data->chat_instantly== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="chat_instantly" value="0" <?php echo ($data->chat_instantly== '0') ?  "checked" : "" ;  ?>> No
                            </div> 
                            <div class="col-md-6">
                              <label for="exampleInputEmail1">Count</label>
                              <input type="text" class="form-control required" data-parsley-trigger="change"  
                                data-parsley-minlength="2"  data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="  chat_instantly_permonth" value="<?php echo $data->chat_instantly_permonth;?>">
                            </div>
                          </div>
                        </div>

                        <div class=" col-md-4">
                          <div class=" col-md-12">     
                            <div class="form-group">
                              <label for="exampleInputEmail1">Profile Highlighter:</label><br>
                              <input type="radio" name="profile_highligher" value="1" <?php echo ($data->profile_highligher== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="profile_highligher" value="0" <?php echo ($data->profile_highligher== '0') ?  "checked" : "" ;  ?>> No
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Personal Relationship Manager:</label><br>
                              <input type="radio" name=" personal_relationship_manager" value="1" <?php echo ($data->personal_relationship_manager== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="personal_relationship_manager" value="0" <?php echo ($data->personal_relationship_manager== '0') ?  "checked" : "" ;  ?>> No
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Priority in search results</label><br>
                              <input type="radio" name="priority_search" value="1" <?php echo ($data->priority_search== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="priority_search" value="0" <?php echo ($data->priority_search== '0') ?  "checked" : "" ;  ?>> No
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Profile tagged as paid member </label><br>
                              <input type="radio" name="profile_tagged" value="1" <?php echo ($data->profile_tagged== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="profile_tagged" value="0" <?php echo ($data->profile_tagged== '0') ?  "checked" : "" ;  ?>> No
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Prominent display in search results </label><br>
                              <input type="radio" name="prominent_display" value="1" <?php echo ($data->prominent_display== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="prominent_display" value="0" <?php echo ($data->prominent_display== '0') ?  "checked" : "" ;  ?>> No
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">SMS Alerts: </label><br>
                              <input type="radio" name="sms_alert" value="1" <?php echo ($data->sms_alert== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="sms_alert" value="0" <?php echo ($data->sms_alert== '0') ?  "checked" : "" ;  ?>> No
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Enhanced Privacy: </label><br>
                              <input type="radio" name="enhanced_privacy" value="1" <?php echo ($data->enhanced_privacy== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="enhanced_privacy" value="0" <?php echo ($data->enhanced_privacy== '0') ?  "checked" : "" ;  ?>> No
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">View Social and Professional profile  </label><br>
                              <input type="radio" name="view_social_profiles" value="1" <?php echo ($data->view_social_profiles== '1') ?  "checked" : "" ;  ?>> Yes
                              <input type="radio" name="view_social_profiles" value="0" <?php echo ($data->view_social_profiles== '0') ?  "checked" : "" ;  ?>> No
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12"> 
                           <div class="box-footer center">
                             <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>          
                  </div>                    
                <!-- /.box body -->
                </form>
              <!-- /.form -->
              
           </div>
            <!-- /.box -->
         </div>
         <!-- /.col-md-12 -->
      </div>
      <!-- /.row -->
    </section>
   <!-- /.content -->
</div>

<script type="text/javascript">
 $("#search_help").click(function(){ 
    var selector=$("input[name=selector]:checked").val();
    alert(selector);

   }); 

  $("#radiobutt input[type=radio]").each(function(i){
    $(this).click(function () {
   // alert(i);
        if(i==1) { //3rd radiobutton
            $("#textbox1").attr("disabled", "disabled"); 
            $("#checkbox1").attr("disabled", "disabled"); 
        }
        else {
            $("#textbox1").removeAttr("disabled"); 
            $("#checkbox1").removeAttr("disabled"); 
        }
      });

  });
</script>