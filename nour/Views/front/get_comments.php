<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
        <?php
            require_once('C:\wamp64\www\projetV2\Models\commentaire.php');
            require_once('C:\wamp64\www\projetV2\Controllers\commentaireC.php');
         
            function listComments($id_pub) {
                $comment1 = new commentaireC();
                $comment1->afficherComments($id_pub);
                       }

        ?>
</body>
</html>