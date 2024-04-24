var urlParams = new URLSearchParams(window.location.search);
if (urlParams.get("showPopup") === "true") {
  showPopup();
}
function showPopup() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("questionForm");

  overlay.style.display = "block";
  formContainer.style.display = "block";
}
if (urlParams.get("showPopup1") === "true") {
  showPopup1();
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
