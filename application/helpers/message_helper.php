<?php
define('DUPLICATE_RECORD', 'Duplicate record already found in the system.');
define('EXIST_COLLECTION_LINE', 'Sorry this transaction cannot be process, this invoice was collected. ');
define('EXIST_INVOICE_TRANSACTION', 'Sorry this transaction cannot be process, this client has invoice transacted. ');
define('EXIST_COLLECTION_TRANSACTION', 'Sorry this transaction cannot be process, this invoice has collection transacted. ');
define('REQUIRED_FIELD', 'Please fill in required fields.');
define('PASSWORD_LENGTH', 'Password should not be less than 6 (six) characters long.');
define('USERNAME_LENGTH', 'Username should not be less than 6 (six) characters long.');
define('NO_ACCOUNT', 'No existing account.');
define('INVALID_USERNAME_PASSWORD', 'Invalid password.');
define('ACCOUNT_DISABLED', 'Account is currently disabled.');
define('SAVED_SUCCESSFUL', 'Details saved successfully.');
define('DELETED_SUCCESSFUL', 'Details deleted successfully.');
define('DISABLED_ACCOUNT', 'Account was disabled, please contact admin..');
define('RENEW_SUCCESSFUL', 'Application successfully saved.');
define('CONFIRM_RENEWAL', 'Submit this application?');
define('NO_CRYPTO', 'No Cryptographically Secure Random Function Available.');
define('CANNOT_MODIFY', 'Sorry, the process cannot be proceed.');
define('ERROR_API_KEY', 'Error validating security key.');
define('NO_CURRENT_APPLICATION', 'You have no current application.');
define('EMAIL_FORMAT', 'Username must not be in email format.');
define('ERROR_PROCESSING', 'Error Processing.');
define('MISSING_DETAILS', 'Missing Details.');
define('UPDATE_SUCCESSFUL', 'Updated successfully.');
define('SUCCESS', 'SUCCESS TRANSACTION.');
define('EMPTY_FIELDS', 'One of these forms must not be empty.');
define('NO_SELECTION', 'Please select item/s to proceed');
define('NO_DATE', 'No date selected');
define('VOID', 'Payment has been Voided');
define('VERIFIED', 'Online Payment has been Verified');
define('CANCELLED', 'Order has been Cancelled');
define('VOID_EXP', 'Expense has been Voided');
define('MOBILE_DEVICE', 'You are not permitted to login in any mobile devices.');

/** user messages */
define('DEFAULT_PASSWORD', 'Do not use the default password. Please create new password.');
define('NOT_MATCH', 'Your password does not match. Please try again.');
define('DUPLICATE_USERNAME_FOUND', 'Username is already taken, please try again.');

/** default messages */
define('DEFAULT_LOGIN_PASSWORD', 'password1234*');
define('CHAR_SET', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$11<>?!@#$%^&*()~\/.');
define('USER', '');
define('SAMPLE', '');
define('SYSTEM_NAME', 'Document Tracking');
define('SYSTEM_ALT', '');
define('FOOTER_NAME', '');
define('FOOTER_YEAR', '');
define('SYSTEM_MODULE', 'DOCUMENT TRACKING');
define('MB', 1048576);

////////////
define('MODEL_ERROR', 'The MODEL does not exist!');
define('FUNCTION_ERORR', 'The FUNCTION does not exist!');
define('DATABASE_ERORR', 'The DATABASE does not exist!');
define('TABLE_ERORR', 'The DATABASE TABLE does not exist!');

/** image messages */
define('IMAGE_ERROR', 'Image error!');
define('IMAGE_DOES_NOT_EXIST', 'Image does exist!');
define('IMAGE_TYPE_ERROR', 'Image type not allowed!');
define('IMAGE_MOVE_FILE_ERROR', 'Error moving the file!');

/**  */
define('FILE_ERROR', 'File Error!');
define('FILE_TYPE_ERROR', 'File type not allowed!');

$array = array(
    'organization' =>  'tbl_organization',
    'process' => 'tbl_process',
    'steps' => 'tbl_steps',
    'client' => 'tbl_client',
    'department' => 'tbl_organization_departments',
    'clientprocess' => 'tbl_clientprocess',



);
define('TABLE', json_encode($array));
