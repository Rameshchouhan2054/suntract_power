<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogoutController extends My_Controller {
    /**
     * LogoutController constructor.
     */
    public function __construct()
    {
        parent::__construct();      
    }

    /**
     * Destroy user session
     *
     * @param $user
     */
    public function logout()
    {
        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('logged_in');
        redirect(base_url('login'));
    }
}
