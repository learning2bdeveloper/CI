<?php organization_header(); ?>
<body>
    <div class="wrapper">
    <?php include 'sidebar.php'; ?>
        <div class="main p-3">
            <div class="text-center">
            <?php organization_header(); ?>
<body>

    <nav class="navbar navbar-light justify-content-between fs-3 mb-4" style="background-color: #1E90FF;">
        <span class="mx-auto">Lists of Clients</span>
        
    </nav>

    <p class="m-b-0 _300" style="font-size: 90%;"><i class="bi bi-info-circle"></i> NOTE: this table auto-loads the first 50 Names of the Clients. Use search/filter to load specific profiles</p>
    <div class="table-responsive mx-auto" style="max-width: 900px;">
    <div class="row">
        <div class="col text-start">
            <button id="btn_add_client" class="btn btn-success mb-1"><i class="bi bi-person-add"></i></button>
        </div>
    </div>

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">UserName</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Civil Status</th>
                        <th scope="col">Contact #</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Address</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="clienttable">
                </tbody>
            </table>
            
            
        </div>
        

     


    <!-- edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Client Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your form fields for editing here -->
                    <div class="container d-flex justify-content-center">
            <form method="post" style="width: 45vw; min-width:300px;" id="form_edit">
            <div class="row">
            <div class="col">
                  <div class="form-group border p-3">
                <label class="form-label" for="edit_user_name">UserName:</label>
                <input type="text" class="form-control" name="edit_user_name" id="edit_user_name"> <br>

                <label class="form-label" for="edit_first_name">First Name:</label>
                <input type="text" class="form-control" name="edit_first_name" id="edit_first_name"> <br>

                <label class="form-label" for="edit_middle_name">Middle Name:</label>
                <input type="text" class="form-control" name="edit_middle_name" id="edit_middle_name"> <br>

                <label class="form-label" for="edit_last_name">Last Name:</label>
                <input type="text" class="form-control" name="edit_last_name" id="edit_last_name"> <br>

                <label class="form-label" for="edit_password">Password</label>
                <input class="form-control" type="edit_password" name="edit_password" id="edit_password"> <br>

                <label class="form-label" for="edit_gender">Gender</label>
                <select class="form-control" id="edit_gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select><br>


                <label class="form-label" for="edit_civil_status">Civil Status</label>
                <select class="form-control" id="edit_civil_status">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                </select><br>


                <label class="form-label" for="edit_contact_no">Contact Number</label>
                <input type="number" class="form-control" name="edit_contact_no" id="edit_contact_no"> <br>

                <label class="form-label" for="edit_email">Email Address</label> 
                <input type="email" class="form-control" name="edit_email" id="edit_email"> <br> 

                <label class="form-label" for="edit_address">Address</label>
                <input class="form-control" type="text" name="edit_address" id="edit_address"> <br>
                </div>
            </form>
        </div>
    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="clientEdit">Save changes</button>
                </div>
            </div>
        </div>
    </div>

   <!-- Success Toast -->

   <div class="position-fixed bottom-0 end-0 h-2">
    <div id="liveToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            <i class="bi bi-hand-thumbs-up-fill"></i> Successfully saved!
            </div>
            <button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

   <!-- Success Toast -->

   <div class="position-fixed bottom-0 end-0 h-2">
    <div id="liveToastdel" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            <i class="bi bi-hand-thumbs-up-fill"></i> Successfully deleted!
            </div>
            <button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
    <!--
    <div id="table">
    <form  method="post" id="form_create">
        <label for="organization_name">Organization Name</label>
        <input type="text" name="organization_name" id="organization_name"> <br>

        <label for="address">Address</label>
        <input type="text" name="address" id="address"> <br>

        <label for="email">Email</label> 
        <input type="email" name="email" id="email"> <br> 

        <label for="contact_person">Contact Person</label>
        <input type="text" name="contact_person" id="contact_person"> <br>

        <label for="contact_number">Contact #</label>
        <input type="number" name="contact_number" id="contact_number"> <br>

        <button type="submit" id="submit">Create</button>
    </form>
    </div>
    --> 
<?php organization_footer();?>