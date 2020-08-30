<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add uploader for New Bridal Collection
      </h1>
   <!--   <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>bridal">View Collection</a></li>
         <li class="active">Add Collection</li>
      </ol>  -->
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
                  <h3 class="box-title">Add Uploader</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			         <form role="form" action="" method="post" data-parsley-validate class="validate" enctype="multipart/form-data">

                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                            
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">BridalCode</label>
                            <input type="text" class="form-control required" required="" name="bridalcode" placeholder="ex ; KNR">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>   
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">username</label>
                           <input type="text" class="form-control required" required="" name="bridaluser" placeholder="Title">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>     
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">password</label>
                           <input type="password" class="form-control required" required="" name="password" placeholder="password">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">contact</label>
                           <input type="contact" class="form-control required" required="" name="contact" placeholder="password">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
  
                              
						
					             <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>             
                  </div>                   
            
               </form>
<!-- uploaders list-->
<div class="bg-success">
<h3 class="text-danger"><b>Uploaders list</b></h3>
<!------>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">code</th>
      <th scope="col">username</th>
      <th scope="col">contact</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  //$query = $this->db->where('',$this->session->userdata('logged_in')->matrimony_id);
  //  $query = $this->db->where('mobileview_to',$profile[0]->matrimony_id); 
    $query = $this->db->get('bridalusers'); 
     $used=$query->result();
$used=json_decode(json_encode($used),true);
  //print_r($used);
  foreach($used AS $rec){
  ?>
    <tr>
      <th scope="row">1</th>
      <td><?= $rec['bridalcode']; ?></td>
      <td><?= $rec['bridaluser']; ?></td>
      <td><?= $rec['contact']; ?></td>
     
    </tr>
         <?php }?>
  </tbody>
</table>

</div>

<!------->
            </div>
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

