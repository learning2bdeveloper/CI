<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Organization_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Organization_model');
        // $this->load->model('clientprocess/cModel');
        // $this->load->model('process/Process_model');
        // $this->load->model('steps/Steps_model');
        // $this->load->model('clientprocess/services/ClientProcess_documents_service_model');
        $model_l = [
            'clientprocess/ClientProcess_model' => 'cModel',
            'process/Process_model' => 'pModel',
            'steps/Steps_model' => 'sModel',
            'Organization_model' => 'oModel',
        ];
        $this->load->model($model_l);
    }

    public function Index()
    {
        $this->load->helpers(array('template/organization_template_helper', "session_helper"));
        $datas["data"] = $this->oModel->fetch_all_organizations();
        $this->load->view("Index", $datas);
    }

    public function Dashboard()
    {
        $this->load->helpers(array('template/organization_template_helper', "session_helper"));
        $datas["number_of_documents_in_organization"] = $this->cModel->getNumberOfDocumentsInOrganization();
        $this->load->view("Dashboard", $datas);
    }

    public function Check()
    {
        $this->load->helpers(array('template/organization_template_helper'));
        $this->load->view("Check");
    }

    public function FetchUploadedDocumentsCards()
    {
        $datas["data"] = $this->cModel->FetchAllUploadedDocumentsToOrganization();
        $this->load->view("/cards/load_uploaded_documents", $datas);
    }

    public function GetSteps()
    {
        $this->sModel->processID = $this->input->post("processID");
        $response = $this->sModel->GetSteps();
        echo json_encode($response);
    }

    public function GetCurrentStep()
    {
        $this->cModel->clientprocessID = $this->input->post("clientprocessID");
        $response = $this->cModel->getCurrentStepForClientProcess();
        echo json_encode($response);
    }

    public function GetProcesses()
    {
        $datas["data"] = $this->pModel->get_organization_process_info2();
        $this->load->view("dropdowns/load_process", $datas);
    }

    public function FetchCheckDocuments()
    {
        $this->cModel->processID = $this->input->post("processID");
        $datas["data"] = $this->cModel->FetchDocumentsThatNeedsToBeCheckAndUpdateSteps();
        $this->load->view("cards/load_check_uploaded_documents", $datas);
    }

    public function UpdateDocumentStep()
    {
        $this->cModel->clID = $this->input->post("clID");
        $this->cModel->nextStepID = $this->input->post("nextStepID");
        $this->cModel->remarks = $this->input->post("remarks");
        $this->cModel->clientID = $this->input->post("clientID");
        $this->cModel->processID = $this->input->post("processID");

        // echo "clientprocessID = " . $this->input->post("clID");
        // echo "\nnextStepID = " . $this->input->post("nextStepID");
        // echo "\nremarks = " . $this->input->post("remarks");
        // echo "\nclientId = " . $this->input->post("clientID");
        // echo "\nprocessID = " . $this->input->post("processID");
        // echo $this->input->post('remarks');
        // echo $this->input->post('nextStepID');
        // echo  $this->input->post('clID');
        // Load the model and call the method to update the step
        $response = $this->cModel->UpdateStep();
        // echo $response;
        echo json_encode($response);
    }
}
