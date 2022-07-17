<?php
include('head.php'); //Appel des variables globales 
include('conn.php'); //Démarrage connexion

$handle = fopen('php://output','w'); //Ouverture et écriture du fichier

$req = $conn->prepare("SELECT `email`, `date` FROM `newsletter`");
$req->execute();
$donnees=$req->fetchAll(PDO::FETCH_ASSOC);

$champs=array("Email", "Date d'inscription"); //En-têtes du tableau
fputcsv($handle,$champs);

foreach ($donnees as $key => $value) {
    fputcsv($handle,$donnees[$key]);
}

$conn = null; //Arrêt connexion
fclose($handle); //Fermeture du fichier

$today = date("d-m-Y"); 
header('Content-Type: text/csv'); //Type du fichier
header('Content-Disposition: attachment;filename=newsletter-'.$today.'.csv'); //Téléchargement du fichier
?>