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

function hideQuestionForm() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("questionForm");
  overlay.style.display = "none";
  formContainer.style.display = "none";
  var originalUrl = window.location.href;
  var baseUrl = originalUrl.split("?")[0]; //  retirer les paramètres GET
  history.pushState({}, "", baseUrl);
}
document.addEventListener("DOMContentLoaded", function () {
  function validateUserId() {
    const userInput = document.getElementById("form_id_user");
    const userId = userInput.value;
    const userError = document.getElementById("form_user_idError");
    const regex = /^\d{1,8}$/;

    if (!regex.test(userId)) {
      userError.style.color = "red";
      userInput.style.borderColor = "red";
      if (userId.length === 0) {
        userError.innerText = "L'ID utilisateur est requis.";
      } else if (userId.length > 8) {
        userError.innerText =
          "L'ID utilisateur ne doit pas dépasser 8 chiffres.";
      } else {
        userError.innerText =
          "L'ID utilisateur ne doit contenir que des chiffres.";
      }
      console.log("Validation failed for user ID.");
      return false;
    } else {
      userError.innerText = "Correct";
      userError.style.color = "green";
      userInput.style.borderColor = "green";
      console.log("Validation passed for user ID.");
      return true;
    }
  }

  function validateTitle() {
    const titleInput = document.getElementById("form_titre");
    const title = titleInput.value;
    const titleError = document.getElementById("form_titreError");

    if (title.trim() === "") {
      titleError.innerText = "Le titre est requis.";
      titleError.style.color = "red";
      titleInput.style.borderColor = "red";
      console.log("Validation failed for title.");
      return false;
    } else {
      titleError.innerText = "Correct";
      titleError.style.color = "green";
      titleInput.style.borderColor = "green";
      console.log("Validation passed for title.");
      return true;
    }
  }

  function validateContent() {
    const contentInput = document.getElementById("txtEditor");
    if (!contentInput) {
      console.error("Textarea element 'txtEditor' not found.");
      return false;
    }
    const content = contentInput.value;
    const contentError = document.getElementById("form_contenuError");

    if (content.trim() === "") {
      contentError.innerText = "Le contenu est requis.";
      contentError.style.color = "red";
      contentInput.style.borderColor = "red";
      console.log("Validation failed for content.");
      return false;
    } else {
      contentError.innerText = "Correct";
      contentError.style.color = "green";
      contentInput.style.borderColor = "green";
      console.log("Validation passed for content.");
      return true;
    }
  }

  const form = document.getElementById("publier");
  form.addEventListener("submit", function (event) {
    console.log("Form submission attempted.");
    const isUserIdValid = validateUserId();
    const isTitleValid = validateTitle();
    const isContentValid = validateContent();

    if (!isUserIdValid || !isTitleValid || !isContentValid) {
      console.log("Form submission prevented due to validation errors.");
      event.preventDefault(); // Stop the form from submitting
    } else {
      console.log("All validations passed. Form will be submitted naturally.");
    }
  });
});
