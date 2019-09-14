	<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        View Success Story </h1><br>
   <!--  <div> 
    <a href="<?php echo base_url(); ?>Index_management/add_banner"><button class="btn add-new" type="button"><b><i class="fa fa-fw fa-plus"></i> Add New</b></button></a>
    </div> -->

     
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li><a href="#">  View Success Story </a></li>
         <li class="active">  View Success Story </li>
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
                  <h3 class="box-title">  View Success Story </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                          <th class="hidden">ID</th>                        
						         <td>Matrimony ID</td>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Wedding Date</th>
                            <th>Success Story</th>                                                                                                 
                           <th width="200px;">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                           foreach($data as $success) {	
						 //  $image=$cat->image;
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $success->success_id; ?></td>
                           <td class="center"><?php echo $success->matrimony_id; ?></td>    
						         <td class="center"><?php echo $success->name; ?></td>
                           <td class="center"><img src="<?php echo base_url().'../'.$success->photo ?>" width="200px"></td> 
                           <td class="center"><?php echo $success->date; ?></td>
                           <td class="center"><?php echo $success->story; ?></td>
                           <td class="center">	                         
                           	 <?php if(($success->success_approval)==0){?> 
                              <a class="btn btn-sm bg-olive" href="<?php echo site_url('Index_management/success_story_approve/'.$success->success_id); ?>">
                             Approve</a>
                             <?php }else{ ?>
                              <a class="btn btn-sm bg-red" href="<?php echo site_url('Index_management/success_story_reject/'.$success->success_id); ?>">Reject</a>
                                 <?php } ?>
                             <!--  <a class="btn btn-sm btn-danger" href="<?php echo site_url('Index_management/success_story_reject/'.$banner->id); ?>" onClick="return doconfirm()">
                              <i class="fa fa-fw fa-trash"></i>Delete</a>	 -->						
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                    
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
<div class="modal fade modal-wide" id="popup-catModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View Category Details</h4>			
         </div>
         <div class="modal-catbody">	 
         </div>
         <div class="business_info">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
