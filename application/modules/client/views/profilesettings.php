<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/profilesettings.css') ?>">
</head>
<body>
<div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main p-3">
            <div class="text-center">
</body>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="Enter First Name" value=""></div>
                    <div class="col-md-4"><label class="labels">Middle Name</label><input type="text" class="form-control" value="" placeholder="Enter Middle Name"></div>
                    <div class="col-md-4"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="Enter Last Name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4"><label class="labels">Password</label><input type="password" class="form-control" placeholder="Enter New Password" value=""></div>
                    <div class="col-md-4">
                                        <label for="gender" class="form-label">Gender</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                    </div>
                    <div class="col-md-4">
                                        <label for="civil_status" class="form-label">Civil Status</label>
                                            <select class="form-control" id="civil_status" name="civil_status">
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Widowed">Widowed</option>
                                            </select>
                    </div>
                    <div class="col-md-4"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="Enter Contact Number" value=""></div>
                    <div class="col-md-4"><label class="labels">Address</label><input type="text" class="form-control" placeholder="Enter Address" value=""></div>
                    <div class="col-md-4"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Enter Email" value=""></div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
</div>
</div>
</div>