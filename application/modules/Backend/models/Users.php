<?php
class Users extends My_Model
{

  public function __construct()
  {
    parent::__construct();
  }
  // backend user 
  public function backend_user_list()
  {
    $this->db->where('status !=', 'Deleted');
    $query = $this->db->get('backend-users');
    return $query->result();
  }

  public function update_backend_user_status($id, $dataValue)
  {
    $this->db->where('id', $id);
    $this->db->update('backend-users', $dataValue);
  }

  public function get_backend_user_by_id($id)
  {
    return $this->db->get_where("backend-users", array("id" => $id))->unbuffered_row();
  }

  public function save_backendUser($dataValue)
  {
    $return = null;

    if (!empty($dataValue)) {
      if (!empty($dataValue['id'])) {
        //  $this->db->table('user_license');
        $this->db->where('id', $dataValue['id']);
        $this->db->update('backend-users', $dataValue);
        $return = 'updated';
      } else {
        $this->db->insert('backend-users', $dataValue);
        $return =  'inserted';
      }
    }
    return $return;
  }

  public function attemptLogin($username, $password)
  {

    $this->db->select('*');
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $this->db->where('status !=', 'Deleted');
    $query = $this->db->get('backend-users');
    $result = $query->row();
    return $result;
  }
  public function  check_usernameOrEmail_exist($data)
  {
    $this->db->where($data);
    $this->db->where('status !=', 'Deleted');
    $query = $this->db->get('backend-users');
    return $query->row();
  }
  public function  check_email_exist($email)
  {
    $this->db->where('email', $email);
    $this->db->where('status !=', 'Deleted');
    $query = $this->db->get('backend-users');
    return $query->row();
  }


  //frontent User 
  public function frontent_user_list()
  {
    $query = $this->db->get('frontent-users');
    return $query->result();
  }

  public function update_frontent_user_status($id, $dataValue)
  {
    $this->db->where('id', $id);
    $this->db->update('frontent-users', $dataValue);
  }

  public function get_frontent_user_by_id($id)
  {
    return $this->db->get_where("frontent-users", array("id" => $id))->unbuffered_row();
  }
}
