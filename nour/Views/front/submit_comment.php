<?php
    require_once('C:\wamp64\www\projetV5\Models\commentaire.php');
    require_once('C:\wamp64\www\projetV5\Controllers\commentaireC.php');
    $comment=new commentaire($_POST['form_comment_contenu'],$_POST['form_comment_id_user'],$_POST['post_id']);
    $comment1=new commentaireC();
    $id=$_POST['comment_id'];
    if(isset($_GET['id'])&&($_GET['id'] == 'update'))
    {
        $comment1->UpdateComment($comment,$id);
    }
    
    else
    {
        $comment1->addComment($comment);
        $pub1=new PublicationC();
        $r=$pub1->getPublicationById($_POST['post_id']);
        $pub1->UpdatePublicationNbComment($_POST['post_id'],($r['nb_comment']+1));
        
    }
    header("Location: index.php#postSection" . $_POST['post_id']);
    exit();
?>