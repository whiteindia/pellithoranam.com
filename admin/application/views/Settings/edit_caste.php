<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit caste Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
   <!--       <li><a href="<?php echo base_url(); ?>Home_ctrl/view_subcategory">Package Details</a></li> -->
         <li class="active">caste Details</li>
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
                  <h3 class="box-title">Edit caste Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">

                  <div class="box-body">
                     <div class="col-md-6">
                     <div class="form-group has-feedback">
                     <label for="exampleInputEmail1">religion Name</label>   
                     <select class="form-control cst-select-1" name="religion_id">
                     <option>Select religion</option>
                        <?php foreach ($religionz as $religion) { 
                           $s = ($religion->religion_id == $data->religion_id) ? "selected" : "";
                           ?>                     
                           <option <?php echo $s; ?> value="<?php echo $religion->religion_id; ?>"><?php echo $religion->religion_name; ?></option>
                        <?php } ?>
                    </select>
                   </div>
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">caste Name</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="caste_name"  placeholder="State Name" value="<?php echo $data->caste_name;?>">
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

