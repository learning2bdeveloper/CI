<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ClientProcess_model extends CI_Model
{

    private $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('message_helper');
        $this->Table = json_decode(TABLE);
    }

    public function getNumberOfDocumentsInOrganization()
    {
        $this->db->from('tbl_clientprocess');
        $this->db->join('tbl_process', 'tbl_process.ProcessID = tbl_clientprocess.ProcessID');
        $this->db->join('tbl_organization', 'tbl_organization.OrgID = tbl_process.OrgID');
        $this->db->where('tbl_organization.OrgID', $this->OrgID);
        $query = $this->db->get();
        $total_records = $query->num_rows();
        return $total_records;
    }

    public function getNumberOfDeletedDoumentsOfClient()
    {
        $this->db->where("ClientID", $this->session->userdata('clientID'));
        $this->db->where("Status", "Deleted");
        $query = $this->db->get($this->Table->clientprocess);
        return $query->num_rows();
    }

    public function fetch_all_client_docs()
    {
        $this->db->select('tbl_clientprocess.*, tbl_organization.OrgName, tbl_organization.Image');
        $this->db->from('tbl_clientprocess');
        $this->db->join('tbl_process', 'tbl_process.ProcessID = tbl_clientprocess.ProcessID');
        $this->db->join('tbl_organization', 'tbl_organization.OrgID = tbl_process.OrgID');
        $this->db->order_by('tbl_clientprocess.StartDate', 'ASC');
        $this->db->where('tbl_clientprocess.ClientID', $this->session->userdata("clientID"));
        $this->db->where('tbl_clientprocess.Status !=', "Deleted");
        $query = $this->db->get()->result();
        return $query; // Returns an array of objects representing the rows
    }

    public function get_numberofuploadedDocs()
    {
        $this->db->where("ClientID", $this->session->userdata('clientID'));
        $query = $this->db->get($this->Table->clientprocess);
        return $query->num_rows();
    }

    public function setCancelledDocument()
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $this->client_process_id);
            $this->db->update($this->Table->clientprocess, array("Status" => "Cancelled"));
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => CANCELLED, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return array('message' => $msg->getMessage(), 'has_error' => true);
        }
    }

    public function setDeleteDocument()
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $this->client_process_id);
            $this->db->update($this->Table->clientprocess, array("Status" => "Deleted"));
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => CANCELLED, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return array('message' => $msg->getMessage(), 'has_error' => true);
        }
    }
}
