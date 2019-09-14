
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
          View Reports
       </h1>
       <br><div> 
    </div>

    <ol class="breadcrumb">
      <li><a href="#"><i class=""></i>Home</a></li>
      <li><a href="<?php echo base_url(); ?>Packages/view_packages">View Reports</a></li>
      <li class="active">View Reports</li>
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

            <div class="box-header col-md-12" style="border-right: 1px solid #ededed;border-bottom: 1px solid #3c8dbc;background: #f9f9f9;">
               <form method="post" action="<?php echo base_url();?>Reports/view_result/search">
               <div class="col-md-11" style="width: auto;">
                  <label class="date-lebel">From</label>
                  <input type="text" class="form-control date-input" name="from_date" id="from_date" placeholder="From Date" value="<?php echo date("Y-m-d",strtotime("-3 Months"));?>">
                  <label class="date-lebel">To</label>
                  <input type="text" class="form-control date-input" name="to_date" id="to_date" placeholder="From Date" value="<?php echo date("Y-m-d");?>">
                  <style type="text/css">
                    .date-lebel{width: 180px !important;display: inline !important;}
                    .date-input{width: 180px !important;display: inline !important;}
                  </style>
                 

               
               <select class="form-control" name="member_type" id="member_type">
                     <option value="1">Inactive Members</option>
                     <option value="2">Expired Members</option>
               </select>
               
               </div>
               <div class="col-md-1 search-div" style="margin-top: 12px;">
                  <button type="button" class="btn btn-success" id="column_search"><i class="fa fa-search"></i></button>
                  <div class="btn-group pull-right">
                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#874DA3;min-height: 34px;border-radius: 0px;"><span class="caret"></span>
                     </button>
                     <ul class="dropdown-menu" style="margin-left: -90px;">
                       <!-- <li><a href="<?php echo base_url();?>Reports/view_reports">Generate Graph</a></li> -->
                       <li><a href="<?php echo base_url();?>Reports/view_signup_graph">Signups Graph</a></li>
                       <li role="separator" class="divider"></li>
                       <li><a href="#">Reports</a></li>
                     </ul>
                  </div>
               </div>
             </form>
            </div>

           


            <!-- /.box-header -->
             <div class="box-body" style="margin-top: 74px !important;">

                 <table id="inactive_users_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sl No</th>
                          <th>Name</th>
                          <th>Birth Date</th>
                          <th>Gender</th>                     
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Membership Info</th>
                          <th>Expire Date</th>
                          <th>Profile Link</th>
                          <th>Profile Link</th>
                          <th>Registered On</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <tr>
                          <th>Sl No</th>
                          <th>Name</th>
                          <th>Birth Date</th>
                          <th>Gender</th>                     
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Membership Info</th>
                          <th>Expire Date</th>
                          <th>Profile Link</th>
                          <th>Profile Link</th>
                          <th>Registered On</th>
                          <th>Status</th>
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
<div class="modal fade modal-wide" id="popup-subcatgetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title">View Reports Details</h4>
      </div>
      <div class="modal-subcatbody">
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

<script>
$( document ).ready(function() {

$(".cst-select-1").on('change', function () {
        var valueSelected = $(this).val();
        var select_type   = $(this).attr('cst-attr');
        var select_destn  = $(this).attr('cst-for');
        var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;

        $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>reports/get_drop_data',
        data:  passdata_2,
        success: function(data){
          //alert(data);
               $("#"+select_destn+"-selector").html(data);
            }
        });
    });
 });
</script>

