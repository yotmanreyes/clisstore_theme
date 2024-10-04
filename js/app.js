(function () {
  let openMenuTrigger = document.querySelector(".hamburger-icon");
  let closeMenuTrigger = document.querySelector(".close-icon");
  let menu = document.querySelector(".nav-menu");

  openMenuTrigger.addEventListener("click", function () {
    document.body.classList.toggle("fixed-height");
    menu.classList.toggle("is-show");
  });
})();
