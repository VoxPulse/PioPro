
<?php
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';
$E = new UserC;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PioPro</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <link rel="icon" type="image/png" href="./oneschool-master/images/logo 1.png">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .card {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .btn-primary {
            background-color: #5e72e4;
            border-color: #5e72e4;
        }

        .btn-primary:hover {
            background-color: #324cdd;
            border-color: #324cdd;
        }
    </style>
</head>

<body>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="./oneschool-master/index.html">
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
                            <ul class="navbar-nav mx-auto"></ul>
                            <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                    <a href="./oneschool-master/index.html" class="btn btn-sm mb-0 me-1 btn-primary">Accueil</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100 d-flex align-items-center justify-content-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-7">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Recuperer Votre mot de passe</h4>
                                    <p class="mb-0">Entrez votre adresse e-mail</p>
                                </div>
                                <div class="card-body">
                                    <form id="myForm" action="SEND.php" method="post">
                                        <div class="mb-3">
                                            <div id="emailError" class="invalid-feedback">
                                                Veuillez saisir une adresse email valide.
                                            </div>
                                            <div id="existError" class="invalid-feedback">
                                                Veuillez saisir une adresse email valide.
                                            </div>
                                            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Envoyer un mail</button>
                                    </form>
                                </div>
                            </div>
                        </div </div>
                    </div>
                </div>
        </section>
    </main>

    <!-- Core JS Files -->
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var myForm = document.getElementById('myForm');

            //
            var MailInput = document.getElementById('email');

            //
            var MailError = document.getElementById('emailError');
            var MailError2 = document.getElementById('existError');
            
            myForm.addEventListener('submit', function(event) {
                // Initialisation du compteur d'erreurs
                var errors = 0;

                // Événement pour le champ Nom
                MailInput.addEventListener('input', function() {
                    if (!validateEmail(ailInput.value)) {
                        MailError.style.display = 'block';
                        
                        errors++;
                    } else {
                        MailError.style.display = 'none';
                    }
                });

                if (errors > 0) {
                    event.preventDefault();                }
            });

            //EMAIL 
            function validateEmail(email) {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

        });
    </script>

</body>

</html>
<?php

if (isset($_POST['email'])) {
    $password = uniqid();

    $message = "Bonjour , voici le code de Verification : $password ";
    $headers = 'Content-Type: text/plain; charset="utf-8"' . " ";
    if (mail($_POST['email'], 'Code de Verification', $message, $headers)) {
        $sql = "UPDATE user SET token = ? WHERE mail = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$password, $_POST['email']]);
    }
}


?>