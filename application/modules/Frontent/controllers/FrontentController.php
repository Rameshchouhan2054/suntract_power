<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FrontentController extends My_Controller
{
    public function __construct()
    {
        /*call CodeIgniter's default Constructor*/
        parent::__construct();

        /*load database libray manually*/
        $this->load->database();
        // $this->load->model('Frontent');
        // $this->load->model('Users');
    }

    public function index()
    {                                 
        $data['header_class'] ="off";
        $this->load->view('header',$data);
        $this->load->view('index');
        $this->load->view('footer');
    }
   
    public function contact_us()
    {            
        $this->load->view('header');
        $this->load->view('contact-us');
        $this->load->view('footer');
    }

    public function faq()
    {            
        $this->load->view('header');
        $this->load->view('faq');
        $this->load->view('footer');
    }
    
    public function about_us()
    {
        $this->load->view('header');
        $this->load->view('about-us');
        $this->load->view('footer');
    }

    public function add_query()
    {
        $dataValues = array(
            'name' => $this->input->post('fname') . '' . $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'mobile_number' => $this->input->post('mobile_number'),
            'message' => empty($this->input->post('message')) ? "" : $this->input->post('message'),
            'created_at' => date('d-m-y h:i:s'),
            'status' => 'Unsettled'
        );
        $this->Frontent->add_query($dataValues);
        $this->session->set_flashdata('operation_msg', "Your request has been sent successfully. Thank you!");
        $this->session->set_flashdata('operation_msg_type', 'success');
        if (!empty($this->input->post('page'))) {
            redirect(base_url());
        } else {
            redirect('contact-us');
        }
    }
}
