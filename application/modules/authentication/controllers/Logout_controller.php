<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logout_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Logout_service_model');
    }

    public function LogoutOrganization()
    {
        $response = $this->Logout_service_model->LogoutOrganization();
        echo json_encode($response);
    }

    public function LogoutClient()
    {
        $response = $this->Logout_service_model->LogoutClient();
        echo json_encode($response);
    }
}
