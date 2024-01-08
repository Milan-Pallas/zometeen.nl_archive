<?php
session_start();

// Laadt database_connectie.php in 
include_once './database_connectie.php';

// Gegevens met POST methode ophalen en in variabele zetten
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voor_naam = htmlspecialchars($_POST['voor_naam'], ENT_QUOTES, 'UTF-8');
    $achter_naam = htmlspecialchars($_POST['achter_naam'], ENT_QUOTES, 'UTF-8');
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

   // Als een variable leeg is, foutmelding wordt dan ingesteld
    if (empty($voor_naam) || empty($achter_naam) || empty($email)) {
        $_SESSION['error'] = "Vul dit veld in!.";
        exit;
    }

    // Voorbereiden gegevens versturen naar de database
    $sql = "INSERT INTO gebruikersgegevens (voornaam, achternaam, email) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    // Het daadwerkelijk versturen van gegevens naar de database
    try {
        $stmt->execute([$voor_naam, $achter_naam, $email]);
        $_SESSION['gebruiker'] = ($voor_naam . " " . $achter_naam);
        header('Location: ./index.php');
        exit;
    } catch (PDOException $e) {
        echo 'Fout bij het registreren van de gebruiker: ' . $e->getMessage();
    }
}
?>
