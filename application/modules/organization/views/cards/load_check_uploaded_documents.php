<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-title {
            color: #007bff;
        }

        .card-text {
            color: #333;
        }

        .no-documents {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2>Documents</h2>
        <div id="uploaded_documents" class="row">
            <?php if (!empty($data)) : ?>
                <?php foreach ($data as $value) : ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($value->Title, ENT_QUOTES, 'UTF-8'); ?></h5>
                                <p class="card-text">Type: <?= htmlspecialchars($value->Type, ENT_QUOTES, 'UTF-8'); ?></p>
                                <p class="card-text">Status: <?= htmlspecialchars($value->Status, ENT_QUOTES, 'UTF-8'); ?></p>
                                <a href="<?= base_url("assets/documents/") . htmlspecialchars($value->FileName, ENT_QUOTES, 'UTF-8'); ?>" target="_blank">
                                    <?= htmlspecialchars($value->OriginalFileName, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                                <br>
                                <div class="mt-4">
                                    <button class="btn btn-info btn_history mr-2" data-toggle="modal" data-target="#historyModal" data-clientprocessid="<?= htmlspecialchars($value->ClientProcessID, ENT_QUOTES, 'UTF-8'); ?>">View History</button>
                                    <button class="btn btn-primary btn_next_step" data-toggle="modal" data-target="#nextStepModal" data-clientprocessid="<?= htmlspecialchars($value->ClientProcessID, ENT_QUOTES, 'UTF-8'); ?>" data-clientid="<?= htmlspecialchars($value->ClientID, ENT_QUOTES, 'UTF-8'); ?>">Next Step</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        <h6 class="no-documents">No Documents Yet.</h6>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>