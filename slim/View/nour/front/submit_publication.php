<!-- submit_publication.php -->
<?php
    require_once __DIR__ . '/../../../Model/publication.php';
    require_once __DIR__ . '/../../../Controller/PublicationC.php';
    $pub=new Publication($_POST['titre'],$_POST['contenu'],$_POST['id_user']);
    $pub1=new PublicationC();
    $id=$_POST['id'];
    if(isset($_GET['id']))
    {
        $pub1->UpdatePublication($pub,$id);
    }
    else
    {
        $pub1->addPublication($pub);
    }
    header("Location: index.php");
    exit();

?>
