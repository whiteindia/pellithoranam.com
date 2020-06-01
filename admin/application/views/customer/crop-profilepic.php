<!--<link rel="stylesheet" href="http://jcrop-cdn.tapmodo.com/v0.9.12/css/jquery.Jcrop.min.css" type="text/css" />
<script src="http://edge1u.tapmodo.com/global/js/jquery.min.js"></script>
<script src="http://jcrop-cdn.tapmodo.com/v0.9.12/js/jquery.Jcrop.min.js"></script>  -->

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.Jcrop.min.css">
    <script src="<?php echo base_url();?>/assets/js/jquery.Jcrop.min.js"></script>   
<!--    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
 <script src="<?php// echo base_url();?>/assets/js/jqueryj.min.js"></script>-->
<!-- <style>#cropbox { display: inline !important; visibility: visible !important;width: 100% !important;height: 100% !important; }</style> -->

   <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Crop Profile Picture</h1><br>

     
      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li><a href="#">Profilepic Details</a></li>
         <li class="active">Crop Profile Picture</li>
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
                  <h3 class="box-title">Crop Profile Picture</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <b><u><?php echo "T".$prof_user; ?></u></b><br/>
                  <img src="<?php echo site_url()."../../../".$prof_pic;?>" id="cropbox" >
                
                   <div class="jc_coords">
                  <form action="<?php echo base_url(); ?>Customer/save_croped" method="post" onsubmit="return checkCoords();">
                    <input type="hidden" name="picid" value="<?php echo $picid; ?>">
                    <input type="hidden" name="photo" value="<?php echo $prof_pic; ?>">
                    <input type="hidden" name="prof_preference" value="<?php echo $prof_preference; ?>">
                    <input type="hidden" name="user_matr" value="<?php echo $prof_user; ?>">.
                     <input type="hidden" id="x" name="x" />
                     <input type="hidden" id="y" name="y" />
                     <input type="hidden" id="w" name="w" />
                     <input type="hidden" id="h" name="h" />
                     <?php $data = getimagesize(site_url()."../../../".$prof_pic);
                      $width = $data[0];
                      $height = $data[1]; 
                      //print_r($width);print_r($height);
                      ?>
                     <input type="hidden" id="org_w" value="<?php echo $width; ?>" name="org_w" />
                     <input type="hidden" id="org_h" value="<?php echo $height; ?>" name="org_h" />
                     <a><button class="btn add-new" type="submit"><b>Crop Image</b></button></a>
                  </form>

                  </div>
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

<script language="Javascript">

(function($) {
    $(window).load(function() {
          $('#cropbox').Jcrop({
           // aspectRatio: 1,
          aspectRatio: 20 / 30,
            onSelect: updateCoords
          });
    });
})(jQuery);

function updateCoords(c)
{
  jQuery('#x').val(c.x);
  jQuery('#y').val(c.y);
  jQuery('#w').val(c.w);
  jQuery('#h').val(c.h);
};

function checkCoords()
{
  if (parseInt(jQuery('#w').val())>0) return true;
  alert('Please select a crop region then press submit.');
  return false;
};

/*jQuery(function () {
  jQuery('#showcode').FieldsetToggle('Code for this demo');
});*/

</script>