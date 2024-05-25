<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ClientSteps_model extends CI_Model
{
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('message_helper', 'session_helper'));

        $this->Table = json_decode(TABLE);
    }


    public function get_organizations_info()
    {
        $this->db->order_by('OrgID', 'DESC');
        $this->db->limit(50);
        $query = $this->db->get($this->Table->organization)->result();  // para mag butan into array or same sa fetch assoc daw amo ni 
        //     $results[0] = array(
        //     'id' => 1,
        //     'name' => 'John',
        //     'age' => 30
        // );
        return $query;
    }

    public function GetSingleInfoOrganization($value)
    {
        $this->db->where('OrgID', $value);
        $query = $this->db->get($this->Table->organization)->row();
        return $query;
    }

    public function Search($value)
    {

        // Define the number of results per page
        $resultsPerPage = 25;

        if ($value == " ") {
            // No search value provided, retrieve all organizations
            $this->db->order_by('OrgID', 'DESC');
            $query = $this->db->get($this->Table->organization);
            $totalRows = $query->num_rows(); //gamiton ni sa future kung may design na haha
            // $totalPages = ceil($totalRows / $resultsPerPage);

            return array(
                "data" => $query->result(),
                "totalPages" => 1,
                "currentPage" => 1,
            );
        } else {
            // Search for organizations based on the provided value
            $this->db->from($this->Table->organization);
            $this->db->like('OrgName', $value, 'both');
            $query = $this->db->get();
            $totalRows = $query->num_rows();
            // $totalPages = ceil($totalRows / $resultsPerPage);

            return array(
                "data" => $query->result(),
                "totalPages" => 1,
                "currentPage" => 1,
            );
        }
    }

    public function record_count()
    {
        // return $this->db->count_all($this->Table->organization);
        return count_record($this->Table->organization);
    }

    public function record_count2()
    {
        // return $this->db->count_all($this->Table->organization);
        return count_record($this->Table->client);
    }

    public function fetch_organization($limit, $start)
    {
        return pagination_model($limit, $start, $this->Table->organization);
    }

    public function fetch_all_organizations()
    {
        $this->db->order_by('OrgName', 'ASC');
        $query = $this->db->get($this->Table->organization)->result();
        return $query; // Returns an array of objects representing the rows
    }
}
