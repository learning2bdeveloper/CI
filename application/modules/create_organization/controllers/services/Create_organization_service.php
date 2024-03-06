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
        'EmailAddress' => $this->input->post('email'),
        'ContactPerson' => $this->input->post('contact_person'),
        'ContactNumber' => $this->input->post('contact_number'),
        'Address' => $this->input->post('address'),
        );
        
        $this->create_organization_model->save_method_from_model($data);
    }

    public function delete() {

        $this->create_organization_model->delete_method_from_model($this->input->post('id'));
    }
    
    public function edit() {
        $data = array(
        'OrgName' => $this->input->post('edit_organization_name'),
        'EmailAddress' => $this->input->post('edit_email'),
        'ContactPerson' => $this->input->post('edit_contact_person'),
        'ContactNumber' => $this->input->post('edit_contact_number'),
        'Address' => $this->input->post('edit_address'),
        'OrgID' => $this->input->post('id')
        );
        var_dump($data);
        $this->create_organization_model->edit_method_from_model($data);
    }
}