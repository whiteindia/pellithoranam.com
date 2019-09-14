<body class="wed-add-photo-theme">
   <!-- ADD-PHOTO -->
   <div class="wed-wrapper">
   <div class="wed-add-photo-div">
    <div class="min_height_div" style="">
      <h1>Identity Badge</h1>
      <h4>To get this badge, please upload <br>a copy of any Government-<br>issued ID cards</h4>
      <button class="wed-add-now-btn" data-toggle="modal" data-target="#addphoto">Upload</button>
      <!-- <button class="wed-add-now-btn" data-toggle="modal" data-target="#privacy">Photo Privacy</button> -->
      <?php
         if($this->session->flashdata('message')) {
         $message = $this->session->flashdata('message');?>
         <div class="badgr_error">
            <?php echo $message['message']; ?>
         </div>
      <?php } ?>

    </div>

      <!-- ADD-PHOTO-POP-UP -->
      <div class="modal fade wed-add-modal" id="addphoto" role="dialog">
         <div class="modal-dialog wed-add-modal-dialogue">
            <div class="modal-content wed-add-modal-content">
               <div class="modal-body  wed-add-modal-body">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4>Identity Badge</h4>
                  <!--   <p>please upload <br>a copy of any Government-<br>issued ID cards </p> -->
                  <form method="post" enctype="multipart/form-data" role="form" 
                  action="<?php echo base_url();?>profile/upload_multi_badge" data-parsley-validate="">
                     <div class="">
                        <select class="wed-reg-modal-select" id="idproof" name="idproof" data-parsley-trigger="change" required="">
                           <option value="">Select Proof</option>
                           <option value="passport">Passport</option>
                           <option value="driving_license">Driving License</option>
                           <option value="ration_card">Ration Card</option>
                           <option value="aadhar_card">Aadhar Card</option>
                           <option value="pan_card">Pan Card</option>
                        </select>
                     </div>
                     <br>
                     <div class="wed-add-modal-footer">
                        <div class="wed-btn">
                        </div>
                        <div class="wed-add-modal-footer">
                           <input class="wed-file-type1" type="file" name="badge[]" value="upload Photo">
                           <button class="wed-modal-btn">Choose Badge</button>
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
                  <div class="wed-photoprivacy" style="text-align: left;">
                     <input id="nm" name="privacy" type="radio">
                     <label for="nm">Visible to all</label><br/>
                     <input id="dvsd" name="privacy" type="radio">
                     <label for="dvsd">Visible only to members whom I had contacted / responded</label>
                  </div>
               </div>
            </div>
         </div>
         <div class="wed-add-skip-bay">
            <button class="wed-skip-btn">Skip</button>
         </div>
      </div>
   </div>
</body>