<?php
include('head.php'); //Appel des variables globales 
include('conn.php'); //Démarrage connexion
$input = json_decode(file_get_contents('php://input'), true);
$limit = 5;
$offset=$limit*$input;
$errorCode = true;
try{
    $sth = $conn->prepare("SELECT `email`, `date` FROM `newsletter` ORDER BY `email` LIMIT :limit OFFSET :offset");
    $sth->bindParam(':limit', $limit, PDO::PARAM_INT);
    $sth->bindParam(':offset', $offset, PDO::PARAM_INT);
    $sth->execute();
    $res=$sth->fetchAll(PDO::FETCH_ASSOC);
    $sth2 = $conn->prepare("SELECT COUNT(`email`) as `totalNumberEmail` FROM `newsletter`");
    $sth2->execute();
    $res2=$sth2->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e){
    $errorCode = $e->getCode();
}
$conn = null;
echo json_encode(["data"=>$res]);

$record=json_encode($res2[0]);
header('Record-number: '.$record);
header('Select-number: '.($offset+$limit));
?>