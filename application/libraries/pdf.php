
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(dirname(dirname(__FILE__))). '/tcpdf/tcpdf.php';
class PDF extends TCPDF
{ function __construct() { parent::__construct(); 
	echo 'dir - <br>';
echo dirname(__FILE__) . '/tcpdf/';
}
}

?>
