<?php
include 'C:\wamp64\www\VoxPulse4\Model\config.php';
include 'C:\wamp64\www\VoxPulse4\Model\offre_emploi.php';
class Offre_emploiC
{
    public function afficher($atr)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("SELECT * FROM offre_emploi order by $atr");
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
    public function addOffre($id, $titre_p , $description , $date_fin , $salaire , $categorie)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("INSERT INTO offre_emploi (id, titre_p , description, date_fin, salaire ,  categorie) VALUES (:id, :titre_p , :description, :date_fin , :salaire, :categorie )");
            $requete->bindParam(':id', $id);
            $requete->bindParam(':titre_p', $titre_p);
            $requete->bindParam(':description', $description);
            $requete->bindParam(':date_fin', $date_fin);
            $requete->bindParam(':salaire', $salaire);
            $requete->bindParam(':categorie', $categorie);
            if($requete->execute());
            echo 'offre_emploi ajouté avec succès';
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }    
    public function updateOffre($id , $titre_p , $description , $date_fin , $salaire , $categorie)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("UPDATE offre_emploi SET titre_p = :titre_p, description = :description, date_fin = :date_fin, salaire = :salaire , categorie=:categorie  WHERE id = :id");
            $requete->bindParam(':id', $id);
            $requete->bindParam(':titre_p', $titre_p);
            $requete->bindParam(':description', $description);
            $requete->bindParam(':date_fin', $date_fin);
            $requete->bindParam(':salaire', $salaire);
            $requete->bindParam(':categorie', $categorie);
            if ($requete->execute()) 
            {
                echo 'offre_emploi mise à jour avec succès';
            } else 
            {
                echo 'Échec de la mise à jour de la offre_emploi';
            }
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    public function deleteOffre($id)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("DELETE FROM offre_emploi WHERE id = :id");
            $requete->bindParam(':id', $id);
            if ($requete->execute()) 
            {
                echo 'offre_emploi supprimée avec succès';
            } else 
            {
                echo 'Échec lors de la suppression de la offre_emploi';
            }
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    public function getOffre($id)
    {
        $Offre_emploi = new Offre_emploi ();
        $conn = config::getConnexion();
        $requete = $conn->prepare("SELECT * FROM offre_emploi WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->execute();
        $count = $requete->rowCount(); // Utilisez rowCount() pour obtenir le nombre de lignes
        if($count > 0)
        {
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            $Offre_emploi->setId ( $resultat['id'] );
            $Offre_emploi->setTitre_p ( $resultat['titre_p']);
            $Offre_emploi->setDescription ( $resultat['description']);
            $Offre_emploi->setdate_fin ( $resultat['date_fin']);
            $Offre_emploi->setSalaire ( $resultat['salaire'] );
            $Offre_emploi->setCategorie ( $resultat['categorie'] );
        }
        else
        {
            $Offre_emploi->id = "";
        }
        return $Offre_emploi ;
    }
    public function nombre_offre()
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("SELECT * FROM offre_emploi");
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
        $requete = $conn->prepare("SELECT * FROM offre_emploi ORDER BY date_fin DESC");
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