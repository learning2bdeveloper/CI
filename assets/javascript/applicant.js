document.addEventListener("DOMContentLoaded", async () => {
  if (document.getElementById("table")) {
    reloadTable(); // no need mag butang await kay ga error.
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
        "../../client/services/Client_service/login",
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
        window.location.href = "landingpage";
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
        "../../create_organization/Create_organization/get_organization_info_with_pagination",
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

  // Event listener for the Dropdown recordsPerPage
  $("#rowsPerPage").on("change", async function () {
    try {
      let data = new FormData();
      data.append("recordsPerPage", this.value);
      const response = await fetch(
        "../../create_organization/Create_organization/get_organization_info_with_pagination",
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
      const response = await fetch("save_profile_pic", {
        method: "POST",
        body: data,
      });
      if (!response.ok) {
        throw new Error();
        return;
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
    const response = await fetch("save_profile", {
      method: "POST",
      body: data,
    });
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
      let url = "process?orgID=" + orgID + "&orgName=" + orgName;

      window.location.href = url;
    } catch (error) {
      console.error("Error occurred during request:", error);
    }
  });
});

async function reloadTable() {
  //C:\xampp\htdocs\kyanu_document_tracking\application\modules\create_organization\views\grid\load_organization  create_organization/grid/load_organization
  const response = await fetch(
    "../../create_organization/Create_organization/get_organization_info_with_pagination"
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
      "../../create_organization/Create_organization/search",
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
