<?php
if ($this->session->userdata("organization_session")) {
    usefulLinks(); ?>
    <script defer src="<?= base_url('assets/javascript/functions.js') ?>"></script>
    <script defer src="<?= base_url('assets/javascript/Organization.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/Dashboard.css') ?>">
    </head>

    <body>
        <div class="wrapper">
            <?= $this->load->view('organization/sidebar'); ?>

            <div class="main p-3">
                <div class="text-center">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Uploaded Docs</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2><?= $number_of_documents_in_organization; ?></h2>
                                        <i class="lni lni-files" style="font-size: 5vw; color: red;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Clients</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 id="numberofclients"></h2>
                                        <i class="bi bi-people" style="font-size: 5vw; color: red;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Completed</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2>$32123</h2>
                                        <p class="text-success mb-0">+3.5%</p>
                                        <i class="bi bi-check2-all" style="font-size: 5vw; color: red;"></i>
                                    </div>
                                    <small class="text-muted">11.38% Since last month</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="uploaded_documents"></div>

                </div>
            </div>
        </div>

        <?php
        $modals = array(
            "rejectModal" => array(
                "title" => "Are you sure you want to reject it?",
                "btn_id" => "btn_yes_modal_reject",
            ),
            "acceptModal" => array(
                "title" => "Are you sure you want to accept it?",
                "btn_id" => "btn_yes_modal_accept",
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
    </body>

    </html>

<?php } else {
    echo accessDenied();
} ?>