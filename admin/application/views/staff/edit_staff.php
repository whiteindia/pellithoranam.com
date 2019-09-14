<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Staff Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Edit Staff Details</a></li>
         <li class="active">Edit Staff Details</li>
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
                  <h3 class="box-title">Edit Staff Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">

                 
                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Staff name</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"  
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="staff_name"  placeholder="Staff name" value="<?php echo $data->staff_name;?>">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>   
                           
                         <!--  <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">password</label>
                            <input type="password" class="form-control required" data-parsley-trigger="change"  
                           data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="password"  placeholder="password" value="<?php echo $data->password;?>">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>  -->
                           <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control required" data-parsley-trigger="change"  
                             data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="username"  placeholder="email" value="<?php echo $data->username;?>">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
                           <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Phone</label>
                            <input type="digit" class="form-control required" data-parsley-trigger="change"  
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="phone"  placeholder="phone" value="<?php echo $data->phone;?>">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>		
						            </div>      
                        <div class="col-md-6">
                          <label>Select Privillages</label><br>
                                   
                          <?php if($data1->matrimony_members=='1'){?>
                           <label for="exampleInputEmail1">Matrimony Members</label>
                            <input type="checkbox" class="required" value="1" name="matrimony_members" checked>
                            <?php }else {?>
                            <label for="exampleInputEmail1">Matrimony Members</label>
                              <input type="checkbox" class="required" value="1" name="matrimony_members">
                              
                              <?php } if($data1->packages=='1'){?>
                            &emsp;<label for="exampleInputEmail1">Packages</label>
                            <input type="checkbox" class="required" value="1" name="packages" checked>
                            <?php }else {?>
                             &emsp;<label for="exampleInputEmail1">Packages</label>
                             <input type="checkbox" class="required" value="1" name="packages">
                           
                             <?php } if($data1->settings=='1'){?>
                               &emsp;<label for="exampleInputEmail1">Settings</label>
                            <input type="checkbox" class="required" value="1" name="settings" checked>
                            <?php }else {?>
                               &emsp;<label for="exampleInputEmail1">Settings</label>
                             <input type="checkbox" class="required" value="1" name="settings">
                             
                             <?php }if($data1->staff=='1'){?>
                            &emsp;<label for="exampleInputEmail1">Staff</label>
                            <input type="checkbox" class="required" value="1" name="staff" checked>
                            <?php }else{ ?>
                             &emsp;<label for="exampleInputEmail1">Staff</label>
                           <input type="checkbox" class="required" value="1" name="staff">
                           <?php }if($data1->index_management=='1'){ ?>
                            &emsp;<label for="exampleInputEmail1">Index Management</label>
                            <input type="checkbox" class="required" value="1" name="index_management" checked>
                           <?php }else{ ?>
                             &emsp;<label for="exampleInputEmail1">Index Management</label>
                           <input type="checkbox" class="required" value="1" name="index_management">
                            <?php }if($data1->classifieds_management=='1'){?>
                            &emsp;<label for="exampleInputEmail1">Classifieds Management</label>
                            <input type="checkbox" class="required" value="1" name="classifieds_management" checked>
                            <?php }else{ ?>
                             &emsp;<label for="exampleInputEmail1">Classifieds Management</label>
                           <input type="checkbox" class="required" value="1" name="classifieds_management">
                           <?php } ?>
                         </div>


                        <div class="col-md-12"> 
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

