<?php
class Verify_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  /*to get profile details of user*/

  //add otp details
  public function add_otpdetails($otp)
  {
    $my_matr_id = $this->session->userdata('logged_in');
    $mat_id = $my_matr_id->matrimony_id;
    $phone = $my_matr_id->phone;
    $td_date = date('Y-m-d H:i:s', time());
    $data['otp'] = $otp;
    $data['otp_user'] = $mat_id;
    $data['otp_mobile'] = $phone;
    $data['otp_datetime'] = $td_date;
    $result = $this->db->insert('otp_details', $data);
    return $result;
  }

  public function get_otpdetails()
  {
    $my_matr_id = $this->session->userdata('logged_in');
    $mat_id = $my_matr_id->matrimony_id;
    $phone = $my_matr_id->phone;
    $data['otp_user'] = $mat_id;
    $data['otp_mobile'] = $phone;
    $result = $this->db->where($data)->get('otp_details')->row();
    return $result;
  }

  //add sms details
  public function add_smsdetails($data)
  {
    $my_matr_id = $this->session->userdata('logged_in');
    $mat_id = $my_matr_id->matrimony_id;
    $query = $this->db->where('send_sms_from', $mat_id);
    $query = $this->db->where('send_sms_to', $data['to_id']);
    $query = $this->db->get('send_sms');
    if ($query->num_rows() > 0) {

      return true;
    } else {
      $send_sms_to = $data['to_id'];
      $td_date = date('Y-m-d H:i:s', time());
      $data1['send_sms_from'] = $mat_id;
      $data1['send_sms_to'] = $send_sms_to;
      $data1[' send_sms_datetime'] = $td_date;
      $data1['message'] = $data['mail_content'];
      $result = $this->db->insert('send_sms', $data1);
    }
    return $result;
  }
  //verify otp
  function check_otp($data)
  {
    $my_matr_id = $this->session->userdata('logged_in');
    $mat_id = $my_matr_id->matrimony_id;
    $query = $this->db->where('otp_status', '0');
    $query = $this->db->where('otp_user', $mat_id);
    $query = $this->db->where('otp', $data['otp']);
    $query = $this->db->get('otp_details');
    if ($query->num_rows() == 0) {

      $query = $this->db->where('otp_status', '0');
      $query = $this->db->where('otp_user', $mat_id);
      $query = $this->db->where('otp', $data['otp']);
      $data['otp_status'] = '1';
      $result = $this->db->update('otp_details', $data);
      $this->db->where('matrimony_id', $mat_id);
      $this->db->update('profiles', array('is_phone_verified' => 1));
      return $status = '1';
    } else {

      $query2 = $this->db->where('otp_status', '1');
      $query2 = $this->db->where('otp_user', $mat_id);
      $query2 = $this->db->where('otp', $data['otp']);
      $query2 = $this->db->get('otp_details');
      if ($query2->num_rows() > 0) {
        return $status = '2';
      } else {
        return $status = '0';
      }
    }
    // return $status;
  }
  // view Package 
  function view_packages()
  {
    $query = $this->db->where('package_status', '1');
    $query = $this->db->get('packages');
    $result = $query->result();
    return $result;
  }
  ////

  function profile()
  {

    $session = $this->session->userdata('user_values');
    $query = $this->db->where('id', $session['id']);
    $query = $this->db->get('registration');
    $result = $query->row();
    return $result;
  }
  function get_mob($matri_id)
  {

    $query = $this->db->where('dnd', '0');
    $query = $this->db->where('matrimony_id', $matri_id);
    $query = $this->db->get('profiles');
    $result = $query->row();
    return $result;
  }
  function get_mob_email($email)
  {

    $query = $this->db->where('dnd', '0');
    $query = $this->db->where('email', $email);
    $query = $this->db->get('profiles');
    $result = $query->row();
    return $result;
  }
  public function view_package($data)
  {
    $query = $this->db->where('package_status', '1');
    $query = $this->db->where('id', $data['id']);
    $query = $this->db->get('packages');
    $result = $query->row();
    return $result;
  }

  public function update_account($data)
  {

    $this->db->where('user_id', $data['user_id']);
    $result = $this->db->update('users', $data);
    return $result;
  }

  public function verify_account($email_unique)
  {

    $this->db->where('email_unique', $email_unique);
    $this->db->where('email_status', 0);
    $data1['email_status'] = '1';
    $result = $this->db->update('users', $data1);
    return $result;
  }
}
