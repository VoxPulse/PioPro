<?php
require_once __DIR__ . '/../../../Controllers/PublicationC.php';
$pub1 = new PublicationC();
require_once __DIR__ . '/../../../Controllers/commentaireC.php';
$comment = new commentaireC();

header('Content-Type: application/json');

// Combine the data into one array
$result = [
    'publications' => $pub1->getMonthlyPostsData(),
    'comments' => $comment->getMonthlyCommentsData()
];

// Encode and output the combined data
echo json_encode($result);
?>
