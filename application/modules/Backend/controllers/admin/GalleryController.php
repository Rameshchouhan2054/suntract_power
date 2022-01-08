<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GalleryController extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if (!$this->session->logged_in) {
            redirect(base_url('login'));
        }
        $this->load->model('Gallerys');
        $this->load->library('form_validation');
    }

    public function gallery_image_list()
    {
        // $dataArray['table_data'] = $this->Gallerys->gallery_image_list();
        $dataArray['table_heading'] = "Galllery list";
        $dataArray['new_entry_link'] = "gallery-image-form";
        $dataArray['new_entry_caption'] = "Add Gallery Image";
   
        $this->load->view('admin/gallery-image-list', $dataArray);       
    }

    public function addGalleryImage($id = null)
    {     
        $dataArray = array();
        $this->form_validation->set_rules('for_form_vaidation', 'Client name ', 'required');
        if ($this->form_validation->run() == false) {
            $dataArray['form_caption'] = "Add Gallery Image";
            $dataArray['form_action'] = current_url();
            $dataArray['form_card_heading'] = 'Gallery form';
            $dataArray['back_button'] = 'gallery-image-list';

            if (!empty($id)) {
                $row = $this->Gallerys->get_galleryImage_by_id($id);
                $dataArray['form_caption'] = 'Edit Gallery image';
                $dataArray['id'] = $row->id;
                $dataArray['gallery_image_address'] = $row->gallery_image_address;                              
            }
       
            $this->load->view('admin/gallery-image-form', $dataArray);           
        } else {

            $id = trim($this->input->post('id'));        
            if (empty($id)) {
                $dataValues['created_by'] = $this->session->admin->id;
                $dataValues['created_at'] = date('d-m-Y h:i:s a');                           
            } else {
                $dataValues['id'] = $id;
                $dataValues['updated_by'] = $this->session->admin->id;
                $dataValues['updated_at'] = date('d-m-Y h:i:s a');   
            }
            $response = json_decode($this->Sliders->save_sliderImage($dataValues));
            
            if (!empty($_FILES['slider_image']['name'])) {
               
                $file_name = 'slider_image_' . $response->id;
                $path = './assets/image/slider-image/'.$file_name.'.jpg';
                // var_dump(file_exists($path));
                // p($path);
                if(file_exists($path))
                {
                    p("hii");
                    unlink($path);
                }
                $dataValues['slider_image_address'] = $file_name;
                $config['upload_path'] = './assets/image/slider-image';
                $config['allowed_types'] = 'jpeg|png|jpg';
                $config['max_size'] = 16000;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('slider_image')) {
                    $error = array('error' => $this->upload->display_errors());
                   p($error);
                $this->session->set_flashdata('operation_msg', $error);
                $this->session->set_flashdata('operation_msg_type', 'danger');
                redirect('slider-image-form');
                }
            }
         
            if ($response->message == "inserted") {
                $this->session->set_flashdata('operation_msg', 'Testimonial added successfully.');
            } else {
                $this->session->set_flashdata('operation_msg', 'Testimonial updated successfully.');
            }
            $this->session->set_flashdata('operation_msg_type', 'success');
            redirect('gallery-image-list');
        }
    }    
}