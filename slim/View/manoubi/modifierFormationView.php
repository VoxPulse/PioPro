
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
  <link rel="stylesheet" href="../Style.css">
  <!-- Supprimer-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function controleSaisie_offreEmploi() {
      var id = document.getElementById("id");
      var description = document.getElementById("description");
      var duree = document.getElementById("duree");
      var prix = document.getElementById("prix");
      var image = document.getElementById("image");
      var i=0;
      if (id.value == "") 
      {
        id.classList.add("invalid-input");
        
        id.style.border = "2px solid red";
        i=1;
      }
      if(description.value=="" || /^[a-zA-Z]+$/.test(description.value)==false)
      {
        description.style.border = "2px solid red";
        i=1;
      }
      if(duree.value=="" )
      {
        duree.style.border = "2px solid red";
        i=1;
      }
      if(prix.value=="" )
      {
        prix.style.border = "2px solid red";
        i=1;
      }
      
      if(i==1)
      {
        alert("veiller remplir tous les champs");
        return false;
      }
      
      return true;
    }
  </script>
</head>
<?php
include 'C:\wamp64\www\VoxPulse\Controller\formationC.php';
$formationC = new FormationC();
$formation=new Formation();
$formation=$formationC->getFormation($_GET['id']);
if($formation->getId() != "")
{
    
    $id=$formation->getId();
    $description=$formation->getDescription();
    $duree=$formation->getDuree();
    $prix=$formation->getPrix();
    $image=$formation->getImage();
}
?>
<div style="border:2px solid;">
    <div class="custom-modal">
        <div class="modal-content">
            <h5>Modifier</h5>
            <form action="ModifierFormation.php" method="post" onsubmit="return controleSaisie_offreEmploi();">
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
                                <label for="description">description:</label>
                                <input type="text" id="description" name="description" value="<?php echo $description; ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="duree">duree:</label>
                                <input type="text" id="duree" name="duree" value="<?php echo $duree; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="prix">prix:</label>
                                <input type="text" id="prix" name="prix" value="<?php echo $prix; ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="image">image:</label>
                                <input type="file" id="image" name="image" value="<?php echo $image; ?>">
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