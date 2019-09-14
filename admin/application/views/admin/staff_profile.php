<style>
.center{width:15%;}
.custom-btn{display: inline-block;border-radius: 0px;}
.custom-btn-bay{min-width:140px !important;}
</style>

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Administrator Profile
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Administrator Profile</a></li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <?php
               if($this->session->flashdata('message')) {
                        $message = $this->session->flashdata('message'); ?>
            <div class="alert alert-<?php echo $message['class']; ?>">
               <button class="close" data-dismiss="alert" type="button">×</button>
               <?php echo $message['message']; ?>
            </div>
            <?php } ?>
         </div>
         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Staff Profile</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table class="table table-bordered">
                     <tbody>
                        <tr>
                           <td class="center">Email : </td>
                           <td class="center">
                              <?php echo $staff->username; ?>
                           </td>
                           <td class="center">
                                 <a class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#change_email" title="Change Email">
                                 <i class="fa fa-fw fa-edit"></i>Change Email</a>
                           </td>
                        </tr>
                       <!--  <tr>
                           <td class="center">Account Created : </td>
                           <td class="center" colspan="2"><?php echo $admin->created_date;?></td>
                        </tr> -->
                        <tr>
                           <td class="center">Change Password : </td>
                         <!--   <td class="center"><?php echo $admin->modified_date;?></td> -->
                           <td class="center">
                              <a class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#change_pass" title="Change Password">
                                 <i class="fa fa-fw fa-edit"></i>Change Password</a>
                           </td>
                        </tr>
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

   <!-- change email modal -->

   <div class="modal fade" id="change_email" role="dialog">
    <div class="modal-dialog modal-sm">
    <form method="post" action="<?php echo base_url(); ?>manage/change_staffcredentials">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Email</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="ctype" value="email">
          <input type="email" class="form-control required" placeholder="Type new email" name="email" required="">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Change</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>

  <!-- change password modal -->

  <div class="modal fade" id="change_pass" role="dialog">
    <div class="modal-dialog modal-sm">
    <form method="post" action="<?php echo base_url(); ?>manage/change_staffcredentials">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="ctype" value="password">
          Existing Password : <input type="password" class="form-control required" name="e_pass" required="">
          New Password : <input type="password" class="form-control required" name="n_pass" required="">
          Retype Password :<input type="password" class="form-control required" name="r_pass" required="">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Change</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
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

