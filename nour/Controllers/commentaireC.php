<?php
require_once('PublicationC.php');
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
                echo "<div class='comment' id='comment-" . $row['id'] . "'>";
                    
                    echo "<span class='comment-author'>" . htmlspecialchars($row['id_user']) . "</span>";
                    echo "<div class='comment-body'>" . htmlspecialchars($row['contenu']) . "</div>";

                    if (!empty($row['audio_path'])) {
                        echo "<audio controls><source src='" . htmlspecialchars($row['audio_path']) . "' type='audio/ogg'></audio>";
                    }
                    echo "<span style='font-size:10px;padding: 4px 8px;position: relative;'>" . htmlspecialchars($row['date_crea']) . "</span>";
                

                    echo '<div class="comment-menu">
                        <span class="comment-dots" onclick="toggleMenu(this)">⋮</span>
                        <div class="comment-actions" style="display: none;">
                        <a href="index.php?edit_comment=' . $row['id'] . '&edit_comment_pub=' . $row['id_publication'] . '#postSection' . $row['id_publication'] . '">Modifier</a>
                        <a href="index.php?id_comment=' . $row['id'] .'&delete_comment_pub=' . $row['id_publication'] .'&showPopupComment=true">Supprimer</a>
                        </div>
                    </div>';

                echo "</div>"; 
            }
        } 
        catch (PDOException $e) {
            echo 'Échec de la connexion : ' . $e->getMessage();
        }
    }
    //AFFICHAGE back
    public function listComments($id_publication)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM commentaire WHERE id_publication = :id_publication");
            $query->bindParam(':id_publication', $id_publication, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll();
            echo '<table class="table align-items-center ">
            <tbody>
            <tr>
                <th >
                <div class=""text-center"">
                    <h6 class="text-sm mb-0"> ID</h6>
                </div>
                </th>
                <th>
                <div class="text-center">
                    <h6 class="text-sm mb-0">Contenu</h6>
                </div>
                </th>
                <th >
                <th>
                <div class="text-center">
                    <h6 class="text-sm mb-0">Vocal</h6>
                </div>
                </th>
                <th >
                <div class="col text-center">
                    <h6 class="text-sm mb-0">Date création</h6>
                </div>
                </th>
                <th >
                <div class="col text-center">
                    <h6 class="text-sm mb-0">ID user</h6>
                </div>
                </th>
                
                <th >
                <div class="col text-center">
                    <h6 class="text-sm mb-0">Supprimer</h6>
                </div>
                </th>
            </tr>';
            foreach ($result as $row) 
            {
                echo '<tr>';
                echo '<td class="align-middletext-sm" ">
                <div class="col text-center">' . $row['id'] . '</div></td>';
                echo '<td class="align-middletext-sm" style="max-width: 20px;white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;">
                <div class="col text-center" ><a href="dashboard.php?id_comment=' . $row['id'] .'&showPopupComment=true ">'. $row['contenu'] .'</a></div></td>';
                echo '<td class="align-middletext-sm">
                <div class="col text-center">' ;
                if (!empty($row['audio_path'])) {
                    echo "<audio controls><source src='../../front/" . htmlspecialchars($row['audio_path']) . "' type='audio/ogg'></audio>";
                } 
                echo '</div></td>';
                echo '<td class="align-middletext-sm">
                <div class="col text-center">' . $row['date_crea'] . '</div></td>';
                echo '<td class="align-middletext-sm">
                <div class="col text-center">' . $row['id_user'] . '</div></td>';
                echo'<td class="align-middletext-sm">
                <div class="col text-center"><a href="dashboard.php?id_comment_supp=' . $row['id'] . '&idpub_comment_supp=' . $row['id_publication'] .'&showPopupComment1=true"><img src="../assets/img/icons/delete (1).png" alt="delete"  /></a></div></td>';
                echo '</tr>';
            }
            echo '</tbody>
            </table>';
        } 
        catch (PDOException $e) {
            echo 'Échec de la connexion : ' . $e->getMessage();
        }
    }
    
    //AJOUT 
    public function addComment($comment, $audioFile = null)
    {
        require_once __DIR__ . '/../Models/config.php';
        $conn = config::getConnexion();
    
        $contenu = $comment->getContenu();
        $id_user = $comment->getId_user();
        $post_id = $comment->getId_publication();
        
        $audioPath = null;
        if ($audioFile && $audioFile['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $fileName = uniqid('audio_') . '.ogg';
            $filePath = $uploadDir . $fileName;
            if (move_uploaded_file($audioFile['tmp_name'], $filePath)) {
                $audioPath = $filePath;
            }
        }
    
        try {
            $requete = $conn->prepare("INSERT INTO commentaire (contenu, id_user, id_publication, audio_path) VALUES (:contenu, :id_user, :id_publication, :audio_path)");
            $requete->bindParam(':contenu', $contenu);
            $requete->bindParam(':id_user', $id_user);
            $requete->bindParam(':id_publication', $post_id);
            $requete->bindParam(':audio_path', $audioPath);
            $requete->execute();
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    
    //supp
    public function DeleteComment($id)
    {
        require_once __DIR__ . '/../Models/config.php';
        $conn = config::getConnexion();
        $test=false;
        try {
            if($id[0]=="*")
            {    
                $idR=substr($id,1);
                $test=true;
            }
            else
            {   
                $idR=$id;
            }
            $query = $conn->prepare("SELECT audio_path FROM commentaire WHERE id = :id");
            $query->bindParam(':id', $idR);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if($test==true)
            {
                $audioPath = "../../front/".$result['audio_path'];
            }
            else
            {
                $audioPath = $result['audio_path'];
            }

            $query = $conn->prepare("DELETE FROM commentaire WHERE id = :id");
            $query->bindParam(':id', $idR);
            $query->execute();

            if ($query->rowCount() > 0) {
                echo $query->rowCount() . ' records deleted successfully';
                if ($audioPath && file_exists($audioPath)) {
                    unlink($audioPath);
                    echo " and the audio file has been deleted.";
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
    // UPDATE
    public function UpdateComment($comment,$id)
    {
        require_once __DIR__ . '/../Models/config.php';
        $conn = config::getConnexion();
        $contenu=$comment->getContenu();
        $id_user=$comment->getId_user();
        $post_id=$comment->getId_publication();
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("UPDATE commentaire SET  contenu=:contenu , id_user=:id_user , id_publication=:id_publication WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->bindParam(':contenu', $contenu);
            $query->bindParam(':id_user', $id_user);
            $query->bindParam(':id_publication', $post_id);
            $query->execute();
            echo $query->rowCount() . ' records updated successfully';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getCommentById($id)
    {
        require_once __DIR__ . '/../Models/config.php';
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
    //nb comment
    function getCommentCount($postId) {
        require_once __DIR__ . '/../Models/config.php';
        $conn = config::getConnexion();
    
        try {
            $query = $conn->prepare("SELECT * FROM commentaire WHERE id_publication = :id_publication");
            $query->bindParam(':id_publication', $postId, PDO::PARAM_INT);
            $query->execute();
            $nb = $query->rowCount(); 
            return $nb;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return 0;
        }
    }
    
}
?>