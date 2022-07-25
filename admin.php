<?php
session_start();

if($_SESSION['user']!="admin"){
    header("Location: login.php");
    exit();
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Auteur:J-D25, Projet ACS 2022">
    <link rel="stylesheet" href="assets/css/style3.css">
    <link rel="stylesheet" href="assets/css/stylepopup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500&family=Glory:wght@400&display=swap" rel="stylesheet">
    <script src="js/admin.js" defer></script>
    <title>Basilique Saint-Ferjeux - Administration</title>
</head>

<body>
    <header>
        <p id="header_title">Basilique Saint-Ferjeux : Dashboard</p>
        <a href="php/logout.php" title="Déconnexion" id="logout" ontouchstart="">
            <svg width="22.729591" height="25" viewBox="0 0 810.08264 980" xmlns="http://www.w3.org/2000/svg">
                <path d="m 48.641329,534.5 c 0,-131.9 71.700001,-247.1 178.200001,-308.7 V 126 C 69.541329,194.8 -40.458671,351.9 -40.458671,534.5 c 0,246.1 199.500001,445.5 445.500001,445.5 246,0 445.5,-199.4 445.5,-445.5 0,-182.7 -110,-339.8 -267.3,-408.5 v 99.8 c 106.5,61.6 178.2,176.8 178.2,308.7 0,196.8 -159.5,356.4 -356.4,356.4 -196.9,0 -356.400001,-159.5 -356.400001,-356.4 z M 405.02433,0 c -49.2,0 -81.2554,39.9 -81.2554,89.1 v 356.4 c 0,49.2 32.0554,89.1 81.2554,89.1 49.2,0 81.2724,-39.9 81.2724,-89.1 V 89.1 c 0,-49.2 -32.0724,-89.1 -81.2724,-89.1 z" style="fill:#ffffff" />
            </svg>
        </a>
        <?php 
            include("popup.html");//insertion template popup
        ?>
    </header>

    <main>
        <div id="main_bar">
            <div id="searching">
                <input type="text" placeholder="Rechercher" id="search">
                <svg viewBox="0 0 6.614583 6.614583" xmlns="http://www.w3.org/2000/svg" id="cross" ontouchstart>
                    <path d="M 3.307292,0 A 3.3072924,3.3072919 0 0 0 0,3.307292 3.3072924,3.3072919 0 0 0 3.307292,6.614583 3.3072924,3.3072919 0 0 0 6.614583,3.307292 3.3072924,3.3072919 0 0 0 3.307292,0 Z M 2.073775,1.322917 3.307292,2.556433 4.540808,1.322917 5.291667,2.073775 4.05815,3.307292 5.291667,4.540808 4.540808,5.291667 3.307292,4.05815 2.073775,5.291667 1.322917,4.540808 2.556433,3.307292 1.322917,2.073775 Z" />
                </svg>
            </div>
            <a href="php/export.php" class="button_blue" id="export" ontouchstart="">Exporter en CSV</a>
        </div>
        <table>
            <thead>
                <tr class="head">
                    <th width="50%" id="head_mail">Email</th>
                    <th width="40%" id="head_date">Date</th>
                    <th width="10%" id="head_bin"></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <p id="record">Affichage de <span id="record_select">X</span> enregistrements sur <span id="record_total">X</span>.</p>
    </main>

    <footer>
        <input type="button" value="Charger plus" class="button_blue" id="more" ontouchstart="">
    </footer>

    <template id="templatemail">
        <tr>
            <td class="admin_email"></td>
            <td class="admin_date"></td>
            <td class="admin_bin"><svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.64458 1.16667H11.5261V2.33333H0V1.16667H2.88153L3.84633 0H7.67981L8.64458 1.16667ZM2.68944 14C1.8441 14 1.15261 13.3017 1.15261 12.4479V3.5H10.3735V12.4479C10.3735 13.3017 9.682 14 8.8367 14H2.68944Z" fill="#ED6368"/></svg></td>
        </tr>
    </template>

</body>

</html>