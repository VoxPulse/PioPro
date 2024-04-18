<!-- submit_publication.php -->
<?php
    require_once('C:\wamp64\www\projetV1\Models\publication.php');
    require_once('C:\wamp64\www\projetV1\Controllers\PublicationC.php');
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
    // Redirection vers la page principale
    header("Location: index.php");
    exit();

?>
