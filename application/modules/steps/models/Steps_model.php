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

    public function GetSteps()
    {
        $this->db->order_by('SequenceNumber', 'ASC');
        $this->db->where('ProcessID', $this->processID);
        $query = $this->db->get($this->Table->steps)->result();
        return $query ?? null;
    }

    public function GetClientStepsCompleted()
    {
        $this->db->select('tbl_steps.*, tbl_clientsteps.*');
        $this->db->from('tbl_steps');
        $this->db->join('tbl_clientsteps', 'tbl_clientsteps.StepID = tbl_steps.StepID');
        $this->db->where('tbl_steps.ProcessID', $this->processID);
        $this->db->where('tbl_clientsteps.ClientProcessID', $this->clientprocessID);
        $this->db->where('tbl_clientsteps.Status', 'Completed');
        $this->db->order_by('tbl_steps.SequenceNumber', 'ASC');
        $query = $this->db->get()->result();
        return $query ?? null;
    }
}
