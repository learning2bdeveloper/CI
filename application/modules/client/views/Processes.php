<?php if ($this->session->userdata("logged_in")) : ?>
    <?php usefulLinks(); ?>
    <script defer src="<?= base_url('assets/javascript/applicant.js') ?>"></script>

    <body>

        <div class="container">
            <h2 class="mt-4 mb-3"> <?= $orgName; ?> Processes</h2>

            <?php if (!empty($data)) : ?>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php foreach ($data as $value) : ?>
                        <div class="col">
                            <div class="card">
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

    <?php else : ?>
        <?= accessDenied(); ?>
    <?php endif; ?>