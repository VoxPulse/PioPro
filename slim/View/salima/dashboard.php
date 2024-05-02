<?php

include 'C:\wamp64\www\VoxPulse\Controller\eventC.php';
$E = new eventC();
$P = new participationC();
$listeevent = $E->ListEvent();
$nombreEvenements = $E->countEvent();
$nextEventDate = $E->getNextEventDate();
$sommeCoutsProchainsEvenements = $E->sumEventCosts();
$nextEventLocation = $E->getNextEventLocation();
$particition = $P->ListParticipation();
//participation
$p = new participationC();
$listparticipation = $p->ListParticipation();

// tri r
$bdd = new PDO('mysql:host=localhost;dbname=piopro', 'root', '');
$allevent = $bdd->query('SELECT * FROM event ');
// RECHERCHE
if (isset($_GET['tri'])) {
    $Rech = htmlspecialchars($_GET['tri']);
    $allevent = $bdd->query('SELECT * FROM event WHERE titre LIKE "%' . $Rech . '%"  ORDER BY id ASC');
}

$bdd1 = new PDO('mysql:host=localhost;dbname=piopro', 'root', '');

// TRI
$allevent1 = $bdd1->query('SELECT * FROM event');
if (isset($_GET['tri1'])) {
    $T = $_GET['tri1'];
    if ($T == "date") {
        $allevent1 = $bdd1->query('SELECT * FROM event ORDER BY date ASC');
    } else if ($T == "id") {
        $allevent1 = $bdd1->query('SELECT * FROM event ORDER BY id ASC');
    } elseif ($T == "nbp") {
        $allevent1 = $bdd1->query('SELECT * FROM event ORDER BY nb_places ASC');
    }
}

//SELECT 
$bdd2 = new PDO('mysql:host=localhost;dbname=piopro', 'root', '');
$select = $bdd->query('SELECT * FROM event WHERE NBPD>0');

