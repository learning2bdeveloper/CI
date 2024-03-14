document.addEventListener("DOMContentLoaded", () => {
  const reloadTable = async () => {
    //C:\xampp\htdocs\kyanu_document_tracking\application\modules\create_organization\views\grid\load_organization  create_organization/grid/load_organization
    const response = await fetch(
      "create_organization/Create_organization/get_organization_info_with_pagination"
    );
    if (response.ok) {
      const data = await response.text();
      document.getElementById("table").innerHTML = data;
      console.log("reloadtable()");
    } else {
      // Handle error response
      console.error("Error submitting form:", response.statusText);
    }
  };
  reloadTable();

  // Function to perform search
  async function performSearch() {
    try {
      const data = new FormData();
      data.append("input", document.getElementById("searchInput").value);
      const response = await fetch(
        "create_organization/Create_organization/search",
        {
          method: "POST",
          body: data,
        }
      );
      const info = await response.text();
      document.getElementById("table").innerHTML = info;
    } catch (error) {
      console.warn(error);
    }
  }

  // Event listener for search button click
  document
    .getElementById("searchButton")
    .addEventListener("click", async () => {
      await performSearch();
    });

  // Event listener for Enter key press
  document
    .getElementById("searchInput")
    .addEventListener("keypress", async (event) => {
      if (event.key === "Enter") {
        await performSearch();
      }
    });

  $(document).on("click", ".btnDelete", async function () {
    console.log($(this).data("pass-value"));
    let confirmation = confirm("Are you sure you want to delete this?");
    if (confirmation) {
      try {
        let data = new FormData();
        data.append("id", $(this).data("pass-value")); // Getting value from data-pass-value attribute
        const response = await fetch(
          "create_organization/services/Create_organization_service/delete",
          {
            method: "POST",
            body: data,
          }
        );

        if (response.ok) {
          // Handle successful response
          console.log("Form submitted successfully");
          toastr.options.progressBar = true;
          toastr.success("Deleted Success!");

          reloadTable();

          // $('#example').DataTable() gets the DataTable instance.
          // table.row($(this).closest('tr')) finds the DataTable row corresponding to the closest table row (<tr>) relative to the clicked delete button.
          // .remove() removes the row from the DataTable.
          // .draw(false) redraws the DataTable without refreshing the page.
        } else {
          // Handle error response
          console.error("Error submitting form:", response.statusText);
        }
      } catch (error) {
        console.error("Error submitting form:", error);
      }
    }
  });

  $(document).on("click", ".btnUpdate", async function () {
    // wla ni gin () => kay laen function ka arrow function sa mga elements esp sa "this"
    console.log($(this).data("pass-value"));
    // gin $(document) kay gin add ang table dynamically kag mas ulihi tapos ang table and this make sure nga makita dyapon ang btnupdate.
    const myModal = new bootstrap.Modal(document.getElementById("editModal"));
    try {
      let data = new FormData();
      data.append("id", $(this).data("pass-value"));
      const response = await fetch(
        "Create_organization/get_single_organization_info",
        {
          method: "POST",
          body: data,
        }
      );

      if (response.ok) {
        const info = await response.json();

        // Handle successful response
        myModal.show();
        document.getElementById("edit_organization_name").value =
          info.data.OrgName;
        document.getElementById("edit_address").value = info.data.Address;
        document.getElementById("edit_email").value = info.data.EmailAddress;
        document.getElementById("edit_contact_person").value =
          info.data.ContactPerson;
        document.getElementById("edit_contact_number").value =
          info.data.ContactNumber;

        $("#orgEdit").on("click", async () => {
          console.log("hello");
          let data2 = new FormData(document.getElementById("form_edit")); // the jquery does not work since it gets the jquery object and not the form element itself.
          data2.append("id", $(this).data("pass-value"));
          const response = await fetch(
            "create_organization/services/Create_organization_service/edit",
            {
              method: "POST",
              body: data2,
            }
          );
          if (response.ok) {
            $("#example").DataTable().draw();
            myModal.hide();
          } else {
            // Handle error response
            console.error('Error submitting form:', response.statusText);
        }
    
        }catch(error) {
            console.error('Error:', error);
        }
    
        // const myModal = new bootstrap.Modal(document.getElementById('editModal'));
        // myModal.show();;
    }
    
    //function for updating client info
    async function OpenModalUpdateClientData(value) {
        console.log("modalUpdate()");
      const myModal = new bootstrap.Modal(document.getElementById('editModal'));
        try {
        let data = new FormData();
        data.append('id', value);
    
        const response = await fetch('Create_client/get_single_client_info', {
            method: 'POST',
            body: data
        });
    
        if (response.ok) {
            const info = await response.json();
            console.log(info);
            // Handle successful response
            myModal.show();
            
            document.getElementById('edit_user_name').value = info.data.UserName;
            document.getElementById('edit_first_name').value = info.data.FName;
            document.getElementById('edit_middle_name').value = info.data.MName;
            document.getElementById('edit_last_name').value = info.data.LName;
            document.getElementById('edit_password').value = info.data.Password;
            document.getElementById('edit_gender').value = info.data.Gender;
            document.getElementById('edit_civil_status').value = info.data.CivilStatus;
            document.getElementById('edit_contact_no').value = info.data.ContactNo;
            document.getElementById('edit_email').value = info.data.EmailAddress;
            document.getElementById('edit_address').value = info.data.Address;
            
            if(document.getElementById("clientEdit")) {
                document.getElementById("clientEdit").addEventListener("click", async () => {
                    let data = new FormData(document.getElementById('form_edit'));
                    data.append('id', value);
                    const response = await fetch('create_client/services/Create_client_service/editinfo', {
                        method: 'POST',
                        body: data
                    });
                    if(response.ok) {
                        
                        reloadTable();
                        myModal.hide();
                    }
                    
                });
            }
            
        } else {
            // Handle error response
            console.error('Error submitting form:', response.statusText);
        }
    
        }catch(error) {
            console.error('Error:', error);
        }
    
        // const myModal = new bootstrap.Modal(document.getElementById('editModal'));
        // myModal.show();;
    }
    
  
    
    const el_form_save = document.getElementById("form_save");
    const el_form_saveinfo = document.getElementById("client_save");
    const el_modal_btn_save = document.getElementById("orgSave");
    const el_modal_btn_saveinfo = document.getElementById("clientSave");
    
    
    
    
    // Check if toast should be shown
    const shouldShowToast = localStorage.getItem('showToast');
    const shouldShowToastdel = localStorage.getItem('showToastdel');
    if (shouldShowToast === 'true' || shouldShowToastdel === 'true') { //not done
        // Show the toast
        var el_toast = document.getElementById("liveToast");
        var myToast = new bootstrap.Toast(el_toast, {delay : 3000});
        myToast.show();
    
        // Remove the flag from localStorage to prevent showing the toast again
        localStorage.removeItem('showToast');
    }
    
    
    
    
    
    
    
    if(el_modal_btn_save) {
    
        el_modal_btn_save.addEventListener("click", async(e) => 
        {
            e.preventDefault();
        try 
        {
            let data = new FormData(el_form_save);
            const response = await fetch('create_organization/services/Create_organization_service/save', {
                method: 'POST',
                body: data
            });
            const info = await response.text();
    
            if (response.ok) {
                // Handle successful response
                console.log('Form submitted successfully');
                localStorage.setItem('showToast', 'true');
                window.location.href = "Organization";
                
              
                
            } else {
                // Handle error response
                console.error('Error submitting form:', response.statusText);
            }
    
        }catch(error) 
        {
            console.error('Error submitting form:', error);
        }
    
        });
    
    };
    
    if(el_modal_btn_saveinfo) {
    
        el_modal_btn_saveinfo.addEventListener("click", async(e) => 
        {
            e.preventDefault();
        try 
        {
            let data = new FormData(el_form_saveinfo);
            const response = await fetch('create_client/services/Create_client_service/saveinfo', {
                method: 'POST',
                body: data
            });
            const info = await response.text();
    
            if (response.ok) {
                // Handle successful response
                console.log('Form submitted successfully');
                localStorage.setItem('showToast', 'true');
                window.location.href = "Client";
                
              
                
            } else {
                // Handle error response
                console.error('Error submitting form:', response.statusText);
            }
    
        }catch(error) 
        {
            console.error('Error submitting form:', error);
        }
    
        });
    
    };
    
    
     
    // document.getElementById("submit").addEventListener("click", () => {
    
    //     alert(document.getElementById("address").value);
    // });



