<?php if (!empty($data)) { ?>
    <div class="card card-body">

        <!-- Buttons for adding and deleting steps -->
        <div class="d-flex mb-3">
            <button class="btn btn-sm btn-success me-2 btnAdd" data-pass-value="">Add</button>
            <button class="btn btn-sm btn-danger" data-pass-value="">Delete</button>
        </div>
        <ol>
            <?php foreach ($data as $value) { ?>
                <li><?= $value->SequenceNumber . " :" . $value->StepName . " Prerequisite :" . $value->Prerequisite; ?></li>
                <!-- Add more steps as needed -->
            <?php } ?>
        </ol>
    </div> <!-- Move the closing div tag here -->
<?php } else { ?>
    <div class="card card-body">
        <div class="d-flex mb-3">
            <!-- You can keep these buttons here if needed -->
        </div>
        <ol>
            <li>No Steps Yet!.</li>
        </ol>
    </div>
<?php } ?>