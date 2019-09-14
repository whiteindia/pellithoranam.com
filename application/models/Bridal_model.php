<?php
class Bridal_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }
  public function get_bridal_collection() {
    $qry_1 = $this->db->get('bridal_collection');
    if($qry_1->num_rows() > 0){ return $qry_1->result(); } else { return false; }
  }
}
