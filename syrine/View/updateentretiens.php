<?php
include 'C:\wamp64\www\VoxPulse4\Controller\entretiensC.php';
$entretiensC = new entretiensC();
echo $_POST['id'] ;
echo $_POST['date'] ;
echo $_POST['heure'] ;
echo $_POST['statut'] ;
echo $_POST['url'] ;
echo $_POST['id_user'] ;
<<<<<<< HEAD
echo $_POST['id_offre'] ;
$entretiensC->updateentretiens($_POST['id'] , $_POST['date'] , $_POST['heure'] , $_POST['statut'] , $_POST['url'], $_POST['id_user'], $_POST['id_offre']);
=======
<<<<<<< HEAD
<<<<<<< HEAD
echo $_POST['id_offre'] ;
$entretiensC->updateentretiens($_POST['id'] , $_POST['date'] , $_POST['heure'] , $_POST['statut'] , $_POST['url'], $_POST['id_user'], $_POST['id_offre']);
=======
echo $_POST['id_user'] ;
$entretiensC->updateentretiens($_POST['id'] , $_POST['date'] , $_POST['heure'] , $_POST['statut'] , $_POST['url'], $_POST['id_user'], $_POST['id_off']);
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
echo $_POST['id_user'] ;
$entretiensC->updateentretiens($_POST['id'] , $_POST['date'] , $_POST['heure'] , $_POST['statut'] , $_POST['url'], $_POST['id_user'], $_POST['id_off']);
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
header("Location: affiche_entretiens.php");
?>