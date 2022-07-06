<?php
include('head.php'); //Appel des variables globales 
include('conn.php'); //Démarrage connexion
$limit = 5;
$errorCode = true;

$sth = $conn->prepare("SELECT `email`, `date` FROM `newsletter` ORDER BY `email` LIMIT :limit;");
$sth->bindParam(':limit', $limit, PDO::PARAM_INT);
$sth->execute();
$res=$sth->fetchAll(PDO::FETCH_ASSOC);
$sth2 = $conn->prepare("SELECT COUNT(`email`) as `totalNumberEmail` FROM `newsletter`");
$sth2->execute();
$res2=$sth2->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
echo json_encode(["data"=>$res]);

$record=json_encode($res2[0]);
header('Record-number: '.$record);
header('Select-number: '.$limit);
?>