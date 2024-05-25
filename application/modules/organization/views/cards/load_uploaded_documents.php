<div class="row">
    <h2>Documents</h2>
    <div id="uploaded_documents" class="row">
        <?php
        if (!empty($data)) {
            foreach ($data as $value) {
        ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">

                            <h5 class="card-title"><?= htmlspecialchars($value->Title, ENT_QUOTES, 'UTF-8'); ?></h5>
                            <p class="card-text"><?= "(" . htmlspecialchars($value->ClientID, ENT_QUOTES, 'UTF-8') . ") " . htmlspecialchars($value->FName, ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($value->MName, ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($value->LName, ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="card-text">Type: <?= htmlspecialchars($value->Type, ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="card-text">
                                Status:
                                <?php
                                echo ($value->Status == "Success")
                                    ? '<span class="badge bg-success">Success</span>'
                                    : (($value->Status == "In progress")
                                        ? '<span class="badge bg-primary">In progress</span>'
                                        : (($value->Status == "Pending")
                                            ? '<span class="badge bg-warning">Pending</span>'
                                            : (($value->Status == "Rejected")
                                                ? '<span class="badge bg-dark">Rejected</span>'
                                                : '<span class="badge bg-danger">Unknown</span>')));
                                ?>
                            </p>
                            <a href="<?= base_url("assets/documents/") . htmlspecialchars($value->FileName, ENT_QUOTES, 'UTF-8'); ?>" target="_blank">
                                <?= htmlspecialchars($value->OriginalFileName, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                            <br>
                            <div class="mt-4">
                                <button class="btn btn-success btn_accept" data-pass-value-clientprocessid="<?= htmlspecialchars($value->ClientProcessID, ENT_QUOTES, 'UTF-8'); ?>" data-pass-value-clientid="<?= htmlspecialchars($value->ClientID, ENT_QUOTES, 'UTF-8'); ?>" data-pass-value-processid="<?= htmlspecialchars($value->ProcessID, ENT_QUOTES, 'UTF-8'); ?>">Accept</button>
                                <button class="btn btn-danger btn_reject" data-pass-value-clientprocessid="<?= htmlspecialchars($value->ClientProcessID, ENT_QUOTES, 'UTF-8'); ?>">Reject</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div>
                <center>
                    <h6 style="color:red">No Data Found.</h6>
                </center>
            </div>
        <?php
        }
        ?>
    </div>
</div>