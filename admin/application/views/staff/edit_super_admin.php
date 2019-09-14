<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Super Admin
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Edit Staff Details</a></li>
         <li class="active">Edit Super Admin</li>
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
                  <h3 class="box-title">Edit Super Admin</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">

                 
                  <div class="box-body">
                     <div class="col-md-6">
                       
                           
                        
                           <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">email</label>
                            <input type="email" class="form-control required" data-parsley-trigger="change"  
                             data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="email"  placeholder="email" value="<?php echo $data->email;?>">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
                           	
						                     </div>      
             
				           
                                        
            
               </form>
            </div>
            	    <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>  
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

