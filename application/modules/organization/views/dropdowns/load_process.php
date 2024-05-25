<?php
if (!empty($data)) { ?>
    <!-- Dropdown for selecting a process -->
    <div class="form-group">
        <label for="processSelect">Select Process:</label>
        <select id="processSelect" class="form-control">
            <option value="">--Select Process--</option>
            <!-- Add your process options here -->
            <?php foreach ($data as $value) : ?>
                <option value="<?= $value->ProcessID ?>" data-description="<?= $value->Description ?>" data-days="<?= $value->ExpectedDays ?>" data-text="<?= $value->ProcessName ?>">
                    <?= $value->ProcessName ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
<?php } else { ?>
    <div class="form-group">
        <label for="processSelect">Select Process:</label>
        <select id="processSelect" class="form-control">
            <option disabled style="color: red;">No Processes Yet!</option>
        </select>
    </div>
<?php } ?>
<br>
<!-- Sections to display process details -->
<div id="processDetails">
    <div id="processDescription">
        <!-- Description will be loaded here based on the selected process -->
    </div>
    <div id="processDays">
        <!-- Expected days will be loaded here based on the selected process -->
    </div>
</div>