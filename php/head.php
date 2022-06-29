<?php
require __DIR__ .'/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
define('SERVER', $_ENV['SERVER']);
define('DATABASE', $_ENV['DATABASE']);
define('USERNAME', $_ENV['USERNAME']);
define('PASSWORD', $_ENV['PASSWORD']);
?>