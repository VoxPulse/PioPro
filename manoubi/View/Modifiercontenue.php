<?php
include 'C:\wamp64\www\piopro2\VoxPulse\Controller\contenueC.php';

$contenueC = new contenueC();
$contenueC->updatecontenue($_POST['id'] , $_POST['url'] , $_POST['type'] , $_POST['id_F']);
header("Location: contenueView.php");
?>