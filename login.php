<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Auteur:J-D25, Projet ACS 2022">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500&family=Glory&display=swap" rel="stylesheet">
    <script src="js/login.js" defer></script>
    <title>Basilique Saint-Ferjeux - Connexion</title>
</head>
<body>
    <main>
        <h1>Bienvenue sur votre espace administration</h1>
        <form id="login_form" novalidate>
            <label for="username">Nom d'utilisateur</label>
            <input type="text" id="login_name" class="login_input" name="username" required>
            <label for="password">Mot de passe</label>
            <input type="password" id="login_pass" class="login_input" name="password" required>
            <input type="submit" id="login_button" value="Se connecter" ontouchstart="">
        </form>
    </main>
</body>
</html>