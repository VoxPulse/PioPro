<?php
// Inclure le fichier de configuration de la base de données et d'autres fichiers nécessaires
include 'config.php';

// Vérifier si le paramètre de recherche est défini dans l'URL
if (isset($_GET['q'])) {
    // Récupérer la valeur de recherche depuis l'URL
    $searchInput = $_GET['q'];

    // Préparer la requête SQL pour récupérer les utilisateurs dont le CIN commence par la valeur de recherche
    $query = $conn->prepare("SELECT * FROM user WHERE cin LIKE :searchInput%");
    $query->bindParam(':searchInput', $searchInput, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll();

    // Générer le HTML pour afficher les résultats de la recherche
    $tableHTML = '';
    foreach ($result as $row) {
        $tableHTML .= '<tr>';
        // Ajouter les cellules de données appropriées ici (par exemple, ID, nom, prénom, etc.)
        $tableHTML .= '<td>' . $row['id'] . '</td>';
        $tableHTML .= '<td>' . $row['nom'] . '</td>';
        $tableHTML .= '<td>' . $row['prenom'] . '</td>';
        // Ajouter d'autres colonnes de données au besoin
        $tableHTML .= '</tr>';
    }

    // Retourner le HTML généré pour afficher les résultats de la recherche
    echo $tableHTML;
}
?>
