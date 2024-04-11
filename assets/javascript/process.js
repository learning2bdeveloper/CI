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
        "define_process/services/Define_process_service/save",
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
          defineProcessModal.hide();
        } else {
          console.log(info.message);
        }
      }
    });
  });

  $(document).on("click", ".btnSteps", async function () {
    let collapseClass = "collapse_" + $(this).data("pass-value");
    console.log(collapseClass);
    let collapseElement = $("." + collapseClass);

    let data = new FormData();
    data.append("processID", $(this).data("pass-value"));

    const response = await fetch("define_steps/Define_steps/load_steps", {
      method: "POST",
      body: data,
    });
    if (response.ok) {
      let info = await response.text();
      console.log(info);
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
    response = await fetch("define_steps/services/Define_steps_service/save", {
      method: "POST",
      body: data,
    });
    const info = await response.json();

    if (response.ok & (info.has_error === false)) {
      addStepsModal.hide();
      $("#form_add_step")[0].reset();
      console.log(info.message);
    } else {
      console.log(info.has_error);
    }
  });
});
async function reloadTable() {
  //C:\xampp\htdocs\kyanu_document_tracking\application\modules\create_organization\views\grid\load_organization  create_organization/grid/load_organization
  let data = new FormData();
  // console.log($("#hidden_elem").val());
  data.append("orgID", $("#hidden_elem").val());
  const response = await fetch("define_process/Define_process/processes", {
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
