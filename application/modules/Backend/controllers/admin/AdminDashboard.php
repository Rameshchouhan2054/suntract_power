<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminDashboard extends My_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('HomeModel');        
    }


    public function index()
    {            
        $this->load->view('Backend/admin/index');     
    }
}
