<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
  <link rel="icon" type="image/png" href="../oneschool-master/images/logo 1.png">
  <!--Captcha -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../FRONT/index.php">
              PioPro
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="../FRONT/index.php" class="btn btn-sm mb-0 me-1 btn-primary">Acceuil</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Connectez-vous</h4>
                  <p class="mb-0">Entrez votre mot de passe et adresse e-mail </p>
                </div>
                <div class="card-body">
                  <form id="myForm" action="Connexion.php" method="post">
                    <div class="mb-3">
                      <div id="COERROR" class="invalid-feedback">
                        Mail ou mot de passse incorrect
                      </div>
                      <div id="emailError" class="invalid-feedback">
                        Veuillez saisir une adresse email valide.
                      </div>
                      <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                    </div>
                    <div class="mb-3">
                      <div id="passwordError" class="invalid-feedback">
                        Le mot de passe doit comporter au moins 8 caractères et des caractères spéciaux.
                      </div>
                      <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Mot de passe" aria-label="Password">
                    </div>
                    <div id="CaptchaError" class="invalid-feedback">
                        Vous devez Chochez La captcha
                      </div>
                    <div class="g-recaptcha" data-sitekey="6LcgOtEpAAAAAE7O2uI9mbVmPlXYkY7TPTKTB7Md"></div>
                    <button value="Submit" type="submit" name="ok" class="btn btn-primary">Connecter</button>
                  </form>

                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Vous n'avez pas de Compte?
                    <a href="sign-up.php" class="text-primary text-gradient font-weight-bold">Créer un </a>
                  </p>
                  <p class="mb-4 text-sm mx-auto">
                    Mot de passe oublié?
                    <a href="RECUP.php" class="text-primary text-gradient font-weight-bold">Récuperer le mot de passe </a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('../View/oneschool-master/images/75a7cad4-418b-4cbf-987b-7371f2462fe3.png');background-size: cover;">
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="script3.js"></script>

  <script>
    // Récupérer le paramètre d'URL pour vérifier s'il y a une erreur
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');

    // Si une erreur est présente, afficher le message d'erreur correspondant
    if (error === 'utilisateur_introuvable') {
      const COERRORDiv = document.getElementById('COERROR');
      COERRORDiv.textContent = "Utilisateur introuvable. Veuillez vérifier votre email et mot de passe.";
      COERRORDiv.style.display = 'block';
    } else if (error === 'utilisateur_bloque') {
      const COERRORDiv = document.getElementById('COERROR');
      COERRORDiv.textContent = "Utilisateur bloqué. Veuillez contacter l'administrateur pour plus d'informations.";
      COERRORDiv.style.display = 'block';
    }
  </script>

  <?php
  if (isset($_POST['ok'])) {
    require_once 'C:\wamp64\www\VoxPulse\View\Captcha\autoload.php';
    $recaptcha = new \ReCaptcha\ReCaptcha("6LcgOtEpAAAAAGICn7VJaun1NoJQRLoxg2DgTM8X");
    $gRecaptchaResponse = $_POST['g-recaptcha-response'];
    $resp = $recaptcha->setExpectedHostname('localhost')
      ->verify($gRecaptchaResponse, $remoteIp);
    if ($resp->isSuccess()) {
      echo "Success !";
    } else {
      $errors = $resp->getErrorCodes();
      var_dump($errors);
    }
  }
  ?>
  <script>
    document.getElementById('myForm').addEventListener('submit', function(event) {
      var response = grecaptcha.getResponse();
      if (response.length === 0) { // Si le captcha n'est pas coché, response est vide
        event.preventDefault(); // Empêche la soumission du formulaire
        CaptchaError.style.display = 'block';
      }
    });
  </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      //form 
      var myForm = document.getElementById('myForm');
      // Sélection des éléments du formulaire
      var emailInput = document.getElementById('email');
      var mdpInput = document.getElementById('password');

      // Sélection des éléments d'erreur
      var emailError = document.getElementById('emailError');
      var mdpError = document.getElementById('passwordError');

      myForm.addEventListener('submit', function(event) {
        // Initialisation du compteur d'erreurs
        var errorCount = 0;

        // MDP 
        if (!validateMotDePasse(mdpInput.value)) {
          mdpError.style.display = 'block';
          CaptchaError
          errorCount++;
        } else {
          mdpError.style.display = 'none';
        }

        // Événement pour le champ Email
        if (!validateEmail(emailInput.value)) {
          emailError.style.display = 'block';
          errorCount++;
        } else {
          emailError.style.display = 'none';
        }

        // Si le compteur d'erreurs est supérieur à 0, empêcher l'envoi du formulaire
        if (errorCount > 0) {
          event.preventDefault();
        }
      });

      // Validation de l'email
      function validateEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
      }

      function validateMotDePasse(motDePasse) {
        // Expression régulière pour vérifier si le mot de passe contient au moins un caractère spécial, un chiffre et une lettre
        var regex = /^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]{8,}$/;
        return regex.test(motDePasse);
      }



    });
  </script>


</body>

</html>