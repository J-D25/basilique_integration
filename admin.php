<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Auteur:J-D25, Projet ACS 2022">
    <link rel="stylesheet" href="style3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500&family=Glory:wght@400&display=swap" rel="stylesheet">
    <script src="script2.js" defer></script>
    <title>Basilique Saint-Ferjeux - Administration</title>
</head>

<body>
    <main>
        <header>
            <input type="text" placeholder="Rechercher" id="search">
            <input type="button" value="Déconnexion" id="logout">
        </header>
        <?php
        require __DIR__ .'/vendor/autoload.php';
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        
        define('SERVER', $_ENV['SERVER']);
        define('DATABASE', $_ENV['DATABASE']);
        define('USERNAME', $_ENV['USERNAME']);
        define('PASSWORD', $_ENV['PASSWORD']);
    $errorCode = true;
    try{
        $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE."", USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sth = $conn->prepare("SELECT `email`, `date` FROM `newsletter` ORDER BY `email`");
        $sth->execute();
    }
    catch(PDOException $e){
        $errorCode = $e->getCode();
    }
    $conn = null;
    ?>
        <table>
            <thead>
                <tr>
                    <th width="50%">Email</th>
                    <th width="40%">Date</th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $res) {
                    $i = $i + 1;
                    if ($i % 2==1){echo "<tr class=light>";}else{echo "<tr class=dark>";}?>
                        <td class="admin_email"><?php echo $res['email']; ?></td>
                        <td class="admin_date"><?php echo $res['date']; ?></td>
                        <td class="admin_bin"><svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.64458 1.16667H11.5261V2.33333H0V1.16667H2.88153L3.84633 0H7.67981L8.64458 1.16667ZM2.68944 14C1.8441 14 1.15261 13.3017 1.15261 12.4479V3.5H10.3735V12.4479C10.3735 13.3017 9.682 14 8.8367 14H2.68944Z" fill="#ED6368"/></svg></td>
                    </tr>
                    <?php
                        }
                    ?>
            </tbody>
        </table>
        <footer>
            <input type="button" value="Charger plus" class="button_blue">
            <input type="button" value="Exporter en csv" class="button_blue" id="export">
        </footer>
    </main>
</body>

</html>