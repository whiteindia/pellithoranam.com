<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Page
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>pages">View Pages</a></li>
         <li class="active">Add Page</li>
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
                  <h3 class="box-title">Add Page</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			         <form role="form" action="" method="post" enctype="multipart/form-data" id="edit_page">
                     <input type="hidden" name="pid" id="pid" value="<?php echo $data->id;?>" disabled>

                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                            
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" required="" name="title" id="title" placeholder="Title" value="<?php echo $data->title;?>">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>    
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control url-slug" required="" name="slug" id="slug" placeholder="Url Slug" value="<?php echo $data->slug;?>">
                            <div class="pslug-error"></div>
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>   
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Content</label>
                            <textarea class="form-control content-editor" required="" name="content" placeholder="Content"><?php echo $data->content;?></textarea>
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

