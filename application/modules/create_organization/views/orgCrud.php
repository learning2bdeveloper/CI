<?php organization_header(); ?>
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
                        <span class="mx-auto">Lists of Organizations</span>
                    </nav> -->

                    <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <button id="btn_add_new" class="btn btn-success mb-1 me-3"><i class="bi bi-building-fill-add"></i></button>
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
                                </div>


                    <!-- <p class="m-b-0 _300" style="font-size: 90%;"><i class="bi bi-info-circle"></i> NOTE: this table auto-loads the first 50 Organization only. Use search/filter to load specific organizations</p> -->

                    <div style="max-height: 400px; overflow-y: auto;">
                        <table id="example" class="table table-striped" style="width:98%">
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

                                <!-- add modal -->
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
                                                <h5 class="modal-title">Edit Organization</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" id="form_edit">
                                                    <div class="mb-3">
                                                        <label for="edit_organization_name" class="form-label">Organization Name:</label>
                                                        <input type="text" class="form-control" name="edit_organization_name" id="edit_organization_name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_address" class="form-label">Address:</label>
                                                        <input class="form-control" type="text" name="edit_address" id="edit_address">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_email" class="form-label">Email Address:</label>
                                                        <input type="email" class="form-control" name="edit_email" id="edit_email">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_contact_person" class="form-label">Contact Person:</label>
                                                        <input type="text" class="form-control" name="edit_contact_person" id="edit_contact_person">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_contact_number" class="form-label">Contact #:</label>
                                                        <input type="tel" class="form-control" name="edit_contact_number" id="edit_contact_number">
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


                                <?php organization_footer(); ?>