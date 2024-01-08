<!DOCTYPE html>
<html lang="nl">
<head>
    <?PHP
    session_start();

    include "./database_connectie.php";
    $artikelenPDO = $pdo->query("SELECT titel, id FROM nieuwsberichten WHERE
    datum_geplaatst < (now() - INTERVAL 3 MONTH) ORDER BY datum_geplaatst DESC");

    $afbeelding_naamPDO = $pdo ->query("SELECT afbeelding_naam FROM nieuwsberichten WHERE
    datum_geplaatst < (now() - INTERVAL 3 MONTH) ORDER BY datum_geplaatst DESC LIMIT 1");
    $afbeelding_naam = $afbeelding_naamPDO->fetch();

    if (isset($_SESSION['mode'])) {
        if ($_SESSION['mode'] == "dark") {
            echo "<link rel='stylesheet' href='darkmode.css'>";
        } else {
            echo "<link rel='stylesheet' href='lightmode.css'>";
        }
    } else {
        $_SESSION['mode'] = "light";
        header("Refresh:0");
    }
    ?>
    <meta charset="UTF-8">
    <title>Zometeen.nl</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="png" href="Nu-nl-logo.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="./meer.js"></script>
</head>
<body>
    <?PHP include "./header.php"; ?>
    <div class="titel_root">
        <div class="titel">
            <p><?PHP echo date("Y-m-d") ?> | Het laatste nieuws op Zometeen.nl</p>
            <h1>Algemeen</h1>
            <p>De laatste nieuwtjes</p>
        </div>
        <?PHP include "./nieuwsbrief_melding.php"?>
    </div>
    <div class="algemeen">
        <div>
            <img class="news_list_afbeelding" src="afbeeldingen/nieuws_afbeeldingen/<?PHP echo $afbeelding_naam['afbeelding_naam']; ?>.png" alt="afbeelding">
            <div class="news_list">
                <ul>
                <?PHP
                while($bericht = $artikelenPDO->fetch()) {
                    echo "<li class='nieuws_titel'><a href='./nieuwsbericht.php?id=" . $bericht['id'] . "'>" . $bericht['titel'] . "</a></li>";
                }
                ?>
                </ul>
            </div>
        </div>
        <div>
            <img src="afbeeldingen/weerbericht.png" alt="weerbericht" class="algemeen_afbeelding">
            <img src="afbeeldingen/adv/<?PHP echo $advertensie['afbeelding_naam']; ?>.gif" alt="adv" class="algemeen_afbeelding">
        </div>
   </div>
   <?PHP include "./footer.php";?> 
</body>
</html>