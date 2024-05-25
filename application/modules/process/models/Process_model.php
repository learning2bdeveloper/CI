<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Process_model extends CI_Model
{
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('message_helper', 'session_helper'));

        $this->Table = json_decode(TABLE);
    }

    public function get_organization_process_info() // for other modules besides organization_session
    {
        $this->db->order_by('ProcessID', 'DESC');
        $this->db->where('OrgID', $this->orgID);
        $query = $this->db->get($this->Table->process)->result();  // para mag butan into array or same sa fetch assoc daw amo ni 
        //     $results[0] = array(
        //     'id' => 1,
        //     'name' => 'John',
        //     'age' => 30
        // );
        // $query = $this->db->select('p.*, s.StepName')
        //     ->distinct()
        //     ->from('tbl_process p')
        //     ->join('tbl_steps s', 'p.ProcessID = s.ProcessID', 'left')
        //     ->where('p.OrgID', $this->orgID)
        //     ->get()->result();

        return ($query) ? $query : "Error!";
    }

    public function get_organization_process_info2() // for other modules besides organization_session
    {
        $this->db->order_by('ProcessID', 'DESC');
        $this->db->where('OrgID', Get_Session_Data("organization_session")["OrgID"]);
        $query = $this->db->get($this->Table->process)->result();  // para mag butan into array or same sa fetch assoc daw amo ni 

        return ($query) ? $query : "Error!";
    }
}
