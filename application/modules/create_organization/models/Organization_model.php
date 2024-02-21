<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Organization_model extends CI_Model 
{
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('message_helper');
        
        $this->Table = json_decode(TABLE);
    }

    public function get_organizations_info()
    {
        $this->db->order_by('OrgID', 'DESC');
        $query = $this->db->get($this->Table->organization)->result();
        return $query;
    }
}