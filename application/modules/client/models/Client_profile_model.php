<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Client_profile_model extends CI_Model
{
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('message_helper', 'pagination_helper');

        $this->Table = json_decode(TABLE);
    }

    public function save_profile()
    {
        // Update the database record
        $data = array(
            'FName' => $this->fname,
            'MName' => $this->mname,
            'LName' => $this->lname,
            'EmailAddress' => $this->email,
            'CivilStatus' => $this->civil_status,
            'Gender' => $this->gender,
            'ContactNo' => $this->contact,
            'Address' => $this->address
        );

        $this->db->where('ClientID', $this->session->userdata("clientID"));
        if ($this->db->update($this->Table->client, $data)) {
            return array('message' => UPDATE_SUCCESSFUL, 'has_error' => false);
        }
    }

    public function save_profile_pic()
    {

        $fileExtension = explode('.', $this->image['name']);
        $finalfileExtension = strtolower(end($fileExtension));
        if ($this->image['error'] !== 0) {
            return array('message' => IMAGE_ERROR, 'has_error' => true);
        }
        if (!in_array($finalfileExtension, array('jpg', 'png', 'jpeg', 'pdf'))) {
            return array('message' => IMAGE_TYPE_ERROR, 'has_error' => true);
        }
        $fileNameNew = uniqid('', true) . "." . $finalfileExtension;
        $fileDestination = 'assets/images/client_profiles/' . $fileNameNew;

        if (!move_uploaded_file($this->image['tmp_name'], $fileDestination)) {
            return array('message' => IMAGE_MOVE_FILE_ERROR, 'has_error' => true);
        }
        $data = array(
            'Image' => $fileNameNew,
        );

        try {

            $this->db->trans_start();

            // Add your where clause condition
            $this->db->where('ClientID', $this->session->userdata("clientID"));

            // Get the current filename without updating
            $query = $this->db->get($this->Table->client)->row();
            $oldFileName = $query->Image;

            if (!$oldFileName == "") {
                unlink('assets/images/client_profiles/' . $oldFileName);
                clearstatcache();
            }


            $this->db->update($this->Table->client, $data);

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
}
