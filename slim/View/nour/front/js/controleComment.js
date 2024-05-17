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


var urlParams = new URLSearchParams(window.location.search);
if (urlParams.get("showPopupComment") === "true") 
{
  showPopupComment();
  console.log("show");
}
function showPopupComment() 
{
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("commentForm");

  overlay.style.display = "block";
  formContainer.style.display = "block";
}
function hideConfirmationPopupComment() 
{
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("commentForm");

  overlay.style.display = "none";
  formContainer.style.display = "none";
  var originalUrl = window.location.href;
  var baseUrl = originalUrl.split("?")[0]; 
  history.pushState({}, "", baseUrl);
}
