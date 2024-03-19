    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    function pagination($page, $model, $function_name, $function_name_for_records, $recordsPerPage2)
    {
        $CI = &get_instance();
        if ($page !== null) {
            $currentPage = $page;
        } else {
            $currentPage = 1;
        }


        $recordsPerPage = ($recordsPerPage2 === null) ? 10 : $recordsPerPage2;

        //Verify if the model exists
        if (!class_exists($model)) {
            // Handle the case where the model does not exist
            throw new Exception(MODEL_ERROR);
        }

        // Verify if the method exists in the model
        if (!method_exists($CI->$model, $function_name)) {
            throw new Exception(FUNCTION_ERORR);
        }
        // Calculate the starting record index
        $startFrom = ($currentPage - 1) * $recordsPerPage;

        // Fetch data from the model using the provided parameters
        $data['data'] = $CI->$model->$function_name($recordsPerPage, $startFrom);

        // Get the total number of records from the model
        // Verify if the method exists in the model
        if (!method_exists($CI->$model, $function_name_for_records)) {
            // Handle the case where the method does not exist
            throw new Exception(FUNCTION_ERORR);
        }
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
    // Function to retrieve paginated data from models
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
    // Function to count records in a table
    function count_record($tbl_name)
    {
        $CI = &get_instance();

        // Check if the database library is loaded
        if (!isset($CI->db)) {
            $CI->load->database();
            // You might want to handle this error case appropriately
            throw new Exception(DATABASE_ERORR);
        }

        // Check if the table exists
        if (!$CI->db->table_exists($tbl_name)) {
            // Handle the case where the table doesn't exist
            throw new Exception(TABLE_ERORR);
        }

        // Get the count of records in the specified table
        return $CI->db->count_all($tbl_name);
    }
