<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Organization_service_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('admin/services/Organization_model_services');
        $this->load->database();
    }

    // public function save() again basi sa future sbong admin pa lng may access dapat 
    // {
    //     $this->Organization_model_services->OrgName = $this->input->post('organization_name');
    //     $this->Organization_model_services->EmailAddress = $this->input->post('email');
    //     $this->Organization_model_services->ContactPerson = $this->input->post('contact_person');
    //     $this->Organization_model_services->ContactNumber = $this->input->post('contact_number');
    //     $this->Organization_model_services->Address = $this->input->post('address');
    //     $this->Organization_model_services->image = $_FILES['image'];
    //     // $this->Organization_model_services->imageName = $_FILES['image']['name'];
    //     // $this->Organization_model_services->imageTmpName = $_FILES['image']['tmp_name'];
    //     // $this->Organization_model_services->imageType = $_FILES['image']['type'];
    //     // $this->Organization_model_services->imageError = $_FILES['image']['error'];
    //     // $this->Organization_model_services->imageSize = $_FILES['image']['size'];
    //     $response = $this->Organization_model_services->save_method_from_model();
    //     echo json_encode($response);
    // }

    // public function delete() maybe sa future may organization na e delete sa org route
    // {

    //     $this->Organization_model_services->OrgID = $this->input->post('id');
    //     $this->Organization_model_services->image = $this->input->post('image');
    //     $response = $this->Organization_model_services->delete_method_from_model();
    //     echo json_encode($response);
    // }

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

        $this->Organization_model_services->OrgName = $this->input->post('edit_organization_name');
        $this->Organization_model_services->EmailAddress = $this->input->post('edit_email');
        $this->Organization_model_services->ContactPerson = $this->input->post('edit_contact_person');
        $this->Organization_model_services->ContactNumber = $this->input->post('edit_contact_number');
        $this->Organization_model_services->Address = $this->input->post('edit_address');
        $this->Organization_model_services->OrgID = $this->input->post('id');
        $this->Organization_model_services->image = $_FILES['edit_image'];
        $this->Organization_model_services->oldImage = $this->input->post('oldimage');
        $response = $this->Organization_model_services->edit_method_from_model();
        echo json_encode($response);
        // echo         var_dump($this->input->post('edit_organization_name'), $this->input->post('edit_email'), $this->input->post('edit_contact_person'), $this->input->post('edit_contact_number'), $this->input->post('edit_address'),  $this->input->post('id'), $_FILES['edit_image']['name'], $this->input->post('oldimage'));
    }
}
