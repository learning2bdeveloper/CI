<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ClientSteps_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Organization_model');
        $this->load->model('clientprocess/ClientProcess_model');
    }

    public function Index()
    {
        $this->load->helpers(array('template/organization_template_helper', "session_helper"));
        $datas["data"] = $this->Organization_model->fetch_all_organizations();
        $this->load->view("Index", $datas);
    }

    public function Dashboard()
    {
        $this->load->helpers(array('template/organization_template_helper', "session_helper"));
        $datas["number_of_documents_in_organization"] = $this->ClientProcess_model->getNumberOfDocumentsInOrganization();
        $this->load->view("Dashboard", $datas);
    }

    public function Check()
    {
        $this->load->helpers(array('template/organization_template_helper'));
        $this->load->view("Check");
    }

    public function FetchUploadedDocumentsCards()
    {
        $datas["data"] = $this->ClientProcess_model->FetchAllUploadedDocumentsToOrganization();
        $this->load->view("/cards/load_uploaded_documents", $datas);
    }

    public function FetchCheckDocuments()
    {
    }
}
