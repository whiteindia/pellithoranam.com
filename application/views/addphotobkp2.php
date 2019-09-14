
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
                
   <!--             ///////////////  testing/////////////-->
                
                
 <!--                <script src="js/jquery.min.js"></script>

imgAreaSelect jQuery plugin --><!--
<link rel="stylesheet" href="css/imgareaselect.css" />
<script src="js/jquery.imgareaselect.js"></script>   -->

<script>
// Check coordinates
function checkCoords(){
	if(parseInt($('#w').val())) return true;
	alert('Please select a crop region then press upload.');
	return false;
}

// Set image coordinates
function updateCoords(im,obj){
	var img = document.getElementById("imagePreview");
	var orgHeight = img.naturalHeight;
	var orgWidth = img.naturalWidth;
	
	var porcX = orgWidth/im.width;
    var porcY = orgHeight/im.height;
	
	$('input#x').val(Math.round(obj.x1 * porcX));
    $('input#y').val(Math.round(obj.y1 * porcY));
    $('input#w').val(Math.round(obj.width * porcX));
    $('input#h').val(Math.round(obj.height * porcY));
}

$(document).ready(function(){
	// Prepare instant image preview
	var p = $("#imagePreview");
	$("#fileInput").change(function(){
		//fadeOut or hide preview
		p.fadeOut();

		//prepare HTML5 FileReader
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("fileInput").files[0]);

		oFReader.onload = function(oFREvent){
			p.attr('src', oFREvent.target.result).fadeIn();
		};
	});

	// Implement imgAreaSelect plugin
	$('#imagePreview').imgAreaSelect({
		onSelectEnd: updateCoords
	});
});
</script>

<style>
.container{
	padding: 20px;
}
#imagePreview{
    display: inline-block;
    max-width: 100%;
    height: auto;
    padding: 4px;
    line-height: 1.42857143;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
}
</style>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.0.min.js"></script> 
  <link rel="stylesheet" href="https://www.pellithoranam.com/assets/css/imgareaselect.css">
    <script src="https://www.pellithoranam.com/assets/js/jquery.imgareaselect.js"></script> 

      
</head>
<body>
    <?php
$error = '';

// If the upload form is submitted
if(isset($_POST["upload"])){
    // Get the file information
   
    $fileName   = basename($_FILES["image"]["name"]);
    $fileTmp    = $_FILES["image"]["tmp_name"];
    $fileType   = $_FILES["image"]["type"];
    $fileSize   = $_FILES["image"]["size"];
    $fileExt    = substr($fileName, strrpos($fileName, ".") + 1);
      echo 2;
    // Specify the images upload path
    $largeImageLoc ='assets/temp/'.$fileName;
    $thumbImageLoc ='assets/temp/img/'.$fileName;

    // Check and validate file extension
    if((!empty($_FILES["image"])) && ($_FILES["image"]["error"] == 0)){
        if($fileExt != "jpg" && $fileExt != "jpeg" && $fileExt != "png" && $fileExt != "gif"){
            $error = "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    }else{
        $error = "Select an image file to upload.";
    }
    echo "-------------";
    echo $fileName;
  // echo "<script>alert('in post'+$fileName);</script>";
    // If everything is ok, try to upload file
    if(empty($error) && !empty($fileName)){
         echo $filename;
        if(move_uploaded_file($fileTmp, $largeImageLoc)){
             echo 4;
            // File permission
            chmod($largeImageLoc, 0777);
            
            // Get dimensions of the original image
            list($width_org, $height_org) = getimagesize($largeImageLoc);
            
            // Get image coordinates
            $x = (int) $_POST['x'];
            $y = (int) $_POST['y'];
            $width = (int) $_POST['w'];
            $height = (int) $_POST['h'];

            // Define the size of the cropped image
            $width_new = $width;
            $height_new = $height;
            
            // Create new true color image
            $newImage = imagecreatetruecolor($width_new, $height_new);
             echo 5;
            // Create new image from file
            switch($fileType) {
                case "image/gif":
                    $source = imagecreatefromgif($largeImageLoc); 
                    break;
                case "image/pjpeg":
                case "image/jpeg":
                case "image/jpg":
                    $source = imagecreatefromjpeg($largeImageLoc); 
                    break;
                case "image/png":
                case "image/x-png":
                    $source = imagecreatefrompng($largeImageLoc); 
                    break;
            }
            
            // Copy and resize part of the image
            imagecopyresampled($newImage, $source, 0, 0, $x, $y, $width_new, $height_new, $width, $height);
             echo "<script>alert('in post2');</script>";
            // Output image to file
            switch($fileType) {
                case "image/gif":
                    imagegif($newImage, $thumbImageLoc); 
                    break;
                case "image/pjpeg":
                case "image/jpeg":
                case "image/jpg":
                    imagejpeg($newImage, $thumbImageLoc, 90); 
                    break;
                case "image/png":
                case "image/x-png":
                    imagepng($newImage, $thumbImageLoc);  
                    break;
            }
            
            // Destroy image
            imagedestroy($newImage);
            
            // Remove original image
            //unlink($imageUploadLoc);

            // Display cropped image
            echo 'CROPPED IMAGE:<br/><img src="assets/temp/img/'.$thumbImageLoc.'"/>';
        }else{
             echo 6;
            $error = "Sorry, there was an error uploading your file.";
        }
    }
}

// Display error
echo $error;
?>
<div class="container">
	<form method="post" action="<?php echo base_url();?>profile/upload_photo" enctype="multipart/form-data" onsubmit="return checkCoords();">
		<p>Image: <input name="image" id="fileInput" size="30" type="file" /></p>
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />
		<input name="upload" type="submit" value="UPLOAD" />
	</form>
	<p><img id="imagePreview" style="display:none;"/></p>
</div>
                
   <!--      /////////////////////end/////////////////////       -->
       <!--         
              <form method="post" enctype="multipart/form-data" role="form" action="<?php echo base_url();?>profile/upload_photo">
               <div class="wed-btn">

               </div>
               <div class="wed-add-modal-footer">
                 <input class="wed-file-type1" type="file" name="image" value="upload Photo">
                 <button class="wed-modal-btn">Upload Photo</button>

                 <input class="wed-modal-btn" type="submit" value="Submit">
               </div>
             </form>  -->
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
