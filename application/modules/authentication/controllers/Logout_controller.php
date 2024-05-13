<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logout_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Logout_service_model');
    }

    public function logout()
    {
        $response = $this->Logout_service_model->logout_method_from_model();
        echo json_encode($response);
    }
}
