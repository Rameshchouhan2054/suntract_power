<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Otp_lib
{

    private $validity = 300;
    public function __construct()
    {
        $this->_CI = &get_instance();
        // $this->_CI->load->config('datatable_config');
        $this->_CI->load->model('Otp_model');
    }
    public function send_otp($user_id, $mobile_number, $action)
    {
        $data = $this->_CI->Otp_model->checkUser_by_mobileNumber($mobile_number);
        if (!empty($data)) {
            $otp = rand(100000, 999999);
            $dataValue = array(
                'user_id' => $data->id,
                'mobile_number' => $mobile_number,
                'otp' => $otp,
                'action' => $action,
                'Created_at' => date('d-m-y h:i:s'),
                'validity' => $this->validity,
                'verified' => false,
            );
            $this->_CI->Otp_model->saveOtp($dataValue);
            $status = true;
            $message = "OTP sent successfuly ,Verify now";
        } else {
            $message = "You are not registered,Please register first";
            $status = false;
        }
        $return = array(
            "status" => $status,
            'message' => $message
        );
        return json_encode($return);
    }

    public function resend_otp($user_id, $mobile_number, $action)
    {
        $data = $this->_CI->Otp_model->checkUser_by_mobileNumber($mobile_number);
        $otp = rand(100000, 999999);
        $dataValue = array(

            'otp' => $otp,
            'action' => $action,
            'Created_at' => date('d-m-y h:i:s'),
        );
        $where = array(
            'mobile_number' => $mobile_number,
            'user_id' => $data->id,
        );
        $this->_CI->Otp_model->saveOtp($dataValue, $where);
        $return = array(
            "status" => true,
            'message' => 'OTP resent successfully'
        );
        return json_encode($return);
    }

    public function verify_otp($user_id, $mobile_number, $action, $otp)
    {
        $data = $this->_CI->Otp_model->checkUser_by_mobileNumber($mobile_number);
        
        $where = array(
            'mobile_number' => $mobile_number,
            'user_id' => $data->id,
            'action' => $action,
        );
        $data_row = $this->_CI->Otp_model->getOtp_detail($where);
    
        if (!empty($data_row)) {
            $start = new DateTime($data_row->created_at);
            $end = new DateTime(date('d-m-y h:i:s'));
            $duration = $end->getTimestamp() - $start->getTimestamp();

            if ($data_row->otp == $otp) {
                if ($duration > $data_row->validity) {
                    $status = false;
                    $message = "Your otp has expired,please resend Otp";
                } else {
                    $status = true;
                    $message = "success";
                }
            } else {
                $status = false;
                $message = "Please enter valid otp";
            }
        }
        $return = array(
            "status" => $status,
            'message' => $message
        );
        if($status == true)
        {
        $this->_CI->Otp_model->delete_Otp_record($mobile_number);
        }
        return json_encode($return);
    }
}
