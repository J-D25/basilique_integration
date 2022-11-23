<?php
include('head.php'); //Appel des variables globales
include('conn.php'); //Démarrage connexion
$limit = 5;//Limite le nombre d'enregistrements à retourner
$offset = json_decode(file_get_contents('php://input'), true);//Nombre d'enregistrements actuellement affichés

//Récupération des enregistrements
$sth = $conn->prepare("SELECT `email`, `date_created` AS `date` FROM `newsletter` ORDER BY `email` LIMIT :limits OFFSET :offsets");
$sth->bindParam(':limits', $limit, PDO::PARAM_INT);
$sth->bindParam(':offsets', $offset, PDO::PARAM_INT);
$sth->execute();
$res=$sth->fetchAll(PDO::FETCH_ASSOC);

//Récupération du nombre d'enregistrements dans la table
$sth2 = $conn->prepare("SELECT COUNT(`email`) as `totalNumberEmail` FROM `newsletter`");
$sth2->execute();
$record=$sth2->fetch(PDO::FETCH_COLUMN);//Nombre d'enregistrements total dans la table

$conn = null; //Arrêt connexion
echo json_encode(["data"=>$res]);
$resNum=$sth->rowCount();//Nombre d'enregistrements retournés par la requête
settype($record, "integer");//Conversion string en integer

header('Record-number: '.$record);//Stockage du nombre d'enregistrements total dans l'en-tête de la réponse
header('Select-number: '.($offset+$resNum));//Stockage du nombre d'enregistrements affichés dans l'en-tête de la réponse
?>