AOS.init({
  duration: 800,
  easing: "slide",
  once: false,
});

jQuery(document).ready(function ($) {
  "use strict";

  var siteMenuClone = function () {
    $(".js-clone-nav").each(function () {
      var $this = $(this);
      $this
        .clone()
        .attr("class", "site-nav-wrap")
        .appendTo(".site-mobile-menu-body");
    });

    setTimeout(function () {
      var counter = 0;
      $(".site-mobile-menu .has-children").each(function () {
        var $this = $(this);

        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find(".arrow-collapse").attr({
          "data-toggle": "collapse",
          "data-target": "#collapseItem" + counter,
        });

        $this.find("> ul").attr({
          class: "collapse",
          id: "collapseItem" + counter,
        });

        counter++;
      });
    }, 1000);

    $("body").on("click", ".arrow-collapse", function (e) {
      var $this = $(this);
      if ($this.closest("li").find(".collapse").hasClass("show")) {
        $this.removeClass("active");
      } else {
        $this.addClass("active");
      }
      e.preventDefault();
    });

    $(window).resize(function () {
      var $this = $(this),
        w = $this.width();

      if (w > 768) {
        if ($("body").hasClass("offcanvas-menu")) {
          $("body").removeClass("offcanvas-menu");
        }
      }
    });

    $("body").on("click", ".js-menu-toggle", function (e) {
      var $this = $(this);
      e.preventDefault();

      if ($("body").hasClass("offcanvas-menu")) {
        $("body").removeClass("offcanvas-menu");
        $this.removeClass("active");
      } else {
        $("body").addClass("offcanvas-menu");
        $this.addClass("active");
      }
    });

    // click outisde offcanvas
    $(document).mouseup(function (e) {
      var container = $(".site-mobile-menu");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($("body").hasClass("offcanvas-menu")) {
          $("body").removeClass("offcanvas-menu");
        }
      }
    });
  };
  siteMenuClone();

  var sitePlusMinus = function () {
    $(".js-btn-minus").on("click", function (e) {
      e.preventDefault();
      if ($(this).closest(".input-group").find(".form-control").val() != 0) {
        $(this)
          .closest(".input-group")
          .find(".form-control")
          .val(
            parseInt(
              $(this).closest(".input-group").find(".form-control").val()
            ) - 1
          );
      } else {
        $(this).closest(".input-group").find(".form-control").val(parseInt(0));
      }
    });
    $(".js-btn-plus").on("click", function (e) {
      e.preventDefault();
      $(this)
        .closest(".input-group")
        .find(".form-control")
        .val(
          parseInt(
            $(this).closest(".input-group").find(".form-control").val()
          ) + 1
        );
    });
  };
  // sitePlusMinus();

  var siteSliderRange = function () {
    $("#slider-range").slider({
      range: true,
      min: 0,
      max: 500,
      values: [75, 300],
      slide: function (event, ui) {
        $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
      },
    });
    $("#amount").val(
      "$" +
        $("#slider-range").slider("values", 0) +
        " - $" +
        $("#slider-range").slider("values", 1)
    );
  };
  // siteSliderRange();

  var siteCarousel = function () {
    if ($(".nonloop-block-13").length > 0) {
      $(".nonloop-block-13").owlCarousel({
        center: false,
        items: 1,
        loop: true,
        stagePadding: 0,
        margin: 0,
        autoplay: true,
        nav: true,
        navText: [
          '<span class="icon-arrow_back">',
          '<span class="icon-arrow_forward">',
        ],
        responsive: {
          600: {
            margin: 0,
            nav: true,
            items: 2,
          },
          1000: {
            margin: 0,
            stagePadding: 0,
            nav: true,
            items: 3,
          },
          1200: {
            margin: 0,
            stagePadding: 0,
            nav: true,
            items: 4,
          },
        },
      });
    }

    if ($(".nonloop-block-14").length > 0) {
      $(".nonloop-block-14").owlCarousel({
        center: false,
        items: 1,
        loop: true,
        stagePadding: 0,
        margin: 0,
        autoplay: true,
        dots: false,
        nav: false,
        navText: [
          '<span class="icon-arrow_back">',
          '<span class="icon-arrow_forward">',
        ],
        responsive: {
          600: {
            margin: 20,
            nav: true,
            items: 2,
          },
          1000: {
            margin: 30,
            stagePadding: 20,
            nav: true,
            items: 2,
          },
          1200: {
            margin: 30,
            stagePadding: 20,
            nav: true,
            items: 3,
          },
        },
      });

      $(".customNextBtn").click(function () {
        $(".nonloop-block-14").trigger("next.owl.carousel");
      });
      $(".customPrevBtn").click(function () {
        $(".nonloop-block-14").trigger("prev.owl.carousel");
      });
    }

    $(".slide-one-item").owlCarousel({
      center: false,
      items: 1,
      loop: true,
      smartSpeed: 900,
      autoplayTimeout: 7000,
      stagePadding: 0,
      margin: 0,
      autoplay: true,
      nav: true,
      navText: [
        '<span class="icon-keyboard_arrow_left">',
        '<span class="icon-keyboard_arrow_right">',
      ],
    });

    $(".slide-one-item").on("translated.owl.carousel", function (event) {
      console.log("translated");
      $(".owl-item.active").find(".js-slide-text").addClass("active");
    });
    $(".slide-one-item").on("translate.owl.carousel", function (event) {
      console.log("translate");
      $(".owl-item.active").find(".js-slide-text").removeClass("active");
    });

    $(".owl-item.active").find(".js-slide-text").addClass("active");
  };
  siteCarousel();

  var siteStellar = function () {
    $(window).stellar({
      responsive: false,
      parallaxBackgrounds: true,
      parallaxElements: true,
      horizontalScrolling: false,
      hideDistantElements: false,
      scrollProperty: "scroll",
    });
  };
  siteStellar();

  var siteCountDown = function () {
    $("#date-countdown").countdown("2020/10/10", function (event) {
      var $this = $(this).html(
        event.strftime(
          "" +
            '<span class="countdown-block"><span class="label">%w</span> weeks </span>' +
            '<span class="countdown-block"><span class="label">%d</span> days </span>' +
            '<span class="countdown-block"><span class="label">%H</span> hr </span>' +
            '<span class="countdown-block"><span class="label">%M</span> min </span>' +
            '<span class="countdown-block"><span class="label">%S</span> sec</span>'
        )
      );
    });
  };
  siteCountDown();

  var siteDatePicker = function () {
    if ($(".datepicker").length > 0) {
      $(".datepicker").datepicker();
    }
  };
  siteDatePicker();

  var siteSticky = function () {
    $(".js-sticky-header").sticky({ topSpacing: 0 });
  };
  siteSticky();

  // navigation
  var OnePageNavigation = function () {
    var navToggler = $(".site-menu-toggle");
    $("body").on(
      "click",
      ".main-menu li a[href^='#'], .smoothscroll[href^='#'], .site-mobile-menu .site-nav-wrap li a",
      function (e) {
        e.preventDefault();

        var hash = this.hash;

        $("html, body").animate(
          {
            scrollTop: $(hash).offset().top,
          },
          600,
          "easeInOutCirc",
          function () {
            window.location.hash = hash;
          }
        );
      }
    );
  };
  OnePageNavigation();

  var siteScroll = function () {
    $(window).scroll(function () {
      var st = $(this).scrollTop();

      if (st > 100) {
        $(".js-sticky-header").addClass("shrink");
      } else {
        $(".js-sticky-header").removeClass("shrink");
      }
    });
  };
  siteScroll();
});
// Fonction pour aimer ou annuler le "J'aime" sur un statut
function toggleLike(button) {
  var likeCount = button.nextElementSibling;
  var starIcon = button.querySelector(".fa-star");

  if (button.classList.contains("liked")) {
    var currentLikes = parseInt(likeCount.textContent);
    currentLikes--;
    likeCount.textContent = currentLikes;
    button.classList.remove("liked");
    starIcon.classList.remove("liked"); // Remove 'liked' class from the star icon
  } else {
    var currentLikes = parseInt(likeCount.textContent);
    currentLikes++;
    likeCount.textContent = currentLikes;
    button.classList.add("liked");
    starIcon.classList.add("liked"); // Add 'liked' class to the star icon
  }
}

