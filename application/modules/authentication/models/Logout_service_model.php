<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logout_service_model extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function LogoutOrganization()
    {
        // Retrieve the session key for organization user
        $session_key = $this->session->userdata("uniqueKey");

        // Check if the session key exists and if the corresponding session exists in organization_session
        $organization_sessions = $this->session->userdata('organization_session');
        if ($session_key && isset($organization_sessions[$session_key])) {
            // Unset the organization session data
            unset($organization_sessions[$session_key]);
            $this->session->set_userdata('organization_session', $organization_sessions);
            $this->session->unset_userdata("uniqueKey");

            return array('message' => 'Logout Successfully!', 'has_error' => false);
        } else {
            // Handle the case where the session data is not found or the key is invalid
            return array('message' => 'Session data not found or invalid session key', 'has_error' => true);
        }
    }

    public function LogoutClient()
    {
        // Retrieve the session key for client user
        $session_key = $this->session->userdata("uniqueKey");

        // Check if the session key exists and if the corresponding session exists in client_session
        $client_sessions = $this->session->userdata('client_session');
        if ($session_key && isset($client_sessions[$session_key])) {
            // Unset the client session data
            unset($client_sessions[$session_key]);
            $this->session->set_userdata('client_session', $client_sessions);
            $this->session->unset_userdata("uniqueKey");

            return array('message' => 'Logout Successfully!', 'has_error' => false);
        } else {
            // Handle the case where the session data is not found or the key is invalid
            return array('message' => 'Session data not found or invalid session key', 'has_error' => true);
        }
    }
}
