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
                  <h3 class="box-title">Edit Package Details </h3>
               </div>
        <!--       <?php $profile = $profile[0] ; ?>-->
               <!-- /.box-header -->
               <!-- form start -->
            <!--     <form role="form" action="<?php echo base_url(); ?>customer/save_edited_details/<?php echo $prof_id; ?>" method="post"  class="validate">
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
 

   
                     </div>
                  </div>
                  
                      [interest] => 0
    [mails ] => 0
    [views ] => 0
    [sms] => 0
    [total_interest] => 5
    [total_sendmail] => 2
    [total_mobileview] => 10
    [total_sms] => 0
    [membership_package] => 24
    [membership_package_name] => PT-Welcome  Offer July 2020
               </form>--><!-- /.box -->

<?php
 //echo '<pre>'; 
 //print_r($package);
 //echo '</pre>'; 
?>


<div>
<div class="card text-center">
  <div class="card-header">
    Edit package detail
  </div>
  <div class="card-body">
    <h5 class="card-title"><small>increase/decrease package values</small></h5>
    <div class="container-fluid">
  <div class="bg-warning">  <fieldset>
    <legend><h3 class="text-primary">Package services  used by user till now</h3></legend>
    <div class="alert alert-success" role="alert">
  <label>interest</label><?= $package['interest'] ?><br>
</div>
<div class="alert alert-success" role="alert">
  <label>mails</label><?= $package['mails'] ?><br>
  </div>
  <div class="alert alert-success" role="alert">
  <label>views</label><?= $package['views'] ?><br>
  </div>
  <div class="alert alert-success" role="alert">
  <label>sms</label><?= $package['sms'] ?><br>
  </div>
  



</fieldset>
</div>
<div class="bg-danger">
<fieldset>
    <legend><h3 class="text-success">edit Package Info</h3></legend>
    <form role="form" action="" method="post" >
<label>membership_package</label><?= $package['membership_package'] ?><br>
<label>membership_package_name</label><?= $package['membership_package_name'] ?><br>
<label>total_interest</label><?= $package['total_interest'] ?><br>
<label>total_sendmail</label><?= $package['total_sendmail'] ?><br>
<label>total_mobileview</label><?= $package['total_mobileview'] ?><br>
<label>total_sms</label><?= $package['total_sms'] ?><br>
<?php $mid=$this->uri->segment(3);   ?>


</form>
</fieldset> </div>
</div>
  </div>
  <div class="card-footer text-muted">
   
  </div>
</div>

</div>


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

<script>/*
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

*/

</script>