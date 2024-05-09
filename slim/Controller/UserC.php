<?php
include 'C:\wamp64\www\VoxPulse\Model\config.php';

class UserC
{
    // AFFICHAGE 
    public function ListUser()
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM user ORDER  BY id ASC");
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


                $tableHTML .= '<td><button class="btn btn-danger btn-supprimer" data-id="' . $row['id'] .
                    '" data-prenom="' . htmlspecialchars($row['prenom']) .
                    '" data-name="' . htmlspecialchars($row['nom']) .
                    '" data-email="' . htmlspecialchars($row['mail']) . '">Supprimer</button></td>';

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

    //GETELEMENTBYID2
    public function ListUser2($cin)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM user WHERE cin=:cin ORDER BY id ASC");
            $query->bindParam(':cin', $cin, PDO::PARAM_STR);
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
    public function ListBlock()
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM user WHERE Block ='Unblocked' ORDER BY id ASC ");
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
                $tableHTML .= '<td><button class="btn btn-dange btn-primary3 " data-id="' . $row['id'] . '">Bloquer</button></td>';
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
    public function ListUnBlock()
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM user WHERE Block ='Blocked' ORDER BY id ASC");
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
                $tableHTML .= '<td><button class="btn btn-dange btn-primary4 " data-id="' . $row['id'] . '">Débloquer</button></td>';
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
            $query = $conn->prepare("UPDATE user SET Block = 'Blocked' WHERE id = :userId ");
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



    public function getPassword($email)
    {
        $conn = config::getConnexion();
        try {
            // Préparer la requête pour récupérer le mot de passe hashé de l'utilisateur
            $query = $conn->prepare("SELECT mdp FROM user WHERE mail=:email");
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();

            // Vérifier si une ligne a été récupérée
            if ($query->rowCount() > 0) {
                // Récupérer le mot de passe hashé depuis le résultat de la requête
                $row = $query->fetch(PDO::FETCH_ASSOC);
                return $row['mdp']; // Retourner le mot de passe hashé
            } else {
                return null; // Aucun utilisateur trouvé avec cet e-mail
            }
        } catch (PDOException $e) {
            // Enregistrer l'erreur dans une variable pour une utilisation ultérieure
            $errorMessage = 'Échec de connexion : ' . $e->getMessage();
            error_log($errorMessage);
            return null; // Si la connexion échoue, retourner null
        }
    }




