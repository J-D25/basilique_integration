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
    <header>
        <?php include("header.html")?>
    </header>
    <main>
        <div id="home_section_1">
            <h2>D'église à basilique...</h2>
            <div id="home_section_1_content">
                <img id="home_section_1_content_img" src="images/main_01.png" width="372" height="290" alt="Vue aérienne de la basilique Saint-Ferjeux en noir et blanc du vingtième siècle.">
                <div>
                    <p>L'église qui a précédé la basilique actuelle a été maintes fois remaniée et reconstruite (1520-1526, 1636, 1730). L'édifice fut démoli au XIX<sup>e</sup> siècle pour permettre la construction d'une vaste basilique. Les plans de cette dernière veillèrent néanmoins à préserver l'emplacement de la « grotte » initiale, aujourd'hui comprise dans la crypte de l'édifice de style romano-byzantin.</p>
                    <p class="button left">
                        <a href="en_savoir_plus.php">En savoir plus</a>
                    </p>
                </div>
            </div>
        </div>
        <div id="home_section_2">
        <picture>
            <source srcset="images/main_02_mobile.jpg" media="(max-width: 765px)">
            <img class="home_panorama" src="images/main_02.jpg" width="2048" height="873" alt="Basilique Saint-Ferjeux vue de côté du style romano-byzantin. Elle est composée de deux immenses tours situé à l'avant, suivie de la grande salle rectangulaire surplombée d'une coupole. Fini ensuite par une abside. On peut voir au premier plan le cimetière de Saint-Ferjeux.">
        </picture>
        </div>
        <div id="home_section_3">
            <h3 class="bottomline">Agenda</h3>
            <div id="home_section_3_content">
                <div class="home_section_3_content_actu">
                    <img src="images/actu_01.png" width="340" height="226" alt="Quatre personnes debout prient dans un lieu de culte chrétien. Un prêtre les regarde. Une lumière blanche les illumine par un vitrail en forme de rosace.">
                    <div class="home_section_3_content_actu_text">
                        <h4>Concert du 26 juin 2022</h4>
                        <p>L'Association Musique Sacrée, sa maîtrise et ses solistes, proposent des pièces musicales de Mozart, Bach, Mendelson, Monteverdi…</p>
                    </div>
                </div>
                <div class="home_section_3_content_actu">
                    <img src="images/actu_02.png" width="340" height="226" alt="Gros plan sur les mains d'une personne de foi. Elle prie. Ses doigts sont croisés.">
                    <div class="home_section_3_content_actu_text">
                        <h4>Messe de l'Ascension</h4>
                        <p>La messe de l'Ascension se tiendra le jeudi 26 mai à partir de 10 h 30. L'archevêque de Besançon, Monseigneur Jean-Luc Bouilleret, présidera la messe.</p>
                    </div>
                </div>
                <div class="home_section_3_content_actu">
                    <img src="images/actu_03.png" width="340" height="226" alt="Cinq personnes sont dans un lieu de culte chrétien. Il y a deux hommes et une femme assis sur des bancs. La femme lit la bible. Un prêtre montre un texte de la bible à une autre femme.">
                    <div class="home_section_3_content_actu_text">
                        <h4>1<sup>er</sup> mai, fête du travail</h4>
                        <p>Instituée initialement en mémoire de la grève générale du 1<sup>er</sup> mai 1886 à Chicago, la fête du travail a été adoptée progressivement au cours du XX<sup>e</sup> siècle.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="home_section_4">
            <div id="home_section_4_1"><img src="images/main_03.jpg" width="375" height="500" alt="Photo de la basilique vue de face. On voit les deux immenses tours, ainsi que sa façade antérieure. Il y a cinq statues d'apôtres incrustées dans celle-ci."></div>
            <div id="home_section_4_2"><img src="images/main_04.png" width="650" height="446" alt="Photo de la basilique en noir et blanc datant du vingtième siècle."></div>
        </div>
    </main>
    <footer>
        <?php include("footer.html")?>
    </footer>
</body>

</html>
