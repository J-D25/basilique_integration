<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="J-D25">
    <meta name="description" content="Vous avez une question concernant la Basilique Saint-Ferjeux ? N'hésitez pas à nous contacter.">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500&family=Domine:wght@700&display=swap" rel="stylesheet">
    <script src="js/main.js" defer></script>
    <script src="js/contactform.js" defer></script>
    <noscript><style>img {transform: translateY(0px); opacity: 1;}</style></noscript>
    <title>Basilique Saint-Ferjeux - Contact</title>
</head>

<body>
    <header id="header_short">
        <?php 
            $headerTitle = "Avez-vous <br>une question ?";
            include("header.php");//insertion header
            include("popup.html");//insertion template popup
        ?>
    </header>
    <main>
        <h2>Contactez-nous</h2>
        <p>Vous avez une question concernant notre basilique ? Vous pouvez nous joindre à tout moment via le formulaire de contact ci-dessous. N'hésitez pas à nous contacter, nous serons très heureux de vous répondre !<br>Tous les champs de ce formulaire sont obligatoires.</p>
        <form id="contact_form" method="post" novalidate>
            <div id="contact_form_flexname">
                <div id="contact_form_flexname_name">
                    <label for="contact_form_name">Nom</label>
                    <input type="text" name="lname" id="contact_form_name" class="contact_form_input" aria-required="true" required/>
                </div>
                <div id="contact_form_flexname_firstname">
                    <label for="contact_form_firstname">Prénom</label>
                    <input type="text" name="fname" id="contact_form_firstname" class="contact_form_input" aria-required="true" required/>
                </div>
            </div>
            <label for="contact_form_email">Email</label>
            <input type="email" name="mail" id="contact_form_email" class="contact_form_input" aria-required="true" required/>
            <label for="contact_form_object">Objet</label>
            <input type="text" name="object" id="contact_form_object" class="contact_form_input" aria-required="true" required/>
            <label for="contact_form_message">Message</label>
            <textarea name="message" id="contact_form_message" rows="8" class="contact_form_input" aria-required="true" required></textarea>
            <div class="button">
                <input type="submit" value="Valider" id="contact_form_button">
            </div>
        </form>
    </main>

    <footer>
        <?php include("footer.html")?>
    </footer>
</body>

</html>
