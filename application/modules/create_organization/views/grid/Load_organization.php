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
                    <button id="deletebutton" data-bs-toggle="modal" data-bs-target="#deleteModal" data-pass-value="<?=$value->OrgID?>">1</button>
                    <button id="editbutton" data-bs-toggle="modal" data-bs-target="#editModal" data-pass-value="<?=$value->OrgID?>">1</button>
                    <button id="infobutton" data-bs-toggle="modal" data-bs-target="#infoModal" data-pass-value="<?=$value->OrgID?>">1</button>
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

