<?php
defined('BASEPATH') or exit('No direct script access allowed');

function Get_Session_Data($sessionName)
{
    $CI = &get_instance();
    $sessionData = null;
    $key = $CI->session->userdata("uniqueKey");
    $sessionDataArray = $CI->session->userdata($sessionName);

    if ($sessionDataArray && isset($sessionDataArray[$key])) {
        $sessionData = $sessionDataArray[$key];
    } else {
        // Log an error message or handle the error case
        log_message('error', 'Session data not found or invalid key: ' . $key);
        // Return a default value or handle accordingly
        $sessionData = array('logged_in' => false, 'message' => 'Invalid session or key');
    }
    return $sessionData;
}
