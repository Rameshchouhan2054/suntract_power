<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TeamController extends My_Controller
{

    public function __construct()
    {
        parent::__construct();  
        $this->load->model('Team');        
    }

    public function team_member_list()
    {
        $dataArray['table_data'] = $this->Team->team_member_list();
        $dataArray['table_heading'] = "Team member list";
        $dataArray['new_entry_link'] = "team-member-form";
        $dataArray['new_entry_caption'] = "Add Team member";
  
        $this->load->view('admin/team-member-list', $dataArray);
    }

    public function addTeamMember($id = null)
    {        
        $dataArray = array();
        $this->form_validation->set_rules('member_name', 'Client name ', 'required');
        $this->form_validation->set_rules('member_position', 'Client review ', 'required');
                
    
        if ($this->form_validation->run() == false) {
            $dataArray['form_caption'] = "Add Member";
            $dataArray['form_action'] = current_url();
            $dataArray['form_catd_heading'] = 'Team Member form';

            if (!empty($id)) {
                $row = $this->Team->get_team_member_by_id($id);
                $dataArray['form_caption'] = 'Edit Member';
                $dataArray['id'] = $row->id;
                $dataArray['member_name'] = $row->member_name;                
                $dataArray['member_position'] = $row->member_position;               
            }

      
            $this->load->view('admin/team-member-form', $dataArray);

        } else {

            $id = trim($this->input->post('id'));
            $dataValues = array(                
                "member_name" => trim($this->input->post('member_name')),
                "member_position" => trim($this->input->post('member_position')),                                          
            );

            if (empty($id)) {
                $dataValues['created_by'] = $this->session->admin->id;
                $dataValues['created_at'] = date('d-m-Y h:i:s a');                           
            } else {
                $dataValues['id'] = $id;
                $dataValues['updated_by'] = $this->session->admin->id;
                $dataValues['updated_at'] = date('d-m-Y h:i:s a');   
            }
            $response = json_decode($this->Team->save_team_member($dataValues));
            
            if (!empty($_FILES['member_image']['name'])) {
               
                $file_name = 'team_member_' . $response->id.'.jpg';
                $path = './assets/img/team/'.$file_name;             
                if(file_exists($path))
                {                
                    unlink($path);
                }
                // $dataValues['pdf_file_name'] = $file_name;
                $config['upload_path'] = './assets/img/team';
                $config['allowed_types'] = 'jpeg|png|jpg';
                $config['max_size'] = 16000;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('member_image')) {
                    $error = array('error' => $this->upload->display_errors());
                   
                $this->session->set_flashdata('operation_msg', $error['error']);
                $this->session->set_flashdata('operation_msg_type', 'danger');
                redirect('team-member-form');
                }
            }
         
            if ($response->message == "inserted") {
                $this->session->set_flashdata('operation_msg', 'Member added successfully.');
            } else {
                $this->session->set_flashdata('operation_msg', 'Member updated successfully.');
            }
            $this->session->set_flashdata('operation_msg_type', 'success');
            redirect('team-member-list');
        }
    }

    public function delete_team_member($id)
    {
        $this->Team->delete_team_member_by_id($id);
        $this->session->set_flashdata('operation_msg', 'Member successfully Deleted.');
        $this->session->set_flashdata('operation_msg_type', 'success');
        redirect('team-member-list');
    }

    public function statistics()
    {
        $dataArray = array();
        $this->form_validation->set_rules('for_form_validation', 'for validation ', 'required');
                
    
        if ($this->form_validation->run() == false) {
            $dataArray['form_caption'] = "Update Statistics";
            $dataArray['form_action'] = current_url();
            $dataArray['form_catd_heading'] = 'Update Statistics';
            $dataArray['for_form_validation'] = 'for_form_validation';

            $row = $this->Team->get_statistics_data();
            
            if (!empty($row)) {

            
                $dataArray['id'] = $row->id;
                $dataArray['exprience'] = $row->exprience;                
                $dataArray['system_installed'] = $row->system_installed;                              
                $dataArray['energy_financiing_done'] = $row->energy_financiing_done;                
                $dataArray['hours_of_inspection'] = $row->hours_of_inspection; 
            }

            $this->load->view('admin/statistics-form', $dataArray);

        } else {

            $id = trim($this->input->post('id'));
            $dataValues = array(                
                "exprience" => trim($this->input->post('exprience')),
                "system_installed" => trim($this->input->post('system_installed')),                 
                "energy_financiing_done" => trim($this->input->post('energy_financiing_done')),
                "hours_of_inspection" => trim($this->input->post('hours_of_inspection')),                                          
            );

            if (empty($id)) {
                $dataValues['created_by'] = $this->session->admin->id;
                $dataValues['created_at'] = date('d-m-Y h:i:s a');                           
            } else {
                $dataValues['id'] = $id;
                $dataValues['updated_by'] = $this->session->admin->id;
                $dataValues['updated_at'] = date('d-m-Y h:i:s a');   
            }
            $response = json_decode($this->Team->save_statistics($dataValues));
            
            if ($response->message == "inserted") {
                $this->session->set_flashdata('operation_msg', 'Statistics added successfully.');
            } else {
                $this->session->set_flashdata('operation_msg', 'Statistics updated successfully.');
            }
            $this->session->set_flashdata('operation_msg_type', 'success');
            redirect('statistics');
        } 
    }
}