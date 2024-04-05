document.addEventListener("DOMContentLoaded", async () => {
  const defineProcessModal = new bootstrap.Modal(
    document.getElementById("defineprocessModal")
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
