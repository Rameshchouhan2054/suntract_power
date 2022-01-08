<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
 * Default template
 */
require_once 'template.php';

/**
 * Default template implementation.
 *
 * It is the default renderer of all the pages if any other renderer is not used.
 */
class PublicTemplate extends Template
{

    public function __construct()
    {
        parent::__construct();

        $this->_CI = &get_instance();
    }

    public function render($view, array $data = array())
    {
        // $this->_CI->load->model('User_model');
        $this->_CI->load->library('Commonlibrary');
        $return_val = $this->CI->load->viewPartial($view, $data);

        $data['template_content'] = $return_val;

        $css_tags = $this->collectCss("public", isset($data['local_css']) ? $data['local_css'] : array());
        $data['template_css'] = implode("", $css_tags);
        $script_tags = $this->collectJs("public", isset($data['local_js']) ? $data['local_js'] : array());

        $data['template_js'] = implode("", $script_tags);

        $user_data = get_loggedin_admin_user_data();
        // $user_type = $user_data['user_type'];
        $data['user_data'] = $user_data;

        $uri_segment_2 = $this->CI->uri->segment(2);

        if (empty($data['template_title'])) {
            $data['template_title'] = '';
        }

        $this->CI->load->library('session');
        $this->CI->load->library('Notification_lib');
        $this->CI->load->helper('url');

        $data['uri_segment_2'] = $this->CI->uri->segment(2);
        $data['uri_segment_3'] = $this->CI->uri->segment(3);

        if (!empty($this->_CI->session->user->id)) {
            $data['notification'] = $this->_CI->notification_lib->get_notification($this->_CI->session->user->id);
        }

        $data['template_header'] = $this->CI->load->viewPartial('templates/public/' . 'header', $data);
        $data['template_footer'] = $this->CI->load->viewPartial('templates/public/' . 'footer', $data);
        $return_val = $this->CI->load->viewPartial('templates/public/' . $this->masterTemplate, $data);
        return $return_val;
    }
}
