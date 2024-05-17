<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
        <?php
           require_once __DIR__ . '/../../../Model/publication.php';
           require_once __DIR__ . '/../../../Controller/PublicationC.php';
            $pub1=new PublicationC();
            $pub1->afficherPub();
        ?>
</body>
</html>