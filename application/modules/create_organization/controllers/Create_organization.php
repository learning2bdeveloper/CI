<?php

class Create_organization extends MY_Controller
{
    private $datas = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helpers(array('template/organization_helper', 'message_helper'));
    }


    public function kandeng() {
        echo "hello world!";
    }

    public function index() {

        $this->load->view('homepage');
   
    }

    public function create() {
        $this->load->view('creation_org');
    }

    public function crud() {
        $this->load->view('orgCrud');
    }

    // public function creation_org() {
    //     $this->load->view('creation_org');
    // }

    // public function create()
    // {
    //     $this->input->
    // }

    public function get_organization_info()
    {
        $this->load->model('Organization_model', 'get_org_info');
        $datas['data'] = $this->get_org_info->get_organizations_info();

        $this->load->view('create_organization/grid/Load_organization', $datas); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }
   
    public function get_single_organization_info() 
    {
        $this->load->model('Organization_model', 'get_org_info');
        $datas['data'] = $this->get_org_info->get_single_organization_info($this->input->post('id'));
        echo json_encode($datas); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }
}