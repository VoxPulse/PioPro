<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données soumises du formulaire
    $name = $_POST["prenom"];
    $lastName = $_POST["nom"];
    $phoneNumber = $_POST["tel"];
    $email = $_POST["email"];
    $establishment = $_POST["etablissement"];
    $event = $_POST["evenement"]; // Je suppose qu'il y a un champ select pour choisir un événement

    // Validation des données si nécessaire

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "piopro";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configure le mode d'erreur PDO à exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prépare et exécute la requête SQL d'insertion
        $sql = "INSERT INTO votre_table (name, lastname, phone_number, email, establishment, event)
                VALUES (:name, :lastName, :phoneNumber, :email, :establishment, :event)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'lastName' => $lastName,
            'phoneNumber' => $phoneNumber,
            'email' => $email,
            'establishment' => $establishment,
            'event' => $event
        ]);

        echo "Les données ont été enregistrées avec succès.";
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    // Ferme la connexion à la base de données
    $conn = null;
}
?>
