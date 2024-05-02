<?php
include 'C:\wamp64\www\TEST\Model\config.php';
class participationC
{
    // AFFICHAGE 
    public function Listparticipation()
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * from participation ");
            $query->execute();
            $result = $query->fetchAll();
        } catch (PDOException $e) {
            echo 'echec de connexion:' . $e->getMessage();
        }
  
        echo '<table border=1;>';
        echo '<tr><th>id</th><th>nom</th><th>prenom</th><th>email </th><th>tel</th> <th>etablissement</th><th>id_event</th></tr>';
        foreach ($result as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nom'] . '</td>';
            echo '<td>' . $row['prenom'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['tel'] . '</td>';
            echo '<td>' . $row['etablissement'] . '</td>';
            echo '<td>' . $row['id_event'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    //GetUser
    public function getparticipationById($id)
{
    $conn = config::getConnexion();
    try {
        $query = $conn->prepare("SELECT * FROM participation WHERE id=:id ");
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
    public function Deleteparticipation($id)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("DELETE FROM participation WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            echo $query->rowCount() . 'records deleted successfully';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //AJOUT 
    public function Addparticipation($nom, $prenom, $email, $tel, $etablissement, $id_event)
{
    $conn = config::getConnexion();
    try {
        $requete = $conn->prepare("INSERT INTO participation (nom, prenom, email, tel, etablissement, id_event) VALUES (:nom, :prenom, :email, :tel, :etablissement, :id_event)");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':email', $email);
        $requete->bindParam(':tel', $tel);
        $requete->bindParam(':etablissement', $etablissement);
        $requete->bindParam(':id_event', $id_event);
        $requete->execute();
        echo 'participation ajoutée avec succès';
    } catch (PDOException $e) {<?php
        include 'C:\wamp64\www\TEST\Model\config.php';
        class eventC
        {
            // AFFICHAGE 
            public function Listparticipation()
            {
                $conn = config::getConnexion();
                try {
                    $query = $conn->prepare("SELECT * from participation ");
                    $query->execute();
                    $result = $query->fetchAll();
                } catch (PDOException $e) {
                    echo 'echec de connexion:' . $e->getMessage();
                }
          
                echo '<table border=1;>';
                echo '<tr><th>id</th><th>nom</th><th>prenom</th><th>email</th><th>tel</th> <th>etablissement</th><th>id_event</th></tr>';
                foreach ($result as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['nom'] . '</td>';
                    echo '<td>' . $row['prenom'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['tel'] . '</td>';
                    echo '<td>' . $row['etablissement'] . '</td>';
                    echo '<td>' . $row['id_event'] . '</td>';
                    
                   
                    echo '</tr>';
                }
                echo '</table>';
            }
            //GetUser
            public function getparticipationById($id)
        {
            $conn = config::getConnexion();
            try {
                $query = $conn->prepare("SELECT * FROM participation WHERE id=:id ");
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
            public function Deleteparticipation($id)
            {
                $conn = config::getConnexion();
                try {
                    $query = $conn->prepare("DELETE FROM participation WHERE id=:id");
                    $query->bindParam(':id', $id);
                    $query->execute();
                    echo $query->rowCount() . 'records deleted successfully';
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
            //AJOUT 
            public function addevent($nom, $prenom, $email, $tel, $etablissement, $id_event)
        {
            $conn = config::getConnexion();
            try {
                $requete = $conn->prepare("INSERT INTO participation (nom, prenom, email, tel, etablissement, id_event) VALUES (:nom, :prenom, :email, :tel, :etablissement, :id_event)");
                $requete->bindParam(':nom', $prenom);
                $requete->bindParam(':prenom', $prenom);
                $requete->bindParam(':email', $email);
                $requete->bindParam(':tel', $tel);
                $requete->bindParam(':etablissement', $etablissement);
                $requete->bindParam(':id_event', $id_event);
                $requete->execute();
                echo 'Event ajouté avec succès';
            } catch (PDOException $e) {
                echo 'Échec de connexion : ' . $e->getMessage();
            }
        }
            // UPDATE
            public function Update($id, $nom, $prenom, $email, $tel, $etablissement, $id_event)
        {
            include 'config.php';
            $conn = config::getConnexion();
            try {
                $query = $conn->prepare("UPDATE participation SET nom=:nom , prenom=:prenom , email=:email , tel=:tel, etablissement=:etablissement ,id_event=:id_event WHERE id=:id");
                $query->bindParam(':id', $id);
                $query->bindParam(':nom', $nom);
                $query->bindParam(':prenom', $prenom);
                $query->bindParam(':email', $email);
                $query->bindParam(':tel', $tel);
                $query->bindParam(':etablissement', $etablissement);
                $query->bindParam(':id_event', $id_event);
                
                $query->execute();
                echo $query->rowCount() . ' event updated successfully';
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
    public function Updateparticipation($id, $nom, $prenom, $email, $tel, $etablissement, $id_event)
{
    include 'config.php';
    $conn = config::getConnexion();
    try {
        $query = $conn->prepare("UPDATE participation SET nom=:nom , prenom=:prenom , email=:email , tel=:tel, etablissement=:etablissement,  id_event=:id_event  WHERE id=:id");
        $query->bindParam(':id', $id);
        $query->bindParam(':nom', $nom);
        $query->bindParam(':prenom', $prenom);
        $query->bindParam(':email', $email);
        $query->bindParam(':tel', $tel);
        $query->bindParam(':etablissement', $etablissement);
        $query->bindParam(':id_event', $id_event);
        $query->execute();
        echo $query->rowCount() . ' records updated successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
}
?>