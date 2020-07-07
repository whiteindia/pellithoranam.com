<style>
.center{width:15%;}
.custom-btn{display: inline-block;border-radius: 0px;}
.custom-btn-bay{min-width:140px !important;}
</style>

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         View Members Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">View Members</a></li>
         <li class="active">View Member Details</li>
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
                  <h3 class="box-title">View Member Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="overflow: scroll;">
                  <table id="" class="table table-bordered table-striped datatable" style="font-size: 15px">
                     <thead>
                        <tr>
                           <th class="hidden">Sl No</th>
                           <th>Matrimony Id</th>
                           <th>Name</th>
                           <th>Birth Date</th>
                           <th>Gender</th>
                           <th>Religion</th>
                           <th>Mother tongue</th>
                           <th>Email</th>
                           <th>Phone</th>
						   <th>Status</th>
						    <th>Current Package</th>
                           <th>Profile Link</th>
						   
                           <th>Upgrade</th>
						 
                           <th class="custom-btn-bay">Action</th>
						       <th>Highlight </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1;
                           foreach($members as $member) { 
                           // $image=$member->image;
                           
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $i; ?></td>
                           <td class="center">PT<?php echo $member->matrimony_id; ?></td>
                           <td class="center"><?php echo $member->profile_name; ?></td>
                           <td class="center"><?php echo $member->dob; ?></td>
                           <td class="center"><?php echo $member->gender; ?></td>
                           <td class="center"><?php echo $member->religion_name; ?></td>
                           <td class="center"><?php echo $member->mother_tongue_name; ?></td>
                           <td class="center"><?php echo $member->email; ?></td>
                           <td class="center"><?php echo $member->phone; ?></td>
						    <td class="center"><?php 
								if($member->profile_status=='0'){
									echo "Rejected";
								}
								else if($member->profile_status=='1'){
									echo "Activated";
								}
								else if($member->profile_status=='2'){
									echo "Deleted";
								}
								else if($member->profile_status=='3'){
									echo "Banned";
								}
								else if($member->profile_status=='4'){
									echo "Deactivated";
								}
							?>
							</td>
							
							
							  
							
							
							<td class="center"><?php echo $member->package_name; ?></td>
                           <?php if($member->matrimony_id!=null){?>
                           <td class="center ">
                              <a class="btn btn-sm btn-success" href="<?php echo base_url();?>../profile/profile_details/<?php echo $member->matrimony_id; ?>" target="_blank">View Profile</a>
                           </td>
                           <?php }else{ ?>
                           <td>
                              <a href="#" style="color:red;"><?php echo $member->user_id;
                                $query = $this->db->where('email',$member->email);
                                $query = $this->db->get('profiles');
                                $resultss = $query->row();
                              echo $resultss->user_id;
                              ?>:incomplete profile </a>
                                                            <a class="btn btn-sm btn-danger custom-btn" href="<?php echo site_url('customer/delete_member/'.$member->profile_id); ?>" onClick="return doconfirm()" title="Delete Member">
                              <i class="fa fa-fw fa fa-power-off"></i></a>
                           </td>
                           <?php } if($member->is_premium==1){?>
                         <td class="center">
         
                            <a class="btn btn-sm bg-orange custom-btn" href="<?php echo base_url();?>customer/upgrade_members/<?php echo $member->matrimony_id; ?>">Downgrade</a>   
                              
                           </td> 
                           <?php } elseif($member->is_premium==0){?>
                           <td class="center">
                          <a class="btn btn-sm btn-success" href="<?php echo base_url();?>customer/upgrade_members/<?php echo $member->matrimony_id; ?>">Upgrade</a>
                           </td> 
                           <?php } elseif($member->is_premium==2) {?>
						    <td class="center">
                          <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>customer/upgrade_members/<?php echo $member->matrimony_id; ?>">Waiting for upgrade</a>
                           </td> 
                           <?php } ?>
						   
						   
						   
						   
                           <td class="center custom-btn-bay">
                             <?php if($member->profile_approval=='0' || $member->profile_status=='2'){?> 
                             <a class="btn btn-sm bg-olive custom-btn" href="<?php echo site_url('customer/approve_member/'.$member->profile_id); ?>" onClick="return doapprove()" title="Approve Member">
                              <i class="fa fa-check"></i></a> <!-- approve -->
                              <?php } else {?>
                              <a class="btn btn-sm bg-orange custom-btn" href="<?php echo site_url('customer/reject_member/'.$member->profile_id); ?>" onClick="return doapprove()" title="Reject Member">
                              <i class="fa fa-close"></i></a>  <!-- reject -->   
                              <?php } ?> 
                               <a class="btn btn-sm btn-primary custom-btn" href="<?php echo site_url('customer/edit_member/'.$member->profile_id); ?>" title="Edit Member Profile">
                              <i class="fa fa-fw fa-edit"></i></a> <!-- edit -->
                              <?php if($member->profile_status!='3') { ?>
                              <a class="btn btn-sm btn-danger custom-btn" href="<?php echo site_url('customer/ban_member/'.$member->profile_id); ?>" onClick="return doconfirmban()" title="Ban Member">
                              <i class="fa fa-ban"></i></a> <!-- ban --> 
                              <?php } ?>
                              <?php if($member->profile_status!='2') { ?>             
                              <a class="btn btn-sm btn-danger custom-btn" href="<?php echo site_url('customer/delete_member/'.$member->profile_id); ?>" onClick="return doconfirm()" title="Delete Member">
                              <i class="fa fa-fw fa-trash"></i></a> <!-- delete -->  
                              <?php  } ?>          
                           </td>
                           <?php if($member->profile_highlight=='1'){ ?>
                             <td class="center">
						
					    	<a class="btn btn-sm bg-orange custom-btn" href="<?php echo site_url('Customer/highlight_members/'.$member->matrimony_id); ?>"  title="HighLight Member ">
                              <i class="fa-exclamation-triangle"></i></a>
							</td>
							<?php } else if($member->profile_highlight=='0') { ?>
							<td class="center">
						
					    	<a class="btn btn-sm btn-primary custom-btn" href="<?php echo site_url('Customer/disable/'.$member->matrimony_id); ?>"  title="HighLight Disable">
                              <i class="fa-lightbulb-o"></i></a>
							</td>
							<?php } ?>
							
						     
                        </tr>
                        <?php $i = $i+1; } ?>
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


<script>
function doconfirm() {
    job=confirm("Are you sure to delete permanently?");
   if(job!=true) { return false; }
}
function doconfirmban() {
    job=confirm("Are you sure to ban this member?");
   if(job!=true) { return false; }
}
function doapprove() {
    job=confirm("Are you sure?");
    if(job!=true) { return false; }
}
</script>

