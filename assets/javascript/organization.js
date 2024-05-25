const base_url = "/kyanu_document_tracking";
document.addEventListener("DOMContentLoaded", async () => {
  if (document.querySelector(".img__btn")) {
    document.querySelector(".img__btn").addEventListener("click", function () {
      document.querySelector(".cont").classList.toggle("s--signup");
    });
  }

  const rejectModal = initializedModal("rejectModal");
  const acceptModal = initializedModal("acceptModal");
  const historyModal = initializedModal("historyModal");
  const nextStepModal = initializedModal("nextStepModal");

  reloadTable();

  if (document.querySelector("#dropdown_process")) {
    reloadDropdown();
  }

  $("#form_signup").submit(async function (event) {
    try {
      event.preventDefault();

      if (
        $("#organizationsdropdown").val() === "" ||
        $("#department").val() === "" ||
        $("#username").val() === "" ||
        $("#pwd").val() === ""
      ) {
        // At least one of the required fields is empty or checkbox is not checked
        toastr.error("Please fill in all required fields.", "", {
          timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
        });
        return; // Stop form submission
      }

      let data = new FormData(this);
      const response = await fetch(
        base_url +
          "/authentication/services/Signup_service_controller/SetSignupOrganization", //not tried
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
        $("#form_signup")[0].reset();
      } else {
        throw new Error();
      }
    } catch (error) {
      console.error(error);
    }
  });

  $("#form_login").submit(async function (event) {
    try {
      event.preventDefault();

      if ($("#login_username").val() === "" || $("#login_pwd").val() === "") {
        // At least one of the required fields is empty or checkbox is not checked
        toastr.error("Please fill in all required fields.", "", {
          timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
        });
        return; // Stop form submission
      }

      let data = new FormData(this);
      const response = await fetch(
        base_url +
          "/authentication/services/Login_service_controller/SetLoginOrganization", //done
        {
          method: "POST",
          body: data,
        }
      );

      if (response.ok) {
        const info = await response.json();
        console.log(info);
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
        $("#form_login")[0].reset();
        window.location.href = base_url + "/organization/dashboard";
      } else {
        throw new Error();
      }
    } catch (error) {
      console.error(error);
    }
  });

  $(document).on("click", ".btn_reject", async function () {
    try {
      rejectModal.show();
      $("#btn_yes_modal_reject")
        .off("click")
        .click(async () => {
          console.log($(this).data("pass-value-id"));
          let data = new FormData();
          data.append("client_process_id", $(this).data("pass-value-id"));

          const response = await fetch(
            base_url +
              "/clientprocess/services/ClientProcess_documents_service_controller/rejectDocument",
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
          reloadTable();
        });
    } catch (error) {
      console.error(error);
    }
  });

  $(document).on("click", ".btn_accept", async function () {
    try {
      acceptModal.show();
      $("#btn_yes_modal_accept")
        .off("click")
        .click(async () => {
          console.log($(this).data("pass-value-id"));
          let data = new FormData();
          data.append(
            "client_process_id",
            $(this).data("pass-value-clientprocessid")
          );
          data.append("client_id", $(this).data("pass-value-clientid"));
          data.append("process_id", $(this).data("pass-value-processid"));
          data.append(
            "client_process_id",
            $(this).data("pass-value-clientprocessid")
          );

          const response = await fetch(
            base_url +
              "/clientprocess/services/ClientProcess_documents_service_controller/acceptDocument",
            {
              method: "POST",
              body: data,
            }
          );

          if (response.ok) {
            const info = await response.json();
            if (info.has_error) {
              showToastr(info.message, "error", 2000);
              return;
            } else {
              showToastr(info.message, "success", 2000);
              reloadTable();
              acceptModal.hide();
            }
          } else {
            throw new Error();
          }
        });
    } catch (error) {
      console.error(error);
    }
  });

  let selectedOption;
  $(document).on("change", "#processSelect", function () {
    selectedOption = $(this).find("option:selected");
    if (selectedOption.val()) {
      // processID
      // Load description and expected days for the selected process
      $("#processDescription").html(
        "<p><strong>Description: </strong>" +
          selectedOption.data("description") +
          "</p>"
      );

      $("#processDays").html(
        "<p><strong>Expected Days: </strong>" +
          selectedOption.data("days") +
          "</p>"
      );

      // Load steps for the selected process
      (async () => {
        try {
          processID = new FormData();
          processID.append("processID", selectedOption.val());

          const response = await fetch(
            base_url + "/organization/Organization_controller/GetSteps",
            {
              method: "POST",
              body: processID,
            }
          );

          if (response.ok) {
            const info = await response.json();

            let steps = "";
            info.forEach((element) => {
              steps += `
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title">Step ${element.SequenceNumber}: ${element.StepName}</h6>
                                    <p class="card-text mb-0">Prerequisite Step: ${element.Prerequisite}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            $("#processSteps").html(steps);

            (async () => {
              try {
                const response = await fetch(
                  base_url +
                    "/organization/Organization_controller/FetchCheckDocuments",
                  {
                    method: "POST",
                    body: processID,
                  }
                );

                if (response.ok) {
                  const info = await response.text();
                  $("#check_documents").html(info);
                } else {
                  throw new Error("Failed to fetch documents");
                }
              } catch (error) {
                console.error("Error fetching documents:", error);
                $("#check_documents").html(
                  "<p>Error loading documents. Please try again.</p>"
                );
              }
            })();
          } else {
            throw new Error("Failed to fetch steps");
          }
        } catch (error) {
          console.error("Error fetching steps:", error);
          $("#processSteps").html(
            "<p>Error loading steps. Please try again.</p>"
          );
        }
      })();
    } else {
      // Clear the details if no process is selected
      $("#processDescription").html("");
      $("#processDays").html("");
      $("#check_documents").html("");
      $("#processSteps").html("");
    }
  });

  $(document)
    .off("click", ".btn_history")
    .on("click", ".btn_history", async function () {
      try {
        historyModal.show();
      } catch (error) {}
    });

  $(document)
    .off("click", ".btn_next_step")
    .on("click", ".btn_next_step", async function () {
      try {
        nextStepModal.show();

        $("#nextStepForm").data(
          "clientprocessID",
          $(this).data("clientprocessid")
        );
        $("#nextStepForm").data("clientid", $(this).data("clientid"));

        const response = await fetch(
          base_url + "/organization/Organization_controller/GetSteps",
          {
            method: "POST",
            body: processID,
          }
        );

        if (response.ok) {
          const info = await response.json();
          let options = "";
          info.forEach((element) => {
            options += `<option value="${element.StepID}">${element.SequenceNumber}. ${element.StepName}</option>`;
          });

          $("#nextStep").html(options);
        } else {
          throw new Error("Failed to get Steps");
        }
      } catch (error) {}

      try {
        let clientprocessID = new FormData();
        clientprocessID.append(
          "clientprocessID",
          $(this).data("clientprocessid")
        );

        const response2 = await fetch(
          base_url + "/organization/Organization_controller/GetCurrentStep",
          {
            method: "POST",
            body: clientprocessID,
          }
        );

        if (response2.ok) {
          const info2 = await response2.json();

          $("#currentStep").val(info2.SequenceNumber + ". " + info2.StepName);
          $("#nextStepForm").data("clientID", info2.ClientID);
        }
      } catch (error) {}
    });

  $(document)
    .off("submit", "#nextStepForm")
    .on("submit", "#nextStepForm", async function (event) {
      try {
        event.preventDefault();

        let inputs = new FormData($(this)[0]);
        inputs.append("clID", $(this).data("clientprocessID"));
        inputs.append("nextStepID", $("#nextStep").val());
        inputs.append("clientID", $(this).data("clientid"));
        inputs.append("processID", selectedOption.val());

        const response = await fetch(
          base_url + "/organization/Organization_controller/UpdateDocumentStep",
          {
            method: "POST",
            body: inputs,
          }
        );

        if (response.ok) {
          const info = await response.json();
          if (info.has_error) {
            showToastr(info.message, "error", 3000);
            return;
          } else {
            showToastr(info.message, "success", 3000);
            nextStepModal.hide();
          }
        } else {
          throw new Error("Failed to update Step!");
        }
      } catch (error) {}
    });
});

async function reloadCheckDocuments() {
  try {
    const response = await fetch(
      base_url +
        "/organization/Organization_controller/FetchUploadedDocumentsCards"
    );
    const info = await response.text();
    $("#check_documents").html(info);
  } catch (error) {
    console.error(error);
  }
}

async function reloadTable() {
  try {
    const response = await fetch(
      base_url +
        "/organization/Organization_controller/FetchUploadedDocumentsCards"
    );
    const info = await response.text();
    $("#uploaded_documents").html(info);
  } catch (error) {
    console.error(error);
  }
}

async function reloadDropdown() {
  try {
    const response = await fetch(
      base_url + "/organization/Organization_controller/GetProcesses"
    );
    const info = await response.text();
    $("#dropdown_process").html(info);
  } catch (error) {
    console.error(error);
  }
}
