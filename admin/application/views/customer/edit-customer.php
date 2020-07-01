<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/css/datepicker.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/js/bootstrap-datepicker.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div id="message"></div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit User Details </h3>
               </div>
               <?php $profile = $profile[0] ; ?>
               <!-- /.box-header -->
               <!-- form start -->
                 <form role="form" action="<?php echo base_url(); ?>customer/save_edited_details/<?php echo $prof_id; ?>" method="post"  class="validate">
                  <div class="box-body">
                     <div class="form-group">
                        <div class="col-md-6" style="padding:5px;">
                           <label>Name</label>
                           <input type="text" class="form-control required" data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="profile_name"  value="<?php echo $profile->profile_name; ?>">
                        </div> 
                        <div class="col-md-6" style="padding:5px;">
                           <label>Profile for</label>
                           <select class="form-control select2 required"  style="color: black;" id="bus_name" name="profile_for">
                             
                              <option value="myself"><?php echo $profile->profile_for;?></option>
                              <option value="myself">Myself</option>
                              <option value="son">Son</option>
                              <option value="daughter">Daughter</option>
                              <option value="brother">Brother</option>
                              <option value="sister">Sister</option>
                              <option value="relative">Relative</option>
                             
                           </select>
                        </div>
                        <div class="col-md-6" style="padding:5px;">
                           <label>Mother Tongue</label>
                           <select class="form-control select2 required"  style="color: black;" id="bus_name" name="mother_language">
                              <option value="">- Select Mother Tongue -</option>
                                  <?php foreach($mother_tongue as $mthr_tng) { 
                                    if($profile->mother_language == $mthr_tng->mother_tongue_id) { 
                                      $attr2="selected"; } else { $attr2=""; } ?>
                                  <option value="<?php echo $mthr_tng->mother_tongue_id; ?>" <?php echo $attr2; ?> ><?php echo $mthr_tng->mother_tongue_name ?>
                                  </option>
                                    <?php } ?>
                           </select>
                        </div> 
                           <div class="col-md-6" style="padding:5px;">
                           <label>Religion</label>
                           <select class="form-control select2 required"  style="color: black;" id="bus_name" name="religion">
                             <option value="">- Select Religion -</option>
                                  <?php foreach($religions as $rlgn) { 
                                    if($profile->religion == $rlgn->religion_id) { 
                                      $attr3="selected"; } else { $attr3=""; } ?> ?>
                                  <option value="<?php echo $rlgn->religion_id; ?>" <?php echo $attr3; ?> >
                                  <?php echo $rlgn->religion_name; ?>
                                  </option>
                                  <?php } ?>   
                           </select>
                        </div> 
                         <div class="col-md-6" style="padding:5px;">
                           <label>Phone</label>
                           <input type="text" class="form-control required" data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="phone"  value="<?php echo $profile->phone; ?>">
                        </div>
                         <div class="col-md-6" style="padding:5px;">
                           <label>Email</label>
                           <input type="text" class="form-control required" data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="email"  value="<?php echo $profile->email; ?>">
                        </div>
                         <div class="col-md-6" style="padding:5px;">
                         <div class="col-md-3" style="padding:5px;">
                           <label>Date of birth</label>
                              <input class="datepicker wed-reg-input form-control required" name="dob" data-date-format="yyyy-mm-dd" value="<?php echo $profile->dob;?>">
                        </div>
                      </div>

                        <div class="col-md-6" style="padding:5px;">
                           <label>Place of Birth</label>
                           <input type="text" class="form-control required" data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="placeofbirth"  value="<?php if($profile->placeofbirth){ echo $profile->placeofbirth;} ?>">
                        </div>
                        <div class="col-md-6" style="padding:5px;">
                           <label>Time of Birth</label>
                           <input type="time" class="form-control required" data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="timeofbirth"  value="<?php if($profile->timeofbirth){ echo $profile->timeofbirth; }?>">
                        </div>
                        <div class="col-md-6" style="padding:5px;">
                           <label>Age</label>
                           <input type="text" class="form-control required" data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="age"  value="<?php echo $profile->age; ?>">
                        </div>
                        <br>
                        <label class="col-md-8"><u>Religion Information</u></label><br>
                         <div class="col-md-6" style="padding:5px;">
                           <label>religion</label>
                           <select class="form-control select2 required cst-select-2"  style="color: black;" id="religion" name="religion" cst-attr="religion" cst-for="caste" id="religion-selector">
                             <option value="">- Select Religion -</option>
                          <?php foreach($religions as $rlgn) {
                            if($profile->religion == $rlgn->religion_id) { $attr3="selected"; } else { $attr3=""; } ?>
                          <option value="<?php echo $rlgn->religion_id; ?>" <?php echo $attr3; ?>><?php echo $rlgn->religion_name; ?></option>
                          <?php } ?>
                           </select>            
                        </div> 
                        <div class="col-md-6" style="padding:5px;">
                     <label for="exampleInputEmail1">Caste/division</label>   
                     <select class="form-control cst-select-2" name="caste" cst-attr="caste" cst-for="" id="caste-selector">
                     <option>Select Caste/division</option>
                  </select>
                    </div>
                         <div class="col-md-6" style="padding:5px;">
                           <label>Sub Caste</label>
                            <input type="text" class="form-control required"   
                               data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="sub_caste"  value="<?php echo $profile->sub_caste; ?>">
                        </div> 

                        <div class="col-md-6" style="padding:5px;">
                     <label for="exampleInputEmail1">Gender</label>   
                     <select class="form-control" name="gender" cst-for="" >
                     <option>Select gender</option>
                 
                            <option value="male" <?php if($profile->gender=="male") echo "selected"; ?>>male</option>
                            <option value="female" <?php if($profile->gender=="female") echo "selected"; ?>>female</option>
                  </select>
                    </div>
                      <label class="col-md-8"><u>Location</u></label><br>
                        <div class="col-md-6" style="padding:5px;">
                     <label for="exampleInputEmail1">Country Name</label>   
                     <select class="form-control cst-select-1" name="country" cst-attr="country" cst-for="state" id="country-selector">
                     <option>Select Country</option>
                        <?php foreach ($countries as $country) { 
                           $s = ($country->country_id == $profile->country) ? "selected" : "";
                          ?>                     
                           <option <?php echo $s; ?> value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
                        <?php } ?>
                    </select>
                   </div>
                   
                    <div class="col-md-6" style="padding:5px;">
                     <label for="exampleInputEmail1">State Name</label>   
                     <select class="form-control cst-select-1" name="state" cst-attr="state" cst-for="city" id="state-selector">
                     <option>Select State</option>
                  </select>
                   </div>
                   <div class="col-md-6" style="padding:5px;">
                     <label for="exampleInputEmail1">City Name</label>   
                     <select class="form-control cst-select-1" name="city" cst-attr="city" cst-for="" id="city-selector">
                     <option>Select City</option>
                  </select>
                </div>
                     <label class="col-md-8"><u>Basic Details</u></label><br>
                     <div class="col-md-6" style="padding:5px;">
                           <label>Body Type</label>
                           <select class="form-control select2 required"  style="color: black;" id="body_type" name="body_type">
                            <option>Body Type</option>
                            <option value="1" <?php if($profile->body_type=="1") echo "selected"; ?>>Slim</option>
                            <option value="2" <?php if($profile->body_type=="2") echo "selected"; ?>>Average</option>
                            <option value="3" <?php if($profile->body_type=="3") echo "selected"; ?>>Athletic</option>
                            <option value="4" <?php if($profile->body_type=="4") echo "selected"; ?>>Heavy</option>
                           </select>
                        </div> 
                          <div class="col-md-6" style="padding:5px;">
                           <label>complexion</label>
                           <select class="form-control select2 required"  style="color: black;" id="complexion" name="complexion">
                           <option>Complexion</option>
                          <option value="1" <?php if($profile->complexion=="1") echo "selected"; ?>>Very Fair</option>
                          <option value="2" <?php if($profile->complexion=="2") echo "selected"; ?>>Fair</option>
                          <option value="3" <?php if($profile->complexion=="3") echo "selected"; ?>>Wheatish</option>
                          <option value="4" <?php if($profile->complexion=="4") echo "selected"; ?>>Wheatish Brow</option>
                          <option value="5" <?php if($profile->complexion=="5") echo "selected"; ?>>Dark</option>
                           </select>
                        </div> 
                               <div class="col-md-6" style="padding:5px;">
                           <label> Physical Status</label>
                           <select class="form-control select2 required"  style="color: black;" id="physical_status" name="physical_status">
                           <option> Physical Status</option>
                         <option value="1" <?php if($profile->physical_status=="1") echo "selected"; ?>>Normal</option>
                         <option value="2" <?php if($profile->physical_status=="2") echo "selected"; ?>>Physically Challenged</option>
                           </select>
                        </div> 
                               <div class="col-md-6" style="padding:5px;">
                           <label>Weight</label>
                           <select class="form-control select2 required"  style="color: black;" id="weight" name="weight_id">
                           <option>Weight</option>
                                                  <option>- Select Weight -</option>
                          <?php foreach($weights as $weightd) {
                          if($profile->weight_id == $weightd->weight_id) { $attr1="selected"; } else { $attr1=""; }?>
                          <option value="<?php echo $weightd->weight_id; ?>" <?php echo $attr1; ?>><?php echo $weightd->weight; ?></option>
                          <?php } ?>
                           </select>
                        </div> 
                                <div class="col-md-6" style="padding:5px;">
                           <label>Height</label>
                           <select class="form-control select2 required"  style="color: black;" id="height" name="height_id">
                          <option>- Select Height -</option>
                        <?php foreach($heights as $heightd) {
                            if($profile->height_id == $heightd->height_id) { $attr="selected"; } else { $attr=""; }
                          ?>
                        <option value="<?php echo $heightd->height_id; ?>" <?php echo $attr; ?>><?php echo $heightd->height; ?></option>
                        <?php } ?>
                           </select>
                        </div> 
                        <div class="col-md-6" style="padding:5px;">
                           <label>Marital Status</label>
                           <select class="form-control select2 required"  style="color: black;" id="maritial_status" name="maritial_status">
                           <option>Marital Status</option>
                          <option value="1" <?php if($profile->maritial_status=="1") echo "selected"; ?>>Never Married</option>
                          <option value="2" <?php if($profile->maritial_status=="2") echo "selected"; ?>>Divorced</option>
                          <option value="3" <?php if($profile->maritial_status=="3") echo "selected"; ?>>Widowed</option>
                          <option value="4" <?php if($profile->maritial_status=="4") echo "selected"; ?>>Awaiting for Divorce</option>
                           </select>
                        </div> 
                         <div class="col-md-6" style="padding:5px;">
                           <label>drinking</label>
                           <select class="form-control select2 required"  style="color: black;" id="drinking" name="drinking">
                            <option>Select</option>
                            <option value="1" <?php if($profile->drinking=="1") echo "selected"; ?>>No</option>
                            <option value="2" <?php if($profile->drinking=="2") echo "selected"; ?>>Drinks Socialy</option>
                            <option value="3" <?php if($profile->drinking=="3") echo "selected"; ?>>Yes</option>
                           </select>
                        </div> 
                         <div class="col-md-6" style="padding:5px;">
                           <label>eating</label>
                           <select class="form-control select2 required"  style="color: black;" id="maritial_status" name="eating">
                           <option value="1" <?php if($profile->eating=="1") echo "selected"; ?>>Vegetarian</option>
                            <option value="2" <?php if($profile->eating=="2") echo "selected"; ?>>Non Vegitarian</option>
                            <option value="3" <?php if($profile->eating=="3") echo "selected"; ?>>Eggetarian</option>
                           </select>
                        </div> 
                         <div class="col-md-6" style="padding:5px;">
                           <label>smoking</label>
                           <select class="form-control select2 required"  style="color: black;" id="smoking" name="smoking">
                            <option>Select</option>
                            <option value="1" <?php if($profile->smoking=="1") echo "selected"; ?>>No</option>
                            <option value="2" <?php if($profile->smoking=="2") echo "selected"; ?>>Occasionaly</option>
                            <option value="3" <?php if($profile->smoking=="3") echo "selected"; ?>>Yes</option>
                           </select>
                        </div> 
                        <label class="col-md-8"><u>Professional Information</u></label><br>
                         <div class="col-md-6" style="padding:5px;">
                           <label>educations</label>
                           <select class="form-control select2 required"  style="color: black;" id="education_id" name="education_id">
                            <option value="0">Education</option>
                            <?php foreach($educations as $education) {
                              if($profile->education_id == $education->education_id) { $attr6="selected"; } else { $attr6=""; } ?>
                              <option value='<?php echo $education->education_id; ?>' <?php echo $attr6; ?>><?php echo $education->education; ?></option>
                            <?php } ?>
                           </select>
                        </div> 
                        <div class="col-md-6" style="padding:5px;">
                           <label>College / Institution</label>
                            <input type="text" class="form-control " data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" name="college"  value="<?php echo $profile->college; ?>">
                        </div> 
                        <div class="col-md-6" style="padding:5px;">
                           <label>Education in Detail</label>
                            <input type="text" class="form-control " data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="education_detail"  value="<?php echo $profile->education_detail; ?>">
                        </div>
                        <div class="col-md-6" style="padding:5px;">
                           <label>Occupation</label>
                           <select class="form-control select2 required"  style="color: black;" id="occupation_id" name="occupation_id">
                            <option value="0">Select Occupation</option>
                          <?php foreach($occupations as $occupat) {
                            if($profile->occupation_id == $occupat->occupation_id) { $attr7="selected"; } else { $attr7=""; }?>
                              <option value="<?php echo $occupat->occupation_id; ?>" <?php echo $attr7; ?>><?php echo $occupat->occupation; ?></option>
                          <?php } ?>
                           </select>
                        </div> 
                         <div class="col-md-6" style="padding:5px;">
                           <label>occupation in Detail</label>
                            <input type="text" class="form-control " data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="occupation_detail"  value="<?php echo $profile->occupation_detail; ?>">
                        </div>
                         <div class="col-md-6" style="padding:5px;">
                           <label>Employed in</label>
                            <input type="text" class="form-control " data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="employed_in"  value="<?php echo $profile->employed_in; ?>">
                        </div>
                         <div class="col-md-6" style="padding:5px;">
                           <label>Annual Income</label>
                            <input type="text" class="form-control " data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="income"  value="<?php echo $profile->income; ?>">
                        </div>
                         <label class="col-md-8"><u>Family Details</u></label><br>
                         <div class="col-md-6" style="padding:5px;">
                           <label>Family Values</label>
                           <select class="form-control select2 required"  style="color: black;" id="family_value" name="family_value">
                             <option>Select</option>
                              <option value="1" <?php if($profile->family_value=="1") echo "selected"; ?>>Orthodox</option>
                              <option value="2" <?php if($profile->family_value=="2") echo "selected"; ?>>Traditional</option>
                              <option value="3" <?php if($profile->family_value=="3") echo "selected"; ?>>Moderate</option>
                              <option value="4" <?php if($profile->family_value=="4") echo "selected"; ?>>Liberal</option>
                           </select>
                        </div> 
                        <div class="col-md-6" style="padding:5px;">
                           <label>Family Type</label>
                           <select class="form-control select2 required"  style="color: black;" id="family_type" name="family_type">
                            <option>Select</option>
                            <option value="1" <?php if($profile->family_type=="1") echo "selected"; ?>>Joint</option>
                            <option value="2" <?php if($profile->family_type=="2") echo "selected"; ?>>Nuclear</option>
                           </select>
                        </div> 
                        <div class="col-md-6" style="padding:5px;">
                           <label>Family Status</label>
                           <select class="form-control select2 required"  style="color: black;" id="family_status" name="family_status">
                          <option>Select</option>
                          <option value="1" <?php if($profile->family_status=="1") echo "selected"; ?>>Middle Class</option>
                          <option value="2" <?php if($profile->family_status=="2") echo "selected"; ?>>Upper Middile Class</option>
                          <option value="3" <?php if($profile->family_status=="3") echo "selected"; ?>>Rich</option>
                          <option value="4" <?php if($profile->family_status=="4") echo "selected"; ?>>Affluent</option>
                           </select>
                        </div> 
                        <div class="col-md-6" style="padding:5px;">
                           <label>Ancestral /Family Origin</label>
                            <input type="text" class="form-control " data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="family_origin"  value="<?php echo $profile->family_origin;?>">
                        </div>
                        <div class="col-md-6" style="padding:5px;">
                           <label>Family Location</label>
                            <input type="text" class="form-control " data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="family_location"  value="<?php echo $profile->family_location;?>">
                        </div>
                        <div class="col-md-6" style="padding:5px;">
                           <label>Father's Name</label>
                            <input type="text" class="form-control " data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="father_status"  value="<?php echo ucwords($profile->father_status);?>">
                        </div>
                        <div class="col-md-6" style="padding:5px;">
                           <label> Mother's Name</label>
                            <input type="text" class="form-control " data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="mother_status"  value="<?php echo ucwords($profile->mother_status);?>">
                        </div>
                        <div class="col-md-6" style="padding:5px;">
                           <label>No of Brother(s)</label>
                            <input type="number" min="0" max="50" class="form-control required" data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="brothers"  value="<?php echo $profile->brothers;?>">
                        </div>
                        <div class="col-md-6" style="padding:5px;">
                           <label>No of sisters(s)</label>
                            <input type="number" min="0" max="50" class="form-control required" data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="sisters"  value="<?php echo $profile->sisters;?>">
                        </div>
                         <div class="col-md-6" style="padding:5px;">
                           <label>About my Family</label>
                            <textarea  class="form-control " data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="family_about"><?php echo ucwords($profile->family_about);?></textarea>
                        </div>
                        <div class="col-md-6" style="padding:5px;">
                           <label>Personal Information</label>
                            <textarea  class="form-control required" data-parsley-trigger="change"  
                              data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="about_you"><?php echo ucwords($profile->about_you);?></textarea>
                        </div>
                        <div class="col-md-6"  >
                          <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.box -->
               </form>
            </div>
            <!-- /.content-wrapper -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
