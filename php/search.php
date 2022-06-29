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
?>