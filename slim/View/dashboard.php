<?php
include  'C:\wamp64\www\VoxPulse\Controller\UserC.php';
$E = new UserC;
$USerList = $E->countUsers();
$UserOnline = $E->UsersOnline();
$NewUsers = $E->NouveauInscription();
$LastLogin = $E->LastLogin();
$ListUser = $E->ListUser();
$listBlock = $E->ListBlock();
$listUnBlock = $E->ListUnBlock();

$bdd = new PDO('mysql:host=localhost;dbname=piopro', 'root', '');
$allusers = $bdd->query('SELECT * FROM user ');
// RECHERCHE
if (isset($_GET['searchInput'])) {
  $Rech = htmlspecialchars($_GET['searchInput']);
  $allusers = $bdd->query('SELECT * FROM user WHERE cin LIKE "%' . $Rech . '%"  ORDER BY id ASC');
}

$bdd1 = new PDO('mysql:host=localhost;dbname=piopro', 'root', '');

if (isset($_GET['tri'])) {
  $T = $_GET['tri'];
  switch ($T) {
    case 'cin':
      $allusers = $bdd1->query('SELECT * FROM user ORDER BY cin ASC');
      break;
    case 'id':
      $allusers = $bdd1->query('SELECT * FROM user ORDER BY id ASC');
      break;
    case 'ALF':
      $allusers = $bdd1->query('SELECT * FROM user ORDER BY nom ASC');
      break;
    default:
      $allusers = $bdd1->query('SELECT * FROM user');
      break;
  }
}
$bdd2 = new PDO('mysql:host=localhost;dbname=piopro', 'root', '');
$HISTO = $bdd2->query('SELECT * FROM historique ORDER BY date_action DESC');

