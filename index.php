<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="J-D25">
    <meta name="description" content="Bienvenue sur le site internet de la Basilique Saint-Ferjeux, édifice de style romano-byzantin ayant 138 ans d'histoire !">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500&family=Domine:wght@700&display=swap" rel="stylesheet">
    <script src="js/main.js" defer></script>
    <noscript><style>img {transform: translateY(0px); opacity: 1;}</style></noscript>
    <title>Basilique Saint-Ferjeux</title>
</head>

<body>
    <header>
        <?php 
            $headerTitle = "D'église à<br>basilique...";
            include("header.php");
        ?>
    </header>
    <main>
        <div id="home_section_1">
            <h2>La construction de la basilique</h2>
            <div id="home_section_1_content" class="img_container">
                <img id="home_section_1_content_img" src="assets/images/main_01.png" width="372" height="290" alt="Vue aérienne de la basilique Saint-Ferjeux en noir et blanc du vingtième siècle.">
                <div>
                    <p>L'église qui a précédé la basilique actuelle a été maintes fois remaniée et reconstruite (1520-1526, 1636, 1730). L'édifice fut démoli au XIX<sup>e</sup> siècle pour permettre la construction d'une vaste basilique. Les plans de cette dernière veillèrent néanmoins à préserver l'emplacement de la « grotte » initiale, aujourd'hui comprise dans la crypte de l'édifice de style romano-byzantin.</p>
                    <p class="button left">
                        <a href="en_savoir_plus.php">En savoir plus</a>
                    </p>
                </div>
            </div>
        </div>
        <p id="home_section_2" class="img_container">
            <picture>
                <source srcset="assets/images/main_02_mobile.jpg" media="(max-width: 765px)">
                <img class="home_panorama" src="assets/images/main_02.jpg" width="2048" height="873" alt="Basilique Saint-Ferjeux vue de côté du style romano-byzantin composée de deux immenses tours situées à l'avant. On peut voir au premier plan le cimetière de Saint-Ferjeux.">
            </picture>
        </p>
        <div id="home_section_3">
            <h2>Agenda</h2>
            <div id="home_section_3_content">
                <div class="home_section_3_content_actu img_container">
                    <img src="assets/images/actu_01.png" width="340" height="226" alt="Quatre personnes debout prient dans un lieu de culte chrétien. Un prêtre les regarde. Une lumière blanche les illumine par un vitrail en forme de rosace.">
                    <div class="home_section_3_content_actu_text">
                        <h4>Concert du 26 juin 2022</h4>
                        <p>L'Association Musique Sacrée, sa maîtrise et ses solistes, proposent des pièces musicales de Mozart, Bach, Mendelson, Monteverdi…</p>
                    </div>
                </div>
                <div class="home_section_3_content_actu img_container">
                    <img src="assets/images/actu_02.png" width="340" height="226" alt="Gros plan sur les mains d'une personne de foi. Elle prie. Ses doigts sont croisés.">
                    <div class="home_section_3_content_actu_text">
                        <h4>Messe de l'Ascension</h4>
                        <p>La messe de l'Ascension se tiendra le jeudi 26 mai à partir de 10 h 30. L'archevêque de Besançon, Monseigneur Jean-Luc Bouilleret, présidera la messe.</p>
                    </div>
                </div>
                <div class="home_section_3_content_actu img_container">
                    <img src="assets/images/actu_03.png" width="340" height="226" alt="Cinq personnes sont dans un lieu de culte chrétien. Il y a deux hommes et une femme assis sur des bancs. Un prêtre montre un texte de la bible à une autre femme.">
                    <div class="home_section_3_content_actu_text">
                        <h4>1<sup>er</sup> mai, fête du travail</h4>
                        <p>Instituée initialement en mémoire de la grève générale du 1<sup>er</sup> mai 1886 à Chicago, la fête du travail a été adoptée progressivement au cours du XX<sup>e</sup> siècle.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="home_section_4">
            <h2>Retour en images</h2>
            <div id="home_section_4_content">
                <p class="img_container" id="home_section_4_content_1"><img src="assets/images/main_03.jpg" width="375" height="500" alt="Photo de la basilique vue de face. On voit les deux immenses tours, ainsi que sa façade antérieure. Il y a cinq statues d'apôtres incrustées dans celle-ci."></p>
                <p class="img_container" id="home_section_4_content_2"><img src="assets/images/main_04.jpg" width="800" height="518" alt="Photo de la basilique en noir et blanc datant du vingtième siècle."></p>
            </div>
        </div>
    </main>
    <footer>
        <?php include("footer.html")?>
    </footer>
</body>

</html>
