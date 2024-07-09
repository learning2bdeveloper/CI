const base_url = "/kyanu_document_tracking";
document.addEventListener("DOMContentLoaded", async () => {
  if (document.getElementById("table")) {
    reloadTable(); // no need mag butang await kay ga error.
  }

  if (document.querySelector("#documents")) {
    reloadDocumentsTable();
  }

  const trackModal = initializedModal("trackModal");
  const deleteModal = initializedModal("deleteModal");
  const cancelModal = initializedModal("cancelModal");
  const uploadDocumentModal = initializedModal("uploadDocumentModal");
  const stepsModal = initializedModal("stepsModal");

  // Event listener for search button click
  $("#searchButton").on("click", async () => {
    await performSearch();
  });

  // Event listener for Enter key press
  $("#searchInput")
    .off("keypress")
    .on("keypress", async (event) => {
      if (event.key === "Enter") {
        await performSearch();
      }
    });

  $("#form_signup")
    .off("submit")
    .on("submit", async function (event) {
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
          showToastr("Please fill in all required fields.", error, 3000);
          return; // Stop form submission
        }

        let data = new FormData($(this)[0]);

        const response = await fetch(
          base_url +
            "/authentication/services/Signup_service_controller/SetSignupClient",
          {
            method: "POST",
            body: data,
          }
        );

        if (response.ok) {
          const info = await response.json();
          console.log(info);
          if (info.has_error) {
            showToastr(info.message, error, 3000);
          } else {
            showToastr(info.message, success, 3000);
            $("#form_signup")[0].reset();
          }
        } else {
          // Handle error response
          console.error("Error submitting form:", response.statusText);
        }
      } catch (error) {
        console.error(error);
      }
    });

  $("#form_login")
    .off("submit")
    .on("submit", async function (event) {
      //done
      try {
        event.preventDefault(); // Prevent default form submission
        if ($("#login_email").val() === "" || $("#login_pwd").val() === "") {
          showToastr("Please fill in all required fields.", error, 3000);
          return;
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
          if (info.has_error) {
            showToastr(info.message, "error", 3000);
          } else {
            $("#form_login")[0].reset();
            window.location.href = base_url + "/client/dashboard";
          }
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

  $("#form_update_modal")
    .off("submit")
    .on("submit", async function (event) {
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
      if (info.has_error) {
        showToastr(info.message, error, 3000);
      } else {
        location.reload();
      }
    });

  $(document)
    .off("dbclick")
    .on("dblclick", ".click_row", async function () {
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
  let clickedProcessName;
  $(document).on("click", ".box", async function () {
    stepsModal.show();
    clickedProcessName = $(this).data("test2");
    $("#modal-title").text(clickedProcessName);
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
      $("#modal-title2").text(clickedProcessName);
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
        showToastr("Please fill in all required fields.", "error", 3000);
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

      if (response.ok) {
        const info = await response.json();
        if (info.has_error) {
          showToastr(info.message, "error", 3000);
          return;
        } else {
          showToastr(info.message, "success", 3000);
          $("#form_upload")[0].reset();
          uploadDocumentModal.hide();
          reloadDocumentsTable();
        }
      } else {
        throw new Error();
      }
    } catch (error) {
      console.error(error);
    }
  });

  $(document).on("click", ".btn_cancel", async function () {
    try {
      console.log("hello");
      cancelModal.show();
      $("#btn_yes_modal_cancel")
        .off("click")
        .click(async () => {
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
          if (response.ok) {
            const info = await response.json();
            if (info.has_error) {
              showToastr(info.message, "error", 3000);
            } else {
              showToastr(info.message, "success", 3000);
              reloadDocumentsTable();
              cancelModal.hide();
              $(".btn_cancel").off("click");
            }
          } else {
            throw new Error();
          }
        });
    } catch (error) {
      console.error(error);
    }
  });

  $(document).on("click", ".btn_delete", async function () {
    try {
      deleteModal.show();
      $("#btn_yes_modal_delete")
        .off("click")
        .click(async () => {
          let data = new FormData();
          data.append("client_process_id", $(this).data("pass-value-id"));

          const response = await fetch(
            base_url +
              "/clientprocess/services/ClientProcess_documents_service_controller/deleteDocument",
            {
              method: "POST",
              body: data,
            }
          );

          if (response.ok) {
            const info = await response.json();
            if (info.has_error) {
              showToastr(info.message, "error", 3000);
            } else {
              showToastr(info.message, "success", 3000);
              reloadDocumentsTable();
              deleteModal.hide();
              $(".btn_delete").off("click");
            }
          } else {
            throw new Error();
          }
        });
    } catch (error) {
      console.error(error);
    }
  });

  $(document).on("click", ".btn_track", async function () {
    try {
      trackModal.show();
      let data = new FormData();
      data.append("processID", $(this).data("pass-value-processid"));
      data.append(
        "clientprocessID",
        $(this).data("pass-value-clientprocessid")
      );
      const response = await fetch(
        base_url + "/client/Client_controller/LoadTrackingSystem",
        {
          method: "POST",
          body: data,
        }
      );
      if (response.ok) {
        const info = await response.text();
        $("#load_track").html(info);
      } else {
        throw new Error();
      }
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
      base_url + "/client/Client_controller/SearchOrganization",
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

async function reloadDocumentsTable() {
  try {
    const response = await fetch(
      base_url + "/client/Client_controller/FetchClientsDocs"
    );
    const info = await response.text();
    $("#documents").html(info);
  } catch (error) {
    console.error(error);
  }
}
