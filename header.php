<header>
    <img class="logo_header" src="afbeeldingen/Nu-nl-logo.png" alt="logo">
    <p><a href="index.php">Algemeen</a></p>
    <p><a href="economie.php" class="economie">Economie</a></p>
    <p><a href="sport.php" class="sport">Sport</a></p>
    <p><a href="media_en_cultuur.php" class="media_en_cultuur">Media en cultuur</a></p>
    <p><a href="overig.php">Overig</a></p>
    <button class="toggle" onclick="toggleDropDown()">Meer</button>
    <form method="post" action="">
        <input class="toggle" type="submit" name="mode" id="mode" value="☼">
        <input class="toggle" type="submit" name="mode" id="mode" value="☾">
    </form>
    <p><i class="fa-regular fa-user"></i> Inloggen</p>
</header>
<div id="nav-dropdown" class="shadow-small flex flex-col items-center" data-state="closed">
    <p>Ik had geen zin om de footer te kopieren dus hier is een leuke meme</p>
    <img class="algemeen_afbeelding" src="afbeeldingen/meme.png" alt="meme">
</div>

<?PHP
if (isset($_POST['mode'])) {
    if ($_POST['mode'] == "☼") {
        $_SESSION['mode'] = "light";
        header("Refresh:0");
    } elseif ($_POST['mode'] == "☾") {
        $_SESSION['mode'] = "dark";
        header("Refresh:0");
    }
}
?>