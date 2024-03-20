<?php
defined('BASEPATH') or exit('No direct script access allowed');

function organization_header()
{

?>
    <?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= SYSTEM_MODULE ?></title>

        <!-- Link Bootstrap CSS -->
        <link rel="icon" type="image/x-icon" href="<?= base_url('assets/icons/favicon.ico') ?>" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/css/table.css') ?>">

        <!-- Link sidebar CSS and JS -->
        <link rel="stylesheet" href="assets/css/navigationbar.css">
        <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
        <script defer src="assets/javascript/sidebarnavigation.js"></script>

        <script defer src="<?= base_url('/assets/javascript/organization.js') ?>"></script>
        <script defer src="<?= base_url('/assets/javascript/changeLocation.js') ?>"></script>

        <!--Toastr-->
        <link href="<?= base_url('node_modules/toastr/build/toastr.min.css') ?>" rel="stylesheet">
        <script defer src="<?= base_url('node_modules/toastr/build/toastr.min.js') ?>"></script>




    </head>

<?php
}

function organization_footer()
{

?>
    </body>
    <!-- Link DataTables JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    </html>

<?php
}
