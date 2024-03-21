// Define modal instances outside of the DOMContentLoaded event listener
const editModal = new bootstrap.Modal(document.getElementById("editModal"));
const addModal = new bootstrap.Modal(document.getElementById("addModal"));

document.addEventListener("DOMContentLoaded", async () => {
  await reloadTable();

  // Event listener for search button click
  $("#searchButton").on("click", async () => {
    await performSearch();
  });

  // Event listener for Enter key press
  $("#searchInput").on("keypress", async (event) => {
    if (event.key === "Enter") {
      await performSearch();
    }
  });

  // Event listener for the Dropdown recordsPerPage
  $("#rowsPerPage").on("change", async function () {
    try {
      let data = new FormData();
      data.append("recordsPerPage", this.value);
      const response = await fetch(
        "create_organization/Create_organization/get_organization_info_with_pagination",
        {
          method: "POST",
          body: data,
        }
      );
      if (response.ok) {
        const info = await response.text();
        document.getElementById("table").innerHTML = info;
      }
    } catch (error) {
      console.error("Error: " + error);
    }
  });

  //Event Listener for Pagination Links
  $(document).on("click", ".pagination_link", async function () {
    console.log($(this).data("pass-value"));
    try {
      let data = new FormData();
      data.append("page", $(this).data("pass-value"));
      const response = await fetch(
        "create_organization/Create_organization/get_organization_info_with_pagination",
        {
          method: "POST",
          body: data,
        }
      );
      if (response.ok) {
        const info = await response.text();
        document.getElementById("table").innerHTML = info;
      }
    } catch (error) {
      console.error("Error: " + error);
    }
  });

  //Event Listener for Dropbtn Links
  $("#dropbtn").click(async () => {
    document.getElementById("navbottom").scrollIntoView({ behavior: "smooth" });
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
          const info = await response.json();
          if (info.has_error === false) {
            console.log(info.message);
            toastr.options.progressBar = true;
            toastr.success("Deleted Success!");
            await reloadTable();
          }

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
    // Access data-pass-value attribute of the clicked element
    console.log($(this).data("pass-value"));

    try {
      let data = new FormData();
      data.append("id", $(this).data("pass-value"));
      // Fetch organization information based on the ID
      const response = await fetch(
        "Create_organization/get_single_organization_info",
        {
          method: "POST",
          body: data,
        }
      );

      if (response.ok) {
        const info = await response.json();
        editModal.show();

        // Populate modal fields with organization information
        document.getElementById("edit_organization_name").value =
          info.data.OrgName;
        document.getElementById("edit_address").value = info.data.Address;
        document.getElementById("edit_email").value = info.data.EmailAddress;
        document.getElementById("edit_contact_person").value =
          info.data.ContactPerson;
        document.getElementById("edit_contact_number").value =
          info.data.ContactNumber;

        // Remove any existing event listeners on orgEdit button
        $("#orgEdit").off("click");

        // Attach event listener for the organization edit button
        $("#orgEdit").on("click", async () => {
          try {
            // Get form data
            let data2 = new FormData(document.getElementById("form_edit"));
            data2.append("id", $(this).data("pass-value"));

            // Send request to edit organization information
            const response = await fetch(
              "create_organization/services/Create_organization_service/edit",
              {
                method: "POST",
                body: data2,
              }
            );

            if (response.ok) {
              const info = await response.json();
              if (info.has_error === false) {
                console.log(info.message);
                await reloadTable();
                toastr.options.progressBar = true;
                toastr.success("Update Success!");
                editModal.hide();
              }
            } else {
              // Handle error response
              console.error("Error submitting form:", response.statusText);
            }
          } catch (error) {
            console.error("Error:", error);
          }
        });

        // Show the modal
        editModal.show();
      } else {
        // Handle error response
        console.error("Error:", response.statusText);
      }
    } catch (error) {
      console.error("Error:", error);
    }
  });

  $("#btn_add_new").click(async function () {
    addModal.show();
    $(document).off("click", "#save");
    // Clear form fields when modal is opened
    $("#form_save")[0].reset();
    $(document).on("click", "#save", async () => {
      data = new FormData($("#form_save")[0]);

      const response = await fetch(
        "create_organization/services/Create_organization_service/save",
        {
          method: "POST",
          body: data,
        }
      );

      if (response.ok) {
        const info = await response.json();
        if (info.has_error === false) {
          console.log(info.message);
          await reloadTable();
          toastr.options.progressBar = true;
          toastr.success("Add Success!");
          addModal.hide();
        } else {
          console.log(info.message);
        }
      }
    });
  });

  // //function for updating client info
  // async function OpenModalUpdateClientData(value) {
  //   console.log("modalUpdate()");
  //   const myModal = new bootstrap.Modal(document.getElementById("editModal"));
  //   try {
  //     let data = new FormData();
  //     data.append("id", value);

  //     const response = await fetch("Create_client/get_single_client_info", {
  //       method: "POST",
  //       body: data,
  //     });

  //     if (response.ok) {
  //       const info = await response.json();
  //       console.log(info);
  //       // Handle successful response
  //       myModal.show();

  //       document.getElementById("edit_user_name").value = info.data.UserName;
  //       document.getElementById("edit_first_name").value = info.data.FName;
  //       document.getElementById("edit_middle_name").value = info.data.MName;
  //       document.getElementById("edit_last_name").value = info.data.LName;
  //       document.getElementById("edit_password").value = info.data.Password;
  //       document.getElementById("edit_gender").value = info.data.Gender;
  //       document.getElementById("edit_civil_status").value =
  //         info.data.CivilStatus;
  //       document.getElementById("edit_contact_no").value = info.data.ContactNo;
  //       document.getElementById("edit_email").value = info.data.EmailAddress;
  //       document.getElementById("edit_address").value = info.data.Address;

  //       if (document.getElementById("clientEdit")) {
  //         document
  //           .getElementById("clientEdit")
  //           .addEventListener("click", async () => {
  //             let data = new FormData(document.getElementById("form_edit"));
  //             data.append("id", value);
  //             const response = await fetch(
  //               "create_client/services/Create_client_service/editinfo",
  //               {
  //                 method: "POST",
  //                 body: data,
  //               }
  //             );
  //             if (response.ok) {
  //               reloadTable();
  //               myModal.hide();
  //             }
  //           });
  //       }
  //     } else {
  //       // Handle error response
  //       console.error("Error submitting form:", response.statusText);
  //     }
  //   } catch (error) {
  //     console.error("Error:", error);
  //   }

  // const myModal = new bootstrap.Modal(document.getElementById('editModal'));
  // myModal.show();;
  //}

  // if (el_modal_btn_saveinfo) {
  //   el_modal_btn_saveinfo.addEventListener("click", async (e) => {
  //     e.preventDefault();
  //     try {
  //       let data = new FormData(el_form_saveinfo);
  //       const response = await fetch(
  //         "create_client/services/Create_client_service/saveinfo",
  //         {
  //           method: "POST",
  //           body: data,
  //         }
  //       );
  //       const info = await response.text();

  //       if (response.ok) {
  //         // Handle successful response
  //         console.log("Form submitted successfully");
  //         localStorage.setItem("showToast", "true");
  //         window.location.href = "Client";
  //       } else {
  //         // Handle error response
  //         console.error("Error submitting form:", response.statusText);
  //       }
  //     } catch (error) {
  //       console.error("Error submitting form:", error);
  //     }
  //   });
  // }

  // document.getElementById("submit").addEventListener("click", () => {

  //     alert(document.getElementById("address").value);
  // });
});

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

async function reloadTable() {
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
}
