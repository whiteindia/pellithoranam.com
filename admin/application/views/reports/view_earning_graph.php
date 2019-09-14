
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Earning Graph
      </h1>
      <a href="<?php echo base_url(); ?>Reports/view_amount_report" class="btn btn-success">Back </a>
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
   <!--       <li><a href="<?php echo base_url(); ?>Home_ctrl/view_subcategory">Package Details</a></li> -->
         <li class="active">Earning Graph</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->

         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Earning Graph</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			   <div id="line-example"></div>
            </div>
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

<script>
$(document).ready(function() {
/*
 * Play with this code and it'll update in the panel opposite.
 *
 * Why not try some of the options above?
 */
 //$.get("load_graph", function( datas ) { alert(datas); });
Morris.Line({
  element: 'line-example',
  data: <?php echo json_encode($graph);?>,
  xkey: 'y',
  ykeys: ['total'],
  labels: ['Total Earn'],
  xLabelFormat: function (x) {
        var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
        var month = IndexToMonth[ x.getMonth() ];
        var year = x.getFullYear();
        return year + ' ' + month;
    },
});

});
</script>