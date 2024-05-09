<?php

//FORM SUBMISSION 
include_once 'submit.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Pio-Pro
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./css/nucleo-icons.css" rel="stylesheet" />
  <link href="./css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link rel="icon" type="image/png" href="./oneschool-master/images/logo 1.png">
  <!--Captcha-->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="./oneschool-master/">
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
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../View/oneschool-master/images/1.png'); background-position: top;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Bienvenue dans notre communauté !</h1>
            <p class="text-lead text-white">Vivez une expérience unique ! Rejoignez-nous dès maintenant pour découvrir tout ce que nous avons à offrir en créant votre compte en quelques instants.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5> Inscrivez-vous</h5>
            </div>
            <div class="row px-xl-5 px-sm-4 px-3">
              <div class="col-3 ms-auto px-1">
                <a class="btn btn-outline-light w-100" href="javascript:;">
                  <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(3.000000, 3.000000)" fill-rule="nonzero">
                        <circle fill="#3C5A9A" cx="29.5091719" cy="29.4927506" r="29.4882047"></circle>
                        <path d="M39.0974944,9.05587273 L32.5651312,9.05587273 C28.6886088,9.05587273 24.3768224,10.6862851 24.3768224,16.3054653 C24.395747,18.2634019 24.3768224,20.1385313 24.3768224,22.2488655 L19.8922122,22.2488655 L19.8922122,29.3852113 L24.5156022,29.3852113 L24.5156022,49.9295284 L33.0113092,49.9295284 L33.0113092,29.2496356 L38.6187742,29.2496356 L39.1261316,22.2288395 L32.8649196,22.2288395 C32.8649196,22.2288395 32.8789377,19.1056932 32.8649196,18.1987181 C32.8649196,15.9781412 35.1755132,16.1053059 35.3144932,16.1053059 C36.4140178,16.1053059 38.5518876,16.1085101 39.1006986,16.1053059 L39.1006986,9.05587273 L39.0974944,9.05587273 L39.0974944,9.05587273 Z" fill="#FFFFFF"></path>
                      </g>
                    </g>
                  </svg>
                </a>
              </div>
              <div class="col-3 px-1">
                <a class="btn btn-outline-light w-100" href="javascript:;">
                  <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(7.000000, 0.564551)" fill="#000000" fill-rule="nonzero">
                        <path d="M40.9233048,32.8428307 C41.0078713,42.0741676 48.9124247,45.146088 49,45.1851909 C48.9331634,45.4017274 47.7369821,49.5628653 44.835501,53.8610269 C42.3271952,57.5771105 39.7241148,61.2793611 35.6233362,61.356042 C31.5939073,61.431307 30.2982233,58.9340578 25.6914424,58.9340578 C21.0860585,58.9340578 19.6464932,61.27947 15.8321878,61.4314159 C11.8738936,61.5833617 8.85958554,57.4131833 6.33064852,53.7107148 C1.16284874,46.1373849 -2.78641926,32.3103122 2.51645059,22.9768066 C5.15080028,18.3417501 9.85858819,15.4066355 14.9684701,15.3313705 C18.8554146,15.2562145 22.5241194,17.9820905 24.9003639,17.9820905 C27.275104,17.9820905 31.733383,14.7039812 36.4203248,15.1854154 C38.3824403,15.2681959 43.8902255,15.9888223 47.4267616,21.2362369 C47.1417927,21.4153043 40.8549638,25.1251794 40.9233048,32.8428307 M33.3504628,10.1750144 C35.4519466,7.59650964 36.8663676,4.00699306 36.4804992,0.435448578 C33.4513624,0.558856931 29.7884601,2.48154382 27.6157341,5.05863265 C25.6685547,7.34076135 23.9632549,10.9934525 24.4233742,14.4943068 C27.7996959,14.7590956 31.2488715,12.7551531 33.3504628,10.1750144"></path>
                      </g>
                    </g>
                  </svg>
                </a>
              </div>
              <div class="col-3 me-auto px-1">
                <a class="btn btn-outline-light w-100" href="javascript:;">
                  <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                        <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" fill="#4285F4"></path>
                        <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" fill="#34A853"></path>
                        <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" fill="#FBBC05"></path>
                        <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" fill="#EB4335"></path>
                      </g>
                    </g>
                  </svg>
                </a>
              </div>
              <div class="mt-2 position-relative text-center">
                <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                  ou
                </p>
              </div>
            </div>
            <div class="card-body">
              <form role="form" action="ADD.php" method="post" id="myForm">
                <div class="row">
                  <div class="col-md-6">
                    <!-- Première colonne -->
                    <div class="mb-3">
                      <label for="nom" class="form-label">Nom:</label>
                      <div id="nomError" class="invalid-feedback">Le nom est invalide</div>
                      <input name="nom" type="text" id="nom" class="form-control form-control-lg" placeholder="Nom" aria-label="Nom">
                    </div>
                    <div class="mb-3">
                      <label for="prenom" class="form-label">Prénom:</label>
                      <div id="prenomError" class="invalid-feedback">Le prénom est invalide</div>
                      <input name="prenom" type="text" id="prenom" class="form-control form-control-lg" placeholder="Prénom" aria-label="Prénom">
                    </div>
                    <div class="mb-3">
                      <label for="cin" class="form-label">Pièce d'identité (Passeport/CIN):</label>
                      <div id="cinError" class="invalid-feedback">La CIN est invalide</div>
                      <input name="cin" type="text" id="cin" class="form-control form-control-lg" placeholder="CIN" aria-label="CIN">
                    </div>
                    <div class="mb-3">
                      <label for="telephone" class="form-label">Téléphone:</label>
                      <div id="telephoneError" class="invalid-feedback">Le téléphone est invalide</div>
                      <input type="text"  name="telephone" id="telephone" class="form-control form-control-lg" placeholder="Téléphone" aria-label="Téléphone">
                      
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Adresse Email:</label>
                      <div id="emailError" class="invalid-feedback">L'adresse email est invalide</div>
                      <input type="email"  name="email" id="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Deuxième colonne -->
                    <div class="mb-3">
                      <label for="role" class="form-label">Rôle:</label>
                      <div id="roleError" class="invalid-feedback">Veuillez sélectionner un rôle</div>
                      <select name="role" id="role" class="form-select form-select-lg">
                        <option value="entreprise">Entreprise/Recruteur</option>
                        <option value="professionnel">Professionnel</option>
                        <option value="etudiant">Etudiant</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="motdepasse" class="form-label">Mot de passe:</label>
                      <input type="password" name="motdepasse"  id="motdepasse" class="form-control form-control-lg" placeholder="Mot de passe" aria-label="Mot de passe">
                      <div id="motdepasseError" class="invalid-feedback">Le mot de passe est invalide</div>
                    </div>
                    <div class="mb-3">
                      <label for="confirmationmdp" class="form-label">Confirmation de mot de passe:</label>
                      <input type="password" id="confirmationmdp" class="form-control form-control-lg" placeholder="Confirmation de mot de passe" aria-label="Confirmation de mot de passe">
                      <div id="confirmationmdpError" class="invalid-feedback">La confirmation de mot de passe ne correspond pas</div>
                    </div>
                    <div class="mb-3">
                    <div id="ddnError" class="invalid-feedback">La date de naissance est invalide +18 </div>
                      <label for="ddn"  class="form-label">Date de naissance:</label>
                      <input type="date" name="ddn" id="ddn" class="form-control form-control-lg" aria-label="Date de naissance">
                    </div>
                    <div class="mb-3">
                      <label for="etablissement" class="form-label">Établissement:</label>
                      <input type="text" name="etablissement" id="etablissement" class="form-control form-control-lg" placeholder="Établissement" aria-label="Établissement">
                      <div id="etablissementError" class="invalid-feedback">L'établissement est invalide</div>
                    </div>
                  </div>
                </div>
                <div class="form-check form-check-info text-start">
                  <label class="form-check-label" for="flexCheckDefault">
                  <div class="g-recaptcha" data-sitekey="6LcgOtEpAAAAAE7O2uI9mbVmPlXYkY7TPTKTB7Md"></div>
                  </label>
                </div>
                <input type="hidden" name="submit_frm" value="1">
                <div class="text-center">
                  <button  
                     value="Submit" name="ok" type="submit" data-acti id="btnInscription" class="btn bg-gradient-dark w-100 my-4 mb-2">S'inscrire</button>
                </div>
                <div class="text-center">
                  <p class="text-sm mt-3 mb-0">Vous avez déjà un compte ? <a href="sign-in.php" class="text-dark font-weight-bolder">Connectez-vous</a></p>
                </div>
              </form>

            </div>


          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Sociéte
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            A propos
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Blog
          </a>
        </div>
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Soft by VoxPulse.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script >document.addEventListener('DOMContentLoaded', function() {
    //form 
    var myForm = document.getElementById('myForm');
    // Sélection des éléments du formulaire
    var nomInput = document.getElementById('nom');
    var prenomInput = document.getElementById('prenom');
    var cinInput = document.getElementById('cin');
    var telInput = document.getElementById('telephone');
    var mailInput = document.getElementById('email');
    var roleInput = document.getElementById('role');
    var MDPInput = document.getElementById('motdepasse');
    var CMDPInput = document.getElementById('confirmationmdp');
    var DDNPInput = document.getElementById('ddn');
    var etablissementInput = document.getElementById('etablissement');
    // Sélection des éléments d'erreur
    var nomError = document.getElementById('nomError');
    var prenomError = document.getElementById('prenomError');
    var cinError = document.getElementById('cinError');
    var telError = document.getElementById('telephoneError');
    var mailError = document.getElementById('emailError');
    var roleError = document.getElementById('roleError');
    var MDPError = document.getElementById('motdepasseError');
    var CMDPError = document.getElementById('confirmationmdpError');
    var DDNError = document.getElementById('ddnError');
    var etablissementError = document.getElementById('etablissementError');

    myForm.addEventListener('submit', function(event) {
        // Initialisation du compteur d'erreurs
        var errorCount = 0;
        //Etbalissement 
        if (!validateEtablissement(etablissementInput.value)) {
            etablissementError.style.display = 'block';
            errorCount++;
        } else {
            etablissementError.style.display = 'none';
        }

        // Date de naissance 
        // Événement pour le champ Date de naissance
        if (!validateAge(DDNPInput.value)) {
            DDNError.style.display = 'block';
            errorCount++;
        } else {
            DDNError.style.display = 'none';
        }

        // CMDP
        if (!validateMotDePasse2(MDPInput.value, CMDPInput.value)) {
            CMDPError.style.display = 'block';
            errorCount++;
        } else {
            CMDPError.style.display = 'none';
        }

        // MDP 
        if (!validateMotDePasse(MDPInput.value)) {
            MDPError.style.display = 'block';
            errorCount++;
        } else {
            MDPError.style.display = 'none';
        }

        // role 
        if (!validateRole(roleInput.value)) {
            roleError.style.display = 'block';
            errorCount++;
        } else {
            roleError.style.display = 'none';
        }

        // Événement pour le champ Nom
        if (!validateNom(nomInput.value)) {
            nomError.style.display = 'block';
            errorCount++;
        } else {
            nomError.style.display = 'none';
        }

        // Événement pour le champ Prénom
        if (!validatePrenom(prenomInput.value)) {
            prenomError.style.display = 'block';
            errorCount++;
        } else {
            prenomError.style.display = 'none';
        }

        // Événement pour le champ CIN
        if (!validateCIN(cinInput.value)) {
            cinError.style.display = 'block';
            errorCount++;
        } else {
            cinError.style.display = 'none';
        }

        // Événement pour le champ Téléphone
        if (!validateTel(telInput.value)) {
            telError.style.display = 'block';
            errorCount++;
        } else {
            telError.style.display = 'none';
        }

        // Événement pour le champ Email
        if (!validateEmail(mailInput.value)) {
            mailError.style.display = 'block';
            errorCount++;
        } else {
            mailError.style.display = 'none';
        }

        // Si le compteur d'erreurs est supérieur à 0, empêcher l'envoi du formulaire
        if (errorCount > 0) {
            event.preventDefault();
            alert('Le formulaire contient des erreurs, veuillez les corriger.');
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
        return prenom.length > 4 && prenomRegex.test(prenom);
    }

    // Validation de la CIN
    function validateCIN(cin) {
        var cinRegex = /^[0-9]*$/;
        return cin.length === 8 && cinRegex.test(cin);
    }

    // Validation du téléphone
    function validateTel(tel) {
        var telRegex = /^[0-9]*$/;
        return tel.length === 8 && telRegex.test(tel);
    }

    // Validation de l'email
    function validateEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validateRole(role) {
        // Vérifier si une option a été sélectionnée
        return role !== "";
    }

    function validateMotDePasse(motDePasse) {
        // Expression régulière pour vérifier si le mot de passe contient au moins un caractère spécial, un chiffre et une lettre
        var regex = /^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]{8,}$/;
        return regex.test(motDePasse);
    }

    function validateMotDePasse2(motDePasse, motDePasse2) {
        return motDePasse === motDePasse2;
    }

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

    function validateEtablissement(etablissement) {
        // Expression régulière pour valider l'établissement (que des caractères alphabétiques)
        var etablissementRegex = /^[a-zA-Z\s]+$/;
        return etablissementRegex.test(etablissement);
    }
});
</script>
<script>
  <!-- Replace the variables below. -->
  function onSubmit(token) {
    document.getElementById("demo-form").submit();
  }
</script>

<?php
if(isset($_POST['ok']))
{
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
        alert('Veuillez cocher la case reCAPTCHA.');
    }
});
</script>
 <!--Inactivité-->
 <script>
// Délai avant la redirection en cas d'inactivité (5 minutes en millisecondes)
var TIME_LIMIT = 1 * 60 * 1000; // 5 minutes

var timeoutId;

// Réinitialise le minuteur à chaque interaction
function resetTimer() {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(redirectToPage, TIME_LIMIT);
}

// Fonction de redirection
function redirectToPage() {
    window.location.href = 'page.php'; // Modifiez 'page.php' par l'URL de votre choix
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