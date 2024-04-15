<div class="card card-body">

    <!-- Buttons for adding and deleting steps -->
    <div class="d-flex mb-3">
        <button class="btn btn-sm btn-success me-2 btnAdd" data-pass-value="<?= $processID; ?>">Add</button>
        <button class="btn btn-sm btn-danger" data-pass-value="<?= $processID; ?>">Delete</button>
    </div>
    <?php if (!empty($data)) { ?>

        <ol>
            <?php foreach ($data as $value) { ?>
                <li><?= $value->SequenceNumber . " :" . $value->StepName . " Prerequisite :" . $value->Prerequisite; ?></li>
                <!-- Add more steps as needed -->
            <?php } ?>
        </ol>

    <?php } else { ?>
        <ol>
            <li style="color: red;">No Steps Yet!</li>

        </ol>
</div>
<?php } ?>