// Function to toggle the options menu
function toggleOptions(button) {
  var optionsMenu = button.nextElementSibling;
  optionsMenu.classList.toggle("show");
  // Set the display property based on the presence of the 'show' class
  if (optionsMenu.classList.contains("show")) {
    optionsMenu.style.display = "block";
  } else {
    optionsMenu.style.display = "none";
  }
  // Log the state of the options menu
  console.log("Options menu visibility:", optionsMenu.style.display);
}

function closeOptions() {
  var optionsMenu = document.querySelector(".options-menu.show");
  if (optionsMenu) {
    optionsMenu.classList.remove("show");
  }
}
// Close the menu when clicking outside of it
document.addEventListener("click", function (event) {
  var optionsMenu = document.querySelector(".options-menu");
  if (!optionsMenu.contains(event.target)) {
    closeOptions();
  }
});

var urlParams = new URLSearchParams(window.location.search);
if (urlParams.get("showQuestion") === "true") {
  showQuestionForm();
}
function showQuestionForm() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("questionForm");

  overlay.style.display = "block";
  formContainer.style.display = "block";
}
if (urlParams.get("showPopup1") === "true") {
  showPopup1();
}

function hideQuestionForm() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("questionForm");
  overlay.style.display = "none";
  formContainer.style.display = "none";
  var originalUrl = window.location.href;
  var baseUrl = originalUrl.split("?")[0]; //  retirer les paramètres GET
  history.pushState({}, "", baseUrl);
}

