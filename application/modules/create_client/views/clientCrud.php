<?php client_header(); ?>
<!-- <style>
    .toast-info {
        background-color: #51A351 !important;
        /* Change background color to green */
        opacity: 1 !important;
        /* Ensure opacity is set to fully opaque */
    }
</style> -->

<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main p-3">
            <div class="text-center">

                <body>

                    <!-- <nav class="navbar navbar-light justify-content-between fs-4 mb-1" style="background-color: black;">
                        <span class="mx-auto">Lists of Clients</span>
                    </nav> -->

                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group">
                            <div class="dropdown mb-1 me-3">
                                <button id="dropbtn" class="btn btn-dark">&#9660;</button>
                                <div class="dropdown-content">
                                </div>
                             </div>
                                <button id="btn_add_client" class="btn btn-success mb-1 me-3"><i class="bi bi-person-add"></i></button>
                                <select id="rowsPerPage" class="form-select me-3">
                                    <option disabled selected>Rows Per Page</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="input-group" style="width:250px; position: absolute; right:0px; top:0px; margin:20px;">
                                <input type="text" id="searchInput" class="form-control mb-1 me-1" placeholder="Search...">
                                <button id="searchButton" class="btn btn-primary">Search</button>
                        </div>
                    </div>


                    <!-- <p class="m-b-0 _300" style="font-size: 90%;"><i class="bi bi-info-circle"></i> NOTE: this table auto-loads the first 50 Organization only. Use search/filter to load specific organizations</p> -->

                    <div style="max-height: 560px; overflow-y: auto;">
                        <table id="example" class="table table-striped" style="width:98%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">UserName</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Middle Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Password</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Civil Status</th>
                                <th scope="col">Contact #</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Address</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>


                            <tbody id="clienttable"> <!-- diri ang Load_Client.php ga gwa-->

                                <!-- add modal -->
                                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Client Profile</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" id="form_saveinfo">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="user_name" class="form-label">UserName</label>
                                                                <input type="text" class="form-control" id="user_name" name="user_name">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="address" class="form-label">First Name</label>
                                                                <input type="text" class="form-control" id="address" name="address">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="address" class="form-label">Middle Name</label>
                                                                <input type="text" class="form-control" id="address" name="address">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="address" class="form-label">Last Name</label>
                                                                <input type="text" class="form-control" id="address" name="address">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="address" class="form-label">Password</label>
                                                                <input type="password" class="form-control" id="password" name="password">
                                                            </div>
                                                            </div>
                                                            <div class="col-md-6">                                                                           
                                                            <div class="mb-3">
                                                                <label>Gender</label>
                                                                <select class="form-control" id="Gender">
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Civil Status</label>
                                                                <select class="form-control" id="CivilStatus">
                                                                    <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="contact_number" class="form-label">Contact Number</label>
                                                                <input type="tel" class="form-control" id="contact_number" name="contact_number">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email Address</label>
                                                                <input type="email" class="form-control" id="email" name="email">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="address" class="form-label">Address</label>
                                                                <input type="text" class="form-control" id="address" name="address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="text-center mt-3">
                                                    <button type="button" class="btn btn-success" id="save">Save</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              <!-- edit modal -->
                              <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Client's Profile</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" id="form_edit">
                                                        <div class="row mb-3">
                                                            <label for="edit_image" class="col-sm-4 col-form-label text-end">Upload Image:</label>
                                                            <div class="col-sm-8">
                                                                <label for="edit_image" class="btn btn-outline-success" style="border-radius: 15px; cursor: pointer;">
                                                                    Choose File
                                                                    <input type="file" name="edit_image" id="edit_image" style="display: none;">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_user_name" class="col-sm-4 col-form-label text-end">UserName:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="edit_user_name" id="edit_user_name">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_first_name" class="col-sm-4 col-form-label text-end">First Name:</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" type="text" name="edit_first_name" id="edit_first_name">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_middle_name" class="col-sm-4 col-form-label text-end">Middle Name:</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" type="text" name="edit_middle_name" id="edit_middle_name">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_last_name" class="col-sm-4 col-form-label text-end">Last Name:</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" type="text" name="edit_last_name" id="edit_last_name">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_password" class="col-sm-4 col-form-label text-end">Password:</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" type="password" name="edit_password" id="edit_password">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_gender" class="col-sm-4 col-form-label text-end">Gender:</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" id="edit_gender" name="edit_gender">
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                            <div class="row mb-3">
                                                            <label for="edit_civil_status" class="col-sm-4 col-form-label text-end">Civil Status:</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" id="edit_civil_status" name="edit_civil_status">
                                                                    <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_contact_no" class="col-sm-4 col-form-label text-end">Contact #:</label>
                                                            <div class="col-sm-8">
                                                                <input type="tel" class="form-control" name="edit_contact_no" id="edit_contact_no">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_email" class="col-sm-4 col-form-label text-end">Email Address:</label>
                                                            <div class="col-sm-8">
                                                                <input type="email" class="form-control" name="edit_email" id="edit_email">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_address" class="col-sm-4 col-form-label text-end">Address:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="edit_address" id="edit_address">
                                                            </div>
                                                        </div>
                                
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" id="orgEdit">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




<?php client_footer(); ?>