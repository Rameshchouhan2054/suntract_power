<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

/**
 * Class Payment
 */
class Users extends CI_Model
{
  public function attemptLogin($data_arr)
  {
    $this->db->where('username', $data_arr['username']);
    $this->db->where('password', $data_arr['password']);
    $query = $this->db->get('frontent-users');
    $result = $query->row();

    return $result;
  }

  public function get_row_by_username($username)
  {
    $this->db->where('username', $username);
    $query = $this->db->get('frontent-users');
    $result = $query->row();

    return $result;
  }
  public function update_frontent_user($id, $dataValue)
  {
    $this->db->where('id', $id);
    $this->db->update('frontent-users', $dataValue);
  }
  public function save_User($dataValue)
  {
    $return = null;

    if (!empty($dataValue)) {
      if (!empty($dataValue['id'])) {
        //  $this->db->table('user_license');
        $this->db->where('id', $dataValue['id']);
        $this->db->update('frontent-users', $dataValue);
        $return = 'updated';
      } else {
        $this->db->insert('frontent-users', $dataValue);
        $return =  'inserted';
      }
    }
    return $return;
  }
  public function  check_usernameOrEmail_exist($data)
  {
    $this->db->where($data);
    $query = $this->db->get('frontent-users');
    return $query->row();
  }

  // educational detail 

  public function save_educational_detail($insert_arr, $update_arr)
  {

    if (!empty($update_arr)) {
     
      $this->db->update_batch('educational-detail', $update_arr, 'id');
    }
    if (!empty($insert_arr)) {

      $this->db->insert_batch('educational-detail', $insert_arr);
    }
  }

  public function get_state_name()
  {
    return $this->db->get('state')->result();
  }

  public function get_country_name()
  {
    return $this->db->get('country')->result();
  }


  public function delete_educational_detail_row($where)
  {
    $this->db->delete('educational-detail',$where);
  }

  public function get_educational_detail_by_id($user_id)
  {
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('educational-detail');
    return  $query->result_array();
  }

  public function checkUser_by_mobileNumber($mobile_number)
  {
    $this->db->where("mb_number", $mobile_number);
    $result =  $this->db->get("frontent-users")->row();
    return $result;
  }


  public function documents_required($exam_id)
  {
    $this->db->select('d.*,e.*');
    $this->db->from('detailRequired d');
    $this->db->join('exams e', 'e.exam_id = d.exam_id', 'left');
    $this->db->where('d.exam_id', $exam_id);
    return $this->db->get()->row();
  }

  public function add_user_documents($dataValues)
  {
   
    if (!empty($dataValues['id'])) {
      $this->db->where('id',$dataValues['id']);
      $this->db->update('user-documents', $dataValues);
    } else {
      $this->db->insert('user-documents', $dataValues);
    }
  }

  public function check_documents_exists($user_id)
  {
    $this->db->where('user_id', $user_id);
    return $this->db->get('user-documents')->row();
  }

  public function get_payment_detail($exam_id)
  {
    $this->db->select('e.exam_id,e.exam_name,e.exam_end_date,e.charges,d.form_fill_charge');
    $this->db->from('exams e');
    $this->db->join('detailRequired d', 'd.exam_id =e.exam_id', 'left');
    $this->db->where('e.exam_id', $exam_id);
    return $this->db->get()->row();
  }

  public function get_user_caste($user_id)
  {
    $this->db->select('caste');
    $this->db->from('frontent-users');
    $this->db->where('id', $user_id);
    return $this->db->get()->row();
  }

  public function add_transaction($dataArray)
  {
    $this->db->insert('transactions',$dataArray);    
  }

  public function check_transaction_exist($exam_id,$user_id)
  {
    $this->db->where('exam_id', $exam_id);
    $this->db->where('user_id', $user_id);
    $this->db->where('status !=','Failed');        
    return $this->db->get('transactions')->row();
  }

  public function get_transaction_by_user_id($user_id)
  {
    $this->db->select('t.*,e.exam_name');
    $this->db->from('transactions t');
    $this->db->join('exams e','e.exam_id =t.exam_id','left');
    $this->db->where('t.user_id',$user_id);
    $this->db->order_by('id ','DESC');
    return $this->db->get()->result();
  } 
}
