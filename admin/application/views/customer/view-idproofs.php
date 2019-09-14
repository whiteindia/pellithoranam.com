   <?php $settings= get_settings();?>
   <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        View IdProof Details </h1><br>
       
  <!--   <div> 
    <a href="<?php echo base_url(); ?>Home_ctrl/add_category"><button class="btn add-new" type="button"><b><i class="fa fa-fw fa-plus"></i> Add New</b></button></a>
    </div> -->

     
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li><a href="#">IdProof Details</a></li>
         <li class="active">View IdProof Details</li>
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
                  <h3 class="box-title">View IdProof Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                          <th class="center">Uploaded By</th>
						              <th class="center">Idproof</th>
                           <th class="center">Document</th>
                          <th class="center">Uploaded Date Time</th> 
                        
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                          if(!empty($proof)) { foreach($proof as $idproof) {	
						        $proofs=$idproof->proof_path;
                           ?>
                        <tr>
                           <td class="center"><?php echo $idproof->profile_name;?><br>
                            Id:<?php echo $settings->id_prefix; ?> <?php echo $idproof->matrimony_id; ?></td>
                           <td class="center"><?php echo $idproof->idproof; ?></td>
                           <td class="center"><a href="<?php echo base_url()."../".$proofs?>" target="_blank" class="btn btn-sm bg-green">View Document</a></td>
                           <td class="center"><?php echo $idproof->date_time; ?></td>
                           <td class="center">
                          <!--  <form action="<?php echo site_url('Customer/crop_profilepic');?> " method="post">
                           <input type="hidden" name="picid" value="<?php echo $pics->pic_verification_id;?>">
                           <input type="hidden" name="image-user" value="<?php echo $pics->matrimony_id;?>">
                           <input type="hidden" name="image-loc" value="<?php echo $image;?>">
                           <input type="submit" class="btn btn-sm bg-olive" value="Crop and Approve">
                            </form> -->
                           <!--  <?php if($gallery->pic_approval=='0') {?>
                              <a class="btn btn-sm bg-green" href="<?php echo site_url('Customer/approve_gallerypic/'.$gallery->matrimony_id.'/'.$gallery->id); ?>" onClick="return doapprove()">
                              <i class="fa"></i> Approve </a>
                              <?php } else {?>
                              <a class="btn btn-sm bg-orange" href="<?php echo site_url('Customer/reject_gallerypic/'.$gallery->matrimony_id.'/'.$gallery->id); ?>" onClick="return doapprove()">
                              <i class="fa"></i> Reject </a>  
                              <?php } ?> 
                              <a class="btn btn-sm btn-danger" href="<?php echo site_url('Customer/delete_gallerypic/'.$gallery->matrimony_id.'/'.$gallery->id); ?>" onClick="return doconfirm()">
                              <i class="fa fa-fw fa-trash"></i>Delete</a>		 -->					
                           </td>
                        </tr>
                        <?php
                           } }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="center">Uploaded By</th>
                          <th class="center">Idproof</th>
                           <th class="center">Document</th>
                          <th class="center">Uploaded Date Time</th> 
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