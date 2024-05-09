
<?php
    include 'C:\wamp64\www\VoxPulse4\Controller\offre_emploiC.php';


    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Ajoutez ici votre fonction de contrôle de saisie pour valider les données du formulaire
        function controleSaisie_offreEmploi() {
            // Récupère les données du formulaire
            $id = $_POST['id'];
            $titre_p = $_POST['titre_p'];
            $description = $_POST['description'];
            $date_fin = $_POST['date_fin'];
            $salaire = $_POST['salaire'];
            $categorie = $_POST['categorie'];

            // Validation de l'ID
            if (strlen($id) !== 8 || !is_numeric($id)) {
                echo "<script>alert('Veuillez saisir un ID valide de 8 chiffres.')</script>";
                return false;
            }

            // Validation du titre
            if (!preg_match("/^[A-Z][a-zA-Z\s]*$/", $titre_p)) {
                echo "<script>alert('Veuillez saisir un titre valide commençant par une majuscule.')</script>";
                return false;
            }

            // Validation de la description
            if (strlen($description) < 18 || substr($description, -1) !== ".") {
                echo "<script>alert('La description doit contenir au moins 18 caractères et se terminer par un point.')</script>";
                return false;
            }

            // Validation de date_fin
            $currentDate = date("Y-m-d");
            if ($date_fin <= $currentDate) {
                echo "<script>alert('La date de fin doit être dans le futur.')</script>";
                return false;
            }

            // Autres validations pour les autres champs...

            // Si tout est correct, retourne true
            return true;
        }

        // Si la fonction de contrôle de saisie renvoie true, ajoutez l'offre d'emploi à la base de données
        if (controleSaisie_offreEmploi()) {
            // Crée une instance de la classe Offre_emploiC
            $offre_emploiC = new Offre_emploiC();

            // Récupère les données du formulaire
            $id = $_POST['id'];
            $titre_p = $_POST['titre_p'];
            $description = $_POST['description'];
            $date_fin = $_POST['date_fin'];
            $salaire = $_POST['salaire'];
            $categorie = $_POST['categorie'];

            // Ajoute l'offre d'emploi à la base de données
            $offre_emploiC->addOffre($id, $titre_p, $description, $date_fin, $salaire, $categorie);

            // Redirection vers une autre page après l'ajout de l'offre d'emploi
            header("Location: index1.php");
            exit(); // Arrête l'exécution du script pour éviter toute sortie supplémentaire
        } 
    }


    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>PioPro-Accueil</title>
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


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner" style="left: 0px; top: 9px">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img src="./images/logo 1.png" alt="Description de votre image" width="50" height="50" style="margin-right: 10px;">
                    <div class="site-logo mr-auto"><a href="index.html" style="color: chartreuse;">PioPro</a></div>
                </div>

                <div class="ml-auto">
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

                            <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">

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
            </div>
        </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-7 text-center">
                <button href="open_folder.php" target="_blank" class="customNextBtn btn btn-primary m-1">Appuyez pour une expérience inoubliable!</button>
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
                            <a href="course-single.html"><img src="./images/Prog.webp" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <h3><a href="#">Programmeur</a></h3>
                            <p>"Cours de conception de logo : Créez des logos mémorables en explorant le design graphique, la typographie et la couleur. Apprenez des techniques de conception, des croquis à la finalisation professionnelle." </p>
                        </div>
                        <div class="d-flex border-top stats">
                            <div class="py-3 px-4"><span class="icon-users"></span> 5 ont postulé</div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-7 text-center">
                    <button class="customPrevBtn btn btn-primary m-1" onclick="scrollToAjouterOffre()">Ajouter un offre</button>
                    <button class="customNextBtn btn btn-primary m-1">Suivant</button>
                </div>
            </div>
        </div>
    </div>



    <div class="site-section bg-image overlay" style="background-image: url('images/hero_1.jpg');">
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
            </div>
            <div class="row">
                <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
                    &nbsp;</div>
            </div>
        </div>
    </div>



    <div class="site-section bg-light" id="contact-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-7">

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" data-aos="fade" >
                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-lg-0">
                                <input type="text" class="form-control" placeholder="Id" name="id">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Titre" name="titre_p">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Salaire" name="salaire">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <select class="form-control" name="categorie">
                                    <option value="Ingenieur">Ingenieur</option>
                                    <option value="Medecin">Medecin</option>
                                    <option value="Technicien">Technicien</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="date" class="form-control" placeholder="Date Fin" name="date_fin">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea class="form-control" id="" cols="30" rows="10" placeholder="Description..." name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Ajouter" >
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

 <div class="site-section courses-title" id="courses-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                <div class="qr-header ">
            <h2 class="section-title">Generate QR Code</h2>
            <div class="site-section bg-light" id="contact-section">
        <div class="container">
</div>
</div>
<div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Id Offre Emploi" id="qr-text">
                            </div>
                        </div>
            
            <div>
            <div class="form-group row">
                            
            <label for="sizes" >Select Size:</label>
            <select id="sizes" class="col-md-12">
                <option value="100">100x100</option>
                <option value="200">200x200</option>
                <option value="300">300x300</option>
                <option value="400">400x400</option>
                <option value="500">500x500</option>
                <option value="600">600x600</option>
                <option value="700">700x700</option>
                <option value="800">800x800</option>
                <option value="900">900x900</option>
                <option value="1000">1000x1000</option>
            </select>
        </div>
        </div>
</div>
<div class="qr-body"></div>
        <div class="qr-footer">
            <button href="" id="generateBtn" class="customNextBtn btn btn-primary m-1">Generate</button>
            <a href="" id="downloadBtn" class="customNextBtn btn btn-primary m-1" download="QR_Code.png">Download</a>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>

    
    
    <script>const qrText = document.getElementById('qr-text');
        const sizes = document.getElementById('sizes');
        const generateBtn = document.getElementById('generateBtn');
        const downloadBtn = document.getElementById('downloadBtn');
        const qrContainer = document.querySelector('.qr-body');
        
        let size = sizes.value;
        generateBtn.addEventListener('click',(e)=>{
            e.preventDefault();
            isEmptyInput();
        });
        
        sizes.addEventListener('change',(e)=>{
            size = e.target.value;
            isEmptyInput();
        });
        
        downloadBtn.addEventListener('click', ()=>{
            let img = document.querySelector('.qr-body img');
        
            if(img !== null){
                let imgAtrr = img.getAttribute('src');
                downloadBtn.setAttribute("href", imgAtrr);
            }
            else{
                downloadBtn.setAttribute("href", `${document.querySelector('canvas').toDataURL()}`);
            }
        });
        
        function isEmptyInput(){
            // if(qrText.value.length > 0){
            //     generateQRCode();
            // }
            // else{
            //     alert("Enter the text or URL to generate your QR code");
            // }
            qrText.value.length > 0 ? generateQRCode() : alert("Enter the text or URL to generate your QR code");;
        }
        function generateQRCode(){
            qrContainer.innerHTML = "";
            new QRCode(qrContainer, {
                text:qrText.value,
                height:size,
                width:size,
                colorLight:"#fff",
                colorDark:"#000",
            });
        }
        </script>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

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


<script>
    function scrollToAjouterOffre() {
        var contactSection = document.getElementById("contact-section");
        contactSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
</script>


// Ajout de la nouvelle offre d'emploi à la division owl-carousel
document.getElementById("offres-container").innerHTML += offreHtml;


<script src="js/main.js"></script>

</body>
</html>
