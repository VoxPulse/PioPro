<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
            require_once('C:\wamp64\www\projetV5\Controllers\commentaireC.php');
            $comment1=new commentaireC();
            $id = $_GET['id_comment'];
            $comment1->DeleteComment($id);
            $pub1=new PublicationC();
            $r=$pub1->getPublicationById($_GET['idpub_comment_supp']);
            $pub1->UpdatePublicationNbComment($_GET['idpub_comment_supp'],($r['nb_comment']-1));
           
            header("Location: dashboard.php");
            exit();
        ?>
</body>
</html>


