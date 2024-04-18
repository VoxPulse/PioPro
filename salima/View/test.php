<?php
include  'C:\wamp64\www\VoxPulse2\VoxPulse\Controller\eventC.php';
$E = new eventC;
$Num = $E->ListEvent();
echo $Num ;
?>