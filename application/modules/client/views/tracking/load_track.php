<?php if (!empty($data)) { ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/Tracking_Terminal.css') ?>">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Step</th>
                    <th scope="col">IN - OUT</th>
                    <th scope="col">Step Description</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $highlighted = false;
                foreach ($data as $value) : // data is dira ang getallsteps
                    $completed = false;
                    $in = "";
                    $out = "";
                    foreach ($data2 as $step) { // data2 is dira ang steps na completed
                        if ($value->StepID == $step->StepID) {
                            $completed = true;
                            $in = $step->IN;
                            $out = $step->OUT;
                            break;
                        }
                    }
                    if ($completed) {
                        $start = new DateTime($in);
                        $formattedIn = $start->format('M d, Y - h:i a');
                        $end = new DateTime($out);
                        $formattedOut = $end->format('M d, Y - h:i a');
                    } else {
                        $formattedIn = "";
                        $formattedOut = "";
                    }
                    // e check ko ang first row na wla na sang complete
                    $highlightClass = '';
                    if (!$completed && !$highlighted) {
                        $highlightClass = 'current-step';
                        $highlighted = true; // Set the flag to true after highlighting the first incomplete step
                    }
                ?>
                    <tr>
                        <td class="<?= $completed ? 'completed' : '' ?> <?= $highlightClass ?>"><?= $value->SequenceNumber; ?></td>
                        <td class="<?= $completed ? 'completed' : '' ?> <?= $highlightClass ?>"><?= $formattedIn . ($formattedIn ? " - " : "") . $formattedOut; ?></td>
                        <td class="<?= $completed ? 'completed' : '' ?> <?= $highlightClass ?>"><strong><?= $value->StepName; ?></strong></td>
                    </tr>
                <?php

                endforeach ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <center style="color: red">
        <h3>Error!</h3>
    </center>
<?php } ?>