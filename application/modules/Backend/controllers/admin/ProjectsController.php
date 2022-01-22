<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectsController extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Projects');
    }

    public function Project_list()
    {
        $dataArray['table_data'] = $this->Projects->project_list();
        $dataArray['table_heading'] = "Project list";
        $dataArray['new_entry_link'] = "add-project";
        $dataArray['new_entry_caption'] = "Add Project";

        $this->load->view('admin/project-list', $dataArray);
    }

    public function addProject($id = null)
    {
        $dataArray = array();
        // p($this->input->post());
        $this->form_validation->set_rules('project_name', 'Project name ', 'required');
        $this->form_validation->set_rules('description', 'Description ', 'required');
        if ($this->form_validation->run() == false) {
            $dataArray['form_caption'] = "Add Project";
            $dataArray['form_action'] = current_url();
            $dataArray['form_card_heading'] = 'Project form';
            $dataArray['back_button'] = 'projects';

            if (!empty($id)) {
                $row = $this->Projects->get_project_by_id($id);
                $dataArray['form_caption'] = 'Edit Project';
                $dataArray['id'] = $row->id;
                $dataArray['project_name'] = $row->project_name;
                $dataArray['description'] = $row->description;
            }

            $this->load->view('admin/project-form', $dataArray);
        } else {

            $id = trim($this->input->post('id'));
            $dataValues = array(                
                "project_name" => trim($this->input->post('project_name')),
                "description" => trim($this->input->post('description')),                            
            );


            if (empty($id)) {
                $dataValues['created_by'] = $this->session->admin->id;
                $dataValues['created_at'] = date('d-m-Y h:i:s a');
            } else {
                $dataValues['id'] = $id;
                $dataValues['updated_by'] = $this->session->admin->id;
                $dataValues['updated_at'] = date('d-m-Y h:i:s a');
            }
            $response = json_decode($this->Projects->save_project($dataValues));

          
            if (!empty($_FILES['project_image']['name'])) {
               
                $file_name = 'project_image_' . $response->id.'.jpg';
                $path = './assets/img/project-image/'.$file_name;             
                if(file_exists($path))
                {                
                    unlink($path);
                }
                $dataValues['pdf_file_name'] = $file_name;
                $config['upload_path'] = './assets/img/project-image';
                $config['allowed_types'] = 'jpeg|png|jpg';
                $config['max_size'] = 16000;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('project_image')) {
                    $error = array('error' => $this->upload->display_errors());
                   
                $this->session->set_flashdata('operation_msg', $error['error']);
                $this->session->set_flashdata('operation_msg_type', 'danger');
                redirect('add-project');
                }
            }
         

            if ($response->message == "inserted") {
                $this->session->set_flashdata('operation_msg', 'Project added successfully.');
            } else {
                $this->session->set_flashdata('operation_msg', 'Project updated successfully.');
            }
            $this->session->set_flashdata('operation_msg_type', 'success');
            redirect('Projects');
        }
    }

    public function delete_project($id)
    {
        $this->Projects->delete_project($id);
        $this->session->set_flashdata('operation_msg', 'Project deleted successfully.');
    
    $this->session->set_flashdata('operation_msg_type', 'success');
    redirect('Projects');
    }
}
