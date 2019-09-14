<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Packages Details
      </h1>
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
			         <form role="form" action="" method="post" data-parsley-validate class="validate" enctype="multipart/form-data">

                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Package Type</label>
                           <select class="form-control cst-select-1 required" name="package_type" id="package_type" 
                           data-parsley-trigger="change"  required="">
                              <option value="">Select Type</option>
                              <option value="1">Basic Package</option>
                              <option value="2">Custom Package</option>
                           </select>
                        </div>  
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Package Name</label>
                            <input type="text" class="form-control required" required="" data-parsley-trigger="change" 	
                            data-parsley-minlength="2" data-parsley-maxlength="50" 
                            data-parsley-pattern="^[a-zA-Z\  \/]+$"  name="package_name" placeholder="Package Name">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>   
                          <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"  
                            data-parsley-minlength="1" data-parsley-maxlength="15" data-parsley-pattern="^[0-9\  \/]+$"
                            required="" name="price"  placeholder="Price">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
                          <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Month</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"  
                            data-parsley-minlength="1" data-parsley-maxlength="2" data-parsley-pattern="^[0-9\  \/]+$" 
                            required="" name="month"  placeholder="Month">
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

