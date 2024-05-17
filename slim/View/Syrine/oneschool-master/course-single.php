<?php
include 'C:\wamp64\www\VoxPulse\Controller\entretiensC.php';

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ajoutez ici votre fonction de contrôle de saisie pour valider les données du formulaire
    function controleSaisie_entretiens() {
        // Récupère les données du formulaire
        $id = $_POST['id'];
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $statut = $_POST['statut'];
        $url = $_POST['url'];
        $id_user = $_POST['id_user'];
        $id_offre = $_POST['id_offre'];

        // Validation de la date (doit être dans le futur)
        $today = date("Y-m-d");
        if ($date <= $today) {
            echo "<script>alert('La date doit être dans le futur.')</script>";
            return false;
        }

        // Validation de l'heure (doit être le matin)
        if (strtotime($heure) >= strtotime('12:00:00')) {
            echo "<script>alert('L\'heure doit être le matin.')</script>";
            return false;
        }

        // Validation de l'URL (doit commencer par "https://" et se terminer par ".com")
        if (!preg_match("/^https:\/\/.*\.com$/", $url)) {
            echo "<script>alert('L\'URL doit commencer par \"https://\" et se terminer par \".com\".')</script>";
            return false;
        }

        // Vous pouvez ajouter d'autres validations supplémentaires ici...

        // Si tout est correct, retourne true
        return true;
    }

    // Si la fonction de contrôle de saisie renvoie true, ajoutez l'entretien à la base de données
    if (controleSaisie_entretiens()) {
        // Crée une instance de la classe entretiensC
        $entretiensC = new entretiensC();

        // Récupère les données du formulaire
        $id = $_POST['id'];
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $statut = $_POST['statut'];
        $url = $_POST['url'];
        $id_user = $_POST['id_user'];
        $id_offre = $_POST['id_offre'];

        // Ajoute l'entretien à la base de données
        $entretiensC->addOffre($id, $date, $heure, $statut, $url, $id_user, $id_offre);

        // Redirection vers une autre page après l'ajout de l'entretien
        header("Location: affiche_entretiens.php");
        exit(); // Arrête l'exécution du script pour éviter toute sortie supplémentaire
    } 
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification du formulaire et ajout des données à la base de données

    // Vérification si un fichier a été téléchargé
    if(isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        // Nom temporaire du fichier téléchargé
        $tmp_name = $_FILES['cv']['tmp_name'];
        // Nom du fichier sur le serveur
        $file_name = basename($_FILES['cv']['name']);
        
        // Déplace le fichier vers le répertoire de destination
        $destination = __DIR__ . "/chemin/vers/repertoire/destination/" . $file_name;
        move_uploaded_file($tmp_name, $destination);

        // Affichage du message si le fichier a été inséré avec succès
        echo "<p>Le fichier CV a été téléchargé avec succès : $file_name</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OneSchool &mdash; Website by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <!-- <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet"> -->
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
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="index.html">OneSchool</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#Entretiens-section" class="nav-link">Entretiens</a></li>
                <li><a href="#programs-section" class="nav-link">Programs</a></li>
                <li><a href="#teachers-section" class="nav-link">Teachers</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#contact-section" class="nav-link"><span>Contact Us</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <div class="intro-section single-cover" id="home-section">
      
      <div class="slide-1 " style="background-image: url('images/img_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                  <h1 data-aos="fade-up" data-aos-delay="0">Entertiens</h1>
                  
                </div>

                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
    

            



          </div>
          <br>
          <br>
          <div class="row justify-content-center">
                <div class="col-md-7">

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" data-aos="fade" >
                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-lg-0">
                                <input type="text" class="form-control" placeholder="Id" name="id">
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control" placeholder="date" name="date">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="time" class="form-control" placeholder="heure" name="heure">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <select class="form-control" name="statut">
                                    <option value="Ingenieur">en ligne</option>
                                    <option value="Medecin">deconnecte</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="url" name="url">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="id_user" name="id_user">
                            </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="id_offre" name="id_offre">
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Ajouter" >
                                <br>
                                <div class="col-md-6">
        <!-- Champ pour le fichier PDF -->
        <input type="file" class="form-control" name="cv" accept=".pdf">
    </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class="site-section Entretiens-title bg-dark" id="Entretiens-section">
      
    </div>
   
     
    <footer class="footer-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3>About OneSchool</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro consectetur ut hic ipsum et veritatis corrupti. Itaque eius soluta optio dolorum temporibus in, atque, quos fugit sunt sit quaerat dicta.</p>
          </div>

          <div class="col-md-3 ml-auto">
            <h3>Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#">Home</a></li>
              <li><a href="#">Entretiens</a></li>
              <li><a href="#">Programs</a></li>

            </ul>
          </div>

          <div class="col-md-4">
            <h3>Subscribe</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt incidunt iure iusto architecto? Numquam, natus?</p>
            <form action="#" class="footer-subscribe">
              <div class="d-flex mb-5">
                <input type="text" class="form-control rounded-0" placeholder="Email">
                <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
              </div>
            </form>
          </div>

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
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
    
  </body>
</html>