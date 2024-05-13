<?php
if ($this->session->userdata("logged_in")) {

    usefulLinks(); ?>
    <script defer src="<?= base_url('assets/javascript/Client.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/Dashboard.css') ?>">

    <body>
        <div class="wrapper">
            <?= $this->load->view('client/sidebar'); ?>

            <div class="main p-3">
                <div class="text-center">

                    <div class="row">
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Uploaded Docs</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 style="margin-left: 50%"><?= $numberofuploadedDocs; ?></h2>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i class="lni lni-files" style=" font-size: 5vw; color: red"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Deleted Docs</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 style="margin-left: 50%"><?= $numberofdeletedDocs; ?></h2>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i class="lni lni-trash-can" style=" font-size: 5vw; color: red"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Completed</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 class="mb-0">$32123</h2>
                                                <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                                            </div>
                                            <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i class="lni lni-thumbs-up" style="font-size: 5vw; color: red"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Document Status</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <?php if (!empty($fetchedDocs)) { ?>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">File Name</th>
                                                        <th scope="col">Organization</th>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">StartDate</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($fetchedDocs as $value) { ?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?= base_url("assets/documents/") . $value->OriginalFileName; ?>" download>
                                                                <i class="lni lni-download"></i>
                                                            </a>
                                                        </td>
                                                        <td><a class="fileLinks" href="<?= base_url("assets/documents/") . $value->FileName; ?>" target="_blank"><?= $value->OriginalFileName; ?></a></td>
                                                        <td>
                                                            <img src="<?= base_url("assets/images/profiles/") . $value->Image ?>" alt="image" class="rounded-img" />
                                                            <span class="pl-2"><?= $value->OrgName ?></span>
                                                        </td>
                                                        <td><?= $value->ID; ?></td>
                                                        <td><?= $value->Title; ?></td>
                                                        <td><?= $value->Type; ?></td>
                                                        <td><?= $value->StartDate; ?></td>
                                                        <td>
                                                            <div <?= ($value->Status == "Success") ? 'class="badge bg-success"' : (($value->Status == "In progress") ? 'class="badge bg-primary"' : 'class="badge bg-danger"') ?>>
                                                                <?= $value->Status; ?>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-danger btn-sm btn_delete" data-pass-value-id="<?= $value->ID; ?>" data-pass-value-filename="<?= $value->FileName; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                                <?php if ($value->Status !== "Cancelled" && $value->Status !== "Success") { ?>
                                                                    <button type="button" class="btn btn-warning btn-sm btn_cancel" data-pass-value-id="<?= $value->ID; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel">
                                                                        <i class="bi bi-x-circle-fill"></i>
                                                                    </button>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                } else { ?>
                                                <center style="color: red">
                                                    <h3>No Documents!</h3>
                                                </center>
                                            <?php } ?>

                                            <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Deleting-->
                    <div class="modal" id="deleteModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Are you sure you want to delete it?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" id="btn_yes_modal_delete">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal for Cancelling-->
                    <div class="modal" id="cancelModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Are you sure you want to cancel it?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" id="btn_yes_modal_cancel">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>

    </body>

    </html>

<?php } else { ?>

    <?= accessDenied(); ?>
<?php } ?>