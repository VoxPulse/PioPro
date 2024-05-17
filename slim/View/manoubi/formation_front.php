<?php
// Activer l'affichage des erreurs PHP
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

// Générer le contenu HTML du tableau
$tableHTML = '<table class="table">';
$tableHTML .= '<thead>';
$tableHTML .= '<tr>';
$tableHTML .= '<th>ID</th>';
$tableHTML .= '<th>Description</th>';
$tableHTML .= '<th>Durée</th>';
$tableHTML .= '<th>Prix</th>';
$tableHTML .= '<th>Image</th>';
$tableHTML .= '</tr>';
$tableHTML .= '</thead>';
$tableHTML .= '<tbody>';
foreach ($resultat as $row) {
    $tableHTML .= '<tr>';
    $tableHTML .= '<td>' . $row['id'] . '</td>';
    $tableHTML .= '<td>' . $row['description'] . '</td>';
    $tableHTML .= '<td>' . $row['duree'] . '</td>';
    $tableHTML .= '<td>' . $row['prix'] . '</td>';
    $tableHTML .= '<td>' . $row['image'] . '</td>';
    $tableHTML .= "<td><a class='btn btn-danger btn-supprimer' href='suprimerformation.php?id=" . $row['id']. "'>Supprimer</a></td>";
    $tableHTML .= "<td><a class='btn btn-primary' href='modifierFormationView.php?id=" . $row['id']. "'>Modifier</a></td>";
    $tableHTML .= '</tr>';
}
$tableHTML .= '</tbody>';
$tableHTML .= '</table>';



?>

            
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PioPro-Acceuil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../oneschool-master/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../oneschool-master/css/bootstrap.min.css">
    <link rel="stylesheet" href="../oneschool-master/css/jquery-ui.css">
    <link rel="stylesheet" href="../oneschool-master/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../oneschool-master/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../oneschool-master/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../oneschool-master/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="../oneschool-master/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="../oneschool-master/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="../oneschool-master/css/aos.css">

    <link rel="stylesheet" href="../oneschool-master/css/style.css">

    <link rel="icon" type="image/png" href="./images/logo 1.png">

    <!-- Inclure la bibliothèque Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5GF7-lMCCPrMtNWpc1x6LJQvyxh6IPOk&callback=initMap" async defer></script>
    <style>
        /* Définir une taille pour la carte */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
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
    <br><br><br><br><br>
  <script src="../oneschool-master/js/jquery-3.3.1.min.js"></script>
  <script src="../oneschool-master/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../oneschool-master/js/jquery-ui.js"></script>
  <script src="../oneschool-master/js/popper.min.js"></script>
  <script src="../oneschool-master/js/bootstrap.min.js"></script>
  <script src="../oneschool-master/js/owl.carousel.min.js"></script>
  <script src="../oneschool-master/js/jquery.stellar.min.js"></script>
  <script src="../oneschool-master/js/jquery.countdown.min.js"></script>
  <script src="../oneschool-master/js/bootstrap-datepicker.min.js"></script>
  <script src="../oneschool-master/js/jquery.easing.1.3.js"></script>
  <script src="../oneschool-master/js/aos.js"></script>
  <script src="../oneschool-master/js/jquery.fancybox.min.js"></script>
  <script src="../oneschool-master/js/jquery.sticky.js"></script>

  
  <script src="../oneschool-master/js/main.js"></script>
    
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
        
 <!-- Div pour afficher la carte -->
 <div id="map"></div>
  </body>
</html>