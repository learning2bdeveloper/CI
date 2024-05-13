<?php

class Client_profile_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helpers(array('template/organization_template_helper', 'template/pagination_template_helper', 'pagination_helper', 'message_helper'));
        $this->load->model('Client_profile_model');
    }

    public function save_profile()
    {
        $this->Client_profile_model->fname = $this->input->post("first_name");
        $this->Client_profile_model->mname = $this->input->post("middle_name");
        $this->Client_profile_model->lname = $this->input->post("last_name");
        $this->Client_profile_model->email = $this->input->post("email");
        $this->Client_profile_model->civil_status = $this->input->post("civil_status");
        $this->Client_profile_model->gender = $this->input->post("gender");
        $this->Client_profile_model->contact = $this->input->post("contact");
        $this->Client_profile_model->address = $this->input->post("address");

        $response = $this->Client_profile_model->save_profile();
        echo json_encode($response);
    }

    public function save_profile_pic()
    {
        $this->Client_profile_model->image = $_FILES['image'];
        $response = $this->Client_profile_model->save_profile_pic();
        echo json_encode($response);
    }
}
