document.addEventListener("DOMContentLoaded", async () => {
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

      const response = await fetch("client/services/Client_service/signup", {
        method: "POST",
        body: data,
      });

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
      const response = await fetch("client/services/Client_service/login", {
        method: "POST",
        body: data,
      });

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
        $("#form_login")[0].reset();
        window.location.href = "client/Client/landingpage";
      } else {
        // Handle error response
        console.error("Error submitting form:", response.statusText);
      }
    } catch (error) {
      console.error(error);
    }
  });
});
