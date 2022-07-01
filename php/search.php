<?php
include('head.php');

$_POST = json_decode(file_get_contents('php://input'), true);

if (isset($_POST) && !empty($_POST)) {
    $errorCode = true;
    try{
        $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE."", USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $conn->prepare("SELECT `email`, `date` FROM `newsletter` WHERE `email` LIKE (:email) ORDER BY `email`");
        $sth->bindValue(':email', '%'.$_POST.'%', PDO::PARAM_STR);
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        $errorCode = $e->getCode();
    }
    $conn = null;
    echo json_encode(["responseServer"=>true, "responseDB"=>$errorCode, "data"=>$res]);
} else {
    echo json_encode(["responseServer"=>false]);
}

try{
    $conn1 = new PDO("mysql:host=".SERVER.";dbname=".DATABASE."", USERNAME, PASSWORD);
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth1 = $conn1->prepare("SELECT COUNT(`email`)  as `selectNumberEmail` FROM `newsletter` WHERE `email` LIKE (:email) ORDER BY `email`");
    $sth1->bindValue(':email', '%'.$_POST.'%', PDO::PARAM_STR);
    $sth1->execute();
    $research = $sth1->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e1){
    $errorCode = $e1->getCode();
}

try{
    $conn2 = new PDO("mysql:host=".SERVER.";dbname=".DATABASE."", USERNAME, PASSWORD);
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sth2 = $conn2->prepare("SELECT COUNT(`email`) as `totalNumberEmail` FROM `newsletter`");
    $sth2->execute();
    $res2=$sth2->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e2){
    $errorCode = $e2->getCode();
}
$record=json_encode($res2[0]);
$select=json_encode($research[0]);
header('Record-number: '.$record);
header('Select-number: '.$select);
?>