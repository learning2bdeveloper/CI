<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ClientProcess_model extends CI_Model
{

    private $Table;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('message_helper', 'session_helper'));
        $this->Table = json_decode(TABLE);
    }

    public function getNumberOfDocumentsInOrganization()
    {
        $this->db->from('tbl_clientprocess');
        $this->db->join('tbl_process', 'tbl_process.ProcessID = tbl_clientprocess.ProcessID');
        $this->db->join('tbl_organization', 'tbl_organization.OrgID = tbl_process.OrgID');
        $this->db->where('tbl_organization.OrgID', Get_Session_Data("organization_session")["OrgID"]);
        $query = $this->db->get();
        $total_records = $query->num_rows();
        return $total_records;
    }

    public function getNumberOfDeletedDoumentsOfClient()
    {
        $this->db->where("ClientID", Get_Session_Data("client_session")["clientID"]);
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
        $this->db->where('tbl_clientprocess.ClientID', Get_Session_Data("client_session")["clientID"]);
        $this->db->where('tbl_clientprocess.Status !=', "Deleted");
        $query = $this->db->get()->result();
        return $query;
    }

    public function FetchAllUploadedDocumentsToOrganization()
    { //diri ko lng danay gamiton session datas ko kay nd ko sure kung nd pwede.
        $this->db->select("tbl_clientprocess.*, tbl_client.FName, tbl_client.MName, tbl_client.LName ");
        $this->db->from("tbl_clientprocess");
        $this->db->join("tbl_client", "tbl_client.ClientID = tbl_clientprocess.ClientID");
        $this->db->join("tbl_process", "tbl_process.ProcessID = tbl_clientprocess.ProcessID");
        $this->db->join("tbl_organization", "tbl_organization.OrgID =  tbl_process.OrgID");
        $this->db->order_by('tbl_clientprocess.StartDate', 'ASC');
        $this->db->where('tbl_organization.OrgID', Get_Session_Data("organization_session")["OrgID"]);
        $this->db->where_not_in('tbl_clientprocess.Status', array('Cancelled', 'Deleted', "Rejected", "In progress"));
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_numberofuploadedDocs()
    {
        $this->db->where("ClientID", Get_Session_Data("client_session")["clientID"]);
        $query = $this->db->get($this->Table->clientprocess);
        return $query->num_rows();
    }

    public function FetchDocumentsThatWillBeCheck()
    {
        $this->db->select("tbl.clientprocess");
    }

    public function FetchDocumentsThatNeedsToBeCheckAndUpdateSteps()
    {
        $this->db->select("tbl_clientprocess.*, tbl_clientsteps.*");
        $this->db->from($this->Table->clientprocess);
        $this->db->join("tbl_clientsteps", "tbl_clientsteps.ClientProcessID = tbl_clientprocess.ClientProcessID");
        $this->db->join("tbl_process", "tbl_process.ProcessID = tbl_clientprocess.ProcessID");
        $this->db->join("tbl_organization", "tbl_organization.OrgID = tbl_process.OrgID");
        $this->db->order_by("tbl_clientprocess.StartDate", "ASC");
        $this->db->where("tbl_organization.OrgID", Get_Session_Data("organization_session")["OrgID"]);
        $this->db->where("tbl_clientsteps.Status", "In progress");
        $this->db->where("tbl_clientsteps.ProcessID", $this->processID);
        $query = $this->db->get()->result();
        return $query ?? null;
    }


    public function getCurrentStepForClientProcess()
    {
        // Write the SQL query to retrieve the current step based on the client process ID
        $query = $this->db->select('tbl_clientsteps.*, tbl_steps.*')
            ->from('tbl_clientsteps')
            ->join('tbl_steps', "tbl_steps.StepID = tbl_clientsteps.StepID")
            ->where('ClientProcessID', $this->clientprocessID)
            ->order_by('ClientStepsID', 'DESC') // Assuming higher StepID indicates the current step
            ->limit(1)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function UpdateStep()
    {
        // Get the current step
        $currentStep = $this->db->select('*')
            ->from('tbl_clientsteps')
            ->where('ClientProcessID', $this->clID)
            ->where('Status', 'In progress')
            ->order_by('StepID', 'DESC')
            ->limit(1)
            ->get()
            ->row();

        if ($currentStep) {

            if ($currentStep->StepID != $this->nextStepID) {
                $this->db->where('ClientStepsID', $currentStep->ClientStepsID);
                $this->db->update('tbl_clientsteps', [
                    'Status' => 'Completed',
                    'OUT' => date('Y-m-d H:i:s'),
                    'ProcessBy' => Get_Session_Data("organization_session")["username"],
                ]);
            }
        }


        $previousStep = $this->db->select('*')
            ->from('tbl_clientsteps')
            ->where('ClientProcessID', $this->clID)
            ->where('StepID', $this->nextStepID)
            ->get()
            ->row();

        if ($previousStep) {

            $this->db->where('ClientStepsID', $previousStep->ClientStepsID);
            $updateStatus = $this->db->update('tbl_clientsteps', [
                'Status' => 'In progress',
                'IN' => date('Y-m-d H:i:s'),
                'ProcessBy' => Get_Session_Data("organization_session")["username"],
                'Remarks' => $this->remarks,
            ]);

            if ($updateStatus) {
                $response = [
                    'has_error' => FALSE,
                    'message' => 'Step moved backward successfully.'
                ];
            } else {
                $response = [
                    'has_error' => TRUE,
                    'message' => 'Failed to move step backward.'
                ];
            }
        } else {

            $data = [

                'ClientProcessID' => $this->clID,
                'StepID' => $this->nextStepID,
                'IN' => date('Y-m-d H:i:s'),
                'OUT' => "",
                'ProcessID' => $this->processID,
                'ClientID' => $this->clientID,
                'ProcessBy' => Get_Session_Data("organization_session")["username"], // Include ProcessBy
                'Status' => 'In progress',
                'Remarks' => $this->remarks,
            ];
            $insertStatus = $this->db->insert('tbl_clientsteps', $data);

            if ($insertStatus) {
                return array(
                    'has_error' => FALSE,
                    'message' => 'Step moved forward successfully.'
                );
            } else {
                $response = [
                    'has_error' => TRUE,
                    'message' => 'Failed to move step forward.'
                ];
            }
        }
        return json_encode($response);
    }


    // public function UpdateStep2()
    // {
    //     var_dump($this);
    //     // // Check for NULL values in critical variables
    //     // if ($this->clID === null) {
    //     //     echo 'Client Process ID (clID) is NULL';
    //     //     return;
    //     // }

    //     // // Prepare the data
    //     // $clientProcessID = $this->clID;
    //     // $stepID = $this->nextStepID;
    //     // $clientID = $this->clientID;
    //     // $processID = $this->processID;
    //     // $processBy = Get_Session_Data("organization_session")["username"];
    //     // $inTime = date('Y-m-d H:i:s'); // Use the current timestamp for the new step
    //     // $status = 'In progress';
    //     // $remarks = $this->remarks;

    //     // // Construct the raw SQL insert statement
    //     // $sql = "INSERT INTO " . $this->Table->clientsteps . " (ClientProcessID, StepID, ClientID, ProcessID, ProcessBy, IN, Status, Remarks)
    //     //     VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    //     // $values = [
    //     //     $clientProcessID,
    //     //     $stepID,
    //     //     $clientID,
    //     //     $processID,
    //     //     $processBy,
    //     //     $inTime,
    //     //     $status,
    //     //     $remarks
    //     // ];

    //     // // Debug the raw SQL query and values
    //     // var_dump($sql, $values);

    //     // // Execute the raw SQL insert statement
    //     // if ($this->db->query($sql, $values)) {
    //     //     // Insert was successful
    //     //     $response = [
    //     //         'has_error' => FALSE,
    //     //         'message' => 'Step moved forward successfully.'
    //     //     ];
    //     // } else {
    //     //     // Insert failed, capture and log the error
    //     //     $error = $this->db->error();
    //     //     $response = [
    //     //         'has_error' => TRUE,
    //     //         'message' => 'Failed to move step forward.',
    //     //         'db_error' => $error
    //     //     ];
    //     //     // Log the database error for further analysis
    //     //     error_log("Database Insert Error: " . print_r($error, true));
    //     // }

    //     // // Output the response
    //     // echo json_encode($response);

    //     // // Insert the new step
    //     // if ($this->clID == null) {
    //     //     echo 'wa sa';
    //     // }
    //     // $data = array(
    //     //     'ClientProcessID' => $this->clID,
    //     //     'StepID' => $this->nextStepID,
    //     //     'ClientID' => $this->clientID,
    //     //     'ProcessID' => $this->processID,
    //     //     'ProcessBy' => Get_Session_Data("organization_session")["username"],
    //     //     'IN' => date('Y-m-d H:i:s'), // Use the current timestamp for the new step
    //     //     'Status' => 'In progress',
    //     //     'Remarks' => $this->remarks
    //     // );

    //     // // var_dump($data);
    //     // $this->db->insert($this->Table->clientsteps, $data);

    //     // // if ($insertStatus) {
    //     // //     $response = [
    //     // //         'has_error' => FALSE,
    //     // //         'message' => 'Step moved forward successfully.'
    //     // //     ];
    //     // // } else {
    //     // //     $response = [
    //     // //         'has_error' => TRUE,
    //     // //         'message' => 'Failed to move step forward.'
    //     // //     ];
    //     // // }
    //     // // echo json_encode($response);

    //     // $data = array(
    //     //     'ClientProcessID' => $this->clID,
    //     //     'StepID' => $this->nextStepID,
    //     //     'ClientID' => $this->clientID,
    //     //     'ProcessID' => $this->processID,
    //     //     'ProcessBy' => Get_Session_Data("organization_session")["username"],
    //     //     'IN' => date('Y-m-d H:i:s'), // Use the current timestamp for the new step
    //     //     'Status' => 'In progress',
    //     //     'Remarks' => $this->remarks
    //     // );
    //     // return json_encode($data);
    // }
}
