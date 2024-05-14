const base_url = "/kyanu_document_tracking";
document.addEventListener("DOMContentLoaded", async () => {
  if (document.getElementById("table")) {
    reloadTable(); // no need mag butang await kay ga error.
  }

  let editModal;
  if (document.getElementById("editModal")) {
    // not sure kung jquery gamit ko to check kung na initialized na ang processModal mismo. but it works so ok na.
    editModal = new bootstrap.Modal(document.getElementById("editModal"));
  }

  let addModal;
  if (document.getElementById("addModal")) {
    // not sure kung jquery gamit ko to check kung na initialized na ang processModal mismo. but it works so ok na.
    addModal = new bootstrap.Modal(document.getElementById("addModal"));
  }

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
        base_url + "/admin/Admin_controller/GetOrganizationInfoWithPagination",
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
        base_url + "/admin/Admin_controller/GetOrganizationInfoWithPagination",
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
  $("#dropbtn").click(() => {
    document.getElementById("navbottom").scrollIntoView({ behavior: "smooth" });
  });

  $(document).on("click", ".btnDelete", async function () {
    /**done */ console.log($(this).data("pass-value"));
    let confirmation = confirm("Are you sure you want to delete this?");
    if (confirmation) {
      try {
        let data = new FormData();
        data.append("id", $(this).data("pass-value")); // Getting value from data-pass-value attribute
        data.append("image", $(this).data("pass-image"));
        const response = await fetch(
          base_url +
            "/admin/services/Admin_service_controller/DeleteOrganization",
          {
            method: "POST",
            body: data,
          }
        );

        if (response.ok) {
          const info = await response.json();
          if (info.has_error) {
            toastr.error(info.message, "", {
              timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
            });
            return;
          }
          toastr.success(info.message, "", {
            //diri kung wla na errors

            timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
          });
          reloadTable();
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
    /** done */
    console.log($(this).data("pass-value"));
    let oldimage = $(this).data("pass-oldimage");
    console.log($(this).data("pass-oldimage"));

    try {
      let data = new FormData();
      data.append("id", $(this).data("pass-value"));
      // Fetch organization information based on the ID
      const response = await fetch(
        base_url + "/admin/Admin_controller/GetSingleOrganizationInfo",
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
            let data2 = new FormData($("#form_edit")[0]);
            data2.append("id", $(this).data("pass-value"));
            data2.append("oldimage", oldimage);

            // Send request to edit organization information
            const response = await fetch(
              base_url +
                "/admin/services/Admin_service_controller/EditOrganization",
              {
                method: "POST",
                body: data2,
              }
            );

            if (response.ok) {
              const info = await response.json();
              if (info.has_error) {
                toastr.error(info.message, "", {
                  timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
                });
                return;
              }
              toastr.success(info.message, "", {
                //diri kung wla na errors

                timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
              });
              reloadTable();
              editModal.hide();
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
        base_url + "/admin/services/Admin_service_controller/SaveOrganization",
        {
          method: "POST",
          body: data,
        }
      );
      if (response.ok) {
        const info = await response.json();
        if (info.has_error) {
          toastr.error(info.message, "", {
            timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
          });
          return;
        }
        toastr.success(info.message, "", {
          //diri kung wla na errors

          timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
        });
        reloadTable();
        addModal.hide();
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

  $(document).on("click", ".infobutton", async function () {
    window.location.href =
      base_url +
      "/admin/organization/process?orgID=" +
      encodeURIComponent($(this).data("pass-value"));
  });
});

// Function to perform search
async function performSearch() {
  try {
    const data = new FormData();
    data.append("input", document.getElementById("searchInput").value);
    const response = await fetch(
      base_url + "/admin/Admin_controller/SearchOrganization",
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
    base_url + "/admin/Admin_controller/GetOrganizationInfoWithPagination"
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
