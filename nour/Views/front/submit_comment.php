<?php
    require_once('C:\wamp64\www\projetV4\Models\commentaire.php');
    require_once('C:\wamp64\www\projetV4\Controllers\commentaireC.php');
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
    }
    header("Location: index.php#postSection" . $_POST['post_id']);
    exit();
?>