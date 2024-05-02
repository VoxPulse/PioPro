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
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link rel="icon" type="image/png" href="./oneschool-master/images/logo 1.png">
</head>

<body class="">
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
              <ul class="navbar-nav mx-auto">
              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="./oneschool-master/index.html" class="btn btn-sm mb-0 me-1 btn-primary">Acceuil</a>
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
                    <button type="submit" class="btn btn-primary">Connecter</button>
                  </form>

                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Vous n'avez pas de Compte?
                    <a href="sign-up.php" class="text-primary text-gradient font-weight-bold">Créer un </a>
                  </p>
                  <p class="mb-4 text-sm mx-auto">
                    Mot de passe oublié?
                    <a href="../View/sign-up.html" class="text-primary text-gradient font-weight-bold">Récuperer le mot de passe </a>
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


</body>

</html>