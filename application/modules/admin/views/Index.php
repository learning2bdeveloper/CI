<?php


usefulLinks(); ?>
<script defer src="<?= base_url('assets/javascript/admin.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/Dashboard.css') ?>">

<body>
    <div class="wrapper">
        <?= $this->load->view('admin/sidebar'); ?>

        <div class="main p-3">
            <div class="text-center">

                <div class="row">
                    <div class="col-sm-4 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5>Organizations</h5>
                                <div class="row">
                                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                                            <h2 style="margin-left: 50%" id="numberoforganizations"></h2>
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                        <i class="bi bi-buildings" style="font-size: 5vw; color: red"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5>Clients</h5>
                                <div class="row">
                                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                                            <h2 style="margin-left: 50%" id="numberofclients"></h2>
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-12 col-xl-4">
                                        <i class="bi bi-people" style="font-size: 5vw; color: red"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5>Completed</h5>
                                <div class="row">
                                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                                            <h2 class="mb-0">$32123</h2>
                                            <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                                    </div>
                                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                        <i class="bi bi-check2-all" style="font-size: 5vw; color: red"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</body>

</html>