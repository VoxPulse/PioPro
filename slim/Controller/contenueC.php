<?php
require_once 'C:\wamp64\www\VoxPulse\Model\contenue.php';
class ContenueC
{
    public function afficher($atr)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("SELECT * FROM contenu ORDER BY $atr ASC;");
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
    public function addContenue($id , $url , $type , $id_formation )
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("INSERT INTO contenu (id, type , url, id_formation ) VALUES (:id, :type , :url, :id_formation )");
            $requete->bindParam(':id', $id);
            $requete->bindParam(':type', $type);
            $requete->bindParam(':url', $url);
            $requete->bindParam(':id_formation', $id_formation);
            if($requete->execute());
            echo 'Contenue ajouté avec succès';
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }    
    public function updateContenue($id , $url , $type , $id_formation)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("UPDATE contenu SET type = :type, url = :url, id_formation = :id_formation WHERE id = :id");
            $requete->bindParam(':id', $id);
            $requete->bindParam(':type', $type);
            $requete->bindParam(':url', $url);
            $requete->bindParam(':id_formation', $id_formation);
            if ($requete->execute()) 
            {
                echo 'Contenue mise à jour avec succès';
            } else 
            {
                echo 'Échec de la mise à jour de la Contenue';
            }
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    public function deleteContenue($id)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("DELETE FROM contenu WHERE id = :id");
            $requete->bindParam(':id', $id);
            if ($requete->execute()) 
            {
                echo 'Contenue supprimée avec succès';
            } else 
            {
                echo 'Échec lors de la suppression de la Contenue';
            }
        } 
        catch (PDOException $e) 
        {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    public static function ContenueExists($id)
    {
        $conn = config::getConnexion();
        try 
        {
            $requete = $conn->prepare("SELECT * FROM contenu WHERE id = :id");
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
    public function getContenue($id)
    {
        $Contenue = new Contenue ();
        $conn = config::getConnexion();
        $requete = $conn->prepare("SELECT * FROM contenu WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->execute();
        $count = $requete->rowCount(); // Utilisez rowCount() pour obtenir le nombre de lignes
        if($count > 0)
        { 
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            $Contenue->setId ( $resultat['id'] );
            $Contenue->seturl ( $resultat['url']);
            $Contenue->settype ( $resultat['type']);
            $Contenue->setId_F ( $resultat['id_formation']);
        
        }
        else
        {
            $Contenue->id = "";
        }
        return $Contenue ;
    }
}
?>