<?php
if ($this->session->userdata("client_session")) {

    usefulLinks(); ?>
    <script defer src="<?= base_url('assets/javascript/functions.js') ?>"></script>
    <script defer src="<?= base_url('assets/javascript/Client.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/Dashboard.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">



    <body>
        <div class="wrapper">
            <?= $this->load->view('client/sidebar'); ?>


            <div class="main p-3">
                <div class="text-center">

                    <div class="row">
                        <?php
                        $cards = array(
                            "Uploaded Docs" => array(
                                "icon" => "lni lni-files",
                                "number" => @$numberofuploadedDocs
                            ),
                            "Deleted Docs" => array(
                                "icon" => "lni lni-trash-can",
                                "number" => @$numberofdeletedDocs
                            )
                        );

                        foreach ($cards as $title => $values) { ?>

                            <div class="col-sm-4 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h5><?= @$title ?></h5>
                                        <div class="row">
                                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                    <h2 style="margin-left: 50%"><?= @$values["number"]; ?></h2>
                                                </div>
                                            </div>
                                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                                <i class="<?= @$values["icon"]; ?>" style=" font-size: 5vw; color: red"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>


                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Document Status</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col"></th>
                                                    <th scope="col">File Name</th>
                                                    <th scope="col">Organization</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Application Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="documents">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $modals = array(
                        "deleteModal" => array(
                            "title" => "Are you sure you want to delete it?",
                            "btn_id" => "btn_yes_modal_delete",
                        ),
                        "cancelModal" => array(
                            "title" => "Are you sure you want to cancel it?",
                            "btn_id" => "btn_yes_modal_cancel",
                        )
                    );

                    foreach ($modals as $id => $values) { ?>
                        <div class="modal" id="<?= $id ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?= $values["title"]; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success" id="<?= $values["btn_id"]; ?>">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Modal for track -->
                    <div class="modal" id="trackModal" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="load_track"></div>
                                </div>
                            </div>
                        </div>
                    </div>

    </body>

    </html>

<?php } else { ?>

    <?= accessDenied(); ?>
<?php } ?>