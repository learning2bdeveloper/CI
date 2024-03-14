<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Create_client_service extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('create_client/services/Create_client_model', 'create_client_model');
        $this->load->database();

    }

    public function saveinfo() {
        $data = array(
        'UserName' => $this->input->post('user_name'),
        'FName' => $this->input->post('first_name'),
        'MName' => $this->input->post('middle_name'),
        'LName' => $this->input->post('last_name'),
        'Password' => $this->input->post('password'),
        'Gender' => $this->input->post('gender'),
        'CivilStatus' => $this->input->post('civil_status'),
        'ContactNo' => $this->input->post('contact_no'),
        'EmailAddress' => $this->input->post('email'),
        'Address' => $this->input->post('address'),
        );
        
        $this->create_client_model->save_method_from_model($data);
    }

    public function deleteinfo() {

        $this->create_client_model->delete_method_from_model($this->input->post('id'));
    }
    
    public function editinfo() {
        $data = array(
            'UserName' => $this->input->post('edit_user_name'),
            'FName' => $this->input->post('edit_first_name'),
            'MName' => $this->input->post('edit_middle_name'),
            'LName' => $this->input->post('edit_last_name'),
            'Password' => $this->input->post('edit_password'),
            'Gender' => $this->input->post('edit_gender'),
            'CivilStatus' => $this->input->post('edit_civil_status'),
            'ContactNo' => $this->input->post('edit_contact_no'),
            'EmailAddress' => $this->input->post('edit_email'),
            'Address' => $this->input->post('edit_address'),
            );
        var_dump($data);
        $this->create_client_model->edit_method_from_model($data);
    }
}