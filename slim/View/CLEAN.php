<?php
session_start();
include __DIR__ . '\..\Controller\UserC.php';
$E = new UserC();
$E->cleanOldLogins();

header('Location: dashboard.php');
exit;

?>
