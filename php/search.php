<?php
include('head.php'); //Appel des variables globales 
include('conn.php'); //Démarrage connexion
$search = json_decode(file_get_contents('php://input'), true);//Email à rechercher dans la base

if (isset($search) && !empty($search)) {
    $errorCode = true;
    try{
        $sth = $conn->prepare("SELECT `email`, `date` FROM `newsletter` WHERE `email` LIKE :email ORDER BY `email`");
        $sth->bindValue(':email', '%'.$search.'%', PDO::PARAM_STR);
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        $errorCode = $e->getCode();
    }
    echo json_encode(["responseServer"=>true, "responseDB"=>$errorCode, "data"=>$res]);
} else {
    echo json_encode(["responseServer"=>false]);
}

$sth2 = $conn->prepare("SELECT COUNT(`email`) FROM `newsletter`");
$sth2->execute();
$res2=$sth2->fetchAll(PDO::FETCH_COLUMN);

$conn = null; //Arrêt connexion
$record=$res2[0];//Nombre d'enregistrements total dans la table
settype($record, "integer");//Conversion string en integer
$resNum=$sth->rowCount();//Nombre d'enregistrements retournés par la requête
header('Record-number: '.$record);
header('Select-number: '.$resNum);
?>