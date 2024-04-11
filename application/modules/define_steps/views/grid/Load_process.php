<?php
if (!empty($data)) {
    foreach ($data as $value) { // dapat ang name ka key sng array imo gamiton ND ang whole array gid 'datas[data]';
        // Unique class for each collapse element
        $collapse_class = 'collapse_' . $value->ProcessID;
?>
        <tr>
            <td><?= @$value->ProcessID ?></td>
            <td><?= @$value->OrgID ?></td>
            <td><?= ucwords(@$value->ProcessName) ?></td>
            <td><?= ucwords(@$value->Description) ?></td>
            <td><?= @$value->ExpectedDays ?></td>
            <td>

                <div class="action-icon">
                    <button class="btnDelete" data-pass-value="<?= $value->ProcessID ?>"><i class="bi bi-trash3-fill"></i></button>

                    <button class="btnUpdate" data-pass-value="<?= $value->ProcessID ?>"><i class="bi bi-pencil-fill"></i></button>

                    <button class="btnSteps" data-pass-value="<?= $value->ProcessID ?>"><i class="bi bi-file-ruled"></i></button>
                </div>
            </td>
        <tr>
            <td colspan="6">
                <!-- Collapse section -->
                <div class="collapse <?= $collapse_class ?>">
                    <div class="card card-body d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Steps for <?= ucwords(@$value->ProcessName) ?></h5>
                        <div class="d-flex">
                            <!-- Small "Add" button -->
                            <button class="btn btn-sm btn-success me-2 btnAdd" data-pass-value="<?= $value->ProcessID ?>">Add</button>

                            <!-- Small "Delete" button -->
                            <button class="btn btn-sm btn-danger" data-pass-value="<?= $value->ProcessID ?>">Delete</button>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    <?php
    }
} else {
    ?>
    <tr>
        <td colspan="8">
            <div>
                <center>
                    <h6 style="color:red">No Data Found.</h6>
                </center>
            </div>
        </td>
    </tr>
<?php

}
?>
</tbody>
</table>