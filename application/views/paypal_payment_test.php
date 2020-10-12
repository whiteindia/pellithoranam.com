<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!------ 
<link rel="stylesheet" href="bootstrap.min.css" />
		<script src="bootstrap.min.js"></script>
<script src="jquery.min.js"></script>
Include the above in your HEAD tag ---------->
<style>
	 * {
    -webkit-print-color-adjust: exact !important;   /* Chrome, Safari */
    color-adjust: exact !important;                 /*Firefox*/
}
    #invoice{
    padding: 20px;
}

.invoice {
    position: relative;
    background-color: #fff0;
    min-height: 680px;
    padding: 15px
}

.invoice header .colss {
    padding: 10px 17px;
    margin-bottom: 20px;
	border-bottom: 1px solid #3989c6;
	background:linear-gradient(0deg, rgb(242 119 53), rgb(115 171 59)) !important;
	color: #fff !important;
    font-size: 1.6em;
   
}
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #0120d0
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: white;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #211e1d;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff !important;
    font-size: 1.6em;
    background: #73ab3b !important
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.imgs{
    min-height:100%;
  background:linear-gradient(0deg, rgb(242 119 53 / 45%), rgb(115 171 59 / 51%)), url(image.png) !important;
  background-size:cover;
  -webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
   
}

