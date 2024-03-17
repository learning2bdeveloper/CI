<?php
defined('BASEPATH') or exit('No direct script access allowed');

function pagination($page, $model, $function_name, $function_name_for_records)
{
    $CI = &get_instance();
    if ($page !== null) {
        $currentPage = $page;
    } else {
        $currentPage = 1;
    }
    $recordsPerPage = 10;

    // Verify if the model exists
    // if (!class_exists($model)) { no need kay gina check na sang iban 
    //     // Handle the case where the model does not exist
    //     return false;
    // }

    // Verify if the method exists in the model
    // if (!method_exists($CI->$model, $function_name)) { no need kay gina check na sang iban 
    //     // Handle the case where the method does not exist
    //     return false;
    // }
    // Calculate the starting record index
    $startFrom = ($currentPage - 1) * $recordsPerPage;

    // Fetch data from the model using the provided parameters
    $data['data'] = $CI->$model->$function_name($recordsPerPage, $startFrom);

    // Get the total number of records from the model
    // Verify if the method exists in the model
    // if (!method_exists($CI->$model, $function_name_for_records)) { no need kay gina check na sang iban 
    //     // Handle the case where the method does not exist
    //     return false;
    // }
    $totalRecords = $CI->$model->$function_name_for_records();

    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $recordsPerPage);

    return array(
        'startFrom' => $startFrom,
        'recordsPerPage' => $recordsPerPage,
        'data' => $data['data'],
        'currentPage' => $currentPage,
        'totalPages' => $totalPages
    );
}

///////// FOR MODELS ONLY
function pagination_model($limit, $start, $tbl_name)
{
    $CI = &get_instance();
    $CI->db->limit($limit, $start);
    $query = $CI->db->get($tbl_name);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}

function count_record($tbl_name)
{
    $CI = &get_instance();

    // Check if the database library is loaded
    if (!isset($CI->db)) {
        $CI->load->database();
        // You might want to handle this error case appropriately
        return false;
    }

    // Check if the table exists
    if (!$CI->db->table_exists($tbl_name)) {
        // Handle the case where the table doesn't exist
        return false;
    }

    // Get the count of records in the specified table
    return $CI->db->count_all($tbl_name);
}
