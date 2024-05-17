<?php
include __DIR__ . '\..\Model\config.php';

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
                                    <h4 class="font-weight-bolder">Saisir Votre Nouveau Mot de passe </h4>
                                    <p class="mb-0">Entrez votre mot de passe </p>
                                </div>
                                <div class="card-body">
                                    <form id="myForm" action="SEND2.php" method="post">
                                        <div class="mb-3">
                                            <div id="CODeError" class="invalid-feedback">
                                                Saisir le code de verification
                                            </div>
                                            <p class="mb-0" style="color: red;">Entrez le code verification Valide</p>
                                            <input type="text" id="CODE1" name="CODE1" class="form-control form-control-lg" placeholder="Code de verification" aria-label="Code">
                                        </div>
                                        <div class="mb-3">
                                            <p class="mb-0" style="color: red;">Entrez le mot de passe Valide </p>
                                            <div id="MDPError" class="invalid-feedback">
                                                Entrez Un Mot de passe Valide 
                                            </div>
                                            <input type="password" id="MDP" name="MDP" class="form-control form-control-lg" placeholder="Mot de Passe " aria-label="Email">
                                        </div>
                                        <div class="mb-3">
                                            <div id="MDP2Error" class="invalid-feedback">
                                            Entrez Un Mot de passe Valide 
                                            </div>
                                            <input type="password" id="MDP2" name="MDP2" class="form-control form-control-lg" placeholder="Confirmez Votre Mot de passe  " aria-label="Email">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Réinitialiser</button>
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
            var COdeInput = document.getElementById('CODE1');
            var MdpInput = document.getElementById('MDP');
            var Mdp2Input = document.getElementById('MDP2');

            //
            var CodeError = document.getElementById('CODeError');
            var MDPError = document.getElementById('MDPError');
            var MDP2Error = document.getElementById('MDP2Error');

            myForm.addEventListener('submit', function(event) {
                // Initialisation du compteur d'erreurs
                var errors = 0;
                // Ajout d'écouteurs d'événements pour chaque champ d'entrée pour la validation en temps réel
                if (!validateToken(COdeInput.value)) {
                    CodeError.style.display = 'block';
                    errors++;
                } else {
                    CodeError.style.display = 'none';
                }

                if (!validateMotDePasse(MdpInput.value)) {
                    MDPError.style.display = 'block';
                    errors++;
                } else {
                    MDPError.style.display = 'none';
                }


                // Événement pour le champ Nom
                Mdp2Input.addEventListener('input', function() {
                    if (!validateEmail(Mdp2Input.value)) {
                       MDP2Error.style.display = 'block';
                        errors++;
                    } else {
                       MDP2Error.style.display = 'none';
                    }
                });

                if (errors > 0) {
                    event.preventDefault();
                    alert('Le formulaire contient des erreurs, veuillez les corriger.');
                }
            });


            function validateToken(motDePasse) {
                var regex = /^[A-Z0-9]{10}$/;
                return regex.test(motDePasse);
            }


            //MDP
            function validateMotDePasse(motDePasse) {
                // Expression régulière pour vérifier si le mot de passe contient au moins un caractère spécial, un chiffre et une lettre
                var regex = /^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]{8,}$/;
                return regex.test(motDePasse);
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