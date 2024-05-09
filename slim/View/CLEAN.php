<?php
session_start();
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';
$E = new UserC();
$E->cleanOldLogins();

header('Location: dashboard.php');
exit;

?>
