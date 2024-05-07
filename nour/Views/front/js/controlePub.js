var urlParams = new URLSearchParams(window.location.search);
if (urlParams.get("showQuestion") === "true") {
  showQuestionForm();
}
function showQuestionForm() 
{
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("questionForm");

  overlay.style.display = "block";
  formContainer.style.display = "block";
}
function hideQuestionForm() 
{
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("questionForm");
  overlay.style.display = "none";
  formContainer.style.display = "none";
  var originalUrl = window.location.href;
  var baseUrl = originalUrl.split("?")[0]; //  retirer les paramètres GET
  history.pushState({}, "", baseUrl);
}
document.addEventListener("DOMContentLoaded", function () 
{
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
  function analyzeText(text) {
    const apiKey = 'AIzaSyCjbYiFLMQM3IAe2m1AUp_JXuXfUy17Bag'; // Be cautious with exposing API keys!
    const url = 'https://commentanalyzer.googleapis.com/v1alpha1/comments:analyze?key=' + apiKey;
  
    const data = {
      comment: { text: text },
      requestedAttributes: { TOXICITY: {} }
    };
  
    return fetch(url, {
      method: 'POST',
      body: JSON.stringify(data),
      headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
      console.log(data);
      if (data.attributeScores && data.attributeScores.TOXICITY) {
        const toxicityScore = data.attributeScores.TOXICITY.summaryScore.value;
        document.getElementById('form_contenuError').textContent = 'Toxicity score: ' + toxicityScore;
        return toxicityScore; // Return the score for further processing
      } else {
        throw new Error("Failed to get toxicity score.");
      }
    })
    .catch(error => {
      console.error('Error:', error);
      document.getElementById('form_contenuError').textContent = 'Error analyzing text.';
      throw error; // Rethrow after handling to let the caller know
    });
  }
  
  async function validateContent() {
    const contentInput = document.getElementById("txtEditor");
    const contentError = document.getElementById("form_contenuError");

    if (!contentInput) {
      console.error("Textarea element 'txtEditor' not found.");
      return false;
    }

    const content = contentInput.value;
    if (content.trim() === "") {
      contentError.innerText = "Le contenu est requis.";
      contentError.style.color = "red";
      contentInput.style.borderColor = "red";
      console.log("Validation failed for content.");
      return false;
    }

    try {
      const toxicityScore = await analyzeText(content);
      if (toxicityScore > 0.8) {
        contentError.innerText = "Le contenu est jugé toxique.";
        contentError.style.color = "red";
        contentInput.style.borderColor = "red";
        console.log("Content determined to be toxic.");
        return false;
      } else {
        contentError.innerText = "Contenu accepté.";
        contentError.style.color = "green";
        contentInput.style.borderColor = "green";
        console.log("Content passed toxicity check.");
        return true;
      }
    } catch (error) {
      console.error("Failed to analyze toxicity:", error);
      return false;
    }
  }

  const form = document.getElementById("publier");
  form.addEventListener("submit", async function (event) {
    event.preventDefault();
    console.log("Form submission attempted.");
    const isUserIdValid = validateUserId();
    const isTitleValid = validateTitle();
    const isContentValid = await validateContent();

    if (!isUserIdValid || !isTitleValid || !isContentValid) {
      console.log("Form submission prevented due to validation errors.");
    } else {
      console.log("All validations passed. Form will be submitted naturally.");
      form.submit(); // Manually trigger the form submission if all checks are passed
    }
  });
});