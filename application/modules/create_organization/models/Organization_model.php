<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Organization_model extends CI_Model
{
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('message_helper', 'pagination_helper');

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

    public function get_single_organization_info($value)
    {
        $this->db->where('OrgID', $value);
        $query = $this->db->get($this->Table->organization)->row();
        return $query;
    }

    public function Search($value)
    {

        if ($value == " ") {
            $this->db->order_by('OrgID', 'DESC');
            $query = $this->db->get($this->Table->organization)->result();
        } else {
            $this->db->from($this->Table->organization);
            $this->db->like('OrgName', $value, 'both');
            $query = $this->db->get()->result();
        }
        return $query;
    }

    public function record_count()
    {
        // return $this->db->count_all($this->Table->organization);
        return count_record("tbl_organization");
    }

    public function fetch_organization($limit, $start)
    {
        return pagination_model($limit, $start, $this->Table->organization);
    }
}
