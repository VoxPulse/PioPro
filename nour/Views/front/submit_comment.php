<?php
require_once __DIR__ . '/../../Models/commentaire.php';
require_once __DIR__ . '/../../Controllers/commentaireC.php';

    $comment = new commentaire($_POST['form_comment_contenu'], $_POST['form_comment_id_user'], $_POST['post_id']);
    $commentC = new commentaireC();
    
    if (isset($_GET['id']) && ($_GET['id'] == 'update')) {
        $id = $_POST['comment_id'];
        $commentC->UpdateComment($comment, $id);
    } else {
        $commentC->addComment($comment, $_FILES['audioFile']);
        $pub1=new PublicationC();
        $r=$pub1->getPublicationById($_POST['post_id']);
        $pub1->UpdatePublicationNbComment($_POST['post_id'],($r['nb_comment']+1));
    }
    
    header("Location: index.php#postSection" . $_POST['post_id']);
    exit();
    
?>


