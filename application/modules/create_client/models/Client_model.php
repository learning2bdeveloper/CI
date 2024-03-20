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

    public function get_client_info()
    {
        $this->db->order_by('ClientID', 'DESC');
        $this->db->limit(50);
        $query = $this->db->get($this->Table->client)->result();  // para mag butan into array or same sa fetch assoc daw amo ni 
        //     $results[0] = array(
        //     'id' => 1,
        //     'name' => 'John',
        //     'age' => 30
        // );
        return $query;
    }

    public function get_single_client_info($value)
    {
        $this->db->where('ClientID', $value);
        $query = $this->db->get($this->Table->client)->row();
        return $query;
    }

    public function SearchClient($value)
    {

        // Define the number of results per page
        $resultsPerPage = 25;

        if ($value == " ") {
            // No search value provided, retrieve all organizations
            $this->db->order_by('ClientID', 'DESC');
            $query = $this->db->get($this->Table->client);
            $totalRows = $query->num_rows(); //gamiton ni sa future kung may design na haha
            // $totalPages = ceil($totalRows / $resultsPerPage);

            return array(
                "data" => $query->result(),
                "totalPages" => 1,
                "currentPage" => 1,
            );
        } else {
            // Search for organizations based on the provided value
            $this->db->from($this->Table->client);
            $this->db->like('ClientName', $value, 'both');
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
        // return $this->db->count_all($this->Table->client);
        return count_record($this->Table->client);
    }

    public function fetch_client($limit, $start)
    {
        return pagination_model($limit, $start, $this->Table->client);
    }
}
