<?php
include('head.php'); //Appel des variables globales 
include('conn.php'); //Démarrage connexion

$_POST = json_decode(file_get_contents('php://input'), true);

if (isset($_POST) && !empty($_POST)) {
    $sth = $conn->prepare("DELETE FROM `newsletter` WHERE `email`=:email;");
    $sth->bindParam(':email', $_POST, PDO::PARAM_STR);
    $sth->execute();
    $conn = null;
    echo json_encode(["responseServer"=>true, "responseDB"=>$errorCode]);
} else {
    echo json_encode(["responseServer"=>false]);
}
?>