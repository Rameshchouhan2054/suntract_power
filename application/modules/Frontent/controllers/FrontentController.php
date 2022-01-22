<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FrontentController extends My_Controller
{
    public function __construct()
    {
        /*call CodeIgniter's default Constructor*/
        parent::__construct();
        $this->load->helper('url');
        /*load database libray manually*/
        $this->load->database();
        $this->load->model('Frontent');
        // $this->load->model('Users');
    }

    public function index()
    {                                 
        $data['header_class'] ="off";
        $dataArray['testimonial_data']=$this->Frontent->get_testimonial_data();
        $dataArray['statistics_data']=$this->Frontent->get_statistics_data();
        $dataArray['projects_data']=$this->Frontent->get_projects_data();
        
        $this->load->view('header',$data);
        $this->load->view('index',$dataArray);
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
        $dataArray['member_data']=$this->Frontent->get_member_data();
        $dataArray['statistics_data']=$this->Frontent->get_statistics_data();
         
        $this->load->view('header');
        $this->load->view('about-us',$dataArray);
        $this->load->view('footer');
    }

    public function add_query()
    {
        $dataValues = array(
            'name' => $this->input->post('name') ,
            'email' => $this->input->post('email'),
            'mobile_number' => $this->input->post('mobile_number'),
            'message' => empty($this->input->post('reason')) ? "" : $this->input->post('reason'),
            'created_at' => date('d-m-y h:i:s'),
            'status' => 'Unsettled'
        );
        $this->Frontent->add_query($dataValues);
        echo 'Your request has been sent successfully. Thank you!';
    }

    public function services($service_name)
    {
        $dataArray['service_name'] =$service_name;
        $this->load->view('header');        
        $this->load->view('services',$dataArray);
        $this->load->view('footer');
        
    }
}
