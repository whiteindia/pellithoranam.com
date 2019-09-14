<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Collection
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>bridal">View Collection</a></li>
         <li class="active">Add Collection</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-xs-12">
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
                  <h3 class="box-title">Add Collection</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			         <form role="form" action="" method="post" data-parsley-validate class="validate" enctype="multipart/form-data">

                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                            
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control required" required="" name="title" placeholder="Title">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>   
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control required" required="" name="short_desc" placeholder="Description"></textarea>
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>     
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Image</label>
                            <input type="file" class="form-control required" required="" name="bc_img">
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

