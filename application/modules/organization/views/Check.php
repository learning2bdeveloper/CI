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
                    <!-- Title for the document section -->
                    <h2>Document Management</h2>

                    <div id="dropdown_process"></div>

                    <!-- Section to display steps for the selected process -->
                    <div id="processSteps">
                        <!-- Steps will be loaded here based on the selected process -->
                    </div>

                    <div id="check_documents"></div>
                </div>
            </div>
        </div>
        <!-- History Modal -->
        <div class="modal" id="historyModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Document History</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="historyContent"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Next Step Modal -->
        <div class="modal fade" id="nextStepModal" tabindex="-1" aria-labelledby="nextStepModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nextStepModalLabel">Move Document to Next Step</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="nextStepForm">
                            <div class="mb-3">
                                <label for="currentStep" class="form-label">Current Step</label>
                                <input type="text" class="form-control" id="currentStep" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nextStep" class="form-label">Select Next Step</label>
                                <select class="form-select" id="nextStep" name="nextStep">
                                    <!-- Options will be dynamically inserted here -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="remarks" class="form-label">Remarks</label>
                                <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Move to Next Step</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>

<?php } else {
    echo accessDenied("organization");
} ?>