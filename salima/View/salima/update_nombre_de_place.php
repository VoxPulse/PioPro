<?php
// Vérifiez si l'ID est envoyé en tant que paramètre POST
if(isset($_POST['id'])) {
    $selectedID = $_POST['id'];

    // Connectez-vous à votre base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "piopro";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Définir le mode d'erreur PDO à exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Exécutez votre requête SQL pour décrémenter l'attribut "Nombre de place"
        $sql = "UPDATE event SET NBPD = NBPD - 1 WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $selectedID);
        $stmt->execute();
        
        echo "Mise à jour effectuée avec succès.";
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
