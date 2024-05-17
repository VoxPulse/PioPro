<?php
include __DIR__ . '\..\Controller\UserC.php';
$E=new UserC;
$employesList = $E->ListUser();

?>