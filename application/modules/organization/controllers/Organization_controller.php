<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Organization_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Organization_model');
        $this->load->model('clientprocess/ClientProcess_model');
        $this->load->database();
    }

    public function Index()
    {
        $this->load->helpers(array('template/organization_template_helper'));
        $datas["data"] = $this->Organization_model->fetch_all_organizations();
        $this->load->view("Index", $datas);
    }

    public function Dashboard()
    {
        $this->load->helpers(array('template/organization_template_helper'));
        $this->ClientProcess_model->OrgID = $this->session->userdata("OrgID");
        $datas["number_of_documents_in_organization"] = $this->ClientProcess_model->getNumberOfDocumentsInOrganization();
        $this->load->view("Dashboard", $datas);
    }
}
