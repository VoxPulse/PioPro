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
            $requete = $conn->prepare("SELECT * FROM entretiens");
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
    public function addOffre($id, $date , $heure , $statut , $url , $id_user, $id_offre)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("INSERT INTO entretiens (id, date , heure, statut, url ,  id_user, id_offre) VALUES (:id, :date , :heure, :statut , :url, :id_user, :id_offre )");
            $requete->bindParam(':id', $id);
            $requete->bindParam(':date', $date);
            $requete->bindParam(':heure', $heure);
            $requete->bindParam(':statut', $statut);
            $requete->bindParam(':url', $url);
            $requete->bindParam(':id_user', $id_user);
            $requete->bindParam(':id_offre', $id_offre);
            if($requete->execute());
            echo 'entretiens ajouté avec succès';
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }    
    public function updateentretiens($id , $date , $heure , $statut , $url , $id_user, $id_offre)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("UPDATE entretiens SET date = :date, heure = :heure, statut = :statut, url = :url , id_user=:id_user  WHERE id = :id");
            $requete->bindParam(':id', $id);
            $requete->bindParam(':date', $date);
            $requete->bindParam(':heure', $heure);
            $requete->bindParam(':statut', $statut);
            $requete->bindParam(':url', $url);
            $requete->bindParam(':id_user', $id_user);
            $requete->bindParam(':id_offre', $id_offre);
            if ($requete->execute()) 
            {
                echo 'entretiens mise à jour avec succès';
            } else 
            {
                echo 'Échec de la mise à jour de la entretiens';
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
            $requete = $conn->prepare("DELETE FROM entretiens WHERE id = :id");
            $requete->bindParam(':id', $id);
            if ($requete->execute()) 
            {
                echo 'entretiens supprimée avec succès';
            } else 
            {
                echo 'Échec lors de la suppression de la entretiens';
            }
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    public function getOffre($id)
    {
        $entretiens = new entretiens ();
        $conn = config::getConnexion();
        $requete = $conn->prepare("SELECT * FROM entretiens WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->execute();
        $count = $requete->rowCount(); // Utilisez rowCount() pour obtenir le nombre de lignes
        if($count > 0)
        {
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
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
}


?>