<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Create_client_model extends CI_Model
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
          if(empty($data['UserName'])) {
            echo "missing client name";
          }

            $this->db->trans_start();
                           
            $this->db->insert($this->Table->client, $data); // Table-> nd Table[''] kay bawal array 

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
            $this->db->where('ClientID', $data);
            $this->db->delete($this->Table->client);
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

    public function edit_method_from_model($data)
    {
        try {
            $this->db->trans_start();
            $this->db->where('ClientID', $data['ClientID']);
            $this->db->update($this->Table->client, $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE)
            {                
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);	
            }else{
                $this->db->trans_commit();
                return array('message'=>DELETED_SUCCESSFUL, 'has_error'=>false);
            }
        }catch(Exception$msg) {
            return (array('message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }
}