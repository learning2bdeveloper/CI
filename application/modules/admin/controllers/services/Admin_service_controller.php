<?php

class Admin_service_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('organization/services/Organization_service_model');
        $this->load->model('process/services/Process_service_model');
        $this->load->model('steps/services/Steps_service_model');
    }

    public function DeleteOrganization()
    {
        $this->Organization_service_model->OrgID = $this->input->post('id');
        $this->Organization_service_model->image = $this->input->post('image');
        $response = $this->Organization_service_model->delete_method_from_model();
        echo json_encode($response);
    }

    public function SaveOrganization()
    {
        $this->Organization_service_model->OrgName = $this->input->post('organization_name');
        $this->Organization_service_model->EmailAddress = $this->input->post('email');
        $this->Organization_service_model->ContactPerson = $this->input->post('contact_person');
        $this->Organization_service_model->ContactNumber = $this->input->post('contact_number');
        $this->Organization_service_model->Address = $this->input->post('address');
        $this->Organization_service_model->image = $_FILES['image'];
        $response = $this->Organization_service_model->save_method_from_model();
        echo json_encode($response);
    }

    public function EditOrganization()
    {
        $this->Organization_service_model->OrgName = $this->input->post('edit_organization_name');
        $this->Organization_service_model->EmailAddress = $this->input->post('edit_email');
        $this->Organization_service_model->ContactPerson = $this->input->post('edit_contact_person');
        $this->Organization_service_model->ContactNumber = $this->input->post('edit_contact_number');
        $this->Organization_service_model->Address = $this->input->post('edit_address');
        $this->Organization_service_model->OrgID = $this->input->post('id');
        $this->Organization_service_model->image = $_FILES['edit_image'];
        $this->Organization_service_model->oldImage = $this->input->post('oldimage');
        $response = $this->Organization_service_model->edit_method_from_model();
        echo json_encode($response);
    }

    public function SaveProcess()
    {
        $this->Process_service_model->OrgID = $this->input->post('hidden_elem');
        $this->Process_service_model->processName = $this->input->post('process_name');
        $this->Process_service_model->description = $this->input->post('description');
        $this->Process_service_model->expectedDays = $this->input->post('expected_days');

        $response = $this->Process_service_model->save_method_from_model();
        echo json_encode($response);
    }

    public function DeleteProcess()
    {
        $this->Process_service_model->processID = $this->input->post("processID");
        $response = $this->Process_service_model->delete_method_from_model();
        echo json_encode($response);
    }

    public function SaveStep()
    {
        $this->Steps_service_model->processID = $this->input->post('processID');
        $this->Steps_service_model->stepName = $this->input->post('step_name');
        $this->Steps_service_model->sequenceNumber = $this->input->post('sequence_number');
        $this->Steps_service_model->prerequisite = $this->input->post('prerequisite');

        $response = $this->Steps_service_model->save_method_from_model();
        echo json_encode($response);
    }

    public function DeleteStep()
    {
        $this->Steps_service_model->stepID = $this->input->post("stepID");
        $response = $this->Steps_service_model->delete_method_from_model();
        echo json_encode($response);
    }
}
