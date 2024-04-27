<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
        <?php
            require_once('C:\wamp64\www\projetV4\Models\commentaire.php');
            require_once('C:\wamp64\www\projetV4\Controllers\commentaireC.php');
         
            function listComments($id_pub) {
                $comment1 = new commentaireC();
                $comment1->afficherComments($id_pub);
                       }
            function nbrComment($id_pub) {
            $comment1 = new commentaireC();
            echo $comment1->getCommentCount($id_pub); // Echo the result here
        }

        ?>
</body>
</html>