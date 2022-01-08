<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Class Payment
 */
class AplliedForms extends CI_Model
{
    public function get_applied_form_by_user_id($user_id)
    {
        $this->db->SELECT('fr.*,fu.ufname,fu.ulname,e.exam_name');
        $this->db->from('form-request fr');
        $this->db->join('frontent-users fu', 'fu.id=fr.user_id', 'left');
        $this->db->join('exams e', 'e.exam_id = fr.exam_id', 'left');
        $this->db->where('fr.user_id',$user_id);
        return $this->db->get()->result();
    }
}
