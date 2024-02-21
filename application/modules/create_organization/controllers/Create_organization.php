<?php

class Create_organization extends MY_Controller
{
    private $datas = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function kandeng() {
        echo "hello world!";
    }

    public function index() {

        $this->load->view('index');
   
    }

    public function create() {
        $this->load->view('creation_org');
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
        $this->datas['data'] = $this->get_org_info->get_organizations_info();
        $this->load->view('create_organization/grid/Load_organization', $this->datas); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }
}