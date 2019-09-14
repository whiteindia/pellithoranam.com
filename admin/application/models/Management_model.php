<?php

class Management_model extends CI_Model
{
    
    public function _consruct()
    {
        parent::_construct();
    }
    
    public function add_content($data)
    {
        $data['date_time'] = date('Y-m-d H:i:s', time());
        $result            = $this->db->insert('index_management', $data);
        return $result;
    }
    
    public function view_content()
    {
        $this->db->where('content_para is NOT NULL', NULL, FALSE);
        $this->db->order_by("date_time", "desc");
        $this->db->limit('1');
        $query  = $this->db->get('index_management');
        $result = $query->result();
        //echo $this->db->last_query();
        //die();
        return $result;
    }
    
    public function delete_content($id)
    {
        
        $this->db->where('id', $id);
        $result = $this->db->delete('index_management');
        return $result;
    }
    
    public function editget_content_id($id)
    {
        
        $query  = $this->db->where('id', $id);
        $query  = $this->db->get('index_management');
        $result = $query->row();
        return $result;
    }
    
    public function edit_content($data, $id)
    {
        
        $this->db->where('id', $id);
        $result = $this->db->update('index_management', $data);
        return $result;
    }
    
    function view_banner()
    {
        $this->db->where('banner_image is NOT NULL', NULL, FALSE);
        $this->db->order_by("date_time", "desc");
        $this->db->limit('1');
        $query  = $this->db->get('index_management');
        $result = $query->result();
        return $result;
    }
    
    public function editget_banner_id($id)
    {
        
        $query  = $this->db->where('id', $id);
        $query  = $this->db->get('index_management');
        $result = $query->row();
        return $result;
        
    }
    public function edit_banner($data, $id)
    {
        
        $this->db->where('id', $id);
        $result = $this->db->update('index_management', $data);
        return Success;
    }
    
    public function add_banner($data)
    {
        $data['date_time'] = date('Y-m-d H:i:s', time());
        $result            = $this->db->insert('index_management', $data);
        return $result;
    }
    
    public function delete_banner($id)
    {
        
        $this->db->where('id', $id);
        $result = $this->db->delete('index_management');
        return $result;
        
        
    }
    
    public function add_footer($data)
    {
        $data['date_time'] = date('Y-m-d H:i:s', time());
        $result            = $this->db->insert('index_management', $data);
        return $result;
    }
    
    function view_footer()
    {
        $this->db->where('footer_para is NOT NULL', NULL, FALSE);
        $this->db->order_by("date_time", "desc");
        $this->db->limit('1');
        $query  = $this->db->get('index_management');
        $result = $query->result();
        //echo $this->db->last_query();
        //die();
        return $result;
    }
    
    public function delete_footer($id)
    {
        
        $this->db->where('id', $id);
        $result = $this->db->delete('index_management');
        return $result;
        
        
    }
    
    public function editget_footer_id($id)
    {
        
        $query  = $this->db->where('id', $id);
        $query  = $this->db->get('index_management');
        $result = $query->row();
        return $result;
    }
    
    public function edit_footer($data, $id)
    {
        
        $this->db->where('id', $id);
        $result = $this->db->update('index_management', $data);
        return $result;
    }
    
    
    public function view_success_story()
    {
        /* $this->db->where('banner_image is NOT NULL', NULL, FALSE);
        $this->db->order_by("date_time", "desc");
        $this->db->limit('1');*/
        $this->db->where('success_status', '1');
        $query  = $this->db->get('success_story');
        $result = $query->result();
        return $result;
    }
    
    //approve success story 
    public function success_story_approve($id, $data1)
    {
        $this->db->where('success_id', $id);
        $result = $this->db->update('success_story', $data1);
        return $result;
        
        
    }
    //reject success story 
    public function success_story_reject($id, $data1)
    {
        $this->db->where('success_id', $id);
        $result = $this->db->update('success_story', $data1);
        return $result;
        
        
    }
    public function view_other_source()
    {
        $this->db->select('*');
		$this->db->from('profile_delete');
		$this->db->join('profiles', 'profiles.user_id = profile_delete.user_id','left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;	

    }
    public function delete_deletedmember($uid) {
		 $this->db->where('user_id', $uid);
         $result = $this->db->delete('profile_delete');
         return $result;
	}
}