<?php
include __DIR__ . '\..\..\Controller\entretiensC.php';
$entretiens = new EntretiensC();
if (isset($_GET['option'])) {
  $resultat = $entretiens->afficher($_GET['option']);
  $char = $_GET['option'];
} else {
  $resultat = $entretiens->afficher("id");
  $char = "id";
}
$resultat = $entretiens->afficher();
$table = '<table class="table">';
$table .= '<thead>';
$table .= '<tr>';
$table .= '<th>ID</th>';
$table .= '<th>date</th>';
$table .= '<th>heure</th>';
$table .= '<th>url</th>';
$table .= '<th>id_user</th>';
$table .= '<th>id_offre</th>';
$table .= '</tr>';
$table .= '</thead>';
$table .= '<tbody>';
foreach ($resultat as $row) {
  $table .= '<tr>';
  $table .= '<td>' . $row['id'] . '</td>';
  $table .= '<td>' . $row['date'] . '</td>';
  $table .= '<td>' . $row['heure'] . '</td>';
  $table .= '<td>' . $row['url'] . '</td>';
  $table .= '<td>' . $row['id_user'] . '</td>';
  $table .= '<td>' . $row['id_offre'] . '</td>';
  $table .= "<td > <a class='btn btn-danger btn-supprimer' href='supprimer_entretiens.php?id=" . $row['id'] . "'>suprimer</a></td>";
  $table .= "<td > <a class='btn btn-primary' href='modifier_entretiens.php?id=" . $row['id'] . "'>modifier</a></td>";
  $table .= '</tr>';
}

session_start();

if (!isset($_SESSION['user'])) {
  header('Location: sign-in.php');
  exit;
}

$A=$entretiens->ENTRET();
$B=$entretiens->ENTRET1();
$C=$entretiens->ENTRET2();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./oneschool-master/images/logo 1.png">
  <title>
    PioPro
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link rel="stylesheet" href="../Style.css">


  <!-- Supprimer-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function redirigerVersAutreFichier() {
      // Redirige vers un autre fichier
      window.location.href = "ajout_entretiensView.html";
    }
  </script>
</head>

<body class="g-sidenav-show   bg-gray-100">
  <!-- Ajoutez le lien vers jQuery si nécessaire -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>


  <!-- Ajoutez le lien vers votre fichier JavaScript -->
  <script src="../scirpt.js"></script>
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="./oneschool-master/images/logo 1.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Pio Pro </span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link disabled" href="../pages/dashboard.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-gray">Tableau de bord </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="../pages/tables.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10" ></i>
            </div>
            <span class="nav-link-text ms-1 ">Evénement </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled " href="../pages/billing.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Réclamation</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled " href="../pages/virtual-reality.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Offres d'emploi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled " href="../pages/rtl.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <!-- Application du style directement sur le span pour le griser -->
            <span class="nav-link-text ms-1" style="color: gray;">Formation</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="affiche_offreEmploi.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <!-- Application du style directement sur le span pour le griser -->
            <span class="nav-link-text ms-1" style="color: gray;">Offre d'emploi</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page"></li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0"><strong>Bonjour <?php echo htmlspecialchars($_SESSION['user']['nom']); ?> <?php echo htmlspecialchars($_SESSION['user']['prenom']); ?> </strong> </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                //LEL DECONNEXION 
              </a>
            </li>
          </ul>
        </div>
      </div>
      <button onclick="redirection()" class="btn btn-danger">Déconnexion</button>
      <script>
        function redirection() {
          // Redirection vers une autre page
          window.location.href = "../logout.php";
        }
      </script>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <form action="" method="get">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Nombre Des entretiens Emploi</p>
                      <h5 class="font-weight-bolder">
                        <?php echo $A; ?>
                      </h5>
                      <p class="mb-0">
                      </p>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">

                      <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Les entretiens demain</p>
                      <h5 class="font-weight-bolder">
                        <?php echo $B; ?>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Les entretiens qui sont en cours de preparation </p>
                      <h5 class="font-weight-bolder">
                        <?php echo  $C; ?>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                      <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent d-flex justify-content-between align-items-center">
              <h6 class="text-capitalize m-0"> Tous Les Utilisateurs</h6>
              <!-- Ajout du bouton -->
              <button class="btn btn-success" onclick="redirigerVersAutreFichier()">Ajouter Un entretiens</button>
              <button class="btn btn-success" onclick="exportToPDF()">PDF</button>
            </div>
            <div class="card-body p-3" style="max-height: 5000px; overflow-y: auto;">
              <input class="form-control" type="text" id="recherche" name="recherche">
              <select name="choix" id="choix">
                <option value="id">id</option>
                <option value="date">date</option>
                <option value="id_offre">Id offre</option>
              </select>
              <table class="table align-items-center ">

                <tbody>
                  <?php echo $table;?>
                </tbody>
              </table>
            </div>
          </div>

  </main>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var selectElement = document.getElementById("choix");
      var char = "<?php echo $char; ?>"; // Inclure la variable PHP dans le script JavaScript
      console.log(char);
      selectElement.value = char;
      selectElement.addEventListener("change", function() {
        var selectedOption = selectElement.value;
        console.log("Option sélectionnée :", selectedOption);
        var currentUrl = window.location.href;
        var url = currentUrl.split('?')[0] + "?option=" + encodeURIComponent(selectedOption);

        // Redirection vers la même page avec la variable
        window.location.href = url;
      });

      const searchInput = document.getElementById("recherche");
      const rows = document.querySelectorAll("tbody tr");

      searchInput.addEventListener("keyup", function(event) {
        const q = event.target.value.toLowerCase();
        rows.forEach((row) => {
          let found = false;
          if (selectElement.value == "id") {
            row.querySelectorAll("td:nth-child(1)").forEach((cell) => {
              if (cell.textContent.toLowerCase().includes(q)) {
                found = true;
              }
            });
          } else if (selectElement.value == "date") {
            row.querySelectorAll("td:nth-child(2)").forEach((cell) => {
              if (cell.textContent.toLowerCase().includes(q)) {
                found = true;
              }
            });
          } else if (selectElement.value == "id_offre") {
            row.querySelectorAll("td:nth-child(7)").forEach((cell) => {
              if (cell.textContent.toLowerCase().includes(q)) {
                found = true;
              }
            });
          }

          row.style.display = found ? "table-row" : "none";
        });
      });
    });
  </script>
  <script>
    function exportToPDF() {
      // Récupérer les données à exporter depuis la page HTML
      const tableContent = document.querySelector('.card-body').innerHTML;

      // Créer un nouvel objet PDF
      const doc = new jsPDF();

      // Ajouter le contenu de la table au PDF
      doc.html(tableContent, {
        callback: function(doc) {
          // Afficher ou télécharger le PDF
          doc.save('entretiens.pdf');
        }
      });
    }
  </script>

  <!-- Labek-->