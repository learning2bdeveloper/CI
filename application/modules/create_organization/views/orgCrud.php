<?php organization_header(); ?>
<body>

    <nav class="navbar navbar-light justify-content-between fs-3 mb-4" style="background-color: #1E90FF;">
    <div class="text-center">
        <button id="btn_dashboard" class="btn btn-secondary mb-1"><i class="bi bi-house"></i> Back to Dashboard</button>
    </div>
        <span class="mx-auto">Lists of Organizations</span>
        
    </nav>

    <p class="m-b-0 _300" style="font-size: 90%;"><i class="bi bi-info-circle"></i> NOTE: this table auto-loads the first 50 Organization only. Use search/filter to load specific organizations</p>
    <div class="table-responsive mx-auto" style="max-width: 900px;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <button id="btn_add_new" class="btn btn-success mb-1"><i class="bi bi-building-fill-add"></i></button>
            </div>
            <div class="col-md-6 input-group">
                <input type="text" id="searchInput" class="form-control mb-1 float-md-end" placeholder="Search...">
                <button id="searchButton" class="btn btn-primary">Search</button>
            </div>
        </div>

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Organization Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Contact Person</th>
                        <th scope="col">Contact #</th>
                        <th scope="col">Address</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="table"> <!-- diri ang Load_organization.php ga gwa-->
                </tbody>
            </table>
            
            
        </div>
        

     


    <!-- edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Organization</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your form fields for editing here -->
                    <div class="container d-flex justify-content-center">
            <form method="post" style="width: 45vw; min-width:300px;" id="form_edit">
            <div class="row">
                <div class="col">
                <label class="form-label" for="edit_organization_name">Organization Name:</label>
                <input type="text" class="form-control" name="edit_organization_name" id="edit_organization_name" input=""> <br>

                <label class="form-label" for="edit_address">Address</label>
                <input class="form-control" type="text" name="edit_address" id="edit_address"> <br>

                <label class="form-label" for="edit_email">Email Address</label> 
                <input type="email" class="form-control" name="edit_email" id="edit_email"> <br> 

                <label class="form-label" for="edit_contact_person">Contact Person</label>
                <input type="text" class="form-control" name="edit_contact_person" id="edit_contact_person"> <br>

                <label class="form-label" for="edit_contact_number">Contact #</label>
                <input type="number" class="form-control" name="edit_contact_number" id="edit_contact_number"> <br>
                </div>
            </form>
        </div>
    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="orgEdit">Save changes</button>
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
