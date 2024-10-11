(function () {
  let openMenuTrigger = document.querySelector(".hamburger-icon");
  let closeMenuTrigger = document.querySelector(".close-icon");
  let menu = document.querySelector(".nav-menu");
  let searchContainer = document.querySelector(".search-container");
  let shopCartContainer = document.querySelector(".shopcart-container");
  let searchBoxTrigger = document.querySelector(".search-box-trigger");
  let shopCartTrigger = document.querySelector(".shopcart-container");

  openMenuTrigger.addEventListener("click", function () {
    document.body.classList.toggle("fixed-height");
    menu.classList.toggle("is-show");
  });

  searchBoxTrigger.addEventListener("click", function () {
    searchContainer.classList.add("is-show");
  });

  shopCartTrigger.addEventListener("click", function () {
    shopCartContainer.classList.add("is-show");
  });
})();
