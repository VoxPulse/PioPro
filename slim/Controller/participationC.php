<?php
include 'C:\wamp64\www\VoxPulse\Model\config.php';
class participationC
{
    // AFFICHAGE 
    public function ListParticipation()
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM participation");
            $query->execute();
            $result = $query->fetchAll();

            $tableHTML = '<table class="table">';
            $tableHTML .= '<thead>';
            $tableHTML .= '<tr>';
            $tableHTML .= '<th>id</th>';
            $tableHTML .= '<th>nom</th>';
            $tableHTML .= '<th>prenom</th>';
            $tableHTML .= '<th>email</th>';
            $tableHTML .= '<th>tel</th>';
            $tableHTML .= '<th>etablissement</th>';
            $tableHTML .= '<th>Action</th>'; // Nouvelle colonne pour les boutons d'action
            $tableHTML .= '</tr>';
            $tableHTML .= '</thead>';
            $tableHTML .= '<tbody>';

            foreach ($result as $row) {
                $tableHTML .= '<tr>';
                $tableHTML .= '<td><img src="' . $row['img'] . '" alt="Image"></td>';
                $tableHTML .= '<td>' . $row['id'] . '</td>';
                $tableHTML .= '<td>' . $row['nom'] . '</td>';
                $tableHTML .= '<td>' . $row['prenom'] . '</td>';
                $tableHTML .= '<td>' . $row['email'] . '</td>';
                $tableHTML .= '<td>' . $row['tel'] . '</td>';
                $tableHTML .= '<td>' . $row['etablissement'] . '</td>';
                $tableHTML .= '<td><button class="btn btn-danger btn-supprimer" data-id="' . $row['id'] . '">Supprimer</button>';
                $tableHTML .= '<button class="btn btn-primary" data-id="' . $row['id'] . '">Modifier</button></td>';
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


    // GET USER BY ID
    public function getParticipationById($id)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM participation WHERE id=:id ");
            $query->bindParam(':id', $id);
            $query->execute();
            $result = $query->fetchAll();
            return $result; // Retourner le résultat de la requête
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
            return false; // En cas d'erreur, retourner false
        }
    }

    // SUPPRESSION 
    public function DeleteParticipation($id)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("DELETE FROM participation WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            echo $query->rowCount() . ' enregistrements supprimés avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }

    // AJOUT 
    public function AddParticipation($nom, $prenom, $email, $tel, $etablissement)
    {
        $conn = config::getConnexion();
        try {
            $requete = $conn->prepare("INSERT INTO participation (nom,prenom, email,tel,etablissement)");
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':prenom', $prenom);
            $requete->bindParam(':email', $email);
            $requete->bindParam(':tel', $tel);
            $requete->bindParam(':etablissement', $etablissement);
            $requete->execute();
            echo 'evenement ajouté avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }

    // UPDATE
    public function UpdateParticipation($id, $nom, $prenom, $email, $tel, $etablissement)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("UPDATE participation SET nom=:nom , prenom=:prenom , email=:email , tel=:tel ,etablissement=:etablissement WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':email', $email);
            $query->bindParam(':tel', $tel);
            $query->bindParam(':etablissement', $etablissement);
            $query->execute();
            echo $query->rowCount() . ' enregistrements mis à jour avec succès';
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
}
