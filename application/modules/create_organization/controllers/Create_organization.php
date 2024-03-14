<?php

class Create_organization extends MY_Controller
{
    private $datas = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helpers(array('template/organization_helper', 'message_helper'));
        $this->load->model('Organization_model', 'get_org_info');
    }


    public function kandeng()
    {
        echo "hello world!";
    }

    public function index()
    {

        $this->load->view('homepage');
    }

    public function create()
    {
        $this->load->view('creation_org');
    }

    public function crud()
    {
        $this->load->view('orgCrud');
    }

    // public function creation_org() {
    //     $this->load->view('creation_org');
    // }

    // public function create()
    // {
    //     $this->input->
    // }


    public function get_organization_info_with_pagination()
    {

        if ($this->input->post('page') !== null) {
            $currentPage = $this->input->post('page');
        } else {
            $currentPage = 1;
        }
        $recordsPerPage = 10;
        // Calculate the starting record index
        $startFrom = ($currentPage - 1) * $recordsPerPage;
        $datas['data'] = $this->get_org_info->fetch_organization($recordsPerPage, $startFrom);
        $total_records = $this->get_org_info->record_count();
        $datas['totalPages'] = ceil($total_records / $recordsPerPage);
        $datas['currentPage'] = $currentPage;
        $this->load->view('create_organization/grid/Load_organization', $datas); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }

    public function get_single_organization_info()
    {
        $this->load->model('Organization_model', 'get_org_info');
        $datas['data'] = $this->get_org_info->get_single_organization_info($this->input->post('id'));
        echo json_encode($datas); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }

    public function search()
    {
        $this->load->model('Organization_model', 'get_org_info');
        $datas['data'] = $this->get_org_info->Search($this->input->post('input'));
        $this->load->view('grid/Load_organization', $datas);
    }
}
