<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 function organization_header() {

    ?>
    <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=SYSTEM_MODULE?></title>    
 
    <!-- Link Bootstrap CSS -->
    <link rel="icon" type="image/x-icon" href="<?=base_url('assets/icons/favicon.ico')?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



</head>

<?php
 }

function organization_footer() {

?>
    </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="<?=base_url('/assets/javascript/index.js')?>"></script>
<script src="<?=base_url('/assets/javascript/changeLocation.js')?>"></script>
</html>

<?php
}