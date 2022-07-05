<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="J-D25">
    <meta name="description" content="Une église préexistait sur l'emplacement de l'actuelle Basilique Saint-Ferjeux, édifiée il y a 138 ans !">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500&family=Domine:wght@700&display=swap" rel="stylesheet">
    <script src="js/main.js" defer></script>
    <noscript><style>img {transform: translateY(0px); opacity: 1;}</style></noscript>
    <link rel="preload" as="image" href="assets/images/esp_s_01.jpg" media="(min-width: 766px)" />
    <link rel="preload" as="image" href="assets/images/esp_s_02.jpg" media="(min-width: 766px)" />
    <link rel="preload" as="image" href="assets/images/esp_s_03.jpg" media="(min-width: 766px)" />
    <link rel="preload" as="image" href="assets/images/esp_s_04.jpg" media="(min-width: 766px)" />
    <link rel="preload" as="image" href="assets/images/esp_s_01_mobile.jpg" media="(max-width: 765px)" />
    <link rel="preload" as="image" href="assets/images/esp_s_02_mobile.jpg" media="(max-width: 765px)" />
    <link rel="preload" as="image" href="assets/images/esp_s_03_mobile.jpg" media="(max-width: 765px)" />
    <link rel="preload" as="image" href="assets/images/esp_s_04_mobile.jpg" media="(max-width: 765px)" />
    <title>Basilique Saint-Ferjeux - En savoir plus</title>
</head>

<body>
    <header id="header_short">
        <?php include("header.html")?>
    </header>
    <main id="esp">
        <div id="esp_section_1">
            <h2>Historique de la basilique</h2>
            <div id="esp_section_1_gallery" class="panorama"></div>
        </div>
        <div id="esp_section_2">
            <p>Sur le lieu même de la future basilique, une première église existait, probablement bâtie vers 1657. Durant la Révolution, elle fut transformée en hôpital. En octobre 1870, les saints patrons de la ville de Besançon furent invoqués par le
                Cardinal Mathieu pour protéger la ville des troupes prussiennes. La ville ayant été épargnée, celui-ci prononce un vœu solennel le 26 janvier 1871 : il s'agit d'ériger un nouvel édifice sur le lieu que la tradition locale reconnaissait
                comme la grotte qui avait abrité les deux saints.</p>
        </div>
        <div id="esp_section_3">
            <p>En novembre 1870, un premier projet est déposé par l'architecte franc-comtois Alfred Ducat, à titre gracieux. Mais Edouard Bérard, élève de Viollet-le-Duc, sera désigné pour réaliser l'édifice. Or, ce deuxième projet s'avérant trop coûteux,
                c'est le projet d'Alfred Ducat qui sera finalement retenu.</p>
        </div>
        <div id="esp_section_4">
            <img src="assets/images/esp_02.jpg" width="738" height="425" alt="Photo de la basilique datant du vingtième siècle en noir et blanc. Il est écrit un résumé de l'historique de la basilique. Elle a été créée par l'architecte M. Ducat à la fin du dix-neuvième siècle dédié aux Saints Ferreol et Ferjeux, décapités en 212 à Besançon où ils étaient venus prêcher le christianisme.">
        </div>
        <div id="esp_section_5">
            <img src="assets/images/esp_03.jpg" width="328" height="425" alt="Photo de la façade principale de la basilique datant du vingtième siècle en noir et blanc. On peut voir les deux tours qui ont respectivement à gauche un baromètre et à droite une horloge.">
        </div>
        <div id="esp_section_6">
            <p>Celui-ci reste dans l'esprit des constructions de l'époque : Notre-Dame-de-Fourvière à Lyon, le Sacré-Cœur de Montmartre à Paris ou encore la cathédrale de Marseille. Les premiers travaux commencent cette même année, et une première messe
                est célébrée en 1892 dans la partie déjà construite. La crypte est inaugurée en 1895. En 1898, Alfred Ducat décède, et son disciple et collaborateur, Joseph Simonin, achève la construction.</p>
        </div>
        <div id="esp_section_7">
            <p>En 1905, la ville de Besançon en obtient la propriété et la charge. En 1912, l'église est érigée officiellement en basilique. L'ombrellino et le tintinnabulum qui se trouvent de part et d'autre du transept sont les emblèmes réservés aux basiliques.
                Le 21 juin 1925, elle est enfin consacrée, soit cinquante-quatre années après le vœu du Cardinal Mathieu.</p>
        </div>
        <div id="esp_section_8">
            <picture>
                <source srcset="assets/images/esp_04_mobile.jpg" media="(max-width: 765px)">
                <img class="panorama" src="assets/images/esp_04.jpg" width="2048" height="873" alt="Photo de la basilique moderne vue de loin. On distingue l'intégralité du monument mais aussi le grand cimetière de Saint-Ferjeux situé juste devant.">
            </picture>
        </div>
    </main>
    <footer>
        <?php include("footer.html")?>
    </footer>
</body>

</html>
