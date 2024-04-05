<?php
if (!empty($data)) {
    foreach ($data as $value) { // dapat ang name ka key sng array imo gamiton ND ang whole array gid 'datas[data]';
?>
        <tr>
            <td><?= @$value->ProcessID ?></td>
            <td><?= @$value->OrgID ?></td>
            <td><?= ucwords(@$value->ProcessName) ?></td>
            <td><?= ucwords(@$value->Description) ?></td>
            <td><?= @$value->ExpectedDays ?></td>
            <td>

                <div class="action-icon">
                    <button class="btnDelete" data-pass-value="<?= $value->OrgID ?>"><i class="bi bi-trash3-fill"></i></button>

                    <button class="btnUpdate" data-pass-value="<?= $value->OrgID ?>"><i class="bi bi-pencil-fill"></i></button>

                    <button class="infobutton" data-pass-value="<?= $value->OrgID ?>"><i class="bi bi-file-ruled"></i></button>
                </div>
            </td>
            <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Link with href
                </a>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Button with data-bs-target
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                </div>
            </div>
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