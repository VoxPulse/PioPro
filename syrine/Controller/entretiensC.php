<?php
include 'C:\wamp64\www\VoxPulse4\Model\config.php';
include 'C:\wamp64\www\VoxPulse4\Model\entretiens.php';
class EntretiensC
{
    public function afficher()
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("SELECT * FROM entretiens
        ");
            $requete->execute();
            
            // Utilisation de fetchAll pour récupérer les résultats sous forme de tableau
            $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        }
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
<<<<<<< HEAD
    public function addentretiens($id , $date , $heure , $statut , $url , $id_user, $id_offre)
=======
    public function addentretiens($id , $date , $heure , $statut , $url , $id_user, $id_off)
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("INSERT INTO entretiens
<<<<<<< HEAD
         (id, date , heure, statut, url ,  id_user, id_offre) VALUES (:id, :date , :heure, :statut , :url, :id_user, :id_offre )");
=======
         (id, date , heure, statut, url ,  id_user, id_off) VALUES (:id, :date , :heure, :statut , :url, :id_user, :id_off )");
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
            $requete->bindParam(':id', $id);
            $requete->bindParam(':date', $date);
            $requete->bindParam(':heure', $heure);
            $requete->bindParam(':statut', $statut);
            $requete->bindParam(':url', $url);
            $requete->bindParam(':id_user', $id_user);
<<<<<<< HEAD
            $requete->bindParam(':id_offre', $id_offre);
=======
            $requete->bindParam(':id_off', $id_off);
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
            if($requete->execute());
            echo 'entretiens
         ajouté avec succès';
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }    
<<<<<<< HEAD
    public function updateentretiens($id , $date , $heure , $statut , $url , $id_user, $id_offre)
=======
    public function updateentretiens($id , $date , $heure , $statut , $url , $id_user, $id_off)
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("UPDATE entretiens
<<<<<<< HEAD
         SET date = :date, heure = :heure, statut = :statut, url = :url , id_user=:id_user, id_offre=:id_offre  WHERE id = :id");
=======
         SET date = :date, heure = :heure, statut = :statut, url = :url , id_user=:id_user, id_off=:id_off  WHERE id = :id");
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
            $requete->bindParam(':id', $id);
            $requete->bindParam(':date', $date);
            $requete->bindParam(':heure', $heure);
            $requete->bindParam(':statut', $statut);
            $requete->bindParam(':url', $url);
            $requete->bindParam(':id_user', $id_user);
<<<<<<< HEAD
            $requete->bindParam(':id_offre', $id_offre);
=======
            $requete->bindParam(':id_off', $id_off);
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
            if ($requete->execute()) 
            {
                echo 'entretiens
             mise à jour avec succès';
            } else 
            {
                echo 'Échec de la mise à jour de la entretiens
            ';
            }
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    public function deleteentretiens($id)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("DELETE FROM entretiens
         WHERE id = :id");
            $requete->bindParam(':id', $id);
            if ($requete->execute()) 
            {
                echo 'entretiens
             supprimée avec succès';
            } else 
            {
                echo 'Échec lors de la suppression de la entretiens
            ';
            }
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    public function getentretiens($id)
    {
        $entretiens
     = new entretiens
     ();
        $conn = config::getConnexion();
        $requete = $conn->prepare("SELECT * FROM entretiens
     WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->execute();
        $count = $requete->rowCount(); // Utilisez rowCount() pour obtenir le nombre de lignes
        if($count > 0)
        {
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            $entretiens
        ->setId ( $resultat['id'] );
            $entretiens
        ->setdate ( $resultat['date']);
            $entretiens
        ->setDescription ( $resultat['heure']);
            $entretiens
        ->setdate_fin ( $resultat['statut']);
            $entretiens
        ->setSalaire ( $resultat['url'] );
            $entretiens
        ->setid_user ( $resultat['id_user'] );
        $entretiens
<<<<<<< HEAD
        ->setid_offre ( $resultat['id_offre'] );
=======
        ->setid_off ( $resultat['id_off'] );
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
        }
        else
        {
            $entretiens
        ->id = "";
        }
        return $entretiens
     ;
    }
    
}


?>