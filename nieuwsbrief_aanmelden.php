<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<div class="bovenbalk_nieuwsbrief">
    <a href="https://www.dpgmediagroup.com/nl-NL"><img class="dpg" src="afbeeldingen/dpg_media.png" alt="dpg_media"></a>
</div>   

<div class="formulier_nieuwsbrief">
    <div class="inlog_blokje">
        <a href="index.php"><img class="logo_nieuwsbrief" src="afbeeldingen/Nu-nl-logo.png" alt=""></a>
        <h3 class="titel_nieuwsbrief">Meld je aan</h3>
        <form method="POST" action="nieuwsbrief_gegevens.php">
            <br><input placeholder="Voornaam" class="typ_veld" type="text" name="voor_naam" required><br>
            <br> <input placeholder="Achternaam" class="typ_veld" type="text" name="achter_naam" required><br>
            <br><input placeholder="Email" class="typ_veld" type="email" name="email" required><br>
            <button class="aanmelden" type="submit">Ga verder</button>
        </form>
    </div>
</div>    
</body>
</html>
