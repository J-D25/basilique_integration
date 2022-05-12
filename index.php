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
    <header>
        <?php include("header.html")?>
    </header>
    <main>
        <div id="home_section_1">
            <h2>La meilleure basilique du monde</h2>
            <div id="home_section_1_content">
                <img src="images/main_01.png" width="372" height="290">
                <div>
                    <p>Vivamus sit amet pretium odio. Vestibulum nec hendrerit ligula, id lacinia libero. Nullam vulputate viverra sem nec consectetur. In pharetra laoreet leo et iaculis. Suspendisse aliquet eleifend erat, quis auctor velit aliquam eget.
                        Vivamus fringilla sapien pretium, fringilla erat at, venenatis mauris. Mauris pulvinar nisi a leo consequat pellentesque. Sed sem dolor, convallis quis enim ut, tincidunt dictum arcu. Mauris ultrices nec ligula commodo aliquet.
                        Morbi convallis, dui quis eleifend cursus, risus turpis feugiat sem, vel ornare mauris sem qui.</p>
                    <p class="button">
                        <a href="en_savoir_plus.php">En savoir plus</a>
                    </p>
                </div>
            </div>
        </div>
        <div id="home_section_2">
            <img class="home_panorama" src="images/main_02.png" width="1440" height="536">
        </div>
        <div id="home_section_3">
            <h3 class="bottomline">Agenda</h3>
            <div id="home_section_3_content">
                <div class="home_section_3_content_actu">
                    <img src="images/actu_01.png" width="340" height="226">
                    <div class="home_section_3_content_actu_text">
                        <h4>Concert du 26 juin 2022</h4>
                        <p>L’Association Musique Sacrée, sa maîtrise et ses solistes, proposent des pièces musicales de Mozart, Bach, Mendelson, Monteverdi…</p>
                    </div>
                </div>
                <div class="home_section_3_content_actu">
                    <img src="images/actu_02.png" width="340" height="226">
                    <div class="home_section_3_content_actu_text">
                        <h4>Messe de l’Ascension</h4>
                        <p>La messe de l’Ascension se tiendra le jeudi 26 mai à partir de 10 h 30. L'archevêque de Besançon, Monseigneur Jean-Luc Bouilleret, présidera la messe.</p>
                    </div>
                </div>
                <div class="home_section_3_content_actu">
                    <img src="images/actu_03.png" width="340" height="226">
                    <div class="home_section_3_content_actu_text">
                        <h4>1<sup>er</sup> mai, fête du travail</h4>
                        <p>Instituée initialement en mémoire de la grève générale du 1<sup>er</sup> mai 1886 à Chicago, la fête du travail a été adoptée progressivement au cours du XX<sup>e</sup> siècle.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="home_section_4">
            <div id="home_section_4_1"><img src="images/main_03.png" width="402" height="446"></div>
            <div id="home_section_4_2"><img src="images/main_04.png" width="650" height="446"></div>
        </div>
    </main>
    <footer>
        <?php include("footer.html")?>
    </footer>
</body>

</html>