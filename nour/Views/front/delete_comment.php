<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
            require_once __DIR__ . '/../../Controllers/commentaireC.php';
            $comment1=new commentaireC();
            $id = $_GET['id_comment'];
            $comment1->DeleteComment($id);
            $pub1=new PublicationC();
            $r=$pub1->getPublicationById($_GET['delete_comment_pub']);
            $pub1->UpdatePublicationNbComment($_GET['delete_comment_pub'],($r['nb_comment']-1));
            header("Location: index.php");
            exit();
        ?>
</body>
</html>


