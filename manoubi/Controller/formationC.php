<?php
require_once 'C:\wamp64\www\piopro2\VoxPulse\Model\formation.php';
class FormationC
{
    public function afficher($atr)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("SELECT * FROM formation order by $atr ASC");
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
    public function addFormation($id , $description , $duree , $prix , $image)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("INSERT INTO formation (id, duree , description, prix, image ) VALUES (:id, :duree , :description, :prix, :image )");
            $requete->bindParam(':id', $id);
            $requete->bindParam(':duree', $duree);
            $requete->bindParam(':description', $description);
            $requete->bindParam(':prix', $prix);
            $requete->bindParam(':image', $image);
            if($requete->execute());
            echo 'Formation ajouté avec succès';
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }    
    public function updateFormation($id , $description , $duree , $prix , $image)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("UPDATE formation SET duree = :duree, description = :description, prix = :prix, image = :image WHERE id = :id");
            $requete->bindParam(':id', $id);
            $requete->bindParam(':duree', $duree);
            $requete->bindParam(':description', $description);
            $requete->bindParam(':prix', $prix);
            $requete->bindParam(':image', $image);
            if ($requete->execute()) 
            {
                echo 'Formation mise à jour avec succès';
            } else 
            {
                echo 'Échec de la mise à jour de la formation';
            }
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    public function deleteFormation($id)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("DELETE FROM formation WHERE id = :id");
            $requete->bindParam(':id', $id);
            if ($requete->execute()) 
            {
                echo 'Formation supprimée avec succès';
            } else 
            {
                echo 'Échec lors de la suppression de la formation';
            }
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    public static function formationExists($id)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("SELECT * FROM formation WHERE id = :id");
            $requete->bindParam(':id', $id);
            $requete->execute();
            $count = $requete->fetchColumn();
            return $count > 0;
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
            return false;
        }
    }
    public function getFormation($id)
    {
        $formation = new Formation ();
        $conn = config::getConnexion();
        $requete = $conn->prepare("SELECT * FROM formation WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->execute();
        $count = $requete->rowCount(); // Utilisez rowCount() pour obtenir le nombre de lignes
        if($count > 0)
        { 
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            $formation->setId ( $resultat['id'] );
            $formation->setDescription ( $resultat['description']);
            $formation->setDuree ( $resultat['duree']);
            $formation->setPrix ( $resultat['prix']);
            $formation->setImage ( $resultat['image'] );
        
        }
        else
        {
            $formation->id = "";
        }
        return $formation ;
    }
    public function recherche($recherche , $atr)
    {
        $conn = config::getConnexion();
        try 
        {
            // Préparez la requête SQL avec la clause WHERE pour la recherche dans la colonne "description"
            $requete = $conn->prepare("SELECT * FROM formation WHERE $atr LIKE :recherche");
            $requete->bindValue(':recherche', '%' . $recherche . '%', PDO::PARAM_STR);
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
}
?>