<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./oneschool-master/images/logo 1.png">
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
  <link rel="stylesheet" href="../Style2.css">
  <!-- Supprimer-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="C:\wamp64\www\VoxPulse4\oneschool-master\css\style2.css">
  <style>
    /* Style du formulaire */
/* Style du formulaire */
.custom-modal {
    background-color: #f9f9f9;
    border-radius: 20px;
    box-shadow: 0px 0px 20px rgba(0, 123, 255, 0.3); /* Shadow bleu */
    padding: 40px;
    max-width: 600px; /* Cadre plus grand */
    margin: 0 auto; /* Centrer horizontalement */
}

.modal-content {
    text-align: center;
}

.form-group {
    margin-bottom: 25px;
}

/* Style des boutons */
.button-container {
    margin-top: 40px;
    display: flex;
    justify-content: center;
}

.btn {
    padding: 15px 30px;
    border-radius: 30px;
    cursor: pointer;
    font-size: 18px;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
}

.btn-danger:hover {
    background-color: #c82333;
}

/* Style des champs de formulaire */
input[type="text"] {
    width: calc(100% - 20px);
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus {
    border-color: #007bff; /* Couleur bleue au focus */
    outline: none;
}

/* Style du titre */
h5 {
    margin-top: 0;
}

/* Style de la bordure autour du formulaire */
.custom-modal {
    border: 2px solid #007bff; /* Bordure bleue */
}


  
  </style>
</head>
<?php
include 'C:\wamp64\www\VoxPulse4\Controller\offre_emploiC.php';
$offre_emploiC = new offre_emploiC();
$offre_emploi=new offre_emploi ();
$offre_emploi=$offre_emploiC->getOffre($_GET['id']);
if($offre_emploi->getId() != "")
{
    $id=$offre_emploi->getId();
    $TitreP=$offre_emploi->getTitreP();
    $Description=$offre_emploi->getDescription();
    $date_fin=$offre_emploi->getdate_fin();
    $Salaire=$offre_emploi->getSalaire();
    $Categorie=$offre_emploi->getCategorie();
}
?>
<div">
    <div class="custom-modal">
        <div class="modal-content">
            <h5>Modifier</h5>
            <form action="updateOffre.php" method="post" >
                <table>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="id">id:</label>
                                <input type="text" id="id" name="id" value="<?php echo $id; ?>">
                            </div>
                        </td>
                        
                        <td>
                            <div class="form-group">
                                <label for="TitreP">TitreP:</label>
                                <input type="text" id="titre_p" name="titre_p" value="<?php echo $TitreP; ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" id="description" name="description" value="<?php echo $Description; ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="date_fin">date_fin:</label>
<<<<<<< HEAD
                                <input type="date" id="date_fin" name="date_fin" value="<?php echo $date_fin; ?>">
=======
                                <input type="text" id="date_fin" name="date_fin" value="<?php echo $date_fin; ?>">
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="Salaire">Salaire:</label>
                                <input type="text" id="salaire" name="salaire" value="<?php echo $Salaire; ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="Categorie">Categorie:</label>
                                <input type="text" id="categorie" name="categorie" value="<?php echo $Categorie; ?>">
                            </div>
                        </td>
                    </tr>
                    
                </table>
                <div class="button-container">
                    <button class="btn btn-danger btn-Terminer">Terminer</button>
                    <button class="btn btn-primary btn-Annuler">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
