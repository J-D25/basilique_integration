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
        <form id="contact_form" method="post">
            <div id="contact_form_flexname">
                <div id="contact_form_flexname_name">
                    <label for="contact_form_name">Nom</label>
                    <input type="text" name="nom" id="contact_form_name" aria-required="true"/>
                </div>
                <div id="contact_form_flexname_firstname">
                    <label for="contact_form_firstname">Prénom</label>
                    <input type="text" name="prénom" id="contact_form_firstname" aria-required="true"/>
                </div>
            </div>
            <label for="contact_form_email">Email</label>
            <input type="email" name="mail" id="contact_form_email" aria-required="true"/>
            <label for="contact_form_object">Objet</label>
            <input type="text"  name="objet" id="contact_form_object" aria-required="true"/>
            <label for="contact_form_message">Message</label>
            <textarea name="message" id="contact_form_message" rows="8" aria-required="true"></textarea>
            <div class="button">
                <input type="submit" value="Valider" id="contact_form_button">
            </div>
        </form>
    </main>
    <?php
$nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
$prénom = isset($_POST['prénom']) ? $_POST['prénom'] : NULL;
$mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
$objet = isset($_POST['objet']) ? $_POST['objet'] : NULL;
$message = isset($_POST['message']) ? $_POST['message'] : NULL;

// $nom=$_POST['nom']; 
// $mail=$_POST['mail']; 
// $objet=$_POST['objet']; 
// $message=$_POST['message']; 

/////voici la version Mine 
$headers = "MIME-Version: 1.0\r\n"; 

//////ici on détermine le mail en format text 
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n"; 

////ici on détermine l'expediteur et l'adresse de réponse 3
$expéditeur='j.auzanneau@codeur.online';
$headers .= "From: $nom $prénom <$mail>\r\nReply-to : Basilique Saint-Ferjeux <$expéditeur>\nX-Mailer:PHP"; 

$subject="$objet"; 
$destinataire=$mail.','.$expéditeur;
$body="$message"; 
if (mail($destinataire,$subject,$body,$headers)) { 
echo "Votre mail a été envoyé<br>"; 
} else { 
echo "Une erreur s'est produite"; 
} 
?>
    <footer>
        <?php include("footer.html")?>
    </footer>
</body>

</html>