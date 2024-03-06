<?php  organization_header(); ?>
<body>

    <div class="container" style="max-width: 45vw;">
        <div class="text-center mb-4" style="background-color: black; color: white; padding: 3px;">
            <h3>Add New Organization</h3>
            <p class>Complete the form below to add a new organization</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form method="post" style="width: 45vw; min-width:300px;" id="form_save">
            <div class="row">
                <div class="col">
                  <div class="form-group border p-3">
                <label class="form-label" for="organization_name">Organization Name:</label>
                <input type="text" class="form-control" name="organization_name" id="organization_name"> <br>

                <label class="form-label" for="address">Address</label>
                <input class="form-control" type="text" name="address" id="address"> <br>

                <label class="form-label" for="email">Email Address</label> 
                <input type="email" class="form-control" name="email" id="email"> <br> 

                <label class="form-label" for="contact_person">Contact Person</label>
                <input type="text" class="form-control" name="contact_person" id="contact_person"> <br>

                <label class="form-label" for="contact_number">Contact #</label>
                <input type="number" class="form-control" name="contact_number" id="contact_number"> <br>

                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#saveModal" type="button" id="save">Save</button>
                <button class="btn btn-danger" type="button" id="cancel">Cancel</button>
                </div>
            </div>

            </form>
        </div>
    </div>


    <!-- save modal-->
    <div class="modal fade" id="saveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Are you sure?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button  id="orgSave" type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
 

    <!-- <div id="table">
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
    </div> -->
   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>
<script src="<?=base_url('/assets/javascript/index.js')?>"></script>
<script src="<?=base_url('/assets/javascript/changeLocation.js')?>"></script>