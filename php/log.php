<?php
include('head.php');

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $errorCode = true;
    try{
        $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE."", USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $conn->prepare("SELECT `username`, `password` FROM `users` WHERE `username`=(:username) AND `password`=(:password)");
        $sth->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
        $sth->bindValue(':password', MD5($_POST['password']), PDO::PARAM_STR);
        $sth->execute();
        $res = $sth->fetch(PDO::FETCH_ASSOC);
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