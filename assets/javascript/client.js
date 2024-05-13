const base_url = "/kyanu_document_tracking";
document.addEventListener("DOMContentLoaded", async () => {
  if (document.getElementById("table")) {
    reloadTable(); // no need mag butang await kay ga error.
  }

  let stepsModal;
  if (document.getElementById("stepsModal")) {
    // not sure kung jquery gamit ko to check kung na initialized na ang processModal mismo. but it works so ok na.
    stepsModal = new bootstrap.Modal(document.getElementById("stepsModal"));
  }

  let uploadDocumentModal;
  if (document.getElementById("uploadDocumentModal")) {
    // not sure kung jquery gamit ko to check kung na initialized na ang processModal mismo. but it works so ok na.
    uploadDocumentModal = new bootstrap.Modal(
      document.getElementById("uploadDocumentModal")
    );
  }

  let cancelModal;
  if (document.getElementById("cancelModal")) {
    // not sure kung jquery gamit ko to check kung na initialized na ang processModal mismo. but it works so ok na.
    cancelModal = new bootstrap.Modal(document.getElementById("cancelModal"));
  }

  let deleteModal;
  if (document.getElementById("deleteModal")) {
    // not sure kung jquery gamit ko to check kung na initialized na ang processModal mismo. but it works so ok na.
    deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));
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

  $("#form_signup").on("submit", async function (event) {
    //not yet
    try {
      event.preventDefault(); // Prevent default form submission

      if (
        $("#firstName").val() === "" ||
        $("#middleName").val() === "" ||
        $("#lastName").val() === "" ||
        $("#email").val() === "" ||
        $("#pwd").val() === "" ||
        $("#checkbox").prop("checked") === false
      ) {
        // At least one of the required fields is empty or checkbox is not checked
        toastr.error("Please fill in all required fields.", "", {
          timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
        });
        return; // Stop form submission
      }

      let data = new FormData($(this)[0]);

      const response = await fetch(
        "../../client/services/Client_service/signup",
        {
          method: "POST",
          body: data,
        }
      );

      if (response.ok) {
        const info = await response.json();
        console.log(info);
        if (info.has_error === true) {
          toastr.error(info.message, "", {
            timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
          });
          return;
        }
        toastr.success(info.message, "", {
          //diri kung wla na errors

          timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
        });
        $("#form_signup")[0].reset();
      } else {
        // Handle error response
        console.error("Error submitting form:", response.statusText);
      }
    } catch (error) {
      console.error(error);
    }
  });

  $("#form_login").on("submit", async function (event) {
    //done
    try {
      event.preventDefault(); // Prevent default form submission

      if ($("#login_email").val() === "" || $("#login_pwd").val() === "") {
        // At least one of the required fields is empty or checkbox is not checked
        toastr.error("Please fill in all required fields.", "", {
          timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
        });
        return; // Stop form submission
      }

      let data = new FormData($(this)[0]);
      //console.log($("#login_email").val() + $("#login_pwd").val());
      const response = await fetch(
        base_url +
          "/authentication/services/Login_service_controller/SetLoginClient",
        {
          method: "POST",
          body: data,
        }
      );

      if (response.ok) {
        const info = await response.json();
        if (info.has_error == true) {
          toastr.error(info.message, "", {
            timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
          });
          return;
        }
        $("#form_login")[0].reset();
        window.location.href = base_url + "/client/dashboard";
      } else {
        // Handle error response
        console.error("Error submitting form:", response.statusText);
      }
    } catch (error) {
      console.error(error);
    }
  });

  //Event Listener for Pagination Links
  $(document).on("click", ".pagination_link", async function () {
    console.log($(this).data("pass-value"));
    try {
      let data = new FormData();
      data.append("page", $(this).data("pass-value"));
      const response = await fetch(
        base_url +
          "/client/Client_controller/GetOrganizationInfoWithPagination",
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

  // Event listener for the Dropdown recordsPerPage
  $("#rowsPerPage").on("change", async function () {
    try {
      let data = new FormData();
      data.append("recordsPerPage", this.value);
      const response = await fetch(
        base_url +
          "/client/Client_controller/GetOrganizationInfoWithPagination",
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

  $("#image-preview").on("change", async () => {
    try {
      let data = new FormData($("#uploadForm")[0]);
      const response = await fetch(
        base_url + "/client/Client_profile_controller/save_profile_pic",
        {
          method: "POST",
          body: data,
        }
      );
      if (!response.ok) {
        throw new Error();
      }
      const info = await response.json();
      if (info.has_error) {
        console.log(info.message);
      }
      location.reload();
    } catch (error) {
      console.error(error);
    }
  });

  $("#form_update_modal").on("submit", async function (event) {
    event.preventDefault();
    let data = new FormData($(this)[0]);
    const response = await fetch(
      base_url + "/client/Client_profile_controller/save_profile",
      {
        method: "POST",
        body: data,
      }
    );
    const info = await response.json();
    if (info.has_error == true) {
      console.log(info.message);
      return;
    }
    location.reload();
  });

  $(document).on("dblclick", ".click_row", async function () {
    try {
      // Redirect only after a successful response
      let orgID = encodeURIComponent($(this).data("test"));
      let orgName = encodeURIComponent($(this).data("test2"));
      let url =
        base_url +
        "/client/organizations/process?orgID=" +
        orgID +
        "&orgName=" +
        orgName;

      window.location.href = url;
    } catch (error) {
      console.error("Error occurred during request:", error);
    }
  });

  let clickedProcessID;
  $(document).on("click", ".box", async function () {
    stepsModal.show();
    $("#modal-title").html($(this).data("test2"));
    clickedProcessID = $(this).data("test");
    console.log($(this).data("test"));
    let data = new FormData();
    data.append("processID", $(this).data("test"));
    const response = await fetch(
      base_url + "/client/Client_controller/show_steps",
      {
        method: "POST",
        body: data,
      }
    );
    if (!response.ok) {
      throw new Error();
    }
    const info = await response.text();
    $("#modal-body").html(info);
  });

  $(document).on("click", "#btn_createDocument", async function () {
    try {
      stepsModal.hide();
      uploadDocumentModal.show();
      $("#modal-title2").html($(".card").data("test2"));
    } catch (error) {
      console.error(error);
      return;
    }
  });

  $(document).on("click", "#btn_backModal", () => {
    try {
      uploadDocumentModal.hide();
      stepsModal.show();
    } catch (error) {
      console.error(error);
      return;
    }
  });

  $(document).on("submit", "#form_upload", async function (event) {
    try {
      event.preventDefault();

      if (
        $("#title").val() === "" ||
        $("#type").val() === "" ||
        $("#fileupload").val() === ""
      ) {
        // At least one of the required fields is empty or checkbox is not checked
        toastr.error("Please fill in all required fields.", "", {
          timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
        });
        return; // Stop form submission
      }

      let data = new FormData(this);
      data.append("processID", clickedProcessID);
      const response = await fetch(
        base_url +
          "/clientprocess/services/ClientProcess_documents_service_controller/uploadDocs",
        {
          method: "POST",
          body: data,
        }
      );

      if (!response.ok) {
        throw new Error();
      }

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
      $("#form_upload")[0].reset();
    } catch (error) {
      console.error(error);
    }
  });

  $(document).on("click", ".btn_cancel", async function () {
    try {
      cancelModal.show();
      $("#btn_yes_modal_cancel").click(async () => {
        console.log($(this).data("pass-value-id"));
        let data = new FormData();
        data.append("client_process_id", $(this).data("pass-value-id"));

        const response = await fetch(
          base_url +
            "/clientprocess/services/ClientProcess_documents_service_controller/cancelDocument",
          {
            method: "POST",
            body: data,
          }
        );

        if (!response.ok) {
          throw new Error();
        }

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
        location.reload();
      });
    } catch (error) {
      console.error(error);
    }
  });

  $(document).on("click", ".btn_delete", async function () {
    try {
      deleteModal.show();
      $("#btn_yes_modal_delete").click(async () => {
        console.log($(this).data("pass-value-id"));
        //console.log($(this).data("pass-value-filename"));
        let data = new FormData();
        data.append("client_process_id", $(this).data("pass-value-id"));
        // data.append(
        //   "client_process_filename",
        //   $(this).data("pass-value-filename")
        // );

        const response = await fetch(
          base_url +
            "/clientprocess/services/ClientProcess_documents_service_controller/deleteDocument",
          {
            method: "POST",
            body: data,
          }
        );

        if (!response.ok) {
          throw new Error();
        }

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
        location.reload();
      });
    } catch (error) {
      console.error(error);
    }
  });
});

async function reloadTable() {
  const response = await fetch(
    base_url + "/client/Client_controller/GetOrganizationInfoWithPagination"
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

// Function to perform search
async function performSearch() {
  try {
    const data = new FormData();
    data.append("input", document.getElementById("searchInput").value);
    const response = await fetch(
      "../client/Client_controller/SearchOrganization",
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
