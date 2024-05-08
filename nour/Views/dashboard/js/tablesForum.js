//display pub
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
function hideConfirmationPopup() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("questionForm");

  overlay.style.display = "none";
  formContainer.style.display = "none";
  var originalUrl = window.location.href;
  var baseUrl = originalUrl.split("?")[0];
  history.pushState({}, "", baseUrl);
}

//supp pub
if (urlParams.get("showPopup1") === "true") {
  showPopup1();
}
function showPopup1() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("questionForm1");

  overlay.style.display = "block";
  formContainer.style.display = "block";
}
function hideConfirmationPopup1() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("questionForm1");

  overlay.style.display = "none";
  formContainer.style.display = "none";
  var originalUrl = window.location.href;
  var baseUrl = originalUrl.split("?")[0];
  history.pushState({}, "", baseUrl);
}

//show comment
if (urlParams.get("showPopupComment") === "true") {
  showPopupComment();
}
function showPopupComment() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("PopupComment");

  overlay.style.display = "block";
  formContainer.style.display = "block";
}
function hideConfirmationPopupComment() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("PopupComment");

  overlay.style.display = "none";
  formContainer.style.display = "none";
  var originalUrl = window.location.href;
  var baseUrl = originalUrl.split("?")[0];
  history.pushState({}, "", baseUrl);
}

//delete comment
if (urlParams.get("showPopupComment1") === "true") {
  showPopupComment1();
}
function showPopupComment1() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("PopupComment1");

  overlay.style.display = "block";
  formContainer.style.display = "block";
}
function hideConfirmationPopupComment1() {
  var overlay = document.getElementById("overlay");
  var formContainer = document.getElementById("PopupComment1");

  overlay.style.display = "none";
  formContainer.style.display = "none";
  var originalUrl = window.location.href;
  var baseUrl = originalUrl.split("?")[0]; //  retirer les paramètres GET
  history.pushState({}, "", baseUrl);
}

var myChart = null;
document.addEventListener("DOMContentLoaded", function () {
  fetch("statistiqueForum.php")
    .then((response) => response.json())
    .then((data) => {
      // Assuming data.publications and data.comments are arrays
      data.publications.sort((a, b) => new Date(a.day) - new Date(b.day));

      const ctx = document.getElementById("chart-line").getContext("2d");

      if (myChart) {
        myChart.destroy();
      }

      myChart = new Chart(ctx, {
        type: "line",
        data: {
          labels: data.publications.map((item) => item.day),
          datasets: [
            {
              label: "Nombre des Publications",
              data: data.publications.map((item) => item.count),
              borderColor: "rgb(131, 232, 0)",
              tension: 0.1,
            },
            {
              label: "Nombre des Commentaires",
              data: data.comments.map((item) => item.count),
              borderColor: "rgb(0, 44, 140)",
              tension: 0.1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                stepSize: 1,
              },
            },
          },
        },
      });
    })
    .catch((error) => console.error("Error loading the data: ", error));

  var table = document.getElementById("publicationsTable");

  table.addEventListener("click", function (event) {
    var row = event.target.closest("tr[data-pub-id]");
    if (row) {
      var pubId = row.getAttribute("data-pub-id");
      window.location.href =
        window.location.pathname + "?pub_id=" + pubId + "#commentsSection";
    }
  });
});
