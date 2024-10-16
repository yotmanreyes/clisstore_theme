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
  let closePopUpBtn = document.querySelector(".close-popup");
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

  closePopUpBtn.addEventListener("click", function () {
    closePopUp();
  });

  backdrop.addEventListener("click", function () {
    closePopUp();
  });

  setTimeout(function () {
    // Function to check if the popup should be shown
    if (!getCookie("popupDisplayed")) {
      showPopup();
      setCookie("popupDisplayed", "true", 30); // Set cookie for 30 days
    }
  }, 5000);

  function showPopup() {
    popup.classList.add("is-show");
    backdrop.classList.add("is-show");
  }

  function closePopUp() {
    popup.classList.remove("is-show");
    backdrop.classList.remove("is-show");
  }

  // Function to set a cookie
  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }

  // Function to get a cookie
  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) === " ") c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }
})();
