<?php
include 'C:\wamp64\www\VoxPulse2\VoxPulse\Model\config.php';

class eventC
{
    // AFFICHAGE 
    public function ListEvent()
{
    $conn = config::getConnexion();
    try {
        $query = $conn->prepare("SELECT * FROM event");
        $query->execute();
        $result = $query->fetchAll();
        
        $tableHTML = '<table class="table">';
        $tableHTML .= '<thead>';
        $tableHTML .= '<tr>';
        $tableHTML .= '<th>Photo</th>';
        $tableHTML .= '<th>ID</th>';
        $tableHTML .= '<th>Titre</th>';
        $tableHTML .= '<th>Description</th>';
        $tableHTML .= '<th>Cout</th>';
        $tableHTML .= '<th>Statut</th>';
        $tableHTML .= '<th>Date</th>';
        $tableHTML .= '<th>Lieu</th>';
        $tableHTML .= '<th>Nombre de places</th>';
        $tableHTML .= '<th>Action</th>'; // Nouvelle colonne pour les boutons d'action
        $tableHTML .= '</tr>';
        $tableHTML .= '</thead>';
        $tableHTML .= '<tbody>';
        
        foreach ($result as $row) {
            $tableHTML .= '<tr>';
            $tableHTML .= '<td><img src="' . $row['img'] . '" alt="Image"></td>';
            $tableHTML .= '<td>' . $row['id'] . '</td>';
            $tableHTML .= '<td>' . $row['titre'] . '</td>';
            $tableHTML .= '<td>' . $row['description'] . '</td>';
            $tableHTML .= '<td>' . $row['cout'] . '</td>';
            $tableHTML .= '<td>' . $row['statut'] . '</td>';
            $tableHTML .= '<td>' . $row['date'] . '</td>';
            $tableHTML .= '<td>' . $row['lieu'] . '</td>';
            $tableHTML .= '<td>' . $row['nb_places'] . '</td>';
            $tableHTML .= '<td><button class="btn btn-danger btn-supprimer" data-id="' . $row['id'] . '">Supprimer</button></td>';
            $tableHTML .= '<td><button class="btn btn-primary btn-update"
            data-id="' . $row['id'] . 
            '" data-titre="' . htmlspecialchars($row['titre']) .
            '" data-description="' . htmlspecialchars($row['description']) .
            '" data-cout="' . htmlspecialchars($row['cout']) .
            '" data-statut="' . htmlspecialchars($row['statut']) . 
            '" data-date="' . htmlspecialchars($row['date']) .
            '" data-lieu="' . htmlspecialchars($row['lieu']) .
            '" data-nb_places="' . htmlspecialchars($row['nb_places']) . '">Update</button></td>';
            $tableHTML .= '</tr>';
        }
        
        $tableHTML .= '</tbody>';
        $tableHTML .= '</table>';
        
        return $tableHTML;
    } catch (PDOException $e) {
        echo 'Échec de connexion : ' . $e->getMessage();
        return ''; // Si la connexion échoue, retourner une chaîne vide
    }
}

//cout des prochains evenements
public function sumUpcomingEventCosts()
{
    $conn = config::getConnexion(); // Assurez-vous que config::getConnexion() retourne une connexion PDO valide à votre base de données

    try {
        $query = $conn->prepare("SELECT SUM(cout) AS total_cost FROM event WHERE date >= CURDATE()");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Récupérer la somme des coûts des événements
        $totalCost = $result['total_cost'];

        return $totalCost; // Retourner la somme des coûts des événements

    } catch (PDOException $e) {
        echo 'Échec de connexion : ' . $e->getMessage();
        return 0; // Si la connexion échoue, retourner 0
    }
}

