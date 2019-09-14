<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Super Admin
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
   <!--       <li><a href="<?php echo base_url(); ?>Home_ctrl/view_subcategory">Package Details</a></li> -->
         <li class="active">Super Admin Details</li>
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
                  <h3 class="box-title">Add Super Admin Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">

                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="email"  placeholder="email">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>   
                           
                          <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Password</label>
                            <input type="password" class="form-control required" data-parsley-trigger="change"  
                           data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="password"  placeholder="password">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
                          
                          
                            </div>      
					<!-- 	     <div class="col-md-6">
                         <label>Select Privillages</label><br>
                      
                           <label for="exampleInputEmail1">Matrimony Members</label>
                           <input type='hidden' value='0' name='matrimony_members'>
                            <input type="checkbox" class="required" value="1" name="matrimony_members">
                            &emsp;<label for="exampleInputEmail1">Packages</label>
                            <input type='hidden' value='0' name='packages'>
                            <input type="checkbox" class="required" value="1" name="packages">
                             &emsp;<label for="exampleInputEmail1">Settings</label>
                             <input type='hidden' value='0' name='settings'>
                            <input type="checkbox" class="required" value="1" name="settings">
                             &emsp;<label for="exampleInputEmail1">Staff</label>
                             <input type='hidden' value='0' name='staff'>
                            <input type="checkbox" class="required" value="1" name="staff">
                              &emsp;<label for="exampleInputEmail1">Index Management</label>
                              <input type='hidden' value='0' name='index_management'>
                            <input type="checkbox" class="required" value="1" name="index_management">
                              &emsp;<label for="exampleInputEmail1">Classifieds Management</label>
                              <input type='hidden' value='0' name='classifieds_management'>
                            <input type="checkbox" class="required" value="1" name="classifieds_management">
                          
                      
                         </div> -->
                      
                         </div> 
                      
					    <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
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

