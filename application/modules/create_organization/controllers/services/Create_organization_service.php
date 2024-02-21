<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Create_organization_service extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('create_organization/services/Create_organization_model', 'create_organization_model');
        $this->load->database();

    }

    public function save() {
        $data = array(
        'OrgName' => $this->input->post('organization_name'),
        'Email' => $this->input->post('email'),
        'ContactPerson' => $this->input->post('contact_person'),
        'ContactNumber' => $this->input->post('contact_number'),
        'Address' => $this->input->post('address'),
        );
        
        $this->create_organization_model->save_method_from_model($data);
    }

    public function delete() {

        $this->create_organization_model->delete_method_from_model($this->input->post('id'));
    }
}