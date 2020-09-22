
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf extends TCPDF
{ function __construct() { parent::__construct(); }
}

?>
<?php

//pdf.php
/**
require_once 'dompdf/autoload.inc.php';


use Dompdf\Dompdf;

class Pdf extends Dompdf{

	public function __construct(){
		parent::__construct();
	}
}
*/
?>