<?php

class AdminLoginModel extends CI_Model {

    public $_table = 'admin';

    public function attemptLogin($email,$password)
    {
        
		$this->db->select('*');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get('admin');
        $result = $query->row();

        return $result;

    }
    public function register_user( $admin)
	{
		$this->db->insert('admin',  $admin);
	}

	public function email_check($email)
	{
 
		$this->db->where('email', $email);
		$query = $this->db->get('admin');

		if ($query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

}