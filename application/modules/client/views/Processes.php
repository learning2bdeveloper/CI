<?php if ($this->session->userdata("client_session")) : ?>
    <?php usefulLinks(); ?>
    <script defer src="<?= base_url('assets/javascript/functions.js') ?>"></script>
    <script defer src="<?= base_url('assets/javascript/Client.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/processes.css') ?>">
    </head>

    <body>

        <div class="wrapper">
            <?= $this->load->view('client/sidebar'); ?>

            <div class="main p-3">
                <div class="text-center">

                    <div class="container">
                        <h2 class="mt-4 mb-3"> <?= $orgName; ?> Processes</h2>

                        <?php if (!empty($data)) : ?>
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                <?php foreach ($data as $value) : ?>
                                    <div class="col">
                                        <div class="card box hover-shadow" data-test="<?= $value->ProcessID; ?>" data-test2="<?= $value->ProcessName; ?>">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $value->ProcessName; ?></h5>
                                                <p class="card-text"><?= $value->Description; ?></p>
                                                <p class="card-text">Expected Days: <strong><?= $value->ExpectedDays; ?></strong></p>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <div>
                                <center>
                                    <h6 style="color:red">No Data Found.</h6>
                                </center>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!--STEPS MODAL-->
                    <div class="modal fade" id="stepsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-title"></h5>
                                </div>
                                <div class="modal-body" id="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <!-- Add your footer content here -->
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" id="btn_createDocument">Create Document</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--UPLOAD DOCUMENT MODAL-->
                    <div class="modal fade" id="uploadDocumentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-title2"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">
                                    <div id="document-form" class="document-box">
                                        <h2></h2>
                                        <form method="POST" id="form_upload">
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Title:</label>
                                                <input type="text" class="form-control" id="title" name="title">
                                            </div>
                                            <div class="mb-3">
                                                <label for="type" class="form-label">Type:</label>
                                                <select class="form-select" id="type" name="type">
                                                    <option value="New">New Application</option>
                                                    <option value="Follow up">For Follow Up</option>
                                                    <option value="Additional">Additional Requirements</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="fileupload" class="form-label">Upload File:</label>
                                                <input type="file" class="form-control" id="fileupload" name="fileupload">
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label for="content" class="form-label">Remarks:</label>
                                                <textarea class="form-control" id="content" name="content" rows="4"></textarea>
                                            </div> -->
                                            <div class="modal-footer">
                                                <!-- Add your footer content here -->
                                                <button type="button" class="btn btn-danger" id="btn_backModal" data-bs-dismiss="modal">Back</button>
                                                <button type="submit" class="btn btn-success">Submit Document</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                <?php else : ?>
                    <?= accessDenied(); ?>
                <?php endif; ?>