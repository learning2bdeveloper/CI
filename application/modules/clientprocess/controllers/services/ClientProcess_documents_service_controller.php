<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ClientProcess_documents_service_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('services/ClientProcess_documents_service_model');
    }


    public function uploadDocs()
    {
        $this->ClientProcess_documents_service_model->title = $this->input->post('title');
        $this->ClientProcess_documents_service_model->type = $this->input->post('type');
        $this->ClientProcess_documents_service_model->file = $_FILES['fileupload'];
        $this->ClientProcess_documents_service_model->processID = $this->input->post('processID');

        $response = $this->ClientProcess_documents_service_model->uploadDocs();
        echo json_encode($response);
    }

    public function cancelDocument()
    {
        $this->ClientProcess_documents_service_model->client_process_id = $this->input->post("client_process_id");
        $response = $this->ClientProcess_documents_service_model->setCancelledDocument();
        echo json_encode($response);
    }

    public function deleteDocument()
    {
        $this->ClientProcess_documents_service_model->client_process_id = $this->input->post("client_process_id");
        $response = $this->ClientProcess_documents_service_model->setDeleteDocument();
        echo json_encode($response);
    }

    public function rejectDocument()
    {
        $this->ClientProcess_documents_service_model->client_process_id = $this->input->post("client_process_id");
        $response = $this->ClientProcess_documents_service_model->setRejectDocument();
        echo json_encode($response);
    }

    public function acceptDocument()
    {
        $this->ClientProcess_documents_service_model->client_process_id = $this->input->post("client_process_id");
        $this->ClientProcess_documents_service_model->client_id = $this->input->post("client_id");
        $this->ClientProcess_documents_service_model->process_id = $this->input->post("process_id");

        $response = $this->ClientProcess_documents_service_model->setAcceptDocument();
        echo json_encode($response);
    }
}
