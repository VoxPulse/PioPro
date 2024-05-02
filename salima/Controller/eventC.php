<?php
include 'C:\wamp64\www\VoxPulse\VoxPulse\Model\config.php';

class eventC
{
    // AFFICHAGE 
    public function ListUser()
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
        $tableHTML .= '<th>Nom</th>';
        $tableHTML .= '<th>Mail</th>';
        $tableHTML .= '<th>Tel</th>';
        $tableHTML .= '</tr>';
        $tableHTML .= '</thead>';
        $tableHTML .= '<tbody>';
        
        
foreach ($result as $row) {
    $tableHTML .= '<tr>';
$tableHTML .= '<td><img src="' . $row['img'] . '" alt="Image"></td>';
$tableHTML .= '<td>' . $row['id'] . '</td>';
$tableHTML .= '<td>' . $row['nom'] . '</td>';
$tableHTML .= '<td>' . $row['mail'] . '</td>';
$tableHTML .= '<td>' . $row['tel'] . '</td>';
$tableHTML .= '<td><button class="btn btn-danger btn-supprimer" data-id="' . $row['id'] . '">Supprimer</button></td>';
$tableHTML .= '<td><button class="btn btn-primary" data-id="' . $row['id'] . '">Modifier</button></td>';
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

    //Count users 
    public function countUsers()
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
//LastLogin 
public function LastLogin()
{
    $conn = config::getConnexion();
    try {
        // Obtenir la date actuelle
        $current_date = date("Y-m-d");

        $query = $conn->prepare("SELECT COUNT(*) as num_users from user WHERE DATE(dernier_login) = :current_date");
        $query->bindParam(':current_date', $current_date, PDO::PARAM_STR);
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

// Users Online 
public function UsersOnline()
{
    $conn = config::getConnexion();
    try {
        $query = $conn->prepare("SELECT COUNT(*) as num_users from user WHERE statut=:statut ");
        $statut="enligne";
        $query->bindParam(':statut',$statut); 
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


    // GET USER BY ID
    public function getUserById($id)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM user WHERE id=:id ");
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
    public function DeleteUser($id)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("DELETE FROM user WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            echo $query->rowCount() . ' enregistrements supprimés avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    
    // AJOUT 
    public function AddUser($type_pack, $nom, $prenom, $cin, $tel, $mail, $role, $img, $mdp, $statut, $etab, $date_n, $date_crea, $dernier_login)
    {
        $conn = config::getConnexion();
        try {
            $requete = $conn->prepare("INSERT INTO user (type_pack,nom, prenom,cin,tel,mail,role,mdp,statut,etab,date_n,date_crea, dernier_login) VALUES (:type_pack,:nom, :prenom, :cin,:tel,:mail,:role,:img,:mdp,:statut,:etab,:date_n,:date_crea,:dernier_login)");
            $requete->bindParam(':type_pack', $type_pack);
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':prenom', $prenom);
            $requete->bindParam(':cin', $cin);
            $requete->bindParam(':tel', $tel);
            $requete->bindParam(':mail', $mail);
            $requete->bindParam(':role', $role);
            $requete->bindParam(':img', $img);
            $requete->bindParam(':mdp', $mdp);
            $requete->bindParam(':date_crea', $date_crea);
            $requete->bindParam(':date_n', $date_n);
            $requete->bindParam(':dernier_login', $dernier_login);
            $requete->bindParam(':statut', $statut);
            $requete->bindParam(':type_pack', $type_pack);
            $requete->bindParam(':etab', $etab);
            $requete->execute();
            echo 'User ajouté avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    
    // UPDATE
    public function UpdateUser($id,$type_pack, $nom, $prenom, $cin, $tel, $mail, $role, $img, $mdp, $statut, $etab, $date_n,)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("UPDATE user SET type_pack=:type_pack , nom=:nom , prenom=:prenom , cin=:cin ,tel=:tel, mail=:mail, role=:role , img=:img, mdp=:mdp, statut=:statut , etab=:etab , date_n=:date_n  WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->bindParam(':type_pack', $type_pack);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':cin', $cin);
            $query->bindParam(':tel', $tel);
            $query->bindParam(':mail', $mail);
            $query->bindParam(':role', $role);
            $query->bindParam(':img', $img);
            $query->bindParam(':mdp', $mdp);
            $query->bindParam(':statut', $statut);
            $query->bindParam(':etab', $etab);
            $query->bindParam(':date_n', $date_n);
            $query->execute();
            echo $query->rowCount() . ' enregistrements mis à jour avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
}
?>
