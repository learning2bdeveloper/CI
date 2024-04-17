
<?= usefulLinks(); ?>

<link rel="stylesheet" href="<?= base_url('assets/css/landingpage.css') ?>">


<body>
    <div class="wrapper">
        <?= $this->load->view('client/sidebar'); ?>

        <div class="main p-3">
            <div class="text-center">
</body>


<div class="row">
    <div class="col-md-3">
        <div class="input-group">
            <div class="dropdown">
                <button id="dropbtn" class="btn btn-dark">&#9660;</button>
                <div class="dropdown-content">
                </div>
            </div>
            <select id="rowsPerPage" class="form-select me-3">
                <option disabled selected>Rows Per Page</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
    <div>
        <div class="input-group" style="width:250px; position: absolute; right:0px; top:0px; margin:20px;">
            <input type="text" id="searchInput" class="form-control mb-1 me-1" placeholder="Search...">
            <button id="searchButton" class="btn btn-primary">Search</button>
        </div>
    </div>


    <!-- <p class="m-b-0 _300" style="font-size: 90%;"><i class="bi bi-info-circle"></i> NOTE: this table auto-loads the first 50 Organization only. Use search/filter to load specific organizations</p> -->

    <div style="max-height: 560px; overflow-y: auto;">
        <table id="example" class="table table-striped" style="width:98%">
            <thead>
                <tr>
                    <th scope="col" class="styled-header">#</th>
                    <th scope="col" class="styled-header"></th>
                    <th scope="col" class="styled-header">Organization Name</th>
                    <th scope="col" class="styled-header">Email Address</th>
                    <th scope="col" class="styled-header">Contact Person</th>
                    <th scope="col" class="styled-header">Contact #</th>
                    <th scope="col" class="styled-header">Address</th>
                    <th scope="col" class="styled-header">Actions</th>
                </tr>
            </thead>

            <tbody id="table"> <!-- diri ang Load_organization.php ga gwa-->



                <!-- CRUD naman ni sang tbl_Process, d ko kabalo paano ya nama kwa ang value sang foreign key nga Org_ID -->
                <!-- define process modal -->
                <!-- <div class="modal fade" id="defineprocessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Define Process</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" id="form_save">
                                                        <div class="row mb-3">
                                                            <label for="organization_name" class="col-sm-3 col-form-label text-end">Process Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="process_name" name="process_name">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="address" class="col-sm-3 col-form-label text-end">Description</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="description" name="description">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="expected_days" class="col-sm-3 col-form-label text-end">Expected Days</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="expected_days" name="expected_days">
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-6">
                                                            <button type="button" class="btn btn-success w-100" id="save">Save</button>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->


                <!-- <script>

                                    $(document).on("click", ".infobutton", function() {
                                        console.log($(this).data("pass-value"));
                                    });
                                </script> -->

                </body>

                </html>

