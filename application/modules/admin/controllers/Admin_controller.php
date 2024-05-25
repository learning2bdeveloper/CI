<?php

class Admin_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); //fix ko ni karon ang helpers kay dapat sa directly sa views sila or dapat sa models lng 
        $this->load->helpers(array('template/organization_template_helper', 'pagination_helper', 'message_helper'));
        $this->load->model('organization/Organization_model');
        $this->load->model('process/Process_model');
        $this->load->model('steps/Steps_model');
    }

    public function Index()
    {
        $datas["numberoforganizations"] = $this->Organization_model->record_count();
        $datas["numberofclients"] = $this->Organization_model->record_count2();
        $this->load->view('Index', $datas);
    }

    public function Organization()
    {
        $this->load->view('Organizations');
    }

    ///////////// ORGANIZATIONS
    public function GetOrganizationInfoWithPagination()
    {
        $pagination = pagination($this->input->post('page'), 'Organization_model', "fetch_organization", "record_count", $this->input->post('recordsPerPage'));
        $this->load->view('admin/grid/Load_organization', $pagination);
    }

    public function GetSingleOrganizationInfo()
    {
        $datas['data'] = $this->Organization_model->GetSingleInfoOrganization($this->input->post('id'));
        echo json_encode($datas); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }

    public function SearchOrganization()
    {
        $search = $this->Organization_model->Search($this->input->post('input'));
        $this->load->view('grid/Load_organization', $search); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }

    ///////////// PROCESSES

    public function Process()
    {
        $datas["orgID"] = $this->input->get('orgID');
        $this->load->view("Process_Crud", $datas);
    }

    public function Processes() // para sa table
    {
        $this->Process_model->orgID = $this->input->post('orgID'); // halin ni sa process() through processCrud then process.js pakadto diri kay para ma kwa ang orgiD value sa url using get
        $datas['data'] = $this->Process_model->get_organization_process_info();

        $this->load->view('grid/Load_process', $datas);
    }

    ///////////// STEPS

    public function load_steps()
    {
        $this->Steps_model->processID = $this->input->post('processID');
        $datas['data'] = $this->Steps_model->GetSteps();
        $datas['processID'] =  $this->input->post('processID');
        $this->load->view('grid/Load_steps', $datas);
    }
}
