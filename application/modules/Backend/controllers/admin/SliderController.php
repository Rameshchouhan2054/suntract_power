<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SliderController extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sliders');        
    }

    public function slider_image_list()
    {
        $dataArray['table_data'] = $this->Sliders->slider_list();
        $dataArray['table_heading'] = "Slider list";
        $dataArray['new_entry_link'] = "slider-image-form";
        $dataArray['new_entry_caption'] = "Add Slider Image";

        $this->load->view('admin/slider-image-list', $dataArray);     
    }

    public function addSliderImage($id = null)
    {     
        $dataArray = array();
        $this->form_validation->set_rules('for_form_vaidation', 'Client name ', 'required');
        if ($this->form_validation->run() == false) {
            $dataArray['form_caption'] = "Add Slider Image";
            $dataArray['form_action'] = current_url();
            $dataArray['form_card_heading'] = 'Slider form';
            $dataArray['back_button'] = 'slider-image-list';

            if (!empty($id)) {
                $row = $this->Sliders->get_sliderImage_by_id($id);
                $dataArray['form_caption'] = 'Edit Slider image';
                $dataArray['id'] = $row->id;
                $dataArray['slider_image_address'] = $row->slider_image_address;                              
            }

            $this->load->view('admin/slider-image-form', $dataArray);         
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
                           
                if(!empty($response->slider_image_address))
                {
                    $path = './assets/img/slider-image/'.$response->slider_image_address;  
                    if(file_exists($path))
                    {                    
                        unlink($path);
                    }
                }
                $file_name = 'slider_image_' . $response->id;
                $config['upload_path'] = './assets/img/slider-image';
                $config['allowed_types'] = 'jpeg|png|jpg';
                $config['max_size'] = 5000000;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('slider_image')) {
                    $error = array('error' => $this->upload->display_errors());                                                   
                $this->session->set_flashdata('operation_msg', $error['error']);
                $this->session->set_flashdata('operation_msg_type', 'danger');
                redirect('slider-image-form');
                }

                $update = array('slider_image_address' => $this->upload->data('file_name'));
                $active_slider_detail =$this->Sliders->get_active_slider();
 if($active_slider_detail == '0')
 {
     $update['slider_status'] ='Active';
 }
                $where = array('id'=>$response->id);             
                $this->Sliders->update_slider_image_address($update,$where);
            }
         
            if ($response->message == "inserted") {
                $this->session->set_flashdata('operation_msg', 'Slider image added successfully.');
            } else {
                $this->session->set_flashdata('operation_msg', 'Slider image updated successfully.');
            }
            $this->session->set_flashdata('operation_msg_type', 'success');
            redirect('slider-image-list');
        }
    }    
}