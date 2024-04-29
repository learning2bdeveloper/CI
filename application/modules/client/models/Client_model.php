<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Client_model extends CI_Model
{
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('message_helper', 'pagination_helper');

        $this->Table = json_decode(TABLE);
    }

    // public function get_organizations_info()
    // {
    //     $this->db->order_by('OrgID', 'DESC');
    //     $this->db->limit(50);
    //     $query = $this->db->get($this->Table->organization)->result();  // para mag butan into array or same sa fetch assoc daw amo ni 
    //     //     $results[0] = array(
    //     //     'id' => 1,
    //     //     'name' => 'John',
    //     //     'age' => 30
    //     // );
    //     return $query;
    // }

    public function get_single_client_info()
    {
        $this->db->where('ClientID', $this->session->userdata("clientID"));
        $query = $this->db->get($this->Table->client)->row();
        return $query;
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

    // public function Search($value)
    // {

    //     // Define the number of results per page
    //     $resultsPerPage = 25;

    //     if ($value == " ") {
    //         // No search value provided, retrieve all organizations
    //         $this->db->order_by('OrgID', 'DESC');
    //         $query = $this->db->get($this->Table->organization);
    //         $totalRows = $query->num_rows(); //gamiton ni sa future kung may design na haha
    //         // $totalPages = ceil($totalRows / $resultsPerPage);

    //         return array(
    //             "data" => $query->result(),
    //             "totalPages" => 1,
    //             "currentPage" => 1,
    //         );
    //     } else {
    //         // Search for organizations based on the provided value
    //         $this->db->from($this->Table->organization);
    //         $this->db->like('OrgName', $value, 'both');
    //         $query = $this->db->get();
    //         $totalRows = $query->num_rows();
    //         // $totalPages = ceil($totalRows / $resultsPerPage);

    //         return array(
    //             "data" => $query->result(),
    //             "totalPages" => 1,
    //             "currentPage" => 1,
    //         );
    //     }
    // }

    // public function record_count()
    // {
    //     // return $this->db->count_all($this->Table->organization);
    //     return count_record($this->Table->organization);
    // }

    // public function fetch_organization($limit, $start)
    // {
    //     return pagination_model($limit, $start, $this->Table->organization);
    // }
}
