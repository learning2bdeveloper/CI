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
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap/bootstrap5.3.2.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/table.css') ?>">

        <!-- Link sidebar CSS and JS -->
        <link rel="stylesheet" href="<?= base_url('assets/css/navigationbar.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/lineicons/web-font-files/lineicons.css') ?>">
        <script defer src="<?= base_url('assets/javascript/sidebarnavigation.js') ?>"></script>

        <!-- Link jQuery -->
        <script src="<?= base_url('assets/javascript/bootstrap/jquery3.7.1.js') ?>"></script>

        <!-- Link Bootstrap JS -->
        <script defer src="<?= base_url('assets/javascript/bootstrap/bootstrap5.3.2.bundle.min.js') ?>"></script>

        <!-- Link your custom JavaScript files -->
        <script defer src="<?= base_url('assets/javascript/changeLocation.js') ?>"></script>

        <!-- Toastr -->
        <link href="<?= base_url('node_modules/toastr/build/toastr.min.css') ?>" rel="stylesheet">
        <script defer src="<?= base_url('node_modules/toastr/build/toastr.min.js') ?>"></script>
    </head>


<?php
}


function client_header()
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
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap/bootstrap5.3.2.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/table.css') ?>">

        <!-- Link sidebar CSS and JS -->
        <link rel="stylesheet" href="<?= base_url('assets/css/navigationbar.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/lineicons/web-font-files/lineicons.css') ?>">
        <script defer src="<?= base_url('assets/javascript/sidebarnavigation.js') ?>"></script>

        <script defer src="<?= base_url('/assets/javascript/organization.js') ?>"></script>
        <script defer src="<?= base_url('/assets/javascript/changeLocation.js') ?>"></script>
        <script defer src="<?= base_url('/assets/javascript/bootstrap/bootstrap5.3.2.bundle.min.js') ?>"></script>
        <script defer src="<?= base_url('/assets/javascript/bootstrap/jquery3.7.1.js') ?>"></script>

        <!-- Toastr -->
        <link href="<?= base_url('node_modules/toastr/build/toastr.min.css') ?>" rel="stylesheet">
        <script defer src="<?= base_url('node_modules/toastr/build/toastr.min.js') ?>"></script>
    </head>



<?php
}

function usefulLinks()
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
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap/bootstrap5.3.2.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/lineicons/web-font-files/lineicons.css') ?>">

        <!-- Link jQuery -->
        <script src="<?= base_url('assets/javascript/bootstrap/jquery3.7.1.js') ?>"></script>

        <!-- Link Bootstrap JS -->
        <script defer src="<?= base_url('assets/javascript/bootstrap/bootstrap5.3.2.bundle.min.js') ?>"></script>

        <!-- Toastr -->
        <link href="<?= base_url('node_modules/toastr/build/toastr.min.css') ?>" rel="stylesheet">
        <script defer src="<?= base_url('node_modules/toastr/build/toastr.min.js') ?>"></script>
    <?php
}

function accessDenied()
{ ?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Access Denied</title>
            <link rel="icon" type="image/x-icon" href="<?= base_url('assets/icons/favicon.ico') ?>" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta charset="UTF-8">
            <style>
                body {
                    background-color: black;
                    color: white;
                }

                h1 {
                    color: red;
                }

                h6 {
                    color: red;
                    text-decoration: underline;
                }
            </style>
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        </head>

    <body>
        <div class="w3-display-middle">
            <h1 class="w3-jumbo w3-animate-top w3-center"><code>Access Denied</code></h1>
            <hr class="w3-border-white w3-animate-left" style="margin:auto;width:50%">
            <h3 class="w3-center w3-animate-right">You dont have permission to view this site.</h3>

        </div>
    </body>

    </html>

<?php } ?>