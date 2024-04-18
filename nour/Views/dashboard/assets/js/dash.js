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
