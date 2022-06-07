<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Auteur:J-D25, Projet ACS 2022">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500&family=Domine:wght@700&display=swap" rel="stylesheet">
    <script src="script.js" defer></script>
    <title>Basilique Saint-Ferjeux</title>
</head>

<body>
    <header id="header_short">
        <?php include("header.html")?>
    </header>
    <main>
        <h2>Contactez-nous</h2>
        <p>Vous avez une question concernant notre basilique ? Vous pouvez nous joindre à tout moment via le formulaire de contact ci-dessous. N'hésitez pas à nous contacter, nous serons très heureux de vous répondre !</p>
        <form id="contact_form" method="post" novalidate>
            <div id="contact_form_flexname">
                <div id="contact_form_flexname_name">
                    <label for="contact_form_name">Nom</label>
                    <input type="text" name="nom" id="contact_form_name" class="contact_form_input" aria-required="true" required/>
                </div>
                <div id="contact_form_flexname_firstname">
                    <label for="contact_form_firstname">Prénom</label>
                    <input type="text" name="prénom" id="contact_form_firstname" class="contact_form_input" aria-required="true" required/>
                </div>
            </div>
            <label for="contact_form_email">Email</label>
            <input type="email" name="mail" id="contact_form_email" class="contact_form_input" aria-required="true" required/>
            <label for="contact_form_object">Objet</label>
            <input type="text"  name="objet" id="contact_form_object" class="contact_form_input" aria-required="true" required/>
            <label for="contact_form_message">Message</label>
            <textarea name="message" id="contact_form_message" rows="8" class="contact_form_input" aria-required="true" required></textarea>
            <div class="button">
                <input type="submit" value="Valider" id="contact_form_button">
            </div>
        </form>
    </main>
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
        $retour = mail($destinataire, $objet, $message, $entete);
        if($retour)
        echo '<p>Votre message a bien été envoyé.</p>';
            header('Location: contact.php'); 
            exit();
    }
    ?>
    <footer>
        <?php include("footer.html")?>
    </footer>
</body>

</html>
