   <?php $settings= get_settings();?>
   <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        View Gallerypic Details </h1><br>
       
  <!--   <div> 
    <a href="<?php echo base_url(); ?>Home_ctrl/add_category"><button class="btn add-new" type="button"><b><i class="fa fa-fw fa-plus"></i> Add New</b></button></a>
    </div> -->

     
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li><a href="#">Gallerypic Details</a></li>
         <li class="active">View Gallerypic Details</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
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
         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Gallerypic Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                          <th class="center">Uploaded By</th>
						        <th class="center">Gallery Picture</th>
                          <th class="center">Uploaded Date Time</th> 
                          <th class="center">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                          if(!empty($gallery_pics)) { foreach($gallery_pics as $gallery) {	
						         $image=$gallery->image_path;
                           ?>
                        <tr>
                           <td class="center"><?php echo $gallery->profile_name." | ".$settings->id_prefix.$gallery->matrimony_id; ?></td>
                           <td class="center">
                              
                                <img src="<?php echo site_url()."../../../".$image;?>" width="85px" height="150px0px">
                           </td>
                           <td class="center"><?php echo $gallery->date_time; ?></td>
                           <td class="center">
                          <!--  <form action="<?php echo site_url('Customer/crop_profilepic');?> " method="post">
                           <input type="hidden" name="picid" value="<?php //echo $pics->pic_verification_id;?>">
                           <input type="hidden" name="image-user" value="<?php //echo $pics->matrimony_id;?>">
                           <input type="hidden" name="image-loc" value="<?php //echo $image;?>">
                           <input type="submit" class="btn btn-sm bg-olive" value="Crop and Approve">
                            </form> -->
                            <?php if($gallery->pic_approval=='0') {?>
                                  <form action="<?php echo base_url('Customer/approve_gallerypic');?>" method="post">
                                   <input type="hidden" name="picid" value="<?php echo $gallery->id;?>">
                                   <input type="hidden" name="image-user" value="<?php echo $gallery->matrimony_id;?>">
                                   <input type="hidden" name="image-loc" value="<?php echo $image;?>">
                                   <input type="submit" class="btn btn-sm bg-olive" value="Approve">
                            </form>
                             <!--  <a class="btn btn-sm bg-green" href="<?php echo site_url('Customer/approve_gallerypic/'.$gallery->matrimony_id.'/'.$gallery->id); ?>" onClick="return doapprove()">
                              <i class="fa"></i> Approve </a> -->
                              <?php } else {?>
                              <a class="btn btn-sm bg-orange" href="<?php echo site_url('Customer/reject_gallerypic/'.$gallery->matrimony_id.'/'.$gallery->id); ?>" onClick="return doapprove()">
                              <i class="fa"></i> Reject </a>  
                              <?php } ?> 
                              <a class="btn btn-sm btn-danger" href="<?php echo site_url('Customer/delete_gallerypic/'.$gallery->matrimony_id.'/'.$gallery->id); ?>" onClick="return doconfirm()">
                              <i class="fa fa-fw fa-trash"></i>Delete</a>							
                           </td>
                        </tr>
                        <?php
                           } }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                          <th class="center">Uploaded By</th>
                          <th class="center">Gallery Picture</th>
                          <th class="center">Uploaded Date Time</th> 
                          <th class="center">Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>