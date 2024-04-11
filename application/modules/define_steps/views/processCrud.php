<?php organization_header(); ?>
<script defer src="<?= base_url('assets/javascript/process.js') ?>"></script>

<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main p-3">
            <div class="text-center">

                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="dropdown">
                                <button id="dropbtn" class="btn btn-dark">&#9660;</button>
                                <div class="dropdown-content">
                                </div>
                            </div>
                            <button id="btn_add_new" class="btn btn-success mb-1 me-3">Add Process</button>

                        </div>
                    </div>
                    <div>

                    </div>


                    <!-- <p class="m-b-0 _300" style="font-size: 90%;"><i class="bi bi-info-circle"></i> NOTE: this table auto-loads the first 50 Organization only. Use search/filter to load specific organizations</p> -->

                    <div style="max-height: 560px; overflow-y: auto;">
                        <table id="example" class="table table-striped" style="width:98%">
                            <thead>
                                <tr>
                                    <th scope="col">Process ID</th>
                                    <th scope="col">Organization ID</th>
                                    <th scope="col">Process Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Expected Days</th>

                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody id="table"> <!-- diri ang Load_organization.php ga gwa-->

                    </div>

                    <!--ADD MODAL-->
                    <!-- <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Organization</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="form_save">
                                        <div class="row mb-3">
                                            <label for="image-preview" class="col-sm-3 col-form-label text-end">Upload Image</label>
                                            <div class="col-sm-9">
                                                <label for="image-preview" class="btn btn-outline-success" style="border-radius: 15px; cursor: pointer;">
                                                    Upload Image
                                                    <input type="file" name="image" id="image-preview" style="display: none;">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="organization_name" class="col-sm-3 col-form-label text-end">Organization Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="organization_name" name="organization_name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="address" class="col-sm-3 col-form-label text-end">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="address" name="address">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="email" class="col-sm-3 col-form-label text-end">Email Address</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="contact_person" class="col-sm-3 col-form-label text-end">Contact Person</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="contact_person" name="contact_person">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="contact_number" class="col-sm-3 col-form-label text-end">Contact Number</label>
                                            <div class="col-sm-9">
                                                <input type="tel" class="form-control" id="contact_number" name="contact_number">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-success w-100" id="save">Save</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    <!-- edit modal -->
                    <!-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Organization</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="form_edit">
                                        <div class="row mb-3">
                                            <label for="preview_edit_image" class="col-sm-4 col-form-label text-end">Upload Image:</label>
                                            <div class="col-sm-8">
                                                <label for="preview_edit_image" class="btn btn-outline-success" style="border-radius: 15px; cursor: pointer;">
                                                    Upload Image
                                                    <input type="file" name="edit_image" id="preview_edit_image" style="display: none;">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="edit_organization_name" class="col-sm-4 col-form-label text-end">Name:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="edit_organization_name" id="edit_organization_name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="edit_address" class="col-sm-4 col-form-label text-end">Address:</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="edit_address" id="edit_address">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="edit_email" class="col-sm-4 col-form-label text-end">Email Address:</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="edit_email" id="edit_email">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="edit_contact_person" class="col-sm-4 col-form-label text-end">Contact Person:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="edit_contact_person" id="edit_contact_person">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="edit_contact_number" class="col-sm-4 col-form-label text-end">Contact #:</label>
                                            <div class="col-sm-8">
                                                <input type="tel" class="form-control" name="edit_contact_number" id="edit_contact_number">
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
 -->

                    <!-- CRUD naman ni sang tbl_Process, d ko kabalo paano ya nama kwa ang value sang foreign key nga Org_ID -->
                    <!-- define process modal -->
                    <div class="modal fade" id="defineprocessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Define Process</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="form_save">
                                        <input type="hidden" class="form-control" id="hidden_elem" name="hidden_elem" value="<?= $orgID; ?>">
                                        <div class="row mb-3">
                                            <label for="organization_name" class="col-sm-3 col-form-label text-end">Process Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="process_name" name="process_name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="address" class="col-sm-3 col-form-label text-end">Description</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="description" name="description">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="expected_days" class="col-sm-3 col-form-label text-end">Expected Days</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="expected_days" name="expected_days">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-success w-100" id="save">Save</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Para sa steps adding-->
                    <div class="modal fade" id="addStepModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Step</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="form_add_step">
                                        <div class="row mb-3">
                                            <label for="step_name" class="col-sm-3 col-form-label text-end">Step Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="step_name" name="step_name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="sequence_number" class="col-sm-3 col-form-label text-end">Sequence Number</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="sequence_number" name="sequence_number">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="prerequisite" class="col-sm-3 col-form-label text-end">Prerequisite</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="prerequisite" name="prerequisite">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-success w-100 btn_save_step" id="saveStep">Save</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

</body>

</html>