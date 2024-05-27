const base_url = "/kyanu_document_tracking";
document.addEventListener("DOMContentLoaded", async () => {
  const defineProcessModal = new bootstrap.Modal(
    document.getElementById("defineprocessModal")
  );
  const addStepsModal = new bootstrap.Modal(
    document.getElementById("addStepModal")
  );

  await reloadTable();

  $("#btn_add_new").click(async function () {
    defineProcessModal.show();
    $(document).off("click", "#save");
    // Clear form fields when modal is opened
    $("#form_save")[0].reset();
    $(document).on("click", "#save", async () => {
      data = new FormData($("#form_save")[0]);

      const response = await fetch(
        base_url + "/admin/services/Admin_service_controller/SaveProcess",
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
          defineProcessModal.hide();
        }
      } else {
        throw new Error();
      }
    });
  });

  $(document).on("click", ".btnSteps", async function () {
    let collapseClass = "collapse_" + $(this).data("pass-value");
    console.log(collapseClass);
    let collapseElement = $("." + collapseClass);

    let data = new FormData();
    data.append("processID", $(this).data("pass-value"));

    const response = await fetch(
      base_url + "/admin/Admin_controller/load_steps",
      {
        method: "POST",
        body: data,
      }
    );
    if (response.ok) {
      let info = await response.text();
      if (collapseElement.length) {
        collapseElement.collapse("toggle");
        $(".collapse_steps_" + $(this).data("pass-value")).html(info);
      }
    }
  });

  $(document).on("click", ".btnAdd", async function () {
    let processID = $(this).data("pass-value");
    // Store the processID in a data attribute of the modal button
    $(".btn_save_step").data("processID", processID);
    $(".btn_save_step").off("click");
    addStepsModal.show();
  });

  $(document).on("click", ".btn_save_step", async function () {
    // Retrieve the processID from the data attribute of the save button

    let processID = $(this).data("processID");
    console.log(processID);
    // Handle further logic with the processID
    data = new FormData($("#form_add_step")[0]);
    data.append("processID", processID);
    response = await fetch(
      base_url + "/admin/services/Admin_service_controller/SaveStep",
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
        timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
      });
      addStepsModal.hide();
      $("#form_add_step")[0].reset();
    } else {
      throw new Error();
    }
  });

  $(document)
    .off("click", ".btnDelete")
    .on("click", ".btnDelete", async function () {
      try {
        let processID = $(this).data("pass-value");
        alert(processID);

        let data = new FormData();
        data.append("processID", processID);

        const response = await fetch(
          base_url + "/admin/services/Admin_service_controller/DeleteProcess",
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
            reloadTable();
            return;
          }
        } else {
          throw new Error("Failed to delete process!");
        }
      } catch (error) {
        console.error("Error deleting process: " + error);
      }
    });

  $(document)
    .off("click", ".btnDeleteStep")
    .on("click", ".btnDeleteStep", async function () {
      try {
        let stepID = $(this).data("pass-value");
        alert(stepID);

        let data = new FormData();
        data.append("stepID", stepID);

        const response = await fetch(
          base_url + "/admin/services/Admin_service_controller/DeleteStep",
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
            return;
          }
        } else {
          throw new Error("Failed to delete step!");
        }
      } catch (error) {
        console.error("Error deleting step: " + error);
      }
    });
});
async function reloadTable() {
  let data = new FormData();
  console.log($("#hidden_elem").val());
  data.append("orgID", $("#hidden_elem").val());
  const response = await fetch(base_url + "/admin/Admin_controller/Processes", {
    method: "POST",
    body: data,
  });
  if (response.ok) {
    const data = await response.text();
    document.getElementById("table").innerHTML = data;
    console.log("reloadtable()");
  } else {
    // Handle error response
    console.error("Error submitting form:", response.statusText);
  }
}
