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

                            <h5 class="card-title"><strong><?= $value->Title; ?></strong></h5>
                            <p class="card-text"><?= $value->FName . " " . $value->MName . " " . $value->LName; ?></p>
                            <p class="card-text">Type: <?= $value->Type; ?></p>
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
                            <a href="<?= base_url("assets/documents/") . $value->FileName; ?>" target="_blank">
                                <?= $value->OriginalFileName; ?>
                            </a>
                            <br>
                            <div class="mt-4">
                                <button class="btn btn-success btn_accept m-2" data-pass-value-clientprocessid="<?= $value->ClientProcessID; ?>" data-pass-value-clientid="<?= $value->ClientID; ?>" data-pass-value-processid="<?= $value->ProcessID; ?>">Accept</button>
                                <button class="btn btn-danger btn_reject" data-pass-value-clientprocessid="<?= $value->ClientProcessID; ?>">Reject</button>
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