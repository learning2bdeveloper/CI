<?php

class Client extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helpers(array('template/organization_template_helper', 'template/pagination_template_helper', 'pagination_helper', 'message_helper'));
        $this->load->model('Client_model');
    }


    public function index()
    {

        $this->load->view('homepage');
    }


    public function landingpage()
    {

        $this->load->view('landingpage');
    }

    public function upload()
    {

        $this->load->view('uploaddocuments');
    }


    public function profile()
    {
        $datas['data'] = $this->Client_model->get_single_client_info();
        $this->load->view('profilesettings', $datas);
    }

    public function save_profile()
    {
        $this->Client_model->fname = $this->input->post("first_name");
        $this->Client_model->mname = $this->input->post("middle_name");
        $this->Client_model->lname = $this->input->post("last_name");
        $this->Client_model->email = $this->input->post("email");
        $this->Client_model->civil_status = $this->input->post("civil_status");
        $this->Client_model->gender = $this->input->post("gender");
        $this->Client_model->contact = $this->input->post("contact");
        $this->Client_model->address = $this->input->post("address");

        $response = $this->Client_model->save_profile();
        echo json_encode($response);
    }

    public function save_profile_pic()
    {
        $this->Client_model->image = $_FILES['image'];
        $response = $this->Client_model->save_profile_pic();
        echo json_encode($response);
    }
}
