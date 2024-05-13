<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_service_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('services/Login_service_model');
        $this->load->database();
    }

    public function SetLoginOrganization()
    {

        $this->Login_service_model->username = $this->input->post('login_username');
        $this->Login_service_model->pwd = $this->input->post('login_pwd');

        $response = $this->Login_service_model->LoginOrganization();
        echo json_encode($response);
    }

    public function SetLoginClient()
    {
        $this->Login_service_model->email = $this->input->post('login_email');
        $this->Login_service_model->pwd = $this->input->post('login_pwd');

        //   echo $this->input->post('login_email')+$this->input->post('login_pwd') ;
        $response = $this->Login_service_model->LoginClient();
        echo json_encode($response);
    }
}
