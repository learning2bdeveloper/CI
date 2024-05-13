<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Steps_model extends CI_Model
{
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('message_helper');

        $this->Table = json_decode(TABLE);
    }

    public function steps()
    {
        $this->db->order_by('SequenceNumber', 'ASC');
        $this->db->where('ProcessID', $this->processID);
        $query = $this->db->get($this->Table->steps)->result();  // para mag butan into array or same sa fetch assoc daw amo ni 
        //     $results[0] = array(
        //     'id' => 1,
        //     'name' => 'John',
        //     'age' => 30
        // );
        return $query;
    }
}
