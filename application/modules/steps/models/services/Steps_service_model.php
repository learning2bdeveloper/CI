<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Steps_service_model extends CI_Model
{


    private $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('message_helper');
        $this->Table = json_decode(TABLE);
    }

    public function save_method_from_model()
    {

        $data = array(
            'ProcessID' => $this->processID,
            'StepName' => $this->stepName,
            'SequenceNumber' => $this->sequenceNumber,
            'Prerequisite' => $this->prerequisite,
        );

        try {

            $this->db->trans_start();

            $this->db->insert($this->Table->steps, $data); // Table-> nd Table[''] kay bawal array 

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

    private function checkStepDocuments($stepID)
    {
        $query = $this->db->from($this->Table->clientsteps)
            ->where("StepID", $stepID)
            ->get();

        return $query->num_rows() > 0; //direct approach bag o ko lng bal an. if na wla if(). true / false
    }

    public function delete_method_from_model()
    {
        if ($this->checkStepDocuments($this->stepID)) {
            return array("message" => "Can't delete there are documents in this step!", "has_error" => true);
        }

        try {
            $this->db->trans_start();
            $this->db->where('StepID', $this->stepID);
            $this->db->delete($this->Table->steps);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                //$this->db->trans_commit();
                return array('message' => "Step deleted!", 'has_error' => false);
            }
        } catch (Exception $msg) {
            return array('message' => $msg->getMessage(), 'has_error' => true);
        }
    }

    public function edit_method_from_model()
    {
        // $this->Create_organization_model->OrgName = $this->input->post('edit_organization_name');
        // $this->Create_organization_model->EmailAddress = $this->input->post('edit_email');
        // $this->Create_organization_model->ContactPerson = $this->input->post('edit_contact_person');
        // $this->Create_organization_model->ContactNumber = $this->input->post('edit_contact_number');
        // $this->Create_organization_model->Address = $this->input->post('edit_address');
        // $this->Create_organization_model->OrgID = $this->input->post('id');
        // $this->Create_organization_model->oldImage = $this->input->post('oldimage');

        if (!$this->oldImage == null and file_exists('assets/images/profiles/' . $this->oldImage)) {
            unlink('assets/images/profiles/' . $this->oldImage);
        }

        $fileExtension = explode('.', $this->image['name']);
        $finalfileExtension = strtolower(end($fileExtension));
        if ($this->image['error'] !== 0) {
            return array('message' => IMAGE_ERROR, 'has_error' => true);
        }
        if (!in_array($finalfileExtension, array('jpg', 'png', 'jpeg', 'pdf'))) {
            return array('message' => IMAGE_TYPE_ERROR, 'has_error' => true);
        }
        $fileNameNew = uniqid('', true) . "." . $finalfileExtension;
        $fileDestination = 'assets/images/profiles/' . $fileNameNew;

        if (!move_uploaded_file($this->image['tmp_name'], $fileDestination)) {
            return array('message' => IMAGE_MOVE_FILE_ERROR, 'has_error' => true);
        }


        $data = array(
            'OrgName' => $this->OrgName,
            'EmailAddress' => $this->EmailAddress,
            'ContactPerson' => $this->ContactPerson,
            'ContactNumber' => $this->ContactNumber,
            'Address' => $this->Address,
            'OrgID' => $this->OrgID,
            'Image' => $fileNameNew,
        );
        try {
            $this->db->trans_start();
            $this->db->where('OrgID', $data['OrgID']);
            $this->db->update($this->Table->organization, $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => DELETED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }
}
