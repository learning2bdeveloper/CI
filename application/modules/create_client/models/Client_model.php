<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Client_model extends CI_Model 
{
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('message_helper');
        
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
}