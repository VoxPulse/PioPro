function toggleComments(id) {
  var element = document.getElementById(id);
  if (element.style.display === "none") {
    element.style.display = "block";
  } else {
    element.style.display = "none";
  }
}

function toggleMenu(element) {
  const actionsMenu = element.nextElementSibling;
  actionsMenu.style.display =
    actionsMenu.style.display === "block" ? "none" : "block";
  element.style.display = "block";
}

// Dummy functions for modify and delete
function modifyComment(commentId) {
  console.log("Modify comment with ID:", commentId);
  // Additional logic here
}

function deleteComment(commentId) {
  console.log("Delete comment with ID:", commentId);
  // Additional logic here
}
var urlParams = new URLSearchParams(window.location.search);
if (urlParams.get("showPopupComment") === "true") {
  showPopupComment();
  console.log("show");
}

function showPopupComment() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("commentForm");

  overlay.style.display = "block";
  formContainer.style.display = "block";
}
function hideConfirmationPopupComment() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("commentForm");

  overlay.style.display = "none";
  formContainer.style.display = "none";
  var originalUrl = window.location.href;
  var baseUrl = originalUrl.split("?")[0]; //  retirer les paramètres GET
  history.pushState({}, "", baseUrl);
}

document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM fully loaded and parsed");

  function validerId_user_comment(form) {
    
    var id_userInput_comment = form.querySelector("[name='form_comment_id_user']");
    var id_user_comment = id_userInput_comment.value;
    var id_userError_comment = form.querySelector(".form_comment_user_idError");

    var regex = /^\d{1,8}$/;

    if (!regex.test(id_user_comment)) {
      if (id_user_comment.length === 0) {
        id_userError_comment.innerText = "L'ID utilisateur est requis.";
      }
      else if (id_user_comment.length > 8) {
        id_userError_comment.innerText = "L'ID utilisateur ne doit pas dépasser 8 chiffres.";
      } 
      else {
        id_userError_comment.innerText = "L'ID utilisateur ne doit contenir que des chiffres.";
      }
      id_userError_comment.style.color = "red";
      id_userInput_comment.style.borderColor = "red"; // Update border color
      console.log("Validation failed for ID user.");
      return false;
    } else {
      id_userError_comment.innerText = "Correct";
      id_userError_comment.style.color = "green";
      id_userInput_comment.style.borderColor = "green"; // Update border color
      console.log("Validation passed for ID user.");
      return true;
    }
  }

  function validerContenu_comment(form) {
    var contenuInput_comment = form.querySelector("[name='form_comment_contenu']");
    var contenu_comment = contenuInput_comment.value;
    var contenuError_comment = form.querySelector(".form_comment_contenuError");

    if (contenu_comment.trim() === "") {
      contenuError_comment.innerText = "Commentaire vide!";
      contenuError_comment.style.color = "red";
      contenuInput_comment.style.borderColor = "red"; // Update border color
      console.log("Validation failed for contenu.");
      return false;
    } else {
      contenuError_comment.innerText = "Correct";
      contenuError_comment.style.color = "green";
      contenuInput_comment.style.borderColor = "green"; // Update border color
      console.log("Validation passed for contenu.");
      return true;
    }
  }

  document.body.addEventListener("submit", function (event) {
    if (event.target.matches(".commentSection form")) {
      console.log("Form submission attempted.");
      event.preventDefault();  // Prevent the default form submission

      const isUserIdValid_comment = validerId_user_comment(event.target);
      const isContentValid_comment = validerContenu_comment(event.target);

      if (!isUserIdValid_comment || !isContentValid_comment) {
        console.log("Form submission prevented due to validation errors.");
      } else {
        console.log("All validations passed. Form will be submitted naturally.");
        event.target.submit();  // Submit form programmatically if validation is successful
      }
    }
  });
});

