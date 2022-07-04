<?php
session_start();

if($_SESSION['user']!="admin"){
    header("Location: login.php");
    exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Auteur:J-D25, Projet ACS 2022">
    <link rel="stylesheet" href="assets/css/style3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500&family=Glory:wght@400&display=swap" rel="stylesheet">
    <script src="js/script2.js" defer></script>
    <title>Basilique Saint-Ferjeux - Administration</title>
</head>

<body><header>
        <a href="php/logout.php" title="Déconnexion" id="logout">
            <svg xmlns:svg="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 891 980"><g transform="translate(-54.5,-10)"><path d="m 143.6,544.5 c 0,-131.9 71.7,-247.1 178.2,-308.7 V 136 C 164.5,204.8 54.5,361.9 54.5,544.5 54.5,790.6 254,990 500,990 746,990 945.5,790.6 945.5,544.5 945.5,361.8 835.5,204.7 678.2,136 v 99.8 C 784.7,297.4 856.4,412.6 856.4,544.5 856.4,741.3 696.9,900.9 500,900.9 303.1,900.9 143.6,741.4 143.6,544.5 Z M 500,10 c -49.2,0 -89.1,39.9 -89.1,89.1 v 356.4 c 0,49.2 39.9,89.1 89.1,89.1 49.2,0 89.1,-39.9 89.1,-89.1 V 99.1 C 589.1,49.9 549.2,10 500,10 Z" style="fill:#ffffff"/></g></svg>
        </a>
    </header>

    <main>
        <div id="main_bar">
            <input type="text" placeholder="Rechercher" id="search">
            <a href="php/export.php" class="button_blue" id="export">Exporter en CSV</a>
        </div>
        <table>
            <thead>
                <tr class="head">
                    <th width="50%">Email</th>
                    <th width="40%">Date</th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <p id="record">Affichage de <span id="record_select">X</span> enregistrements sur <span id="record_total">X</span>.</p>
    </main>

    <footer>
        <input type="button" value="Charger plus" class="button_blue" id="more">
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