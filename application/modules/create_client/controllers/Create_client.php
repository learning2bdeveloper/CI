<?php

class Create_client extends MY_Controller
{
    private $datas = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helpers(array('template/organization_template_helper', 'template/pagination_template_helper', 'pagination_helper','message_helper'));
        $this->load->model('Client_model');
    }


    public function kandeng() {
        echo "hello world!";
    }

    public function createclient() {
        $this->load->view('creation_client');
    }

    public function client() {
        $this->load->view('clientCrud');
    }

    // public function creation_org() {
    //     $this->load->view('creation_org');
    // }

    // public function create()
    // {
    //     $this->input->
    // }

    public function get_client_info_with_pagination()
    {
        $pagination = pagination($this->input->post('page'), 'Client_model', "fetch_client", "record_count", $this->input->post('recordsPerPage'));
        // $datas['data'] = $this->get_org_info->fetch_organization($recordsPerPage, $startFrom);
        // $total_records = $this->get_org_info->record_count();
        // $datas['totalPages'] = ceil($total_records / $recordsPerPage);
        // $datas['currentPage'] = $pagination['currentPage'];
        $this->load->view('create_client/grid/Load_client', $pagination); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }
   
    public function get_single_client_info() 
    {
        $this->load->model('Client_model', 'get_client_info');
        $datas['data'] = $this->get_client_info->get_single_client_info($this->input->post('id'));
        echo json_encode($datas); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }
    public function searchclient()
    {
        $search = $this->Client_model->Search($this->input->post('input'));
        $this->load->view('grid/Load_client', $search);
    }
}