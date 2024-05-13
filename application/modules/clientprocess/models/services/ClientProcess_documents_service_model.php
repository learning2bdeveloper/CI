<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ClientProcess_documents_service_model extends CI_Model
{

    private $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('message_helper');
        $this->Table = json_decode(TABLE);
        $this->load->database();
    }

    public function uploadDocs()
    {

        // Get the original filename
        $originalFileName = $this->file['name'];
        // Construct the new filename with the unique identifier
        $fileNameNew = uniqid('', true) . '___' . $originalFileName;
        $fileExtension = explode('.', $this->file['name']);
        $finalfileExtension = strtolower(end($fileExtension));
        $fileDestination = 'assets/documents/' . $fileNameNew;
        // $fileDestination = 'assets/images/profiles/' . $fileNameNew;

        if ($this->file['error'] !== 0) {
            return array('message' => FILE_ERROR, 'has_error' => true);
        }
        if (!in_array($finalfileExtension, array('pdf', 'doc', 'docx'))) {
            return array('message' => FILE_TYPE_ERROR, 'has_error' => true);
        }
        if (!move_uploaded_file($this->file['tmp_name'], $fileDestination)) {
            return array('message' => IMAGE_MOVE_FILE_ERROR, 'has_error' => true);
        }
        $data = array(
            'Title' => $this->title,
            'Type' => $this->type,
            'OriginalFileName' => $originalFileName, // Add OriginalFileName to the data array
            'FileName' => $fileNameNew,
            'ProcessID' => $this->processID,
            'Status' => "In progress",
            'ClientID ' => $this->session->userdata('clientID'),
            'StartDate' => date('Y-m-d H:i:s'),
        );
        try {

            $this->db->trans_start();

            $this->db->insert($this->Table->clientprocess, $data); // Table-> nd Table[''] kay bawal array 

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function setCancelledDocument()
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $this->client_process_id);
            $this->db->update($this->Table->clientprocess, array("Status" => "Cancelled"));
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => CANCELLED, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return array('message' => $msg->getMessage(), 'has_error' => true);
        }
    }

    public function setDeleteDocument()
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $this->client_process_id);
            $this->db->update($this->Table->clientprocess, array("Status" => "Deleted"));
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => CANCELLED, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return array('message' => $msg->getMessage(), 'has_error' => true);
        }
    }
}
