<?php

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
	$output = '
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
					<div class="text-gray-light">INVOICE TO:</div>
					<h2 class="to"  style="color: black;">Customer Name</h2>
					<div class="address">Hyderabad</div>
					<div class="email"><a href="mailto:'.$user->matrimony_id.'" style="color: black;">'.$user->matrimony_id.'</a></div>
				</div>
				<div class="col invoice-details">
					<h1 class="invoice-id" style="color:#171615;">'.$user->matrimony_id.'</h1>
					<div class="date">Date of Invoice: '.$now.'</div>
				   
				</div>
			</div>

                <div class="payment_page" style="">
                    <h3>Payment Details</h3>
                    <div class="section_det">
                        <div class="detail_list">
                            <div class="col-md-6"><b>Transaction Id :</b></div>
                            <div class="col-md-6">: '.$booked['txnid'].'</div>
                        </div>
                        <div class="detail_list">
                            <div class="col-md-6"><b>Name </b></div>
                            <div class="col-md-6">: '.$user->profile_name.'</div>
                        </div>
                        <div class="detail_list">    
                            <div class="col-md-6"><b>Matrimoni Id </b></div>
                            <div class="col-md-6">: '. $user->matrimony_id.'</div>
                        </div>
                        <div class="detail_list">    
                            <div class="col-md-6"><b>Package Name </b></div>
                            <div class="col-md-6">: '. $package->package_name.'</div>
                        </div>
                        <div class="detail_list">    
                            <div class="col-md-6"><b>Amount</b></div>
                            <div class="col-md-6">: '.$booked['purchase_amount'].'</div>
                        </div>
                        <div class="detail_list">    
                            <div class="col-md-6"><b>Date</b></div>
                            <div class="col-md-6">: '.date('d:m:Y H:i:S').'</div>
                        </div>
                    </div>
                </div>



        </main>
        <button onclick="window.print()">Print/Download this page</button>
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
$obj_pdf->SetTitle('Hafiz Adil');
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Hafiz Adil', PDF_HEADER_STRING);
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
$obj_pdf->writeHTML('Medicine', true, false, true, false, '');
$t=time();
$filename=$user->matrimony_id.$t;
$pdff = $obj_pdf->Output($filename.'.pdf', 'S');

//file_put_contents($file_name, $file);



        $sendMessage = '<html>
                    <body bgcolor="#EDEDEE">
                    <p><strong> Dear:  '. $user->profile_name. '!</strong></p>
                     <p> Email:  '.$user->email.'</p>
                     <p> Message: PAYMENT INVOICE for package purchase from pellithoranam.com</p>
                     <p>Team: <strong>Pellithoranam</strong><p>
                  </body>
                  </html>';
                  
    /*              $this->load->library('PHPMailer');
                //  $this->load->library('smtp');
        //echo "<pre>"; print_r($sendMessage);
      //  $mail = new Bizmailer();
      $mail = new PHPMailer();
      $mail->AddAddress($user->email); 
      $mail->IsMail();

      $mail->AddStringAttachment($pdff, 'output.pdf');

      $mail->From      = 'kvs116.wi@gmail.com';
      $mail->FromName = 'sam';            
      $mail->IsHTML(true);                                  
      $mail->Subject        =  "Invoice";
      $mail->Body           =  $sendMessage;
    if($mail->Send()){
echo 'success ####';
    }else{
        echo 'xxxxx';

    }
      $mail->ClearAddresses();


if(file_put_contents( $file_name,file_get_contents($pdff))) { 
    echo "File downloaded successfully"; 
} 
else { 
    echo "File downloading failed."; 
}*/
//print_r();
      /*$this->load->library('Mailgun_lib');
      $mgClient = new Mailgun_lib();
      $mgClient->to($user->email);
      $mgClient->from("noreply@pellithoranam.com", "pellithoranam");
      $mgClient->subject("Invoice from pellithoranam.com");
      $mgClient->message($output);
      $mgClient->attachments($pdff,$filename);
      $mgClient->send(); */
        //print_r($sendMessage);die;
       


        $this->load->library('email');
        $this->email->from('Noreply@pellithoranam.com', 'pellithoranam');
        $this->email->to($user->email);
        $this->email->subject('Invoice');
        $this->email->message('This is my message');
     
        $this->email->attach($pdff);
   $this->email->send();
 $this->session->set_flashdata('success', 'Your contact information sent successfully. You will be notify via email.');

if(isset($_POST["action"]))
{
	include(base_url().'assets/pdf.php');
	$file_name = md5(rand()) . '.pdf';
	$html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
	$html_code = '<link rel="stylesheet" href="style.css">';
	//$html_code .= fetch_customer_data($connect);
	$html_code .= $output;
	$pdf = new Pdf();
	$pdf->load_html($html_code);
	$pdf->render(); 
	$file = $pdf->output();
	file_put_contents($file_name, $file);
	
	require base_url().'assets/class/class.phpmailer.php';
	$mail = new PHPMailer;
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP
	$mail->Host = 'smtp.hostinger.in';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = '587';								//Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'wiemp1@whiteindia.in';					//Sets SMTP username
	$mail->Password = 'Wiemp3_pw';					//Sets SMTP password
	$mail->SMTPSecure = 'SSL';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = 'wiemp1@whiteindia.in';			//Sets the From email address for the message
	$mail->FromName = 'wiemp1@whiteindia.in';			//Sets the From name of the message
	$mail->AddAddress('kvs116.wi@gmail.com', 'Name');		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML				
	$mail->AddAttachment($file_name);     				//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Customer Details';			//Sets the Subject of the message
	$mail->Body = 'Please Find Customer details in attach PDF File.';				//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<label class="text-success">Customer Details has been send successfully...</label>';
	}
	unlink($file_name);
}

?>
<!--<html>
    <head>
        <title></title></head>
	<body > -->

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

		<br />
		<div class="container-fluid">
			
			<form action="mailinvoice" method="post">
			<div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <input type="hidden" name="output" value="<?= htmlentities($output); ?>">
			<button class="btn btn-info" type="submit" name="action"><i class="fa fa-file-pdf-o"></i> Send Mail</button><?php echo $message; ?>
        </div>
        <hr>
    </div>
	
			
			</form>
			<br />
			<?php
			echo $output;
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