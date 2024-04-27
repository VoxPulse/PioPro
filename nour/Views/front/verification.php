<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
        <?php
            require_once('C:\wamp64\www\projetV4\Models\publication.php');
            require_once('C:\wamp64\www\projetV4\Controllers\PublicationC.php');
            $pub1=new PublicationC();
            $pub1->afficherPub();
        ?>
</body>
</html>