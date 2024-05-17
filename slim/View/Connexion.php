<?php
session_start();
include  'C:\wamp64\www\VoxPulse\Controller\UserC.php';

$E = new UserC();

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $E->getUserCO($email, $password); // Get user with hashed password

    if ($user) {
        if (isset($user['status']) && $user['status'] === 'blocked') {
            header('Location: sign-in.php?error=account_blocked');
            exit;
        }

        $_SESSION['user'] = $user;

        $id = $user['id'];
        $E->setUserOnline($id);

        switch ($user['role']) {
            case "Evenement":
                header('Location: ./salima/dashboard.php');
                break;
            case "entreprise":
                header('Location: profile.php');
                break;
            case "Professionel":
                header('Location: profile.php');
                break;
                case "etudiant":
                    header('Location: profile.php');
                    break;
            case "Forum":
                header('Location: ./nour/dashboard/pages/dashboard.php');
                break;
            case "ODE":
                header('Location: ./Syrine/affiche_entretiens.php');
                break;
            case "Admin":
                header('Location: dashboard.php');
                break;
            default:
                header('Location: sign-in.php?error=unknown_role');
                break;
        }
        exit;
    } else {
        header('Location: sign-in.php?error=invalid_credentials');
        exit;
    }
} else {
    header('Location: sign-in.php?error=missing_data');
    exit;
}
?>