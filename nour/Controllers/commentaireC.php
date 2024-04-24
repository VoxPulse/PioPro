<?php
class commentaireC
{
    //AFFICHAGE front
    public function afficherComments($id_publication)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM commentaire WHERE id_publication = :id_publication");
            $query->bindParam(':id_publication', $id_publication, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll();
            foreach ($result as $row) 
            {
                echo "<div class='comment'>";
                    echo "<span class='comment-author'>" . htmlspecialchars($row['id_user']) . "</span>";
                    echo "<div class='comment-body'>" . htmlspecialchars($row['contenu']) . "</div>";
                    echo'<div class="comment-menu">
                            <span class="comment-dots" onclick="toggleMenu(this)" >⋮</span>
                            <div class="comment-actions" style="display: none;">
                            <a href="index.php?id_comment='. $row['id'] .'&showComment=true ">Modifier</a>
                            <a href="index.php?id_comment=' . $row['id'] . '&showPopupComment=true">Supprimer</a>
                            </div>
                        </div>';
                echo "</div>";
                
            }
        } 
        catch (PDOException $e) {
            echo 'Échec de la connexion : ' . $e->getMessage();
        }
    }
    
    //AJOUT 
    public function addComment( $comment)
    {
        require_once 'C:\wamp64\www\projetV2\Models\config.php';
        $conn = config::getConnexion();

        $contenu=$comment->getContenu();
        $id_user=$comment->getId_user();
        $post_id=$comment->getId_publication();
        $conn = config::getConnexion();
        try {
            $requete = $conn->prepare("INSERT INTO commentaire (contenu, id_user, id_publication ) VALUES (:contenu,:id_user, :id_publication)");
            $requete->bindParam(':contenu', $contenu);
            $requete->bindParam(':id_user', $id_user);
            $requete->bindParam(':id_publication', $post_id);
            $requete->execute();
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    //supp
    public function DeleteComment($id)
    {
        require_once 'C:\wamp64\www\projetV2\Models\config.php';
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("DELETE FROM commentaire WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            echo $query->rowCount() . 'records deleted successfully';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getCommentById($id)
    {
        require_once 'C:\wamp64\www\projetV2\Models\config.php';
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM commentaire WHERE id = :id");
            $query->execute(array(':id' => $id));
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo 'echec de connexion:' . $e->getMessage();
            return false; 
        }
    }
}
?>