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
<<<<<<< HEAD
<<<<<<< HEAD
            $requete = $conn->prepare("SELECT * FROM entretiens");
=======
            $requete = $conn->prepare("SELECT * FROM entretiens
        ");
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
            $requete = $conn->prepare("SELECT * FROM entretiens
        ");
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
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
<<<<<<< HEAD
    public function addOffre($id, $date , $heure , $statut , $url , $id_user, $id_offre)
=======
<<<<<<< HEAD
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
    public function addentretiens($id , $date , $heure , $statut , $url , $id_user, $id_offre)
=======
    public function addentretiens($id , $date , $heure , $statut , $url , $id_user, $id_off)
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
<<<<<<< HEAD
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
    {
        $conn = config::getConnexion();
        try 
        {
<<<<<<< HEAD
<<<<<<< HEAD
            $requete = $conn->prepare("INSERT INTO entretiens (id, date , heure, statut, url ,  id_user, id_offre) VALUES (:id, :date , :heure, :statut , :url, :id_user, :id_offre )");
=======
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
            $requete = $conn->prepare("INSERT INTO entretiens
<<<<<<< HEAD
         (id, date , heure, statut, url ,  id_user, id_offre) VALUES (:id, :date , :heure, :statut , :url, :id_user, :id_offre )");
=======
         (id, date , heure, statut, url ,  id_user, id_off) VALUES (:id, :date , :heure, :statut , :url, :id_user, :id_off )");
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
<<<<<<< HEAD
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
            $requete->bindParam(':id', $id);
            $requete->bindParam(':date', $date);
            $requete->bindParam(':heure', $heure);
            $requete->bindParam(':statut', $statut);
            $requete->bindParam(':url', $url);
            $requete->bindParam(':id_user', $id_user);
<<<<<<< HEAD
            $requete->bindParam(':id_offre', $id_offre);
<<<<<<< HEAD
            if($requete->execute());
            echo 'entretiens ajouté avec succès';
=======
<<<<<<< HEAD
            $requete->bindParam(':id_offre', $id_offre);
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
            $requete->bindParam(':id_off', $id_off);
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
            if($requete->execute());
            echo 'entretiens
         ajouté avec succès';
<<<<<<< HEAD
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }    
<<<<<<< HEAD
    public function updateentretiens($id , $date , $heure , $statut , $url , $id_user, $id_offre)
=======
<<<<<<< HEAD
<<<<<<< HEAD
    public function updateentretiens($id , $date , $heure , $statut , $url , $id_user, $id_offre)
=======
    public function updateentretiens($id , $date , $heure , $statut , $url , $id_user, $id_off)
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
    public function updateentretiens($id , $date , $heure , $statut , $url , $id_user, $id_off)
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
    {
        $conn = config::getConnexion();
        try 
        {
<<<<<<< HEAD
<<<<<<< HEAD
            $requete = $conn->prepare("UPDATE entretiens SET date = :date, heure = :heure, statut = :statut, url = :url , id_user=:id_user  WHERE id = :id");
=======
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
            $requete = $conn->prepare("UPDATE entretiens
<<<<<<< HEAD
         SET date = :date, heure = :heure, statut = :statut, url = :url , id_user=:id_user, id_offre=:id_offre  WHERE id = :id");
=======
         SET date = :date, heure = :heure, statut = :statut, url = :url , id_user=:id_user, id_off=:id_off  WHERE id = :id");
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
<<<<<<< HEAD
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
            $requete->bindParam(':id', $id);
            $requete->bindParam(':date', $date);
            $requete->bindParam(':heure', $heure);
            $requete->bindParam(':statut', $statut);
            $requete->bindParam(':url', $url);
            $requete->bindParam(':id_user', $id_user);
<<<<<<< HEAD
            $requete->bindParam(':id_offre', $id_offre);
<<<<<<< HEAD
            if ($requete->execute()) 
            {
                echo 'entretiens mise à jour avec succès';
            } else 
            {
                echo 'Échec de la mise à jour de la entretiens';
=======
<<<<<<< HEAD
            $requete->bindParam(':id_offre', $id_offre);
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
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
<<<<<<< HEAD
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
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
<<<<<<< HEAD
<<<<<<< HEAD
            $requete = $conn->prepare("DELETE FROM entretiens WHERE id = :id");
            $requete->bindParam(':id', $id);
            if ($requete->execute()) 
            {
                echo 'entretiens supprimée avec succès';
            } else 
            {
                echo 'Échec lors de la suppression de la entretiens';
=======
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
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
<<<<<<< HEAD
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
            }
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
<<<<<<< HEAD
<<<<<<< HEAD
    public function getOffre($id)
    {
        $entretiens = new entretiens ();
        $conn = config::getConnexion();
        $requete = $conn->prepare("SELECT * FROM entretiens WHERE id = :id");
=======
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
    public function getentretiens($id)
    {
        $entretiens
     = new entretiens
     ();
        $conn = config::getConnexion();
        $requete = $conn->prepare("SELECT * FROM entretiens
     WHERE id = :id");
<<<<<<< HEAD
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
        $requete->bindParam(':id', $id);
        $requete->execute();
        $count = $requete->rowCount(); // Utilisez rowCount() pour obtenir le nombre de lignes
        if($count > 0)
        {
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
<<<<<<< HEAD
<<<<<<< HEAD
            $entretiens->setId ( $resultat['id'] );
            $entretiens->setdate ( $resultat['date']);
            $entretiens->setheure ( $resultat['heure']);
            $entretiens->setstatut( $resultat['statut']);
            $entretiens->seturl ( $resultat['url'] );
            $entretiens->setid_user ( $resultat['id_user'] );
            $entretiens->setid_offre ( $resultat['id_offre'] );
        }
        else
        {
            $entretiens->id = "";
        }
        return $entretiens ;
    }
    public function nombre_offre()
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("SELECT * FROM entretiens");
            $requete->execute();
            
            // Utilisation de fetchAll pour récupérer les résultats sous forme de tableau
            $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
            return count($resultats);
        }
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }


    public function trierPardate()
{
    $conn = config::getConnexion();
    try 
    {
        $requete = $conn->prepare("SELECT * FROM entretiens ORDER BY statut DESC");
        $requete->execute();
        
        // Utilisation de fetchAll pour récupérer les résultats sous forme de tableau
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
        return count($resultats);
    }
    catch (PDOException $e) 
    {
        echo 'Échec de connexion : ' . $e->getMessage();
    }
}
=======
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
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
    
<<<<<<< HEAD
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
}


?>