<?php
$host = '127.0.0.1';
$db   = 'nieuwspagina_zometeen';
$user = 'bit_academy';
$pass = 'bit_academy';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
   
    exit('Error connecting to database: ' . $e->getMessage());
}

$random_number = rand(1, 7);
$advertensiePDO = $pdo->query("SELECT afbeelding_naam FROM advertenties WHERE id = $random_number");
$advertensie = $advertensiePDO->fetch();

?>