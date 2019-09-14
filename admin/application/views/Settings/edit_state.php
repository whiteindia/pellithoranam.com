<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit State Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
   <!--       <li><a href="<?php echo base_url(); ?>Home_ctrl/view_subcategory">Package Details</a></li> -->
         <li class="active">State Details</li>
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
                  <h3 class="box-title">Edit State Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">

                  <div class="box-body">
                     <div class="col-md-6">
                     <div class="form-group has-feedback">
                     <label for="exampleInputEmail1">Country Name</label>   
                     <select class="form-control cst-select-1" name="country_id" cst-attr="country" cst-for="city" id="country-selector">
                     <option>Select Country</option>
                        <?php foreach ($countries as $country) { 
                           $s = ($country->country_id == $data->country_id) ? "selected" : "";
                           ?>                     
                           <option <?php echo $s; ?> value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
                        <?php } ?>
                    </select>
                   </div>
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">State Name</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="state_name"  placeholder="State Name" value="<?php echo $data->state_name;?>">
                           <span class="glyphicon  form-control-feedback"></span>
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

