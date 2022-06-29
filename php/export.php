<?php
include('head.php');

$handle = fopen('php://output','w');

$bdd = new PDO("mysql:host=".SERVER.";dbname=".DATABASE."", USERNAME, PASSWORD);
$req=$bdd->query('SELECT `email`, `date` FROM `newsletter`');
$ctr=0;

while($donnees=$req->fetch(PDO::FETCH_ASSOC))
{
    // Head
    if($ctr===0){
        $champs=array_keys($donnees);
        fputcsv($handle,$champs);
    }
    // Body
    fputcsv($handle,$donnees);
    $ctr++;
}

$req->closeCursor();
fclose($handle);

$today = date("d-m-Y"); 
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=newsletter-'.$today.'.csv');
?>