<?php

class Create_client extends MY_Controller
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

    public function get_client_info()
    {
        $this->load->model('Client_model', 'get_client_info');
        $datas['data'] = $this->get_client_info->get_client_info();

        $this->load->view('create_client/grid/Load_client', $datas); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }
   
    public function get_single_client_info() 
    {
        $this->load->model('Client_model', 'get_client_info');
        $datas['data'] = $this->get_client_info->get_single_client_info($this->input->post('id'));
        echo json_encode($datas); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }
}