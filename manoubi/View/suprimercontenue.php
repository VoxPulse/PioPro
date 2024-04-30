
<?php
include 'C:\wamp64\www\piopro2\VoxPulse\Controller\contenueC.php';
$contenue = new contenueC();
$contenue->deletecontenue($_GET['id']);
header("Location: contenueView.php");
?>