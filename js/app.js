(function () {
  let openMenuTrigger = document.querySelector(".hamburger-icon");
  let closeMenuTrigger = document.querySelector(".close-icon");
  let menu = document.querySelector(".nav-menu");

  openMenuTrigger.addEventListener("click", function () {
    menu.classList.toggle("is-show");
  });
})();
