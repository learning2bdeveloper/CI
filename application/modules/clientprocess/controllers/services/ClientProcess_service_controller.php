<?php

class ClientProcessController_service extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helpers(array('template/organization_template_helper', 'template/pagination_template_helper', 'pagination_helper', 'message_helper'));
        $this->load->model('Client_model');
        $this->load->model('admin/Organization_model');
        $this->load->model('services/ClientProcessModel_service');
    }
}
