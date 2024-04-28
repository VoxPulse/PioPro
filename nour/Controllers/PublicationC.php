<?php
include 'C:\wamp64\www\projetV5\Models\config.php';

class PublicationC
{
    // AFFICHAGE back
    public function ListPublication()
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * from publication ");
            $query->execute();
            $result = $query->fetchAll();
        } catch (PDOException $e) {
            echo 'echec de connexion:' . $e->getMessage();
        }
  
        echo '<table id="publicationsTable" class="table align-items-center ">
        <tbody>
          <tr>
            <th >
              <div class=""text-center"">
                  <h6 class="text-sm mb-0"> ID</h6>
              </div>
            </th>
            <th>
              <div class="text-center">
                <h6 class="text-sm mb-0">Titre</h6>
              </div>
            </th>
            <th>
              <div class="text-center">
                <h6 class="text-sm mb-0">Contenu</h6>
              </div>
            </th>
            <th >
              <div class="col text-center">
                <h6 class="text-sm mb-0">Likes</h6>
              </div>
            </th>
            <th >
              <div class="col text-center">
                <h6 class="text-sm mb-0">Commentaires</h6>
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
        foreach ($result as $row) {
            echo '<tr data-pub-id="' . $row['id'] . '">';
            echo '<td class="align-middletext-sm" ">
            <div class="col text-center">' . $row['id'] . '</div></td>';
            echo '<td class="align-middletext-sm" ">
            <div class="col text-center">' . $row['titre'] . '</div></td>';
            echo '<td class="align-middletext-sm" style="max-width: 20px;white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;">
            <div class="col text-center" ><a href="dashboard.php?id='. $row['id'] .'&showPopup=true ">'. $row['contenu'] .'</a></div></td>';
            echo '<td class="align-middletext-sm" >
            <div class="col text-center">' . $row['nb_like'] . '</div></td>';
            echo '<td class="align-middletext-sm">
            <div class="col text-center">' . $row['nb_comment'] . '</div></td>';
            echo '<td class="align-middletext-sm">
            <div class="col text-center">' . $row['date_crea'] . '</div></td>';
            echo '<td class="align-middletext-sm">
            <div class="col text-center">' . $row['id_user'] . '</div></td>';
            echo'<td class="align-middletext-sm">
            <div class="col text-center"><a href="dashboard.php?id=' . $row['id'] . '&showPopup1=true"><img src="../assets/img/icons/delete (1).png" alt="delete"  /></a></div></td>';
            echo '</tr>';
        }
        echo '</tbody>
        </table>';
    }
    //AFFICHAGE front
    public function afficherPub()
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * from publication ");
            $query->execute();
            $result = $query->fetchAll();
        } catch (PDOException $e) {
            echo 'echec de connexion:' . $e->getMessage();
        }
        foreach ($result as $row) {
            $uniqueId = htmlspecialchars($row['id']);
            $rowCom = false;
            if(isset($_GET['edit_comment']))
            {
                require_once('C:\wamp64\www\projetV5\Controllers\commentaireC.php');
                $comment1=new commentaireC();
                $id_com = $_GET['edit_comment'];
                $rowCom = $comment1->getCommentById($id_com);
                if ($rowCom !== false) 
                {
                    $id_user_comment = $rowCom['id_user'];
                    $contenu_comment=$rowCom['contenu'];
                } 
                else 
                {
                    echo "Comment not found.";
                }
            }
            echo '
            <div class="question-type2033" id="postSection'.$uniqueId.'">
                <div class="col-md-1">
                    <div style="display: flex; align-items: center;">
                        <img src="image/images.png" alt="image" style="margin-right: 10px; width: 50px; height: auto;">
                        <span>'.$row['id_user'].'</span>
                    </div>
            
                    <div class="publication-options">
                        <button class="options-btn" onclick="toggleOptions(this)">&#8942;</button>
                        <div class="options-menu">
                            <a href="index.php?id='. $row['id'] .'&showQuestion=true ">Modifier</a>
                            <a href="index.php?id='. $row['id'] . '&showPopup1=true">Supprimer</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="right-description893">
                        <div id="que-hedder2983">
                            <h3>
                                <a href="post-deatils.html" target="_blank">'.$row['titre'].'</a>
                            </h3>
                        </div>
                        <div class="ques-details10018">
                            <p>'.$row['contenu'].'</p>
                        </div>
                        <div class="ques-icon-info3293">
                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true">'.$row['date_crea'].'</i></a>';

                            echo '<button style="border: none; background-color: white; outline: none;" onclick="toggleComments(\'commentsContainer' . $row['id'] . '\')">
                                <i class="fa fa-comment toggle-comments" aria-hidden="true">';include_once 'get_comments.php';
                                nbrComment($row['id']);
                                echo ' Commentaires </i>
                            </button>                      

                            <button style="border :none; background-color: white;outline: none;" onclick="toggleLike(this)">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                        </div>  
                        <div class="commentSection">
                        
                        <form action="submit_comment.php' . ((isset($_GET['edit_comment']) && $_GET['edit_comment'] == $rowCom['id']) ? '?id=update' : '') . '#postSection' . $uniqueId . '" method="POST" id="pubComment' . $uniqueId . '">';
                            echo "<input type='hidden' name='comment_id' ";if (isset($rowCom['id'])){echo 'value="'.$rowCom['id'].'"';}echo">";
                            echo '
                            <input type="hidden" name="post_id" value="'.$uniqueId.'">
                            <div class="input-group">
                                <input type="text" name="form_comment_id_user" id="form_comment_id_user'.$uniqueId.'" placeholder="Entrez ID"';if ((isset($_GET['edit_comment']))&& ($_GET['edit_comment']== $rowCom['id'])&&($_GET['edit_comment_pub'] == $row['id'])){echo 'value="'.$id_user_comment.'"';} if (isset($id_user_comment)) { echo 'readonly'; }echo'>';
                                echo '
                                <span id="form_comment_user_idError'.$uniqueId.'" class="form_comment_user_idError error"></span>
                            </div>
                            <div class="input-group">
                                <input type="text" name="form_comment_contenu" id="form_comment_contenu'.$uniqueId.'" placeholder="Commentez..." value ="'; if ((isset($_GET['edit_comment']))&& ($_GET['edit_comment'] == $rowCom['id'])&&($_GET['edit_comment_pub'] == $row['id'])){echo $contenu_comment;} echo'" >
                                <span id="form_comment_contenuError'.$uniqueId.'" class="form_comment_contenuError error"></span>
                            </div>
                            <button type="submit" class="send_Comment">Commenter</button>
                        </form>
                            
                        <div id="commentsContainer'.$row['id'].'" style="display: block;">';
                        include_once 'get_comments.php';
                        listComments($row['id']);
                    echo '</div>
                     </div>
                </div>    
            </div>
        </div>';
        
        }
       
    }
    
    public function getPublicationById($id)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM publication WHERE id = :id");
            $query->execute(array(':id' => $id));
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo 'echec de connexion:' . $e->getMessage();
            return false; 
        }
    }

    // SUPPRESSION 
    public function DeletePublication($id)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("DELETE FROM publication WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            echo $query->rowCount() . 'records deleted successfully';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    //AJOUT 
    public function addPublication( $pub)
    {
        $conn = config::getConnexion();
        $titre=$pub->getTitre();
        $contenu=$pub->getContenu();
        $nb_like=$pub->getNb_like();
        $nb_comment=$pub->getNb_comment();
        $id_user=$pub->getId_user();
        $conn = config::getConnexion();
        try {
            $requete = $conn->prepare("INSERT INTO publication (titre, contenu, nb_like, nb_comment, id_user) VALUES (:titre,:contenu,:nb_like,:nb_comment,:id_user)");
            $requete->bindParam(':titre', $titre);
            $requete->bindParam(':contenu', $contenu);
            $requete->bindParam(':nb_like', $nb_like);
            $requete->bindParam(':nb_comment', $nb_comment);
            $requete->bindParam(':id_user', $id_user);
            $requete->execute();
        } catch (PDOException $e) {
            echo 'Échec de connexion : ' . $e->getMessage();
        }
    }
    // UPDATE
    public function UpdatePublication($pub,$id)
    {
        $conn = config::getConnexion();
        $titre=$pub->getTitre();
        $contenu=$pub->getContenu();
        $id_user=$pub->getId_user();
        try {
            $query = $conn->prepare("UPDATE publication SET titre=:titre , contenu=:contenu ,id_user=:id_user  WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->bindParam(':titre', $titre);
            $query->bindParam(':contenu', $contenu);
            $query->bindParam(':id_user', $id_user);
            $query->execute();
            echo $query->rowCount() . ' records updated successfully';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function UpdatePublicationNbComment($id,$nbComment)
    {
        
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("UPDATE publication SET nb_comment=:nb_comment  WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->bindParam(':nb_comment', $nbComment);
            $query->execute();
            echo $query->rowCount() . ' records updated successfully';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>