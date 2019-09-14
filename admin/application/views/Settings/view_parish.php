<div class="content-wrapper main-cnt-ht">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         View Parish Details
      </h1>
      <br>
      <div> 
         <a href="<?php echo base_url(); ?>Settings_ctrl/add_parish">
         <button class="btn add-new" type="button">
         <b><i class="fa fa-fw fa-plus"></i> Add New</b>
         </button>
         </a>
      </div>
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li class="active">View Parish Details</li>
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
                  <h3 class="box-title">View Parish Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>ParishName</th>
                           <th>CityName</th>
                           <th>CountryName</th>
                           <th>StateName</th>
                           <th width="200px;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           foreach($data as $parish) {   
                           // $image=$sub->image;
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $parish->id; ?></td>
                           <td class="center"><?php echo $parish->parish_name; ?></td>
                           <td class="center"><?php echo $parish->city_name; ?></td>
                           <td class="center"><?php echo $parish->country_name; ?></td>
                           <td class="center"><?php echo $parish->state_name; ?></td>
                           <td class="center">                                                             
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url('Settings_ctrl/edit_parish/'.$parish->id); ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
                              <a class="btn btn-sm btn-danger" href="<?php echo base_url('Settings_ctrl/delete_parish/'.$parish->id); ?>" onClick="return doconfirm()">
                              <i class="fa fa-fw fa-trash"></i>Delete</a>                    
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