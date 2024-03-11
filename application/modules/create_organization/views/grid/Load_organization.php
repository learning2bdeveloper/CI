<?php
if (!empty($data)) {
    $id = 1;
    foreach ($data as $value) { // dapat ang name ka key sng array imo gamiton ND ang whole array gid 'datas[data]';
?>
        <tr>
            <td><?= $id ?></td>
            <td><?= ucwords(@$value->OrgName) ?></td>
            <td><?= @$value->EmailAddress ?></td>
            <td><?= @$value->ContactPerson ?></td>
            <td><?= @$value->ContactNumber ?></td>
            <td><?= @$value->Address ?></td>
            <td>

                <div class="action-icon">
                    <button class="btnDelete" data-pass-value="<?= $value->OrgID ?>"><i class="bi bi-trash3-fill"></i></button>


                    <button class="btnUpdate" data-pass-value="<?= $value->OrgID ?>"><i class="bi bi-pencil-fill"></i></button>

                    <button id="infobutton" data-bs-toggle="modal" data-bs-target="#infoModal" data-pass-value="<?= $value->OrgID ?>"><i class="bi bi-info-circle"></i></button>

                </div>
            </td>

        </tr>
        <?php $id++; ?>
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
<!-- Pagination links -->
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <!-- <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li> -->
        <?php if ($currentPage > 1) { # Previous currentPage halin sa controller 
        ?>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous" data-pass-value="<?= $i - 1; ?>">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php } ?>
        <?php if ($totalPages > 1) {
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $currentPage) { ?>
                    <li class="page-item"><a class="page-link" data-pass-value="<?= $i; ?>"><?= $i; ?></a></li>
                <?php } else { ?>
                    <li class="page-item"><a class="page-link" data-pass-value="<?= $i; ?>"><?= $i; ?></a></li>
        <?php }
            }
        } ?>
        <?php if ($currentPage < $totalPages) { # next
        ?>
            <li class="page-item">
                <a class="page-link" aria-label="Next" data-pass-value="<?= $i + 1; ?>">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php } ?>
        <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"> -->
        <!-- <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
        </li> -->
    </ul>
</nav>