//JOINTURE  
$bdd3 = new PDO('mysql:host=localhost;dbname=piopro', 'root', '');
$JOINTURE = $bdd->query('SELECT * FROM event WHERE NBPD>0');
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
    <link rel="icon" type="image/png" href="../oneschool-master/images/logo 1.png">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <link rel="stylesheet" href="./styles.css">
    <!-- Supprimer-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="g-sidenav-show   bg-gray-100">
    <!-- Ajoutez le lien vers jQuery si nécessaire -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Ajoutez le lien vers votre fichier JavaScript -->

    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
                <img src="../oneschool-master/images/logo 1.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Pio Pro</span>
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
                    <a class="nav-link " href="../pages/tables.html">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Rôles et autorisations </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/billing.html">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Assistance et support </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/virtual-reality.html">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Authentification et sécurité </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/rtl.html">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Notifications et alertes</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="./profile.html">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
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
                    <h6 class="font-weight-bolder text-white mb-0">Tableau de bord </h6>
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
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
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
                                                <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
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
        </nav>
        <!-- End Navbar -->
        < class="container-fluid py-4">
            <form action="" method="get">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Nombre Des événements</p>
                                            <h5 class="font-weight-bolder">
                                                <?php echo $nombreEvenements; ?>
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
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">le cout des prochains événements</p>
                                            <h5 class="font-weight-bolder">
                                                <?php echo $sommeCoutsProchainsEvenements; ?>
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
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">participants pour le prochain événement </p>
                                            <h5 class="font-weight-bolder">
                                                <p>En cours</p>
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
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold"> prochain événement</p>
                                            <h5 class="font-weight-bolder">
                                                <?php echo $nextEventLocation ?>
                                                <br>
                                                <?php echo $nextEventDate ?>
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
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Nombre Des Participants</p>
                                            <h5 class="font-weight-bolder">
                                                <?php echo $nombreEvenements; ?>
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
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">le cout des paritcipants</p>
                                            <h5 class="font-weight-bolder">
                                                <?php echo $sommeCoutsProchainsEvenements; ?>
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
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">participants pour le prochain événement </p>
                                            <h5 class="font-weight-bolder">
                                                <p>En cours</p>
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
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold"> prochain événement</p>
                                            <h5 class="font-weight-bolder">
                                                <?php echo $nextEventLocation ?>
                                                <br>
                                                <?php echo $nextEventDate ?>
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
                        <h6 class="text-capitalize m-0"> Tous Les evenements</h6>
                        <button id="btn-add-admin" class="btn btn-primary1">Ajouter Un Evenement</button>
                    </div>

                    <div class="card-body p-3" style="max-height: 280px; overflow-y: auto;">
                        <table class="table" id="eventTable" class="table align-items-center ">
                            <tbody>
                                <?php echo $listeevent; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent d-flex justify-content-between align-items-center">
                        <h6 class="text-capitalize m-0"> Toutes les participations</h6>
                        <button id="btn-add-admin" class="btn btn-primary2">Ajouter Un Participant</button>
                    </div>

                    <div class="card-body p-3" style="max-height: 280px; overflow-y: auto;">
                        <table class="table align-items-center ">
                            <tbody>
                                <?php echo $listparticipation; ?>
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
                                <h6 class="mb-2" style="font-weight: bold; color: red;">Recherche par titre </h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="tri" name="tri" placeholder="Ecrivez le titre">
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center">
                                        <button type="Submit" class="btn btn-link text-dark p-0 fixed-plugin-close-button">Trier</button>
                                        <tbody>
                                            <?php
                                            if ($allevent->rowCount() > 0) {
                                            ?>
                                                <table class="table">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Titre</th>
                                                            <th>Description</th>
                                                            <th>Cout</th>
                                                            <th>Statut</th>
                                                            <th>Date</th>
                                                            <th>Lieu</th>
                                                            <th>Nombre de places</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($event = $allevent->fetch()) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $event['id'] ?></td>
                                                                <td><?= $event['titre'] ?></td>
                                                                <td><?= $event['description'] ?></td>
                                                                <td><?= $event['cout'] ?></td>
                                                                <td><?= $event['statut'] ?></td>
                                                                <td><?= $event['date'] ?></td>
                                                                <td><?= $event['lieu'] ?></td>
                                                                <td><?= $event['nb_places'] ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            <?php
                                            } else {
                                            ?>
                                                <p>Aucun evenement trouvé</p>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <form method="GET">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-2" style="font-weight: bold; color: red;">tri </h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="tri1" name="tri1" placeholder="Ecrivez la date,id ou nombre de places (nbp)  ">
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center">
                                        <button type="Submit" class="btn btn-link text-dark p-0 fixed-plugin-close-button">Trier</button>
                                        <tbody>
                                            <?php
                                            if ($allevent1->rowCount() > 0) {
                                            ?>
                                                <table class="table">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Titre</th>
                                                            <th>Description</th>
                                                            <th>Cout</th>
                                                            <th>Statut</th>
                                                            <th>Date</th>
                                                            <th>Lieu</th>
                                                            <th>Nombre de places</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($event1 = $allevent1->fetch()) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $event1['id'] ?></td>
                                                                <td><?= $event1['titre'] ?></td>
                                                                <td><?= $event1['description'] ?></td>
                                                                <td><?= $event1['cout'] ?></td>
                                                                <td><?= $event1['statut'] ?></td>
                                                                <td><?= $event1['date'] ?></td>
                                                                <td><?= $event1['lieu'] ?></td>
                                                                <td><?= $event1['nb_places'] ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            <?php
                                            } else {
                                            ?>
                                                <p>Aucun evenement trouvé</p>
                                            <?php
                                            }
                                            ?>

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
    <!-- Label aout-->
    <div class="slim2">
        <div class="custom-modal2">
            <div class="modal-content">
                <h5>Ajouter Un Evénement</h5>
                <form action="ADDEVENT.php" method="post" id="FORM5">
                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-group">
                                <div id="titreError" class="invalid-feedback">le titre doit contenir seulement des lettres!</div>
                                <label for="tit">titre:</label>
                                <input type="text" id="tit" name="tit">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description:</label>
                                <div id="descriptionError" class="invalid-feedback">la description ne peut pas contenir des lettres spéciaux!</div>
                                <input type="text" id="desc" name="desc">
                            </div>
                            <div class="form-group">
                                <div id="coutError" class="invalid-feedback">le cout peut contenir seulement des reels!</div>
                                <label for="cout">Cout:</label>
                                <input type="text" id="cout" name="cout">
                            </div>
                            <div class="form-group">
                                <label for="statut">Statut:</label>
                                <div id="statutError" class="invalid-feedback">le statut ne peut contenir que des lettres!</div>
                                <input type="text" id="statut" name="statut">
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <div id="D2Error" class="invalid-feedback">La date doit etre situer dans 10 jours ou plus !</div>
                                <input type="date" id="date" name="date">
                            </div>
                            <div class="form-group">
                                <div id="lieuError" class="invalid-feedback">le lieu ne peut contenir que des lettres et des chiffres!</div>
                                <label for="lieu">Lieu:</label>
                                <input type="text" id="lieu" name="lieu">
                            </div>
                            <div class="form-group">
                                <div id="nb_placesError" class="invalid-feedback">le nombre de place ne peut contenir que des chiffres!</div>
                                <label for="nbp">Nombre de places:</label>
                                <input type="text" id="nbp" name="nbp">
                            </div>
                        </div>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-primary3 btn-Terminer">Ajouter</button>
                        <button class="btn btn-danger btn-Annuler">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Label mod-->
    <div class="slim">
        <div class="custom-modal">
            <div class="modal-content">
                <h5>Modifier</h5>
                <form action="UPDATEEVENT.php" method="post" id="FORM4">

                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-group">
                                <label for="Id">Id:</label>
                                <input type="text" id="Id" name="Id" disabled>
                            </div>
                            <div class="form-group">
                                <label for="TIT">titre:</label>
                                <div id="titre2Error" class="invalid-feedback">le titre doit contenir seulement des lettres!</div>
                                <input type="text" id="TIT2" name="TIT">
                            </div>
                            <div class="form-group">
                                <label for="DESC">Description:</label>
                                <div id="description2Error" class="invalid-feedback">la description ne peut pas contenir des lettres spéciaux!</div>
                                <input type="text" id="DESC2" name="DESC">
                            </div>
                            <div class="form-group">
                                <label for="COUT">Cout:</label>
                                <div id="cout2Error" class="invalid-feedback">le cout peut contenir seulement des reels!</div>
                                <input type="text" id="COUT2" name="COUT">
                            </div>
                            <div class="form-group">
                                <label for="STATUT">Statut:</label>
                                <div id="statut2Error" class="invalid-feedback">le statut ne peut contenir que des lettres!</div>
                                <input type="text" id="STATUT2" name="STATUT">
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="form-group">
                                <label for="D1">Date:</label>
                                <div id="date2Error" class="invalid-feedback">La date doit etre situer dans 10 jours ou plus !</div>
                                <input type="date" id="DATE2" name="Date">
                            </div>
                            <div class="form-group">
                                <label for="L">Lieu:</label>
                                <div id="lieu2Error" class="invalid-feedback">le lieu ne peut contenir que des lettres et des chiffres!</div>
                                <input type="text" id="LIEU2" name="L">
                            </div>
                            <div class="form-group">
                                <label for="ndp">Nombre de places:</label>
                                <div id="nb_places2Error" class="invalid-feedback">le nombre de place ne peut contenir que des chiffres!</div>
                                <input type="text" id="NOMP2" name="NOMP">
                            </div>
                        </div>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-danger btn-Terminer">Terminer</button>
                        <button class="btn btn-primary btn-Annuler">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- CRUD-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Modification
            var slimOverlay = document.querySelector('.slim');
            var modal = document.querySelector('.custom-modal');


            var slim3Overlay = document.querySelector('.slim3');
            var modal3 = document.querySelector('.custom-modal3');

            //Ajout
            var slim2Overlay = document.querySelector('.slim2');
            var modal2 = document.querySelector('.custom-modal2');
            //Modification Participant
            //Ajout
            var slim4Overlay = document.querySelector('.slim4');
            var modal4 = document.querySelector('.custom-modal4');

            //Participation
            var slim5Overlay = document.querySelector('.slim5');
            var modal5 = document.querySelector('.custom-modal5');

            //modifier
            var modifierButtons = document.querySelectorAll('.btn-primary');
            modifierButtons.forEach(function(button) {
                button.addEventListener('click', function() {

                    var userId = button.getAttribute('data-id');
                    // Effectuer une requête GET vers le fichier PHP avec l'ID de l'utilisateur dans l'URL
                    fetch('GETUSER.php?id=' + userId, {
                        method: 'GET'
                    })
                    //
                    slimOverlay.style.display = 'flex';
                    modal.style.display = 'block';
                    slimOverlay.classList.add('blurred');
                    var row = button.closest('tr');
                    // Le reste de votre logique pour le bouton "Modifier"
                });
            });

            //Ajouter 
            var Ajouter = document.querySelectorAll('.btn-primary1');
            Ajouter.forEach(function(button) {
                button.addEventListener('click', function() {
                    slim2Overlay.style.display = 'flex';
                    modal2.style.display = 'block';
                    slim2Overlay.classList.add('blurred');
                    var row = button.closest('tr');
                });
            });

            //Participation 
            var Participation = document.querySelectorAll('.btn-primary5');
            Participation.forEach(function(button) {
                button.addEventListener('click', function() {
                    slim4Overlay.style.display = 'flex';
                    modal4.style.display = 'block';
                    slim4Overlay.classList.add('blurred');
                    var row = button.closest('tr');
                });
            });

            // Ajouter Participation
            var AjouterP = document.querySelectorAll('.btn-primary2');
            AjouterP.forEach(function(button) {
                button.addEventListener('click', function() {
                    slim3Overlay.style.display = 'flex';
                    modal3.style.display = 'block';
                    slim3Overlay.classList.add('blurred');
                    var row = button.closest('tr');

                });
            });
            var MODIFP = document.querySelectorAll('.btn-primary6');
            MODIFP.forEach(function(button) {
                button.addEventListener('click', function() {
                    slim5Overlay.style.display = 'flex';
                    modal5.style.display = 'block';
                    slim5Overlay.classList.add('blurred');
                    var row = button.closest('tr');

                });
            });
        });
        //Ajouter



        //Ajouter

        //Supprimer




        //try salima
        document.addEventListener("DOMContentLoaded", function() {
            //supprimer un participant
            var supprimerButtons1 = document.querySelectorAll('.btn-supprimer1');
            supprimerButtons1.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    // Empêcher le comportement par défaut du bouton
                    event.preventDefault();

                    // Récupérer l'identifiant de l'événement
                    var eventId = button.getAttribute('data-id');

                    // Afficher la boîte de confirmation
                    var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet événement ?");

                    // Si l'utilisateur confirme la suppression
                    if (confirmation) {
                        // Effectuer la requête de suppression
                        fetch('./deleteparticipant.php?id=' + eventId, {
                                method: 'DELETE'
                            })
                            .then(function(response) {
                                // Recharger la page après la suppression
                                location.reload();
                            })
                            .catch(function(error) {
                                // Gérer les erreurs
                                console.error('Une erreur s\'est produite:', error);
                            });
                    } else {
                        // Si l'utilisateur annule la suppression
                        console.log('Suppression annulée');
                        // Arrêter la propagation de l'événement pour éviter le traitement ultérieur
                        return false;
                    }
                });
            });
            //supprimer un evenement 
            var supprimerButtons = document.querySelectorAll('.btn-supprimer');
            supprimerButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    // Empêcher le comportement par défaut du bouton
                    event.preventDefault();

                    // Récupérer l'identifiant de l'événement
                    var eventId = button.getAttribute('data-id');

                    // Afficher la boîte de confirmation
                    var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet événement ?");

                    // Si l'utilisateur confirme la suppression
                    if (confirmation) {
                        // Effectuer la requête de suppression
                        fetch('./deleteEvent.php?id=' + eventId, {
                                method: 'DELETE'
                            })
                            .then(function(response) {
                                // Recharger la page après la suppression
                                location.reload();
                            })
                            .catch(function(error) {
                                // Gérer les erreurs
                                console.error('Une erreur s\'est produite:', error);
                            });
                    } else {
                        // Si l'utilisateur annule la suppression
                        console.log('Suppression annulée');
                        // Arrêter la propagation de l'événement pour éviter le traitement ultérieur
                        return false;
                    }
                });
            });
        });
    </script>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
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
        function openUpdatePopup2(id, titre, description, cout, statut, date, lieu, nbp) {
            console.log(id, titre, description, cout, statut, date, lieu, nbp);
            document.getElementById('Id').value = id;
            document.getElementById('TIT2').value = titre;
            document.getElementById('DESC2').value = description;
            document.getElementById('COUT2').value = cout;
            document.getElementById('STATUT2').value = statut;
            document.getElementById('DATE2').value = date;
            document.getElementById('LIEU2').value = lieu;
            document.getElementById('NOMP2').value = nbp;
            document.getElementById('slim').style.display = 'block';
        }
        // Close the update pop-up
        function closeUpdatePopup2() {
            document.getElementById('slim').style.display = 'none';
        }
        // Event listener for update buttons
        document.addEventListener('DOMContentLoaded', function() {
            const updateButtons = document.querySelectorAll('.btn-update');
            updateButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const titre = this.getAttribute('data-titre');
                    const description = this.getAttribute('data-description');
                    const cout = this.getAttribute('data-cout');
                    const statut = this.getAttribute('data-statut');
                    const date = this.getAttribute('data-date');
                    const lieu = this.getAttribute('data-lieu');
                    const nbp = this.getAttribute('data-nb_places');
                    openUpdatePopup2(id, titre, description, cout, statut, date, lieu, nbp);
                });
            });
        });
    </script>
    <!--LA PRIMA -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var myForm = document.getElementById('FORM4');

            //INPUT
            var titreInput = document.getElementById('TIT2');
            var DescriptionInput = document.getElementById('DESC2');
            var CoutInput = document.getElementById('COUT2');
            var StatutInput = document.getElementById('STATUT2');
            var LieuInput = document.getElementById('LIEU2');
            var DateInput = document.getElementById('DATE2');
            var NPInput = document.getElementById('NOMP2');
            //ERRORS
            var titreError = document.getElementById('titre2Error');
            var DescriptionError = document.getElementById('description2Error');
            var CoutError = document.getElementById('cout2Error');
            var StatutError = document.getElementById('statut2Error');
            var lieuError = document.getElementById('lieu2Error');
            var dateError = document.getElementById('date2Error');
            var NPError = document.getElementById('nb_places2Error');
            myForm.addEventListener('submit', function(event) {
                // Initialisation du compteur d'erreurs
                var errors = 0;
                // TITRE
                if (!validatePARAG(titreInput.value)) {
                    titreError.style.display = 'block';
                    errors++;
                } else {
                    titreError.style.display = 'none';
                }
                //DESCRIPTION 
                if (!validatePARAG(DescriptionInput.value)) {
                    DescriptionError.style.display = 'block';
                    errors++;
                } else {
                    DescriptionError.style.display = 'none';
                }
                //COUT
                if (!validateCout(CoutInput.value)) {
                    CoutError.style.display = 'block';
                    errors++;
                } else {
                    CoutError.style.display = 'none';
                }
                //STATUT
                if (!validatePARAG(StatutInput.value)) {
                    StatutError.style.display = 'block';
                    errors++;
                } else {
                    StatutError.style.display = 'none';
                }

                if (!validateDate(DateInput.value)) {
                    dateError.style.display = 'block';
                    errors++;
                } else {
                    dateError.style.display = 'none';
                }

                if (!validatePARAG2(LieuInput.value)) {
                    lieuError.style.display = 'block';
                    errors++;
                } else {
                    lieuError.style.display = 'none';
                }

                if (!nbp(NPInput.value)) {
                    NPError.style.display = 'block';
                    errors++;
                } else {
                    NPError.style.display = 'none';
                }

                if (errors > 0) {
                    event.preventDefault();
                    alert('Le formulaire contient des erreurs, veuillez les corriger.');
                }
            });

            // Validation du nom
            function validatePARAG(nom) {
                var nomRegex = /^[a-zA-Z\s]+$/;
                return nom.length > 3 && nomRegex.test(nom);
            }

            function validatePARAG2(nom) {
                var nomRegex = /^[a-zA-Z0-9\s]+$/;
                return nom.length > 3 && nomRegex.test(nom);
            }

            //Date
            function validateDate(date) {
                // Convertir la chaîne de date en objet Date
                var inputDate = new Date(date);

                // Obtenir la date d'aujourd'hui
                var today = new Date();

                // Ajouter 10 jours à la date d'aujourd'hui
                var tenDaysLater = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 10);

                // Comparer les dates
                return inputDate >= tenDaysLater;
            }

            function validateCout(cout) {
                var cinRegex = /^[0-9]*$/;
                return cout.length > 3 && cinRegex.test(cin);
            }

            function nbp(places) {
                var count = 0;
                for (var i = 0; i < places.length; i++) {
                    var place = parseInt(places[i]);
                    if (!isNaN(place) && place >= 100 && place <= 500) {
                        count++;
                    }
                }
                return count;
            }

        });
    </script>

    <!--LA SECONDA -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var myForm = document.getElementById('FORM5');

            //INPUT
            var titreInput = document.getElementById('tit');
            var DescriptionInput = document.getElementById('desc');
            var CoutInput = document.getElementById('cout');
            var StatutInput = document.getElementById('statut');
            var LieuInput = document.getElementById('lieu');
            var DateInput = document.getElementById('date');
            var NPInput = document.getElementById('nbp');
            //ERRORS
            var titreError = document.getElementById('titreError');
            var DescriptionError = document.getElementById('descriptionError');
            var CoutError = document.getElementById('coutError');
            var StatutError = document.getElementById('statutError');
            var lieuError = document.getElementById('lieuError');
            var dateError = document.getElementById('D2Error');
            var NPError = document.getElementById('nb_placesError');
            myForm.addEventListener('submit', function(event) {
                // Initialisation du compteur d'erreurs
                var errors = 0;
                // TITRE
                if (!validatePARAG(titreInput.value)) {
                    titreError.style.display = 'block';
                    errors++;
                } else {
                    titreError.style.display = 'none';
                }
                //DESCRIPTION 
                if (!validatePARAG(DescriptionInput.value)) {
                    DescriptionError.style.display = 'block';
                    errors++;
                } else {
                    DescriptionError.style.display = 'none';
                }
                //COUT
                if (!validateCout(CoutInput.value)) {
                    CoutError.style.display = 'block';
                    errors++;
                } else {
                    CoutError.style.display = 'none';
                }
                //STATUT
                if (!validatePARAG(StatutInput.value)) {
                    StatutError.style.display = 'block';
                    errors++;
                } else {
                    StatutError.style.display = 'none';
                }

                if (!validateDate(DateInput.value)) {
                    dateError.style.display = 'block';
                    errors++;
                } else {
                    dateError.style.display = 'none';
                }

                if (!validatePARAG2(LieuInput.value)) {
                    lieuError.style.display = 'block';
                    errors++;
                } else {
                    lieuError.style.display = 'none';
                }

                if (!nbp(NPInput.value)) {
                    NPError.style.display = 'block';
                    errors++;
                } else {
                    NPError.style.display = 'none';
                }

                if (errors > 0) {
                    event.preventDefault();
                    alert('Le formulaire contient des erreurs, veuillez les corriger.');
                }
            });

            // Validation du nom
            function validatePARAG(nom) {
                var nomRegex = /^[a-zA-Z\s]+$/;
                return nom.length > 3 && nomRegex.test(nom);
            }

            function validatePARAG2(nom) {
                var nomRegex = /^[a-zA-Z0-9\s]+$/;
                return nom.length > 3 && nomRegex.test(nom);
            }

            //Date
            function validateDate(date) {
                // Convertir la chaîne de date en objet Date
                var inputDate = new Date(date);

                // Obtenir la date d'aujourd'hui
                var today = new Date();

                // Ajouter 10 jours à la date d'aujourd'hui
                var tenDaysLater = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 10);

                // Comparer les dates
                return inputDate >= tenDaysLater;
            }

            function validateCout(cout) {
                var cinRegex = /^[0-9]*$/;
                return cout.length > 3 && cinRegex.test(cin);
            }

            function nbp(places) {
                var count = 0;
                for (var i = 0; i < places.length; i++) {
                    var place = parseInt(places[i]);
                    if (!isNaN(place) && place >= 100 && place <= 500) {
                        count++;
                    }
                }
                return count;
            }

        });
    </script>

    <!--LA TERZA -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var myForm = document.getElementById('FORM6');
            //INPUT
            var nomInput = document.getElementById('nom');
            var prenomInput = document.getElementById('prenom');
            var EmailInput = document.getElementById('email');
            var TelInput = document.getElementById('tel');
            var ETABInput = document.getElementById('etablissement');
            var descInput = document.getElementById('Description');
            var ID = document.getElementById('ID');
            //ERROR
            var nomError = document.getElementById('nomError');
            var prenomError = document.getElementById('prenomError');
            var EmailError = document.getElementById('emailError');
            var TelError = document.getElementById('telError');
            var ETABError = document.getElementById('etablissementError');
            var descError = document.getElementById('DescriptionError');
            var IDError = document.getElementById('IDError');

            myForm.addEventListener('submit', function(event) {
                // Initialisation du compteur d'erreurs
                var errors = 0;

                // Nom
                if (!validateNom(nomInput.value)) {
                    nomError.style.display = 'block';
                    errors++;
                } else {
                    nomError.style.display = 'none';
                }

                // Nom
                if (!validatePrenom(prenomInput.value)) {
                    prenomError.style.display = 'block';
                    errors++;
                } else {
                    prenomError.style.display = 'none';
                }
                // EMAIl
                if (!validateEmail(EmailInput.value)) {
                    EmailError.style.display = 'block';
                    errors++;
                } else {
                    EmailError.style.display = 'none';
                }
                // Tel
                if (!validateTel(TelInput.value)) {
                    TelError.style.display = 'block';
                    errors++;
                } else {
                    TelError.style.display = 'none';
                }

                // Etab
                if (!validatePARAG2(ETABInput.value)) {
                    ETABError.style.display = 'block';
                    errors++;
                } else {
                    ETABError.style.display = 'none';
                }
                // Desc
                if (!validatePARAG2(descInput.value)) {
                    descError.style.display = 'block';
                    errors++;
                } else {
                    descError.style.display = 'none';
                }
                // ID_EVENT
                if (!validateID(ID.value)) {
                    IDError.style.display = 'block';
                    errors++;
                } else {
                    IDError.style.display = 'none';
                }

                if (errors > 0) {
                    event.preventDefault();
                    alert('Le formulaire contient des erreurs, veuillez les corriger.');
                }
            });


            function validatePARAG2(nom) {
                var nomRegex = /^[a-zA-Z0-9\s]+$/;
                return nom.length > 3 && nomRegex.test(nom);
            }

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


            function validateID(cin) {
                var cinRegex = /^[0-9]*$/;
                return cin.length > 0 && cinRegex.test(cin);
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

        });
    </script>

    <!--LA QUARTA -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var myForm = document.getElementById('FORM7');
            //INPUT
            var nomInput = document.getElementById('NOM');
            var prenomInput = document.getElementById('PRENOM');
            var EmailInput = document.getElementById('EMAIL');
            var TelInput = document.getElementById('TEL');
            var ETABInput = document.getElementById('ETABLISSEMENT');
            var descInput = document.getElementById('description');
            var ID = document.getElementById('Id_Event');
            //ERROR
            var nomError = document.getElementById('nom2Error');
            var prenomError = document.getElementById('prenom2Error');
            var EmailError = document.getElementById('email2Error');
            var TelError = document.getElementById('tel2Error');
            var ETABError = document.getElementById('etablissement2Error');
            var descError = document.getElementById('description2Error');
            var IDError = document.getElementById('Id_Event2Error');

            myForm.addEventListener('submit', function(event) {
                // Initialisation du compteur d'erreurs
                var errors = 0;

                // Nom
                if (!validateNom(nomInput.value)) {
                    nomError.style.display = 'block';
                    errors++;
                } else {
                    nomError.style.display = 'none';
                }

                // Nom
                if (!validatePrenom(prenomInput.value)) {
                    prenomError.style.display = 'block';
                    errors++;
                } else {
                    prenomError.style.display = 'none';
                }
                // EMAIl
                if (!validateEmail(EmailInput.value)) {
                    EmailError.style.display = 'block';
                    errors++;
                } else {
                    EmailError.style.display = 'none';
                }
                // Tel
                if (!validateTel(TelInput.value)) {
                    TelError.style.display = 'block';
                    errors++;
                } else {
                    TelError.style.display = 'none';
                }

                // Etab
                if (!validatePARAG2(ETABInput.value)) {
                    ETABError.style.display = 'block';
                    errors++;
                } else {
                    ETABError.style.display = 'none';
                }
                // Desc
                if (!validatePARAG2(descInput.value)) {
                    descError.style.display = 'block';
                    errors++;
                } else {
                    descError.style.display = 'none';
                }
                // ID_EVENT
                if (!validateID(ID.value)) {
                    IDError.style.display = 'block';
                    errors++;
                } else {
                    IDError.style.display = 'none';
                }

                if (errors > 0) {
                    event.preventDefault();
                    alert('Le formulaire contient des erreurs, veuillez les corriger.');
                }
            });


            function validatePARAG2(nom) {
                var nomRegex = /^[a-zA-Z0-9\s]+$/;
                return nom.length > 3 && nomRegex.test(nom);
            }

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


            function validateID(cin) {
                var cinRegex = /^[0-9]*$/;
                return cin.length > 0 && cinRegex.test(cin);
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

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Sélection des éléments du formulaire (ajout)
            var titreInput = document.getElementById('tit');
            var descriptionInput = document.getElementById('desc');
            var coutInput = document.getElementById('cout');
            var dateInput = document.getElementById('date');
            var lieuInput = document.getElementById('lieu');
            var statutInput = document.getElementById('statut');
            var nbPlacesInput = document.getElementById('nbp');


            // Sélection des éléments d'erreur(ajout)
            var titreError = document.getElementById('titreError');
            var descriptionError = document.getElementById('descriptionError');
            var dateError = document.getElementById('dateError');
            var coutError = document.getElementById('coutError');
            var lieuError = document.getElementById('lieuError');
            var statutError = document.getElementById('statutError');
            var nbPlacesError = document.getElementById('nb_placesError');




            titre2Input.addEventListener('input', function() {
                if (!validateTitre(titre2Input.value)) {
                    titre2Error.style.display = 'block';
                } else {
                    titre2Error.style.display = 'none';
                }
            });


            // Sélection des éléments d'erreur(ajout)
            var titreError = document.getElementById('titreError');
            var titre2Error = document.getElementById('titre2Error');

            var descriptionError = document.getElementById('descriptionError');
            var dateError = document.getElementById('dateError');
            var coutError = document.getElementById('coutError');
            var lieuError = document.getElementById('lieuError');
            var statutError = document.getElementById('statutError');
            var nbPlacesError = document.getElementById('nb_placesError');

            titre2Input.addEventListener('input', function() {
                if (!validateTitre(titre2Input.value)) {
                    titre2Error.style.display = 'block';
                } else {
                    titre2Error.style.display = 'none';
                }
            });



            //

            // Événement pour le champ Titre
            titreInput.addEventListener('input', function() {
                if (!validateTitre(titreInput.value)) {
                    titreError.style.display = 'block';
                } else {
                    titreError.style.display = 'none';
                }
            });

            // Événement pour le champ Description
            description2Input.addEventListener('input', function() {
                if (!validateDescription(description2Input.value)) {
                    description2Error.style.display = 'block';
                } else {
                    description2Error.style.display = 'none';
                }
            });
            descriptionInput.addEventListener('input', function() {
                if (!validateDescription(descriptionInput.value)) {
                    descriptionError.style.display = 'block';
                } else {
                    descriptionError.style.display = 'none';
                }
            });
            date2Input.addEventListener('input', function() {
                if (!validateDate(date2Input.value)) {
                    date2Error.style.display = 'block';
                } else {
                    date2Error.style.display = 'none';
                }
            });
            // Événement pour le champ Date
            dateInput.addEventListener('input', function() {
                if (!validateDate(dateInput.value)) {
                    dateError.style.display = 'block';
                } else {
                    dateError.style.display = 'none';
                }
            });

            // Événement pour le champ Lieu
            lieu2Input.addEventListener('input', function() {
                if (!validateLieu(lieu2Input.value)) {
                    lieu2Error.style.display = 'block';
                } else {
                    lieu2Error.style.display = 'none';
                }
            });
            // Événement pour le champ Lieu
            lieuInput.addEventListener('input', function() {
                if (!validateLieu(lieuInput.value)) {
                    lieuError.style.display = 'block';
                } else {
                    lieuError.style.display = 'none';
                }
            });

            // Événement pour le champ Statut
            statut2Input.addEventListener('input', function() {
                if (!validateStatut(statut2Input.value)) {
                    statut2Error.style.display = 'block';
                } else {
                    statut2Error.style.display = 'none';
                }
            });
            // Événement pour le champ Statut
            statutInput.addEventListener('input', function() {
                if (!validateStatut(statutInput.value)) {
                    statutError.style.display = 'block';
                } else {
                    statutError.style.display = 'none';
                }
            });
            // Événement pour le champ cout
            cout2Input.addEventListener('input', function() {
                if (!validateCout(cout2Input.value)) {
                    cout2Error.style.display = 'block';
                } else {
                    cout2Error.style.display = 'none';
                }
            });
            // Événement pour le champ cout
            coutInput.addEventListener('input', function() {
                if (!validateCout(coutInput.value)) {
                    coutError.style.display = 'block';
                } else {
                    coutError.style.display = 'none';
                }
            });
            // Événement pour le champ Nombre de places
            nbPlaces2Input.addEventListener('input', function() {
                if (!validateNbPlaces(nbPlaces2Input.value)) {
                    nbPlaces2Error.style.display = 'block';
                } else {
                    nbPlaces2Error.style.display = 'none';
                }
            });
            // Événement pour le champ Nombre de places
            nbPlacesInput.addEventListener('input', function() {
                if (!validateNbPlaces(nbPlacesInput.value)) {
                    nbPlacesError.style.display = 'block';
                } else {
                    nbPlacesError.style.display = 'none';
                }
            });



            //LES FONCTION

            // Validation du Titre
            function validateTitre(titre) {
                // Expression régulière pour valider le titre (que des lettres)
                var titreRegex = /^[a-zA-Z\s]+$/;

                // Vérification si le champ est rempli et contient uniquement des lettres
                return titre.trim() !== '' && titreRegex.test(titre);
            }

            // Validation de la Description
            function validateDescription(description) {
                // Expression régulière pour valider la description (pas de caractères spéciaux)
                var descriptionRegex = /^[a-zA-Z0-9\s]+$/;
                return descriptionRegex.test(description);
            }

            // Validation de la Date
            function validateDate(date) {
                // Expression régulière pour valider la date (pas de caractères spéciaux)
                var dateRegex = /^[a-zA-Z0-9\s]+$/;
                return dateRegex.test(date);
            }

            // Validation du Lieu
            function validateLieu(lieu) {
                // Expression régulière pour valider le lieu (lettres et chiffres)
                var lieuRegex = /^[a-zA-Z0-9\s]+$/;
                return lieuRegex.test(lieu);
            }

            // Validation du Nombre de places
            function validateNbPlaces(nbPlaces) {
                // Vérifier si le nombre de places est un nombre entier et inférieur ou égal à 400
                var nbPlacesInt = parseInt(nbPlaces);
                return !isNaN(nbPlacesInt) && /^[0-9]+$/.test(nbPlaces);
            }
            // Validation du Statut
            function validateStatut(statut) {
                // Expression régulière pour valider le statut (que des lettres)
                var statutRegex = /^[a-zA-Z\s]+$/;

                // Vérification si le champ est rempli et contient uniquement des lettres
                return statut.trim() !== '' && statutRegex.test(statut);
            }
            // Validation du Coût
            function validateCout(cout) {
                // Expression régulière pour valider uniquement des chiffres
                var coutRegex = /^[0-9]+$/;
                return coutRegex.test(cout);
            }
        });
    </script>

    <Script>
        document.addEventListener("DOMContentLoaded", function() {
            var supprimerButtons = document.querySelectorAll('.btn-supprimer');
            supprimerButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    // Empêcher le comportement par défaut du bouton
                    event.preventDefault();

                    // Récupérer l'identifiant de l'événement
                    var eventId = button.getAttribute('data-id');

                    // Afficher la boîte de confirmation
                    var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet événement ?");

                    // Si l'utilisateur confirme la suppression
                    if (confirmation) {
                        // Effectuer la requête de suppression
                        fetch('deleteEvent.php?id=' + eventId, {
                                method: 'DELETE'
                            })
                            .then(function(response) {
                                // Recharger la page après la suppression
                                location.reload();
                            })
                            .catch(function(error) {
                                // Gérer les erreurs
                                console.error('Une erreur s\'est produite:', error);
                            });
                    } else {
                        // Si l'utilisateur annule la suppression
                        console.log('Suppression annulée');
                        // Arrêter la propagation de l'événement pour éviter le traitement ultérieur
                        return false;
                    }
                });
            });
        });
    </Script>

    <!-- Open Popup-->
    <script>
        function openUpdatePopup(id, nom, prenom, email, tel, etab, desc, idev) {
            console.log(id, nom, prenom, email, tel, etab, desc, idev);

            console.log(id, nom, prenom, email, tel, etab, desc, idev);
            document.getElementById('IDD').value = id;
            document.getElementById('NOM').value = nom;
            document.getElementById('PRENOM').value = prenom;
            document.getElementById('EMAIL').value = email;
            document.getElementById('TEL').value = tel;
            document.getElementById('ETABLISSEMENT').value = etab;
            document.getElementById('description').value = desc; // Mise à jour de la valeur du champ Description
            document.getElementById('Id_Event').value = idev; // Mise à jour de la valeur du champ ID
            // Supposons que vous voulez afficher le formulaire lorsque vous cliquez sur Modifier
            document.getElementById('slim4').style.display = 'block';
        }


        // Event listener for update buttons
        document.addEventListener('DOMContentLoaded', function() {
            const updateButtons1 = document.querySelectorAll('.btn-primary6');
            updateButtons1.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const nom = this.getAttribute('data-nom');
                    const prenom = this.getAttribute('data-prenom');
                    const email = this.getAttribute('data-email');
                    const tel = this.getAttribute('data-tel');
                    const etab = this.getAttribute('data-etab');
                    const desc = this.getAttribute('data-desc');
                    const idev = this.getAttribute('data_eventID');
                    openUpdatePopup(id, nom, prenom, email, tel, etab, desc, idev);
                });
            });
        });
    </script>


    <!-- Ajouter Une participation Modal -->
    <div class="slim3">
        <div class="custom-modal3">
            <div class="modal-content">
                <h5>Ajouter Une participation</h5>
                <form action="AddParticipation.php" method="post" id="FORM6">
                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <div id="nomError" class="invalid-feedback">Le nom doit contenir seulement des lettres!</div>
                                <input type="text" id="nom" name="nom">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prenom:</label>
                                <div id="prenomError" class="invalid-feedback">Le prenom doit contenir seulement des lettres!</div>
                                <input type="text" id="prenom" name="prenom">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <div id="emailError" class="invalid-feedback">Vous devez respecter la forme des emails!</div>
                                <input type="text" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="tel">Tel:</label>
                                <div id="telError" class="invalid-feedback">Le numero de telephone doit contenir seulement des chiffres!</div>
                                <input type="text" id="tel" name="tel">
                            </div>
                            <div class="form-group">
                                <label for="etablissement">Etablissement</label>
                                <div id="etablissementError" class="invalid-feedback">L'etablissement ne doit pas contenir des caracteres speciaux!</div>
                                <input type="text" id="etablissement" name="etablissement">
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <div id="DescriptionError" class="invalid-feedback">La Description ne doit pas contenir des caracteres speciaux!</div>
                                <input type="text" id="Description" name="Description">
                            </div>
                            <div class="form-group">
                                <label for="ID">ID event de participation</label>
                                <div id="IDError" class="invalid-feedback">L'ID ne doit pas contenir des caracteres speciaux!</div>
                                <select name="ID" id="ID">
                                    <?php
                                    // Boucle à travers les résultats de la requête SQL
                                    if ($select->rowCount() > 0) {
                                        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row["id"] . "'>" . $row["titre"] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>Aucun résultat</option>";
                                    }
                                    ?>
                                </select>
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
    <!--Script decrementation -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#ID').change(function() {
                var selectedID = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'update_nombre_de_place.php',
                    data: {
                        id: selectedID
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>

    <!-- Modifier Modal -->
    <div class="slim4">
        <div class="custom-modal4">
            <div class="modal-content">
                <h5>Les Participants</h5>
                <div id="participantsList">
                    <!-- Les participants seront affichés ici -->
                </div>
            </div>
        </div>
    </div>
        <!-- Modifier Modal -->
        <div class="slim5">
        <div class="custom-modal5">
            <div class="modal-content">
                <h5>Modifier Participation</h5>
                <form action="UpdateParticipation.php" method="post" id="FORM7">
                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-group">
                                <label for="Id">Id:</label>
                                <input type="text" id="IDD" name="IDD" disabled>
                            </div>
                            <div class="form-group">
                                <label for="NOM">Nom:</label>
                                <div id="nom2Error" class="invalid-feedback">Le nom doit contenir que des lettres!</div>
                                <input type="text" id="NOM" name="NOM">
                            </div>
                            <div class="form-group">
                                <label for="PRENOM">Prenom:</label>
                                <div id="prenom2Error" class="invalid-feedback">Le prénom doit contenir que des lettres!</div>
                                <input type="text" id="PRENOM" name="PRENOM">
                            </div>
                            <div class="form-group">
                                <label for="EMAIL">Email:</label>
                                <div id="email2Error" class="invalid-feedback">L'email doit respecter la forme des emails!</div>
                                <input type="text" id="EMAIL" name="EMAIL">
                            </div>
                            <div class="form-group">
                                <label for="TEL">Tel:</label>
                                <div id="tel2Error" class="invalid-feedback">Le numéro de téléphone doit contenir seulement des chiffres!</div>
                                <input type="text" id="TEL" name="TEL">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ETABLISSEMENT">Etablissement:</label>
                        <div id="etablissement2Error" class="invalid-feedback">L'établissement ne doit pas contenir des caractères spéciaux!</div>
                        <input type="text" id="ETABLISSEMENT" name="ETABLISSEMENT">
                    </div>
                    <div class="form-group">
                        <label for="description">description:</label>
                        <div id="description2Error" class="invalid-feedback">La description doit contenir que des lettres </div>
                        <input type="text" id="description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="Id_Event">Id_Event:</label>
                        <div id="Id_Event2Error" class="invalid-feedback">Le numéro de téléphone doit contenir seulement des chiffres!</div>
                        <input type="text" id="Id_Event" name="Id_Event">
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-danger btn-Terminer">Terminer</button>
                        <button class="btn btn-primary btn-Annuler">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Gestionnaire d'événements clic sur le bouton "Participant"
$('.btn-primary5').on('click', function() {
    // Récupérez l'ID de l'événement à partir de l'attribut data-id du bouton
    var eventId = $(this).data('id');

    // Envoyez une requête AJAX pour récupérer les participants de cet événement
    $.ajax({
        type: 'POST',
        url: 'get_participants.php',
        data: { eventId: eventId },
        success: function(response) {
            // Affichez les participants dans la modalité
            $('#participantsList').html(response);
        }
    });
});


    </script>
</body>

</html>