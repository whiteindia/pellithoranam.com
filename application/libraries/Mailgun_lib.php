<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(dirname(dirname(__FILE__))).'/vendor/autoload.php';
use Mailgun\Mailgun;
class Mailgun_lib{
	var $_mailgun_key    = 'cfa62355afb6eda118f71f5a10dd8f29-468bde97-7f911fcc'; //d52c57c1e1014292f5052d9bac62de36-2b0eef4c-083d49f2
	var $_mailgun_domain = 'mgs.pellithoranam.com';
	var $_to             = '';
	var $_reply_to       = '';
	var $_cc             = '';
	var $_bcc            = '';
	var $_from           = '';
	var $_subject        = '';
   	var $_message        = '';
   	var $_attachments    = array();
   	var $_mailtype       = 'html';

   	public function initialize($config = array()){
   		if(isset($config['mailgun_key'])||($config['mailgun_key']!=="")) $this->_mailgun_key = $config['mailgun_key'];
   		if(isset($config['mailtype']) && $config['mailtype'] == 'text') $this->_mailtype = 'text';
   		        
   		 return $this;

   	}

   	public function to($to, $name = ''){
       $to   = $this->_str_to_array($to);
       $to   = $this->clean_email($to);
       $name = $this->_str_to_array($name);
       $this->_to = $this->_format_emails_names($to, $name);
       return $this;
   	}
   	public function reply_to($replyto, $name = ''){
   	      $this->_reply_to = $name.' <'.$replyto.'>';
   	      return $this;
   	}
   	public function cc($cc, $name = ''){
        $cc   = $this->_str_to_array($cc);
        $cc   = $this->clean_email($cc);
        $name = $this->_str_to_array($name);
        $this->_cc = $this->_format_emails_names($cc, $name);
        return $this;
    }
    public function bcc($bcc, $name = ''){
        $bcc   = $this->_str_to_array($bcc);
        $bcc   = $this->clean_email($bcc);
        $name = $this->_str_to_array($name);
        $this->_bcc = $this->_format_emails_names($bcc, $name);
        return $this;
    }
    public function from($from, $name = ''){
        $this->_from = $name.' <'.$from.'>';
        return $this;
    }
    public function subject($subject){
	    $this->_subject = $subject;
	    return $this;
	}
	public function message($message){
        $this->_message = $message;
        return $this;
    }
    public function attachments($attachments){
        $this->_attachments[] = $attachments;
        return $this;
    }
    public function attach($filename, $disposition = 'attachment'){
        return $this->attachments($attachment);
    }
    protected function _format_emails_names($emails, $names = false){
        foreach($emails as $k => $email) {
            $data[$k] = '';
            if(isset($names[$k]) && !empty($names[$k])) {
                $data[$k] .= $names[$k].' ';
            }
            $data[$k] .= '<'.$email.'>';
        }
        return implode(', ', $data);
    }
    protected function _str_to_array($str){
    	$arr = explode(",", $str);
    	return $arr;

    }
    public function clean_email($emails = array()){
    	$clean_email = array();
    	foreach ($emails as $email) {
    		// Remove all illegal characters from email
    		$clean_email[] = filter_var($email, FILTER_SANITIZE_EMAIL);
    	}
    	return $clean_email;
    }

    public function send(){
        $mailgun = new Mailgun($this->_mailgun_key);
        $mailgun = Mailgun::create($this->_mailgun_key);
        $data = array(
            'from'           => $this->_from,
            'to'             => $this->_to,
            'subject'        => $this->_subject,
            $this->_mailtype => $this->_message
        );
        if($this->_reply_to) {
            $data['h:Reply-To'] = $this->_reply_to;
        }
        if($this->_cc) {
            $data['cc'] = $this->_cc;
        }
        if($this->_bcc) {
            $data['bcc'] = $this->_bcc;
        }
        for($i = 0; $i < count($this->_attachments); $i++) {
            $data['attachment[' . ($i+1) . ']'] = '@' . $this->_attachments[$i];
        }
        $result = $mailgun->messages()->send($this->_mailgun_domain, $data);
        $dns = $mailgun->domains()->show($this->_mailgun_domain)->getInboundDNSRecords();
        //  echo "tk";
        // foreach ($dns as $record) {
        //   echo $record->getType();
        // }
        return true;
    }

}