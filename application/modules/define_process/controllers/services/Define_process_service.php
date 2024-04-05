<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Define_process_service extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('define_process/services/Define_process_model');
        $this->load->database();
    }

    public function save()
    {
        // $data = array(
        //     'OrgName' => $this->input->post('organization_name'),
        //     'EmailAddress' => $this->input->post('email'),
        //     'ContactPerson' => $this->input->post('contact_person'),
        //     'ContactNumber' => $this->input->post('contact_number'),
        //     'Address' => $this->input->post('address'),
        //     'Image' => $_FILES['image']['name'],
        // );

        $this->Define_process_model->OrgID = $this->input->post('hidden_elem');
        $this->Define_process_model->processName = $this->input->post('process_name');
        $this->Define_process_model->description = $this->input->post('description');
        $this->Define_process_model->expectedDays = $this->input->post('expected_days');

        $response = $this->Define_process_model->save_method_from_model();
        echo json_encode($response);
    }

    public function delete()
    {

        $this->Create_organization_model->OrgID = $this->input->post('id');
        $this->Create_organization_model->image = $this->input->post('image');
        $response = $this->Create_organization_model->delete_method_from_model();
        echo json_encode($response);
    }

    public function edit()
    {
        // $data = array(
        //     'OrgName' => $this->input->post('edit_organization_name'),
        //     'EmailAddress' => $this->input->post('edit_email'),
        //     'ContactPerson' => $this->input->post('edit_contact_person'),
        //     'ContactNumber' => $this->input->post('edit_contact_number'),
        //     'Address' => $this->input->post('edit_address'),
        //     'OrgID' => $this->input->post('id')
        // );

        $this->Create_organization_model->OrgName = $this->input->post('edit_organization_name');
        $this->Create_organization_model->EmailAddress = $this->input->post('edit_email');
        $this->Create_organization_model->ContactPerson = $this->input->post('edit_contact_person');
        $this->Create_organization_model->ContactNumber = $this->input->post('edit_contact_number');
        $this->Create_organization_model->Address = $this->input->post('edit_address');
        $this->Create_organization_model->OrgID = $this->input->post('id');
        $this->Create_organization_model->image = $_FILES['edit_image'];
        $this->Create_organization_model->oldImage = $this->input->post('oldimage');
        $response = $this->Create_organization_model->edit_method_from_model();
        echo json_encode($response);
        // echo         var_dump($this->input->post('edit_organization_name'), $this->input->post('edit_email'), $this->input->post('edit_contact_person'), $this->input->post('edit_contact_number'), $this->input->post('edit_address'),  $this->input->post('id'), $_FILES['edit_image']['name'], $this->input->post('oldimage'));
    }
}
