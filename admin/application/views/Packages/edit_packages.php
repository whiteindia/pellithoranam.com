<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Package Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Edit Package Details</a></li>
         <li class="active">Edit Package Details</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
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
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Package Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">

                  <div class="box-body">
                     <div class="col-md-6">
		                <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Package Type</label>
                           <select class="form-control cst-select-1" name="package_type" id="package_type">
                            <option>Select Type</option>
                            <option value="1" <?php echo ($data->package_type== '1') ?  "selected" : "" ;  ?>>Basic Package</option>
                            <option value="2" <?php echo ($data->package_type== '2') ?  "selected" : "" ;  ?>>Custom Package</option>
                           </select>
                        </div>  
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Package Name</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="package_name"  value="<?php echo $data->package_name; ?>">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
                           <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Month</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"  
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="month"  value="<?php echo $data->month; ?>">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
                           <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"  
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="price"  value="<?php echo $data->price; ?>">
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

