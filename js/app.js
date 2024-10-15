(function () {
  let openMenuTrigger = document.querySelector(".hamburger-icon");
  let closeMenuTrigger = document.querySelector(".close-icon");
  let menu = document.querySelector(".nav-menu");
  let searchContainer = document.querySelector(".search-container");
  let shopCartContainer = document.querySelector(".shopcart-container");
  let searchBoxTrigger = document.querySelector(".search-box-trigger");
  let shopCartTrigger = document.querySelector(".shopcart-trigger");
  let searchBoxCloseBtn = document.querySelector(".close-searchbox");
  let shopCartCloseBtn = document.querySelector(".close-shopcart");
  let closePopUp = document.querySelector(".close-popup");
  let backdrop = document.querySelector(".backdrop");
  let popup = document.querySelector(".popup");

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

  searchBoxCloseBtn.addEventListener("click", function () {
    searchContainer.classList.remove("is-show");
  });

  shopCartCloseBtn.addEventListener("click", function () {
    shopCartContainer.classList.remove("is-show");
  });

  closePopUp.addEventListener("click", function () {
    popup.classList.remove("is-show");
    backdrop.classList.remove("is-show");
  });

  setTimeout(function () {
    showPopup();
  }, 5000);

  function showPopup() {
    popup.classList.add("is-show");
    backdrop.classList.add("is-show");
  }
})();
