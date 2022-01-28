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
        $dataArray['table_data'] = $this->Gallerys->gallery_image_list();
        $dataArray['table_heading'] = "Galllery list";
        $dataArray['new_entry_link'] = "gallery-image-form";
        $dataArray['new_entry_caption'] = "Add Gallery Image";
   
        $this->load->view('admin/gallery-image-list', $dataArray);       
    }

    public function addGalleryImage($id = null)
    {     
        $dataArray = array();
      
        $this->form_validation->set_rules('photo_category', 'Photo Category ', 'required');
        $this->form_validation->set_rules('photo_desc', 'Photo description ', 'required');
        if ($this->form_validation->run() == false) {
            $dataArray['form_caption'] = "Add Gallery Image";
            $dataArray['form_action'] = current_url();
            $dataArray['form_card_heading'] = 'Gallery form';
            $dataArray['back_btn'] = 'gallery-image-list';

            if (!empty($id)) {
                $row = $this->Gallerys->get_galleryImage_by_id($id);
                $dataArray['form_caption'] = 'Edit Gallery image';
                $dataArray['id'] = $row->id;
                $dataArray['photo_desc'] = $row->photo_desc;     
                $dataArray['photo_category'] = $row->photo_category;             
                $dataArray['image_address'] = $row->image_address;                    
            }
       
            $this->load->view('admin/gallery-image-form', $dataArray);           
        } else {

            $id = trim($this->input->post('id'));     
            $dataValues =array(
                'photo_category'=>trim($this->input->post('photo_category')),
                'photo_desc'=>trim($this->input->post('photo_desc'))
            )   ;
            if (empty($id)) {
                $dataValues['created_by'] = $this->session->admin->id;
                $dataValues['created_at'] = date('d-m-Y h:i:s a');                           
            } else {
                $dataValues['id'] = $id;
                $dataValues['updated_by'] = $this->session->admin->id;
                $dataValues['updated_at'] = date('d-m-Y h:i:s a');   
            }
            $response = json_decode($this->Gallerys->save_galleryImage($dataValues));
            
            if (!empty($_FILES['gallery_image']['name'])) {
               
                $file_name = 'gallery_image_' . $response->id;
                $path = './assets/img/gallery/'.$file_name.'.jpg';
                if(file_exists($path))
                {                    
                    unlink($path);
                }
                
                $config['upload_path'] = './assets/img/gallery';
                $config['allowed_types'] = 'jpeg|png|jpg';
                $config['max_size'] = 16000;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gallery_image')) {
                    $error = array('error' => $this->upload->display_errors());
              
                $this->session->set_flashdata('operation_msg', $error['error']);
                $this->session->set_flashdata('operation_msg_type', 'danger');
                redirect('gallery-image-form');
                }
                
                $uploaded_filename = $this->upload->data('file_name');
                $this->Gallerys->update_filename($response->id,$uploaded_filename);
            }
         
            if ($response->message == "inserted") {
                $this->session->set_flashdata('operation_msg', 'Image added successfully.');
            } else {
                $this->session->set_flashdata('operation_msg', 'image updated successfully.');
            }
            $this->session->set_flashdata('operation_msg_type', 'success');
            redirect('gallery-image-list');
        }
    }    

    public function delete_image($id)
    {
        $this->Gallerys->delete_image($id);
        $this->session->set_flashdata('operation_msg', 'Image deleted successfully.');
    
        $this->session->set_flashdata('operation_msg_type', 'success');
        redirect('gallery-image-list');
    }
}