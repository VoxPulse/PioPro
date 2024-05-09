<?php
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';

$E = new UserC;
$A = new UserC;

    $mdp = $_POST["MDP"];
    $mdp2 = $_POST["MDP2"];
    $codeVERIF = $_POST["CODE1"];

        if ($A->tokenExists($codeVERIF)) {
            $E->updatePasswordByToken($codeVERIF, $mdp);
            header('Location:sign-in.php');
        } else {
            echo "<script>alert('le code de verification est incorrect');</script>";
        }


?>
