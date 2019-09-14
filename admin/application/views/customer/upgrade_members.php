<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Upgrade Package
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
   <!--       <li><a href="<?php echo base_url(); ?>Home_ctrl/view_subcategory">Package Details</a></li> -->
         <li class="active">Upgrade/Downgrade Package</li>
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
                  <h3 class="box-title">Upgrade/Downgrade Package</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
             <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">

                  <div class="box-body">
                     <div class="col-md-6">
                      <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Current Package</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"  
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="membership_package"  placeholder="Package Name" value="<?php echo $package->package_name;?>">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>  
                      <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Package Type</label>
                           <select class="form-control cst-select-1" name="package_type" id="package_type" cst-attr="package" cst-for="city" id="country-selector">
                            <option>Select Type</option>
                            <option value="1">Basic Package</option>
                            <option value="2">Custom Package</option>
                           </select>
                        </div>                       
                    
						
						
						
						  <div class="form-group has-feedback">
                             <label for="exampleInputEmail1">Package Name</label>   
					         <select class="form-control" style="width: 100%;" name="package_id"  required="" >
							 <option value="" disabled selected>Select package</option>
							   <?php
									foreach($package1 as $pack){	
								 ?>
								<option value="<?php echo $pack->id;?>"><?php echo $pack->package_name;?></option>
								  <?php
								  }
								  ?>
                             </select>
                          </div> 
						
						
						
						
						
						
						
						
						
                         <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Payment Type</label>
                           <select class="form-control cst-select-1" name="payment_type" id="package_type">
                            <option>Select Type</option>
                            <option value="paypal">Paypal</option>
                            <option value="dd">DD</option>
                            <option value="cheque">Cheque</option>
                           </select>
                        </div> 
                         
                  
                   <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>             
                        </div>                   
            
               </form>
            </div>
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

<script>
$( document ).ready(function() {

$(".cst-select-1").on('change', function () {
        var valueSelected = $(this).val();
        var select_type   = $(this).attr('cst-attr');
        var select_destn  = $(this).attr('cst-for');
        var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;

        $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>Customer/get_drop_data',
        data:  passdata_2,
        success: function(data){
          //alert(data);
               $("#"+select_destn+"-selector").html(data);
            }
        });
    });
 });
</script>