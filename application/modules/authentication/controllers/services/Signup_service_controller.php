<?php

class Signup_service_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helpers(array('template/organization_template_helper', 'template/pagination_template_helper', 'pagination_helper', 'message_helper'));
        $this->load->model('Client_model');
        $this->load->model('services/Signup_service_model');
    }

    public function SetSignupOrganization()
    {
        $this->Signup_service_model->organizationID = $this->input->post('organizationsdropdown');
        $this->Signup_service_model->department = $this->input->post('department');
        $this->Signup_service_model->username = $this->input->post('username');
        $this->Signup_service_model->pwd = $this->input->post('pwd');

        $response = $this->Signup_service_model->SignupOrganization();
        echo json_encode($response);
    }

    public function SetSignupClient()
    {
    }
}
