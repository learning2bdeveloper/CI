<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Client_service extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('client/services/Client_model_service');

        $this->load->database();
    }

    public function signup()
    {

        $this->Client_model_service->firstName = $this->input->post('firstName');
        $this->Client_model_service->middleName = $this->input->post('middleName');
        $this->Client_model_service->lastName = $this->input->post('lastName');
        $this->Client_model_service->email = $this->input->post('email');
        $this->Client_model_service->pwd = $this->input->post('pwd');

        $response = $this->Client_model_service->signup_method_from_model();
        echo json_encode($response);




        // $this->Create_organization_model->imageName = $_FILES['image']['name'];
        // $this->Create_organization_model->imageTmpName = $_FILES['image']['tmp_name'];
        // $this->Create_organization_model->imageType = $_FILES['image']['type'];
        // $this->Create_organization_model->imageError = $_FILES['image']['error'];
        // $this->Create_organization_model->imageSize = $_FILES['image']['size'];
        // $response = $this->Create_organization_model->save_method_from_model();
        // echo json_encode($response);
    }

    public function login()
    {

        $this->Client_model_service->email = $this->input->post('login_email');
        $this->Client_model_service->pwd = $this->input->post('login_pwd');

        //   echo $this->input->post('login_email')+$this->input->post('login_pwd') ;
        $response = $this->Client_model_service->login_method_from_model();
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
