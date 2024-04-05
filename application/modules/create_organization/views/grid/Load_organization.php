<?php
if (!empty($data)) {
    foreach ($data as $value) { // dapat ang name ka key sng array imo gamiton ND ang whole array gid 'datas[data]';
?>
        <tr>
            <td><?= @$value->OrgID ?></td>
            <td> <img style="width: 100px; height: 100px;" src="<?= ($value->Image == null and isset($value->Image)) ? base_url('assets/images/default.png') : base_url('assets/images/profiles/') . $value->Image; ?>" alt="Organization Logo"> </td>
            <td><?= ucwords(@$value->OrgName) ?></td>
            <td><?= @$value->EmailAddress ?></td>
            <td><?= @$value->ContactPerson ?></td>
            <td><?= @$value->ContactNumber ?></td>
            <td><?= @$value->Address ?></td>
            <td>

                <div class="action-icon">
                    <button class="btnDelete" data-pass-value="<?= $value->OrgID ?>" data-pass-image="<?= $value->Image ?>"><i class="bi bi-trash3-fill"></i></button>

                    <button class="btnUpdate" data-pass-value="<?= $value->OrgID ?>" data-pass-oldimage="<?= $value->Image ?>"><i class="bi bi-pencil-fill"></i></button>

                    <button class="infobutton" data-pass-value="<?= $value->OrgID ?>"><i class="bi bi-file-ruled"></i></button>
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
</div>
<?= pagination_links($currentPage, $totalPages); ?>