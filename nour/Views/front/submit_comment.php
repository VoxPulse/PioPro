<?php
    require_once('C:\wamp64\www\projetV6\Models\commentaire.php');
    require_once('C:\wamp64\www\projetV6\Controllers\commentaireC.php');
    $comment = new commentaire($_POST['form_comment_contenu'], $_POST['form_comment_id_user'], $_POST['post_id']);
    $commentC = new commentaireC();
    
    if (isset($_GET['id']) && ($_GET['id'] == 'update')) {
        $id = $_POST['comment_id'];
        $commentC->UpdateComment($comment, $id);
    } else {
        $commentC->addComment($comment, $_FILES['audioFile']);
    }
    
    header("Location: index.php#postSection" . $_POST['post_id']);
    exit();
    
?>