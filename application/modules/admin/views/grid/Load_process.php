<?php
if (!empty($data)) {

    foreach ($data as $value) {

        // Unique class for each collapse element
        $collapse_class = 'collapse_' . $value->ProcessID;
        $collapse_steps = 'collapse_steps_' . $value->ProcessID;
?>
        <tr>
            <td><?= @$value->ProcessID ?></td>
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
        </tr>
        <tr>
            <td colspan="6">
                <!-- Collapse section -->
                <div class="collapse <?= $collapse_class ?>">
                    <div class="<?= $collapse_steps; ?>"></div>
                </div>
            </td>
        </tr>
    <?php
    }
} else {
    ?>
    <tr>
        <td colspan="6">
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