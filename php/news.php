<?php
include('head.php'); //Appel des variables globales

if (isset($_POST['newsletter_email']) && !empty($_POST['newsletter_email']) && filter_var($_POST['newsletter_email'], FILTER_VALIDATE_EMAIL)) {
    $email = filter_var($_POST['newsletter_email'], FILTER_SANITIZE_EMAIL);
    $errorCode = true;
    try{
        $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE."", USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("INSERT INTO newsletter (email) VALUES ( :email )");
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->execute();
    }
    catch(PDOException $e){
        $errorCode = $e->getCode();
    }
    $conn = null;
    echo json_encode(["responseServer"=>true, "responseDB"=>$errorCode]);
    
} else {
    echo json_encode(["responseServer"=>false]);
}

?>