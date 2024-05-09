
<?php

include 'C:\wamp64\www\VoxPulse2\VoxPulse\Controller\eventC.php';
$E = new eventC();
$listeevent = $E->getTitleById();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: chartreuse;">Coaching</a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="#">Formation</a>
                                  <a class="dropdown-item" href="#">Evénement</a>
                              </div>
                          </li>
                          <li><a href="#programs-section" class="nav-link" style="color: chartreuse;">Communauté</a></li>
                          <li><a href="#programs-section" class="nav-link" style="color: chartreuse;">Emploi</a></li>
                      </ul>
                  </nav>
              </div>
  
              <div class="ml-auto">
                  <nav class="site-navigation position-relative text-right" role="navigation">
                      <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                          <li class="cta"><a href="../sign-up.html" class="nav-link" style="color: chartreuse;"><span>Connexion</span></a></li>
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
                  <h1  data-aos="fade-up" data-aos-delay="100">Bienvenue !</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200"><b>Chez PioPo Du Début au pro , nous avons ce qu'il vous faut</b></p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="#" class="btn btn-primary py-3 px-5 btn-pill">S'abonner Mainetenant</a></p>

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
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
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
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14">

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="./images/manager.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <h3><a href="#">Manager</a></h3>
                <p>
                  Titre du poste : Manager des Ventes

Description :
Nous recherchons un Manager des Ventes dynamique pour diriger notre équipe de vente et atteindre nos objectifs de croissance. Expérience en gestion des ventes requise. Postulez maintenant ! </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 1 a postulé</div>
              </div>
            </div>

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="./images/help desk.webp" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <h3><a href="#">HELP DESK</a></h3>
                <p>Titre du poste : Support Technique Help Desk

                  Description :
                  Rejoignez notre équipe en tant que Support Technique Help Desk. Aucune expérience préalable requise. Formation complète fournie. Postulez maintenant !</p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2 ont postulés</div>
              </div>
            </div>

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="./images/Prog.webp" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <h3><a href="#">Programmeur

                </a></h3>
                <p>"Cours de conception de logo : Créez des logos mémorables en explorant le design graphique, la typographie et la couleur. Apprenez des techniques de conception, des croquis à la finalisation professionnelle." </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 5 ont postulés</div>
              </div>
            </div>


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

    <div class="site-section courses-title" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Formation</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14">

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="./images/Tara_Lets-Teach-about-Body-Language_Banner.png" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$20</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">Body Language</a></h3>
                <p>Langage corporel : gestes exprimant émotions en entretien. </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="./images/HELPDESK.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$99</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">HELP DESK</a></h3>
                <p>Formation Helpdesk : Apprenez à résoudre les problèmes informatiques. </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="images/javascript.png" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$99</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">JS Language de programmation </a></h3>
                <p>"Cours de JavaScript : Apprenez la programmation web."</p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>



            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$20</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">WorkShop CV</a></h3>
                <p>"Atelier CV : Créez des CV percutants." </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="./images/LOGO.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$99</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">Logo Design Course</a></h3>
                <p>"Cours de conception de logo : Créez des logos mémorables en explorant le design graphique, la typographie et la couleur. Apprenez des techniques de conception, des croquis à la finalisation professionnelle." </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="images/C-Programming-Language.png" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$99</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">C Language de programmation </a></h3>
                <p>
                  "JavaScript : Langage de programmation web. </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>

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

    <div class="site-section" id="programs-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Nos Programmes</h2>
            <p>Nos programmes offrent une approche holistique pour vous permettre d'acquérir les compétences et connaissances nécessaires pour réussir dans votre domaine professionnel. Avec des cours dynamiques et des ressources de pointe, nous vous préparons à exceller dans votre carrière!</p>
          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="./images/img_3.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4"><?php echo $listeevent ?></h2>
            <p class="mb-4">Des formations spécialisées dans une multitude de domaines professionnels pour répondre à vos besoins spécifiques.</p>

            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">60 événements organisés chaque année.</h3></div>
            </div>


          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="./images/OIP.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Accompagnement personnalisé pour chaque participant.</h2>
            <p class="mb-4">Un accompagnement personnalisé pour chaque participant, adapté à leurs besoins et objectifs individuels.</p>




          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="./images/Recrutement_shutterstock-Prostock-studio_1957830472.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Réseau de partenaires et d'entreprises pour des opportunités d'emploi.</h2>
            <p class="mb-4">Accédez à un vaste réseau de partenaires professionnels et d'entreprises offrant des opportunités d'emploi exclusives</p>

            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">22 931 embauchés chaque année</h3></div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
              <div><h3 class="m-0">150 000 offres d'emploi disponibles</h3></div>
            </div>

          </div>
        </div>

      </div>
    </div>

    <div class="site-section" id="teachers-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 mb-5 text-center"  data-aos="fade-up" data-aos-delay="">
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
          <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">

            <div class="p-4 rounded bg-white why-choose-us-box">

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Expertise de pointes</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Engagement envers l'excellence</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Support clientèle exceptionnel </h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Satisfaction garantie</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Personnalisation des services</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Transparence et intégrité </h3></div>
              </div>

            </div>


          </div>
          <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
            <img src="images/person_transparent.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    



    <div class="site-section bg-light" id="contact-section">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-md-7">


            
            <h2 class="section-title mb-3">Contactez-Nous !</h2>
            <p class="mb-5">Nous sommes là pour vous aider ! N'hésitez pas à nous contacter pour toute question, commentaire ou demande d'assistance. Remplissez simplement le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais. Votre satisfaction est notre priorité.</p>
          
            <form method="post" data-aos="fade">
              <div class="form-group row">
                <div class="col-md-6 mb-3 mb-lg-0">
                  <input type="text" class="form-control" placeholder="Prénom">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Nom">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="objet">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="email" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <textarea class="form-control" id="" cols="30" rows="10" placeholder="Ecrivez votre message ici ."></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  
                  <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Envoyer">
                </div>
              </div>

            </form>
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
              <li><a href="#">Offres d'emplois</a></li>
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
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Ce modèle est réalisé avec PIO-PRO 
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