<?php client_header(); 
defined('BASEPATH') OR exit('No direct script access allowed');?>

<head>
<div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main p-3">
            <div class="text-center">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .bordered-container {
            border: 1px solid #ccc; /* Border color */
            padding: 0.1in; /* Padding to create space */
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            <div class="bordered-container">
                <h5 class="text-center">Client Profile Registration</h5>

                <form method="post" id="form_saveinfo">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="user_name" class="form-label">User Name</label>
                                <input type="text" class="form-control" placeholder="Enter Username" id="user_name" name="user_name">
                            </div>
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter First Name" id="first_name" name="first_name">
                            </div>
                            <div class="mb-3">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" placeholder="Enter Middle Name" id="middle_name" name="middle_name">
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter Last Name" id="last_name" name="last_name">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="civil_status" class="form-label">Civil Status</label>
                                <select class="form-control" id="civil_status" name="civil_status">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="contact_no" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" placeholder="Enter Contact Number" id="contact_no" name="contact_no">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" placeholder="Enter Address" id="address" name="address">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="text-center">
                    <button type="button" class="btn btn-success" id="saveinfo">Register</button>
                    <button type="button" class="btn btn-danger" id="btn_login">Cancel</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
