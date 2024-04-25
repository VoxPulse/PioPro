<?php
include 'C:\wamp64\www\VoxPulse\Model\config.php';

class UserC
{
    // AFFICHAGE 
    public function ListUser()
{
    $conn = config::getConnexion();
    try {
        $query = $conn->prepare("SELECT * FROM user");
        $query->execute();
        $result = $query->fetchAll();
        
        $tableHTML = '<table class="table">';
        $tableHTML .= '<thead>';
        $tableHTML .= '<tr>';
        $tableHTML .= '<th>Photo</th>';
        $tableHTML .= '<th>ID</th>';
        $tableHTML .= '<th>Nom</th>';
        $tableHTML .= '<th>Prenom</th>';
        $tableHTML .= '<th>Date de Naissance</th>';
        $tableHTML .= '<th>Cin</th>';
        $tableHTML .= '<th>role</th>';
        $tableHTML .= '<th>Mot de Passe </th>';
        $tableHTML .= '<th>Etablissement</th>';
        $tableHTML .= '<th>Mail</th>';
        $tableHTML .= '<th>Tel</th>';
        $tableHTML .= '<th>Supprimer</th>';
        $tableHTML .= '<th>Modifier</th>';
        $tableHTML .= '</tr>';
        $tableHTML .= '</thead>';
        $tableHTML .= '<tbody>';
        
        
foreach ($result as $row) {
    $tableHTML .= '<tr>';
$tableHTML .= '<td><img src="' . $row['img'] . '" alt="Image"></td>';
$tableHTML .= '<td>' . $row['id'] . '</td>';
$tableHTML .= '<td>' . $row['nom'] . '</td>';
$tableHTML .= '<td>' . $row['prenom'] . '</td>';
$tableHTML .= '<td>' . $row['date_n'] . '</td>';
$tableHTML .= '<td>' . $row['cin'] . '</td>';
$tableHTML .= '<td>' . $row['role'] . '</td>';
$tableHTML .= '<td>' . $row['mdp'] . '</td>';
$tableHTML .= '<td>' . $row['etab'] . '</td>';
$tableHTML .= '<td>' . $row['mail'] . '</td>';
$tableHTML .= '<td>' . $row['tel'] . '</td>';


$tableHTML .= '<td><button class="btn btn-danger btn-supprimer" data-id="' . $row['id'] . '">Supprimer</button></td>';

$tableHTML .= '<td><button class="btn btn-primary btn-update"
 data-id="' . $row['id'] . '" data-name="' . htmlspecialchars($row['nom']) .
 '" data-prenom="' . htmlspecialchars($row['prenom']) .
  '" data-cin="' . htmlspecialchars($row['cin']) .
   '" data-role="' . htmlspecialchars($row['role']) . 
   '" data-password="' . htmlspecialchars($row['mdp']) .
    '" data-etab="' . htmlspecialchars($row['etab']) .
     '" data-email="' . htmlspecialchars($row['mail']) .
      '" data-tel="' . htmlspecialchars($row['tel']) .
      '" data-ddn="' . htmlspecialchars($row['date_n']) .
      '" data-tel="' . htmlspecialchars($row['tel']) .   '">Update</button></td>';
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

    //BLOCK 
    // AFFICHAGE 
    public function ListBlock()
{
    $conn = config::getConnexion();
    try {
        $query = $conn->prepare("SELECT * FROM user WHERE Block ='Blocked'");
        $query->execute();
        $result = $query->fetchAll();
        
        $tableHTML = '<table class="table">';
        $tableHTML .= '<thead>';
        $tableHTML .= '<tr>';
        $tableHTML .= '<th>ID</th>';
        $tableHTML .= '<th>Bloquer</th>';
        $tableHTML .= '</tr>';
        $tableHTML .= '</thead>';
        $tableHTML .= '<tbody>';
        
        
foreach ($result as $row) {
    $tableHTML .= '<tr>';
$tableHTML .= '<td>' . $row['id'] . '</td>';
$tableHTML .= '<td><button class="btn btn-danger btn-Mod" data-id="'. $row['id'] . '">BLOCK</button></td>';
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
    //USER 
    public function blockUserById($userId)
{
    $conn = config::getConnexion();
    try {
        // Préparer la requête pour mettre à jour l'attribut "blocked" de l'utilisateur
        $query = $conn->prepare("UPDATE user SET Block = 'Blocked' WHERE id = :userId");
        $query->bindParam(':userId', $userId, PDO::PARAM_INT);
        $query->execute();

        // Vérifier si des lignes ont été affectées (si l'utilisateur a été trouvé et mis à jour)
        if ($query->rowCount() > 0) {
            return true; // L'utilisateur a été bloqué avec succès
        } else {
            return false; // L'utilisateur n'a pas été trouvé ou l'opération a échoué
        }
    } catch (PDOException $e) {
        echo 'Échec de connexion : ' . $e->getMessage();
        return false; // Si la connexion échoue, retourner false
    }
}

    //Count users 
    public function countUsers()
{
    $conn = config::getConnexion();
    try {
        $query = $conn->prepare("SELECT COUNT(*) as num_users from user");
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
public function getName($id)
{
    $conn = config::getConnexion();
    try {
        $query = $conn->prepare("SELECT nom  FROM user WHERE id=:id ");
        $query->execute();
        $result = $query->fetchAll();
        return $result; // Retourner le résultat de la requête
    } catch (PDOException $e) {
        echo 'Échec de connexion : ' . $e->getMessage();
        return false; // En cas d'erreur, retourner false
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

    public function getUserCO($email, $mdp)
{
    $conn = config::getConnexion();
    try {
        $query = $conn->prepare("SELECT COUNT(*) FROM user WHERE mail=:mail AND mdp=:mdp");
        $query->bindParam(':mail', $email);
        $query->bindParam(':mdp', $mdp);
        $query->execute();
        $result = $query->fetchColumn(); // Récupérer le nombre de lignes
        
        if ($result > 0) {
            // Il y a des utilisateurs correspondants dans la base de données
            $roleQuery = $conn->prepare("SELECT role, Block FROM user WHERE mail=:mail AND mdp=:mdp");
            $roleQuery->bindParam(':mail', $email);
            $roleQuery->bindParam(':mdp', $mdp);
            $roleQuery->execute();
            $userData = $roleQuery->fetch(PDO::FETCH_ASSOC); 
            
            $userRole = $userData['role']; 
            $userState = $userData['Block'];

            if ($userState == 'Blocked') {
                return 3; // Retourner 3 si l'utilisateur est bloqué
            } elseif ($userRole == 'admin') {
                return '1'; // Retourner 1 pour l'administrateur
            } else {
                return 2; // Retourner 2 pour les utilisateurs normaux
            }
        } else {
            return 0; // Aucun utilisateur correspondant trouvé
        }
    } catch (PDOException $e) {
        echo 'Échec de connexion : ' . $e->getMessage();
        return -1; // En cas d'erreur, retourner une valeur spéciale
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
    public function AddUser($nom, $prenom, $cin, $tel, $mail, $role, $mdp, $etab, $date_n, $date_crea, $Block, $statut)
{
    $conn = config::getConnexion();
    try {
        $requete = $conn->prepare("INSERT INTO user (nom, prenom, cin, tel, mail, role, mdp, etab, date_n, date_crea, Block , statut) VALUES (:nom, :prenom, :cin, :tel, :mail, :role, :mdp, :etab, :date_n, :date_crea,:Block,:statut )");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':cin', $cin);
        $requete->bindParam(':tel', $tel);
        $requete->bindParam(':mail', $mail);
        $requete->bindParam(':role', $role);
        $requete->bindParam(':mdp', $mdp);
        $requete->bindParam(':date_crea', $date_crea);
        $requete->bindParam(':date_n', $date_n);
        $requete->bindParam(':etab', $etab);
        $requete->bindParam(':Block', $Block);
        $requete->bindParam(':statut', $statut);
        $requete->execute();
        echo 'Utilisateur ajouté avec succès';
    } catch (PDOException $e) {
        echo 'Échec de connexion : ' . $e->getMessage();
    }
}

    
    // UPDATE
    public function updateUser($id,  $nom, $prenom, $cin, $tel, $mail, $role, $mdp, $etab, $date_n) {
        $conn = config::getConnexion();
        try {
            // Préparation de la requête SQL
            $query = $conn->prepare("UPDATE user SET  nom=:nom, prenom=:prenom, cin=:cin, tel=:tel, mail=:mail, role=:role, mdp=:mdp, etab=:etab, date_n=:date_n WHERE id=:id");
            
            // Liaison des paramètres
            $query->bindParam(':id', $id);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':cin', $cin);
            $query->bindParam(':tel', $tel);
            $query->bindParam(':mail', $mail);
            $query->bindParam(':role', $role);
            $query->bindParam(':mdp', $mdp);
            $query->bindParam(':etab', $etab);
            $query->bindParam(':date_n', $date_n);
            
            // Exécution de la requête
            $query->execute();
            
            // Vérification du nombre de lignes affectées
            if ($query->rowCount() > 0) {
                return 'Enregistrements mis à jour avec succès';
            } else {
                return 'Aucun enregistrement mis à jour';
            }
        } catch (PDOException $e) {
            // Journalisation de l'erreur au lieu de l'afficher directement
            error_log('Échec de la mise à jour : ' . $e->getMessage());
            return 'Une erreur s\'est produite lors de la mise à jour';
        }
    }
    
}
?>
