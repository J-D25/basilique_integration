<?php
include('head.php');
$errorCode = true;
try{
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE."", USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sth = $conn->prepare("SELECT `email`, `date` FROM `newsletter` ORDER BY `email`");
    $sth->execute();
    $res=$sth->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e){
    $errorCode = $e->getCode();
}
$conn = null;
echo json_encode(["data"=>$res]);
?>