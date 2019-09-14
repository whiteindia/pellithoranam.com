
 <body class="wed-add-photo-theme">
    <!-- ADD-PHOTO -->
<div class="wed-wrapper">
    <div class="wed-add-photo-div">
      <h1>Add a photo to complete your profile</h1>
      <h4>Profiles with Photos get 20 times <br>more responses !</h4>

      <div class="wed-photo-add-pic">
        <div class="wed-photo-add-btn">+</div>
      </div>
      <button class="wed-add-now-btn" data-toggle="modal" data-target="#addphoto">Add Photo Now</button>
      <button class="wed-add-now-btn" data-toggle="modal" data-target="#privacy">Photo Privacy</button>
             <?php
               if($this->session->flashdata('message')) {
               $message = $this->session->flashdata('message');
               ?>
            <div id="error_msges" style="color: red !important;">
              <!--  <button class="close" data-dismiss="alert" type="button">×</button> -->
               <?php echo $message['message']; ?>
            </div>
            <?php
               }
               ?>
       <h4>Allowed Type: jpg, png<br/>Max.Size: 5mb</h4>
    
      <!-- ADD-PHOTO-POP-UP -->

      <div class="modal fade wed-add-modal" id="addphoto" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Are You Sure?</h4>
              <p>If you don’t upload your photo now, <br>
                Potential matches may not contact you </p>
            <div class="wed-add-modal-footer">
              <form method="post" enctype="multipart/form-data" role="form" action="<?php echo base_url();?>profile/upload_photo">
               <div class="wed-btn">

               </div>
               <div class="wed-add-modal-footer">
                 <input class="wed-file-type1" type="file" name="image" value="upload Photo">
                 <button class="wed-modal-btn">Upload Photo</button>

                 <input class="wed-modal-btn" type="submit" value="Submit">
               </div>
             </form>
              </div>

            </div>

          </div>
        </div>
      </div>



      <!-- PRIVACY-POP-UP -->

      <div class="modal fade wed-add-modal" id="privacy" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Set Privacy</h4>
              <p>Your Photo Privacy has been set to <br>"Visible only to members whom I had Contacted / Responded" </p>
      
 <form method="post" enctype="multipart/form-data" role="form" action="<?php echo base_url();?>profile/set_privacy">
                <div class="wed-photoprivacy" style="text-align: left;">
                        <input id="nm" name="profile_preference" type="radio" value="0" <?php echo ($privacy->profile_preference== '0') ?  "checked" : "" ;  ?>>
                        <label for="nm">Visible to all</label><br/>
                        <input id="dvsd" name="profile_preference" type="radio" value="1" <?php echo ($privacy->profile_preference== '1') ?  "checked" : "" ;  ?>>
                        <label for="dvsd">Visible only to members whom I had contacted / responded</label>
                       
                    </div>
           <input class="wed-modal-btn" type="submit" value="Submit">
             <input class="wed-modal-btn" style="text-align:center;" value="Cancel" data-dismiss="modal">
                </form>


            </div>

          </div>
        </div>







      <div class="wed-add-skip-bay">
        <button class="wed-skip-btn">Skip</button>
      </div>

    </div>

</div>




</body></html>
