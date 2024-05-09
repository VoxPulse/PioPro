<?php
include 'C:\wamp64\www\VoxPulse4\Model\config.php';
include 'C:\wamp64\www\VoxPulse4\Model\offre_emploi.php';
class Offre_emploiC
{
<<<<<<< HEAD
<<<<<<< HEAD
    public function afficher($atr)
=======
    public function afficher()
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
    public function afficher()
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
    {
        $conn = config::getConnexion();
        try 
        {
<<<<<<< HEAD
<<<<<<< HEAD
            $requete = $conn->prepare("SELECT * FROM offre_emploi order by $atr");
=======
            $requete = $conn->prepare("SELECT * FROM offre_emploi");
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
            $requete = $conn->prepare("SELECT * FROM offre_emploi");
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
    public function addOffre($id, $titre_p , $description , $date_fin , $salaire , $categorie)
=======
<<<<<<< HEAD
<<<<<<< HEAD
    public function addOffre($id, $titre_p , $description , $date_fin , $salaire , $categorie)
=======
<<<<<<< HEAD
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
    public function addOffre($titre_p , $description , $date_fin , $salaire , $categorie)
=======
    public function addOffre($id , $titre_p , $description , $date_fin , $salaire , $categorie)
>>>>>>> 355c956eac4eef2648e55fce1160df4743d97bdc
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
            $requete = $conn->prepare("INSERT INTO offre_emploi (id, titre_p , description, date_fin, salaire ,  categorie) VALUES (:id, :titre_p , :description, :date_fin , :salaire, :categorie )");
            $requete->bindParam(':id', $id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
            $requete = $conn->prepare("INSERT INTO offre_emploi (id, titre_p , description, date_fin, salaire ,  categorie) VALUES (:id, :titre_p , :description, :date_fin , :salaire, :categorie )");
            $requete->bindParam(':id', $id);
=======
<<<<<<< HEAD
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
            $requete = $conn->prepare("INSERT INTO offre_emploi (titre_p , description, date_fin, salaire ,  categorie) VALUES (:titre_p , :description, :date_fin , :salaire, :categorie )");
=======
            $requete = $conn->prepare("INSERT INTO offre_emploi (id, titre_p , description, date_fin, salaire ,  categorie) VALUES (:id, :titre_p , :description, :date_fin , :salaire, :categorie )");
            $requete->bindParam(':id', $id);
>>>>>>> 355c956eac4eef2648e55fce1160df4743d97bdc
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
<<<<<<< HEAD
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4


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
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
=======
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
}


?>