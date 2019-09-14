

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Ads
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
      <li class="active">Ads</li>
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
               <h3 class="box-title">Ads</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
               <form role="form" action="<?php echo base_url();?>Index_management/add_leftad" method="post"  class="validate" enctype="multipart/form-data">
                  <div class="col-md-6">
                  <p>Dimension :160 x 600 </p>
                     <h3 class="box-title">Left Ads</h3>
                   <?php if($leftad!=null){?>
                        <img src="<?php echo base_url().$leftad->left_ad ?>" width="200px"></a>
                               <?php } ?> 
                     <div class="form-group ">
                        <label class="control-label" for="shopimage">Select Images</label>
                        <input type="file"  name="left_ad" size="20" />
                     </div>
                     <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                  </div>
               </form>
                  <div class="col-md-6">
               <form role="form" action="<?php echo base_url();?>Index_management/add_rightad" method="post"  class="validate" enctype="multipart/form-data">      
                <p>Dimension :160 x 600 </p>
               <h3 class="box-title">Right Ads</h3>
                <?php if($rightad!=null){?>
                        <img src="<?php echo base_url().$rightad->right_ad ?>" width="200px"></a>
                               <?php } ?> 
                  
               <div class="form-group ">
               <label class="control-label" for="shopimage">Select Images</label>
               <input type="file"  name="right_ad" size="20" />
               <div class="box-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
               </div>             
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

