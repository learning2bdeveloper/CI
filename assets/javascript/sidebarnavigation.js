const hamBurger = document.querySelector(".toggle-btn");
if (hamBurger) {
  hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
  });
}
