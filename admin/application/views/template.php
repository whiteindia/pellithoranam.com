
<!DOCTYPE html>
<html>
<?php 
$this->load->view('Templates/header-script');
?>

 <?php 

$this->load->view('Templates/header-menu');
 $this->load->view('Templates/left-menu');
 $this->load->view($page);
$this->load->view('Templates/footer');
?>

<?php
$this->load->view('Templates/footer-script');

?>
  </body>
</html>