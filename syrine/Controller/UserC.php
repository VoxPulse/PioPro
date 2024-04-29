<?php
include 'C:\wamp64\www\TEST\Model\config.php';
class UserC
{
    // AFFICHAGE 
    public function ListUser()
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * from employe ");
            $query->execute();
            $result = $query->fetchAll();
        } catch (PDOException $e) {
            echo 'echec de connexion:' . $e->getMessage();
        }
  
        echo '<table border=1;>';
        echo '<tr><th>Nom</th><th>Prenom</th><th>email</th><th>Mot de passe </th><th>Creted_AT</th> <th>LastLogin</th><th>Statut</th><th>Role</th><th>img</th></tr>';
        foreach ($result as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['Nom'] . '</td>';
            echo '<td>' . $row['Prenom'] . '</td>';
            echo '<td>' . $row['Email'] . '</td>';
            echo '<td>' . $row['Mot de passe'] . '</td>';
            echo '<td>' . $row['Created_At'] . '</td>';
            echo '<td>' . $row['LastLogin'] . '</td>';
            echo '<td>' . $row['Status'] . '</td>';
            echo '<td>' . $row['Role'] . '</td>';
            echo '<td>' . $row['img'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    //GetUser
    public function getUserById($id)
{
    $conn = config::getConnexion();
    try {
        $query = $conn->prepare("SELECT * FROM employe WHERE id=:id ");
        $query->bindParam(':id', $id);
        $query->execute();
        $result = $query->fetchAll();
        return $result; // Retourner le résultat de la requête
    } catch (PDOException $e) {
        echo 'echec de connexion:' . $e->getMessage();
        return false; // En cas d'erreur, retourner false
    }
}
    // SUPPRESSION 
    public function DeleteUser($id)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("DELETE FROM employe WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            echo $query->rowCount() . 'records deleted successfully';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //AJOUT 
    public function AddUser($nom, $prenom, $email, $DOB)
{
    $conn = config::getConnexion();
    try {
        $requete = $conn->prepare("INSERT INTO employe (lastName, FirstName, email, DOB) VALUES (:nom, :prenom, :email, :DOB)");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':email', $email);
        $requete->bindParam(':DOB', $DOB);
        $requete->execute();
        echo 'Employé ajouté avec succès';
    } catch (PDOException $e) {<?php
        include 'C:\wamp64\www\TEST\Model\config.php';
        class UserC
        {
            // AFFICHAGE 
            public function ListUser()
            {
                $conn = config::getConnexion();
                try {
                    $query = $conn->prepare("SELECT * from employe ");
                    $query->execute();
                    $result = $query->fetchAll();
                } catch (PDOException $e) {
                    echo 'echec de connexion:' . $e->getMessage();
                }
          
                echo '<table border=1;>';
                echo '<tr><th>Nom</th><th>Prenom</th><th>email</th><th>Mot de passe </th><th>Creted_AT</th> <th>LastLogin</th><th>Statut</th><th>Role</th><th>img</th></tr>';
                foreach ($result as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['Nom'] . '</td>';
                    echo '<td>' . $row['Prenom'] . '</td>';
                    echo '<td>' . $row['Email'] . '</td>';
                    echo '<td>' . $row['Mot de passe'] . '</td>';
                    echo '<td>' . $row['Created_At'] . '</td>';
                    echo '<td>' . $row['LastLogin'] . '</td>';
                    echo '<td>' . $row['Status'] . '</td>';
                    echo '<td>' . $row['Role'] . '</td>';
                    echo '<td>' . $row['img'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
            //GetUser
            public function getEmployeById($id)
        {
            $conn = config::getConnexion();
            try {
                $query = $conn->prepare("SELECT * FROM employe WHERE id=:id ");
                $query->bindParam(':id', $id);
                $query->execute();
                $result = $query->fetchAll();
                return $result; // Retourner le résultat de la requête
            } catch (PDOException $e) {
                echo 'echec de connexion:' . $e->getMessage();
                return false; // En cas d'erreur, retourner false
            }
        }
            // SUPPRESSION 
            public function DeleteEmploye($id)
            {
                $conn = config::getConnexion();
                try {
                    $query = $conn->prepare("DELETE FROM employe WHERE id=:id");
                    $query->bindParam(':id', $id);
                    $query->execute();
                    echo $query->rowCount() . 'records deleted successfully';
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
            //AJOUT 
            public function addEmploye($nom, $prenom, $email, $DOB)
        {
            $conn = config::getConnexion();
            try {
                $requete = $conn->prepare("INSERT INTO employe (lastName, FirstName, email, DOB) VALUES (:nom, :prenom, :email, :DOB)");
                $requete->bindParam(':nom', $nom);
                $requete->bindParam(':prenom', $prenom);
                $requete->bindParam(':email', $email);
                $requete->bindParam(':DOB', $DOB);
                $requete->execute();
                echo 'Employé ajouté avec succès';
            } catch (PDOException $e) {
                echo 'Échec de connexion : ' . $e->getMessage();
            }
        }
            // UPDATE
            public function Update($id, $nom, $prenom, $email, $DOB)
        {
            include 'config.php';
            $conn = config::getConnexion();
            try {
                $query = $conn->prepare("UPDATE employe SET lastName=:nom , FirstName=:prenom , email=:email , DOB=:DOB WHERE id=:id");
                $query->bindParam(':id', $id);
                $query->bindParam(':nom', $nom);
                $query->bindParam(':prenom', $prenom);
                $query->bindParam(':email', $email);
                $query->bindParam(':DOB', $DOB);
                $query->execute();
                echo $query->rowCount() . ' records updated successfully';
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        }
        ?>
        echo 'Échec de connexion : ' . $e->getMessage();
    }
}
    // UPDATE
    public function UpdateUser($id, $nom, $prenom, $email, $DOB)
{
    include 'config.php';
    $conn = config::getConnexion();
    try {
        $query = $conn->prepare("UPDATE employe SET lastName=:nom , FirstName=:prenom , email=:email , DOB=:DOB WHERE id=:id");
        $query->bindParam(':id', $id);
        $query->bindParam(':nom', $nom);
        $query->bindParam(':prenom', $prenom);
        $query->bindParam(':email', $email);
        $query->bindParam(':DOB', $DOB);
        $query->execute();
        echo $query->rowCount() . ' records updated successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
}
?>