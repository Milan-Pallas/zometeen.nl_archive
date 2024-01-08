<!DOCTYPE html>
<html lang="nl">
    <head>
        <?PHP
        session_start();

        include "./database_connectie.php";
        $id = $_GET['id'];
        $artikelPDO = $pdo->query("SELECT * FROM nieuwsberichten WHERE id =$id");
        $details = $artikelPDO->fetchAll();

        $opmerkingPDO = $pdo->query("SELECT * FROM opmerkingen WHERE id_nieuwsbericht = $id");

        if (isset($_SESSION)) {
            if ($_SESSION['mode'] == "dark") {
                echo "<link rel='stylesheet' href='darkmode.css'>";
            } else {
                echo "<link rel='stylesheet' href='lightmode.css'>";
            }
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
        <div class="titel">
            <p><?PHP echo date("Y-m-d") ?> | Het laatste nieuws op Zometeen.nl</p>
        </div>
        <div class="algemeen">
            <div>
                <img src="afbeeldingen/nieuws_afbeeldingen/<?PHP echo $details[0]['afbeelding_naam'] ?>.png" alt="afbeelding" class="nieuws_afbeelding">
                <h1><?PHP echo $details[0]['titel']; ?></h1><br>
                <p><?PHP echo $details[0]['inhoud1']; ?></p><br>
                <p><?PHP echo $details[0]['inhoud2']; ?></p><br>
            </div>
            <div>
                <img src="afbeeldingen/adv/<?PHP echo $advertensie['afbeelding_naam']; ?>.gif" alt="adv" class="algemeen_afbeelding">
            </div>
        </div>
        <div>
            <form class="opmerking" method="post" action="">
                <p>Comments</p>
                <textarea name="opmerking" class="textbox" id="opmerking" rows="2" placeholder="Opmerking"></textarea><br>
                <input type="text" class="textbox" name="naam" id="naam" placeholder="Naam">
                <input type="submit" class="versturen" name="versturen" id="versturen" value="Opmerking versturen">
            </form>

            <?PHP
            if (isset($_POST['versturen'])) {
                if ((empty($_POST['opmerking'])) || (empty($_POST['naam']))) {
                    echo "<p class='error'>Een of meerdere velden zijn niet ingevuld :(</p>";
                } else {
                    $opmerking = $_POST['opmerking'];
                    $naam = $_POST['naam'];
                    $datum = date("y-m-d");

                    $insertPDO = $pdo->prepare(
                        "INSERT INTO opmerkingen (id_nieuwsbericht, naam_gebruiker, opmerking, datum_geplaatst)
                        VALUES (?, ?, ?, ?)"
                    );
                    $insertPDO->bindParam(1, $id, PDO::PARAM_INT);
                    $insertPDO->bindParam(2, $naam, PDO::PARAM_STR);
                    $insertPDO->bindParam(3, $opmerking, PDO::PARAM_STR);
                    $insertPDO->bindParam(4, $datum, PDO::PARAM_STR);

                    try {
                        $insertPDO->execute();
                        header("Refresh:0");
                    } catch (PDOException $err) {
                        echo "<p>Oeps! Vanwege een fout in de code is het niet gelukt om je opmerking te versturen...</p>";
                    exit();
                    }
                }
            }

            while ($opmerking = $opmerkingPDO->fetch()) {
                echo "<div class='opmerking_veld'>";
                echo "<p>" . $opmerking['naam_gebruiker'] . " - " . substr($opmerking['datum_geplaatst'], 0, 10) . "</p>";
                echo "<p>" . $opmerking['opmerking'] . "</p>";
                echo "</div>";
            }
            ?>
        </div>
        <?PHP include "./footer.php";?> 
    </body>
</html>