    public function DeblockUserById($userId)
    {
        $conn = config::getConnexion();
        try {
            // Préparer la requête pour mettre à jour l'attribut "blocked" de l'utilisateur
            $query = $conn->prepare("UPDATE user SET Block = 'Unblocked' WHERE id = :userId");
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
            $statut = "en ligne";
            $query->bindParam(':statut', $statut);
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
    //CLEANING
    public function cleanOldLogins()
    {
        $conn = config::getConnexion();
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Set error mode to exception
            $query = $conn->prepare("DELETE FROM user WHERE dernier_login < DATE_SUB(NOW(), INTERVAL 1 YEAR)");
            $query->execute();
            return $query->rowCount();
        } catch (PDOException $e) {
            echo 'Error executing DELETE operation: ' . $e->getMessage();
            return false;
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

    public function setUserOnline($id)
    {
        $conn = config::getConnexion();
        try {
            // Préparer la requête SQL pour mettre à jour le statut de l'utilisateur à "en ligne" et mettre à jour 'dernier_login' à l'instant actuel
            $query = $conn->prepare("UPDATE user SET statut = 'en ligne', dernier_login = NOW() WHERE id = :id");

            // Lier le paramètre id à la valeur passée à la fonction
            $query->bindParam(':id', $id, PDO::PARAM_INT);

            // Exécuter la requête
            $query->execute();

            // Retourner le nombre de lignes affectées
            return $query->rowCount();
        } catch (PDOException $e) {
            echo 'Error executing UPDATE operation: ' . $e->getMessage();
            return false;  // En cas d'erreur, retourner false
        }
    }

    public function setUserOffline($id)
    {
        $conn = config::getConnexion();
        try {
            // Préparer la requête SQL pour mettre à jour le statut de l'utilisateur à "hors ligne"
            $query = $conn->prepare("UPDATE user SET statut = 'hors ligne' WHERE id = :id");

            // Lier le paramètre id à la valeur passée à la fonction
            $query->bindParam(':id', $id, PDO::PARAM_INT);

            // Exécuter la requête
            $query->execute();

            // Retourner le nombre de lignes affectées
            return $query->rowCount();
        } catch (PDOException $e) {
            echo 'Error executing UPDATE operation: ' . $e->getMessage();
            return false;  // En cas d'erreur, retourner false
        }
    }


    public function updateUserResetToken($mail, $token, $time)
    {
        $conn = config::getConnexion();
        try {
            // Préparation de la requête pour mettre à jour les informations de réinitialisation de mot de passe
            $query = $conn->prepare("UPDATE user SET reset_token_hash=:token, reset_token_expires_at=:time WHERE mail=:mail");

            // Liaison des paramètres pour éviter les injections SQL
            $query->bindParam(':token', $token);
            $query->bindParam(':time', $time);
            $query->bindParam(':mail', $mail);

            // Exécution de la requête
            $query->execute();

            // Vérification si la mise à jour a été effectuée
            if ($query->rowCount() > 0) {
                return true; // Retourner vrai si la mise à jour a réussi
            } else {
                return false; // Retourner faux si aucun enregistrement n'a été mis à jour
            }
        } catch (PDOException $e) {
            echo 'Échec de la mise à jour : ' . $e->getMessage();
            return false; // Retourner faux si une erreur se produit
        }
    }

    public function UpdateToken($email, $token)
    {
        $conn = config::getConnexion();
        try {
            // Préparation de la requête pour mettre à jour les informations de réinitialisation de mot de passe
            $query = $conn->prepare("UPDATE user SET reset_token_hash=:token  WHERE mail=:mail");

            // Liaison des paramètres pour éviter les injections SQL
            $query->bindParam(':token', $token);
            $query->bindParam(':mail', $email);

            // Exécution de la requête
            $query->execute();

            // Vérification si la mise à jour a été effectuée
            if ($query->rowCount() > 0) {
                return true; // Retourner vrai si la mise à jour a réussi
            } else {
                return false; // Retourner faux si aucun enregistrement n'a été mis à jour
            }
        } catch (PDOException $e) {
            echo 'Échec de la mise à jour : ' . $e->getMessage();
            return false; // Retourner faux si une erreur se produit
        }
    }

    public function updatePasswordByToken($token, $newPassword)
    {
        $conn = config::getConnexion();
        try {
            // Hashage du nouveau mot de passe avant de l'insérer dans la base de données
            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

            // Préparation de la requête pour mettre à jour le mot de passe
            $query = $conn->prepare("UPDATE user SET mdp=:password WHERE reset_token_hash=:token");

            // Liaison des paramètres pour éviter les injections SQL
            $query->bindParam(':password', $passwordHash);
            $query->bindParam(':token', $token);

            // Exécution de la requête
            $query->execute();

            // Vérification si la mise à jour a été effectuée
            if ($query->rowCount() > 0) {
                return true; // Retourner vrai si la mise à jour a réussi
            } else {
                return false; // Retourner faux si aucun enregistrement n'a été mis à jour
            }
        } catch (PDOException $e) {
            echo 'Échec de la mise à jour : ' . $e->getMessage();
            return false; // Retourner faux si une erreur se produit
        }
    }
    public function tokenExists($token)
    {
        $conn = config::getConnexion();
        try {
            // Préparation de la requête pour vérifier l'existence du token
            $query = $conn->prepare("SELECT COUNT(*) FROM user WHERE reset_token_hash=:token");

            // Liaison des paramètres pour éviter les injections SQL
            $query->bindParam(':token', $token);

            // Exécution de la requête
            $query->execute();

            // Récupération du nombre de lignes qui correspondent au token
            $count = $query->fetchColumn();

            // Vérification de la présence du token
            return $count > 0;
        } catch (PDOException $e) {
            echo 'Erreur lors de la vérification du token : ' . $e->getMessage();
            return false; // Retourner faux si une erreur se produit
        }
    }



    public function getUserCO($email, $mdp)
    {
        $conn = config::getConnexion();
        try {
            // Modifier la requête pour sélectionner toutes les colonnes
            $query = $conn->prepare("SELECT * FROM user WHERE mail=:mail AND mdp=:mdp");
            $query->bindParam(':mail', $email);
            $query->bindParam(':mdp', $mdp);
            $query->execute();
            $userData = $query->fetch(PDO::FETCH_ASSOC); // Récupérer les données utilisateur en tant que tableau associatif

            // Vérifier si les données de l'utilisateur ont été récupérées
            if ($userData) {
                // Vous pouvez ajouter des conditions spécifiques ici si nécessaire
                if ($userData['Block'] == 'Blocked') {
                    return ['status' => 'blocked']; // Retourner un état bloqué avec les données de l'utilisateur
                } else {
                    return $userData; // Retourner toutes les données de l'utilisateur si non bloqué
                }
            } else {
                return null; // Aucun utilisateur correspondant trouvé
            }
        } catch (PDOException $e) {
            // Gérer l'exception PDO de manière appropriée
            throw new Exception('Échec de la connexion : ' . $e->getMessage());
        }
    }

    public function getUser($email)
    {
        $conn = config::getConnexion();
        try {
            // Préparer la requête pour sélectionner toutes les colonnes de l'utilisateur spécifié par email
            $query = $conn->prepare("SELECT * FROM user WHERE mail=:mail");
            $query->bindParam(':mail', $email);
            $query->execute();
            $userData = $query->fetch(PDO::FETCH_ASSOC); // Récupérer les données utilisateur sous forme de tableau associatif

            // Vérifier si les données de l'utilisateur ont été récupérées
            if ($userData) {
                return $userData; // Retourner les données de l'utilisateur
            } else {
                return null; // Aucun utilisateur correspondant trouvé
            }
        } catch (PDOException $e) {
            // Gérer l'exception PDO de manière appropriée
            throw new Exception('Échec de la connexion : ' . $e->getMessage());
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

    // AJOUT  HISTO
    public function HISTO($admin_id, $type_action, $description)
    {
        $conn = config::getConnexion();
        try {
            $requete = $conn->prepare("INSERT INTO historique (admin_id, type_action, description, date_action) VALUES (:admin_id, :type_action, :description, :date_action)");

            // Bind parameters
            $requete->bindParam(':admin_id', $admin_id);
            $requete->bindParam(':type_action', $type_action);
            $requete->bindParam(':description', $description);

            // Get the current date and time
            $date_action = date("Y-m-d H:i:s");  // Format: YYYY-MM-DD HH:MM:SS
            $requete->bindParam(':date_action', $date_action);

            // Execute the query
            $requete->execute();

            // Optional: Check if the insert was successful
            if ($requete->rowCount() > 0) {
                echo 'Action logged successfully';
            } else {
                echo 'No action was logged';
            }
        } catch (PDOException $e) {
            echo 'Failure in action logging: ' . $e->getMessage();
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
    public function updateUser($id,  $nom, $prenom, $cin, $tel, $mail, $role, $mdp, $etab, $date_n)
    {
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
