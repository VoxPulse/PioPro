<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
            require_once('C:\wamp64\www\projetV4\Controllers\commentaireC.php');
            $comment1=new commentaireC();
            $id = $_GET['id_comment'];
            $comment1->DeleteComment($id);
            // Redirection vers la page principale
            header("Location: index.php");
            exit();
        ?>
</body>
</html>