//SESSION 
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: sign-in.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
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
  <link rel="stylesheet" href="Style.css">
  <!-- Supprimer-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="g-sidenav-show   bg-gray-100">
  <!-- Ajoutez le lien vers jQuery si nécessaire -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Ajoutez le lien vers votre fichier JavaScript -->
  <script src="../scirpt.js"></script>
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>

      <a class="navbar-brand m-0" href="./sign-in.php" target="_blank">
        <img src="./oneschool-master/images/logo 1.png" class="navbar-brand-img h-100" alt="main_logo">

        <span class="ms-1 font-weight-bold">Pio Pro </span>
      </a>
    </div>

    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="../pages/dashboard.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tableau de bord </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./salima/dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Evénements </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/billing.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Réclamation </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./Syrine/affiche_offreEmploi.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1"> Offres d'emploi </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/rtl.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Formation</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./nour/dashboard/pages/dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Forum</span>
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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Tableau De Bord </a></li>
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
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="./assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="./assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <button onclick="redirection()" class="btn btn-danger">Déconnexion</button>
      <script>
        function redirection() {
          // Redirection vers une autre page
          window.location.href = "logout.php";
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
                      <p class="text-sm mb-0 text-uppercase font-weight-bold"><strong>Nombre Des utilisateurs</strong></p>
                      <h5 class="font-weight-bolder">
                        <?php echo $USerList; ?>
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
                      <p class="text-sm mb-0 text-uppercase font-weight-bold"><strong>Utilisateurs Enligne</strong> </p>
                      <h5 class="font-weight-bolder">
                        <?php echo $UserOnline; ?>
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
                      <p class="text-sm mb-0 text-uppercase font-weight-bold"> <strong>Nouveau Utilisateurs</strong> </p>
                      <h5 class="font-weight-bolder">
                        <?php echo  $NewUsers; ?>
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
          <div class="col-xl-3 col-sm-6">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold"> <strong>les utilisateurs qui se sont connectés aujourd'hui</strong> </p>
                      <h5 class="font-weight-bolder">
                        <?php echo $LastLogin ?>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                      <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="row mt-4">
        <div class="card z-index-2 h-100">
          <div class="card-header pb-0 pt-3 bg-transparent d-flex justify-content-between align-items-center">
            <h6 class="text-capitalize m-0"><strong>Tous Les Utilisateurs</strong></h6>
            <button id="btn-add-admin" class="btn btn-primary1">Ajouter Un Administrateur</button>
          </div>

          <div class="card-body p-3" style="max-height: 280px; overflow-y: auto;">
            <table class="table align-items-center ">
              <tbody>
                <?php echo $ListUser; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
      <div class="row mt-4">
        <div class="col-lg-6">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 style="font-weight: bold; color: red;" class="mb-2">Bloquer Les Utilisateurs</h6>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                  <?php echo $listBlock; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 style="font-weight: bold; color: red;" class="mb-2">Débloquer Les Utilisateurs</h6>
              <table class="table align-items-center ">
                <tbody>
                  <?php echo $listUnBlock; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-6">
            <div class="card">
              <form method="GET">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-2" style="font-weight: bold; color: red;">Rechercher un utilisateur par sa carte d'identité nationale</h6>
                  <div class="input-group mb-3">
                    <!-- Formulaire de recherche -->
                    <form action="" method="get">
                      <input type="text" class="form-control" id="searchInput" name="searchInput" placeholder="Entrez la carte d'identité de l'utilisateur">
                    </form>
                  </div>

                  <div class="input-group mb-3">
                    <!-- Formulaire de tri -->
                    <form action="" method="get">
                      <select class="form-control" id="tri" name="tri" onchange="this.form.submit()">
                        <option value="">Choisir un critère de tri</option>
                        <option value="id">ID</option>
                        <option value="ALF">Alphabétique</option>
                        <option value="cin">CIN</option>
                      </select>
                    </form>
                  </div>

                  <div class="table-responsive">
                    <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                      <table class="table align-items-center">
                        <tbody>
                          <?php
                          if ($allusers->rowCount() > 0) {
                          ?>
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th>Nom</th>
                                  <th>Prénom</th>
                                  <th>Date de naissance</th>
                                  <th>Tel</th>
                                  <th>Mail</th>
                                  <th>Role</th>
                                  <th>Etablissemet</th>
                                  <th>ST BLOCK</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                while ($user = $allusers->fetch()) {
                                ?>
                                  <tr>
                                    <td><?= $user['nom'] ?></td>
                                    <td><?= $user['prenom'] ?></td>
                                    <td><?= $user['date_n'] ?></td>
                                    <td><?= $user['tel'] ?></td>
                                    <td><?= $user['mail'] ?></td>
                                    <td><?= $user['role'] ?></td>
                                    <td><?= $user['etab'] ?></td>
                                    <td><?= $user['Block'] ?></td>
                                  </tr>
                                <?php
                                }
                                ?>
                              </tbody>
                            </table>
                          <?php
                          } else {
                          ?>
                            <p>Aucun utilisateur trouvé</p>
                          <?php
                          }
                          ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <form method="GET">
                <div class="card-header pb-0 pt-3 bg-transparent d-flex justify-content-between align-items-center">
                  <h6 class="mb-2" style="font-weight: bold; color: red;">Historique des Admins</h6>
                  <form action="CLEAN.php" method="post">
                    <button type="submit" class="btn btn-success">Clean</button>
                  </form>
                </div>
                <div class="input-group mb-3">
                  <!-- Formulaire de recherche -->
                </div>

                <!-- Inline style for scrollable table -->
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                  <table class="table align-items-center">
                    <tbody>
                      <?php if ($allusers->rowCount() > 0) : ?>
                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th>admin_id</th>
                              <th>type_action</th>
                              <th>description</th>
                              <th>date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php while ($HISTO1 = $HISTO->fetch()) : ?>
                              <tr>
                                <td><?= htmlspecialchars($HISTO1['admin_id']) ?></td>
                                <td><?= htmlspecialchars($HISTO1['type_action']) ?></td>
                                <td><?= htmlspecialchars($HISTO1['description']) ?></td>
                                <td><?= htmlspecialchars($HISTO1['date_action']) ?></td>
                              </tr>
                            <?php endwhile; ?>
                          </tbody>
                        </table>
                      <?php else : ?>
                        <p>Aucun historique trouvé</p>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">VoxPulse</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Vox Pulse </a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Labek-->
  <div class="slim2">
    <div class="custom-modal2">
      <div class="modal-content">
        <h5>Ajouter Un Administrateur</h5>
        <form action="ADDUSER.php" method="post" id="MYFORM2">
          <div style="display: flex;">
            <!-- Première colonne -->
            <div style="flex: 1;">
              <div style="display: flex; flex-direction: column;">
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <div id="NE" class="invalid-feedback">Le nom est invalide</div>
                  <input type="text" id="NN" name="nom1">
                </div>
                <div class="form-group">
                  <div id="PE" class="invalid-feedback">Le prenom est invalide</div>
                  <label for="prenom">Prénom:</label>
                  <input type="text" id="PP" name="prenom1">
                </div>
                <div class="form-group">
                  <label for="Date">Date de naissance:</label>
                  <div id="DE" class="invalid-feedback">La date est invalide doit etre +18</div>
                  <input type="date" id="DD" name="ddn1">
                </div>
              </div>
            </div>
            <!-- Deuxième colonne -->
            <div style="flex: 1;">
              <div style="display: flex; flex-direction: column;">
                <div class="form-group">
                  <label for="Cin1">Carte d'identité :</label>
                  <div id="CE" class="invalid-feedback">La carte d'identite invalide</div>
                  <input type="text" id="CC" name="Cin1">
                </div>
                <div class="form-group">
                  <label for="Tel">Téléphone:</label>
                  <div id="TE" class="invalid-feedback">La numero de teléphone invalide</div>
                  <input type="text" id="TT" name="Tel">
                </div>
                <div class="form-group">
                  <label for="mail1">Mail:</label>
                  <div id="EE" class="invalid-feedback">L'email est invalide</div>
                  <input type="text" id="EM" name="mail1">
                </div>
                <div class="form-group">
                  <label for="MotdePasse1">Mot de passe:</label>
                  <div id="EP" class="invalid-feedback">Le Mot de passe est invalide </div>
                  <input type="password" id="MP" name="MotdePasse1">
                </div>
                <div class="form-group">
                  <label for="TA">type_administrateur:</label>
                  <select id="TA" name="TA" class="form-control" required>
                    <option value="">--Choisissez Le Type d'administrateur--</option>
                    <option value="Forum">Forum</option>
                    <option value="Formation">Formation</option>
                    <option value="Evenement">Evenement</option>
                    <option value="ODE">Offre d'emploi</option>
                    <option value="Admin">Administrateur</option>
                    <option value="Reclam">Rèclamation</option>
                  </select>
                  <div id="DE" class="invalid-feedback">La date est invalide doit être +18</div>
                </div>
              </div>
            </div>
          </div>
          <div class="button-container">
            <button type="submit" class="btn btn-primary2 btn-Terminer">Ajouter</button>
            <button class="btn btn-danger btn-Annuler">Annuler</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- Labek-->
  <div class="slim">
    <div class="custom-modal">
      <div class="modal-content">
        <h5>Modifier</h5>
        <form action="UPDATEE.php" method="post" id="Form4">
          <div style="display: flex;">
            <!-- Première colonne -->
            <div style="flex: 1; margin-right: 20px;">
              <div class="form-group">
                <label for="id">Id:</label>
                <input type="text" id="Id" name="Id">
              </div>
              <div class="form-group">
                <label for="nom">Nom:</label>
                <div id="NI" class="invalid-feedback">Le nom est invalide </div>
                <input type="text" id="upNom" name="nom">
              </div>
              <div class="form-group">
                <label for="prenom">Prénom:</label>
                <div id="PI" class="invalid-feedback">Le Prenom est invalide </div>
                <input type="text" id="PR" name="PR">
              </div>
              <div class="form-group">
                <label for="DDN">Date de naissance:</label>
                <div id="DNI" class="invalid-feedback">La date de naissance est invalide </div>
                <input type="date" id="DDN" name="DDN">
              </div>
              <div class="form-group">
                <label for="cin">CIN:</label>
                <div id="CINI" class="invalid-feedback">La carte d'identité est invalide</div>
                <input type="text" id="cin" name="cin">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <div id="MI" class="invalid-feedback">L'email est invalide</div>
                <input type="email" id="email" name="email">
              </div>
            </div>
            <!-- Deuxième colonne -->
            <div style="flex: 1;">
              <div class="form-group">
                <label for="role">Rôle:</label>
                <select id="role" name="role">
                  <option value="Recruteur">Entreprise</option>
                  <option value="Professionel">Professionnel</option>
                  <option value="Etudiant">Etudiant</option>
                </select>
              </div>
              <div class="form-group">
                <label for="image">Image:</label>
                <div id="drop-zone" class="drop-zone">
                  <span class="drop-zone-text">Glissez et déposez l'image ici ou cliquez pour sélectionner</span>
                  <input type="file" id="image" name="image" class="drop-zone-input">
                </div>
              </div>
              <div class="form-group">
                <label for="mdp">Mot de passe :</label>
                <div id="MDI" class="invalid-feedback">Le Mot de Passe est invalide</div>
                <input type="password" id="mdp" name="mdp">
              </div>
              <div class="form-group">
                <label for="etab">Etablissement :</label>
                <div id="EI" class="invalid-feedback">L'etablissement est invalide</div>
                <input type="text" id="etab" name="etab">
              </div>
              <div class="form-group">
                <label for="tel">Tel :</label>
                <div id="TI" class="invalid-feedback">le numero est invalide</div>
                <input type="text" id="tel" name="tel">
              </div>
            </div>
          </div>
          <div class="button-container">
            <button class="btn btn-danger btn-Terminer">Terminer</button>
            <button class="btn btn-primary btn-Annuler">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="slim7">
    <div class="custom-modal7">
      <div class="modal-content">
        <h5>Confirmation</h5>
        <form action="suppression.php" method="post" id="Form4">
          <!-- Ajoute un champ de formulaire caché pour contenir l'identifiant de l'utilisateur -->
          <input type="hidden" name="id" id="userId" value="">
          <div class="confirmation-message">
            <!-- Le message de confirmation sera inséré ici par JavaScript -->
          </div>
          <hr>
          <div class="button-container">
            <button type="submit" class="btn btn-danger btn-Terminer">Terminer</button>
            <button type="button" class="btn btn-primary btn-Annuler">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script>
    function confirmDelete(button) {
      var userId = button.getAttribute('data-id');
      var prenom = button.getAttribute('data-prenom');
      var nom = button.getAttribute('data-name');
      var email = button.getAttribute('data-email');

      // Afficher la modal
      var modal = document.querySelector('.custom-modal7');
      modal.style.display = 'block';

      // Mettre à jour le formulaire de la modal avec l'ID de l'utilisateur
      var form = document.getElementById('Form4');
      form.action = '../delete_user.php?id=' + userId; // Met à jour l'action du formulaire

      // Mettre à jour le champ de formulaire caché avec l'ID de l'utilisateur
      var userIdInput = document.getElementById('userId');
      userIdInput.value = userId;

      // Mettre à jour le message de confirmation avec des détails de l'utilisateur
      var confirmationMessage = modal.querySelector('.confirmation-message');
      confirmationMessage.innerHTML = `
    <p>Êtes-vous sûr de vouloir supprimer l'utilisateur suivant ?</p>
    <p><strong>Nom:</strong> ${nom} ${prenom}</p>
    <p><strong>Email:</strong> ${email}</p>
  `;
    }

    // Fermer la modal quand on clique sur Annuler
    document.querySelector('.btn-Annuler').addEventListener('click', function() {
      var modal = document.querySelector('.custom-modal7');
      modal.style.display = 'none';
    });
  </script>




  <script>
    // Sélectionner les boutons supprimer
    var supprimerButtons = document.querySelectorAll('.btn-supprimer');

    // Sélectionner la boîte de dialogue modale et les boutons "Oui" et "Non"
    var confirmationModal = document.getElementById('confirmation-modal');
    var btnOui = document.getElementById('btn-oui');
    var btnNon = document.getElementById('btn-non');

    // Ajouter un gestionnaire d'événements à chaque bouton supprimer
    supprimerButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        var userId = button.getAttribute('data-id');
        var nomId = button.getAttribute('data-name');
        var prenomId = button.getAttribute('data-prenom');
        var mailId = button.getAttribute('data-email');

        // Afficher la boîte de dialogue modale
        confirmationModal.style.display = 'block';

        // Gérer le clic sur le bouton "Oui"
        document.addEventListener('DOMContentLoaded', function() {
          const deleteButtons = document.querySelectorAll('.btn-supprimer');

          deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
              const userId = this.getAttribute('data-id');
              const userName = this.getAttribute('data-name');
              const userEmail = this.getAttribute('data-email');

              if (confirm(`Are you sure you want to delete ${userName}?`)) {
                fetch('delete_user.php', {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${encodeURIComponent(userId)}&name=${encodeURIComponent(userName)}&email=${encodeURIComponent(userEmail)}`
                  })
                  .then(response => response.json())
                  .then(data => {
                    //alert(data.message); // Display message from server
                    location.reload(); // Reload page after delete
                  })
                  .catch(error => console.error('Error:', error));
              }
            });
          });
        });



        // Gérer le clic sur le bouton "Non"
        btnNon.addEventListener('click', function() {
          // Ne rien faire
          console.log("Suppression annulée.");
          // Cacher la boîte de dialogue modale
          confirmationModal.style.display = 'none';
        });
      });
    });
  </script>

  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["avril", "Mai", "juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>

  <!-- Supprimer--->
  <script src="./script.js"></script>
  <!-- AUTRE --->
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>

  <script src="script5.js"></script>
  <!--Recuperation -->
  <script>
    function openUpdatePopup(id, name, prenom, cin, mail, role, password, etab, tel, ddn) {
      console.log(id, name, prenom, cin, mail, role, password, etab, tel, ddn);
      document.getElementById('Id').value = id;
      document.getElementById('upNom').value = name;
      document.getElementById('PR').value = prenom;
      document.getElementById('cin').value = cin;
      document.getElementById('email').value = mail;
      document.getElementById('role').value = role;
      document.getElementById('mdp').value = password;
      document.getElementById('etab').value = etab;
      document.getElementById('tel').value = tel;
      document.getElementById('DDN').value = ddn;
      document.getElementById('slim').style.display = 'block';
    }
    // Close the update pop-up
    function closeUpdatePopup() {
      document.getElementById('slim').style.display = 'none';
    }
    // Event listener for update buttons
    document.addEventListener('DOMContentLoaded', function() {
      const updateButtons = document.querySelectorAll('.btn-update');
      updateButtons.forEach(button => {
        button.addEventListener('click', function() {
          const id = this.getAttribute('data-id');
          const name = this.getAttribute('data-name');
          const prenom = this.getAttribute('data-prenom');
          const role = this.getAttribute('data-role');
          const cin = this.getAttribute('data-cin');
          const password = this.getAttribute('data-password');
          const etab = this.getAttribute('data-etab');
          const mail = this.getAttribute('data-email');
          const tel = this.getAttribute('data-tel');
          const ddn = this.getAttribute('data-ddn');
          openUpdatePopup(id, name, prenom, cin, mail, role, password, etab, tel, ddn);
        });
      });
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {

      var myForm = document.getElementById('Form4');

      var slimOverlay = document.querySelector('.slim8');
      var modal = document.querySelector('.custom-modal8');


      //
      var nom2Input = document.getElementById('upNom');
      var prenom2Input = document.getElementById('PR');
      var Date2Input = document.getElementById('DDN');
      var Cin2Input = document.getElementById('cin');
      var Tel2Input = document.getElementById('tel');
      var Mail2Input = document.getElementById('email');
      var MDP2Input = document.getElementById('mdp');
      var ETAB = document.getElementById('etab');

      //
      var nom2Error = document.getElementById('NI');
      var prenom2Error = document.getElementById('PI');
      var Date2Error = document.getElementById('DNI');
      var Cin2Error = document.getElementById('CINI');
      var Tel2Error = document.getElementById('TI');
      var Mail2Error = document.getElementById('MI');
      var MDP2Error = document.getElementById('MDI');
      var ETABError = document.getElementById('EI');

      myForm.addEventListener('submit', function(event) {
        // Initialisation du compteur d'erreurs
        var errors = 0;
        // Ajout d'écouteurs d'événements pour chaque champ d'entrée pour la validation en temps réel
        if (!validateNom(ETAB.value)) {
          ETABError.style.display = 'block';
          errors++;
        } else {
          ETABError.style.display = 'none';
        }

        if (!validateMotDePasse(MDP2Input.value)) {
          MDP2Error.style.display = 'block';
          errors++;
        } else {
          MDP2Error.style.display = 'none';
        }

        // Événement pour le champ Nom

        // Événement pour le champ Nom
        Mail2Input.addEventListener('input', function() {
          if (!validateEmail(Mail2Input.value)) {
            Mail2Error.style.display = 'block';
            errors++;
          } else {
            Mail2Error.style.display = 'none';
          }
        });
        // Événement pour le champ Nom

        if (!validateCIN(Tel2Input.value)) {
          Tel2Error.style.display = 'block';
          errors++;
        } else {
          Tel2Error.style.display = 'none';
        }



        // Événement pour le champ Nom
        if (!validateCIN(Cin2Input.value)) {
          Cin2Error.style.display = 'block';
          errors++;
        } else {
          Cin2Error.style.display = 'none';
        }


        if (!validateNom(nom2Input.value)) {
          nom2Error.style.display = 'block';
          errors++;
        } else {
          nom2Error.style.display = 'none';
        }

        // Événement pour le champ Nom

        //prenom

        if (!validateNom(prenom2Input.value)) {
          prenom2Error.style.display = 'block';
          errors++;
        } else {
          prenom2Error.style.display = 'none';
        }


        //Date

        if (!validateAge(Date2Input.value)) {
          Date2Error.style.display = 'block';
          errors++;
        } else {
          Date2Error.style.display = 'none';
        }

        if (errors > 0) {
          event.preventDefault();
        }
      });



      // Validation du nom
      function validateNom(nom) {
        var nomRegex = /^[a-zA-Z\s]+$/;
        return nom.length > 3 && nomRegex.test(nom);
      }

      //Validation du prenom 
      function validatePrenom(prenom) {
        var nomRegex = /^[a-zA-Z\s]+$/;
        return prenom.length > 3 && nomRegex.test(prenom);
      }

      //Date
      function validateAge(date) {
        // Convertir la chaîne de date en objet Date
        var birthDate = new Date(date);

        // Obtenir la date actuelle
        var today = new Date();

        // Calculer la date il y a 18 ans
        var eighteenYearsAgo = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());

        // Comparer les dates
        return birthDate <= eighteenYearsAgo;
      }

      //CIN 
      function validateCIN(cin) {
        var cinRegex = /^[0-9]*$/;
        return cin.length === 8 && cinRegex.test(cin);
      }

      //Tel 
      function validateTel(cin) {
        var cinRegex = /^[0-9]*$/;
        return cin.length === 8 && cinRegex.test(cin);
      }

      //EMAIL 
      function validateEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
      }

      //MDP
      function validateMotDePasse(motDePasse) {
        // Expression régulière pour vérifier si le mot de passe contient au moins un caractère spécial, un chiffre et une lettre
        var regex = /^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]{8,}$/;
        return regex.test(motDePasse);
      }
    });
  </script>


  <script>
    document.addEventListener('DOMContentLoaded', function() {

      var myForm = document.getElementById('MYFORM2');
      var errors = 0; // Variable pour compter les erreurs

      // Sélection des éléments du formulaire
      var nomInput = document.getElementById('NN');
      var prenomInput = document.getElementById('PP');
      var DateInput = document.getElementById('DD');
      var CinInput = document.getElementById('CC');
      var TelInput = document.getElementById('TT');
      var MailInput = document.getElementById('EM');
      var MDPInput = document.getElementById('MP');

      // Sélection des éléments d'erreur
      var nomError = document.getElementById('NE');
      var prenomError = document.getElementById('PE');
      var DateError = document.getElementById('DE');
      var CinError = document.getElementById('CE');
      var TelError = document.getElementById('TE');
      var MailError = document.getElementById('EE');
      var MDPError = document.getElementById('EP');

      myForm.addEventListener('submit', function(event) {
        // Initialisation du compteur d'erreurs
        var errorCount = 0;

        // Validation du mot de passe
        if (!validateMotDePasse(MDPInput.value)) {
          MDPError.style.display = 'block';
          errors++;
        } else {
          MDPError.style.display = 'none';
        }

        // Validation de l'email
        if (!validateEmail(MailInput.value)) {
          MailError.style.display = 'block';
          errors++;
        } else {
          MailError.style.display = 'none';
        }

        // Validation du numéro de téléphone
        if (!validateTel(TelInput.value)) {
          TelError.style.display = 'block';
          errors++;
        } else {
          TelError.style.display = 'none';
        }

        // Validation du numéro de carte d'identité
        if (!validateCIN(CinInput.value)) {
          CinError.style.display = 'block';
          errors++;
        } else {
          CinError.style.display = 'none';
        }

        // Validation du nom
        if (!validateNom(nomInput.value)) {
          nomError.style.display = 'block';
          errors++;
        } else {
          nomError.style.display = 'none';
        }

        // Validation du prénom
        if (!validatePrenom(prenomInput.value)) {
          prenomError.style.display = 'block';
          errors++;
        } else {
          prenomError.style.display = 'none';
        }

        // Validation de la date de naissance
        if (!validateAge(DateInput.value)) {
          DateError.style.display = 'block';
          errors++;
        } else {
          DateError.style.display = 'none';
        }

        // Si le compteur d'erreurs est supérieur à 0, empêcher l'envoi du formulaire
        if (errors > 0) {
          event.preventDefault();

        }
      });

      // Validation du nom
      function validateNom(nom) {
        var nomRegex = /^[a-zA-Z\s]+$/;
        return nom.length > 3 && nomRegex.test(nom);
      }

      // Validation du prénom
      function validatePrenom(prenom) {
        var prenomRegex = /^[a-zA-Z\s]+$/;
        return prenom.length > 3 && prenomRegex.test(prenom);
      }

      // Validation de la date de naissance
      function validateAge(date) {
        // Convertir la chaîne de date en objet Date
        var birthDate = new Date(date);
        // Obtenir la date actuelle
        var today = new Date();
        // Calculer la date il y a 18 ans
        var eighteenYearsAgo = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
        // Comparer les dates
        return birthDate <= eighteenYearsAgo;
      }

      // Validation du numéro de carte d'identité
      function validateCIN(cin) {
        var cinRegex = /^[0-9]*$/;
        return cin.length === 8 && cinRegex.test(cin);
      }

      // Validation du numéro de téléphone
      function validateTel(tel) {
        var telRegex = /^[0-9]*$/;
        return tel.length === 8 && telRegex.test(tel);
      }

      // Validation de l'email
      function validateEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
      }

      // Validation du mot de passe
      function validateMotDePasse(motDePasse) {
        // Expression régulière pour vérifier si le mot de passe contient au moins un caractère spécial, un chiffre et une lettre
        var regex = /^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]{8,}$/;
        return regex.test(motDePasse);
      }
    });
  </script>


  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var dropZone = document.getElementById('drop-zone');

      dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropZone.classList.add('dragover');
      });

      dropZone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        dropZone.classList.remove('dragover');
      });

      dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropZone.classList.remove('dragover');

        var files = e.dataTransfer.files;
        handleFiles(files);
      });

      var fileInput = document.getElementById('image');
      fileInput.addEventListener('change', function(e) {
        var files = e.target.files;
        handleFiles(files);
      });

      function handleFiles(files) {
        for (var i = 0; i < files.length; i++) {
          uploadFile(files[i]);
        }
      }

      function uploadFile(file) {
        // Ici, vous pouvez écrire du code pour téléverser le fichier vers le serveur
        console.log('Fichier téléchargé:', file);
      }
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var slimOverlay = document.querySelector('.slim');
      var modal = document.querySelector('.custom-modal');


      // Ajout
      var slim2Overlay = document.querySelector('.slim2');
      var modal2 = document.querySelector('.custom-modal2');

      // Suppression
      var salimOverlay = document.querySelector('.salim');
      var modal3 = document.querySelector('.custom-modal');
      // Bloquer
      var slim3Overlay = document.querySelector('.slim3');
      var modal3 = document.querySelector('.custom-modal3');

      // Ajouter
      var AjouterButtons = document.querySelectorAll('.btn-primary1');
      AjouterButtons.forEach(function(button) {
        button.addEventListener('click', function() {
          slim2Overlay.style.display = 'flex';
          modal2.style.display = 'block';
          slim2Overlay.classList.add('blurred');
        });
      });

      // Modifier
      var modifierButtons = document.querySelectorAll('.btn-primary');
      modifierButtons.forEach(function(button) {
        button.addEventListener('click', function() {
          var userId = button.getAttribute('data-id');
          // Effectuer une requête GET vers le fichier PHP avec l'ID de l'utilisateur dans l'URL
          fetch('GETUSER.php?id=' + userId, {
            method: 'GET'
          }).then(function(response) {
            // Traitez la réponse ici si nécessaire
          }).catch(function(error) {
            console.error('Erreur lors de la requête fetch :', error);
          });
          slimOverlay.style.display = 'flex';
          modal.style.display = 'block';
          slimOverlay.classList.add('blurred');
        });
      });

      // Supprimer
      var supprimerButtons = document.querySelectorAll('.btn-supprimer');
      supprimerButtons.forEach(function(button) {
        button.addEventListener('click', function() {
          var userId = button.getAttribute('data-id');
          slim7Overlay.style.display = 'flex';
          modal27.style.display = 'block';
          slim7Overlay.classList.add('blurred');

          if (confirmation !== null) {
            var confirmationLowerCase = confirmation.toLowerCase();
            if (confirmationLowerCase === "oui") {
              fetch('../delete_user.php?id=' + userId, {
                  method: 'DELETE'
                })
                .then(function(response) {
                  location.reload(); // Recharger la page après suppression
                })
                .catch(function(error) {
                  console.error('Une erreur s\'est produite:', error);
                });
            } else if (confirmationLowerCase === "non") {
              console.log("Suppression annulée.");
            } else {

            }
          } else {
            console.log("Boîte de dialogue fermée.");
          }
        });
      });

      // Bloquer
      var Bloquer = document.querySelectorAll('.btn-primary3');
      Bloquer.forEach(function(button) {
        button.addEventListener('click', function() {
          var userId = button.getAttribute('data-id');
          // Rediriger vers une autre page avec l'ID de l'utilisateur dans l'URL
          window.location.href = 'BLOCK.php?id=' + userId;
        });
      });

      var DBloquer = document.querySelectorAll('.btn-primary4');
      DBloquer.forEach(function(button) {
        button.addEventListener('click', function() {
          var userId = button.getAttribute('data-id');
          // Rediriger vers une autre page avec l'ID de l'utilisateur dans l'URL
          window.location.href = 'DEBLOCK.php?id=' + userId;
        });
      });

      // Fonction pour activer les champs
      function activerChamps() {
        var inputs = document.querySelectorAll('input');
        var selects = document.querySelectorAll('select');

        inputs.forEach(function(input) {
          input.removeAttribute('disabled');
        });

        selects.forEach(function(select) {
          select.removeAttribute('disabled');
        });
      }
    });
  </script>

  <!--Recherche-->
  <script>
    // Fonction pour effectuer une recherche en utilisant AJAX
    function searchUser() {
      var searchInput = document.getElementById('searchInput').value; // Récupérer la valeur de l'entrée de recherche
      var xhttp = new XMLHttpRequest(); // Créer un nouvel objet XMLHttpRequest

      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Mettre à jour le contenu de la table avec les résultats de la recherche
          document.getElementById('userList').innerHTML = this.responseText;
        }
      };

      // Envoyer une requête GET au serveur avec la valeur de recherche
      xhttp.open("GET", "search_user.php?q=" + searchInput, true);
      xhttp.send();
    }

    // Ajouter un écouteur d'événement pour détecter les changements dans l'entrée de recherche
    document.getElementById('searchInput').addEventListener('input', function() {
      searchUser(); // Appeler la fonction de recherche à chaque changement dans l'entrée de recherche
    });
  </script>

  <!--Inactivité-->
  <script>
    // Délai avant la redirection en cas d'inactivité (5 minutes en millisecondes)
    var TIME_LIMIT = 30 * 60 * 1000; // 30 minutes

    var timeoutId;

    // Réinitialise le minuteur à chaque interaction
    function resetTimer() {
      clearTimeout(timeoutId);
      timeoutId = setTimeout(redirectToPage, TIME_LIMIT);
    }

    // Fonction de redirection
    function redirectToPage() {
      window.location.href = 'logout.php';
    }

    // Ajoutez les écouteurs d'événements pour la souris et le clavier
    window.onload = function() {
      document.addEventListener('mousemove', resetTimer, false);
      document.addEventListener('keypress', resetTimer, false);
      document.addEventListener('mousedown', resetTimer, false); // Capture les clics de souris
      document.addEventListener('touchstart', resetTimer, false); // Capture les interactions sur écran tactile

      // Initialiser le minuteur la première fois
      resetTimer();
    }
  </script>

</body>

</html>