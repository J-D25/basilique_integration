<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500&family=Domine:wght@700&display=swap" rel="stylesheet">
    <title>Basilique Saint-Ferjeux</title>
</head>

<body>
    <header id="header_short">
        <?php include("header.html")?>
    </header>
    <main>
        <h2>Contactez-nous</h2>
        <p>Vivamus sit amet pretium odio. Vestibulum nec hendrerit ligula, id lacinia libero. Nullam vulputate viverra sem nec consectetur. In pharetra laoreet leo et iaculis. Suspendisse aliquet eleifend erat, quis auctor velit aliquam eget.</p>
        <form id="contact_form">
            <div id="contact_form_flexname">
                <div id="contact_form_flexname_name">
                    <label for="contact_form_name">Nom</label>
                    <input type="text" id="contact_form_name" aria-required="true"/>
                </div>
                <div id="contact_form_flexname_firstname">
                    <label for="contact_form_firstname">Prénom</label>
                    <input type="text" id="contact_form_firstname" aria-required="true"/>
                </div>
            </div>
            <label for="contact_form_email">Email</label>
            <input type="email" id="contact_form_email" aria-required="true"/>
            <label for="contact_form_object" >Objet</label>
            <input type="text" id="contact_form_object" aria-required="true"/>
            <label for="contact_form_message">Message</label>
            <textarea id="contact_form_message" rows="8" aria-required="true"></textarea>
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