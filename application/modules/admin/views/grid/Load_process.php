<?php
if (!empty($data)) {

    $number = 1;
    foreach ($data as $value) {

        // Unique class for each collapse element
        $collapse_class = 'collapse_' . $value->ProcessID;
        $collapse_steps = 'collapse_steps_' . $value->ProcessID;
?>
        <tr>
            <td><?= @$number; ?></td>
            <td><?= ucwords(@$value->ProcessName) ?></td>
            <td><?= ucwords(@$value->Description) ?></td>
            <td><?= @$value->ExpectedDays ?></td>
            <td class="text-center">
                <div class="btn-group" role="group">
                    <button class="btn btn-danger btnDelete" data-pass-value="<?= $value->ProcessID ?>"><i class="bi bi-trash3-fill"></i></button>

                    <button class="btn btn-warning btnUpdate" data-pass-value="<?= $value->ProcessID ?>"><i class="bi bi-pencil-fill"></i></button>

                    <button class="btn btn-light btnSteps" data-pass-value="<?= $value->ProcessID ?>"><i class="bi bi-three-dots"></i></button>
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
        $number++;
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