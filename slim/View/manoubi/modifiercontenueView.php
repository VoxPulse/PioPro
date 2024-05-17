
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
include 'C:\wamp64\www\piopro2\VoxPulse\Controller\contenueC.php';
$contenueC = new contenueC();
$contenue=new contenue();
$contenue=$contenueC->getcontenue($_GET['id']);
if($contenue->getId() != "")
{
    
    $id=$contenue->getId();
    $url=$contenue->getUrl();
    $type=$contenue->getType();
    $id_F=$contenue->getId_F();
}
?>
<div style="border:2px solid;">
    <div class="custom-modal">
        <div class="modal-content">
            <h5>Modifier</h5>
            <form action="Modifiercontenue.php" method="post" onsubmit="return controleSaisie_offreEmploi();">
                <table>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="id">id:</label>
                                <input type="text" id="id" name="id" value="<?php echo $id; ?>" readonly>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="url">url:</label>
                                <input type="text" id="url" name="url" value="<?php echo $url; ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="type">type:</label>
                                <input type="text" id="type" name="type" value="<?php echo $type; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="id_F">id_F:</label>
                                <input type="text" id="id_F" name="id_F" value="<?php echo $id_F; ?>" readonly>
                            </div>
                        
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