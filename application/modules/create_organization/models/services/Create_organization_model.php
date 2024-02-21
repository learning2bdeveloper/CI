<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Create_organization_model extends CI_Model
{


    private $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('message_helper');
        $this->Table = json_decode(TABLE);
    }

    public function save_method_from_model($data)
    {
       try{     
          if(empty($data['OrgName'])) {
            echo "missing organization name";
          }

            $this->db->trans_start();
                           
            $this->db->insert($this->Table->organization, $data); // Table-> nd Table[''] kay bawal array 

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE)
            {                
                $this->db->trans_rollback();
                //throw new Exception(ERROR_PROCESSING, true);	
            }
            else
            {
                $this->db->trans_commit();
                return array('message'=>SAVED_SUCCESSFUL);
            }
        }
        catch(Exception$msg)
        {
            return (array('message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function delete_method_from_model($data)
    {
        try {
            $this->db->trans_start();
            $this->db->where('OrgID', $data);
            $this->db->delete($this->Table->organization);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE)
            {                
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);	
            }else{
                $this->db->trans_commit();
                return array('message'=>DELETED_SUCCESSFUL, 'has_error'=>false);
            }
        }
        catch(Exception$msg){
            return (array('message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }
}