<?php organization_header(); ?>

<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main p-3">
            <div class="text-center">

                <body>

                    <nav class="navbar navbar-light justify-content-between fs-3 mb-4" style="background-color: #1E90FF;">
                        <span class="mx-auto">Lists of Organizations</span>

                    </nav>

                    <p class="m-b-0 _300" style="font-size: 90%;"><i class="bi bi-info-circle"></i> NOTE: this table auto-loads the first 50 Organization only. Use search/filter to load specific organizations</p>
                    <div class="table-responsive mx-auto" style="max-width: 900px;">
                        <div class="row">
                            <div class="col text-start">
                                <button id="btn_add_new" class="btn btn-success mb-1"><i class="bi bi-building-fill-add"></i></button>
                            </div>
                            <div class="col-md-6 input-group">
                                <input type="text" id="searchInput" class="form-control mb-1 float-md-end" placeholder="Search...">
                                <button id="searchButton" class="btn btn-primary">Search</button>
                            </div>
                            <div class="col-md-3">
                                <label for="rowsPerPage">Rows Per Page:</label>
                                <select id="rowsPerPage" class="form-select">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>

                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
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
                            <tbody id="table"> <!-- diri ang Load_organization.php ga gwa-->


                    </div>


                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Organization</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="form_save">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="organization_name" class="form-label">Organization Name</label>
                                                    <input type="text" class="form-control" id="organization_name" name="organization_name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" id="email" name="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="contact_person" class="form-label">Contact Person</label>
                                                    <input type="text" class="form-control" id="contact_person" name="contact_person">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="contact_number" class="form-label">Contact Number</label>
                                                    <input type="tel" class="form-control" id="contact_number" name="contact_number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="button" class="btn btn-success" id="save">Save</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
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
                                        <div class="container d-flex justify-content-center">
                                            <form method="post" style="width: 45vw; min-width:300px;" id="form_edit">
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label" for="edit_organization_name">Organization Name:</label>
                                                        <input type="text" class="form-control" name="edit_organization_name" id="edit_organization_name"> <br>

                                                        <label class=" form-label" for="edit_address">Address</label>
                                                        <input class="form-control" type="text" name="edit_address" id="edit_address"> <br>

                                                        <label class="form-label" for="edit_email">Email Address</label>
                                                        <input type="email" class="form-control" name="edit_email" id="edit_email"> <br>

                                                        <label class="form-label" for="edit_contact_person">Contact Person</label>
                                                        <input type="text" class="form-control" name="edit_contact_person" id="edit_contact_person"> <br>

                                                        <label class="form-label" for="edit_contact_number">Contact #</label>
                                                        <input type="number" class="form-control" name="edit_contact_number" id="edit_contact_number"> <br>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="orgEdit">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php organization_footer(); ?>