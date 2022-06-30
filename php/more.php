<?php
include('head.php');
$errorCode = true;
$_POST = json_decode(file_get_contents('php://input'), true);
$a=5*$_POST;
try{
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE."", USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sth = $conn->prepare("SELECT `email`, `date` FROM `newsletter` ORDER BY `email` LIMIT 5 OFFSET ".$a);
    $sth->execute();
    $res=$sth->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e){
    $errorCode = $e->getCode();
}
$conn = null;
echo json_encode(["data"=>$res]);
?>