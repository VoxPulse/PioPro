<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
            require_once __DIR__ . '/../../Controllers\PublicationC.php';
            $pub1=new PublicationC();
            $id = $_GET['id'];
            $pub1->DeletePublication($id);
            header("Location: index.php");
            exit();
        ?>
</body>
</html>


