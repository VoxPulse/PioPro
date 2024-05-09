<?php
include 'C:\wamp64\www\PROJET\VoxPulse\Model\config.php';

class eventC
{
    // AFFICHAGE 
    public function ListEvent()
    {
        $conn = config::getConnexion();
        try {
            //filtrage 
            $query = $conn->prepare("SELECT * FROM event  ORDER BY titre ASC");
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
            $tableHTML .= '<th>Les places disponibles</th>';
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
                $tableHTML .= '<td>' . $row['NBPD'] . '</td>';
                $tableHTML .= '<td><button class="btn btn-danger btn-supprimer" data-id="' . $row['id'] . '">Supprimer</button></td>';
                $tableHTML .= '<td><button class="btn btn-primary btn-update"
            data-id="' . $row['id'] .
                    '" data-titre="' . htmlspecialchars($row['titre']) .
                    '" data-description="' . htmlspecialchars($row['description']) .
                    '" data-cout="' . htmlspecialchars($row['cout']) .
                    '" data-statut="' . htmlspecialchars($row['statut']) .
                    '" data-date="' . htmlspecialchars($row['date']) .
                    '" data-lieu="' . htmlspecialchars($row['lieu']) .
                    '" data-nb_places="' . htmlspecialchars($row['nb_places']) . '">Modifier</button></td>';
                $tableHTML .= '<td><button class=" btn btn-primary5" data-id="' . $row['id'] . '">Partcipant</button></td>';
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


    public function Historique()
    {
        $conn = config::getConnexion();
        try {
            //filtrage 
            $query = $conn->prepare("SELECT * FROM historiquee  ");
            $query->execute();
            $result = $query->fetchAll();

            $tableHTML = '<table class="table">';
            $tableHTML .= '<thead>';
            $tableHTML .= '<tr>';
            $tableHTML .= '<th>type_action</th>';
            $tableHTML .= '<th>description</th>';
            $tableHTML .= '<th>date_action</th>'; // Nouvelle colonne pour les boutons d'action
            $tableHTML .= '</tr>';
            $tableHTML .= '</thead>';
            $tableHTML .= '<tbody>';

            foreach ($result as $row) {
                $tableHTML .= '<tr>';
                $tableHTML .= '<td>' . $row['type_action'] . '</td>';
                $tableHTML .= '<td>' . $row['description'] . '</td>';
                $tableHTML .= '<td>' . $row['date_action'] . '</td>';
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

    public function getAllEventDates()
    {
        $conn = config::getConnexion(); // Assurez-vous que config::getConnexion() retourne une connexion PDO valide à votre base de données

        try {
            $query = $conn->prepare("SELECT date FROM event");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            $eventDates = array(); // Initialisation du tableau pour stocker les dates des événements

            foreach ($results as $result) {
                $eventDates[] = $result['date']; // Ajouter chaque date à notre tableau
            }

            return $eventDates; // Retourner le tableau contenant toutes les dates des événements
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
            return array(); // En cas d'échec de la connexion, retourner un tableau vide
        }
    }

    public function getAllEvents()
    {
        $conn = config::getConnexion(); // Assurez-vous que config::getConnexion() retourne une connexion PDO valide à votre base de données

        try {
            $query = $conn->prepare("SELECT * FROM event");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            return $results; // Retourner tous les événements de la base de données
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
            return array(); // En cas d'échec de la connexion, retourner un tableau vide
        }
    }
    //pour le front 
    public function getAllEventTitlesAndIds()
    {
        $conn = config::getConnexion(); // Assurez-vous que config::getConnexion() retourne une connexion PDO valide à votre base de données

        try {
            $query = $conn->prepare("SELECT id, titre FROM event");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            $eventData = array(); // Initialisation du tableau pour stocker les données des événements (ID et titre)

            foreach ($results as $result) {
                $eventData[] = array(
                    'id' => $result['id'],
                    'titre' => $result['titre']
                ); // Ajouter chaque paire ID-titre à notre tableau
            }

            return $eventData; // Retourner le tableau contenant les données des événements
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
            return array(); // En cas d'échec de la connexion, retourner un tableau vide
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
    public function AddEvent($titre, $description, $cout, $statut, $date, $lieu, $nb_places, $NBPD)
    {
        try {
            $conn = config::getConnexion();
            $requete = $conn->prepare("INSERT INTO event (titre,description, cout, statut, date, lieu, nb_places, NBPD) VALUES (:titre,:description, :cout, :statut, :date, :lieu, :nb_places, :NBPD)");
            $requete->bindParam(':titre', $titre);
            $requete->bindParam(':description', $description);
            $requete->bindParam(':cout', $cout);
            $requete->bindParam(':statut', $statut);
            $requete->bindParam(':date', $date);
            $requete->bindParam(':lieu', $lieu);
            $requete->bindParam(':nb_places', $nb_places);
            $requete->bindParam(':NBPD', $NBPD);
            $requete->execute();
            echo 'Événement ajouté avec succès';
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }
    }

    
    public function AddHISTO($action, $description, $date)
    {
        try {
            $conn = config::getConnexion();
            $requete = $conn->prepare("INSERT INTO  historiquee (type_action,description,date_action) VALUES (:type_action,:description,:date_action)");
            $requete->bindParam(':type_action',$action);
            $requete->bindParam(':description', $description);
            $requete->bindParam(':date_action', $date);
            $requete->execute();
            echo 'Événement ajouté avec succès';
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }
    }
    // UPDATE
    public function UpdateEvent($id, $img, $titre, $description, $cout, $statut, $date, $lieu, $nb_places)
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
    function getTitleById()
    {
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
            //f
            $query = $conn->prepare("SELECT * FROM participation  ORDER BY id ASC");
            $query->execute();
            $result = $query->fetchAll();

            $tableHTML = '<table class="table">';
            $tableHTML .= '<thead>';
            $tableHTML .= '<tr>';
            $tableHTML .= '<th>id</th>';
            $tableHTML .= '<th>nom</th>';
            $tableHTML .= '<th>prenom</th>';
            $tableHTML .= '<th>email</th>';
            $tableHTML .= '<th>tel</th>';
            $tableHTML .= '<th>etablissement</th>';
            $tableHTML .= '<th>Description</th>';
            $tableHTML .= '<th>Id_event</th>';
            $tableHTML .= '<th>Supprimer</th>';
            $tableHTML .= '<th>Modifier</th>';
            $tableHTML .= '</tr>';
            $tableHTML .= '</thead>';
            $tableHTML .= '<tbody>';

            foreach ($result as $row) {
                $tableHTML .= '<tr>';
                $tableHTML .= '<td>' . $row['id'] . '</td>';
                $tableHTML .= '<td>' . $row['nom'] . '</td>';
                $tableHTML .= '<td>' . $row['prenom'] . '</td>';
                $tableHTML .= '<td>' . $row['email'] . '</td>';
                $tableHTML .= '<td>' . $row['tel'] . '</td>';
                $tableHTML .= '<td>' . $row['etablissement'] . '</td>';
                $tableHTML .= '<td>' . $row['description'] . '</td>';
                $tableHTML .= '<td>' . $row['id_event'] . '</td>';
                $tableHTML .= '<td><button class="btn btn-danger btn-supprimer1" data-id="' . $row['id'] . '">Supprimer</button></td>';
                $tableHTML .= '<td><button class="btn btn-primary6 "
                    data-id="' . $row['id'] .
                    '" data-nom="' . htmlspecialchars($row['nom']) .
                    '" data-prenom="' . htmlspecialchars($row['prenom']) .
                    '" data-email="' . htmlspecialchars($row['email']) .
                    '" data-etab="' . htmlspecialchars($row['etablissement']) .
                    '" data-desc="' . htmlspecialchars($row['description']) .
                    '" data-tel="' . htmlspecialchars($row['tel']) .
                    '" data_eventID="' . htmlspecialchars($row['id_event']) . '">Modifier</button></td>';
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
    public function AddParticipation($nom, $prenom, $email, $tel, $etablissement, $description, $id)
    {
        $conn = config::getConnexion();
        try {
            $requete = $conn->prepare("INSERT INTO participation (nom,prenom, email,tel,etablissement,description,id_event) VALUES (:nom,:prenom, :email, :tel, :etablissement, :description,:id_event)");
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':prenom', $prenom);
            $requete->bindParam(':email', $email);
            $requete->bindParam(':tel', $tel);
            $requete->bindParam(':etablissement', $etablissement);
            $requete->bindParam(':description', $description);
            $requete->bindParam(':id_event', $id);
            $requete->execute();
            echo 'participant ajouté avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }

    // UPDATE
    public function UpdateParticipation($id, $nom, $prenom, $email, $tel, $etablissement, $description, $idE)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("UPDATE participation SET nom=:nom, prenom=:prenom, email=:email, tel=:tel, etablissement=:etablissement, description=:description, id_event=:id_event WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':email', $email);
            $query->bindParam(':tel', $tel);
            $query->bindParam(':etablissement', $etablissement);
            $query->bindParam(':description', $description);
            $query->bindParam(':id_event', $idE);
            $query->execute();
            echo $query->rowCount() . ' enregistrements mis à jour avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
}
