<?php
include_once 'C:\wamp64\www\VoxPulse\Controller\eventC.php';

$eventController = new eventC();
$events = $eventController->getAllEvents();

header('Content-Type: application/json');
echo json_encode($events);
?>
