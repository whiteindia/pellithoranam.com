<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script>
    
    .note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.5rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
</script>
<div class="container register-form">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
   
    <p class="lead"><img style="  display: block;   margin-left: auto;   margin-right: auto;   width: 40%;" src="https://pellithoranam.com/assets/logo/pellithoranam_logo.png" height="15%" id="icon" alt="User Icon" /></p>
  </div>
</div>

            <div class="form">
                <div class="note">
                
                </div>
                
                <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Collection</h3>
               </div>

              
               <!-- /.box-header -->
               <!-- form start -->
			         <form role="form" action="<?php echo base_url(); ?>bridal/add_collection" method="post" data-parsley-validate class="validate" enctype="multipart/form-data">

                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                            
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control required" required="" name="title" placeholder="Title">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>   
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Product Serial NO</label>
                            <input type="number" class="form-control required" required="" name="serialno" placeholder="serialno">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control required" required="" name="short_desc" placeholder="Description"></textarea>
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>   
                          
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Image</label>
                            <input type="file" class="form-control required" required="" name="bc_img">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>   
     <?php 
     //( [bid] => 4 [bridalcode] => TNR [bridaluser] => demo1 [password] => e10adc3949ba59abbe56e057f20f883e [contact] => 9603460016 [updated] => 2020-08-29 20:57:14 ) 1
$this->db->where('bridaluser', $_SESSION['bridaluser']);
$query = $this->db->get('bridalusers'); 
$count=$query->num_rows();
$row=$query->row();
//print_r($row);
echo $row->bridalcode;
//echo $count;
 ?>                         
						
					             <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>             
                  </div>                   
            
               </form>

            </div>

            <?php 
     //( [bid] => 4 [bridalcode] => TNR [bridaluser] => demo1 [password] => e10adc3949ba59abbe56e057f20f883e [contact] => 9603460016 [updated] => 2020-08-29 20:57:14 ) 1
$this->db->where('bridalcode', $_SESSION['bridalcode']);
$query = $this->db->get('bridal_collection'); 
$count=$query->num_rows();
$row=$query->result();
//print_r($row);
//echo $row->bridalcode;
//echo $count;
 ?>

<h4>uploaded images</h4>
<table class="table table-sm table-striped">
  <thead>
    <tr>
      <th scope="col">#code</th>
      <th scope="col">title</th>
      <th scope="col">short_desc</th>
      <th scope="col">img</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  <?php
  foreach($row AS $dt)
  {
  ?>
    <tr>
      <th><?= $dt->id; ?><?= $dt->bridalcode; ?><?= $dt->serialno; ?></th>
      <td><?= $dt->title; ?></td>
      <td><?= $dt->short_desc; ?></td>
      <td><img src="<?php echo base_url();?>assets/uploads/bridal/<?= $dt->img; ?>" id="icon" width="150px" height="150px" alt="User Icon" /></td>
   <td><a style="color:red" href="<?php echo base_url(); ?>bridal/bdelete/<?= $dt->id; ?>"><i class="fa fa-yelp" aria-hidden="true">remove</i></a></td>
    </tr>
<?php } ?>
  </tbody>
</table>

<br><br><br><br><br><br><br><br><br>



<div class="pull-right"> 
               <a href="<?php echo base_url(); ?>bridal/login" class="btn btn-danger btn-lg btn-block" role="button" aria-pressed="true">Logout</a> 
      </div> 

            <!-- /.box -->
         </div>
      </div>
      <!-- /.row
   </section> -->
   <!-- /.content -->
</div>

            </div>
        </div>