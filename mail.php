<?php
    if (isset($_POST['message'])) {
        $expéditeur=$_POST['nom'] . ' ' . $_POST['prénom'] . ' <' . $_POST['mail'].'>';
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: Basilique Saint-Ferjeux <basilique@promo-159.codeur.online>' . "\r\n";
        $entete .= 'Reply-to: ' . $expéditeur ;
        $objet = 'Contact - Basilique Saint-Ferjeux';
        $message = '<p>Message envoyé depuis la page Contact de la Basilique Saint-Ferjeux</p>
        <p><b>Nom et prénom : </b>' . $_POST['nom'] . ' ' . $_POST['prénom'] . '<br>
        <p><b>Email : </b>' . $_POST['mail'] . '<br>
        <p><b>Objet : </b>' . $_POST['objet'] . '<br>
        <b>Message : </b>' . htmlspecialchars($_POST['message']) . '</p>';
        $destinataire = 'Basilique Saint-Ferjeux <j.auzanneau@codeur.online>, ' . $expéditeur;
        if(!empty($_POST['nom']) && !empty($_POST['prénom']) && !empty($_POST['mail']) && !empty($_POST['objet']) && !empty($_POST['message'])){
            $retour = mail($destinataire, $objet, $message, $entete);
            echo "Votre message a bien été envoyé.";
        } else {
            echo "Une erreur est survenue.";
        }
    }
?>