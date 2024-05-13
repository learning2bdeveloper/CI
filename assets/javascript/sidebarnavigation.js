document.addEventListener("DOMContentLoaded", async () => {
  const base_url = "/kyanu_document_tracking";

  $("#client_logout").on("click", async () => {
    try {
      const response = await fetch(
        base_url + "/authentication/Logout_controller/logout"
      );
      const info = await response.json();
      toastr.success(info.message, "", {
        timeOut: 2000,
      });
      window.location.href = base_url + "/client";
    } catch (error) {
      console.error(error);
    }
  });

  $("#client_dashboard").on("click", () => {
    window.location.href = base_url + "/client/dashboard";
  });

  $("#client_view_organizations").on("click", () => {
    window.location.href = base_url + "/client/organizations";
  });

  $("#client_upload_documents").on("click", () => {
    window.location.href = "upload";
  });

  $("#client_profile").on("click", () => {
    window.location.href = base_url + "/client/profile";
  });

  //admin

  $("#admin_dashboard").on("click", () => {
    window.location.href = "Index";
  });

  $("#admin_view_organization").on("click", () => {
    window.location.href = "Organization";
  });

  $("#admin_client").on("click", () => {
    window.location.href = "Clients";
  });
  ///

  ///Organization

  $("#organization_logout").on("click", async () => {
    try {
      const response = await fetch(
        base_url + "/authentication/Logout_controller/logout"
      );
      const info = await response.json();
      toastr.success(info.message, "", {
        timeOut: 2000,
      });
      window.location.href = base_url + "/organization";
    } catch (error) {
      console.error(error);
    }
  });
});
