<?php 
if(!empty($data)){
    $id = 1;
    foreach ($data as $value) { // dapat ang name ka key sng array imo gamiton ND ang whole array gid 'datas[data]';
        ?>
            <tr>
                <td><?=$id?></td>
                <td><?=@$value->UserName?></td>
                <td><?=@$value->FName?></td>
                <td><?=@$value->MName?></td>
                <td><?=@$value->LName?></td>
                <td><?=@$value->Password?></td>
                <td><?=@$value->Gender?></td>
                <td><?=@$value->CivilStatus?></td>
                <td><?=@$value->ContactNo?></td>
                <td><?=@$value->EmailAddress?></td>
                <td><?=@$value->Address?></td>
                <td>
               
                <div class="action-icon">
                    <button class="btnDeleteInfo" data-pass-value="<?= $value->ClientID ?>"><i class="bi bi-trash3-fill"></i></button>


                    <button class="btnUpdateInfo" data-pass-value="<?= $value->ClientID ?>"><i class="bi bi-pencil-fill"></i></button>

                </div>
                </td>

            </tr>
            <?php $id++;?>
        <?php  
    }        
}else{
    ?>
        <tr>
            <td colspan="8">
                <div>
                <center>
                    <h6 style="color:red">No Data Found.</h6>
                </center></div>
            </td>
        </tr>
    <?php
    
}
?>
</tbody>
</table>
</div>
<?= pagination_links($currentPage, $totalPages); ?>