$(document).ready(function(){
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
});



});

$( document ).ready(function() {
  var cntry = <?php echo json_encode($profile->country) ?>;
  var state = <?php echo json_encode($profile->state) ?>;
 var city = <?php echo json_encode($profile->city) ?>;

$(".cst-select-1").on('change', function () {
        var valueSelected = $(this).val();
        var select_type   = $(this).attr('cst-attr');
        var select_destn  = $(this).attr('cst-for');
        var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;

        $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>Customer/get_drop_data2',
        data:  passdata_2,
        success: function(data){
        // alert(data);
               $("#"+select_destn+"-selector").html(data);
            }
        });
    });

  $("select#country-selector").val(cntry).change();
  setTimeout(function() {
    $("select#state-selector").val(state).change();
  }, 500);
   setTimeout(function() {
     $("select#city-selector").val(city).change();
  }, 1000);


 
var religion = <?php echo json_encode($profile->religion) ?>;
  var caste = <?php echo json_encode($profile->caste) ?>;
//alert(caste);

$(".cst-select-2").on('change', function () {
        var valueSelected = $(this).val();
        var select_type   = $(this).attr('cst-attr');
        var select_destn  = $(this).attr('cst-for');
        var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;

        $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>Customer/get_drop_data3',
        data:  passdata_2,
        success: function(data){
       // alert(data);
               $("#"+select_destn+"-selector").html(data);
            }
        });
    });

  $("select#religion-selector").val(religion).change();
  setTimeout(function() {
    $("select#caste-selector").val(caste).change();
  }, 500);



 });



</script>