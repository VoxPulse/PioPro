<?php

include 'C:\wamp64\www\piopro2\VoxPulse\Controller\formationC.php';
include 'C:\wamp64\www\piopro2\VoxPulse\Controller\contenueC.php';
$formation = new FormationC;
if($formation->formationExists($_POST['id_F']) == true)
{
    $contenueC = new contenueC();
    $contenueC->addContenue($_POST['id'] , $_POST['url'] , $_POST['type'] , $_POST['id_F'] );
    header("Location: contenueView.php");
}
else
{
    echo "id n'existe pas";
}
?>