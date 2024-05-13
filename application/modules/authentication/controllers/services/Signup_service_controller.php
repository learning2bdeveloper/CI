<?php

class Signup_service_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $this->Signup_service_model->firstName = $this->input->post('firstName');
        $this->Signup_service_model->middleName = $this->input->post('middleName');
        $this->Signup_service_model->lastName = $this->input->post('lastName');
        $this->Signup_service_model->email = $this->input->post('email');
        $this->Signup_service_model->pwd = $this->input->post('pwd');

        $response = $this->Signup_service_model->SignupClient();
        echo json_encode($response);
    }
}
