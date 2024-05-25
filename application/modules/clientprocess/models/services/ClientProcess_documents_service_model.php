<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ClientProcess_documents_service_model extends CI_Model
{

    private $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(
            array(
                'message_helper',
                'session_helper',
                'utils_helper'
            )
        );
        $this->Table = json_decode(TABLE);
    }

    public function uploadDocs()
    {

        // Get the original filename
        $originalFileName = $this->file['name'];
        // Construct the new filename with the unique identifier
        $fileNameNew = uniqid('', true) . '___' . $originalFileName;
        $fileExtension = explode('.', $this->file['name']);
        $finalfileExtension = strtolower(end($fileExtension));
        $fileDestination = 'assets/documents/' . $fileNameNew;
        // $fileDestination = 'assets/images/profiles/' . $fileNameNew;

        if ($this->file['error'] !== 0) {
            return array('message' => FILE_ERROR, 'has_error' => true);
        }
        if ($this->file['size'] > 5 * MegaByte) {
            return array('message' => FILE_SIZE_ERROR, 'has_error' => true);
        }
        if (!in_array($finalfileExtension, array('pdf', 'doc', 'docx'))) {
            return array('message' => FILE_TYPE_ERROR, 'has_error' => true);
        }
        if (!move_uploaded_file($this->file['tmp_name'], $fileDestination)) {
            return array('message' => IMAGE_MOVE_FILE_ERROR, 'has_error' => true);
        }
        $data = array(
            'Title' => $this->title,
            'Type' => $this->type,
            'OriginalFileName' => $originalFileName, // Add OriginalFileName to the data array
            'FileName' => $fileNameNew,
            'ProcessID' => $this->processID,
            'Status' => "Pending",
            'ClientID ' => Get_Session_Data("client_session")["clientID"],
            'StartDate' => date('Y-m-d H:i:s'),
        );
        try {

            $this->db->trans_start();

            $this->db->insert($this->Table->clientprocess, $data); // Table-> nd Table[''] kay bawal array 

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
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
                return array('message' => "Document cancelled successfully.", 'has_error' => false);
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
                return array('message' => "Document deleted successfully.", 'has_error' => false);
            }
        } catch (Exception $msg) {
            return array('message' => $msg->getMessage(), 'has_error' => true);
        }
    }

    public function setRejectDocument()
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $this->client_process_id);
            $this->db->update($this->Table->clientprocess, array("Status" => "Rejected"));
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => "Document Rejected successfully.", 'has_error' => false);
            }
        } catch (Exception $msg) {
            return array('message' => $msg->getMessage(), 'has_error' => true);
        }
    }

    private function GetStepIDByProcessID()
    {
        $this->db->select("tbl_steps.StepID");
        $this->db->from("tbl_clientprocess");
        $this->db->join("tbl_steps", "tbl_steps.ProcessID = tbl_clientprocess.ProcessID");
        $this->db->where("tbl_clientprocess.ProcessID", $this->process_id);
        $result = $this->db->get()->row();
        return $result = $result->StepID ?? null;
    }
    public function setAcceptDocument()
    //client_process_id
    //client_id
    //process_id
    {
        try {
            $this->db->trans_start();

            $this->db->where('ClientProcessID', $this->client_process_id);
            $this->db->update($this->Table->clientprocess, array("Status" => "In progress"));

            $stepID = $this->GetStepIDByProcessID();
            if (!$stepID) {
                throw new Exception("Step ID not found!");
            }

            // Insert data into clientsteps table
            $data = array(
                'StepID' => $stepID,
                'ClientID' => $this->client_id,
                'ProcessID' => $this->process_id,
                'ClientProcessID' => $this->client_process_id,
                'IN' => date('Y-m-d H:i:s'),
                'OUT' => "",
                'ProcessBy' => Get_Session_Data("organization_session")["username"],
                'Status' => 'In progress',
                'Remarks' => ''
            );

            $this->db->insert($this->Table->clientsteps, $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => 'Document accepted successfully.', 'has_error' => false);
            }
        } catch (Exception $msg) {
            return array('message' => $msg->getMessage(), 'has_error' => true);
        }
    }

    // public function UpdateStep()
    // {
    //     // Insert the new step
    //     $data = [
    //         // 'ClientProcessID' => $this->clID,
    //         // 'StepID' => $this->nextStepID,
    //         // 'ClientID' => $this->clientID,
    //         // 'ProcessID' => $this->processID,
    //         // 'ProcessBy' => Get_Session_Data("organization_session")["username"],
    //         // 'IN' => date('Y-m-d H:i:s'), // Use the current timestamp for the new step
    //         // 'Status' => 'In progress',
    //         // 'Remarks' => $this->remarks
    //         'StepID' => $this->nextStepID,
    //         'ClientID' => $this->clientID,
    //         'ProcessID' => $this->processID,
    //         'ClientProcessID' => $this->clID,
    //         'IN' => date('Y-m-d H:i:s'),
    //         'OUT' => "",
    //         'ProcessBy' => Get_Session_Data("organization_session")["username"],
    //         'Status' => 'In progress',
    //         'Remarks' => $this->remarks
    //     ];

    //     // return json_encode(array(
    //     //     'ClientProcessID' => $this->clID,
    //     //     'StepID' => $this->nextStepID,
    //     //     'ClientID' => $this->clientID,
    //     //     'ProcessID' => $this->processID,
    //     //     'ProcessBy' => Get_Session_Data("organization_session")["username"],
    //     //     'IN' => date('Y-m-d H:i:s'), // Use the current timestamp for the new step
    //     //     'Status' => 'In progress',
    //     //     'Remarks' => $this->remarks
    //     // ));

    //     $this->db->insert('tbl_clientsteps', $data);

    //     // if ($insertStatus) {
    //     //     $response = [
    //     //         'has_error' => FALSE,
    //     //         'message' => 'Step moved forward successfully.'
    //     //     ];
    //     // } else {
    //     //     $response = [
    //     //         'has_error' => TRUE,
    //     //         'message' => 'Failed to move step forward.'
    //     //     ];
    //     // }
    //     // echo json_encode($response);
    // }

    public function UpdateStep()
    {
        // try {
        //     // if (!$stepID) {
        //     //     throw new Exception("Step ID not found!");
        //     // }


        //     // Insert data into clientsteps table
        //     $data = array(
        //         'StepID' => $this->nextStepID,
        //         'ClientID' => $this->clientID,
        //         'ProcessID' => $this->processID,
        //         'ClientProcessID' => $this->clID,
        //         'IN' => date('Y-m-d H:i:s'),
        //         'OUT' => "",
        //         'ProcessBy' => Get_Session_Data("organization_session")["username"],
        //         'Status' => 'In progress',
        //         'Remarks' => $this->remarks
        //     );

        //     var_dump($data);
        //     $this->db->trans_start();

        //     // $this->db->insert($this->Table->clientsteps, $data);

        //     $this->db->trans_complete();

        //     if ($this->db->trans_status() === FALSE) {
        //         $this->db->trans_rollback();
        //         throw new Exception(ERROR_PROCESSING, true);
        //     } else {
        //         $this->db->trans_commit();
        //         return array('message' => 'Document accepted successfully.', 'has_error' => false);
        //     }
        // } catch (Exception $msg) {
        //     return array('message' => $msg->getMessage(), 'has_error' => true);
        // }
        var_dump($this->nextStepID);
    }
}
