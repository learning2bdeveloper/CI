<?php

class Admin extends MY_Controller
{
    private $datas = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); //fix ko ni karon ang helpers kay dapat sa directly sa views sila or dapat sa models lng 
        $this->load->helpers(array('template/organization_template_helper', 'pagination_helper', 'message_helper'));
        $this->load->model('Organization_model');
        $this->load->model('Process_model');
        $this->load->model('Steps_model');
    }

    public function Index()
    {
        $this->load->view('Index');
    }

    public function Organization()
    {
        $this->load->view('Organizations');
    }

    ///////////// ORGANIZATIONS
    public function organization_table_with_pagination()
    {
        $pagination = pagination($this->input->post('page'), 'Organization_model', "fetch_organization", "record_count", $this->input->post('recordsPerPage'));

        // if ($this->session->userdata("type") == "client") {
        //     $this->load->view('client/grid/Load_organization', $pagination); // need dapat array hahhaa mag pasa data kung nd nd ya makita
        // } else {
        $this->load->view('admin/grid/Load_organization', $pagination); // need dapat array hahhaa mag pasa data kung nd nd ya makita
        //}
    }

    public function get_single_organization_info()
    {
        $datas['data'] = $this->Organization_model->get_single_organization_info($this->input->post('id'));
        echo json_encode($datas); // need dapat array hahhaa mag pasa data kung nd nd ya makita
    }

    public function search()
    {
        $search = $this->Organization_model->Search($this->input->post('input'));

        $this->load->view('grid/Load_organization', $search); // need dapat array hahhaa mag pasa data kung nd nd ya makita

    }

    public function number_of_organizations()
    {
        echo $this->Organization_model->record_count();
    }

    public function number_of_clients()
    {
        echo $this->Organization_model->record_count2();
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
        $datas['data'] = $this->Steps_model->steps();
        $datas['processID'] =  $this->input->post('processID');
        $this->load->view('grid/Load_steps', $datas);
    }
}
