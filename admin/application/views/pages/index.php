
  <style>
      select { width: 180px !important;display: inline !important; }
     .box-header { height: 60px; }
     .DTTT_container { display: inline !important;float: right !important; }
     .dataTables_length,.dataTables_filter { display: inline !important; }
     .dataTables_filter { float: right !important;margin-right: 20px; }
     .search-div { padding-left: 0px !important; padding-right: 0px !important;margin-top: 0px !important; }
     .search-div button { min-height: 34px; }
     .dataTables_filter input { width: 280px !important; }
   </style>

   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
          View Pages
       </h1>
       <br><div> 
    </div>

    <ol class="breadcrumb">
      <li><a href="#"><i class=""></i>Home</a></li>
      <li><a href="<?php echo base_url(); ?>bridal">View Collection</a></li>
      <li class="active">View Page List</li>
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
         <a type="button" class="btn btn-success" href="<?php echo base_url(); ?>pages/add_page">Add Paage</a>
         <!-- /.box -->
         <div class="box">

            <div class="box-header col-md-12" style="border-right: 1px solid #ededed;border-bottom: 1px solid #3c8dbc;background: #f9f9f9;">
               <form method="post" action="javascript:void(0);">
               <div class="col-md-11" style="width: auto;">
                <input type="text" class="form-control" id="bc_title" placeholder = "Search By Title.." value="">
               

               </div>
               <div class="col-md-1 search-div" style="margin-top: 12px;">
                  <button type="button" class="btn btn-success" id="column_search"><i class="fa fa-search"></i></button>
               </div>
             </form>
             <div class="clearfix"></div>
             </div>

            


            <!-- /.box-header -->
             <div class="box-body" style="margin-top: 74px !important;">

                 <table id="collection_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sl No</th>
                          <th>Title</th>
                          <th>Slug</th>              
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <tr>
                          <th>Sl No</th>
                          <th>Title</th>
                          <th>Slug</th>                    
                          <th>Action</th>
                        </tr>
                      </tfoot> 
                 </table>
               </div>
             
           <!-- /.box -->
        </div>
        <!-- /.col -->
     </div>
     <!-- /.row -->
  </section>
  <!-- /.content -->
</div>



