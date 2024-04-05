<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Process_model extends CI_Model
{
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('message_helper', 'pagination_helper');

        $this->Table = json_decode(TABLE);
    }

    public function get_organization_process_info()
    {
        $this->db->order_by('ProcessID', 'DESC');
        $this->db->where('OrgID', $this->orgID);
        $query = $this->db->get($this->Table->process)->result();  // para mag butan into array or same sa fetch assoc daw amo ni 
        //     $results[0] = array(
        //     'id' => 1,
        //     'name' => 'John',
        //     'age' => 30
        // );
        return $query;
    }
}
