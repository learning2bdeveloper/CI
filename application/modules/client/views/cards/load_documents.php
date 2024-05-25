<?php if (!empty($fetchedDocs)) { ?>

    <?php
    $number = 1;
    foreach ($fetchedDocs as $value) { ?>
        <tr>
            <td><?= $number ?></td>
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
            <td><?= $value->Title; ?></td>
            <td><?= $value->Type; ?></td>
            <?php
            $date = new DateTime($value->StartDate);
            $formattedDate = $date->format('M d, Y - h:i a');
            ?>
            <td><?= $formattedDate; ?></td>
            <td>
                <div <?= ($value->Status == "Success") ?
                            'class="badge bg-success"' : (($value->Status == "In progress") ? 'class="badge bg-primary"' : (($value->Status == "Pending") ? 'class="badge bg-warning"' : (($value->Status == "Rejected") ? 'class="badge bg-dark"' : 'class="badge bg-danger"'))) ?>>
                    <?= $value->Status; ?>
                </div>
            </td>
            <td class="text-center">
                <div class="btn-group" role="group">
                    <?php if ($value->Status == "In progress" or $value->Status == "Success") { ?>
                        <button type="button" class="btn btn-success btn-sm btn_track" data-pass-value-clientprocessid="<?= $value->ClientProcessID; ?>" data-pass-value-processid="<?= $value->ProcessID; ?>" data-bs-toggle=" tooltip" data-bs-placement="top" title="Track">
                            <i class="bi bi-eye-fill"></i>
                        </button>
                    <?php } ?>
                    <?php if ($value->Status !== "Cancelled" && $value->Status !== "Success" && $value->Status !== "Rejected") { ?>
                        <button type="button" class="btn btn-warning btn-sm btn_cancel" data-pass-value-clientprocessid="<?= $value->ClientProcessID; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel">
                            <i class="bi bi-x-circle-fill"></i>
                        </button>
                    <?php } ?>
                    <button type="button" class="btn btn-danger btn-sm btn_delete" data-pass-value-clientprocessid="<?= $value->ClientProcessID; ?>" data-pass-value-filename="<?= $value->FileName; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </div>
            </td>
        </tr>
    <?php $number++;
    }
} else { ?>
    <center style="color: red">
        <h3>No Documents!</h3>
    </center>
<?php } ?>