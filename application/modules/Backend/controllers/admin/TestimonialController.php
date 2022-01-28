<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TestimonialController extends My_Controller
{

    public function __construct()
    {
        parent::__construct();  
        $this->load->model('Testimonials');        
    }

    public function testimonial_list()
    {
        $dataArray['table_data'] = $this->Testimonials->testimonial_list();
        $dataArray['table_heading'] = "Testimonial list";
        $dataArray['new_entry_link'] = "tesimonial-form";
        $dataArray['new_entry_caption'] = "Add testimonial";
  
        $this->load->view('admin/testimonial-list', $dataArray);
    }

    public function addTestimonial($id = null)
    {        
        $dataArray = array();
        $this->form_validation->set_rules('client_name', 'Client name ', 'required');
        $this->form_validation->set_rules('client_review', 'Client review ', 'required');
        $this->form_validation->set_rules('client_city', 'Client profession', 'required');        
    
        if ($this->form_validation->run() == false) {
            $dataArray['form_caption'] = "Add Testimonial";
            $dataArray['form_action'] = current_url();
            $dataArray['form_catd_heading'] = 'Testimonial form';

            if (!empty($id)) {
                $row = $this->Testimonials->get_testimonial_by_id($id);
                $dataArray['form_caption'] = 'Edit Testimonial';
                $dataArray['id'] = $row->id;
                $dataArray['client_name'] = $row->client_name;
                $dataArray['client_city'] = $row->client_city;
                $dataArray['client_review'] = $row->client_review;  
                // $dataArray['image_address'] = $row->image_address;               
            }

      
            $this->load->view('admin/testimonial-form', $dataArray);

        } else {

            $id = trim($this->input->post('id'));
            $dataValues = array(                
                "client_name" => trim($this->input->post('client_name')),
                "client_city" => trim($this->input->post('client_city')),
                "client_review" => trim($this->input->post('client_review')),                             
            );

            if (empty($id)) {
                $dataValues['created_by'] = $this->session->admin->id;
                $dataValues['created_at'] = date('d-m-Y h:i:s a');                           
            } else {
                $dataValues['id'] = $id;
                $dataValues['updated_by'] = $this->session->admin->id;
                $dataValues['updated_at'] = date('d-m-Y h:i:s a');   
            }
            $response = json_decode($this->Testimonials->save_testimonial($dataValues));
            
            if (!empty($_FILES['client_image']['name'])) {
               
                $file_name = 'client_image_' . $response->id.'.jpg';
                $path = './assets/img/client-image/'.$file_name;             
                if(file_exists($path))
                {                
                    unlink($path);
                }
                $dataValues['pdf_file_name'] = $file_name;
                $config['upload_path'] = './assets/img/client-image';
                $config['allowed_types'] = 'jpeg|png|jpg';
                $config['max_size'] = 16000;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('client_image')) {
                    $error = array('error' => $this->upload->display_errors());
                   
                $this->session->set_flashdata('operation_msg', $error['error']);
                $this->session->set_flashdata('operation_msg_type', 'danger');
                redirect('testimonial-form');
                }

                
                // $uploaded_filename = $this->upload->data('file_name');
                // $this->Testimonials->update_filename($response->id,$uploaded_filename);
            }
         
            if ($response->message == "inserted") {
                $this->session->set_flashdata('operation_msg', 'Testimonial added successfully.');
            } else {
                $this->session->set_flashdata('operation_msg', 'Testimonial updated successfully.');
            }
            $this->session->set_flashdata('operation_msg_type', 'success');
            redirect('testimonial-list');
        }
    }

    public function delete_tesimonial($testimonial_id)
    {
        $this->Testimonials->delete_testimonial_by_id($testimonial_id);
        $this->session->set_flashdata('operation_msg', 'Testimonial successfully Deleted.');
        $this->session->set_flashdata('operation_msg_type', 'success');
        redirect('testimonial-list');
    }
}