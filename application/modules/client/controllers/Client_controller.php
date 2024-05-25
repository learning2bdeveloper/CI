<?php

class Client_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helpers(array('template/organization_template_helper', 'template/pagination_template_helper', 'pagination_helper', 'message_helper'));
        $this->load->model('Client_model');
        $this->load->model('organization/Organization_model');
        $this->load->model('clientprocess/ClientProcess_model');
        $this->load->model('process/Process_model');
        $this->load->model('steps/Steps_model');
    }


    public function Index()
    {
        $this->load->view('Index');
    }


    public function Organizations()
    {
        $this->load->view('viewOrganizations');
    }

    public function upload()
    {
        $this->load->view('uploaddocuments');
    }

    public function GetOrganizationInfoWithPagination()
    {
        $pagination = pagination($this->input->post('page'), 'Organization_model', "fetch_organization", "record_count", $this->input->post('recordsPerPage'));
        $this->load->view('client/grid/Load_organization', $pagination); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }

    public function SearchOrganization()
    {
        $search = $this->Organization_model->Search($this->input->post('input'));
        $this->load->view('client/grid/Load_organization', $search); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }

    public function Dashboard()
    {
        $datas["numberofdeletedDocs"] = $this->ClientProcess_model->getNumberOfDeletedDoumentsOfClient();
        $datas["numberofuploadedDocs"] = $this->ClientProcess_model->get_numberofuploadedDocs();
        $this->load->view('Dashboard', $datas);
    }

    public function Profile()
    {
        $datas['data'] = $this->Client_model->get_single_client_info();
        $this->load->view('profilesettings', $datas);
    }

    public function Process()
    {
        $this->Process_model->orgID = $this->input->get('orgID'); // halin ni sa process() through processCrud then process.js pakadto diri kay para ma kwa ang orgiD value sa url using get
        $datas['data'] = $this->Process_model->get_organization_process_info();
        $datas['orgName'] = $this->input->get('orgName');
        $this->load->view('Processes', $datas);
    }

    public function show_steps()
    {
        $this->Steps_model->processID = $this->input->post('processID');
        $datas['data'] = $this->Steps_model->GetSteps();
        $this->load->view("grid/Load_steps", $datas);
    }

    public function FetchClientsDocs()
    {
        $datas["fetchedDocs"] = $this->ClientProcess_model->fetch_all_client_docs();
        $this->load->view("cards/load_documents", $datas);
    }

    public function LoadTrackingSystem()
    {
        $this->Steps_model->processID = $this->input->post("processID");
        $this->Steps_model->clientprocessID = $this->input->post("clientprocessID");
        $datas["data2"] = $this->Steps_model->GetClientStepsCompleted();
        $datas["data"] = $this->Steps_model->GetSteps();
        $this->load->view("tracking/load_track", $datas);
    }
}
