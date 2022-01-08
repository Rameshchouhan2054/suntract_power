<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends My_Controller
{

    public function __construct()
    {
        parent::__construct();    
        $this->load->model('Users');        
    }

    // backend user

    public function backend_user_list()
    {
        $dataArray['table_data'] = $this->Users->backend_user_list();
        $dataArray['table_heading'] = "Backend User list";
        $dataArray['new_entry_link'] = "backend-user-form";
        $dataArray['new_entry_caption'] = "Add a user";
     
        $this->load->view('admin/backend-user-list', $dataArray);       
    }

    public function delete_user($id)
    {
        $dataArray = array(
            "status" => "Deleted",
            'updated_by' => $this->session->admin->id,
            'updated_at' => date('d-m-y h:i:s'),
        );
        $this->Users->update_backend_user_status($id, $dataArray);
        $this->session->set_flashdata('operation_msg', 'User successfully Deleted.');
        $this->session->set_flashdata('operation_msg_type', 'success');
        redirect('backend-user-list');
    }

    public function addBackendUser($user_id = null)
    {
        date_default_timezone_set('Asia/Kolkata');
        $dataArray = array();
        $this->form_validation->set_rules('ufname', 'First name ', 'required');
        $this->form_validation->set_rules('ulname', 'Last name ', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if (empty($user_id)) {
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
        }
        if ($this->form_validation->run() == false) {
            $dataArray['form_caption'] = "Add Backend User";
            $dataArray['form_action'] = current_url();

            if (!empty($user_id)) {
                $user_data = $this->Users->get_backend_user_by_id($user_id);
                $dataArray['form_caption'] = 'Edit Backend User';
                $dataArray['id'] = $user_data->id;
                $dataArray['username'] = $user_data->username;
                $dataArray['ufname'] = $user_data->ufname;
                $dataArray['ulname'] = $user_data->ulname;
                $dataArray['gender'] = $user_data->gender;
                $dataArray['email'] = $user_data->email;
                $dataArray['address'] = $user_data->address;
                $dataArray['user_type'] = $user_data->user_type;
                $dataArray['status'] = $user_data->status;
            }

         
            $this->load->view('admin/backend-user-form', $dataArray);           
        } else {

            $user_id = trim($this->input->post('id'));
            $dataValues = array(                
                "ufname" => trim($this->input->post('ufname')),
                "ulname" => trim($this->input->post('ulname')),
                "gender" => trim($this->input->post('gender')),             
                "user_type" => trim($this->input->post('user_type')),
                "address" => trim($this->input->post('address')),
                'updated_by' => $this->session->admin->id,
                'updated_at' => date('d-m-y h:i:s'),
            );

            if (empty($user_id)) {
                $dataValues['created_by'] = $this->session->admin->id;
                $dataValues['created_at'] = date('d-m-y h:i:s');
                $dataValues['status'] = 'Active';
                $dataValues['email'] = trim($this->input->post('email'));
                $dataValues['username'] = trim($this->input->post('username'));
                $dataValues['password'] =md5(trim($this->input->post('password')));
            
            } else {
                $dataValues['id'] = $user_id;
            }

            $response = $this->Users->save_backendUser($dataValues);
            if ($response == "inserted") {
                $this->session->set_flashdata('operation_msg', 'New User inserted successfully.');
            } else {
                $this->session->set_flashdata('operation_msg', 'User updated successfully.');
            }
            $this->session->set_flashdata('operation_msg_type', 'success');
            redirect('backend-user-list');
        }
    }

    public function check_usernameOrEmail_exist()
    {
        if (!empty($this->input->post('username'))) {
            $username = $this->input->post('username');
            $data = array("username" => $username);
        } elseif (!empty($this->input->post('email'))) {
            $username = $this->input->post('email');
            $data = array("email" => $username);
        }

        $result = $this->Users->check_usernameOrEmail_exist($data);
        if (empty($result)) {
            echo  false;
        } else {
            echo true;
        }
    }

    //forntent user
    public function frontent_user_list()
    {
        $dataArray['table_data'] = $this->Users->frontent_user_list();
        $dataArray['table_heading'] = "Frontent User list";
        $dataArray['new_entry_link'] = "user-form";
        $dataArray['new_entry_caption'] = "Add a user";
     
        $this->load->view('admin/frontent-user-list', $dataArray);       
    }

    public function block_user($id)
    {
        $dataArray = array(
            "status" => "Blocked",
            'updated_by' => $this->session->admin->id,
            'updated_at' => date('d-m-y h:i:s'),
        );
        $this->Users->update_frontent_user_status($id, $dataArray, "block");
        $this->session->set_flashdata('operation_msg', 'User successfully blocked.');
        $this->session->set_flashdata('operation_msg_type', 'success');
        redirect('frontent-user-list');
    }

    public function unblock_user($id)
    {
        $dataArray = array(
            "status" => "Active",
            'updated_by' => $this->session->admin->id,
            'updated_at' => date('d-m-y h:i:s'),
        );
        $this->Users->update_frontent_user_status($id, $dataArray, "unblock");
        $this->session->set_flashdata('operation_msg', 'User successfully Unblocked.');
        $this->session->set_flashdata('operation_msg_type', 'success');
        redirect('frontent-user-list');
    }

    public function view_user($id)
    {
        $dataArray['record'] = $this->Users->get_frontent_user_by_id($id);
        $dataArray["table_heading"] = "User View";     
        $this->load->view('admin/view-user', $dataArray);       
    }
}