    //Count users 
    public function countEvent()
{
    $conn = config::getConnexion();
    try {
        $query = $conn->prepare("SELECT COUNT(*) as num_users from event");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Récupérer le nombre d'utilisateurs
        $numUsers = $result['num_users'];
        
        return $numUsers; // Retourner le nombre d'utilisateurs
        
    } catch (PDOException $e) {
        echo 'Échec de connexion : ' . $e->getMessage();
        return 0; // Si la connexion échoue, retourner 0
    }
}
//Inscription Aujourd'hui 
public function NouveauInscription()
{
    $conn = config::getConnexion();
    try {
        // Obtenir la date actuelle
        $date_crea = date("Y-m-d");

        $query = $conn->prepare("SELECT COUNT(*) as num_users from user WHERE date_Crea=:date_crea");
        $query->bindParam(':date_crea', $date_crea, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Récupérer le nombre d'utilisateurs
        $numUsers = $result['num_users'];
        
        return $numUsers; // Retourner le nombre d'utilisateurs
        
    } catch (PDOException $e) {
        echo 'Échec de connexion : ' . $e->getMessage();
        return 0; // Si la connexion échoue, retourner 0
    }
}
//prochain evenement (lieu)
public function getNextEventLocation()
{
    $conn = config::getConnexion(); // Assurez-vous que config::getConnexion() retourne une connexion PDO valide à votre base de données

    try {
        $query = $conn->prepare("SELECT lieu FROM event WHERE date >= CURDATE() ORDER BY date ASC LIMIT 1");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['lieu']; // Retourner le lieu du prochain événement
        } else {
            return null; // S'il n'y a pas d'événement trouvé, retourner null
        }

    } catch (PDOException $e) {
        echo 'Échec de connexion : ' . $e->getMessage();
        return null; // Si la connexion échoue, retourner null
    }
}

//prochain event(date)
public function getNextEventDate()
{
    $conn = config::getConnexion(); // Assurez-vous que config::getConnexion() retourne une connexion PDO valide à votre base de données

    try {
        $query = $conn->prepare("SELECT date FROM event WHERE date >= CURDATE() ORDER BY date ASC LIMIT 1");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['date']; // Retourner la date du prochain événement
        } else {
            return null; // S'il n'y a pas d'événement trouvé, retourner null
        }

    } catch (PDOException $e) {
        echo 'Échec de connexion : ' . $e->getMessage();
        return null; // Si la connexion échoue, retourner null
    }
}



