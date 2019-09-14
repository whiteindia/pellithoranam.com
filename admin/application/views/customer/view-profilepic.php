   <?php $settings= get_settings();?>
   <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        View Profilepic Details </h1><br>
       
  <!--   <div> 
    <a href="<?php echo base_url(); ?>Home_ctrl/add_category"><button class="btn add-new" type="button"><b><i class="fa fa-fw fa-plus"></i> Add New</b></button></a>
    </div> -->

     
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li><a href="#">Profilepic Details</a></li>
         <li class="active">View Profilepic Details</li>
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
                  <h3 class="box-title">View Profilepic Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                          <th class="center">Uploaded By</th>
                          <th class="center">Uploaded Date Time</th>
						        <th class="center">Profile Picture</th>
                          <th class="center">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php //print_r($prof_pics);die;
                          if(!empty($prof_pics)) { foreach($prof_pics as $pics) {	
						         $image=$pics->pic_location;
                           ?>
                        <tr>
                           <td class="center"><?php echo $pics->profile_name." | ".$settings->id_prefix.$pics->matrimony_id; ?></td>
                           <td class="center"><?php echo $pics->pic_datetime; ?></td>
                           <td class="center">
                               <img src="<?php echo site_url()."../../../".$image;?>" width="200px" >
                           </td>
                           <td class="center">
                           <form action="<?php echo site_url('Customer/crop_profilepic');?> " method="post">
                           <input type="hidden" name="picid" value="<?php echo $pics->pic_verification_id;?>">
                           <input type="hidden" name="image-user" value="<?php echo $pics->matrimony_id;?>">
                           <input type="hidden" name="image-loc" value="<?php echo $image;?>">
                           <input type="hidden" name="profile_preference" value="<?php echo $pics->profile_preference;?>">
                           <input type="submit" class="btn btn-sm bg-olive" value=" Approve">
                            </form>
                              <a class="btn btn-sm bg-orange" href="<?php echo site_url('Customer/reject_profilepic/'.$pics->user_id .'/'.$pics->pic_verification_id); ?>" onClick="return doapprove()">
                              <i class="fa"></i> Reject </a>   
                              <a class="btn btn-sm btn-danger" href="<?php echo site_url('Customer/delete_profilepic/'.$pics->user_id.'/'.$pics->pic_verification_id); ?>" onClick="return doconfirm()">
                              <i class="fa fa-fw fa-trash"></i>Delete</a>							
                           </td>
                        </tr>
                        <?php
                           } }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Name</th>
						   <td>Image</td>
						   <th width="200px;">Action</th>
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