<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewsController extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if (!$this->session->logged_in) {
            redirect(base_url('login'));
        }
        $this->load->model('News');
        $this->load->library('form_validation');
    }

    public function news_list()
    {
        $dataArray['table_data'] = $this->News->news_data();
        $dataArray['table_heading'] = "News list";
        $dataArray['new_entry_link'] = "news-form";
        $dataArray['new_entry_caption'] = "Add News";
   
        $this->load->view('admin/news-list', $dataArray);       
    }

    public function addNews($id = null)
    {     
        $dataArray = array();
      
        $this->form_validation->set_rules('news_title', 'News Title ', 'required');
        $this->form_validation->set_rules('news_desc', 'News description ', 'required');
        if ($this->form_validation->run() == false) {
            $dataArray['form_caption'] = "Add News";
            $dataArray['form_action'] = current_url();
            $dataArray['form_card_heading'] = 'News form';
            $dataArray['back_btn'] = 'news-list';

            if (!empty($id)) {
                $row = $this->News->get_news_by_id($id);
                $dataArray['form_caption'] = 'Edit News';
                $dataArray['id'] = $row->id;
                $dataArray['news_desc'] = $row->news_desc;     
                $dataArray['news_title'] = $row->news_title;   
                $dataArray['image_address'] = $row->image_address;                              
            }
       
            $this->load->view('admin/news-form', $dataArray);           
        } else {

            $id = trim($this->input->post('id'));     
            $dataValues =array(
                'news_title'=>trim($this->input->post('news_title')),
                'news_desc'=>trim($this->input->post('news_desc'))
            )   ;
            if (empty($id)) {
                $dataValues['created_by'] = $this->session->admin->id;
                $dataValues['created_at'] = date('d-m-Y h:i:s a');                           
            } else {
                $dataValues['id'] = $id;
                $dataValues['updated_by'] = $this->session->admin->id;
                $dataValues['updated_at'] = date('d-m-Y h:i:s a');   
            }
            $response = json_decode($this->News->save_news($dataValues));
            
            if (!empty($_FILES['news_image']['name'])) {
               
                $file_name = 'news_image_' . $response->id;
                $path = './assets/img/news/'.$file_name.'.jpg';
                if(file_exists($path))
                {                    
                    unlink($path);
                }
                
                $config['upload_path'] = './assets/img/news';
                $config['allowed_types'] = 'jpeg|png|jpg';
                $config['max_size'] = 16000;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('news_image')) {
                    $error = array('error' => $this->upload->display_errors());
              
                $this->session->set_flashdata('operation_msg', $error['error']);
                $this->session->set_flashdata('operation_msg_type', 'danger');
                redirect('news-form');
                }
                $uploaded_filename = $this->upload->data('file_name');
                // p($uploaded_filename);
                $this->News->update_filename($response->id,$uploaded_filename);
            }
         
            if ($response->message == "inserted") {
                $this->session->set_flashdata('operation_msg', 'News added successfully.');
            } else {
                $this->session->set_flashdata('operation_msg', 'News updated successfully.');
            }
            $this->session->set_flashdata('operation_msg_type', 'success');
            redirect('news-list');
        }
    }    

    public function delete_news($id)
    {
        $this->News->delete_news($id);
        $this->session->set_flashdata('operation_msg', 'News deleted successfully.');
    
        $this->session->set_flashdata('operation_msg_type', 'success');
        redirect('news-list');
    }
}