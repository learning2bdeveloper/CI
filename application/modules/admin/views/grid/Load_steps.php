<div class="card card-body">

    <!-- Buttons for adding and deleting steps -->
    <div class="d-flex mb-3">
        <button class="btn btn-sm btn-success me-2 btnAdd" data-pass-value="<?= $processID; ?>">Add</button>
    </div>

    <?php if (!empty($data)) { ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Sequence Number</th>
                    <th>Step Name</th>
                    <th>Prerequisite</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $value) { ?>
                    <tr>
                        <td><?= $value->SequenceNumber ?></td>
                        <td><?= @$value->StepName ?></td>
                        <td><?= @$value->Prerequisite ?></td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <button class="btn btn-danger btnDeleteStep" data-pass-value="<?= $value->StepID ?>"><i class="bi bi-trash3-fill"></i></button>
                                <button class="btn btn-warning btnUpdateStep" data-pass-value="<?= $value->StepID ?>"><i class="bi bi-pencil-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <ol>
            <li style="color: red;">No Steps Yet!</li>
        </ol>
    <?php } ?>
</div>