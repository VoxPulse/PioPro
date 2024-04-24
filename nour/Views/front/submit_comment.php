<?php
    require_once('C:\wamp64\www\projetV2\Models\commentaire.php');
    require_once('C:\wamp64\www\projetV2\Controllers\commentaireC.php');
    $comment=new commentaire($_POST['form_comment_contenu'],$_POST['form_comment_id_user'],$_POST['post_id']);
    $comment1=new commentaireC();
    $comment1->addComment($comment);
    
    // Redirection vers la page principale
    header("Location: index.php");
    exit();
?>
