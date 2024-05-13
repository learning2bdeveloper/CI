<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logout_service_model extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function logout_method_from_model()
    {
        // Destroy entire session
        $this->session->sess_destroy();
        return array('message' => 'Logout Successfully!', 'has_error' => false);
    }
}