.invoice table tfoot tr:last-child td {
    color: #f28135;
    font-size: 1.4em;
    border-top: 1px solid #f28135
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>

<?php
$package=$this->Package_model->get_amount('30');
$my_matr_id = $this->session->userdata('logged_in');
$query = $this->db->where('matrimony_id',$my_matr_id->matrimony_id);
$query = $this->db->get('profiles');
$user = $query->row();
//print_r($user);
//exit();
$booked=array();
//index.php
$booked['purchase_amount']=1000;
$message = '';
$booked['txnid']=time();
//$user = $this->Package_model->get_account();
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
$now=date('d-m-Y H:i:s');
//$connect = new PDO("mysql:host=localhost;dbname=test", "root", "");
//$connect
//function fetch_customer_data()
//{
	//$query = "SELECT * FROM customer";
	//$statement = $connect->prepare($query);
	//$statement->execute();
	//$result = $statement->fetchAll();
    $output='
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body style="border: 1px solid black;padding-bottom:90vh;padding-left:5vw;"padding-right:5vw;">
    
    <div class="container-fluid">
          <table class="table">
        <thead >
          <tr>
            <th><img src="https://pellithoranam.com/assets/logo/pellithoranam_logo.png" width="150px" height="75px" data-holder-rendered="true" /></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
    
          <tr>
            <td>.</td>
            <td class="text-warning"></td>
            <td><h2 style="font-family:Georgia,Times New Roman, Times, serif ;color:black !important;">
                            Pellithoranam
                            
                        </h2><h3><span  style="color:black !important;">
                        Kukatpally, Hyderabad,500090 <br>
                        8187823936<br>
                        info@pellithoranam.com</span></h3>
                        </td>
          </tr>
    
        </tbody>
      </table>
      <hr class="bg-success">
      <table class="table">
      <thead >
        <tr>
          <th><h3>INVOICE TO:</h3>
          <h4>  <br>'.$user->profile_name.' [PT'.$user->matrimony_id.']
                <br>'.$user->email.'</h4>
          </th>
          <th></th>
          <th></th>
        </tr>
        <tr></tr>
      </thead>
      <tbody>
  
        <tr>
          <td>.</td>
          <td class="text-warning"></td>
          <td>
      <h2>   PT'.$user->matrimony_id.'</h2> 
       <h3>   <br> date of invoice:'.$now.'
                    </h3>  </td>
        </tr>
  <tr>
  <td>.</td>
  <td>.</td>
  <td>.</td>
  </tr>
  <tr>
  <td>.</td>
  <td>.</td>
  <td>.</td>
  </tr>
      </tbody>
    </table>
    <hr class="bg-success">
    <br>
    <br>
      <table class="table">
        <thead class="bg-success">
          <tr style="background-color:#228B22;color: white;">
            <th><h2>#</h2></th>
            <th><h2>PACKAGE</h2></th>
            <th><h2>AMOUNT</h2></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><h2></h2></td>
            <td><h2>'. $package->package_name.'</h2></td>
            <td><h2>'.$booked['purchase_amount'].'</h2></td>
          </tr>
          <tr style="color:red;" >
            <td><h2>.</h2></td>
            <td><h2>GRAND TOTAL</h2></td>
            <td><h2>'.$booked['purchase_amount'].'</h2></td>
          </tr>
          <tr>
          <td></td>
          </tr>
<tr>
<td><h2>Transactionid'.$booked['txnid'].'</h2></td>
</tr>
          <tr>
          <br><br><br><br>
          <td>Terms & conditions</td>
          <td colspan="2"></td>
          <footer style="color: green;">
          This Package is not transferable to others and no refund of money is entertained.
      </footer>
      <br>
      <footer style="color: green;">
          Invoice was created on a computer and is valid without the signature and seal.
      </footer>
      <br>
      <footer style="color: green;">
      '. $package->terms.'
  </footer>
        </tr>
    
        </tbody>
      </table>
    
    
    
    </div>
    </body>
    </html>

    ';
    $output1 = '
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<div id="invoice">
	<div class="invoice overflow-auto">
	<div style="min-width:600px">
		<header>
			<div class="row">
				<div class="col colss">
				<a target="_blank" href="#">
                            <img src="https://pellithoranam.com/assets/logo/pellithoranam_logo.png" width="250px" height="100px" data-holder-rendered="true" />
                            </a>
				</div>
				<div class="col company-details colss">
					<h2 style="font-family:Georgia,Times New Roman, Times, serif ;color:black !important;">
						Pellithoranam
						
					</h2>
					<div style="color:black !important;" >Kukatpally, Hyderabad,500090</div>
					<div style="color:black !important;">8187823936</div>
					<div  style="color:black !important;">info@pellithoranam.com</div>
				</div>
			</div>
		</header>
		<main>
			<div class="row contacts">
				<div class="col invoice-to">
					<div class="text-gray-light">INVOICE TO:<span class="to"  style="color: orange;">'.$user->profile_name.' [PT'.$user->matrimony_id.']</span></div>
					<div class="date">Date of Invoice: '.$now.'</div>
				   
				</div>
			</div>

                <div class="payment_page" style="">
                    <h3>Payment Details</h3>
                    <div class="section_det">
                        <div class="detail_list">
                            <div class="col-md-6"><b>Transaction Id :</b>: '.$booked['txnid'].'</div>
                      
                            <div class="col-md-6"><b>Name </b>: '.$user->profile_name.'</div>
                        
                            <div class="col-md-6"><b>Matrimoni Id </b>: '. $user->matrimony_id.'</div>
                        
                            <div class="col-md-6"><b>Package Name </b>: '.$package->package_name.'</div>
                          
                            <div class="col-md-6"><b>Amount</b>: '.$booked['purchase_amount'].'</div>
                      
                            <div class="col-md-6"><b>Date</b>: '.date('d:m:Y H:i:S').'</div>
                        </div>
                    </div>
                </div>



        </main>
    
        <footer style="color: green;">
		This Package is not transferable to others and no refund of money is entertained.
	</footer>
	<footer style="color: green;">
		Invoice was created on a computer and is valid without the signature and seal.
	</footer>
		<div></div></div>
	';
	//return $output;
//}



$this->load->library('Pdf');
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$obj_pdf->SetTitle('Pellithoranam');
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Pellithoranam', PDF_HEADER_STRING);
//$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
/*ob_start();
    // we can have any view part here like HTML, PHP etc
    $content = ob_get_contents();
ob_end_clean();*/
$obj_pdf->writeHTML($output, true, false, true, false, '');
$t=time();
$filename=$user->matrimony_id.'_'.$t;
$pdff = $obj_pdf->Output($filename.'.pdf', 'S');
if(file_put_contents('/var/www/html/assets/uploads/invoices/'.$filename.'.pdf', $pdff)){

    echo 'success';// // exit();
}else{
    echo 'failed'; exit();

}

//ini_set('default_charset', 'UTF8');

        $sendMessage = '<html>
                    <body bgcolor="#EDEDEE">
                    <p><strong> Dear:  '. $user->profile_name. '!</strong></p>
                     <p> Email:  '.$user->email.'</p>
                     <p> Message: PAYMENT INVOICE for package purchase from pellithoranam.com</p>
                     <p>Team: <strong>Pellithoranam</strong><p>
                  </body>
                  </html>';
                  
 $subject="invoice mail for payment to pellithoranam";

                  $this->load->library('email');
                  $config = array();
                  $config['protocol'] = 'smtp';
                  $config['smtp_host'] = 'smtp.gmail.com';
                  $config['smtp_user'] = 'my.pellithoranam.com@gmail.com';
                  $config['smtp_pass'] = 'yepxdmiehcigrhtn';
                  $config['smtp_port'] = '587';
                  $config['smtp_crypto'] = 'tls'; 
                  $config['CharSet']    = 'utf-8';
                $config['mailtype'] = 'html';
                  $this->email->initialize($config);
              
                  $this->email->set_newline("\r\n");
              
                  $this->email->from('info@pellithoranam.com');
                //  $this->email->to('kvs116.wi@gmail.com');
                 $this->email->to($user->email);
                  $this->email->subject('=?UTF-8?q?'.quoted_printable_encode($subject).'?=');//mb_encode_mimeheader($subject,"UTF-8")  vmb_encode_mimeheader($subject, 'UTF-8', 'B', "\r\n", strlen('Subject: '))
                  $this->email->message($output1);
              
                  $resume_tmp_path = '/var/www/html/assets/uploads/invoices/'.$filename.'.pdf';
              
                  $this->email->attach($resume_tmp_path);
                  if ($this->email->send()) {
                    $this->session->set_flashdata('success','Email Sent');
                    echo 'success email sent';
                  //  exit();
                  //  redirect(base_url());
                  } else{
                    show_error($this->email->print_debugger());
                    echo 'failed email ';
                  //  exit();
                  }









                  
/**
$config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'my.pellithoranam.com@gmail.com',
    'smtp_pass' => 'PTM#1234',
    'mailtype'  => 'html',
    'charset'   => 'utf-8'
);

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from('Noreply@pellithoranam.com', 'pellithoranam');
        $this->email->to('kvs116.wi@gmail.com');
        $this->email->subject('Invoice');
        $this->email->message('This is my message');
     
      $this->email->attach('/var/www/html/assets/uploads/invoices/'.$filename);
   if($this->email->send()){
       echo 'success';
       exit();
   }else{
    echo 'Failed';
    echo $this->email->print_debugger();
    exit();
   }  */
/*
   $this->load->library('Mailgun_lib');
   $mgClient = new Mailgun_lib();
   $from_name = "Pellithoranam";
   $from = "no-reply@pellithoranam.com";
 //  $bcc = "info@pellithoranam.com";
   $mgClient->to('kvs116.wi@gmail.com');  
   //  $mgClient->to($email); 
//   $mgClient->bcc($bcc);   'attachment' => [ _attachments

   $mgClient->from($from,$from_name);
   $mgClient->subject('Invoice');
   $mgClient->message($output);
   $mgClient->attach(FCPATH.'assets/uploads/invoices/'.$filename);
   if($mgClient->send()){
       echo '<br> success<br>';
       echo FCPATH.'assets/uploads/invoices/'.$filename;
       exit();
   }else{
    echo 'failed'; exit();
   }
   */




 $this->session->set_flashdata('success', 'Your contact information sent successfully. You will be notify via email.');



?>
<!--<html>
    <head>
        <title></title></head>
	<body > -->



		<br />
		<div class="container-fluid">
			
			<form action="mailinvoice" method="post">
			<div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <input type="hidden" name="output" value="<?= htmlentities($output); ?>">
		<!--	<button class="btn btn-info" type="submit" name="action"><i class="fa fa-file-pdf-o"></i> Send Mail</button><?php echo $message; ?> -->
        </div>
        <hr>
    </div>
	
			
			</form>
			<br />
			<?php
			echo $output1;
			?>			
		</div>
		<br />
		<br />
	
	<script>
    $('#printInvoice').click(function(){
           Popup($('.invoice')[0].outerHTML);
           function Popup(data) 
           {
               window.print();
               return true;
           }
       });
   </script>
   <!--
   </body>
</html> -->







<!--


<div class= "container">
    <div class="col-lg-3 col-md-3 col-sm-2"></div>
    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
        <div class="section">
            <h2 class="section_head">PAYMENT SUCCESSFULLY COMPLETED</h2> 
            <form role="form" class='myform' id="" method="post">
                <div class="payment_page" style="">
                    <h3>Payment Details</h3>
                    <div class="section_det">
                        <div class="detail_list">
                            <div class="col-md-6"><b>Booking Id :</b></div>
                            <div class="col-md-6">: <?php echo $booked['txnid'];?></div>
                        </div>
                        <div class="detail_list">
                            <div class="col-md-6"><b>Name </b></div>
                            <div class="col-md-6">: <?php echo $user->profile_name;?></div>
                        </div>
                        <div class="detail_list">    
                            <div class="col-md-6"><b>Matrimoni Id </b></div>
                            <div class="col-md-6">: <?php echo $user->matrimony_id; ?></div>
                        </div>
                        <div class="detail_list">    
                            <div class="col-md-6"><b>Package Name </b></div>
                            <div class="col-md-6">: <?php echo $package->package_name; ?></div>
                        </div>
                        <div class="detail_list">    
                            <div class="col-md-6"><b>Amount</b></div>
                            <div class="col-md-6">: <?php echo $booked['purchase_amount']; ?></div>
                        </div>
                        <div class="detail_list">    
                            <div class="col-md-6"><b>Date</b></div>
                            <div class="col-md-6">: <?php echo $booked['purchase_date']; ?></div>
                        </div>
                    </div>
                </div>
           
            </form>
            <div class="home_cabin">
               <div class="btn home_btn"><a href="<?php echo base_url();?>search">HOME</a></div>
            </div>
        </div>
    <div class="col-lg-3 col-md-3 col-sm-2"></div>
    </div>
</div> -->