<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_service_model extends CI_Model
{

    private $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(
            array("message_helper", "utils_helper")
        );
        $this->Table = json_decode(TABLE);
    }

    public function LoginOrganization()
    {
        // Check if the email exists in the database
        $this->db->select("tbl_organization_departments.*, tbl_organization.OrgName");
        $this->db->from($this->Table->department);
        $this->db->join("tbl_organization", "tbl_organization_departments.OrgID = tbl_organization.OrgID");
        $this->db->where("Username", $this->username);
        $user = $this->db->get()->row();

        // If the user doesn't exist, return an error message
        if (!$user) {
            return array('message' => 'Username does not exist', 'has_error' => true);
        }

        // If the user exists, verify the password
        if (!password_verify($this->pwd, $user->Password)) {
            return array('message' => 'Incorrect password', 'has_error' => true);
        }

        // After success login
        $UniqueID = Get_Random_ID();
        $sessionData = array(
            "logged_in" => true,
            "userID" => $user->ID,
            "username" => $user->Username,
            "department" => $user->Department,
            "OrgID" => $user->OrgID,
            "OrgName" => $user->OrgName
        );

        // Get existing sessions
        $existing_sessions = $this->session->userdata('organization_session') ?? [];
        $existing_sessions[$UniqueID] = $sessionData;

        // Set new session data
        $this->session->set_userdata('organization_session', $existing_sessions);
        $this->session->set_userdata('uniqueKey', $UniqueID);

        return array('message' => 'Login Successfully!', 'has_error' => false);
    }

    public function LoginClient()
    {
        // Check if the email exists in the database
        $user = $this->db->get_where($this->Table->client, array('EmailAddress' => $this->email))->row();
        if (!$user) {
            return array('message' => 'Email address does not exist', 'has_error' => true);
        }

        // Verify the password
        if (!password_verify($this->pwd, $user->Password)) {
            return array('message' => 'Incorrect password', 'has_error' => true);
        }

        // After successful login
        $UniqueID = Get_Random_ID(); // Generate a unique ID for the session
        $sessionData = array(
            "logged_in" => true,
            "type" => "client",
            "clientID" => $user->ClientID,
            "email" => $user->EmailAddress,
            "first_name" => $user->FName,
            "middle_name" => $user->MName,
            "last_name" => $user->LName,
        );

        // Get existing sessions
        $existing_sessions = $this->session->userdata('client_session') ?? [];
        $existing_sessions[$UniqueID] = $sessionData;

        // Set new session data
        $this->session->set_userdata('client_session', $existing_sessions);
        $this->session->set_userdata('uniqueKey', $UniqueID);

        return array('message' => 'Login Successfully!', 'has_error' => false);
    }
}
