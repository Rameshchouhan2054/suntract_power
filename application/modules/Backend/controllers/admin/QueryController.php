<?php
defined('BASEPATH') or exit('No direct script access allowed');

class QueryController extends My_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Querys');
    }

    public function unsettled_query_list()
    {
        $dataArray['table_data'] = $this->Querys->unsettled_query_list();
        $dataArray['table_heading'] = "Unsettled query list";
        $dataArray['query_link'] = base_url("settled-query-list");
        $dataArray['query_caption'] = "Settled query list";

        $this->load->view('admin/query-list', $dataArray);
    }

    public function settled_query_list()
    {
        $dataArray['table_data'] = $this->Querys->settled_query_list();
        $dataArray['table_heading'] = "Settled query list";
        $dataArray['query_link'] = base_url("unsettled-query-list");
        $dataArray['query_caption'] = "Unsettled query list";

        $this->load->view('admin/query-list', $dataArray);
    }

    public function settle_query()
    {
        $where = array('id' => $this->input->post('id'));
        $dataArray = array(
            'status' => 'Settled',
            'settled_desc' => $this->input->post('settled_desc'),
            'updated_by' => $this->session->admin->id,
            'updated_at' => date('d-m-y h:i:s'),
        );
        $this->Querys->settle_query($where, $dataArray);
        $this->session->set_flashdata('operation_msg', 'Query successful settled.');
        $this->session->set_flashdata('operation_msg_type', 'success');
        redirect(base_url('unsettled-query-list'));
    }

    public function view_query($id)
    {
        $data['record'] = $this->Querys->get_query_by_id($id);

        $this->load->view('admin/view-query', $data);
    }
}
