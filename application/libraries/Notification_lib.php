<?php
class Notification_lib
{
    public function __construct()
    {
        $this->_CI = &get_instance();        
        $this->_CI->load->model('Notifications_model');
    }


    public function send_notification($notification_detail,$status=null)
    {
      
        if(!empty($status))
        {
            $notification_status = $status;
        }else{
            $notification_status = 'Active';
        }
        $dataArray = array(
            'user_id' => empty($status)?$notification_detail['user_id']:"",
            'notification_title' => $notification_detail['notification_title'],
            'notification_desc' => $notification_detail['notification_desc'],
            'notification_action' => $notification_detail['notification_action'],
            'status' => $notification_status,
            'created_at' => date('d-m-Y h:i:s A'),
            'created_by' => $this->_CI->session->admin->id
        );
        
        $this->_CI->Notifications_model->send_notification($dataArray);
    }

    public function set_notification_checked($notification_id)
    {
        $where=array('id'=>$notification_id);
        $dataArray = array(          
            'status' => 'Checked',
            'updated_at' => date('d-m-Y h:i:s A'),
            'updated_by' => $this->_CI->session->user->id
        );        
        $this->_CI->Notifications_model->update_notification($where,$dataArray); 
    }

    public function get_notification($user_id)
    {
        $notification_data = $this->_CI->Notifications_model->get_notification($user_id);
        return  $notification_data;
    }
} 
?>