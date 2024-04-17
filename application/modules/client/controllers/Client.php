<?php

class Client extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helpers(array('template/organization_template_helper', 'template/pagination_template_helper', 'pagination_helper', 'message_helper'));
        //$this->load->model('Organization_model');
    }


    public function index()
    {

        $this->load->view('homepage');
    }

    public function landingpage()
    {

        $this->load->view('landingpage');
    }

    public function upload()
    {

        $this->load->view('uploaddocuments');
    }


    public function settings()
    {

        $this->load->view('profilesettings');
    }

}
