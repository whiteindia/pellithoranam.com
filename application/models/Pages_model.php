<?php
class Pages_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }
  public function get_page_content($slug) {

    $qry_1 = $this->db->get_where('pages',array('slug'=>$slug));
    if($qry_1->num_rows() > 0){ return $qry_1->result(); } else { return false; }
  }
}
