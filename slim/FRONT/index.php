
<?php
include 'C:\wamp64\www\VoxPulse\Controller\eventC.php';

$n=new eventC();
$list1=$n->ListEv();

//SELECT 


$bdd = new PDO('mysql:host=localhost;dbname=piopro', 'root', '');
$select = $bdd->query('SELECT * FROM event WHERE NBPD>0');

session_start();

if (!isset($_SESSION['user'])) {
  header('Location: sign-in.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5GF7-lMCCPrMtNWpc1x6LJQvyxh6IPOk&callback=initMap" async defer></script>
    <style>
        /* Définir une taille pour la carte */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
  <title>PioPro-Acceuil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

  <link rel="icon" type="image/png" href="./images/logo 1.png">
  <script>
        // Fonction d'initialisation de la carte
        function initMap() {
            // Création d'une nouvelle carte Google Maps
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15, // Zoom par défaut
                mapTypeControl: true,
                streetViewControl: true,
                fullscreenControl: true
            });

            // Essayer d'obtenir la position actuelle de l'utilisateur
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userCoords = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(userCoords);
                }, function() {
                    // Gérer les erreurs de géolocalisation
                    handleLocationError(true, map.getCenter());
                });
            } else {
                // Le navigateur ne prend pas en charge la géolocalisation
                handleLocationError(false, map.getCenter());
            }

            // Création d'un marqueur pour marquer l'ESPRIT Tunisia sur la carte
            var espirtMarker = new google.maps.Marker({
                position: { lat: 36.899345262092005, lng: 10.189394119430952 },
                map: map,
                title: 'ESPRIT Tunisia',
                icon: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png' // Utilisation d'un marqueur personnalisé
            });

            // Ajouter une info-bulle à l'ESPRIT Tunisia
            var infowindow = new google.maps.InfoWindow({
                content: '<strong>ESPRIT Tunisia</strong><br>ESPRIT Tunisia'
            });
            espirtMarker.addListener('click', function() {
                infowindow.open(map, espirtMarker);
            });
        }
        function reinitMap(lat, lng) {
            // Création d'une nouvelle carte Google Maps
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15, // Zoom par défaut
                mapTypeControl: true,
                streetViewControl: true,
                fullscreenControl: true
            });

            // Essayer d'obtenir la position actuelle de l'utilisateur
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userCoords = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(userCoords);
                }, function() {
                    // Gérer les erreurs de géolocalisation
                    handleLocationError(true, map.getCenter());
                });
            } else {
                // Le navigateur ne prend pas en charge la géolocalisation
                handleLocationError(false, map.getCenter());
            }

            // Création d'un marqueur pour marquer l'ESPRIT Tunisia sur la carte
            var espirtMarker = new google.maps.Marker({
                position: { lat: lat, lng: lng},
                map: map,
                title: 'ESPRIT Tunisia',
                icon: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png' // Utilisation d'un marqueur personnalisé
            });

            // Ajouter une info-bulle à l'ESPRIT Tunisia
            var infowindow = new google.maps.InfoWindow({
                content: '<strong>ESPRIT Tunisia</strong><br>ESPRIT Tunisia'
            });
            espirtMarker.addListener('click', function() {
                infowindow.open(map, espirtMarker);
            });
        }
        // Fonction pour gérer les erreurs de géolocalisation
        function handleLocationError(browserHasGeolocation, coords) {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: coords,
                zoom: 15
            });
            var infoWindow = new google.maps.InfoWindow({
                content: browserHasGeolocation ?
                    "Erreur: Le service de géolocalisation a échoué." :
                    "Erreur: Votre navigateur ne prend pas en charge la géolocalisation."
            });
            var userMarker = new google.maps.Marker({ position: coords, map: map });
            infoWindow.open(map);
        }
    </script>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <img src="./images/logo 1.png" alt="Description de votre image" width="50" height="50" style="margin-right: 10px;">
            <div class="site-logo mr-auto"><a href="index.html" style="color: chartreuse;">PioPro</a></div>
          </div>

          <div class="mx-auto text-center" style="max-width: 2000px;">
            <nav class="site-navigation position-relative text-left" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block m-0 p-0 text-center"> <!-- Ajouter la classe text-center ici -->
                <li><a href="#home-section" class="nav-link" style="color: chartreuse;">Home</a></li>
                <li><a href="#programs-section" class="nav-link" style="color: chartreuse;">Ressources</a></li>
                <li><a href="../View/nour/front/index1.php" class="nav-link" style="color: chartreuse;">Communauté</a></li>
                <li><a href="../View/Syrine/oneschool-master/index1.php" class="nav-link" style="color: chartreuse;">Emploi</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="../View/sign-in.php" class="nav-link" style="color: chartreuse;"><span>Connexion</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
    </header>



    <div class="intro-section" id="home-section">

      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1 data-aos="fade-up" data-aos-delay="100">Bienvenue !</h1>
                  <p class="mb-4" data-aos="fade-up" data-aos-delay="200"><b>Chez PioPo Du Début au pro , nous avons ce qu'il vous faut</b></p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="../View/sign-up.php" class="btn btn-primary py-3 px-5 btn-pill">S'abonner Mainetenant</a></p>

                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-titleTT" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Nos Plan Tarifaire </h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14">

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="./images/parents-with-baby-pointing-laptop-screen.jpg" alt="Image" class="img-fluid"></a>

              </figure>
              <div class="course-inner-text py-4 px-4">
                <h3><a href="#">Abonnement Gold</a></h3>
                <span class="course-price">69,99€ par mois</span>
                <p>
                  -Ressources exclusives.<br>
                  -Forums de discussion.<br>
                  -Opportunités de réseautage.<br>
                  -Idéal pour débuter sa carrière. </p>
              </div>
              <div class="d-flex border-top stats">
              </div>
            </div>

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="./images/handshake-close-up-cadres.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <h3><a href="#">Abonnement Platine:</a></h3>
                <span class="course-price"> 199,99€ par mois</span>
                <p>-Offres d'emploi illimitées.<br>
                  -Accès base de données CV.<br>
                  -Outils recrutement intelligents.<br>
                  -Ciblage étudiants et jeunes chercheurs.<br>
                  -Simplification recrutement.<br>
                  -Flexibilité adaptabilité.<br>
                  -Économie d'efforts et ressources.<br>
                  -Renforcement marque employeur.</p>
              </div>
              <div class="d-flex border-top stats">
              </div>
            </div>

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="./images/we-are-hiring-digital-collage.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <h3><a href="#">Abonnement Silver:
                  </a></h3>
                <span class="course-price"> 99,99€ par mois</span>
                <p>-Visibilité maximale auprès des employeurs.<br>
                  -Coaching personnalisé.<br>
                  -Accès exclusif à des événements de réseautage.<br>
                  -Expérience transformée en opportunités. </p>
              </div>
              <div class="d-flex border-top stats">
              </div>
            </div>


          </div>

        </div>

      </div>
      <div class="row justify-content-center">
        <div class="col-7 text-center">
          <button href="open_folder.php" target="_blank" class="customNextBtn btn btn-primary m-1">Appuyez pour une expérience inoubliable!</button>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section courses-title" id="courses-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="section-title">Offres d'emplois</h2>
        </div>
      </div>
    </div>
  </div>
  

  <div class="site-section courses-title" id="courses-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="section-title">Formation</h2>
        </div>
      </div>
    </div>
  </div>
  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  
  // Inclure le fichier formationC.php
  include 'C:\wamp64\www\VoxPulse\Controller\formationC.php';
  
  // Créer une instance de la classe FormationC
  $formation = new FormationC();
  
  // Vérifier si le paramètre 'option' est défini dans l'URL
  if(isset($_GET['option'])) {
      $resultat = $formation->afficher($_GET['option']);
      $char = $_GET['option'];
  } else {
      // Si le paramètre 'option' n'est pas défini, afficher les formations par défaut
      $resultat = $formation->afficher("id");
      $char = "id";
  }
  
  echo '<div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="owl-carousel col-12 nonloop-block-14">';

    // Boucle foreach pour afficher chaque cours
    foreach ($resultat as $row) {
        echo '<div class="course bg-white h-100 align-self-stretch">';
        echo '<figure class="m-0">';
        echo '<a href="course-single.html"><img src="' . $row['image'] . '" alt="Image" class="img-fluid"></a>';
        echo '</figure>';
        echo '<div class="course-inner-text py-4 px-4">';
        
        echo '<div class="meta"><span class="icon-clock-o"></span>' . $row['duree'] . ' h</div>';
        echo '<h3><a href="#">' ."description: " . $row['description'] . '</a></h3><br>';
        echo '<h3><a href="#">' . "localisation: " .$row['localisation'] . '</a></h3> <br>';
        echo '<h3><a href="#">' ."type: ". $row['type'] . '</a></h3><br>';
        echo '</div>';
        echo '<div class="d-flex border-top stats">';
        echo '<span class="course-price">' . $row['prix'] . ' dt</span>';
        
        echo "<td><a class='btn btn-primary' onclick='reinitMap(" . $row['lat'] . ", " . $row['lng'] . ")'>Localisation</a></td>";

        echo '</div>';
        echo '</div>';
    }
    
    // Fin de la section
    echo '</div>'; // Fermeture de la classe owl-carousel
    echo '</div>'; // Fermeture de la classe row
    echo '</div>'; // Fermeture de la classe container
    echo '</div>'; // Fermeture de la classe site-section
    ?>



      </div>
      <div class="row justify-content-center">
        <div class="col-7 text-center">
          <button class="customPrevBtn btn btn-primary m-1">Précedent</button>
          <button class="customNextBtn btn btn-primary m-1">Suivant</button>
        </div>
      </div>
    </div>
  </div>

  ////////
  <div class="site-section courses-title" id="courses-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="section-title">Evenement</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
    
    <div class="container">
      
      <div class="row">

        <div class="owl-carousel col-12 nonloop-block-14">

       <!-- liste-->  
       <?php foreach($list1 as $List): ?>
          <div class="course bg-white h-100 align-self-stretch">
             <figure class="m-0">
              <img src="<?= $List['img'] ; ?>" alt="Image" class="img-fluid" >
            </figure>
            <div class="course-inner-text py-4 px-4">
              <div class="meta"><span class="icon-clock-o"></span><?= $List['date'] ; ?> / <?= $List['lieu'] ; ?></div>
              <h3> <?= $List['titre'] ; ?> </h3>
              <p><?= $List['description'] ; ?> </p>
            </div>
            <div class="d-flex border-top stats">
              <div class="py-3 px-4"><span class="icon-users"></span><?= $List['NBPD'] ; ?> places disponibles</div>
            </div>
          </div>
        <?php endforeach ; ?>
 <!-- liste--> 
        

        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-7 text-center">
          <button class="customPrevBtn btn btn-primary m-1">Précedent</button>
          <button class="customNextBtn btn btn-primary m-1">Suivant</button>
        </div>
      </div>
    </div>
  </div>




  <div class="site-section bg-light" id="contact-section">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-md-7">



          <h2 class="section-title mb-3">Participer maintenant!</h2>
          <p class="mb-5">Nous sommes là pour vous aider ! N'hésitez pas à nous contacter pour toute question, commentaire ou demande d'assistance. Remplissez simplement le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais. Votre satisfaction est notre priorité.</p>

          <form method="post" action="addpart2.php" data-aos="fade">
            <div class="form-group row">
              <div class="col-md-12 mb-3">
                <input name="Prenom" type="text" class="form-control" placeholder="Prénom">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12 mb-3">
                <input name="nom" type="text" class="form-control" placeholder="Nom">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12 mb-3">
                <input name="email" type="text" class="form-control" placeholder="Email">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12 mb-3">
                <input name="tel" type="text" class="form-control" placeholder="Tel">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12 mb-3">
                <input name="etablissement" type="text" class="form-control" placeholder="Etablissement">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12 mb-3">
                <label for="ID" class="form-label">Les evenements disponibles</label>
                <div id="IDError" class="invalid-feedback">L'ID ne doit pas contenir des caracteres speciaux!</div>
                <select name="ID" id="ID" class="form-control">
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

            <div class="form-group row">
              <div class="col-md-6">
                <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Envoyer">
              </div>
              <div class="col-md-6">
                <input type="reset" class="btn btn-danger py-3 px-5 btn-block btn-pill" value="Annuler">
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  <div class="site-section" id="teachers-section">
    <div class="container">

      <div class="row mb-5 justify-content-center">
        <div class="col-lg-7 mb-5 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="section-title">Avis Des utilisateurs</h2>
          <p class="mb-5">Les avis des utilisateurs sont les retours d'expérience partagés par ceux ayant utilisé nos offres de travail et formations. Ils fournissent un aperçu authentique des impressions et de la satisfaction des utilisateurs, aidant ainsi d'autres à prendre des décisions éclairées.</p>
        </div>
      </div>

      <div class="row">

        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
          <div class="teacher text-center">
            <img src="images/person_1.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
            <div class="py-2">
              <h3 class="text-black">Benjamin Stone</h3>
              <p class="position">Help-Desk</p>
              <p>Je suis absolument ravi de mon expérience avec cette société ! Leurs offres d'emploi sont variées et pertinentes, et j'ai trouvé le poste parfait grâce à leur plateforme. De plus, leurs formations sont exceptionnelles ; j'ai acquis de nouvelles compétences qui m'ont vraiment aidé à avancer dans ma carrière. Je recommande vivement leurs services à tous ceux qui cherchent à progresser professionnellement.</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
          <div class="teacher text-center">
            <img src="images/person_2.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
            <div class="py-2">
              <h3 class="text-black">Katleen Stone</h3>
              <p class="position">Physics Teacher</p>
              <p>Je suis très satisfait des opportunités d'emploi proposées par cette société.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
          <div class="teacher text-center">
            <img src="images/person_3.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
            <div class="py-2">
              <h3 class="text-black">Sadie White</h3>
              <p class="position">Manager</p>
              <p>Excellent service ! Grâce à leurs offres d'emploi et formations, j'ai trouvé rapidement un emploi qui correspond à mes compétences et à mes intérêts.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 
  <div class="site-section bg-image overlay" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-8 text-center testimony">
          <img src="images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
          <h3 class="mb-4">Jerome Jensen</h3>
          <blockquote>
            <p>Je suis incroyablement reconnaissant envers cette plateforme ! Grâce à eux, j'ai immédiatement trouvé un emploi correspondant à mes compétences dès ma sortie de l'université. Une transition sans heurts vers ma carrière, merci infiniment !</p>
          </blockquote>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section pb-0">

    <div class="future-blobs">
      <div class="blob_2">
        <img src="images/blob_2.svg" alt="Image">
      </div>
      <div class="blob_1">
        <img src="images/blob_1.svg" alt="Image">
      </div>
    </div>
    <div class="container">
      <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
        <div class="col-lg-7 text-center">
          <h2 class="section-title">Pourquoi nous choisir</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto align-self-start" data-aos="fade-up" data-aos-delay="100">

          <div class="p-4 rounded bg-white why-choose-us-box">

            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
              <div>
                <h3 class="m-0">Expertise de pointes</h3>
              </div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
              <div>
                <h3 class="m-0">Engagement envers l'excellence</h3>
              </div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
              <div>
                <h3 class="m-0">Support clientèle exceptionnel </h3>
              </div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
              <div>
                <h3 class="m-0">Satisfaction garantie</h3>
              </div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
              <div>
                <h3 class="m-0">Personnalisation des services</h3>
              </div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
              <div>
                <h3 class="m-0">Transparence et intégrité </h3>
              </div>
            </div>

          </div>


        </div>
        <div class="col-lg-7 align-self-end" data-aos="fade-left" data-aos-delay="200">
          <img src="images/person_transparent.png" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>








  <footer class="footer-section bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3>A propos PioPro</h3>
          <p>PIOPRO, votre partenaire pour l'évolution professionnelle. Des formations pratiques conçues pour vous aider à acquérir de nouvelles compétences et à accéder à des opportunités d'emploi passionnantes. Transformez votre carrière avec nous dès maintenant.</p>
        </div>

        <div class="col-md-3 ml-auto">
          <h3>Liens</h3>
          <ul class="list-unstyled footer-links">
            <li><a href="#">Acceuil</a></li>
            <li><a href="#">Formations</a></li>
            <li><a href="../View/Syrine/index.php">Offres d'emplois</a></li>
            <li><a href="#">Coaching</a></li>
          </ul>
        </div>

        <div class="col-md-4">
          <h3>NewsLetter</h3>
          <p>Abonnez-vous à notre newsletter pour rester informé(e) des dernières actualités, des offres exclusives et des événements à venir. Rejoignez notre communauté dès aujourd'hui et ne manquez aucune opportunité de développement professionnel.</p>
          <form action="#" class="footer-subscribe">
            <div class="d-flex mb-5">
              <input type="text" class="form-control rounded-0" placeholder="Email">
              <input type="submit" class="btn btn-primary rounded-0" value="S'inscrire">
            </div>
          </form>
        </div>

      </div>

      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <div class="border-top pt-5">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>
                document.write(new Date().getFullYear());
              </script> Tous droits réservés | Ce modèle est réalisé avec PIO-PRO
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>

      </div>
    </div>
  </footer>



  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>


  <script src="js/main.js"></script>
  <div id="map"></div>
  <script>
        window.embeddedChatbotConfig = {
        chatbotId: "NpVQQo0nQGD9omvMrUTkd",
        domain: "www.chatbase.co"
        }
        </script>
        <script
        src="https://www.chatbase.co/embed.min.js"
        chatbotId="NpVQQo0nQGD9omvMrUTkd"
        domain="www.chatbase.co"
        defer>
    </script>

    
</body>

</html>