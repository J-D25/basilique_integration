<?php
require __DIR__ .'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
define('SERVER', $_ENV['SERVER']);
define('DATABASE', $_ENV['DATABASE']);
define('USERNAME', $_ENV['USERNAME']);
define('PASSWORD', $_ENV['PASSWORD']);

$_POST = json_decode(file_get_contents('php://input'), true);

if (isset($_POST) && !empty($_POST)) {
    $errorCode = true;
    try{
        $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE."", USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare("DELETE FROM `newsletter` WHERE `email` = '$_POST';");
        $sth->execute();
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