<?php
include('head.php'); //Appel des variables globales 
include('conn.php'); //Démarrage connexion
$limit = 5;//Limite le nombre d'enregistrements à retourner
$offset = json_decode(file_get_contents('php://input'), true);//Nombre d'enregistrements actuellement affichés
$errorCode = true;
try{
    $sth = $conn->prepare("SELECT `email`, `date` FROM `newsletter` ORDER BY `email` LIMIT :limit OFFSET :offset");
    $sth->bindParam(':limit', $limit, PDO::PARAM_INT);
    $sth->bindParam(':offset', $offset, PDO::PARAM_INT);
    $sth->execute();
    $res=$sth->fetchAll(PDO::FETCH_ASSOC);
    $sth2 = $conn->prepare("SELECT COUNT(`email`) as `totalNumberEmail` FROM `newsletter`");
    $sth2->execute();
    $res2=$sth2->fetchAll(PDO::FETCH_COLUMN);
}
catch(PDOException $e){
    $errorCode = $e->getCode();
}
$conn = null;
echo json_encode(["data"=>$res]);
$resNum=$sth->rowCount();//Nombre d'enregistrements retournés par la requête
$record=json_encode($res2[0]);//Nombre d'enregistrements total dans la table
header('Record-number: '.$record);//Stockage du nombre d'enregistrements total dans l'en-tête de la réponse
header('Select-number: '.($offset+$resNum));//Stockage du nombre d'enregistrements affichés dans l'en-tête de la réponse
?>