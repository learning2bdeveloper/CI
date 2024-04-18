const hamBurger = document.querySelector(".toggle-btn");
if (hamBurger) {
  hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
  });
}
document.addEventListener("DOMContentLoaded", async () => {
  $("#client_logout").on("click", async () => {
    try {
      const response = await fetch(
        "../../client/services/Client_service/logout"
      );
      const info = await response.json();
      toastr.success(info.message, "", {
        //diri kung wla na errors

        timeOut: 2000, // Set the duration to 2000 milliseconds (2 seconds)
      });
      window.location.href = "../../client/Client/index";
    } catch (error) {
      console.error(error);
    }
  });
});
