<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Signup_service_model extends CI_Model
{

    private $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('message_helper');
        $this->Table = json_decode(TABLE);
        $this->load->database();
    }

    public function SignupOrganization()
    {

        // Check if the email already exists in the database
        $username_exists = $this->db->get_where($this->Table->department, array('Username' => $this->username))->num_rows() > 0;

        if ($username_exists) {
            return array('message' => 'Username already exists', 'has_error' => true);
        }

        // Combine the password and salt
        $hashed_password = password_hash($this->pwd, PASSWORD_BCRYPT, array('cost' => 15));

        $data = array(
            'OrgID' => $this->organizationID,
            'Department' => $this->department,
            'Username' => $this->username,
            'Password' => $hashed_password,
        );
        try {

            $this->db->trans_start();

            $this->db->insert($this->Table->department, $data); // Table-> nd Table[''] kay bawal array 

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

    public function SignupClient()
    {
        // Check if the email already exists in the database
        $email_exists = $this->db->get_where($this->Table->client, array('EmailAddress' => $this->email))->num_rows() > 0;

        if ($email_exists) {
            return array('message' => 'Email address already exists', 'has_error' => true);
        }

        // Combine the password and salt
        $hashed_password = password_hash($this->pwd, PASSWORD_BCRYPT, array('cost' => 15));

        $data = array(
            'FName' => $this->firstName,
            'MName' => $this->middleName,
            'LName' => $this->lastName,
            'Password' => $hashed_password,
            'EmailAddress' => $this->email,
        );
        try {

            $this->db->trans_start();

            $this->db->insert($this->Table->client, $data); // Table-> nd Table[''] kay bawal array 

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