//cout total
public function sumEventCosts()
{
    $conn = config::getConnexion(); // Assurez-vous que config::getConnexion() retourne une connexion PDO valide à votre base de données

    try {
        $query = $conn->prepare("SELECT SUM(cout) AS total_cost FROM event");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Récupérer la somme des coûts des événements
        $totalCost = $result['total_cost'];

        return $totalCost; // Retourner la somme des coûts des événements

    } catch (PDOException $e) {
        echo 'Échec de connexion : ' . $e->getMessage();
        return 0; // Si la connexion échoue, retourner 0
    }
}



    // GET event BY ID
    public function getEventById($id)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM event WHERE id=:id ");
            $query->bindParam(':id', $id);
            $query->execute();
            $result = $query->fetchAll();
            return $result; // Retourner le résultat de la requête
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
            return false; // En cas d'erreur, retourner false
        }
    }
    
    // SUPPRESSION 
    public function DeleteEvent($id)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("DELETE FROM event WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            echo $query->rowCount() . ' enregistrements supprimés avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    
    // AJOUT 
    public function AddEvent($titre,$description, $cout, $statut, $date, $lieu, $nb_places)
{
    try {
        $conn = config::getConnexion();
        $requete = $conn->prepare("INSERT INTO event (titre,description, cout, statut, date, lieu, nb_places) VALUES (:titre,:description, :cout, :statut, :date, :lieu, :nb_places)");
        $requete->bindParam(':titre', $titre);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':cout', $cout);
        $requete->bindParam(':statut', $statut);
        $requete->bindParam(':date', $date);
        $requete->bindParam(':lieu', $lieu);
        $requete->bindParam(':nb_places', $nb_places);
        $requete->execute();
        echo 'Événement ajouté avec succès';
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
}
    // UPDATE
    public function UpdateEvent($id,$img,$titre, $description, $cout, $statut, $date, $lieu, $nb_places)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("UPDATE event SET img=:img ,titre=:titre, description=:description , cout=:cout , statut=:statut ,date=:date, lieu=:lieu, nb_places=:nb_places WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->bindParam(':img', $img);
            $query->bindParam(':titre', $titre);
            $query->bindParam(':description', $description);
            $query->bindParam(':cout', $cout);
            $query->bindParam(':statut', $statut);
            $query->bindParam(':date', $date);
            $query->bindParam(':lieu', $lieu);
            $query->bindParam(':nb_places', $nb_places);
            $query->execute();
            echo $query->rowCount() . ' enregistrements mis à jour avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }



// Définir la fonction pour récupérer le titre par ID
function getTitleById() {
    $id = 35; // ID de l'événement fixé à 35

    try {
        // Établir la connexion à la base de données
        $conn = config::getConnexion();

        // Préparer la requête SQL
        $query = $conn->prepare("SELECT titre FROM event WHERE id = :id");

        // Exécuter la requête en liant le paramètre :id
        $query->bindParam(':id', $id);
        $query->execute();

        // Récupérer le résultat
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Vérifier si le résultat est valide
        if ($result) {
            return $result['titre']; // Retourner le titre
        } else {
            return null; // Si aucun résultat trouvé, retourner null
        }
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la base de données
        echo 'Échec de connexion : ' . $e->getMessage();
        return null; // Retourner null en cas d'erreur
    }
}
}

///////////////////////////////////////////////participation/////////////////////////////////////////////////////////////////////////////////



class participationC
{
    // AFFICHAGE 
    public function ListParticipation()
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM participation");
            $query->execute();
            $result = $query->fetchAll();
            
            $tableHTML = '<table class="table">';
            $tableHTML .= '<thead>';
            $tableHTML .= '<tr>';
            $tableHTML .= '<th>Image</th>';
            $tableHTML .= '<th>id</th>';
            $tableHTML .= '<th>nom</th>';
            $tableHTML .= '<th>prenom</th>';
            $tableHTML .= '<th>email</th>';
            $tableHTML .= '<th>tel</th>';
            $tableHTML .= '<th>etablissement</th>';
            $tableHTML .= '<th>Action</th>'; // Nouvelle colonne pour les boutons d'action
            $tableHTML .= '</tr>';
            $tableHTML .= '</thead>';
            $tableHTML .= '<tbody>';
            
            foreach ($result as $row) {
                $tableHTML .= '<tr>';
                //$tableHTML .= '<td><img src="' . $row['img'] . '" alt="Image"></td>';
                $tableHTML .= '<td>' . $row['id'] . '</td>';
                $tableHTML .= '<td>' . $row['nom'] . '</td>';
                $tableHTML .= '<td>' . $row['prenom'] . '</td>';
                $tableHTML .= '<td>' . $row['email'] . '</td>';
                $tableHTML .= '<td>' . $row['tel'] . '</td>';
                $tableHTML .= '<td>' . $row['etablissement'] . '</td>';
                $tableHTML .= '<td><button class="btn btn-danger btn-supprimer" data-id="' . $row['id'] . '">Supprimer</button></td>';
                $tableHTML .= '<td><button class="btn btn-primary" data-id="' . $row['id'] . '">Modifier</button></td>';
                $tableHTML .= '</tr>';
            }
            
            $tableHTML .= '</tbody>';
            $tableHTML .= '</table>';
            
            return $tableHTML;
        } catch (PDOException $e) {
            error_log('Échec de connexion : ' . $e->getMessage());
            return ''; // Si la connexion échoue, retourner une chaîne vide
        }
    }
    


    // GET USER BY ID
    public function getParticipationById($id)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM participation WHERE id=:id ");
            $query->bindParam(':id', $id);
            $query->execute();
            $result = $query->fetchAll();
            return $result; // Retourner le résultat de la requête
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
            return false; // En cas d'erreur, retourner false
        }
    }
    
    // SUPPRESSION 
    public function DeleteParticipation($id)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("DELETE FROM participation WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            echo $query->rowCount() . ' enregistrements supprimés avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    
    // AJOUT 
    public function AddParticipation($nom, $prenom, $email, $tel, $etablissement)
    {
        $conn = config::getConnexion();
        try {
            $requete = $conn->prepare("INSERT INTO participation (nom,prenom, email,tel,etablissement)");
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':prenom', $prenom);
            $requete->bindParam(':email', $email);
            $requete->bindParam(':tel', $tel);
            $requete->bindParam(':etablissement', $etablissement);
            $requete->execute();
            echo 'evenement ajouté avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    
    // UPDATE
    public function UpdateParticipation($id,$nom, $prenom, $email, $tel, $etablissement)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("UPDATE participation SET nom=:nom , prenom=:prenom , email=:email , tel=:tel ,etablissement=:etablissement WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':email', $email);
            $query->bindParam(':tel', $tel);
            $query->bindParam(':etablissement', $etablissement);
            $query->execute();
            echo $query->rowCount() . ' enregistrements mis à jour avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
}
?>




