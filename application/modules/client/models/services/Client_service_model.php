<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Client_model_service extends CI_Model
{

    private $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('message_helper');
        $this->Table = json_decode(TABLE);
    }

    public function delete_method_from_model()
    {
        if (!$this->image == null and file_exists('assets/images/profiles/' . $this->image)) {
            unlink('assets/images/profiles/' . $this->image);
            clearstatcache();
        }
        try {
            $this->db->trans_start();
            $this->db->where('OrgID', $this->OrgID);
            $this->db->delete($this->Table->organization);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => DELETED_SUCCESSFUL, 'has_error' => false);
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
