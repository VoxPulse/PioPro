<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PioPro Forum</title>
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
    <link rel="stylesheet" href="css/commentaire.css">
    <link rel="stylesheet" href="css/voice.css">
    <link rel="icon" type="image/png" href="../images/logo 1.png">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
                  <img src="../images/logo 1.png" alt="Description de votre image" width="50" height="50" style="margin-right: 10px;">
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
                          <li class="cta"><a href="#contact-section" class="nav-link" style="color: chartreuse;"><span>Connexion</span></a></li>
                      </ul>
                  </nav>
                  <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
              </div>
          </div>
      </div>
  </header>
  
  

    
   <!--======= welcome section on top background=====-->
   <section class="welcome-part-one">
    <div class="container">
      <div class="welcome-demop102 text-center">
        <h1><br><br></br></br></h1>
        <h2>Bienvenue sur le forum PioPro</h2>
        <p>
          Bienvenue sur notre forum en ligne ! <br>
          Nous sommes ravis que vous rejoigniez notre communauté. </br>
          Que vous soyez ici pour partager votre expertise, demander des conseils ou simplement vous<br>
          connecter avec des personnes partageant les mêmes idées, vous êtes au bon endroit.</br>
        </p>
        
        <div class="overlay" id="overlay"></div>
        <div class="form-style8292" id="questionInput">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                </span>
                <input
                    type="text"
                    class="form-control form-control8392"
                    placeholder="Posez une question et soyez sûr de trouver votre réponse !"
                    onclick="showQuestionForm()"
                />
            </div>
        </div>
        <div class="form-container" id="questionForm1">
          <?php
              if(isset($_GET['id']))
              {
                require_once __DIR__ . '/../../Controllers/PublicationC.php';
                $pub1=new PublicationC();
                $id = $_GET['id'];
                $row = $pub1->getPublicationById($id);
                if ($row !== false) 
                {
                    echo '<h5>Veuillez confirmer</h5>
                    <p style="background-color: white; color: black; border: none; box-shadow: none; ">Voulez-vous vraiment supprimer cet élément ?</p>
                    <button onclick="hideConfirmationPopup()" style="background-color: #f44336; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px; margin-right: 10px;">Annuler</button>
                    <button style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px;">
                        <a href="delete_publication.php?id='.$id .'" style="color: inherit; text-decoration: none;">Supprimer</a>
                    </button>'
                    ;
                } 
                else 
                {
                    echo "Publication not found.";
                }
              }  
               
          ?>
        </div>
        
          <div class="form-container" id="questionForm">
                <h4>Créer une publication</h4>
                <div class="close-button" onclick="hideQuestionForm()">X</div>
        
          <?php 
          if(isset($_GET['id']))
          {
            require_once __DIR__ . '/../../Controllers/PublicationC.php';
            $pub1=new PublicationC();
            $id = $_GET['id'];
            $row = $pub1->getPublicationById($id);
            if ($row !== false) 
            {
                $id_user = $row['id_user'];
                $titre=$row['titre'];
                $contenu=$row['contenu'];
            } 
            else 
            {
                echo "Publication not found.";
            }
          }
          ?>
           
          

           <form action="submit_publication.php?<?php if (isset($id)){echo "id=update";} ?>" method="POST" id="publier">
           <input type="hidden" name="id" value="<?php if (isset($id)){echo $_GET['id'];}?>">
            <div class="userId-part940">
                <span class="form-description43">User ID* </span>
                <input type="text" name="id_user" id="form_id_user" class="username029" placeholder="Entrez ID" value="<?php if (isset($id)){echo $id_user;}?>"  <?php if (isset($id_user)) { echo 'readonly'; } ?> >  
                <span id="form_user_idError" class="error"></span>
            </div>
            <div class="question-title39">
                <span class="form-description43">Titre* </span>
                <input type="text" name="titre" id="form_titre" class="question-ttile32" placeholder="Entrez le titre de votre publication" value="<?php if (isset($id)){echo $titre;}?>">
                <span id="form_titreError" class="error"></span>
            </div>
            <div class="details2-239">
              <span class="form-description43">Contenu* </span>
              <textarea id="txtEditor" class="big-textarea" name="contenu" id="form_contenu"><?php if (isset($id)){echo $contenu;}?></textarea>
              <span id="form_contenuError" class="error"></span>
            </div>	
            <div class="button-group-addfile3239">
              <span class="form-description43">Attachment</span>
              <input type="file" name="ffile" class="question-ttile3226">
            </div>
            <div class="publish-button2389">
              <button type="submit" class="publis1291" >
                <?php
                    if(isset($id))
                    { 
                      echo "Modifier";
                    }
                    else
                    {
                      echo "Publier";
                    }
                ?>
              </button> 
            </div>
          </form>       
        </div>
        
      </div>
    </div>
  </section>

  <!-- ======content section/body=====-->
  <section class="main-content920">
  <div class="form-containerComment" id="commentForm">
                <div class="close-button" onclick="hideConfirmationPopupComment()">X</div>
                <?php 
                  if(isset($_GET['id_comment']))
                  {
                  
                    require_once __DIR__ . '/../../Controllers/commentaireC.php';
                    $comment1=new commentaireC();
                    $id_comment = $_GET['id_comment'];
                    $row = $comment1->getCommentById($id_comment);
                    if ($row !== false) 
                    {
                        echo '<h5>Veuillez confirmer</h5>
                        <p style="background-color: white; color: black; border: none; box-shadow: none;">Voulez-vous vraiment supprimer cet élément ?</p>
                        <button onclick="hideConfirmationPopupComment()" style="background-color: #f44336; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px; margin-right: 10px;">Annuler</button>
                        <button style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px;">
                            <a href="delete_comment.php?id_comment='.$id_comment .'&delete_comment_pub=' . $_GET['delete_comment_pub'] .'" style="color: inherit; text-decoration: none;">Supprimer</a>
                        </button>'
                        ;
                    } 
                    else 
                    {
                        echo "Comment not found.";
                    }
                  } 
                  else 
                  {
                    error_log("ID not received");
                  }
                ?>
              </div>  
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div id="main">
            <input id="tab1" type="radio" name="tabs" checked />
            <label for="tab1">Plus Récentes</label>
            <input id="tab2" type="radio" name="tabs" />
            <label for="tab2">Plus Anciennes</label>
            <input id="tab3" type="radio" name="tabs" />
            <label for="tab3">Plus Répondues</label>
            <input id="tab4" type="radio" name="tabs" />
            <label for="tab4">Moins Répondues</label>

            
               
              <?php   
                require_once __DIR__ . '/../../Models/publication.php';
                require_once __DIR__ . '/../../Controllers/PublicationC.php';
                
                $pub1 = new PublicationC();
                $titre = isset($_GET['titre']) ? $_GET['titre'] : "";
              ?>
              <section id="content1">
              <?php   
                
                $pub1->afficherPub($titre,'date_crea', 'DESC'); 
              ?>

              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </section>

            <section id="content2">
            <?php 
            $pub1->afficherPub($titre,'date_crea', 'ASC');
            ?>
              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </section>

            <section id="content3">
            <?php 
            $pub1->afficherPub($titre,'nb_comment', 'DESC'); 
            ?>
              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </section>

            <section id="content4">
              <?php 
              $pub1->afficherPub($titre,'nb_comment', 'ASC'); 
              ?>
              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </section>
          </div>
        </div>
        <!--end of col-md-9 -->
        <!--strart col-md-3 (side bar)-->
        <aside class="col-md-3 sidebar97239">
          <div class="status-part3821">
            <h4>Recherche</h4>
            <form action="index.php" method="GET" class="rechercheForum">
                <input type="text" name="titre" placeholder="Entrez le titre de la publication" value="<?php echo isset($_GET['titre']) ? htmlspecialchars($_GET['titre']) : ''; ?>">
                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></button>
            </form>

          </div>
          <!--          start tags part-->
          <div class="tags-part2398">
            <h4>Tags</h4>
            <ul>
              <li><a href="#">analytics</a></li>
              <li><a href="#">Computer</a></li>
              <li><a href="#">Developer</a></li>
              <li><a href="#">Google</a></li>
              <li><a href="#">Interview</a></li>
              <li><a href="#">Programmer</a></li>
              <li><a href="#">Salary</a></li>
              <li><a href="#">University</a></li>
              <li><a href="#">Employee</a></li>
            </ul>
          </div>
          <!--          End tags part-->
         
          <!--             social part -->
          <div class="social-part2189">
            <h4>Find us</h4>
            <li class="rss-one">
              <a href="#" target="_blank">
                <strong>
                  <span>S'inscrire</span>
                  <i class="fa fa-rss" aria-hidden="true"></i>

                  <br />
                  <small>To RSS Feed</small>
                </strong>
              </a>
            </li>
            <li class="facebook-two">
              <a href="#" target="_blank">
                <strong>
                  <span>S'inscrire</span>
                  <i class="fa fa-facebook" aria-hidden="true"></i>

                  <br />
                  <small>To Facebook Feed</small>
                </strong>
              </a>
            </li>
            <li class="twitter-three">
              <a href="#" target="_blank">
                <strong>
                  <span>S'inscrire</span>
                  <i class="fa fa-twitter" aria-hidden="true"></i>

                  <br />
                  <small>To twitter Feed</small>
                </strong>
              </a>
            </li>
            <li class="youtube-four">
              <a href="#" target="_blank">
                <strong>
                  <span>S'inscrire</span>
                  <i class="fa fa-youtube" aria-hidden="true"></i>

                  <br />
                  <small>To youtube Feed</small>
                </strong>
              </a>
            </li>
          </div>
         
        </aside>
      </div>
    </div>
  </section>
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
  <script src="js/controlePub.js"></script>
  <script src="js/controleComment.js"></script>
  <script src="js/main.js"></script>
  <script src="js/vrecorder.js"></script>
  <!-- Script JavaScript pour gérer l'interaction avec les statuts -->
  
  
   
 
  </body>
</html>