<?php
    if (isset($_POST['nom']) && isset($_POST['prénom']) && isset($_POST['mail']) && isset($_POST['objet']) && isset($_POST['message'])) {
        if(!empty($_POST['nom']) && !empty($_POST['prénom']) && !empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) && !empty($_POST['objet']) && !empty($_POST['message'])) {
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
            $retour = mail($destinataire, $objet, $message, $entete);
            echo json_encode(["response"=>true]);
        } else {
            echo json_encode(["response"=>false]);
        }
    }
?>