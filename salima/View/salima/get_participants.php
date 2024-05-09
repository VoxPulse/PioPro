<?php
if(isset($_POST['eventId'])) {
    $eventId = $_POST['eventId'];
    $bdd3 = new PDO('mysql:host=localhost;dbname=piopro', 'root', '');
    // Exécutez une requête SQL pour récupérer les participants de cet événement en utilisant une jointure
    // Assurez-vous d'adapter cette requête en fonction de votre schéma de base de données
    $sql = "SELECT participation.id AS participant_id, participation.prenom AS participant_nom, participation.email AS participant_email 
            FROM participation 
            INNER JOIN event ON participation.id_event = event.id 
            WHERE event.id = :eventId";
    $stmt = $bdd3->prepare($sql);
    $stmt->bindParam(':eventId', $eventId);
    $stmt->execute();
    $participants = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Formattez les participants en HTML et renvoyez-les
    $html = '<ul>';
    foreach ($participants as $participant) {
        $html .= '<li>ID: ' . $participant['participant_id'] . ', Nom: ' . $participant['participant_nom'] . ', Email: ' . $participant['participant_email'] . '</li>';
    }
    $html .= '</ul>';

    echo $html;
}
?>
