<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Class Payment
 */
class Notifications_model extends CI_Model
{
    public function send_notification($dataArray)
    {
        $this->db->insert('notification',$dataArray);
    }

    public function update_notification($where,$dataArray)
    {
       $this->db->where($where);
       $this->db->update('notification',$dataArray); 
    }

    public function get_notification($user_id)
    {
        $this->db->select('count(id) as active_count');
        $this->db->from('notification');
        $this->db->where('status', 'Active');
        $this->db->where('user_id', $user_id);
        $count = $this->db->get()->row();

        $this->db->where('status !=', 'Expired');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id','DESC');
        $notification_data = $this->db->get('notification')->result();
        $return = array(
            'count' => $count,
            'notification_data' => $notification_data
        );
        return json_encode($return);
    }
}