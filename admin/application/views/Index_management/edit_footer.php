<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
       Footer Management
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
   <!--       <li><a href="<?php echo base_url(); ?>Home_ctrl/view_subcategory">Package Details</a></li> -->
         <li class="active">  Footer Management</li>
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
                  <h3 class="box-title">Add Footer Management</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">

                  <div class="box-body">
                     <div class="col-md-6">
                           <img src="<?php echo base_url().$data->footer_image ?>" width="200px"></a>
                        <div class="form-group ">
                  <label class="control-label" for="shopimage">Select Footer</label>
                  <input type="file"  name="footer_image" size="20" />
                     </div>
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Footer Header</label>
                            <textarea class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="footer_header"><?php echo $data->footer_header;?></textarea>
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>   
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Footer Para</label>
                            <textarea class="form-control required" data-parsley-trigger="change" 
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="footer_para"><?php echo $data->footer_header;?></textarea>
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

