<?php 
if(!empty($data)){
    foreach ($data as $value) { // dapat ang name ka key sng array imo gamiton ND ang whole array gid 'datas[data]';
        ?>
            <tr>
                <td><?=$value->OrgID?></td>
                <td><?=ucwords(@$value->OrgName)?></td>
                <td><?=@$value->EmailAddress?></td>
                <td><?=@$value->ContactPerson?></td>
                <td><?=@$value->ContactNumber?></td>
                <td><?=@$value->Address?></td>
                <td>
                    <div class="action-icons">
                        <div class="action-icon">
                            <button id="deletebutton" data-bs-toggle="modal" data-bs-target="#deleteModal" data-pass-value="<?=$value->OrgID?>"><i class="bi bi-trash3-fill"></i></button>
                        </div>
                        <div class="action-icon">
                            <button id="editbutton" data-bs-toggle="modal" data-bs-target="#editModal" data-pass-value="<?=$value->OrgID?>"><i class="bi bi-pencil-fill"></i></button>
                        </div>
                        <div class="action-icon">
                            <button id="infobutton" data-bs-toggle="modal" data-bs-target="#infoModal" data-pass-value="<?=$value->OrgID?>"><i class="bi bi-info-circle"></i></button>
                        </div>
                    </div>
                </td>

            </tr>
            
        <?php  
    }        
}else{
    ?>
        <tr>
            <td colspan="8">
                <div><center><h6 style="color:red">No Data Found.</h6></center></div>
            </td>
        </tr>
    <?php
    
}
?>

