<?php
if (!empty($data)) {
    foreach ($data as $value) { // dapat ang name ka key sng array imo gamiton ND ang whole array gid 'datas[data]';
?>
        <tr class="click_row" data-test="<?= $value->OrgID; ?>" data-test2="<?= $value->OrgName; ?>">
            <td><?= @$value->OrgID ?></td>
            <td> <img style="width: 100px; height: 100px;" src="<?= ($value->Image == null and isset($value->Image)) ? base_url('assets/images/default.png') : base_url('assets/images/profiles/') . $value->Image; ?>" alt="Organization Logo"> </td>
            <td><?= ucwords(@$value->OrgName) ?></td>
            <td><?= @$value->EmailAddress ?></td>
            <td><?= @$value->ContactPerson ?></td>
            <td><?= @$value->ContactNumber ?></td>
            <td><?= @$value->Address ?></td>

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