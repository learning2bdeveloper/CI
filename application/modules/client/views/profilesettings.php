<?php
if ($this->session->userdata("client_session")) {
    usefulLinks(); ?>
    <script defer src="<?= base_url('assets/javascript/Client.js') ?>"></script>

    <body>

        <div class="wrapper">
            <?= $this->load->view('client/sidebar'); ?>

            <div class="main p-3">
                <div class="text-center">
                    <div class="row pt-5 px-4 mx-5">

                        <div class="col-md-6 ms-auto d-flex justify-content-end">
                            <form id="uploadForm">
                                <label for="image-preview" class="btn btn-outline-success" style="border-radius: 15px; cursor: pointer;">
                                    Upload Image
                                    <input type="file" name="image" id="image-preview" style="display: none;">
                                </label>

                            </form>
                            <button type="button" class="btn btn-outline-success" style="border-radius: 15px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit Profile</button>
                        </div>
                    </div>


                    <!-- MODAL FOR UPDATE -->
                    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="form_update_modal">
                                        <div class="container">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text text-secondary">Full Name</span>
                                                <input type="text" aria-label="First name" name="first_name" class="form-control" value="<?= ($data->FName == "") ? "" : $data->FName; ?>">
                                                <input type="text" aria-label="Middle name" name="middle_name" class="form-control" value="<?= ($data->MName == "") ? "" : $data->MName; ?>">
                                                <input type="text" aria-label="Last name" name="last_name" class="form-control" value="<?= ($data->LName == "") ? "" : $data->LName; ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text text-secondary" id="basic-addon1">Email</span>
                                                <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" value="<?= ($data->EmailAddress == "") ? "" : $data->EmailAddress; ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text text-secondary" for="inputGroupSelect0">Civil Status</label>
                                                <select class="form-select" name="civil_status" id="inputGroupSelect0">
                                                    <option selected disabled class="text-secondary">Civil Status</option>
                                                    <option <?= ($data->CivilStatus === "Married") ? 'selected' : '';
                                                            ?> value="Married">Married</option>
                                                    <option <?= ($data->CivilStatus  === "Signle") ? 'selected' : '';
                                                            ?> value="Single">Single</option>
                                                </select>
                                            </div>

                                            <div class="input-group mb-3">
                                                <label class="input-group-text text-secondary" for="inputGroupSelect02">Gender</label>
                                                <select class="form-select" name="gender" id="inputGroupSelect02">
                                                    <option selected disabled class="text-secondary">Gender</option>
                                                    <option <?= ($data->Gender === "male") ? 'selected' : '';
                                                            ?> value="male">Male</option>
                                                    <option <?= ($data->Gender  === "female") ? 'selected' : '';
                                                            ?> value="female">Female</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text text-secondary" id="basic-addon1">Contacts</span>
                                                <input type="text" class="form-control" name="contact" placeholder="Contacts" aria-label="Address" aria-describedby="basic-addon1" value="<?= ($data->ContactNo == "") ? "" : $data->ContactNo; ?>">
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text text-secondary" id="basic-addon1">Address</span>
                                                <input type="text" class="form-control" name="address" placeholder="Address" aria-label="Address" aria-describedby="basic-addon1" value="<?= ($data->Address == "") ? "" : $data->Address; ?>">
                                            </div>

                                        </div>
                                </div>
                                <div class="modal-footer border-top-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" name="update" class="btn btn-success" value="save">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <img src="<?= ($data->Image == "") ? base_url("assets/images/default.png") : base_url("assets/images/client_profiles/") . $data->Image;  ?>" class="img-fluid rounded-circle" style="width: 200px; height: 200px;" alt="Profile Image">
                    <div class="px-5 pt-5 d-flex justify-content-center" style="width: 100%;">
                        <div class="card mx-5" style="border-radius: 50px; width: 100%;">
                            <div class="card-body">
                                <div class="px-5">
                                    <div class=" py-3">
                                        <h3>Personal Information</h3>
                                    </div>

                                    <div class="row px-5">
                                        <div class="col-2">

                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <h5>First Name</h5>
                                                <p><?= (!$data->FName) ? "N/A" : $data->FName; ?></p>
                                                <h5>Email</h5>
                                                <p><?= (!$data->EmailAddress) ? "N/A" : $data->EmailAddress; ?></p>
                                                <h5>Civil Status</h5>
                                                <p><?= (!$data->CivilStatus) ? "N/A" : $data->CivilStatus; ?></p>
                                                <!-- <h5>Section</h5>
                <p>Kinder II - Sapphire</p> -->
                                            </div>

                                        </div>
                                        <div class="col-4">
                                            <h5>Middle Name</h5>
                                            <p><?= (!$data->MName) ? "N/A" : $data->MName; ?></p>
                                            <!-- <h5>Parent/Guardian's Contacts Number</h5>
              <p></p> -->
                                            <h5>Gender</h5>
                                            <p><?= (!$data->Gender) ? "N/A" : $data->Gender; ?></p>
                                            <h5>Address</h5>
                                            <p><?= (!$data->Address) ? "N/A" : $data->Address; ?></p>
                                        </div>
                                        <div class="col-2">
                                            <h5>Last Name</h5>
                                            <p><?= (!$data->LName) ? "N/A" : $data->LName; ?></p>
                                            <h5>Contact #</h5>
                                            <p><?= (!$data->ContactNo) ? "N/A" : $data->ContactNo; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    </body>

    </html>

<?php } else { ?>

    <?= accessDenied("client"); ?>
<?php } ?>