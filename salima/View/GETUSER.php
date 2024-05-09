<?php
$E = new UserC;
// Vérifier si l'ID de l'utilisateur est passé en tant que paramètre dans la requête GET

    $id = $_GET['id'];
    // Appel de la fonction pour récupérer les détails de l'utilisateur en fonction de l'ID
    $userDetails = $E->getUserById($id);
    // Vérifier si les détails de l'utilisateur ont été récupérés avec succès
    if($userDetails) {
        // Renvoyer les données au format JSON
        header('Content-Type: application/json');
        echo json_encode($userDetails);
    } else {
        echo "Aucun utilisateur trouvé avec cet identifiant.";
    }
?>