function showPopup1() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("questionForm1");

  overlay.style.display = "block";
  formContainer.style.display = "block";
}
function hideConfirmationPopup() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("questionForm1");

  overlay.style.display = "none";
  formContainer.style.display = "none";
  var originalUrl = window.location.href;
  var baseUrl = originalUrl.split("?")[0]; //  retirer les paramètres GET
  history.pushState({}, "", baseUrl);
}

document.addEventListener("DOMContentLoaded", function () {
  function validerId_user() {
    var id_userInput = document.getElementById("form_id_user");
    var id_user = id_userInput.value;
    var id_userError = document.getElementById("form_user_idError");

    var regex = /^\d{1,8}$/;

    if (!regex.test(id_user)) {
      if (id_user.length === 0) {
        id_userError.innerText = "L'ID utilisateur est requis.";
      } else if (id_user.length > 8) {
        id_userError.innerText =
          "L'ID utilisateur ne doit pas dépasser 8 chiffres.";
      } else {
        id_userError.innerText =
          "L'ID utilisateur ne doit contenir que des chiffres.";
      }
      id_userError.style.color = "red";
      id_userInput.style.borderColor = "red"; // Update border color
      console.log("Validation failed for ID user.");
      return false;
    } else {
      id_userError.innerText = "Correct";
      id_userError.style.color = "green";
      id_userInput.style.borderColor = "green"; // Update border color
      console.log("Validation passed for ID user.");
      return true;
    }
  }

  function validerTitre() {
    var titreInput = document.getElementById("form_titre");
    var titre = titreInput.value;
    var titreError = document.getElementById("form_titreError");

    if (titre.trim() === "") {
      titreError.innerText = "Le titre est requis.";
      titreError.style.color = "red";
      titreInput.style.borderColor = "red"; // Update border color
      console.log("Validation failed for Titre.");
      return false;
    } else {
      titreError.innerText = "Correct";
      titreError.style.color = "green";
      titreInput.style.borderColor = "green"; // Update border color
      console.log("Validation passed for Titre.");
      return true;
    }
  }

  function validerContenu() {
    var contenuInput = document.getElementById("txtEditor");
    if (!contenuInput) {
      console.error("Textarea element 'txtEditor' not found.");
      return false;
    }
    var contenu = contenuInput.value;
    var contenuError = document.getElementById("form_contenuError");

    if (contenu.trim() === "") {
      contenuError.innerText = "Le contenu est requis.";
      contenuError.style.color = "red";
      contenuInput.style.borderColor = "red"; // Update border color
      console.log("Validation failed for Contenu.");
      return false;
    } else {
      console.log("Validation passed for Contenu.");
      contenuError.innerText = "Correct";
      contenuError.style.color = "green";
      contenuInput.style.borderColor = "green";
      return true;
    }
  }

  var form = document.getElementById("publier");
  form.addEventListener("submit", function (event) {
    event.preventDefault();
    console.log("Form submission attempted.");

    // Collect validation results for all fields
    var idUserValid = validerId_user();
    var titreValid = validerTitre();
    var contenuValid = validerContenu();

    // Check if all validations pass
    if (idUserValid && titreValid && contenuValid) {
      form.submit();
      hideQuestionForm();
    } else {
      console.log("Form submission prevented due to validation errors.");
    }
  });
});
