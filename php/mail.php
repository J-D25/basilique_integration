<?php
    if (isset($_POST['lname']) && isset($_POST['fname']) && isset($_POST['mail']) && isset($_POST['object']) && isset($_POST['message'])) {
        if(!empty($_POST['lname']) && !empty($_POST['fname']) && !empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) && !empty($_POST['object']) && !empty($_POST['message'])) {
            //Variables
            $firstName = htmlspecialchars($_POST['fname']);
            $lastName = htmlspecialchars($_POST['lname']);
            $objectContent = htmlspecialchars($_POST['object']);
            $mailContent = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
            $messageContent = htmlspecialchars($_POST['message']);
            
            //Contenu mail
            $sender=$lastName . ' ' . $firstName . ' <' . $mailContent.'>';
            $header  = 'MIME-Version: 1.0' . "\r\n";
            $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $header .= 'From: Basilique Saint-Ferjeux <basilique@promo-159.codeur.online>' . "\r\n";
            $header .= 'Reply-to: ' . $sender ;
            $object = 'Contact - Basilique Saint-Ferjeux';
            $message = '<p>Message envoyé depuis la page Contact de la Basilique Saint-Ferjeux</p>
            <p><b>Nom et prénom : </b>' . $lastName . ' ' . $firstName . '</p>
            <p><b>Email : </b>' . $mailContent . '</p>
            <p><b>Objet : </b>' . $objectContent . '</p>
            <b>Message : </b>' . $messageContent . '</p>';
            $receiver = 'Basilique Saint-Ferjeux <j.auzanneau@codeur.online>, ' . $sender;
            $response = mail($receiver, $object, $message, $header);
            if ($response===true){
                echo json_encode(["responseServer"=>true, "responseMailer"=>true]);
            }else{
                echo json_encode(["responseServer"=>true, "responseMailer"=>false]);
            }
        } else {
            echo json_encode(["response"=>false]);
        }
    }
?>

