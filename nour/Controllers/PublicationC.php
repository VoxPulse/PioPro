<?php
include 'C:\wamp64\www\projetV1\Models\config.php';

echo '

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" type="image/png" href="images/logo 1.png">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    ';
class PublicationC
{
    // AFFICHAGE front
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
            echo '<tr>';
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
            <div class="col text-center"><a href="Delete.php?id=' . $row['id'] . '"><img src="../assets/img/icons/delete (1).png" alt="delete"  /></a></div></td>';
            echo '</tr>';
        }
        echo '</tbody>
        </table>';
    }
    //AFFICHAGE back
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
        echo '
        <div class="question-type2033">
            <div class="col-md-1">
                <div class="left-user12923">
                    <a href="#">
                        <img src="image/images.png" alt="image" />
                        '.$row['id_user'].'
                    </a>
                </div>
                <div class="publication-options">
                    <button class="options-btn" onclick="toggleOptions(this)">&#8942;</button>
                    <div class="options-menu">
                        <a href="index.php?id='. $row['id'] .'&showQuestion=true ">Modifier</a>
                        <a href="Delete.php?id=' . $row['id'] . '">Supprimer</a>
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
                        <a href="#"><i class="fa fa-clock-o" aria-hidden="true">'.$row['date_crea'].'</i></a>
                        <button style="border :none; background-color: white;outline: none;" onclick="showComments()">
                            <i class="fa fa-comment toggle-comments" aria-hidden="true">5 answers</i>
                        </button>
                        <button style="border :none; background-color: white;outline: none;" onclick="toggleLike(this)">
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </button>
                            
                        <div class="comments" >
                            <input type="text" placeholder="Commentez...">
                            <button onclick="postComment(this)" class="sendComment"> Commenter </button>
                            <div id="commentsContainer" style="display: none;"></div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>';
        }
       
    }
    
    //GetUser
    
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
        $conn = config::getConnexion();
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
}