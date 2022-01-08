<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class My_Controller extends CI_Controller
{

    public $ajaxRequest = false;
    public $template = NULL;

    public function __construct()
    {
        parent::__construct();
    }

    public function _remap($method, $params = array())
    {

        $module = $this->router->fetch_module();
        $class = $this->router->fetch_class();
        date_default_timezone_set('Asia/Kolkata');

        if ($module == 'Frontent') {
            $this->load->setTemplate('blank');

        } elseif ($module == 'Backend') {

            if (!$this->session->logged_in) {
                if ($class != "AdminLoginController") {
                    redirect(base_url('login'));
                }
            } 
        }

        if (method_exists($this, $method)) {

            call_user_func_array(array($this, $method), $params);
        } else {
            show_404();
        }
    }
}
