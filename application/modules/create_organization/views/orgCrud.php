<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization</title>    
 
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        /* Custom CSS for search bar */
        .search-container {
            float: right;
            margin-top: 10px;
        }

        .search-container input[type=text] {
            padding: 5px;
            margin-top: none;
            font-size: 14px;
            border: none;
            border-radius: 10px;
            width: 300px; /* Adjust width as needed */
        }

        .search-container button {
            float: right;
            padding: 5px;
            margin-top: 10px;
            margin-left: 10px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-light justify-content-between fs-3 mb-4" style="background-color: #1E90FF;">
    <div class="text-center">
        <button id="btn_dashboard" class="btn btn-secondary mb-1"><--Back to Dashboard</button>
    </div>
        <span class="mx-auto">Lists of Organizations</span>
        <div class="search-container">
      <form action="search.html" method="GET">
        <input type="text" name="query" placeholder="Search Organizations">
        <button type="submit">Search</button>
      </form>
    </div>
    </nav>

   

        <div class="table-responsive mx-auto" style="max-width: 900px;">
            <table class="table table-sm table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Organization Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Contact Person</th>
                        <th scope="col">Contact #</th>
                        <th scope="col">Address</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="table">
                </tbody>
            </table>
        </div>

        <div class="text-center">
        <button id="btn_add_new" class="btn btn-success mb-1">Add New Organization</button>
    </div>

    <!-- delete modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button  id="orgDelete" type="button" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Organization</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your form fields for editing here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!--
    <div id="table">
    <form  method="post" id="form_create">
        <label for="organization_name">Organization Name</label>
        <input type="text" name="organization_name" id="organization_name"> <br>

        <label for="address">Address</label>
        <input type="text" name="address" id="address"> <br>

        <label for="email">Email</label> 
        <input type="email" name="email" id="email"> <br> 

        <label for="contact_person">Contact Person</label>
        <input type="text" name="contact_person" id="contact_person"> <br>

        <label for="contact_number">Contact #</label>
        <input type="number" name="contact_number" id="contact_number"> <br>

        <button type="submit" id="submit">Create</button>
    </form>
    </div>
    --> 

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="<?=base_url('/assets/javascript/index.js')?>"></script>
</html>
